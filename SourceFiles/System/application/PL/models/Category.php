<?php
    class Category {
        private $CategoryID;
        private $CategoryName;

        public function __construct ($categoryID = null, $categoryName = null) {
            $this->CategoryID = $categoryID;
            $this->CategoryName = $categoryName;
        }

        public function getCategoryID() {
            return $this->CategoryID;
        }

        public function setCategoryID($categoryID) {
            $this->CategoryID = $categoryID;
        }

        public function getCategoryName() {
            return $this->CategoryName;
        }

        public function setCategoryName($categoryName) {
            $this->CategoryName = $categoryName;
        }
    }
?>
