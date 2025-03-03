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

use Stripe\Stripe;
use Stripe\Checkout\Session;

use Src\Helpers\Client\VNPayHelper;



use Src\Controllers\BaseController;

class CheckoutController extends BaseController
{

    public function show()
    {
        try {
            if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
                throw new Exception('Vui lòng đăng nhập.');
            }
            $user_id  = $_SESSION['user']['id'];
            $CartModel = new CartModel();
            $data = $CartModel->getCartByUser($user_id);
            $id = $_SESSION['user']['id'];
            $addressModel = new AddressModel();
            $addressUser = $addressModel->getAddressByUserId($id);


            echo $this->view->render('Client/Payments/checkout', [
                'data' => $data,
                'addressUser' => $addressUser,
            ]);
        } catch (Exception $e) {
            Notification::error('Lỗi', $e->getMessage());
            header("Location: /signin");
            exit();
        }
    }

    public function checkOut()
    {
        if (!isset($_POST['payment-method'])) {
            Notification::error('Checkout thất bại', 'Không thể checkout');
            header('location: /checkout');
            exit();
        }
    
        $method = $_POST['payment-method'];
        $CartModel = new CartModel();
        $ProductSkusModel = new ProductSkusModel(); 
    
       
    
        if ($method === 'vnpay') {
            $VNPayHelper = new VNPayHelper();
            $OrderModel = new OrderModel();
            $OrderDetailsModel = new OrderDetailsModel();
    
            $database = new Database();
            $conn = $database->MySQLi();
            $conn->begin_transaction();
    
            $totalCost = 0;
            $userId = $_SESSION['user']['id'];
            $addressId = $_POST['shipping_method'] === 'store' ? NULL : $_POST['address'];
    
            try {
                $UserCart = $CartModel->getCartByUser($userId);
                foreach ($UserCart as $item) {
                    $price = explode('.', $item['total_price'])[0];
                    $totalCost += $price;
                }
    
                $data = [
                    'status' => 2,
                    'total_price' => $totalCost,
                    'user_id' => $userId,
                    'address_id' => $addressId
                ];
    
                $OrderInsertedId = $OrderModel->createOrderReturnId($data);
                if (!$OrderInsertedId) {
                    throw new Exception('Không thể tạo đơn hàng.');
                }
    
                foreach ($UserCart as $item) {
                    $orderDetailData = [
                        'order_id' => $OrderInsertedId,
                        'sku_id' => $item['sku_id'],
                        'price' => explode('.', $item['total_price'])[0],
                        'quantity' => $item['quantity']
                    ];
    
                    if (!$OrderDetailsModel->createDetail($orderDetailData)) {
                        throw new Exception('Không thể tạo chi tiết đơn hàng.');
                    }
    
                    $updateResult = $ProductSkusModel->decreaseStock($item['sku_id'], $item['quantity']);
                    if (!$updateResult) {
                        throw new Exception('Không thể cập nhật số lượng sản phẩm trong kho.');
                    }
                }
    
                $OrderInfo = $OrderModel->getOneOrder($OrderInsertedId);
                $bankContext = "Thanh toan don hang: " . $OrderInsertedId . ' - Media health care';
                $paymentURL = $VNPayHelper->createPayment($OrderInfo['total_price'], $bankContext, $OrderInsertedId);
                $conn->commit();
                header('location: ' . $paymentURL['data']);
            } catch (Exception $e) {
                $conn->rollback();
                error_log($e->getMessage());
                Notification::error('Checkout thất bại', 'Có lỗi xảy ra trong quá trình thanh toán.');
                header('location: /checkout');
                exit();
            }
        }
    
        if ($method === 'cash') {
            $UserCart = $CartModel->getCartByUser($_SESSION['user']['id']);
            $userId = $_SESSION['user']['id'];
            $addressId = $_POST['address'];
            $totalPrice = $_POST['totalPrice'];
    
            $conn = (new Database())->MySQLi();
            $conn->begin_transaction();
            $OrderModel = new OrderModel();
            $OrderDetailsModel = new OrderDetailsModel();
    
            try {
                $insertOrder = [
                    'status' => 1,
                    'total_price' => $totalPrice,
                    'user_id' => $userId,
                    'address_id' => $addressId
                ];
    
                $OrderInsertedId = $OrderModel->createOrderReturnId($insertOrder);
                if (!$OrderInsertedId) {
                    throw new Exception('Không thể tạo đơn hàng.');
                }
    
                foreach ($UserCart as $item) {
                    $orderDetailData = [
                        'order_id' => $OrderInsertedId,
                        'sku_id' => $item['sku_id'],
                        'price' => $item['total_price'],
                        'quantity' => $item['quantity']
                    ];
    
                    if (!$OrderDetailsModel->createDetail($orderDetailData)) {
                        throw new Exception('Không thể tạo chi tiết đơn hàng.');
                    }
    
                    $updateResult = $ProductSkusModel->decreaseStock($item['sku_id'], $item['quantity']);
                    if (!$updateResult) {
                        throw new Exception('Không thể cập nhật số lượng sản phẩm trong kho.');
                    }
                }
    
                $conn->commit();
                Notification::success('Đặt hàng thành công', 'Bạn đã đặt hàng thành công');
                $CartModel->deleteAllCarts($userId);
                header('location: /checkout-complete');
            } catch (Exception $e) {
                $conn->rollback();
                error_log($e->getMessage());
                Notification::error('Checkout thất bại', 'Có lỗi xảy ra trong quá trình thanh toán.');
                header('location: /checkout');
                exit();
            }
        }
        
    }

    public function response()
    {
        $VNPayHelper = new VNPayHelper();

        $CartModel = new CartModel();
        $OrderModel = new OrderModel();

        $id = $_GET['vnp_TxnRef	'];

        $result = $VNPayHelper->response();

        if (isset($result['error']) && $result['error'] === 1) {
            Notification::error('Giao dịch không thành công', 'Giao dịch không thành công, xin vui lòng thử lại');
            $OrderModel->delete($result['order_id']);
            header('location: /cart');
            exit();
        }
        if (isset($result['error']) && $result['error'] === 2) {
            Notification::error('Giao dịch không thành công', 'Giao dịch không thành công, chữ ký không hợp lệ');
            header('location: /cart');
            exit();
        }
        if ($result['status'] === 'success') {
            $deleteCart = $CartModel->deleteAllCarts($_SESSION['user']['id']);
            $UpdateStatus = $OrderModel->updateOrder($result['order_id'], ['status' => 3]); // 3 là đã thanh toán
            if ($deleteCart !== false && $UpdateStatus !== false) {
                Notification::success('Giao dịch thành công', 'Đơn hàng đã được đặt');
                header('location: /checkout-complete');
                exit();
            } else {
                Notification::error('Lỗi khi update dữ liệu', 'Đơn hàng đã được đặt nhưng chưa được cập nhật thông tin, vui lòng liên hệ quản trị viên');
                header('location: /cart');
                exit();
            }
        }
    }

    public function checkoutComplete()
    {

        echo $this->view->render('Client/Payments/checkoutComplete', [
            'Name' => 'Bao'
        ]);
    }
}
