<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    protected $productModel;

    public function __construct() {
        // Khởi tạo Model để các hàm bên dưới sử dụng
        $this->productModel = new Product();
    }

    // 1. Hiển thị danh sách (Bạn đã có)
    public function index() {
        $products = $this->productModel->all();
        include "views/layout/header.php";
        include "views/product-list.php";
        include "views/layout/footer.php";
    }

    // 2. Hiển thị chi tiết sản phẩm
    public function show() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $product = $this->productModel->find($id);
            include "views/layout/header.php";
            include "views/product-detail.php";
            include "views/layout/footer.php";
        }
    }

    // 3. Hiển thị form thêm mới
    public function create() {
        include "views/layout/header.php";
        include "views/product-add.php";
        include "views/layout/footer.php";
    }

    // 4. Xử lý lưu sản phẩm mới
    public function store() {
        // Thu thập dữ liệu từ form
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'image' => $_POST['image']
        ];

        // Validate cơ bản
        if (empty($data['name']) || empty($data['price'])) {
            header("Location: index.php?page=product-add&error=missing");
            exit;
        }

        $this->productModel->insert($data);
        header("Location: index.php?page=product-list");
    }

    // 5. Hiển thị form chỉnh sửa
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $product = $this->productModel->find($id);
            include "views/layout/header.php";
            include "views/product-edit.php";
            include "views/layout/footer.php";
        }
    }

    // 6. Xử lý cập nhật dữ liệu
   // 6. Xử lý cập nhật dữ liệu (Đã sửa)
    public function update() {
        $id = $_GET['id'];
        
        // Cần lấy cả image từ form (dù người dùng có sửa hay không)
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'image' => $_POST['image'] // <--- Bổ sung dòng này
        ];
        
        $this->productModel->update($id, $data);
        header("Location: index.php?page=product-list");
    }
    // 7. Xóa sản phẩm (Bạn đã có)
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->productModel->delete($id);
        }
        header("Location: index.php?page=product-list");
    }
    // 8. Chức năng tìm kiếm
    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        if ($keyword) {
            $products = $this->productModel->search($keyword);
        } else {
            $products = $this->productModel->all();
        }
        
        // Tận dụng lại view danh sách để hiển thị kết quả
        include "views/layout/header.php";
        include "views/product-list.php";
        include "views/layout/footer.php";
    }
}