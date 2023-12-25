<?php
    include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\utils\env.php';

    class SQLDriver {
        public $cn;

        public function getConnection() {
            try {
                $driver = "sqlsrv:Server=" . Env::DB_SERVER . ";Database=" . Env::databaseName;
                $this->cn = new PDO($driver, Env::user, Env::password);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
?>