<link rel="stylesheet" href="../asset/css/index.css">
<link rel="stylesheet" href="../asset/css/banner.css">
<link rel="stylesheet" href="../asset/css/search.css">
<link rel="icon" type="image/x-icon" href="../asset/images/icon/logo.ico">
<header>
    <div class="header-container">
        <div class="logo-container">
            <a href="../pages/index.php">
                <img src="../asset/images/icon/logo.png" alt="Logo Cửa Hàng Thú Cưng">
            </a>
        </div>
        <div class="infor">
            <img src="../asset/images/icon/support.gif">
            <div>
                <a>Hỗ trợ:</a>
                <p>1900 0091</p>
            </div>
        </div>

        <div class="infor">
            <img src="../asset/images/icon/mail.gif">
            <div>
                <a>Email liên hệ:</a>
                <p>support@gmail.com</p>
            </div>
        </div>

        <div class="infor">
            <a href="https://maps.app.goo.gl/44d1MoKdpKSY5fPr9" target="_blank"><img
                    src="../asset/images/icon/location.gif"></a>
            <div>
                <a>Địa chỉ cửa hàng:</a>
                <p>Tô Ký, Tân Chánh Hiệp, quận 12, TP. HCM</p>
            </div>
        </div>

        <div class="buttons-container">
            <a href="../pages/index.php?page=cart" >
                <img class="circle-button" src="../asset/images/icon/cart.png" alt="Cart">
            </a>
            <a href="login.php">
                <img class="circle-button" src="../asset/images/icon/login.png" alt="Login">
            </a>
        </div>

    </div>
</header>


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
                <!-- Ảnh sẽ được tạo ra và chèn vào đây nếu có sản phẩm trong giỏ hàng -->
            </li>
            <li>
                <a href="../pages/login.php">
                    <img src="../asset/images/icon/user.png" alt="User Icon" />
                    Tài khoản
                </a>
            </li>
            <li>
                <a href="../pages/index.php?page=admin">
                    <img src="../asset/images/icon/admin-ico.png" alt="Admin Icon" />
                    Admin
                </a>
            </li>
            <li class="search-container">
                <img class="search-icon" src="../asset/images/icon/search.png" alt="Search Icon">
                <form name="formtim" action="kqtim.php" method="get" class="search-form" onsubmit="return checksearch();">
                    <input name="tukhoa" id="tukhoa" type="text" placeholder="Tìm kiếm" />
                    <input name="btntim" id="btntim" type="submit" value="TÌM" />
                </form>
            </li>
        </ul>
    </nav>

