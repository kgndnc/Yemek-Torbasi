<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizza</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
// Include functions and connect to the database using PDO MySQL
include_once 'functions.php';
$pdo = pdo_connect_mysql();
$stmt = $pdo->prepare("SELECT * FROM `pizza-0001`  \n"

    . "ORDER BY `pizza-0001`.`total_sale` ASC;");
$stmt->execute();

$food_for_sale = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'layout/top.php';
?>
<div class="container mt-4">
    <h2>Ürünlerimiz</h2>
    <div class="products">
        <?php foreach ($food_for_sale as $product): ?>
            <div class="restau-box">
                <a href="product.php?id=<?=$product['id']?>&table=pizza-0001" class="product">
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
</body>
</html>