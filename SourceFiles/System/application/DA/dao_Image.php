<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_Image.php';

    class dao_Image {
        public function insertImage($ProductID, $PathImage) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "INSERT INTO Image (ProductID, PathImage) VALUES (?, ?)";
            
            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(1, $ProductID, PDO::PARAM_INT);
                $cmd->bindParam(2, $PathImage, PDO::PARAM_STR);

                $rowsAffected = $cmd->execute();
                return $rowsAffected > 0;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            return false;
        }

        public function getFirstImage($ProductID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "SELECT TOP 1 PathImage FROM Image WHERE ProductID = ?";
        
            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindValue(1, $ProductID);
                $cmd->execute();
        
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
        
                if ($result) {
                    return $result['PathImage'];
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
            return null;
        }
        
    }

?>
