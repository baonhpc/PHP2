<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
class ProductControler extends BaseController{ 

    public function show(){
        echo $this->view->render('Client/Products/List', ['Name' => 'Bao']);
    }
    
    public function detail(){
        echo $this->view->render('Client/Products/Detail', ['Name' => 'Bao']);
    }


}