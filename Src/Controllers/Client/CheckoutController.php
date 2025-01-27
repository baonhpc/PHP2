<?php

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;

class CheckoutController extends BaseController {

    public function show() {
        echo $this->view->render('Client/Payments/checkout', ['Name' => 'Bao']);
    }
}