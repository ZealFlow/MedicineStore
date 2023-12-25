<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Cost.php'; 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Cost.php';

    class bo_Cost {
        private $codao;

        public function __construct() {
            $this->codao = new dao_Cost();
        }

        public function insertCostProduct($newCost) {
            try {
                return $this->codao->insertCostProduct($newCost);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function getCostByProductID($productID) {
            try {
                return $this->codao->getCostByProductID($productID);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }

?>
