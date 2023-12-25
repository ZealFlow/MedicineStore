<?php
    class RegisterController {
        public function invoke() {
            session_start();

            require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_User.php';
            require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cart.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bUser = new bo_User();
                $bCart = new bo_Cart();

                try {
                    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
                    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
                    $password = isset($_POST['Password']) ? $_POST['Password'] : '';
                    $repeatPassword = isset($_POST['repeatPassword']) ? $_POST['repeatPassword'] : '';

                    // Validate required fields
                    $errors = $this->validateFields($fullName, $email, $password, $repeatPassword);

                    if (!empty($errors)) {
                        $_SESSION['error'] = implode('<br>', $errors);
                    } else {
                        if ($password != $repeatPassword) {
                            $_SESSION['error'] = "Mật khẩu và mật khẩu lặp lại không khớp.";
                        } else {
                            // Validate password complexity
                            $passwordErrors = $this->validatePassword($password);
                            if ($bUser->isEmail($email)) {
                                $_SESSION['error'] = "Email đã tồn tại !";
                                header("Location: RegisterController.php");
                            }
                            if (!empty($passwordErrors)) {
                                $_SESSION['error'] = implode('<br>', $passwordErrors);
                            } else {
                                $success = $bUser->addAccount($fullName, $email, md5($password));

                                if ($success) {
                                    $bCart->CreateCart($email);
                                    $_SESSION['success'] = "Tạo tài khoản thành công!";

                                    echo '<script>';
                                    echo 'alert("Tạo tài khoản thành công!");';
                                    echo 'window.location.href = "LoginController.php";';
                                    echo '</script>';
                                    exit();
                                } else {
                                    $_SESSION['error'] = "Đăng ký không thành công.";
                                }
                            }
                        }
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }

            include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\client\pages\PageRegister.php';
        }

        private function validateFields($fullName, $email, $password, $repeatPassword) {
            $errors = [];

            if (empty($fullName)) {
                $errors[] = "Vui lòng nhập họ và tên.";
            }

            if (empty($email)) {
                $errors[] = "Vui lòng nhập địa chỉ email.";
            }

            if (empty($password)) {
                $errors[] = "Vui lòng nhập mật khẩu.";
            }

            if (empty($repeatPassword)) {
                $errors[] = "Vui lòng nhập lại mật khẩu.";
            }

            return $errors;
        }

        private function validatePassword($password) {
            $passwordErrors = [];

            // Check for minimum length
            if (strlen($password) < 10) {
                $passwordErrors[] = "Mật khẩu phải có ít nhất 16 ký tự.";
            }

            // Check for at least one uppercase letter
            if (!preg_match('/[A-Z]/', $password)) {
                $passwordErrors[] = "Mật khẩu phải chứa ít nhất một ký tự viết hoa.";
            }

            // Check for at least one special character
            if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                $passwordErrors[] = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt.";
            }

            return $passwordErrors;
        }
    }

    $registerController = new RegisterController();
    $registerController->invoke();
?>
