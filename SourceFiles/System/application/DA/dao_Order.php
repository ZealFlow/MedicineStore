<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Order.php';

    class dao_Order {

        public static function generateInvoiceNumber() {
            $dateFormat = 'ymd';
            $datePart = date($dateFormat);
            $randomPart = sprintf("%04d", mt_rand(0, 9999));
            $invoiceNumber = "INV" . $datePart . $randomPart;

            return $invoiceNumber;
        }

        public function InsertOrder($newOrder) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "INSERT INTO Orders (InvoiceNumber, UserID, TotalAmount, CouponID) VALUES (?, ?, ?, ?)";

            $cmd = $connectDB->cn->prepare($sql);

            $invoiceNumber = self::generateInvoiceNumber();

            $cmd->bind_param("siii", $invoiceNumber, $newOrder->getUserID(), $newOrder->getTotalAmount(), $newOrder->getCouponID());
            $cmd->execute();

            $rowsAffected = $cmd->affected_rows;
            $cmd->close();

            return $rowsAffected > 0;
        }

        public function getOrderID_LastInsert() {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            $lastInsertedOrderID = -1;

            try {
                $sql = "SELECT OrderID FROM Orders ORDER BY OrderDate DESC LIMIT 1";

                $result = $connectDB->cn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $lastInsertedOrderID = $row['OrderID'];
                }
            } catch (Exception $e) {
                $e->getMessage();
            }

            return $lastInsertedOrderID;
        }

        public function getOrder_LastInsert() {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            $lastInsertedOrder = null;

            try {
                $sql = "SELECT * FROM Orders ORDER BY OrderDate DESC LIMIT 1";

                $result = $connectDB->cn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $lastInsertedOrder = new Order();
                    $lastInsertedOrder->setOrderID($row['OrderID']);
                    $lastInsertedOrder->setInvoiceNumber($row['InvoiceNumber']);
                    $lastInsertedOrder->setUserID($row['UserID']);
                    $lastInsertedOrder->setOrderDate($row['OrderDate']);
                    $lastInsertedOrder->setTotalAmount($row['TotalAmount']);
                    $lastInsertedOrder->setStatus($row['Status']);
                    $lastInsertedOrder->setCouponID($row['CouponID']);
                    $lastInsertedOrder->setShippingID($row['ShippingID']);
                    $lastInsertedOrder->setInfoID($row['InfoID']);
                    $lastInsertedOrder->setShippingInfoID($row['ShippingInfoID']);
                }
            } catch (Exception $e) {
                $e->getMessage();
            }

            return $lastInsertedOrder;
        }

        public function UpdateOrder($shippingID, $infoID, $shippingInfoID, $orderID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "UPDATE Orders SET ShippingID = ?, InfoID = ?, ShippingInfoID = ? WHERE OrderID = ?";

            $stmt = $connectDB->cn->prepare($sql);
            $stmt->bind_param("iiii", $shippingID, $infoID, $shippingInfoID, $orderID);
            $stmt->execute();

            $rowsAffected = $stmt->affected_rows;
            $stmt->close();

            return $rowsAffected > 0;
        }

        function getOrdersCountForDate($date) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            
            // Replace 'your_actual_date_column' with the correct column name
            $sql = "SELECT COUNT(*) as OrderCount
                    FROM Orders
                    WHERE CONVERT(DATE, OrderDate) = :date";
            
            $stmt = $connectDB->cn->prepare($sql);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->execute();
            
            // Lấy kết quả
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $result['OrderCount'];
        }        
         
    }

?>
