<?php
namespace App\Database\Seeders;

class ProductSeeder {
    public function run($db) {
        // Khởi tạo Faker để tạo dữ liệu ảo bằng tiếng Việt
        $faker = \Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->word . ' ' . $faker->word; // Tên sản phẩm
            $price = $faker->numberBetween(100000, 1000000);

            $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':price' => $price
            ]);
        }
        echo "Đã nạp 10 sản phẩm mẫu vào database!\n";
    }
}