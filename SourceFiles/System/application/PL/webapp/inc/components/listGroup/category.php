<?php
   
    require_once 'C:/xampp/htdocs/MedicineStore/SourceFiles/System/application/BL/bo_Category.php';

    $bCategory = new bo_Category();

    $CategoryAll = $bCategory->getCategoryAll();
?>

<section class="mt-3">
    <div class="container">
        <main class="card p-3 shadow-2-strong">
            <div class="row">
                <div class="col-lg-3">
                    <nav class="nav flex-column nav-pills mb-md-2">
                        <?php foreach ($CategoryAll as $CategoryItem): ?>
                            <a class="nav-link py-2 ps-3 my-0" aria-current="page" href="#"><?= $CategoryItem->getCategoryName() ?></a>
                        <?php endforeach; ?>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <div class="card-banner h-auto p-5 bg-primary rounded-5" style="height: 350px;">
                        <div>
                            <h2 class="text-white">
                                Great products with <br /> best deals
                            </h2>
                            <p class="text-white">No matter how far along you are in your
                                sophistication as an amateur astronomer, there is always one.</p>
                            <a href="ProductsController.php" class="btn btn-light shadow-0 text-primary"> View Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</section>
