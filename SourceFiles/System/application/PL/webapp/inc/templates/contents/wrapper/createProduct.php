<?php 
    // require_once "C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Unit.php";
    // require_once "C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Unit.php";

    // require_once "C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Category.php";
    // require_once "C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Category.php";


    // require_once "C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Brand.php";
    // require_once "C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Brand.php";

    $bUnit = new bo_Unit();
    $UnitAll = $bUnit->getUnitAll();

    $bCategory = new bo_Category();
    $CategoryAll = $bCategory->getCategoryAll();

    $bBrand = new bo_Brand();
    $BrandAll = $bBrand->getListBrandAll();

    $bGroupProduct = new bo_GroupProduct();
    $GroupProductAll = $bGroupProduct->getGroupProductAll();
?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container">
            <h3>Create New Product</h3>
            <form action="http://medicinestore.io/SourceFiles/System/application/PL/controllers/_CreatedProductController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="productName" required>
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="cost" name="cost" required>
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <select id="unit" class="form-select" name="unit" aria-label="Default select example">
                        <?php foreach ($UnitAll as $UnitItem) : ?>
                            <option value="<?= $UnitItem->getUnitID() ?>"><?= $UnitItem->getUnitName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <div class="form-outline">
                        <input min="10" max="20" type="number" id="quantity" name="quantity" class="form-control" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select id="brand" class="form-select" name="brand" aria-label="Default select example">
                        <?php foreach ($BrandAll as $BrandItem) : ?>
                            <option value="<?= $BrandItem->getBrandID() ?>"><?= $BrandItem->getBrandName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="groupProduct" class="form-label">Group Product</label>
                    <select id="groupProduct" class="form-select" name="groupProduct" aria-label="Default select example">
                        <?php foreach ($GroupProductAll as $GroupProductItem) : ?>
                            <option value="<?= $GroupProductItem->getGrProductID() ?>"><?= $GroupProductItem->getGrProductName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Product Description</label>
                    <textarea class="form-control" id="productDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <fieldset>
                        <label for="atributeProduct" class="form-label">Attribute Product</label>
                        <div class="row" id="atributeProduct">
                            <div class="col">
                                <button type="button" class="btn btn-outline-primary addProperty">
                                    <i class="fas fa-plus"></i> New Attribute</button>
                            </div>
                        </div>
                        <div class="container-field"></div>
                        <input type="hidden" value="" class="info-product" name="atributes">
                        <input type="hidden" class="btn btn-primary btn-save-property" value="Save property"/>
                    </fieldset>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" class="form-select" name="category" aria-label="Default select example">
                        <?php foreach ($CategoryAll as $CategoryItem) : ?>
                            <option value="<?= $CategoryItem->getCategoryID() ?>"><?= $CategoryItem->getCategoryName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" name="fileUpload" class="form-control" id="productImage" accept="image/*" multiple onchange="previewImages()">

                    <div id="preview-container"></div>
                </div>
                <button type="submit" class="btn btn-primary">Create product</button>
            </form>
        </div>
    </div>
</div>
