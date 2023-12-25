<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Order.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Order.php';

    class bo_Order {
        private $dOrder;

        public function __construct() {
            $this->dOrder = new dao_Order();
        }

        public function InsertOrder($newOrder) {
            return $this->dOrder->InsertOrder($newOrder);
        }

        public function getOrderID_LastInsert() {
            return $this->dOrder->getOrderID_LastInsert();
        }

        public function getOrder_LastInsert() {
            return $this->dOrder->getOrder_LastInsert();
        }

        public function UpdateOrder($shippingID, $infoID, $shippingInfoID, $orderID) {
            return $this->dOrder->UpdateOrder($shippingID, $infoID, $shippingInfoID, $orderID);
        }

        function getOrdersCountForDate($date) {
            return $this->dOrder->getOrdersCountForDate($date);
        }
    }

?>
