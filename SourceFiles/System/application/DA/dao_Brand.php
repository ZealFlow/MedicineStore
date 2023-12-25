<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Brand.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';

    class dao_Brand {
        public function getListBrandAll() {
            $brands = array();
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "SELECT * FROM Brand";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->execute();
                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $brandID = $row["BrandID"];
                    $createdDate = $row["CreatedDate"];
                    $brandName = $row["BrandName"];

                    $brand = new Brand($brandID, $brandName, $createdDate);
                    $brands[] = $brand;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $cmd->closeCursor(); // Close cursor to avoid potential issues
            $connectDB->cn = null; // Close connection

            return $brands;
        }

        public function insertBrand($newBrand) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "INSERT INTO Brand (BrandName) VALUES (?)";
            $cmd = $connectDB->cn->prepare($sql);

            $cmd->bindParam(1, $newBrand->getBrandName());

            $rowsAffected = $cmd->execute();

            return $rowsAffected > 0;
        }

        public function getBrand($brandID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "SELECT * FROM Brand WHERE BrandID = ?";
            $cmd = $connectDB->cn->prepare($sql);
        
            // Assuming BrandID is an integer
            $cmd->bindParam(1, $brandID);
        
            $cmd->execute();
            
            // Fetch the result
            $result = $cmd->fetch(PDO::FETCH_ASSOC);
        
            // Check if the result is not empty
            if ($result) {
                $brand = new Brand();
                $brand->setBrandID($result['BrandID']);
                $brand->setBrandName($result['BrandName']);
                $brand->setCreatedDate($result['CreatedDate']);
                
                return $brand;
            } else {
                return null;
            }
        }

        public function getProductsCountByBrand($BrandID) {
            $ds = array();
        
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            try {
                $sql = "SELECT COUNT(Product.ProductID) AS TotalProducts
                        FROM Brand
                        LEFT JOIN Product ON Brand.BrandID = Product.BrandID
                        WHERE Brand.BrandID = :brandID";
        
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':brandID', $BrandID, PDO::PARAM_INT);
                $cmd->execute();
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
        
                $ds = $result['TotalProducts'];
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        
            return $ds;
        }
        
    }
?>
