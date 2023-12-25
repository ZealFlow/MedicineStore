<?php

require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\GroupProduct.php';

class dao_GroupProduct {
    public function getGroupProductAll() {
        $ds = array();

        $connectDB = new SQLDriver();
        $connectDB->getConnection();

        $sql = "SELECT * FROM Gr_Product";

        $cmd = $connectDB->cn->prepare($sql);
        $cmd->execute();
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $GrProductID = $row["GrProductID"];
            $GrProductName = $row["GrProductName"];
            $GrProductDate = $row["CreateDate"];

            $ds[] = new GroupProduct($GrProductID, $GrProductDate, $GrProductName);
        }

        $cmd->closeCursor(); // Đóng con trỏ để tránh vấn đề có thể xảy ra
        $connectDB->cn = null; // Đóng kết nối

        return $ds;
    }

    public function insertGroupProduct($newGroupProduct) {
        $connectDB = new SQLDriver();
        $connectDB->getConnection();

        $sql = "INSERT INTO Gr_Product (GrProductName) VALUES (?)";
        $cmd = $connectDB->cn->prepare($sql);

        $cmd->bindParam(1, $newGroupProduct->getGrProductName());

        $rowsAffected = $cmd->execute();

        return $rowsAffected > 0;
    }
}

?>
