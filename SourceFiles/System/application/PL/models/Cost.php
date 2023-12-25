<?php

class Cost {
    private $CostID;
    private $cost;
    private $CreatedDate;
    private $ProductID;

    public function __construct ($costID = null, $cost = null, $createdDate = null, $productID = null) {
        $this->CostID = $costID;
        $this->cost = $cost;
        $this->CreatedDate = $createdDate;
        $this->ProductID = $productID;
    }

    public function getCostID() {
        return $this->CostID;
    }

    public function setCostID($costID) {
        $this->CostID = $costID;
    }

    public function getCost() {
        return $this->cost;
    }

    public function setCost($cost) {
        $this->cost = $cost;
    }

    public function getCreatedDate() {
        return $this->CreatedDate;
    }

    public function setCreatedDate($createdDate) {
        $this->CreatedDate = $createdDate;
    }

    public function getProductID() {
        return $this->ProductID;
    }

    public function setProductID($productID) {
        $this->ProductID = $productID;
    }
}
