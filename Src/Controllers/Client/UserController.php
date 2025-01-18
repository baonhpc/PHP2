<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
class UserController extends BaseController{ 

    public function myaccount(){
        echo $this->view->render('Client/UserProfile/MyAccount', ['Name' => 'Bao']);
    }
    
    public function register(){
        echo $this->view->render('Client/Pages/Signup', ['Name' => 'Bao']);
    }

}