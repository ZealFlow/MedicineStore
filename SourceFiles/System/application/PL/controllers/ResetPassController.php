<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php'; // Đường dẫn tới autoloader của Composer, nếu sử dụng Composer
    
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_User.php';

    class ResetPassController {
        public function invoke() {
            session_start();

            $bUser = new bo_User();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    if ($bUser->isEmail($email)) {
                        // Tạo đối tượng PHPMailer
                        $mail = new PHPMailer(true);

                        // Cấu hình thông tin SMTP
                        $mail->isSMTP();
                        $mail->Host = 'your-smtp-host';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'your-smtp-username';
                        $mail->Password = 'your-smtp-password';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        // Thiết lập thông tin người gửi và người nhận
                        $mail->setFrom('your-email@example.com', 'Your Name');
                        $mail->addAddress('recipient@example.com', '20t1020110@husc.edu.vn');

                        // Thiết lập nội dung email
                        $token = bin2hex(random_bytes(32));
                        $subject = "Reset Password";
                        $message = "Lấy lại mật khẩu: http://medicinestore.io/SourceFiles/System/application/PL/webapp/views/client/pages/PageResetPassword.php?token=$token";
                        $mail->Subject = $subject;
                        $mail->Body = $message;

                        // Kiểm tra và gửi email
                        try {
                            $mail->send();
                            echo 'Email sent successfully.';
                        } catch (Exception $e) {
                            echo 'Error: ' . $e->getMessage();
                        }
                    }
                }
            }

            include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\client\pages\PageResetPassword.php';
        }
    }

    $resetPassController = new ResetPassController();
    $resetPassController->invoke();
?>
