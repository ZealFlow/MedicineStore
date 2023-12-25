<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Coupon.php';

    class dao_Coupon {
        public function ListCouponsOfUser($userID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "SELECT * " .
                "FROM Coupon " .
                "RIGHT JOIN Coupon_User ON Coupon.CouponID = Coupon_User.CouponID " .
                "LEFT JOIN Account ON Coupon_User.UserID = Account.UserID " .
                "WHERE Account.UserID = ?";

            $couponList = [];

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(1, $userID, PDO::PARAM_INT);
                $cmd->execute();

                while ($rs = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    $coupon = new Coupon();
                    $coupon->setCouponID($rs['CouponID']);
                    $coupon->setCouponCode($rs['CouponCode']);
                    $coupon->setStartTime($rs['StartTime']);
                    $coupon->setEndTime($rs['EndTime']);
                    $coupon->setQuantity($rs['Quantity']);
                    $coupon->setCouponType($rs['CouponType']);
                    $coupon->setStatus($rs['Status']);
                    $coupon->setSalePercent($rs['SalePercent']);

                    $couponList[] = $coupon;
                }
            } catch (PDOException $e) {
                $e->getMessage();
            } finally {
                $connectDB->cn = null;
            }

            return $couponList;
        }

        public function getCouponUser($couponID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "SELECT * FROM Coupon WHERE CouponID = ?";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(1, $couponID, PDO::PARAM_INT);
                $cmd->execute();

                if ($rs = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    $coupon = new Coupon();
                    $coupon->setCouponID($rs['CouponID']);
                    $coupon->setCouponCode($rs['CouponCode']);
                    $coupon->setStartTime($rs['StartTime']);
                    $coupon->setEndTime($rs['EndTime']);
                    $coupon->setQuantity($rs['Quantity']);
                    $coupon->setCouponType($rs['CouponType']);
                    $coupon->setStatus($rs['Status']);
                    $coupon->setSalePercent($rs['SalePercent']);

                    return $coupon;
                }
            } catch (PDOException $e) {
                $e->getMessage();
            } finally {
                $connectDB->cn = null;
            }

            return null;
        }
    }

?>
