<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php'; 
    class dao_Cost {
        public function insertCostProduct($newCost) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "INSERT INTO Costs (Cost, ProductID) VALUES (?, ?)";
            $cmd = $connectDB->cn->prepare($sql);

            $cmd->bindValue(1, $newCost->getCost(), PDO::PARAM_INT);
            $cmd->bindValue(2, $newCost->getProductID(), PDO::PARAM_INT);

            $rowsAffected = $cmd->execute();

            return $rowsAffected > 0;
        }

        public function getCostByProductID($productID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
    
            $sql = "SELECT Cost FROM Costs WHERE ProductID = ?";
            $cmd = $connectDB->cn->prepare($sql);
            $cmd->bindParam(1, $productID);
            $cmd->execute();
    
            $result = $cmd->fetch(PDO::FETCH_ASSOC);
    
            return $result ? $result['Cost'] : null;
        }
    }

?>
