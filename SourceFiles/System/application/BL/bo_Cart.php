<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Cart.php'; 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Cart.php'; 

    class bo_Cart {
        private $cartdao;

        public function __construct() {
            $this->cartdao = new dao_Cart();
        }

        public function insertCart($newCart) {
            return $this->cartdao->insertCart($newCart);
        }

        public function getCartAll_OfUser($UserID) {
            return $this->cartdao->getCartAll_OfUser($UserID);
        }

        public function CreateCart($email) { 
            return $this->cartdao->createCart($email);
        }

        public function getQuantity_OfCartID($ProductID, $CartID) {
            return $this->cartdao->getQuantity_OfCartID($ProductID, $CartID);
        }

        public function deleteProduct($productID, $cartID) {
            return $this->cartdao->deleteProductInCart($productID, $cartID);
        }

        public function getTotalMoney($userID) {
            return $this->cartdao->getTotalMoney($userID);
        }

        public function UpdateQuantity($UserID, $ProductID, $Quantity) {
            return $this->cartdao->updateQuantity($UserID, $ProductID, $Quantity);
        }
    }

?>
