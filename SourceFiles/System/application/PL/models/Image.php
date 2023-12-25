<?php

    class Image {
        private $ImageID;
        private $ProductID;
        private $PathImage;

        public function __construct ($imageID = null, $productID = null, $pathImage = null) {
            $this->ImageID = $imageID;
            $this->ProductID = $productID;
            $this->PathImage = $pathImage;
        }

        public function getImageID() {
            return $this->ImageID;
        }

        public function setImageID($imageID) {
            $this->ImageID = $imageID;
        }

        public function getProductID() {
            return $this->ProductID;
        }

        public function setProductID($productID) {
            $this->ProductID = $productID;
        }

        public function getPathImage() {
            return $this->PathImage;
        }

        public function setPathImage($pathImage) {
            $this->PathImage = $pathImage;
        }
    }

?>
