<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Product.php';

    class dao_Product {
        public function getProductAll() {
            $ds = array();
    
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
    
            $sql = "SELECT * FROM Product";
    
            $cmd = $connectDB->cn->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($result as $row) {
                $ProductID = $row["ProductID"];
                $BrandID = $row["BrandID"];
                $CategoryID = $row["CategoryID"];
                $UnitID = $row["UnitID"];
                $grProductID = $row["GrProductID"];
                $ProductName = $row["ProductName"];
                $Quantity = $row["Quantity"];
                $Description = $row["Description"];
                $Product_Info = $row["Product_Info"];
                $Status = $row["Status"];
                $CreatedDate = $row["CreatedDate"];
    
                $ds[] = new Product($ProductID, $BrandID, $CategoryID, $UnitID, $grProductID, $ProductName, $Quantity, $Description, $Product_Info, $Status, $CreatedDate);
            }
    
            $cmd->closeCursor(); 
            $connectDB->cn = null; 
    
            return $ds;
        }
    
        public function insertProduct($BrandID, $CategoryID, $UnitID, $GrProductID, $ProductName, $Quantity, $Description, $Product_Info) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "INSERT INTO Product (BrandID, CategoryID, UnitID, GrProductID, ProductName, Quantity, Description, Product_Info) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $cmd = $connectDB->cn->prepare($sql);
        
            $cmd->bindValue(1, $BrandID, PDO::PARAM_INT);
            $cmd->bindValue(2, $CategoryID, PDO::PARAM_INT);
            $cmd->bindValue(3, $UnitID, PDO::PARAM_INT);
            $cmd->bindValue(4, $GrProductID, PDO::PARAM_INT);
            $cmd->bindValue(5, $ProductName, PDO::PARAM_STR);
            $cmd->bindValue(6, $Quantity, PDO::PARAM_INT);
            $cmd->bindValue(7, $Description, PDO::PARAM_STR);
            $cmd->bindValue(8, $Product_Info, PDO::PARAM_STR);
        
            $rowsAffected = $cmd->execute();
        
            return $rowsAffected > 0;
        }

        public function updateProduct($ProductID, $BrandID, $CategoryID, $UnitID, $GrProductID, $ProductName, $Quantity, $Description, $Product_Info) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "UPDATE Product SET BrandID=?, CategoryID=?, UnitID=?, GrProductID=?, ProductName=?, Quantity=?, Description=?, Product_Info=? WHERE ProductID=?";
            $cmd = $connectDB->cn->prepare($sql);
        
            $cmd->bindValue(1, $BrandID, PDO::PARAM_INT);
            $cmd->bindValue(2, $CategoryID, PDO::PARAM_INT);
            $cmd->bindValue(3, $UnitID, PDO::PARAM_INT);
            $cmd->bindValue(4, $GrProductID, PDO::PARAM_INT);
            $cmd->bindValue(5, $ProductName, PDO::PARAM_STR);
            $cmd->bindValue(6, $Quantity, PDO::PARAM_INT);
            $cmd->bindValue(7, $Description, PDO::PARAM_STR);
            $cmd->bindValue(8, $Product_Info, PDO::PARAM_STR);
            $cmd->bindValue(9, $ProductID, PDO::PARAM_INT);
        
            $rowsAffected = $cmd->execute();
        
            return $rowsAffected > 0;
        }
    
        public function getProductID_newInsert() {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            $lastInsertedProductID = -1;
    
            try {
                $sql = "SELECT TOP 1 ProductID FROM Product ORDER BY CreatedDate DESC";
    
                $stmt = $connectDB->cn->prepare($sql);
                $stmt->execute();
    
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($result) {
                    $lastInsertedProductID = $result["ProductID"];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    
            return $lastInsertedProductID;
        }

        public function searchProductByName($keyword) {
            $ds = array();
        
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "SELECT * FROM Product WHERE ProductName LIKE :keyword";
        
            $cmd = $connectDB->cn->prepare($sql);
        
            // Bind the parameter with the wildcard '%' to perform a partial search
            $cmd->bindValue(':keyword', '%' . $keyword . '%');
        
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($result as $row) {
                $ProductID = $row["ProductID"];
                $BrandID = $row["BrandID"];
                $CategoryID = $row["CategoryID"];
                $UnitID = $row["UnitID"];
                $grProductID = $row["GrProductID"];
                $ProductName = $row["ProductName"];
                $Quantity = $row["Quantity"];
                $Description = $row["Description"];
                $Product_Info = $row["Product_Info"];
                $Status = $row["Status"];
                $CreatedDate = $row["CreatedDate"];
        
                $ds[] = new Product($ProductID, $BrandID, $CategoryID, $UnitID, $grProductID, $ProductName, $Quantity, $Description, $Product_Info, $Status, $CreatedDate);
            }
        
            $cmd->closeCursor(); // Close cursor to avoid potential issues
            $connectDB->cn = null; // Close connection
        
            return $ds;
        }

        public function searchPagitionProduct($keyword, $productsPerPage, $offset) {
            $ds = array();
        
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            
            try {
        
                // Sử dụng LIKE để tìm kiếm sản phẩm theo tên
                $sql = "SELECT * FROM Product WHERE ProductName LIKE :keyword";
        
                // Thêm OFFSET và FETCH NEXT để hỗ trợ phân trang
                $sql .= " ORDER BY ProductID OFFSET :offset ROWS FETCH NEXT :limit ROWS ONLY";
        
                $cmd = $connectDB->cn->prepare($sql);
                
                // Bắt đầu và kết thúc của phạm vi kết quả
                $start = $offset + 1;
                $end = $offset + $productsPerPage;
        
                // Gán giá trị cho các tham số
                $cmd->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $cmd->bindParam(':offset', $offset, PDO::PARAM_INT);
                $cmd->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        
                $cmd->execute();
                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        
                foreach ($result as $row) {
                    $ProductID = $row["ProductID"];
                    $BrandID = $row["BrandID"];
                    $CategoryID = $row["CategoryID"];
                    $UnitID = $row["UnitID"];
                    $grProductID = $row["GrProductID"];
                    $ProductName = $row["ProductName"];
                    $Quantity = $row["Quantity"];
                    $Description = $row["Description"];
                    $Product_Info = $row["Product_Info"];
                    $Status = $row["Status"];
                    $CreatedDate = $row["CreatedDate"];
                    
                    $ds[] = new Product($ProductID, $BrandID, $CategoryID, $UnitID, $grProductID, $ProductName, $Quantity, $Description, $Product_Info, $Status, $CreatedDate);
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        
            return $ds;
        } 
        
        public function getTotalProducts() {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            try {
        
                $sql = "SELECT COUNT(*) AS TotalProducts FROM Product";
        
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->execute();
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
        
                return $result['TotalProducts'];
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        
            return 0; // Trong trường hợp có lỗi, trả về 0
        }

        public function getProductCountByGrProductID() {
            
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            try {
                $sql = "SELECT GrProductID, COUNT(*) AS TotalProducts
                        FROM Product
                        GROUP BY GrProductID";
        
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->execute();
                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        
                $totalProducts = array();
                foreach ($result as $row) {
                    $totalProducts[$row['GrProductID']] = $row['TotalProducts'];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                $totalProducts = array();
            }
        
            return $totalProducts;
        }
        
        public function getProductByID($ProductID) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "SELECT * FROM Product WHERE ProductID = ?";
            $cmd = $connectDB->cn->prepare($sql);
            $cmd->bindValue(1, $ProductID, PDO::PARAM_INT);
            $cmd->execute();
        
            $row = $cmd->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                return null; 
            }
        
            $product = new Product(
                $row['ProductID'],
                $row['BrandID'],
                $row['CategoryID'],
                $row['UnitID'],
                $row['GrProductID'],
                $row['SKU'],
                $row['ProductName'],
                $row['Quantity'],
                $row['Description'],
                $row['Product_Info'],
                $row['Status'],
                $row['CreatedDate']
            );
        
            return $product;
        }
        
        
    }
?>
