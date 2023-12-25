<?php

require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Image.php';

class bo_Image {
    private $idao;

    public function __construct() {
        $this->idao = new dao_Image();
    }

    public function insertImage($ProductID, $PathImage) {
        try {
            return $this->idao->insertImage($ProductID, $PathImage);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function getFirstImage($ProductID) {
        try {
            return $this->idao->getFirstImage($ProductID);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }
}

?>
