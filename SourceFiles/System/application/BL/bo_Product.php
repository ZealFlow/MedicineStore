<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Product.php'; 

    class bo_Product {
        private $pdao;

        public function __construct() {
            $this->pdao = new dao_Product();
        }

        public function getProductAll() {
            try {
                return $this->pdao->getProductAll();
            } catch (Exception $e) {
                // Xử lý ngoại lệ (Exception) ở đây nếu cần
                return null;
            }
        }

        public function insertProduct($BrandID, $CategoryID, $UnitID, $GrProductID, $ProductName, $Quantity, $Description, $Product_Info) {
            try {
                return $this->pdao->insertProduct($BrandID, $CategoryID, $UnitID, $GrProductID, $ProductName, $Quantity, $Description, $Product_Info);
            } catch (Exception $e) {
                // Xử lý ngoại lệ (Exception) ở đây nếu cần
                return false;
            }
        }

        public function getProductID_newInsert() {
            try {
                return $this->pdao->getProductID_newInsert();
            } catch (Exception $e) {
                // Xử lý ngoại lệ (Exception) ở đây nếu cần
                return -1; // Giá trị mặc định khi xảy ra lỗi
            }
        }

        public function searchProductByName($keyword) {
            try {
                return $this->pdao->searchProductByName($keyword);
            } catch (Exception $e) {
                return -1; 
            }
        }

        public function searchPagitionProduct($keyword, $productsPerPage, $offset) {
            try {
                return $this->pdao->searchPagitionProduct($keyword, $productsPerPage, $offset);
            } catch (Exception $e) {
                return -1; 
            }
        }

        public function getTotalProducts() {
            try {
                return $this->pdao->getTotalProducts();
            } catch (Exception $e) {
                return -1; 
            }
        }

        public function getProductCountByGrProductID() { 
            try {
                return $this->pdao->getProductCountByGrProductID();
            } catch (Exception $e) {
                return -1; 
            }
        }

        public function getProductByID($ProductID) {
            try {
                return $this->pdao->getProductByID($ProductID);
            } catch (Exception $e) {
                return -1; 
            }
        }

        public function updateProduct($ProductID, $BrandID, $CategoryID, $UnitID, $GrProductID, $ProductName, $Quantity, $Description, $Product_Info) {
            try {
                return $this->pdao->updateProduct($ProductID, $BrandID, $CategoryID, $UnitID, $GrProductID, $ProductName, $Quantity, $Description, $Product_Info);
            } catch (Exception $e) {
                return -1; 
            }
        }
    }
?>
