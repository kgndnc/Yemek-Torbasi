<?php
// Include functions.php and connect to the database
include 'functions.php';


$page_name = "Anasayfa";
include 'layout/top.php';
?>


<main class="container pt-3">

    <div class="row row-cols-3">
        <div class="restau-box col">
            Burger Place
            <div class="restau-img mt-2">
                <img src="img/burger.jpg" alt="">
            </div>
            <button type="button" class="btn btn-primary mt-3"  onclick="document.location='restau-burger.php'">Ürünleri Listele</button>
        </div>

        <div class="restau-box col">
            Pizza Place
            <div class="restau-img mt-2">
                <img src="img/pizza.png" alt="">
            </div>
            <button type="button" class="btn btn-primary mt-5"  onclick="document.location='restau-pizza.php'">Ürünleri Listele</button>
        </div>

        <div class="restau-box col">
            Patisserie
            <div class="restau-img mt-2">
                <img src="img/burger.jpg" alt="">
            </div>
            <button type="button" class="btn btn-primary mt-3"  onclick="document.location='restau-patiss.php'">Ürünleri Listele</button>
        </div>
    </div>

    <div class="row row-cols-3">
        <div class="restau-box col border">
            Steakhouse
            <div class="restau-img mt-2">
                <img src="img/burger.jpg" alt="">
            </div>
            <button type="button" class="btn btn-primary mt-2"  onclick="document.location='restau-steakhouse.php'">Ürünleri Listele</button>
        </div>
    </div>

</main>

<?php
include('layout/bottom.php');
?>
