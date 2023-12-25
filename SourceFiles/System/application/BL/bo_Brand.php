<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Brand.php';

    class bo_Brand {
        private $brdao;

        public function __construct() {
            $this->brdao = new dao_Brand();
        }

        public function getListBrandAll() {
            try {
                return $this->brdao->getListBrandAll();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function insertBrand($newBrand) {
            try {
                return $this->brdao->insertBrand($newBrand);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function getBrand($brandID) {
            try {
                return $this->brdao->getBrand($brandID);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function getProductsCountByBrand($BrandID) {
            try {
                return $this->brdao->getProductsCountByBrand($BrandID);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>
