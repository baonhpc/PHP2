<?php

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
use Src\Notifications\Notification;
use Src\Models\Client\AddressModel;
use Src\Validations\Client\DataValidation;
use Src\Helpers\Client\AuthHelper;
use Src\Models\Client\OrderModel;

class UserInfoController extends BaseController
{

    public function myaccount()
    {
        echo $this->view->render('Client/UserProfile/MyAccount', ['Name' => 'Bao']);
    }
    public function orders()
    {
        $userId = $_SESSION['user']['id'];
        $orderModel = new OrderModel();
        $data = $orderModel->getAllOrdersByUser($userId);
        echo $this->view->render('Client/UserProfile/Orders', ['data' => $data]);
    }
    public function orderDetail()
    {
        echo $this->view->render('Client/UserProfile/OrderDetail', ['Name' => 'Bao']);
    }
    public function cancelOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['order_id'] ?? null;

            if ($orderId) {
                $orderModel = new OrderModel();
                $userId = $_SESSION['user']['id'];

                $order = $orderModel->getAllOrderByUserAndOrderId($orderId, $userId);

                if (!empty($order)) {

                    $orderDetails = $order[0];

                    if ($orderDetails['order_status'] == 1) {
                        $isCanceled = $orderModel->cancelOrder($orderId);

                        if ($isCanceled) {
                            Notification::success('Thành công', 'Đơn hàng đã được hủy.');
                        } else {
                            Notification::error('Thất bại', 'Lỗi khi hủy đơn hàng.');
                        }
                    } else {
                        Notification::error('Thất bại', 'Không thể hủy đơn hàng này.');
                    }
                } else {
                    Notification::error('Thất bại', 'Không tìm thấy đơn hàng của bạn.');
                }
            }
        }

        header('Location: /orders');
        exit;
    }

    public function address()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /myaccount');
            exit();
        }
        $AddressModel = new AddressModel();
        $data = $AddressModel->getAddressByUserId($_SESSION['user']['id']);
        echo $this->view->render('Client/UserProfile/Address', ['data' => $data]);
    }

    public function insertAddress()
    {
        $DataValidation = new DataValidation;
        $validation = $DataValidation($_POST);

        if (empty($validation)) {
            $AddressModel = new AddressModel();

            list($province_name, $province_id) = explode('|', $_POST['city']);
            list($district_name, $district_id) = explode('|', $_POST['district']);
            list($ward_name, $ward_id) = explode('|', $_POST['ward']);

            $data = [
                'province_id' => $province_id,
                'district_id' => $district_id,
                'ward_id' => $ward_id,
                'user_id' => $_SESSION['user']['id'],
                'address_username' => $_POST['address_username'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'province_name' => $province_name,
                'district_name' => $district_name,
                'ward_name' => $ward_name
            ];
            $result = $AddressModel->createAddress($data);
            if ($result) {
                Notification::success('Thành công', 'Đã thêm địa chỉ');
                header('location: /address');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi thêm địa chỉ');
                header('location: /address');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /address');
            exit();
        }
    }
    public function deleteAddress($id)
    {
        try {
            if (is_array($id)) {
                $id = reset($id);
            }

            $id = (int) $id;

            if ($id <= 0) {
                throw new \Exception('ID không hợp lệ');
            }
            $orderModel = new OrderModel();
            $relatedOrders = $orderModel->getOrdersByAddressId($id);
    
            if (!empty($relatedOrders)) {
                Notification::error(
                    'Thao tác thất bại',
                    'Không thể xóa địa chỉ này vì đang được sử dụng trong các đơn hàng.'
                );
                header('Location: /address');
                exit;
            }
            $AddressModel = new AddressModel();
            $result = $AddressModel->delete($id);

            if ($result) {
                Notification::success('Thành công', 'Đã xóa địa chỉ');
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi xóa địa chỉ');
            }
        } catch (\Exception $e) {
            Notification::error('Thất bại', 'Lỗi: ' . $e->getMessage());
        }

        header('location: /address');
        exit();
    }

    public function changePassword()
    {
        echo $this->view->render('Client/UserProfile/ChangePassword', ['Name' => 'Bao']);
    }
    public static function updatePasswordAction()
    {
        try {
            if (!isset($_POST['currentPassword']) || !isset($_POST['newPassword']) || !isset($_POST['confirmPassword'])) {
                Notification::error('Thất bại', 'Vui lòng điền đầy đủ thông tin');
                header('location:/myaccount');
                exit();
            }

            $data = [
                'currentPassword' => $_POST['currentPassword'],
                'newPassword' => $_POST['newPassword'],
                'confirmPassword' => $_POST['confirmPassword']
            ];

            $result = AuthHelper::updatePassword($data);

            if ($result) {
                Notification::success('Thành công', 'Đã cập nhật mật khẩu');
            }
        } catch (\Exception $e) {
            Notification::error('Thất bại', 'Đã xảy ra lỗi khi cập nhật mật khẩu');
        }

        header('location:/myaccount');
        exit();
    }

    public function register()
    {
        echo $this->view->render('Client/Pages/Signup', ['Name' => 'Bao']);
    }
}
