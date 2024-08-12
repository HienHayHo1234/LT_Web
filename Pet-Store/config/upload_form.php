<?php
// Nhúng tệp config.php để kết nối cơ sở dữ liệu
require 'config.php';

// Kiểm tra nếu form được gửi bằng phương thức POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id = $_POST['pet-id'];
    $name = $_POST['pet-name'];
    $price = $_POST['pet-price'];
    $priceSale = $_POST['pet-price-sale'];
    $quantity = $_POST['pet-quantity'];
    $idLoai = $_POST['pet-idLoai'];  // Nhận giá trị từ select

    // Xử lý file upload
    $imageName = basename($_FILES["pet-image"]["name"]);
    $targetDir = "../asset/uploads/";  // Thư mục lưu trữ hình ảnh với đường dẫn tương đối
    $targetFile = $targetDir . $imageName;

    // Xác thực tệp
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
            // Kiểm tra nếu ID đã tồn tại trong cơ sở dữ liệu
            $checkIdStmt = $conn->prepare("SELECT COUNT(*) FROM pets WHERE id = :id");
            $checkIdStmt->bindParam(':id', $id);
            $checkIdStmt->execute();

            if ($checkIdStmt->fetchColumn() > 0) {
                die("ID sản phẩm đã tồn tại. Vui lòng chọn ID khác.");
            }

            // Chèn dữ liệu vào bảng `pets`
            $stmt = $conn->prepare("INSERT INTO pets (id, name, price, priceSale, quantity, urlImg, idLoai) 
                                    VALUES (:id, :name, :price, :priceSale, :quantity, :urlImg, :idLoai)");
            $stmt->bindParam(':id', $id);           // Lưu giá trị id
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':priceSale', $priceSale);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':urlImg', $targetFile);  // Lưu đường dẫn tương đối
            $stmt->bindParam(':idLoai', $idLoai);       // Thêm giá trị idLoai

            $stmt->execute();

            echo "Thêm sản phẩm thành công!";
        } catch (PDOException $e) {
            error_log("Lỗi SQL: " . $e->getMessage());
            echo "Có lỗi xảy ra khi thêm sản phẩm.";
        }
    } else {
        error_log("Có lỗi xảy ra khi tải lên hình ảnh.");
        echo "Có lỗi xảy ra khi tải lên hình ảnh.";
    }
}
?>
