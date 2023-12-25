<?php 
    class ProductsController {
        public function invoke () {
            

            include 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\client\pages\PageProducts.php';
        }
    }
    $productsController = new ProductsController();
    $productsController->invoke();
?>