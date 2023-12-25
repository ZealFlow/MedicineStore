<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\OrderDetail.php';

    class dao_OrderDetail {

        public function InnerOrderDeatail($orderDetail) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "INSERT INTO OrderDetails (ProductID, OrderID, Quantity) VALUES (?, ?, ?)";

            $cmd = $connectDB->cn->prepare($sql);

            $cmd->bind_param("iii", $orderDetail->getProductID(), $orderDetail->getOrderID(), $orderDetail->getQuantity());
            $cmd->execute();

            $rowsAffected = $cmd->affected_rows;
            $cmd->close();

            return $rowsAffected > 0;
        }
    }

?>
