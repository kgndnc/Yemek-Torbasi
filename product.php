<?php
$page_name = "Ürün";

include 'layout/top.php';
include_once 'functions.php';
$conn = connect_to_db();

echo $_SESSION['table'] ."<br>";
echo $_GET['id']."<br>";
$id =  filterInput($_GET['id']);
echo 'SELECT * FROM `' . $_SESSION['table'] . '` WHERE id=' .$id;
// Check to make sure the id parameter is specified in the URL

if (isset($_GET['id']) && isset($_SESSION['table'])) {
    // Prepare statement and execute, prevents SQL injection

    $stmt = $conn->prepare("SELECT * FROM `" . $_SESSION['table'] . "` WHERE id=? LIMIT 1");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    // Fetch the product from the database and return the result as an Array
    $result = $stmt->get_result();
    // Check if the product exists (array is not empty)
    if (!$result) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
    $food_for_sale = $result->fetch_assoc();
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
echo print_r($food_for_sale)
?>
<div class="container mt-4">
    <div class="products">

        <div class="box">
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
