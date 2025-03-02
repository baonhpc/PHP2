<?php

namespace Src\Models\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Src\Models\BaseModel;

class ContactModel extends BaseModel
{


    public function sendContactMail($name, $email, $phone, $message)
    {
        $mail = new PHPMailer(true);

        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username =  $_ENV['APP_EMAIL'];
            $mail->Password =  $_ENV['APP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->setFrom($email, $name);
            $mail->addAddress($_ENV['APP_EMAIL'], 'Admin');
            $mail->addReplyTo($email, $name);

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = "Liên hệ từ: $name";
            $mail->Body = '
            <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9;">
                <h2 style="color: #007bff; text-align: center;"> Thông tin liên hệ mới</h2>
                <p><strong> Họ & Tên:</strong> ' . htmlspecialchars($name) . '</p>
                <p><strong> Email:</strong> ' . htmlspecialchars($email) . '</p>
                <p><strong> Số điện thoại:</strong> ' . htmlspecialchars($phone) . '</p>
                <p><strong> Nội dung:</strong></p>
                <div style="border-left: 4px solid #007bff; padding-left: 10px; background-color: #fff; padding: 10px; border-radius: 5px;">
                    ' . nl2br(htmlspecialchars($message)) . '
                </div>
                <br>
                <p style="text-align: center; color: #888;"> Đây là email tự động, vui lòng không trả lời!</p>
            </div>
        ';

            // Gửi email
            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }
}
