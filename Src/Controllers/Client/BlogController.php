<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
class BlogController extends BaseController{ 

    public function show(){
        echo $this->view->render('Client/Blogs/List', ['Name' => 'Bao']);
    }
    public function detail(){
        echo $this->view->render('Client/Blogs/Detail', ['Name' => 'Bao']);
    }

}