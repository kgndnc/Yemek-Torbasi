
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anasayfa | Yemek Torbası</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include 'layout\top.php';
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
        <button type="button" class="btn btn-primary mt-3"  onclick="document.location='restau-pizza.php'">Ürünleri Listele</button>
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
        <button type="button" class="btn btn-primary mt-3"  onclick="document.location='restau-steakhouse.php'">Ürünleri Listele</button>
    </div>
</main>

<?php
include('layout/bottom.php');
?>

</body>
</html>


