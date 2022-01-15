<?php
session_start();
$page_name = "Ürün";
$title = "<title>$page_name | Yemek Torbası</title>";
$style = '<link rel="stylesheet" href="css/style.css">';
include 'layout/top.php';
include_once 'functions.php';
$pdo = pdo_connect_mysql();
echo $_SESSION['table'];
echo $_GET['id'];
$id =  $_GET['id'];
echo 'SELECT * FROM `' . $_SESSION['table'] . '` WHERE id=' .$id;
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id']) && isset($_SESSION['table'])) {
    // Prepare statement and execute, prevents SQL injection

    $stmt = $pdo->prepare('SELECT * FROM `' . $_SESSION['table'] . '` WHERE id=' .$id);
    $stmt->execute();
    // Fetch the product from the database and return the result as an Array
    $food_for_sale = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$food_for_sale) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
<div class="container mt-4">
    <div class="products">

        <div class="restau-box">
            <a href="index.php?page=product&id=<?=$food_for_sale['id']?>" class="product">
                <!--                <img src="img/--><?//=$product['food_name']?><!--" width="200" height="200" alt="--><?//=$product['name']?><!--">-->
                <span class=""><?=$food_for_sale['food_name']?></span>
                <span class="">
                <?=$food_for_sale['price'];?> TL
                <?php echo "<br>" ?>
            </span>
            </a>
        </div>
        <form action="cart.php" method="post">
            <input type="number" class="mt-4" name="quantity" value="1" min="1" max="<?=$food_for_sale['quantity']?>" placeholder="Quantity" required>
            <input type="submit" value="Add To Cart">
            <input type="number" style="visibility: hidden" name="id" value="<?=$food_for_sale['id']?>">
            <input type="text" style="visibility: hidden" name="table" value="<?=$_SESSION['table']?>">
        </form>
        <div class="description">
            <?=$food_for_sale['description']?>
        </div>
    </div>
</div>
