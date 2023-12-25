<?php
    class Product
    {
        private $ProductID;
        private $BrandID;
        private $CategoryID;
        private $UnitID;
        private $GrProductID;
        private $SKU;
        private $ProductName;
        private $Quantity;
        private $Description;
        private $Product_Info;
        private $Status;
        private $CreatedDate;

        public function __construct($productID = null, $brandID = null, $categoryID = null, $unitID = null, $grProductID = null, $sKU = null, $productName = null,
            $quantity = null, $description = null, $product_Info = null, $status = null, $createdDate = null)
        {
            $this->SKU = $sKU;
            $this->ProductID = $productID;
            $this->BrandID = $brandID;
            $this->CategoryID = $categoryID;
            $this->UnitID = $unitID;
            $this->GrProductID = $grProductID;
            $this->ProductName = $productName;
            $this->Quantity = $quantity;
            $this->Description = $description;
            $this->Product_Info = $product_Info;
            $this->Status = $status;
            $this->CreatedDate = $createdDate;
        }

        public function getProductID()
        {
            return $this->ProductID;
        }

        public function setProductID($productID)
        {
            $this->ProductID = $productID;
        }

        public function getBrandID()
        {
            return $this->BrandID;
        }

        public function setBrandID($brandID)
        {
            $this->BrandID = $brandID;
        }

        public function getCategoryID()
        {
            return $this->CategoryID;
        }

        public function setCategoryID($categoryID)
        {
            $this->CategoryID = $categoryID;
        }

        public function getUnitID()
        {
            return $this->UnitID;
        }

        public function setUnitID($unitID)
        {
            $this->UnitID = $unitID;
        }

        public function getGrProductID()
        {
            return $this->GrProductID;
        }

        public function setGrProductID($grProductID)
        {
            $this->GrProductID = $grProductID;
        }

        public function getSKU()
        {
            return $this->SKU;
        }

        public function setSKU($sKU)
        {
            $this->SKU = $sKU;
        }

        public function getProductName()
        {
            return $this->ProductName;
        }

        public function setProductName($productName)
        {
            $this->ProductName = $productName;
        }

        public function getQuantity()
        {
            return $this->Quantity;
        }

        public function setQuantity($quantity)
        {
            $this->Quantity = $quantity;
        }

        public function getDescription()
        {
            return $this->Description;
        }

        public function setDescription($description)
        {
            $this->Description = $description;
        }

        public function getProduct_Info()
        {
            return $this->Product_Info;
        }

        public function setProduct_Info($product_Info)
        {
            $this->Product_Info = $product_Info;
        }

        public function getStatus()
        {
            return $this->Status;
        }

        public function setStatus($status)
        {
            $this->Status = $status;
        }

        public function getCreatedDate()
        {
            return $this->CreatedDate;
        }

        public function setCreatedDate($createdDate)
        {
            $this->CreatedDate = $createdDate;
        }
    }
?>