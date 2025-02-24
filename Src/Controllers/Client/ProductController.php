<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
use Src\Models\Client\ProductModel;
use Src\Notifications\Notification;
class ProductController extends BaseController{ 

    public function show(){
        $product = new ProductModel();
        $data = $product->getAllProductWithSkus();
        echo $this->view->render('Client/Products/List', ['data' => $data]);
    }
    
    public function detail($id)
    {
        $productId = $id['id'];
        $userId = $_SESSION['user']['id'] ?? 0;

        if (!$productId) {
            Notification::error('Error', 'ID sản phẩm không hợp lệ');
            header("Location: /");
            exit();
        }

        $productModel = new ProductModel();
        $productData = $productModel->getProductById($productId);
        
        if (!$productData) {
            Notification::error('Error', 'Sản phẩm không tồn tại');
            header("Location: /");
            exit();
        }

        // Tính giá sau giảm giá cho mỗi SKU
        if (!empty($productData['skus'])) {
            foreach ($productData['skus'] as &$sku) {
                if ($productData['discount'] > 0) {
                    $sku['discounted_price'] = $sku['original_price'] * (1 - $productData['discount']/100);
                } else {
                    $sku['discounted_price'] = $sku['original_price'];
                }
            }
        }
        
        $productDescAndSpecs = $productModel->getProductSpecsAndDesc($productId);


        echo $this->view->render('Client/Products/Detail', [
            'productData' => $productData,
            'userId' => $userId,
            'desc_specs' => $productDescAndSpecs
        ]);
    }



}