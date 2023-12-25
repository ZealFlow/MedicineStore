<?php
    class Brand {
        private $BrandID;
        private $BrandName;
        private $CreatedDate;

        public function __construct ($brandID = null, $brandName= null, $createdDate= null) {
            $this->BrandID = $brandID;
            $this->BrandName = $brandName;
            $this->CreatedDate = $createdDate;
        }

        public function getBrandID() {
            return $this->BrandID;
        }

        public function setBrandID($brandID) {
            $this->BrandID = $brandID;
        }

        public function getBrandName() {
            return $this->BrandName;
        }

        public function setBrandName($brandName) {
            $this->BrandName = $brandName;
        }

        public function getCreatedDate() {
            return $this->CreatedDate;
        }

        public function setCreatedDate($createdDate) {
            $this->CreatedDate = $createdDate;
        }
    }
?>
