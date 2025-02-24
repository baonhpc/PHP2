<?php

namespace Src\Controllers\Client;

use Src\Notifications\Notification;
use Src\Models\Client\CartModel;
use Src\Controllers\BaseController;
use Exception;

class CartController extends BaseController
{
    public function show()
    {
        try {

            if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
                throw new Exception('Vui lòng đăng nhập.');
            }

            $user_id = $_SESSION['user']['id'];
            $CartModel = new CartModel();
            $data = $CartModel->getCartByUser($user_id);
            echo $this->view->render('Client/Pages/Cart', ['data' => $data]);
        } catch (Exception $e) {
            Notification::error('Lỗi', $e->getMessage());
            header("Location: /signin");
            exit();
        }
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Phương thức không hợp lệ.');
            }

            if (!isset($_SESSION['user']['id'])) {
                Notification::error('Lỗi', 'Vui lòng đăng nhập để mua sản phẩm.');
                header("Location: /signin");
                exit();
            }

            if (empty($_POST['sku_options'])) {
                Notification::error('Lỗi', 'Vui lòng chọn sản phẩm.');
                header("Location: /detail/" . $_POST['product_id']);
                exit();
            }

            $data = [
                'sku_id' => $_POST['sku_options'],
                'quantity' => $_POST['quantity'] ?? null,
                'user_id' => $_SESSION['user']['id']
            ];

            $CartModel = new CartModel();
            $findExisted = $CartModel->findExistedSkuInCart($_SESSION['user']['id'], $_POST['sku_options']);

            if ($findExisted && count($findExisted) > 0) {
                $result = $CartModel->updateCart($findExisted['id'], ['quantity' => $findExisted['quantity'] + $_POST['quantity']]);
                if (!$result) {
                    throw new Exception('Không thể cập nhật giỏ hàng.');
                }
                header("Location: /cart");
                exit();
            }

            $saveResult = $CartModel->createCart($data);
            if (!$saveResult) {
                throw new Exception('Sản phẩm đã hết hàng.');
            }

            header("Location: /cart");
            exit();
        } catch (Exception $e) {
            Notification::error('Lỗi', $e->getMessage());
            header("Location: /list");
            exit();
        }
    }
    public function updateCart($params) {
        $id = $params['id'];
        if(!isset($_POST['quantity']) && is_numeric($_POST['quantity'])) {
            echo json_encode('No change');
            exit();
        }

        $quantity = $_POST['quantity'];


        $cartModel = new CartModel();
        $result = $cartModel->updateCart($id, ['quantity' => $quantity]);

        if($result) {
            echo json_encode($result);
            exit();
        }
 
        echo json_decode('failed');
        exit();
    }
    public function deleteOneCart() {
        $CartModel = new CartModel();
        $id = $_POST['id'];
        $result = $CartModel->deleteCart($id);
        if($result) {
            Notification::success('Đã xóa sản phẩm', 'Đã xóa sản phẩm ra khỏi giỏ hàng');
            header('location: /cart');
            exit();
        } 
        Notification::error('Xóa sản phẩm thất bại', 'Không thể xóa sản phẩm ra khỏi giỏ hàng');
        header('location: /cart');
        exit();
    }
}
