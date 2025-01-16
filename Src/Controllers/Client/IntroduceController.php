<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
class IntroduceController extends BaseController{ 

    public function show(){
        echo $this->view->render('Client/Pages/Introduce', ['Name' => 'Bao']);
    }

}