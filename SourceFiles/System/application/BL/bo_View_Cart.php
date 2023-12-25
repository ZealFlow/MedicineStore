<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_View_Cart.php'; 

    class bo_View_Cart {
        private $dvCart;

        public function __construct() {
            $this->dvCart = new dao_View_Cart();
        }

        public function getThumbnailProduct($ProductID) {
            try {
                return $this->dvCart->getThumbnailProduct($ProductID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }

        public function getCostProduct($ProductID) {
            try {
                return $this->dvCart->getCostProduct($ProductID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }

        public function getBrandProduct($ProductID) {
            try {
                return $this->dvCart->getBrandProduct($ProductID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }

        public function getUnitProduct($ProductID) {
            try {
                return $this->dvCart->getUnitProduct($ProductID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }

        public function getCategoryProduct($ProductID) {
            try {
                return $this->dvCart->getCategoryProduct($ProductID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }

        public function getGroupProduct($ProductID, $GroupID) {
            try {
                return $this->dvCart->getGroupProduct($ProductID, $GroupID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }

        public function getProduct($ProductID) {
            try {
                return $this->dvCart->getProduct($ProductID);
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu cần
                return null;
            }
        }
    }

?>
