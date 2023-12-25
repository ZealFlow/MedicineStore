<?php

    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/BL/bo_Product.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/DA/dao_Category.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/BL/bo_Cart.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/BL/bo_View_Cart.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/BL/bo_Category.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/PL/models/User.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/PL/models/Cart.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/PL/models/Product.php';
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/PL/models/View_Cart.php';

    class HomeController {
        public function invoke() {
            session_start();

            $bProduct = new bo_Product();
            $bCategory = new bo_Category();
            $bCart = new bo_Cart();
            $bvCart = new bo_View_Cart();

            $user = $_SESSION['User'] ?? null;

            $listCart = array();

            $action = $_GET['ac'] ?? null;

            if ("sign-out" == $action) {
                unset($_SESSION['User']);
                unset($_SESSION['MedicineCart']);

                header("Location: HomeController.php");
                exit;
            }

            if (isset($_GET['p_id'])) {
                if (!$user) {
                    header("Location: LoginController.php");
                    exit;
                }

                $p_Id = (int)$_GET['p_id'];
                $p_Quantity = (int)$_GET['p_Quantity'];

                try {
                    $bCart->insertCart(new Cart($user->getUserID(), $p_Id, $p_Quantity));
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                $product = null;
                try {
                    $product = $bvCart->getProduct($p_Id);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                $productName = $product->getProductName();
                $QuantityProduct = 0;
                try {
                    $QuantityProduct = $bCart->getQuantity_OfCartID($p_Id, $user->getUserID());
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                $productExistsInCart = false;
                $listCart = $_SESSION['MedicineCart'] ?? array();

                if ($listCart) {
                    foreach ($listCart as $vcart) {
                        if ($vcart->getProductID() == $p_Id) {
                            $vcart->setQuantity($QuantityProduct);
                            $productExistsInCart = true;
                            break;
                        }
                    }
                }

                if (!$productExistsInCart) {
                    try {
                        if (!$listCart) {
                            $listCart = array();
                        }

                        $listCart[] = new View_Cart(
                            $p_Id,
                            $bvCart->getThumbnailProduct($p_Id),
                            $productName,
                            $bvCart->getBrandProduct($p_Id),
                            $QuantityProduct,
                            $bvCart->getCostProduct($p_Id),
                            $bvCart->getUnitProduct($p_Id),
                            $bvCart->getCategoryProduct($p_Id)
                        );

                        $_SESSION['MedicineCart'] = $listCart;
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }
            }

            try {
                $categoryAll = $bCategory->getCategoryAll();
                $_SESSION['ProductAll'] = $bProduct->getProductAll();
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            include_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/PL/webapp/views/client/index.php';
        }
    }

    $homeController = new HomeController();
    $homeController->invoke();
?>
