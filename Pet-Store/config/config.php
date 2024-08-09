<?php
// Khai báo các thông số kết nối cơ sở dữ liệu
$host = "localhost";
$dbname = "pet-store";
$username = "root";
$password = "";

try {
    // Tạo đối tượng PDO để kết nối với cơ sở dữ liệu MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kiểm tra nếu form được gửi bằng phương thức POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $id = $_POST['pet-id'];
        $name = $_POST['pet-name'];
        $price = $_POST['pet-price'];
        $priceSale = $_POST['pet-price-sale'];
        $quantity = $_POST['pet-quantity'];

        // Xử lý file upload
        $imageName = basename($_FILES["pet-image"]["name"]);
        $targetDir = "D:/GitHub/LT_Web/Pet-Store/asset/uploads/";  // Thư mục lưu trữ hình ảnh với đường dẫn tuyệt đối
        $targetFile = $targetDir . $imageName;

        // Kiểm tra sự tồn tại của thư mục và tạo nếu không tồn tại
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Kiểm tra và di chuyển file upload vào thư mục lưu trữ
        if (move_uploaded_file($_FILES["pet-image"]["tmp_name"], $targetFile)) {
            // Chèn dữ liệu vào bảng `pets`
            $stmt = $conn->prepare("INSERT INTO pets (id, name, price, priceSale, quantity, urlImg) 
                                    VALUES (:id, :name, :price, :priceSale, :quantity, :urlImg)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':priceSale', $priceSale);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':urlImg', $targetFile);

            $stmt->execute();

            echo "Thêm sản phẩm thành công!";
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}