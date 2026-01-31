<?php
// migrate.php
require_once 'vendor/autoload.php';

// Sử dụng đúng Namespace của 2 file bạn đã tạo ở bước trước
use App\Database\Migrations\CreateProductTable;
use App\Database\Seeders\ProductSeeder;

// 1. CẤU HÌNH DATABASE (Bạn chỉnh sửa thông tin cho đúng với máy bạn)
$host = 'localhost';
$dbname = 'lab5_mvc'; // Tên database bạn đã tạo trong PHPMyAdmin
$username = 'root';
$password = '';

try {
    // 2. TẠO KẾT NỐI PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "========= BẮT ĐẦU KHỞI TẠO =========\n";

    // 3. CHẠY MIGRATION (Tạo bảng)
    echo "--- Đang tạo bảng products... \n";
    $migration = new CreateProductTable();
    $migration->up($pdo);
    echo "✔ Tạo bảng thành công!\n";

    // 4. CHẠY SEEDER (Nạp dữ liệu mẫu)
    echo "--- Đang nạp dữ liệu mẫu (Faker)... \n";
    $seeder = new ProductSeeder();
    $seeder->run($pdo);
    echo "✔ Nạp dữ liệu thành công!\n";

    echo "========= HOÀN TẤT =========\n";

} catch (PDOException $e) {
    die("❌ Lỗi kết nối hoặc truy vấn: " . $e->getMessage());
}