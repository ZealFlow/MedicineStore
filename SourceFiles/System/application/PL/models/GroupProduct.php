<?php

class GroupProduct {
    private $GrProductID;
    private $CreateDate;
    private $GrProductName;

    public function __construct($grProductID = null, $createDate = null, $grProductName = null) {
        $this->GrProductID = $grProductID;
        $this->CreateDate = $createDate;
        $this->GrProductName = $grProductName;
    }

    public function getGrProductID() {
        return $this->GrProductID;
    }

    public function setGrProductID($grProductID) {
        $this->GrProductID = $grProductID;
    }

    public function getCreateDate() {
        return $this->CreateDate;
    }

    public function setCreateDate($createDate) {
        $this->CreateDate = $createDate;
    }

    public function getGrProductName() {
        return $this->GrProductName;
    }

    public function setGrProductName($grProductName) {
        $this->GrProductName = $grProductName;
    }
}

?>
