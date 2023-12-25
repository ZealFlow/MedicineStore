<?php
    require 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\libs\google-api-php-client-2.4.0\vendor\autoload.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_User.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cart.php';

    class LoginController {
        public function invoke () {

            session_start();
            $bUser = new bo_User();
            $bCart = new bo_Cart();

            $client = new Google_Client();

            $client->setClientId('578037114526-ok90krm0i96cg7l826i2s3da19qat0m6.apps.googleusercontent.com');

            $client->setClientSecret('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');

            $client->setRedirectUri('http://medicinestore.io/SourceFiles/System/application/PL/controllers/LoginController.php');

            $client->addScope("email");
            $client->addScope("profile");

            if (isset($_GET['code'])) {
                $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            
                if (!isset($token["error"])) {
                    $client->setAccessToken($token['access_token']);
            
                    // Getting profile information
                    $google_oauth = new Google_Service_Oauth2($client);
                    $google_account_info = $google_oauth->userinfo->get();

                    if ($bUser->isEmail($google_account_info->email)) {
                        $ubo = new bo_User();
                        $user = $ubo->login($google_account_info->email, md5($google_account_info->id));
                        if ($user !== null) {
                            $_SESSION["User"] = $user;
                            header("Location: HomeController.php");
                            exit();
                        }
                    }
                    else {
                        $bUser->addAccount($google_account_info->name, $google_account_info->email, md5($google_account_info->id));
                        $bCart->CreateCart($google_account_info->email);
                        $ubo = new bo_User();
                        $user = $ubo->login($google_account_info->email, md5($google_account_info->id));
                        if ($user !== null) {
                            $_SESSION["User"] = $user;
                            header("Location: HomeController.php");
                            exit();
                        }
                    }
                } else {
                    header('Location: LoginCotroller.php');
                    exit;
                }
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["txtAccount"]) && isset($_POST["txtPass"])) {
                $un = $_POST["txtAccount"];
                $pass = $_POST["txtPass"];

                include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_User.php';

                $ubo = new bo_User();
                $user = $ubo->login($un, md5($pass));

                if ($user !== null) {
                    $_SESSION["User"] = $user;
                    header("Location: HomeController.php");
                    exit();
                } else {
                    $loginError = "Đăng nhập không thành công. Vui lòng kiểm tra tên đăng nhập và mật khẩu.";
                }
            }

            if (isset($_SESSION["User"])) {
                header("Location: HomeController.php");
                exit();
            }

            include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\client\pages\PageLogin.php';

        }
    }

    $loginController = new LoginController();
    $loginController->invoke ();
?>
