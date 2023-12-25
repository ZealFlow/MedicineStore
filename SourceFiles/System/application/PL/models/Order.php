<?php

    class Order {
        private $OrderID;
        private $InvoiceNumber;
        private $UserID;
        private $OrderDate;
        private $TotalAmount;
        private $Status;
        private $CouponID;
        private $ShippingID;
        private $InfoID;
        private $ShippingInfoID;

        public function __construct($orderID = null, $invoiceNumber = null, $userID = null, $orderDate = null, $totalAmount = null, $status = null, $couponID = null, $shippingID = null, $infoID = null, $shippingInfoID = null) {
            $this->OrderID = $orderID;
            $this->InvoiceNumber = $invoiceNumber;
            $this->UserID = $userID;
            $this->OrderDate = $orderDate;
            $this->TotalAmount = $totalAmount;
            $this->Status = $status;
            $this->CouponID = $couponID;
            $this->ShippingID = $shippingID;
            $this->InfoID = $infoID;
            $this->ShippingInfoID = $shippingInfoID;
        }

        public function getUserID() {
            return $this->UserID;
        }

        public function setUserID($userID) {
            $this->UserID = $userID;
        }

        public function getOrderID() {
            return $this->OrderID;
        }

        public function setOrderID($orderID) {
            $this->OrderID = $orderID;
        }

        public function getInvoiceNumber() {
            return $this->InvoiceNumber;
        }

        public function setInvoiceNumber($invoiceNumber) {
            $this->InvoiceNumber = $invoiceNumber;
        }

        public function getOrderDate() {
            return $this->OrderDate;
        }

        public function setOrderDate($orderDate) {
            $this->OrderDate = $orderDate;
        }

        public function getTotalAmount() {
            return $this->TotalAmount;
        }

        public function setTotalAmount($totalAmount) {
            $this->TotalAmount = $totalAmount;
        }

        public function getStatus() {
            return $this->Status;
        }

        public function setStatus($status) {
            $this->Status = $status;
        }

        public function getCouponID() {
            return $this->CouponID;
        }

        public function setCouponID($couponID) {
            $this->CouponID = $couponID;
        }

        public function getShippingID() {
            return $this->ShippingID;
        }

        public function setShippingID($shippingID) {
            $this->ShippingID = $shippingID;
        }

        public function getInfoID() {
            return $this->InfoID;
        }

        public function setInfoID($infoID) {
            $this->InfoID = $infoID;
        }

        public function getShippingInfoID() {
            return $this->ShippingInfoID;
        }

        public function setShippingInfoID($shippingInfoID) {
            $this->ShippingInfoID = $shippingInfoID;
        }
    }

?>
