<?php

namespace Src\Controllers\Client;



use Src\Controllers\BaseController;
use Src\Models\Client\ProductModel;

class HomeController extends BaseController
{

    public function show()
    {
        $product = new ProductModel();
        $dataProduct = $product->getAllRandomProductWithSkus();
        $LatestProduct = $product->getAllLatestProductsWithSkus();
        
        echo $this->view->render('Client/Home', [
            'Name' => 'Bao',
            'dataProduct' => $dataProduct,
            'LatestProduct' => $LatestProduct

        ]);
    }
    
}
