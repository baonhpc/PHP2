<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
use Src\Models\Client\ProductModel;
class ProductController extends BaseController{ 

    public function show(){
        $product = new ProductModel();
        $data = $product->getAllProductWithSkus();
        echo $this->view->render('Client/Products/List', ['data' => $data]);
    }
    
    public function detail($id)
    {
        $productId = $id['id'];
    
        if (!$productId) {
            echo "ID sản phẩm không hợp lệ.";
            return;
        }
    
        $productModel = new ProductModel();
        $productData = $productModel->getProductById($productId);
        
        if (!$productData) {
            echo "Sản phẩm không tồn tại.";
            return;
        }
    
        $productDescAndSpecs = $productModel->getProductSpecsAndDesc($productId);
    
        echo $this->view->render('Client/Products/Detail', [
            'productData' => $productData,
            'desc_specs' => $productDescAndSpecs
        ]);
    }


}