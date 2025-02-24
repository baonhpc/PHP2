<?php

namespace Src\Controllers\Client;
use Src\Models\Client\CheckoutModel;
use Src\Models\Client\CartModel;
use Src\Models\Client\AddressModel;
use Src\Notifications\Notification;
use Src\Models\Database;
use Src\Models\Client\ProductSkusModel;
use Src\Models\Client\OrderModel;
use Src\Models\Client\OrderDetailsModel;
use Exception;



use Src\Controllers\BaseController;

class CheckoutController extends BaseController {

    public function show()
    {
        $user_id  = $_SESSION['user']['id'];
        $CartModel = new CartModel();
        $data = $CartModel->getCartByUser($user_id);
        $id = $_SESSION['user']['id'];
        $addressModel = new AddressModel();
        $addressUser = $addressModel->getUserAddress($id);


        echo $this->view->render('Client/Payments/checkout',[
            'data' => $data,
            'addressUser' => $addressUser,
        ]);
    }

    public function checkout() {
        if (!isset($_POST['payment-method'])) {
            Notification::error('Thanh toán thất bại', 'Không thể thanh toán');
            header('location: /checkout');
            exit();
        }

        try {
            $user_id = $_SESSION['user']['id'];
            $method = $_POST['payment-method'];
            $address_id = $_POST['address_id'] ?? null;

            // Lấy thông tin giỏ hàng
            $cartModel = new CartModel();
            $cartItems = $cartModel->getCartByUser($user_id);
            // var_dump($cartItems);
            // die;
            
            if (empty($cartItems)) {
                throw new Exception('Giỏ hàng trống');
            }

            // Tính tổng tiền
            $total_price = 0;
            foreach ($cartItems as $item) {
                $total_price += $item['discounted_price'] * $item['quantity'];
            }

            // Tạo đơn hàng mới
            $orderModel = new OrderModel();
            $order_id = $orderModel->create([
                'user_id' => $user_id,
                'total_price' => $total_price,
                'status' => 1, // Trạng thái mới
            ]);
            
            // var_dump($order_id);
            // die;

            Notification::success('Đặt hàng thành công', 'Cảm ơn bạn đã mua hàng');
            header('location: /orders');
            exit();

        } catch (Exception $e) {
            Notification::error('Checkout thất bại', $e->getMessage());
            header('location: /checkout');
            exit();
        }
    }

}