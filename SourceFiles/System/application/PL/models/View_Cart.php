<?php

    class View_Cart {
        private $ProductID;
        private $ThumbnailPath;
        private $ProductName;
        private $BrandName;
        private $Quantity;
        private $Cost;
        private $UnitName;
        private $CategoryName;

        public function __construct($productID, $thumbnailPath, $productName, $brandName, $quantity, $cost, $unitName, $categoryName) {
            $this->ProductID = $productID;
            $this->ThumbnailPath = $thumbnailPath;
            $this->ProductName = $productName;
            $this->BrandName = $brandName;
            $this->Quantity = $quantity;
            $this->Cost = $cost;
            $this->UnitName = $unitName;
            $this->CategoryName = $categoryName;
        }

        public function getProductID() {
            return $this->ProductID;
        }

        public function setProductID($productID) {
            $this->ProductID = $productID;
        }

        public function getCategoryName() {
            return $this->CategoryName;
        }

        public function setCategoryName($categoryName) {
            $this->CategoryName = $categoryName;
        }

        public function getThumbnailPath() {
            return $this->ThumbnailPath;
        }

        public function setThumbnailPath($thumbnailPath) {
            $this->ThumbnailPath = $thumbnailPath;
        }

        public function getProductName() {
            return $this->ProductName;
        }

        public function setProductName($productName) {
            $this->ProductName = $productName;
        }

        public function getBrandName() {
            return $this->BrandName;
        }

        public function setBrandName($brandName) {
            $this->BrandName = $brandName;
        }

        public function getQuantity() {
            return $this->Quantity;
        }

        public function setQuantity($quantity) {
            $this->Quantity = $quantity;
        }

        public function getCost() {
            return $this->Cost;
        }

        public function setCost($cost) {
            $this->Cost = $cost;
        }

        public function getUnitName() {
            return $this->UnitName;
        }

        public function setUnitName($unitName) {
            $this->UnitName = $unitName;
        }

        public function totalCost() {
            return $this->getQuantity() * $this->getCost();
        }
    }

?>
