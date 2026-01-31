<?php
// Models/Product.php
namespace App\Models; // <--- BẠN ĐANG THIẾU DÒNG NÀY
class Product extends BaseModel {
    public function all() {
        
        $sql = "SELECT * FROM products ORDER BY id DESC";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->pdo->prepare($sql)->execute([$id]);
    }
    // Thêm vào sau hàm delete($id) trong ảnh của bạn
    public function find($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insert($data) {
        $sql = "INSERT INTO products (name, price, image, description) VALUES (:name, :price, :image, :description)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE products SET name=:name, price=:price, image=:image, description=:description WHERE id=:id";
        $data['id'] = $id; // Gán ID vào mảng data để bind tham số
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }
}