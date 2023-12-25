<?php

require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cart.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_View_Cart.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Coupon.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Order.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_OrderDetail.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\User.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Coupon.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Cart.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Order.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\OrderDetail.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\View_Cart.php';

class CartController {

    public function invoke() {
        session_start();

        $bCart = new bo_Cart();
        $bvCart = new bo_View_Cart();
        $bCoupon = new bo_Coupon();

        $user = isset($_SESSION['User']) ? $_SESSION['User'] : null;

        if ($user === null) {
            header("Location: LoginController.php");
            exit();
        }

        $listCart = isset($_SESSION['MedicineCart']) ? $_SESSION['MedicineCart'] : [];

        try {
            $totalMoney = $bCart->getTotalMoney($user->getUserID());
            $_REQUEST['TotalMoney'] = $totalMoney;
        } catch (Exception $e) {
            $e->getMessage();
        }

        $couponCode = isset($_REQUEST['CouponCode']) ? $_REQUEST['CouponCode'] : '';
        $couponID = 0;

        if (!empty($couponCode)) {
            try {
                $coupon = $bCoupon->CheckCoupon($couponCode, $user->getUserID());
                $_SESSION['Coupon'] = $coupon;
                $_SESSION['SalePercent'] = $coupon->getSalePercent();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        $createdOrder = isset($_REQUEST['ac']) ? $_REQUEST['ac'] : '';
        $bOrder = new bo_Order();

        if (!empty($createdOrder) && $createdOrder === 'CreatedOrder') {
            try {
                if (isset($_SESSION['Coupon'])) {
                    $coupon = $_SESSION['Coupon'];
                    $couponID = $coupon->getCouponID();
                }

                $checkOrder = $bOrder->InsertOrder(new Order($user->getUserID(), $totalMoney, $couponID, 0, 0, 0));
                $bODetail = new bo_OderDetail();

                if ($checkOrder) {
                    foreach ($bCart->getCartAll_OfUser($user->getUserID()) as $itemInCart) {
                        $bODetail->InnerOrderDeatail(new OrderDetail($itemInCart->getProductID(), $bOrder->getOrderID_LastInsert(), $itemInCart->getQuantity()));
                    }

                    $_SESSION['NewOrder'] = $bOrder->getOrder_LastInsert();

                    header("Location: CheckOutServlet");
                    exit();
                }
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        if ($listCart === null || empty($listCart)) {
            $listCart = [];

            try {
                foreach ($bCart->getCartAll_OfUser($user->getUserID()) as $cartItem) {
                    $listCart[] = new View_Cart(
                        $cartItem->getProductID(),
                        $bvCart->getThumbnailProduct($cartItem->getProductID()),
                        $bvCart->getProduct($cartItem->getProductID())->getProductName(),
                        $bvCart->getBrandProduct($cartItem->getProductID()),
                        $cartItem->getQuantity(),
                        $bvCart->getCostProduct($cartItem->getProductID()),
                        $bvCart->getUnitProduct($cartItem->getProductID()),
                        $bvCart->getCategoryProduct($cartItem->getProductID())
                    );
                }
            } catch (Exception $e) {
                $e->getMessage();
            }

            $_SESSION['MedicineCart'] = $listCart;
        } else {
            $productIdToRemove = isset($_REQUEST['productID']) ? $_REQUEST['productID'] : '';
            $action = isset($_REQUEST['ac']) ? $_REQUEST['ac'] : '';

            if (!empty($action)) {
                if (!empty($productIdToRemove) && $action === 'delete') {
                    $productId = (int)$productIdToRemove;

                    try {
                        $deleteSuccess = $bCart->DeleteProduct($productId, $user->getUserID());

                        if ($deleteSuccess) {
                            foreach ($listCart as $cartItem) {
                                if ($cartItem->getProductID() == $productId) {
                                    $index = array_search($cartItem, $listCart);
                                    if ($index !== false) {
                                        array_splice($listCart, $index, 1);
                                    }
                                    break;
                                }
                            }

                            $_SESSION['MedicineCart'] = $listCart;
                            header("Location: medicine-cart");
                            exit();
                        }
                    } catch (Exception $e) {
                        $e->getMessage();
                    }
                }
            }
        }

        include 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\client\pages\PageCart.php';
    }
}

$cartController = new CartController();
$cartController->invoke();

?>
