<?php
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cart.php';
    $bCart = new bo_Cart();

    echo '<section class="bg-light my-5">
            <div class="container">
                <div class="row">';

    echo '<div class="col-lg-9">
            <div class="card border shadow-0">
                <div class="m-4">
                    <h4 class="card-title mb-4">Your Medicine Cart</h4>';

    // Load cart from session or initialize an empty array
    $MedicineCart = isset($_SESSION['MedicineCart']) ? $_SESSION['MedicineCart'] : [];

    foreach ($MedicineCart as $CartItem) {
        echo '<div class="row gy-3 mb-4">
                <div class="col-lg-5">
                    <div class="me-lg-5">
                        <div class="d-flex align-items-center">
                            <img src="/WebeCommerce/images_medicine/' . $CartItem->getThumbnailPath() . '" class="border rounded me-3" style="width: 96px; height: 96px;" />
                            <div class="">
                                <a href="#" class="nav-link fs-5">' . $CartItem->getProductName() . '</a>
                                <p class="text-muted">' . $CartItem->getBrandName() . '</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                    <div class="me-lg-3">
                        <input type="number" id="customQuantity" style="width: 100px;" class="form-control" placeholder="Quantity" min="1" step="1" value="' . $CartItem->getQuantity() . '" pattern="\d+" oninput="updateQuantity(' . $CartItem->getProductID() . ', this.value)">
                    </div>
                    <div class="text-start text-lg-end">
                        <p class="h6">' . $CartItem->totalCost() . ' VND</p>
                        <small class="text-muted text-nowrap"> ' . $CartItem->getCost() . ' / ' . $CartItem->getUnitName() . ' </small>
                    </div>
                </div>
                <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                    <div class="ms-auto">
                        <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                        <a href="CartController.php?ac=delete&&productID=' . $CartItem->getProductID() . '" class="btn btn-light border text-danger icon-hover-danger">Remove</a>
                    </div>
                </div>
            </div>';
    }

    echo '</div>
            <div class="border-top pt-4 mx-4 mb-4">
                <p>
                    <i class="fas fa-truck text-muted fa-lg"></i> Free Delivery
                    within 1-2 weeks
                </p>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip</p>
            </div>
        </div>
    </div>';

    echo '<div class="col-lg-3">
            <div class="card mb-3 border shadow-0">
                <div class="card-body">
                    <form action="CartController.php" method="post">
                        <div class="form-group">
                            <label class="form-label">Have coupon?</label>
                            <div class="input-group">
                                <input type="text" class="form-control border" name="CouponCode"
                                    placeholder="Coupon code" />
                                <button type="submit" class="btn btn-light border">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>';
    $TotalMoney = $bCart->getTotalMoney($_SESSION['User']->getUserID());
    $SalePercent = isset($_SESSION['SalePercent']) ? $_SESSION['SalePercent'] : 0;

    echo '
    <div class="card shadow-0 border">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Total price:</p>
                    <p class="mb-2">' . $TotalMoney . ' VND</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Discount:</p>
                    <p class="mb-2 text-success">- ' . $TotalMoney * ($SalePercent / 100) . '</p>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Total price:</p>
                    <p class="mb-2 fw-bold">' . ($TotalMoney - $TotalMoney * ($SalePercent / 100)) . ' VND</p>
                </div>
                <div class="mt-3">
                    <a href="CartController.php?ac=CreatedOrder" class="btn btn-success w-100 shadow-0 mb-2">CheckOut</a> 
                    <a href="HomeController.php" class="btn btn-light w-100 border mt-2">Back to shop </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>';

    $_SESSION['MedicineCart'] = $MedicineCart;
    $_SESSION['TotalMoney'] = $TotalMoney;
    $_SESSION['SalePercent'] = $SalePercent;
?>

<script>
    function updateQuantity(productID, newQuantity) {
        // Sử dụng AJAX để gọi đến hàm UpdateQuantity trên server
        // và truyền ProductID và newQuantity

        // Ví dụ sử dụng thư viện jQuery
        $.ajax({
            type: 'POST',
            url: 'http://medicinestore.io/SourceFiles/System/application/PL/controllers/CartController.php', 
            data: {
                productID: productID,
                newQuantity: newQuantity
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

