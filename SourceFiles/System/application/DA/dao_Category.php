<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Category.php'; 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php'; 

    class dao_Category {
        public function getCategoryAll() {
            $ds = array();

            try {
                $connectDB = new SQLDriver();
                $connectDB->getConnection();

                $sql = "SELECT * FROM Category";

                $cmd = $connectDB->cn->prepare($sql);
                $cmd->execute();

                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $CategoryID = $row['CategoryID'];
                    $CategoryName = $row['CategoryName'];
                    $ds[] = new Category($CategoryID, $CategoryName);
                }

                $connectDB->cn = null; // Close the connection

            } catch (Exception $e) {
                // Handle exceptions if needed
                return null;
            }

            return $ds;
        }        
    }
?>
