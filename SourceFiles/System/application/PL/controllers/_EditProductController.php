<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Image.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cost.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Product.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Image.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Product.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Cost.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Cost.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Unit.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Unit.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Brand.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Brand.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_Category.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\Category.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\BL\bo_GroupProduct.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\GroupProduct.php';


    class EditProductController {

        public function invoke() {
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $uploadDir = 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\public\assets\images\medicine'; // Thư mục lưu trữ ảnh
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Các định dạng ảnh được phép

                // Kiểm tra sự tồn tại của thư mục lưu trữ ảnh
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true); 
                }

                // Kiểm tra xem có file được upload không
                if (!empty($_FILES['fileUpload']['name'])) {
                    $fileNames = (is_array($_FILES['fileUpload']['name'])) ? $_FILES['fileUpload']['name'] : [$_FILES['fileUpload']['name']];
                    $fileTmpNames = (is_array($_FILES['fileUpload']['tmp_name'])) ? $_FILES['fileUpload']['tmp_name'] : [$_FILES['fileUpload']['tmp_name']];
                    $fileSizes = (is_array($_FILES['fileUpload']['size'])) ? $_FILES['fileUpload']['size'] : [$_FILES['fileUpload']['size']];
                    $fileErrors = (is_array($_FILES['fileUpload']['error'])) ? $_FILES['fileUpload']['error'] : [$_FILES['fileUpload']['error']];
                    $fileTypes = (is_array($_FILES['fileUpload']['type'])) ? $_FILES['fileUpload']['type'] : [$_FILES['fileUpload']['type']];

                    $count = count($fileNames);

                    $uploadedImages = [];

                    for ($i = 0; $i < $count; $i++) {
                        $fileExt = strtolower(pathinfo($fileNames[$i], PATHINFO_EXTENSION));

                        if (in_array($fileExt, $allowedExtensions)) {
                            if ($fileErrors[$i] === 0) {
                                $newFileName = uniqid('images_', true) . '.' . $fileExt;
                                $destination = $uploadDir . DIRECTORY_SEPARATOR . $newFileName;

                                array_push($uploadedImages, new Image("", "", $newFileName));

                                // Kiểm tra xem file đã tồn tại hay chưa
                                if (file_exists($destination)) {
                                    echo "File $newFileName already exists.<br>";
                                } else {
                                    if (move_uploaded_file($fileTmpNames[$i], $destination)) {
                                        echo "File $fileNames[$i] uploaded successfully.<br>";
                                    } else {
                                        echo "Error uploading $fileNames[$i].<br>";
                                    }
                                }
                            } else {
                                echo "Error uploading $fileNames[$i]. Error code: $fileErrors[$i]<br>";
                            }
                        } else {
                            echo "Invalid file type for $fileNames[$i].<br>";
                        }
                    }
                } else {
                    echo "Please select at least one file to upload.";
                }

                $productName = $_POST['productName'];
                $cost = $_POST['cost'];
                $unit = $_POST['unit'];
                $quantity = $_POST['quantity'];
                $brand = $_POST['brand'];
                $groupProduct = $_POST['groupProduct'];
                $description = $_POST['description'];
                $attributes = $_POST['atributes'];
                $category = $_POST['category'];


                $bImage = new bo_Image();
                $bProduct = new bo_Product();
                $bCost = new bo_Cost();

                echo $bProduct->updateProduct($_SESSION['productID'], $brand, $category, $unit, $groupProduct, $productName, $quantity, $description, $attributes);
                $bCost->insertCostProduct(new Cost($cost, $bProduct->getProductID_newInsert()));

                foreach ($uploadedImages as $image) {
                    $bImage->insertImage($_SESSION['productID'], $image->getPathImage());
                }
                
            }

            include_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\views\admin\pages\PageEditProduct.php';
        }
    }

    $editProductController = new EditProductController();
    $editProductController->invoke();

?>
