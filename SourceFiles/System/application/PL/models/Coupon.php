<?php

    class Coupon {
        private $CouponID;
        private $CouponCode;
        private $StartTime;
        private $EndTime;
        private $Quantity;
        private $CouponType;
        private $Status;
        private $SalePercent;

        public function __construct($couponID = null, $couponCode = null, $startTime = null, $endTime = null, $quantity = null, $couponType = null, $status = null, $salePercent = null) {
            $this->CouponID = $couponID;
            $this->CouponCode = $couponCode;
            $this->StartTime = $startTime;
            $this->EndTime = $endTime;
            $this->Quantity = $quantity;
            $this->CouponType = $couponType;
            $this->Status = $status;
            $this->SalePercent = $salePercent;
        }

        public function getCouponID() {
            return $this->CouponID;
        }

        public function setCouponID($couponID) {
            $this->CouponID = $couponID;
        }

        public function getCouponCode() {
            return $this->CouponCode;
        }

        public function setCouponCode($couponCode) {
            $this->CouponCode = $couponCode;
        }

        public function getStartTime() {
            return $this->StartTime;
        }

        public function setStartTime($startTime) {
            $this->StartTime = $startTime;
        }

        public function getEndTime() {
            return $this->EndTime;
        }

        public function setEndTime($endTime) {
            $this->EndTime = $endTime;
        }

        public function getQuantity() {
            return $this->Quantity;
        }

        public function setQuantity($quantity) {
            $this->Quantity = $quantity;
        }

        public function getCouponType() {
            return $this->CouponType;
        }

        public function setCouponType($couponType) {
            $this->CouponType = $couponType;
        }

        public function getStatus() {
            return $this->Status;
        }

        public function setStatus($status) {
            $this->Status = $status;
        }

        public function getSalePercent() {
            return $this->SalePercent;
        }

        public function setSalePercent($salePercent) {
            $this->SalePercent = $salePercent;
        }
    }

?>
