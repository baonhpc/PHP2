<?php 

namespace Src\Controllers\Client;

use Src\Models\Client\ContactModel;
use Src\Controllers\BaseController;
class ContactController extends BaseController{ 

    public function show(){
        echo $this->view->render('Client/Pages/Contact', ['Name' => 'Bao']);
    }

    public function sendMail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $message = $_POST['message'] ?? '';

            if (empty($name) || empty($email) || empty($message)) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin!']);
                exit;
            }

            $contactModel = new ContactModel();
            $result = $contactModel->sendContactMail($name, $email, $phone, $message);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Gửi email thành công!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi gửi email.']);
            }
        }
    }

}