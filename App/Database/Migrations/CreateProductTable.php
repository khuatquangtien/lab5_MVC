<?php
namespace App\Database\Migrations;

class CreateProductTable {
    public function up($db) {
        // Câu lệnh SQL để tạo bảng
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        
        $db->exec($sql);
        echo "Đã tạo bảng products thành công!\n";
    }

    public function down($db) {
        // Câu lệnh để xóa bảng (khi cần làm mới)
        $sql = "DROP TABLE IF EXISTS products;";
        $db->exec($sql);
    }
}