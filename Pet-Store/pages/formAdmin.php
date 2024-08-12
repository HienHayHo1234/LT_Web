<?php
$host = "localhost";
$dbname = "pet-store";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kiểm tra nếu dữ liệu POST và file đã được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pet-image"]) && !empty($_POST['pet-id'])) {
        // Nhận dữ liệu từ form
        $petId = $_POST['pet-id'];
        $petName = $_POST['pet-name'];
        $petPrice = $_POST['pet-price'];
        $petPriceSale = $_POST['pet-price-sale'];
        $petQuantity = $_POST['pet-quantity'];
        $petIdLoai = $_POST['pet-idLoai'];

        // Xử lý hình ảnh
        $imageName = basename($_FILES["pet-image"]["name"]);
        $targetDir = "../uploads/";
        $targetFile = $targetDir . $imageName;

        // Kiểm tra lỗi upload file
        if ($_FILES["pet-image"]["error"] !== UPLOAD_ERR_OK) {
            die("Có lỗi xảy ra khi tải lên hình ảnh. Mã lỗi: " . $_FILES["pet-image"]["error"]);
        }

        // Kiểm tra định dạng và kích thước tệp
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            die("Chỉ hỗ trợ các định dạng hình ảnh: jpg, jpeg, png, gif.");
        }

        if ($_FILES["pet-image"]["size"] > 5000000) { // Ví dụ: 5MB
            die("Kích thước tệp quá lớn.");
        }

        // Kiểm tra sự tồn tại của thư mục và tạo nếu không tồn tại
        if (!file_exists($targetDir)) {
            if (!mkdir($targetDir, 0777, true)) {
                die("Không thể tạo thư mục lưu trữ hình ảnh.");
            }
        }

        // Kiểm tra và di chuyển file upload vào thư mục lưu trữ
        if (move_uploaded_file($_FILES["pet-image"]["tmp_name"], $targetFile)) {
            try {
                // Chuẩn bị câu lệnh SQL
                $stmt = $conn->prepare("INSERT INTO pets (id, name, price, priceSale, quantity, idLoai, urlImg) 
                                        VALUES (:id, :name, :price, :priceSale, :quantity, :idLoai, :urlImg)");
                $stmt->bindParam(':id', $petId);
                $stmt->bindParam(':name', $petName);
                $stmt->bindParam(':price', $petPrice);
                $stmt->bindParam(':priceSale', $petPriceSale);
                $stmt->bindParam(':quantity', $petQuantity);
                $stmt->bindParam(':idLoai', $petIdLoai);
                $stmt->bindParam(':urlImg', $targetFile);

                // Thực thi câu lệnh
                $stmt->execute();
                echo "Sản phẩm đã được thêm thành công!";
            } catch (PDOException $e) {
                error_log("Lỗi SQL: " . $e->getMessage());
                echo "Có lỗi xảy ra khi thêm sản phẩm.";
            }
        } else {
            error_log("Có lỗi xảy ra khi tải lên hình ảnh.");
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
        }
    } else {
        echo "Dữ liệu không hợp lệ.";
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <title>Thêm Sản Phẩm Mới</title>
</head>

<body>
    <nav class="item-menu">
        <button id="" onclick="clickButtonAdd()">Thêm sản phẩm</button>
        <button id="">Xem sản phẩm</button>
        <button id="">Xem đơn hàng</button>
    </nav>
    <main class="item-main">
        <div id="add-form">
            <a href="admin.php" class="back-link">Quay Lại</a>
            <h1>Thêm Sản Phẩm Mới</h1>
            <form id="pet-form" action="../config/upload_form.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pet-id">ID:</label>
                    <input type="text" id="pet-id" name="pet-id" required>
                </div>
                <div class="form-group">
                    <label for="pet-name">Tên:</label>
                    <input type="text" id="pet-name" name="pet-name" required>
                </div>
                <div class="form-group">
                    <label for="pet-price">Giá:</label>
                    <input type="number" id="pet-price" name="pet-price" required>
                </div>
                <div class="form-group">
                    <label for="pet-price-sale">Giá Khuyến Mãi:</label>
                    <input type="number" id="pet-price-sale" name="pet-price-sale" required>
                </div>
                <div class="form-group">
                    <label for="pet-quantity">Số Lượng:</label>
                    <input type="number" id="pet-quantity" name="pet-quantity" required>
                </div>
                <div class="form-group">
                    <label for="pet-idLoai">Danh Mục:</label>
                    <select id="pet-idLoai" name="pet-idLoai" required>
                        <!-- Thay thế các tùy chọn dưới đây bằng các danh mục thực tế từ cơ sở dữ liệu -->
                        <option value="cat">Mèo</option>
                        <option value="dog">Chó</option>
                        <option value="parrot">Vẹt</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pet-image">Hình Ảnh:</label>
                    <input type="file" id="pet-image" name="pet-image" required>
                </div>
                <button type="submit">Thêm Sản Phẩm</button>
            </form>
        </div>
    </main>
    <footer class="item-footer"></footer>
    <!-- Script -->
</body>

</html>
