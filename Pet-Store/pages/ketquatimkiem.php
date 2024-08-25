<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet-store"; // Tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu từ khóa tìm kiếm được gửi đi
if (isset($_GET['tukhoa'])) {
    $tukhoa = $_GET['tukhoa'];

    // Truy vấn tìm kiếm dựa trên từ khóa
    $sql = "SELECT * FROM pets WHERE name LIKE '%$tukhoa%' OR description LIKE '%$tukhoa%'";
    $result = $conn->query($sql);

    echo "<h2>Kết quả tìm kiếm cho từ khóa: '" . htmlspecialchars($tukhoa, ENT_QUOTES, 'UTF-8') . "'</h2>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container-pets'>";
            echo "<img src='" . htmlspecialchars($row['urlImg'], ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "'>";
            echo "<div class='row'>";
            echo "<p class='name-pet'>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<div class='icons'>";
            echo "<button class='heart' onclick='toggleHeart(this)'>❤<i class='fas fa-heart'></i></button>";
            echo "<button class='button view-detail' onclick=\"openModal('" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "')\">Chi tiết</button>";
            echo "<button class='button order' onclick=\"addToPet('" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "')\">Giỏ hàng</button>";
            echo "</div>";
            echo "</div>";
            echo "<p class='text-price'>Giá: <span class='price'>" . number_format($row['price'], 0, ',', '.') . "đ</span>";
            if (!empty($row['priceSale'])) {
                echo " ➱ " . number_format($row['priceSale'], 0, ',', '.') . "đ";
            }
            echo "</p>";
            echo "</div>";
        }
    } else {
        echo "Không tìm thấy kết quả nào.";
    }
} else {
    echo "Vui lòng nhập từ khóa để tìm kiếm.";
}

$conn->close();
?>
    <script src="../asset/js/detail.js"></script><link rel="stylesheet" href="../asset/css/pets.css">
    <link rel="stylesheet" href="../asset/css/DetailPet.css">