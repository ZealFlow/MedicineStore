<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Product.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cost.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Image.php';

    $bProduct = new bo_Product();
    $cCost = new bo_Cost();
    $bImage = new bo_Image();
    $ProductAll = $bProduct->getProductAll();
?>

<section>
    <div class="container my-5">
        <header class="mb-4">
            <h3>New products</h3>
        </header>

        <div class="row">
            <?php foreach ($ProductAll as $MedicineItem): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="card w-100 my-2 shadow-2-strong">
                        <img src="http://medicinestore.io/SourceFiles/System/application/PL/webapp/public/assets/images/medicine/<?php echo $bImage->getFirstImage($MedicineItem->getProductID()) ?>" class="card-img-top" style="aspect-ratio: 1/1" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Panadol <?= $MedicineItem->getProductID() ?></h5>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="HomeController.php?p_id=<?= $MedicineItem->getProductID() ?>&amp;p_Quantity=1" class="btn btn-primary shadow-0 me-1">Add to cart</a>
                                <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover">
                                    <i class="fas fa-heart fa-lg text-secondary px-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="container">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15235.914620704008!2d107.5949883!3d16.4637131!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142abdbb6af62c5%3A0xc2c4318f0ac7ef8a!2zVMO8IFRo4bqjbyBIdeG7s25nIMSQ4buTbmcgVGjhuqFvIFRo4bqhbyBMw6J5!5e0!3m2!1sen!2s!4v1647409785248!5m2!1sen!2s" frameborder="0" allowfullscreen></iframe>
</div>
