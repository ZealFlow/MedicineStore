<?php

    class Unit {
        private $UnitID;
        private $UnitName;
        private $CreatedDate;

        public function __construct ($unitID = null, $unitName = null, $createdDate = null) {
            $this->UnitID = $unitID;
            $this->UnitName = $unitName;
            $this->CreatedDate = $createdDate;
        }

        public function getUnitID() {
            return $this->UnitID;
        }

        public function setUnitID($unitID) {
            $this->UnitID = $unitID;
        }

        public function getUnitName() {
            return $this->UnitName;
        }

        public function setUnitName($unitName) {
            $this->UnitName = $unitName;
        }

        public function getCreatedDate() {
            return $this->CreatedDate;
        }

        public function setCreatedDate($createdDate) {
            $this->CreatedDate = $createdDate;
        }
    }

?>
