<?php

namespace Src\Controllers;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Src\Models\Client\CartModel;
use Exception;

class BaseController
{
    protected $view;
    protected $notification;

    protected $cartItems;


    public function __construct()
    {
        $this->view = new Engine('Src\\Views');

        $this->cartItems = $this->getCartItems();

        $this->view->addData(['cartItems' => $this->cartItems]);
    }

    protected function getCartItems()
    {
        try {
            if (!isset($_SESSION['user']['id'])) {
                return []; 
            }
    
            $user_id = $_SESSION['user']['id'];
            $CartModel = new CartModel();
            return $CartModel->getCartByUser($user_id);
        } catch (Exception $e) {
            return $e;
        }
    }
    
}
