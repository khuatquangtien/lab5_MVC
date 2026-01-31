<?php
// 1. Phải gọi BaseModel đầu tiên (Lớp Cha)
require_once 'App/Models/BaseModel.php'; 

// 2. Sau đó mới gọi đến Product (Lớp Con)
require_once 'App/Models/Product.php'; 

// 3. Cuối cùng mới gọi Controller
require_once 'App/Controllers/ProductController.php';

// 3. Sử dụng Namespace
use App\Controllers\ProductController;

// 4. Lấy tham số 'page'
$page = isset($_GET['page']) ? $_GET['page'] : 'product-list';

// 5. Khởi tạo Controller
$productCtrl = new ProductController();

// 6. Hệ thống Router
switch ($page) {
    case 'product-list':
        $productCtrl->index();
        break;

    case 'product-detail':
        $productCtrl->show(); 
        break;

    case 'product-delete':
        $productCtrl->delete();
        break;

    case 'product-add':
        $productCtrl->create();
        break;

    case 'product-store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productCtrl->store();
        }
        break;

    case 'product-edit':
        $productCtrl->edit();
        break;

    case 'product-update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productCtrl->update();
        }
        break;

    // ===> BỔ SUNG CASE NÀY ĐỂ TÌM KIẾM HOẠT ĐỘNG <===
    case 'product-search':
        $productCtrl->search();
        break;
    // =================================================

    default:
        echo "<h1 class='text-center mt-5'>404 - Trang không tồn tại!</h1>";
        break;
}