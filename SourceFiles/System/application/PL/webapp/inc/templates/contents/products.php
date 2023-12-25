<?php 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Brand.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Brand.php';

    $bBrand = new bo_Brand();
    $BrandAll = $bBrand->getListBrandAll();
?>

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <button class="btn btn-outline-secondary mb-3 w-100 d-lg-none"
                        type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span>Show filter</span>
                </button>
                <div class="collapse card d-lg-block mb-5"
                     id="navbarSupportedContent">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button text-dark bg-light"
                                        type="button" data-mdb-toggle="collapse"
                                        data-mdb-target="#panelsStayOpen-collapseTwo"
                                        aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                    Brands
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo"
                                 class="accordion-collapse collapse show"
                                 aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    <div>
                                        <?php
                                            foreach ($BrandAll as $BrandItem) {
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="flexCheckChecked1"/> <label
                                                class="form-check-label" for="flexCheckChecked1"><?php echo $BrandItem->getBrandName() ?></label>
                                            <span class="badge badge-secondary float-end" style="color: red"><?php echo $bBrand->getProductsCountByBrand($BrandItem->getBrandID()) ?></span>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button text-dark bg-light"
                                        type="button" data-mdb-toggle="collapse"
                                        data-mdb-target="#panelsStayOpen-collapseThree"
                                        aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    Price
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree"
                                 class="accordion-collapse collapse show"
                                 aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p class="mb-0">Min</p>
                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Max</p>
                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button"
                                            class="btn btn-white w-100 border border-secondary">apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                    <strong class="d-block py-2"><?php echo 0 ?> Items found </strong>
                </header>

                <div class="row d-flex">
                    <?php 
                        include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\inc\components\Cards\CardProduct.php';
                    ?>
                </div>

                <hr />

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="d-flex justify-content-center mt-3">
                     <ul class="pagination">
                        <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
                            <li class="page-item <?php echo ($current_page == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="ProductsController.php?page=<?php echo $page . '&q=' . $keyword; ?>"><?php echo $page; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
