<?php
include 'functions.php';

$table = $_SESSION['table'] = 'steak-0001';

$conn = connect_to_db();
$sql = $conn->prepare("SELECT * FROM `" . $table ."` ORDER BY `total_sale` ASC;");

$sql->execute();
$result = $sql->get_result();
$page_name = "Steakhouse";

include 'layout/top.php';
?>
<div class="container mt-4">
    <h2>Ürünlerimiz</h2>
    <div class="products">
        <?php  while ($food_for_sale = $result->fetch_assoc()): ?>
            <div class="restau-box">
                <a href="product.php?id=<?=$food_for_sale['id'] ?>" class="product">
                    <!--                <img src="img/--><?//=$product['food_name']?><!--" width="200" height="200" alt="--><?//=$product['name']?><!--">-->
                    <span class=""><?=$food_for_sale['food_name'] ?></span>
                    <span class="">
                <?=$food_for_sale['price'];?> TL
                <?php echo "<br>" ?>
            </span>
                </a>
            </div>

        <?php endwhile; ?>
    </div>
</div>



<?php
include 'layout/bottom.php';
?>
