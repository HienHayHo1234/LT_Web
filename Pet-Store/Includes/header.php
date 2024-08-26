<?php
session_start();
?>
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../asset/css/banner.css">
    <link rel="stylesheet" href="../asset/css/search.css">
    <link rel="stylesheet" href="../asset/css/login.css">
    <link rel="stylesheet" href="../asset/css/register.css">
    <link rel="icon" type="image/x-icon" href="../asset/images/icon/logo.ico">
    <style>
        .modal {
    display: none;
}
    </style>
</head>
<nav id="sticky-nav">
    <ul>
        <li>
            <a href="../pages/index.php">
                <img src="../asset/images/icon/home-ico.png" alt="Home Icon" />
                Trang Chủ
            </a>
        </li>
        <li class="dropdown">
            <a class="dropdown-btn">
                <img src="../asset/images/icon/pet-ico.png" alt="Pet Icon" />
                Thú Cưng
            </a>
            <div class="dropdown-content">
                <a href="../pages/index.php?page=cat">
                    <img src="../asset/images/icon/cat-ico.png" alt="Cat Icon" style="vertical-align: middle;" />
                    Mèo
                </a>
                <a href="../pages/index.php?page=dog">
                    <img src="../asset/images/icon/dog-ico.png" alt="Dog Icon" style="vertical-align: middle;" />
                    Chó
                </a>
                <a href="../pages/index.php?page=parrot">
                    <img src="../asset/images/icon/parrot-ico.png" alt="Parrot Icon" style="vertical-align: middle;" />
                    Vẹt
                </a>
            </div>
        </li>
        <li>
            <a href="#about">
                <img src="../asset/images/icon/about-ico.png" alt="About Icon" />
                Giới Thiệu
            </a>
        </li>
        <li class="nav-cart">
            <a class="text-cart" href="../pages/index.php?page=cart">
                <img src="../asset/images/icon/cart-ico.png" alt="Cart Icon" />
                Giỏ hàng
            </a>
        </li>
        <li>
                <div class="buttons-container">
            <a href="../pages/index.php?page=cart">
                <img class="circle-button" src="../asset/images/icon/cart.png" alt="Cart">
            </a>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
                <div class="account-menu">
                    <a href="../pages/profile.php">Thông tin tài khoản</a>
                    <a href="../pages/logout.php">Đăng xuất</a>
                </div>
            <?php else : ?>
                <a href="#" onclick="openLoginModal(); return false;">
                    <img class="circle-button" src="../asset/images/icon/login.png" alt="Login">
                </a>
            <?php endif; ?>
        </div>

        </li>
        <!-- <li>
            <a href="../pages/index.php?page=admin">
                <img src="../asset/images/icon/admin-ico.png" alt="Admin Icon" />
                Admin
            </a>
        </li> -->
        <li class="search-container">
                <form name="formtim" action="kqtim.php" method="get" class="search-form" onsubmit="return checksearch();">
                    <input name="tukhoa" id="tukhoa" type="text" placeholder="Tìm kiếm" />
<link rel="stylesheet" href="../asset/css/index.css">
<link rel="stylesheet" href="../asset/css/banner.css">
<link rel="stylesheet" href="../asset/css/search.css">
<link rel="icon" type="image/x-icon" href="../asset/images/icon/logo.ico">

    <nav>
        <ul>
            
            <li>
                <a href="../pages/index.php">
                    <img src="../asset/images/icon/home-ico.png" alt="Home Icon" />
                    Trang Chủ
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-btn">
                    <img src="../asset/images/icon/pet-ico.png" alt="Pet Icon" />
                    Thú Cưng
                </a>
                <div class="dropdown-content">
                    <a href="../pages/index.php?page=cat">
                        <img src="../asset/images/icon/cat-ico.png" alt="Cat Icon" style="vertical-align: middle;" />
                        Mèo
                    </a>
                    <a href="../pages/index.php?page=dog">
                        <img src="../asset/images/icon/dog-ico.png" alt="Dog Icon" style="vertical-align: middle;" />
                        Chó
                    </a>
                    <a href="../pages/index.php?page=parrot">
                        <img src="../asset/images/icon/parrot-ico.png" alt="Parrot Icon" style="vertical-align: middle;" />
                        Vẹt
                    </a>
                </div>
            </li>
            <li>
                <a href="#about">
                    <img src="../asset/images/icon/about-ico.png" alt="About Icon" />
                    Giới Thiệu
                </a>
            </li>
            <li class="nav-cart">
                <a class="text-cart" href="../pages/index.php?page=cart">
                    <img src="../asset/images/icon/cart-ico.png" alt="Cart Icon" />
                    Giỏ hàng
                </a>
                <!-- Ảnh sẽ được tạo ra và chèn vào đây nếu có sản phẩm trong giỏ hàng -->
            </li>
            <li>
                <a href="../pages/login.php">
                    <img src="../asset/images/icon/user.png" alt="User Icon" />
                    Tài khoản
                </a>
            </li>
            <!-- <li>
                <a href="../pages/index.php?page=admin">
                    <img src="../asset/images/icon/admin-ico.png" alt="Admin Icon" />
                    Admin
                </a>
            </li> -->
            <li class="search-container">
                    <form name="formtim" action="../pages/index.php" method="get" class="search-form">
                        <input type="hidden" name="page" value="search">
                        <input name="tukhoa" id="tukhoa" type="text" placeholder="Tìm kiếm" />
                    <input name="btntim" id="btntim" type="image" src="../asset/images/icon/search.png" alt="Search Button">
                </form>
        </li>
    </ul>
