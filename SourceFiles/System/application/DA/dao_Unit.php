<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\config\datebase.php'; 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Unit.php'; 

    class dao_Unit {
        public function getUnitAll() {
            $units = array();
            $connectDB = new SQLDriver();
            $connectDB->getConnection();

            try {
                $sql = "SELECT * FROM Unit";

                try {
                    $cmd = $connectDB->cn->prepare($sql);
                    $cmd->execute();

                    while ($rs = $cmd->fetch(PDO::FETCH_ASSOC)) {
                        $unitID = $rs['UnitID'];
                        $unitName = $rs['UnitName'];
                        $createdDate = $rs['CreatedDate'];

                        $unit = new Unit($unitID, $unitName, $createdDate);
                        $units[] = $unit;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            return $units;
        }
    }

?>
