<?php
session_start();
$_SESSION['table'] = 'burger-0001';
// Include functions and connect to the database using PDO MySQL
include_once 'functions.php';
$pdo = pdo_connect_mysql();
$stmt = $pdo->prepare("SELECT * FROM `burger-0001` ORDER BY `total_sale` ASC");
// $table = 'burger-0001';
// $orderby = `total_sale`;
// $stmt->bindParam("s",$orderby);
$stmt->execute();

$food_for_sale = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_name = "Burger";
$title = "<title>$page_name | Yemek Torbası</title>";
$style = '<link rel="stylesheet" href="css/style.css">';
include 'layout/top.php';
?>

<div class="container mt-4">
    <h2>Ürünlerimiz</h2>
    <div class="products">
        <?php foreach ($food_for_sale as $product): ?>
            <div class="restau-box">
                <a href="product.php?id=<?=$product['id'] ?>" class="product">
                    <!--                <img src="img/--><?//=$product['food_name']?><!--" width="200" height="200" alt="--><?//=$product['name']?><!--">-->
                    <span class=""><?=$product['food_name']?></span>
                    <span class="">
                <?=$product['price'];?> TL
                <?php echo "<br>" ?>
            </span>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>



<?php
include 'layout/bottom.php';
?>