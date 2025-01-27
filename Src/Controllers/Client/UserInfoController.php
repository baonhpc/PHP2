<?php 

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
class UserInfoController extends BaseController{ 

    public function myaccount(){
        echo $this->view->render('Client/UserProfile/MyAccount', ['Name' => 'Bao']);
    }
    public function orders(){
        echo $this->view->render('Client/UserProfile/Orders', ['Name' => 'Bao']);
    }
    public function orderDetail(){
        echo $this->view->render('Client/UserProfile/OrderDetail', ['Name' => 'Bao']);
    }
    public function address(){
        echo $this->view->render('Client/UserProfile/Address', ['Name' => 'Bao']);
    }
    public function changePassword(){
        echo $this->view->render('Client/UserProfile/ChangePassword', ['Name' => 'Bao']);
    }
    
    public function register(){
        echo $this->view->render('Client/Pages/Signup', ['Name' => 'Bao']);
    }

}