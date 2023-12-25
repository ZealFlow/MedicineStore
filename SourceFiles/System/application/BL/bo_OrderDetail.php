<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_OrderDetail.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\OrderDetail.php';

    class bo_OderDetail {
        private $dOrderDetail;

        public function __construct() {
            $this->dOrderDetail = new dao_OrderDetail();
        }

        public function InnerOrderDeatail($orderDetail) {
            try {
                return $this->dOrderDetail->InnerOrderDeatail($orderDetail);
            } catch (Exception $e) {
                $e->getMessage();
            }
            return false;
        }
    }
?>
