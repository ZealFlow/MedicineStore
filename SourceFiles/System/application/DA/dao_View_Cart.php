<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php'; 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Product.php'; 

    class dao_View_Cart {
        public function getThumbnailProduct($ProductID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $PathImage = "";
            $sql = "SELECT * FROM Image WHERE ProductID = :ProductID";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $PathImage = $rs['PathImage'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            }

            return $PathImage;
        }


        public function getCostProduct($ProductID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $CostProduct = 0;
            $sql = "SELECT * FROM Costs WHERE ProductID = :ProductID";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $CostProduct = $rs['Cost'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 
            return $CostProduct;
        }


        public function getBrandProduct($ProductID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $BrandProduct = "";
            $sql = "SELECT Brand.BrandName FROM Brand INNER JOIN Product ON Brand.BrandID = Product.BrandID WHERE ProductID = :ProductID";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $BrandProduct = $rs['BrandName'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 

            return $BrandProduct;
        }


        public function getUnitProduct($ProductID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $UnitProduct = "";
            $sql = "SELECT Unit.UnitName FROM Unit INNER JOIN Product ON Unit.UnitID = Product.UnitID WHERE ProductID = :ProductID";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $UnitProduct = $rs['UnitName'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 

            return $UnitProduct;
        }


        public function getCategoryProduct($ProductID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $CategoryProduct = "";
            $sql = "SELECT Category.CategoryName FROM Category INNER JOIN Product ON Category.CategoryID = Product.CategoryID WHERE ProductID = :ProductID";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $CategoryProduct = $rs['CategoryName'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 

            return $CategoryProduct;
        }


        public function getGroupProduct($ProductID, $GrProductID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $GrProductName = "";
            $sql = "SELECT GrProduct.GrProductName FROM GrProduct INNER JOIN Product ON GrProduct.GrProductID = Product.GrProductID WHERE ProductID = ? AND GrProduct.GrProductID = ?";

            $cmd = $connectDB->cn->prepare($sql);
            $cmd->bind_param('ii', $ProductID, $GrProductID);
            $cmd->execute();

            $rs = $cmd->get_result();
            if ($row = $rs->fetch_assoc()) {
                $GrProductName = $row['GrProductName'];
            }

            return $GrProductName;
        }

        public function getProduct($ProductID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $product = null;
            $sql = "SELECT * FROM Product WHERE ProductID = :ProductID";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $product = new Product(
                        $rs['ProductID'],
                        $rs['BrandID'],
                        $rs['CategoryID'],
                        $rs['UnitID'],
                        $rs['GrProductID'],
                        $rs['ProductName'],
                        $rs['Quantity'],
                        $rs['Description'],
                        $rs['Product_Info'],
                        $rs['Status'],
                        $rs['CreatedDate']
                    );
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 

            return $product;
        }
    }

?>
