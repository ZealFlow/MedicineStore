<?php 
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Product.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cost.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Brand.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Image.php';

    $bProduct = new bo_Product();
    $bCost = new bo_Cost();
    $bBrand = new bo_Brand();
    $bImage = new bo_Image();

    $daoProduct = new dao_Product();

    // Kiểm tra nếu có tham số q (query) từ URL
    $keyword = isset($_GET['q']) ? $_GET['q'] : '';

    // Số sản phẩm trên mỗi trang
    $productsPerPage = 10;

    // Trang hiện tại, mặc định là trang 1
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính OFFSET để xác định bắt đầu của phạm vi kết quả
    $offset = ($current_page - 1) * $productsPerPage;

    if ($keyword != null) {
        $productResults = $bProduct->searchPagitionProduct($keyword, $productsPerPage, $offset);
    } else {
        $productResults = $bProduct->getProductAll();
    }

    // Lấy tổng số sản phẩm (cần thiết để tính số trang)
    $totalProducts = $daoProduct->getTotalProducts();

    // Tính tổng số trang
    $totalPages = ceil($totalProducts / $productsPerPage);
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 d-flex" style="width: 100%;">
                <?php foreach ($productResults as $product) { ?>
                    <div class="card" style="margin-right: 8px; width: 300px;">
                        <div class="d-flex justify-content-between p-3">
                            <h6 class="mb-0"><?php echo $bBrand->getBrand($product->getBrandID())->getBrandName() ?></h6>
                        </div>
                        <img src="http://medicinestore.io/SourceFiles/System/application/PL/webapp/public/assets/images/medicine/<?php echo $bImage->getFirstImage($product->getProductID()) ?>" class="card-img-top" alt="Medicine" />
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="small"><a href="#!" class="text-muted">View Medicine</a></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
