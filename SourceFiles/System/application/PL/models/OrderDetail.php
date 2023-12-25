<?php

    class OrderDetail {
        private $ProductID;
        private $OrderID;
        private $Quantity;

        public function __construct($productID = null, $orderID = null, $quantity = null) {
            $this->ProductID = $productID;
            $this->OrderID = $orderID;
            $this->Quantity = $quantity;
        }

        public function getProductID() {
            return $this->ProductID;
        }

        public function setProductID($productID) {
            $this->ProductID = $productID;
        }

        public function getOrderID() {
            return $this->OrderID;
        }

        public function setOrderID($orderID) {
            $this->OrderID = $orderID;
        }

        public function getQuantity() {
            return $this->Quantity;
        }

        public function setQuantity($quantity) {
            $this->Quantity = $quantity;
        }
    }

?>
