<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php'; 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\User.php'; 

    class dao_User {

        public function login($account, $pass) {
            try {
                $connectDB = new SQLDriver();
                $connectDB->getConnection();

                $sql = "SELECT * FROM Account WHERE Email = ? and Password = ?";

                $cmd = $connectDB->cn->prepare($sql);

                $cmd->bindParam(1, $account);
                $cmd->bindParam(2, $pass);

                $cmd->execute();
                $resultSet = $cmd->fetch(PDO::FETCH_ASSOC);

                if ($resultSet) {
                    $userID = $resultSet['UserID'];
                    $fullName = $resultSet['FullName'];
                    $password = $resultSet['Password'];
                    $email = $resultSet['Email'];
                    $address = $resultSet['Address'];
                    $phone = $resultSet['Phone'];
                    $status = $resultSet['Status'];
                    $role = $resultSet['Role'];

                    $getUser = new User($userID, $fullName, $password, $email, $address, $phone, $status, $role);
                    return $getUser;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }

        public function addAccount($fullName, $email, $password) {
            try {
                $connectDB = new SQLDriver();
                $connectDB->getConnection();

                $sql = "INSERT INTO Account (FullName, Email, Password) VALUES (?, ?, ?)";

                $cmd = $connectDB->cn->prepare($sql);
                $cmd->bindParam(1, $fullName);
                $cmd->bindParam(2, $email);
                $cmd->bindParam(3, $password);

                $affectedRows = $cmd->execute();

                return $affectedRows > 0;
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function isEmail($Email) {
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            $cmd = $connectDB->cn->prepare("SELECT COUNT(*) as count FROM Account WHERE email = ?");
            $cmd->bindParam(1, $Email);
            $cmd->execute();
            $cmd->execute();

            $row = $cmd->fetch(PDO::FETCH_ASSOC);

            $count = $row['count'];
        
            return $count > 0;
        }
        
    }

?>
