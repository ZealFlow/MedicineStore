<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Coupon.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Coupon.php';

    class bo_Coupon {
        private $dCoupon;

        public function __construct() {
            $this->dCoupon = new dao_Coupon();
        }

        public function ListCouponsOfUser($userID) {
            try {
                return $this->dCoupon->ListCouponsOfUser($userID);
            } catch (Exception $e) {
                // Handle the exception as needed
                return [];
            }
        }

        public function getCouponUser($couponID) {
            try {
                return $this->dCoupon->getCouponUser($couponID);
            } catch (Exception $e) {
                // Handle the exception as needed
                return null;
            }
        }

        public function CheckCoupon($couponCode, $userID) {
            if ($couponCode !== null) {
                $coupons = $this->ListCouponsOfUser($userID);
                foreach ($coupons as $cCode) {
                    if ($couponCode === $cCode->getCouponCode()) {
                        return new Coupon(
                            $cCode->getCouponID(),
                            $cCode->getCouponCode(),
                            $cCode->getStartTime(),
                            $cCode->getEndTime(),
                            $cCode->getQuantity(),
                            $cCode->getCouponType(),
                            $cCode->getStatus(),
                            $cCode->getSalePercent()
                        );
                    }
                }
            }
            return null;
        }
    }

?>
