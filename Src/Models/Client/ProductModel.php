<?php

namespace Src\Models\Client;

use Src\Models\BaseModel;
use Exception;

class ProductModel extends BaseModel
{

    protected $table = 'products';

    protected $id = "id";

    public function getAllProductWithSkus()
    {
        $products = [];
        $conn = $this->_conn->MySQLi();
    
        try {
            $sql = "SELECT 
                p.id AS product_id, 
                p.name AS product_name,
                p.short_description AS short_description,
                p.description,
                p.thumbnail,
                p.discount,
                ps.id AS sku_id,
                ps.sku,
                ps.images,
                ps.price AS original_price,
                ps.price - (ps.price * p.discount / 100) AS discounted_price,
                ps.quantity,
                ov.value_name AS option_value,
                o.name AS option_name,
                c.id AS category_id,
                COALESCE(rating_data.avg_rating, 0) AS avg_rating,
                COALESCE(rating_data.total_reviews, 0) AS total_reviews
            FROM products AS p
            JOIN product_skus AS ps ON p.id = ps.product_id
            LEFT JOIN sku_values AS sv ON ps.id = sv.sku_id
            LEFT JOIN option_values AS ov ON sv.value_id = ov.id
            LEFT JOIN options AS o ON sv.option_id = o.id
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            LEFT JOIN category_values cv ON pc.category_values_id = cv.id
            LEFT JOIN categories c ON cv.category_id = c.id 
            LEFT JOIN (
                SELECT 
                    product_id, 
                    AVG(rating) AS avg_rating, 
                    COUNT(id) AS total_reviews
                FROM ratings
                WHERE status = 1
                GROUP BY product_id
            ) AS rating_data ON p.id = rating_data.product_id
            WHERE p.status = 1
            ORDER BY p.id, ps.id";
    
            $result = $conn->query($sql);
    
            if (!$result) {
                throw new Exception("Lỗi truy vấn: " . $conn->error);
            }
    
            while ($row = $result->fetch_assoc()) {
                $productId = $row['product_id'];
                $skuId = $row['sku_id'];
    
                if (!isset($products[$productId])) {
                    $products[$productId] = [
                        'product_id' => $productId,
                        'product_name' => $row['product_name'],
                        'description' => $row['description'],
                        'short_description' => $row['short_description'],
                        'thumbnail' => $row['thumbnail'],
                        'discount' => $row['discount'],
                        'avg_rating' => $row['avg_rating'],
                        'total_reviews' => $row['total_reviews'],
                        'skus' => []
                    ];
                }
    
                if (!isset($products[$productId]['skus'][$skuId])) {
                    $products[$productId]['skus'][$skuId] = [
                        'sku_id' => $skuId,
                        'sku' => $row['sku'],
                        'images' => $row['images'],
                        'original_price' => $row['original_price'],
                        'discounted_price' => $row['discounted_price'],
                        'quantity' => $row['quantity'],
                        'category_id' => $row['category_id'] ?? null,
                        'options' => []
                    ];
                }
    
                if (!empty($row['option_name']) && !empty($row['option_value'])) {
                    $products[$productId]['skus'][$skuId]['options'][] = [
                        'option_name' => $row['option_name'],
                        'option_value' => $row['option_value']
                    ];
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ['error' => 'Có lỗi xảy ra khi lấy sản phẩm'];
        } finally {
            $conn->close();
        }
    
        return $products;
    }
    public function getProductById($productId)
    {
        $allProducts = $this->getAllProductWithSkus();
        if (isset($allProducts[$productId])) {
            return $allProducts[$productId];
        }
        return null;
    }

    public function getProductSpecsAndDesc($productId)
    {
        try {
            $sql = "SELECT p.short_description, p.description, p.specifications FROM $this->table AS p WHERE id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $productId);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            error_log('Lỗi: ' .  $e->getMessage() . $sql);
            return false;
        }
    }

    public function getAllRandomProductWithSkus()
    {
        try {
            $sql = "SELECT 
                    p.id AS product_id, 
                    p.name AS product_name, 
                    p.description,
                    p.thumbnail,
                    p.discount,
                    ps.id AS sku_id,
                    ps.sku,
                    ps.images,
                    ps.price AS original_price,
                    ps.price - (ps.price * p.discount / 100) AS discounted_price,
                    ps.quantity,
                    ov.value_name AS option_value,
                    o.name AS option_name
                FROM products AS p
                JOIN product_skus AS ps ON p.id = ps.product_id
                LEFT JOIN sku_values AS sv ON ps.id = sv.sku_id
                LEFT JOIN option_values AS ov ON sv.value_id = ov.id
                LEFT JOIN options AS o ON sv.option_id = o.id
                WHERE p.status = 1
                ORDER BY RAND() 
                LIMIT 10";
    
            $conn = $this->_conn->MySQLi();
            if (!$conn) {
                throw new Exception("Kết nối database thất bại.");
            }
    
            $result = $conn->query($sql);
            if (!$result) {
                throw new Exception("Lỗi khi thực hiện truy vấn: " . $conn->error);
            }
    
            $products = [];
    
            while ($row = $result->fetch_assoc()) {
                $productId = $row['product_id'];
                $skuId = $row['sku_id'];
    
                if (!isset($products[$productId])) {
                    $products[$productId] = [
                        'product_id' => $row['product_id'],
                        'product_name' => $row['product_name'],
                        'description' => $row['description'],
                        'thumbnail' => $row['thumbnail'],
                        'discount' => $row['discount'],
                        'skus' => []
                    ];
                }
    
                $products[$productId]['skus'][$skuId]['sku_id'] = $skuId;
                $products[$productId]['skus'][$skuId]['sku'] = $row['sku'];
                $products[$productId]['skus'][$skuId]['images'] = $row['images'];
                $products[$productId]['skus'][$skuId]['original_price'] = $row['original_price'];
                $products[$productId]['skus'][$skuId]['discounted_price'] = $row['discounted_price'];
                $products[$productId]['skus'][$skuId]['quantity'] = $row['quantity'];
                $products[$productId]['skus'][$skuId]['options'][] = [
                    'option_name' => $row['option_name'],
                    'option_value' => $row['option_value']
                ];
            }
    
            return $products;
        } catch (Exception $e) {
            error_log("Lỗi trong getAllRandomProductWithSkus: " . $e->getMessage());
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }
    
    public function getAllLatestProductsWithSkus()
{
    try {
        $sql = "SELECT 
                p.id AS product_id, 
                p.name AS product_name, 
                p.description,
                p.thumbnail,
                p.discount,
                ps.id AS sku_id,
                ps.sku,
                ps.images,
                ps.price AS original_price,
                ps.price - (ps.price * p.discount / 100) AS discounted_price,
                ps.quantity,
                ov.value_name AS option_value,
                o.name AS option_name
            FROM products AS p
            JOIN product_skus AS ps ON p.id = ps.product_id
            LEFT JOIN sku_values AS sv ON ps.id = sv.sku_id
            LEFT JOIN option_values AS ov ON sv.value_id = ov.id
            LEFT JOIN options AS o ON sv.option_id = o.id
            WHERE p.status = 1
            ORDER BY p.id DESC"; 

        $conn = $this->_conn->MySQLi();
        if (!$conn) {
            throw new Exception("Kết nối database thất bại.");
        }

        $result = $conn->query($sql);
        if (!$result) {
            throw new Exception("Lỗi khi thực hiện truy vấn: " . $conn->error);
        }

        $products = [];

        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $skuId = $row['sku_id'];

            if (!isset($products[$productId])) {
                $products[$productId] = [
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'description' => $row['description'],
                    'thumbnail' => $row['thumbnail'],
                    'discount' => $row['discount'],
                    'skus' => []
                ];
            }

            $products[$productId]['skus'][$skuId]['sku_id'] = $skuId;
            $products[$productId]['skus'][$skuId]['sku'] = $row['sku'];
            $products[$productId]['skus'][$skuId]['images'] = $row['images'];
            $products[$productId]['skus'][$skuId]['original_price'] = $row['original_price'];
            $products[$productId]['skus'][$skuId]['discounted_price'] = $row['discounted_price'];
            $products[$productId]['skus'][$skuId]['quantity'] = $row['quantity'];
            $products[$productId]['skus'][$skuId]['options'][] = [
                'option_name' => $row['option_name'],
                'option_value' => $row['option_value']
            ];
        }

        return $products;
    } catch (Exception $e) {
        error_log("Lỗi trong getAllLatestProductsWithSkus: " . $e->getMessage());
        return []; // Trả về mảng rỗng nếu có lỗi
    }
}

}
