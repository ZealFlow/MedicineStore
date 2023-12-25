<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Category.php'; 

    class bo_Category {
        private $cdao;

        public function __construct() {
            $this->cdao = new dao_Category();
        }

        public function getCategoryAll() {
            try {
                return $this->cdao->getCategoryAll();
            } catch (Exception $e) {
                // Xử lý ngoại lệ (Exception) ở đây nếu cần
                return null;
            }
        }
    }
?>