<?php

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
use Src\Helpers\Client\AuthHelper;
use Src\Models\Client\UserModel;
use Src\Validations\Client\UserValidation;
use Src\Notifications\Notification;

class AuthController extends BaseController
{

    public function login()
    {
        echo $this->view->render('Client/Pages/Signin', ['Name' => 'Bao']);
    }

    public function register()
    {
        echo $this->view->render('Client/Pages/Signup', ['Name' => 'Bao']);
    }

    public function store()
    {
        $data = [
            'firstname' => $_POST['firstname'] ?? null,
            'lastname' => $_POST['lastname'] ?? null,
            'email' => $_POST['email'] ?? null,
            'password' => $_POST['password'] ?? null,
            'passwordhash' => $_POST['passwordhash'] ?? null
        ];

        // Kích hoạt validation
        $validation = UserValidation::userValidation($data);
        if ($validation !== true) {
            Notification::error('Đăng ký thất bại', 'Email đã tồn tại');

            header('Location: /signup?status=failed');
            return;
        }

        // Nếu validation thành công, băm mật khẩu và tạo tài khoản
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $userData = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'status' => 1
        ];

        $userModel = new UserModel();
        $isCreated = $userModel->store($userData);

        if ($isCreated) {
            Notification::success('Đăng ký thành công', 'Bạn đã đăng ký thành công');
            header('Location: /signin?status=success');
            exit;
        } else {
            Notification::error('Đăng ký thất bại', 'Có lỗi đã xảy ra');

            header('Location: /signup?status=failed');
        }
    }

    public function authLogin()
    {
        $email = $_POST['email'];
        $userModel = new UserModel();
        $user = $userModel->findUserForLogin('email', $email);
        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                Notification::success('Đăng nhập thành công', 'Bạn đã đăng nhập thành công');
                $_SESSION['user']['fullname'] = $user['firstname'] . ' ' . $user['lastname'];
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['phone'] = $user['phone'];
                $_SESSION['user']['firstname'] = $user['firstname'];
                $_SESSION['user']['lastname'] = $user['lastname'];
                $_SESSION['user']['email'] = $user['email'];
                $_SESSION['user']['role'] = $user['role'];
                $_SESSION['user']['status'] = $user['status'];

                header('location: /home');
                exit();
            } else {
                Notification::error('Đăng nhập thất bại', 'Thông tin đăng nhập không chính xác');
                header('location: /signin');
                exit();
            }
        } else {
            Notification::error('Đăng nhập thất bại', 'Thông tin đăng nhập không chính xác');
            header('location: /signin');
            exit();
        }
    }

    public function logoutUser()
    {
        $userHelper = new AuthHelper;
        $userHelper->logout();
        Notification::success('Đăng xuất thành công', 'bạn đã đăng xuất khỏi tài khoản');
        header('Location: /signin');
        exit;
    }

    public static function updateUserInfoAction()
    {
        $data = [
            'fullname' => $_POST['fullname'],
            'firstname' => $_POST['firstname'],
            'lastname' =>  $_POST['lastname'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email']
        ];
        $checkDuplicate = AuthHelper::checkInformation($data);
        if (!$checkDuplicate) {
            header('location: /myaccount');
            exit();
        }

        $errors = UserValidation::updateUserInfoValidation($data);
        if (is_array($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                Notification::error("Cập nhật thông tin", $error);
            }
            header('location: /myaccount');
            exit();
        }
        if (isset($_SESSION['user']['google_id']) && !empty($_SESSION['user']['google_id'])) {
            $data['email'] = $_SESSION['user']['email'];
        }
        AuthHelper::update($data);
        header('location: /myaccount');
    }
}
