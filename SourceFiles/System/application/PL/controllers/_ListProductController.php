<?php 
    class ProductsController {
        public function invoke () {
            

            include 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\admin\pages\PageListProduct.php';
        }
    }
    $productsController = new ProductsController();
    $productsController->invoke();
?>