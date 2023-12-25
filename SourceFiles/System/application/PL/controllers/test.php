<?php 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Product.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Product.php';

    $bProduct = new bo_Product();
    $product = new Product(null, 1, 1, 22, 12,"", "TEST", 12, "tEST", null, "test");
    // new Product(1, 1, 1, 2, "TSS", 10, "qưdqw", "12312");
    echo $product->getProductName();
    echo $bProduct->insertProduct(1, 1, 1, 22, "TEST", 12, "tEST", "e");
?>