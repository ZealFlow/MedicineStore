<?php

require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_GroupProduct.php';

class bo_GroupProduct {
    private $prdao;

    public function __construct() {
        $this->prdao = new dao_GroupProduct();
    }

    public function getGroupProductAll() {
        try {
            return $this->prdao->getGroupProductAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return array(); 
        }
    }

    public function insertGroupProduct($newGroupProduct) {
        try {
            return $this->prdao->insertGroupProduct($newGroupProduct);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // Trong trường hợp có lỗi, trả về false
        }
    }
}

?>
