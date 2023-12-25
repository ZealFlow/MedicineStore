<?php
    class Cart {
        private $CartID;
        private $ProductID;
        private $Quantity;

        public function __construct ($cartID = null, $productID = null, $quantity = null) {
            $this->CartID = $cartID;
            $this->ProductID = $productID;
            $this->Quantity = $quantity;
        }

        public function getCartID() {
            return $this->CartID;
        }

        public function setCartID($cartID) {
            $this->CartID = $cartID;
        }

        public function getProductID() {
            return $this->ProductID;
        }

        public function setProductID($productID) {
            $this->ProductID = $productID;
        }

        public function getQuantity() {
            return $this->Quantity;
        }

        public function setQuantity($quantity) {
            $this->Quantity = $quantity;
        }
    }
?>
