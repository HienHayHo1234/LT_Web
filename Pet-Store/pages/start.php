<script src="../asset/js/load.js"></script>
<link rel="stylesheet" href="../asset/css/pets.css">
<section class="slider">
    <div class="slides">
        <div class="slide active">
            <img src="../asset/images/banner/1.png" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="../asset/images/banner/2.jpg" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="../asset/images/banner/3.jpg" alt="Slide 3">
        </div>
        <div class="slide">
            <img src="../asset/images/banner/4.jpg" alt="Slide 4">
        </div>
        <div class="slide">
            <img src="../asset/images/banner/5.jpg" alt="Slide 5">
        </div>
        <div class="slide">
            <img src="../asset/images/banner/6.jpg" alt="Slide 6">
        </div>
    </div>
    <script src="../asset/js/banner.js"></script>
</section>
<h2>Loại Thú Cưng</h2>
<section class="pet">
    <hr>
    <div>
        <h1>Chó</h1>
        <a href="index.php?page=dog"><img src="../asset/images/dog/head.png" alt="Chó"></a>
        <h3>Chó là loài vật nuôi trung thành và đáng yêu.</h3>
    </div>

    <div>
        <h1>Mèo</h1>
        <a href="index.php?page=cat"><img src="../asset/images/cat/head.png" alt="Mèo"></a>
        <h3>Mèo là loài vật nuôi thanh lịch và dễ thương.</h3>
    </div>

    <div>
        <h1>Vẹt</h1>
        <a href="index.php?page=parrot"><img src="../asset/images/parrot/head.png" alt="Vẹt"></a>
        <h3>Chim là loài vật nuôi đáng yêu và đáng eu</h3>
    </div>
<hr>
</section>

<section id="product">
    <h2>Thú Cưng Cháy Hàng</h2>
    <?php require_once("hot.php"); ?>
    <h2>Thú Cưng</h2>
    <?php require_once("pets.php"); ?>
</section>