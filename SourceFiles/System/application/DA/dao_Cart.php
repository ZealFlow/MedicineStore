<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Cart.php';

    class dao_Cart
    {
        public function UpdateQuantity($UserID, $ProductID, $Quantity) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            
            try {
                $pdo = $connectDB->cn;
                $sql = "UPDATE Cart_Product SET Quantity = ? WHERE CartID = ? AND ProductID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$Quantity, $UserID, $ProductID]);
                
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                return false; 
            }
        }
        

        public function CreateCart($email) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
            
            try {
                $pdo = $connectDB->cn; 
                $sql = "SELECT UserID FROM Account WHERE Email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
        
                // Lấy UserID từ kết quả truy vấn
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Kiểm tra xem có UserID hay không
                if ($userRow) {
                    $sqlInsertCart = "INSERT INTO Cart (CartID) VALUES (?)";
                    $stmtInsertCart = $pdo->prepare($sqlInsertCart);
                    $stmtInsertCart->execute([$userRow['UserID']]);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }        

        public function insertCart($newCart)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $checkIfExistsQuery = "SELECT COUNT(*) FROM Cart_Product WHERE CartID = ? AND ProductID = ?";

            try {
                $cartId = $newCart->getCartID();
                $productId = $newCart->getProductID();

                $checkIfExistsStmt = $connectDB->cn->prepare($checkIfExistsQuery);
                $checkIfExistsStmt->bindParam(1, $cartId, PDO::PARAM_INT);
                $checkIfExistsStmt->bindParam(2, $productId, PDO::PARAM_INT);
                $checkIfExistsStmt->execute();

                $rowCount = $checkIfExistsStmt->fetchColumn();

                if ($rowCount > 0) {
                    $updateQuery = "UPDATE Cart_Product SET Quantity = Quantity + ? WHERE CartID = ? AND ProductID = ?";
                    $updateStmt = $connectDB->cn->prepare($updateQuery);
                    $updateStmt->bindValue(1, $newCart->getQuantity(), PDO::PARAM_INT);
                    $updateStmt->bindValue(2, $cartId, PDO::PARAM_INT);
                    $updateStmt->bindValue(3, $productId, PDO::PARAM_INT);
                    $updateStmt->execute();

                    return $updateStmt->rowCount() > 0;
                } else {
                    $insertQuery = "INSERT INTO Cart_Product (CartID, ProductID, Quantity) VALUES (?, ?, ?)";
                    $insertStmt = $connectDB->cn->prepare($insertQuery);
                    $insertStmt->bindValue(1, $cartId, PDO::PARAM_INT);
                    $insertStmt->bindValue(2, $productId, PDO::PARAM_INT);
                    $insertStmt->bindValue(3, $newCart->getQuantity(), PDO::PARAM_INT);
                    $insertStmt->execute();

                    return $insertStmt->rowCount() > 0;
                }
            } catch (Exception $e) {
                return false;
            } 
        }

        public function getCartAll_OfUser($UserID) {
            $CartItems = [];
        
            $connectDB = new SQLDriver();
            $connectDB->getConnection();
        
            $sql = "SELECT * FROM Cart_Product WHERE CartID = :UserID";
            
            $cmd = $connectDB->cn->prepare($sql);
            $cmd->bindParam(':UserID', $UserID, PDO::PARAM_INT);
            $cmd->execute();
        
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($result as $rs) {
                $CartID = $rs['CartID'];
                $ProductID = $rs['ProductID'];
                $Quantity = $rs['Quantity'];
        
                $cart = new Cart($CartID, $ProductID, $Quantity);
                $CartItems[] = $cart;
            }
        
            return $CartItems;
        }
        

        public function deleteProductInCart($productID, $cartID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "DELETE FROM Cart_Product WHERE ProductID = ? AND CartID = ?";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindValue(1, $productID, PDO::PARAM_INT);
                $cmd->bindValue(2, $cartID, PDO::PARAM_INT);
                $cmd->execute();

                return $cmd->rowCount() > 0;
            } catch (Exception $e) {
                return false;
            } 
        }

        public function getQuantity_OfCartID($ProductID, $CartID)
        {
            $Quantity = 0;
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "SELECT Quantity FROM Cart_Product WHERE ProductID = ? AND CartID = ?";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindValue(1, $ProductID, PDO::PARAM_INT);
                $cmd->bindValue(2, $CartID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    $Quantity = $rs['Quantity'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 

            return $Quantity;
        }

        public function getTotalMoney($userID)
        {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $sql = "SELECT SUM(Cart_Product.Quantity * Costs.cost) AS Total " .
                "FROM Cart_Product " .
                "LEFT JOIN Product ON Cart_Product.ProductID = Product.ProductID " .
                "LEFT JOIN Costs ON Cart_Product.ProductID = Costs.ProductID " .
                "WHERE Cart_Product.CartID = ?";

            try {
                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindValue(1, $userID, PDO::PARAM_INT);
                $cmd->execute();

                $rs = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($rs) {
                    return $rs['Total'];
                }
            } catch (Exception $e) {
                // Handle the exception as needed
            } 

            return 0;
        }
    }
?>
