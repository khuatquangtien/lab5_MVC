<?php
namespace App\Models;

use PDO;
use PDOException;

class BaseModel {
    protected $pdo;

    public function __construct() {
        // Cấu hình kết nối
        $host = "localhost";
        $dbname = "lab5_mvc"; // Kiểm tra kỹ tên database này có khớp với phpMyAdmin không
        $username = "root";
        $password = "";
        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Lỗi kết nối Database: " . $e->getMessage());
        }
    }
}