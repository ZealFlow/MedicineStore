<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Order.php';

    class CharController {
        public function invoke() {
            session_start();

            $bOrder = new bo_Order();

            if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
                $startDate = $_GET['startDate'];
                $endDate = $_GET['endDate'];
                
                $dateArray = $this->getDates($startDate, $endDate);
                
                $ordersCountArray = [];
                
                foreach($dateArray as $date) {
                    $ordersCount = $bOrder->getOrdersCountForDate($date);
                    $ordersCountArray[$date] = $ordersCount;
                }
                $_SESSION['ordersCountArray'] = $ordersCountArray;
            }

            include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\admin\pages\PageChart.php';
        }

        function getDates($startDate, $endDate) {
            $dateArray = [];
            $currentDate = new DateTime($startDate);
        
            while ($currentDate <= new DateTime($endDate)) {
                $dateArray[] = $currentDate->format('Y-m-d'); 
                $currentDate->modify('+1 day');
            }
        
            return $dateArray;
        }
    }

    $charController = new CharController();
    $charController->invoke();
?>