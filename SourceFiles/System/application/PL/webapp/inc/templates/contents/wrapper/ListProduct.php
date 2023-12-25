<?php
    require_once ('C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Product.php');
    require_once ('C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Product.php');

    $bProduct = new bo_Product();
    $ProductAll = $bProduct->getProductAll();
?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Products</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders"
                                            class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto">
                                <select class="form-select w-auto">
                                    <option selected value="option-1">All</option>
                                    <option value="option-2">This week</option>
                                    <option value="option-3">This month</option>
                                    <option value="option-4">Last 3 months</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="/WebeCommerce/create-product">New Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">ProductID</th>
                                            <th class="cell">ProductName</th>
                                            <th class="cell">Quantity</th>
                                            <th class="cell">CreatedDate</th>
                                            <th class="cell">Status</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ProductAll as $MedicineItem): ?>
                                            <tr>
                                                <td class="cell"><?php echo $MedicineItem->getProductID(); ?></td>
                                                <td class="cell"><span class="truncate"><?php echo $MedicineItem->getProductName(); ?></span></td>
                                                <td class="cell"><?php echo $MedicineItem->getQuantity(); ?></td>
                                                <td class="cell"><?php echo $MedicineItem->getCreatedDate(); ?></td>
                                                <td class="cell"><span class="badge bg-success"><?php echo $MedicineItem->getStatus(); ?></span></td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="http://medicinestore.io/SourceFiles/System/application/PL/controllers/_EditProductController.php?productID=<?php echo $MedicineItem->getProductID() ?>">Edit</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
