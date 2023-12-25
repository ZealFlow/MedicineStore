<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Unit.php'; 

    class bo_Unit {
        private $udao;

        public function __construct() {
            $this->udao = new dao_Unit();
        }

        public function getUnitAll() {
            try {
                return $this->udao->getUnitAll();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return array();
        }
    }

?>