</nav>
                    </form>
            </li>
        </ul>
    </nav>

<!-- Modal Form Đăng Nhập -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Đăng Nhập</h2>
        <form action="../pages/login.php" method="post">
            <label for="login-username">Tên đăng nhập:</label><br>
            <input type="text" id="login-username" name="username" required><br><br>
            <label for="login-password">Mật khẩu:</label><br>
            <input type="password" id="login-password" name="password" required><br><br>
            <div>
                <label><input name="status" type="checkbox"> Ghi nhớ đăng nhập</label>
            </div>
            <hr>
            <div class="button-container">
                <input type="submit" value="Đăng Nhập">
                <button type="reset">Xóa</button>
            </div>
            <p>Chưa có tài khoản? <a href="#" onclick="openRegisterModal(); return false;">Đăng ký</a></p>
        </form>
    </div>
</div>

<!-- Modal Form Đăng Ký -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Mũi tên quay lại form đăng nhập -->
        <span id="backToLogin" class="back-arrow">&#8592; Quay lại</span> 
        <h2>Đăng Ký</h2>
        <form action="register.php" method="post">
            <label for="register-username">Tên đăng nhập</label>
            <input type="text" id="register-username" name="username" required><br>
            <label for="register-email">Email</label><br>
            <input type="email" id="register-email" name="email" required><br>
            <label for="register-password">Mật khẩu</label><br>
            <input type="password" id="register-password" name="password" required><br>
            <label for="register-confirmPassword">Xác nhận mật khẩu</label><br>
            <input type="password" id="register-confirmPassword" name="confirmPassword" required><br>
            <div class="button-container">
                <button type="submit">Gửi</button>
                <button type="reset">Xóa</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('.modal');
    const closeBtns = document.querySelectorAll('.close');

    function openModal(modalId) {
        modals.forEach(modal => modal.style.display = "none");
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "block";
        }
    }

    closeBtns.forEach(btn => {
        btn.onclick = () => {
            modals.forEach(modal => modal.style.display = "none");
        };
    });

    window.onclick = event => {
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    };

    window.openLoginModal = () => openModal('loginModal');
    window.openRegisterModal = () => openModal('registerModal');

    const backToLoginBtn = document.getElementById('backToLogin');
    if (backToLoginBtn) {
        backToLoginBtn.onclick = () => {
            document.getElementById('registerModal').style.display = 'none';
            document.getElementById('loginModal').style.display = 'block';
        };
    }

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
        const logo = document.querySelector('.logo-container img');
        if (logo) {
            logo.src = '../asset/images/dog/Phoc.png';
            logo.alt = 'Logo Đăng Nhập';
        }
    <?php endif; ?>
});
</script>
<!-- Modal Form Đăng Nhập -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Đăng Nhập</h2>
        <form action="../pages/login.php" method="post">
            <label for="login-username">Tên đăng nhập:</label><br>
            <input type="text" id="login-username" name="username" required><br><br>
            <label for="login-password">Mật khẩu:</label><br>
            <input type="password" id="login-password" name="password" required><br><br>
            <div>
                <label><input name="status" type="checkbox"> Ghi nhớ đăng nhập</label>
            </div>
            <hr>
            <div class="button-container">
                <input type="submit" value="Đăng Nhập">
                <button type="reset">Xóa</button>
            </div>
            <p>Chưa có tài khoản? <a href="#" onclick="openRegisterModal(); return false;">Đăng ký</a></p>
        </form>
    </div>
</div>

<!-- Modal Form Đăng Ký -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Mũi tên quay lại form đăng nhập -->
        <span id="backToLogin" class="back-arrow">&#8592; Quay lại</span> 
        <h2>Đăng Ký</h2>
        <form action="register.php" method="post">
            <label for="register-username">Tên đăng nhập</label>
            <input type="text" id="register-username" name="username" required><br>
            <label for="register-email">Email</label><br>
            <input type="email" id="register-email" name="email" required><br>
            <label for="register-password">Mật khẩu</label><br>
            <input type="password" id="register-password" name="password" required><br>
            <label for="register-confirmPassword">Xác nhận mật khẩu</label><br>
            <input type="password" id="register-confirmPassword" name="confirmPassword" required><br>
            <div class="button-container">
                <button type="submit">Gửi</button>
                <button type="reset">Xóa</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('.modal');
    const closeBtns = document.querySelectorAll('.close');

    function openModal(modalId) {
        modals.forEach(modal => modal.style.display = "none");
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "block";
        }
    }

    closeBtns.forEach(btn => {
        btn.onclick = () => {
            modals.forEach(modal => modal.style.display = "none");
        };
    });

    window.onclick = event => {
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    };

    window.openLoginModal = () => openModal('loginModal');
    window.openRegisterModal = () => openModal('registerModal');

    const backToLoginBtn = document.getElementById('backToLogin');
    if (backToLoginBtn) {
        backToLoginBtn.onclick = () => {
            document.getElementById('registerModal').style.display = 'none';
            document.getElementById('loginModal').style.display = 'block';
        };
    }

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
        const logo = document.querySelector('.logo-container img');
        if (logo) {
            logo.src = '../asset/images/dog/Phoc.png';
            logo.alt = 'Logo Đăng Nhập';
        }
    <?php endif; ?>
});
</script>
