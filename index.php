<?php
//session_start();
// Include functions.php and connect to the database
include 'functions.php';

//$pdo = pdo_connect_mysql();

$page_name = "Anasayfa";
include 'layout/top.php';
echo $_SESSION['user_id'];
?>


<main class="container pt-3">
    <div class="restau-box">
        Burger Place
        <div class="restau-img mt-2">
            <img src="img/burger.jpg" alt="">
        </div>
        <button type="button" class="btn btn-primary mt-3"  onclick="document.location='restau-burger.php'">Ürünleri Listele</button>
    </div>

    <div class="restau-box">
        Pizza Place
        <div class="restau-img mt-2">
            <img src="img/pizza.png" alt="">
        </div>
        <button type="button" class="btn btn-primary mt-5"  onclick="document.location='restau-pizza.php'">Ürünleri Listele</button>
    </div>

    <div class="restau-box">
        Patisserie
        <div class="restau-img mt-2">
            <img src="img/burger.jpg" alt="">
        </div>
        <button type="button" class="btn btn-primary mt-3"  onclick="document.location='restau-patiss.php'">Ürünleri Listele</button>
    </div>

    <div class="restau-box">
        Steakhouse
        <div class="restau-img mt-2">
            <img src="img/burger.jpg" alt="">
        </div>
        <button type="button" class="btn btn-primary mt-2"  onclick="document.location='restau-steakhouse.php'">Ürünleri Listele</button>
    </div>
</main>

<?php
include('layout/bottom.php');
?>

