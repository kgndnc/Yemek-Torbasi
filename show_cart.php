<?php
include_once 'functions.php';
include 'food.php';
$page_name = "Sepet";
include 'layout/top.php';

?>
    <div class="container mt-4">
        <table class="table table-striped" style="max-width: 50%">
            <tr><th>Ürün</th><th>Miktar</th><th>Ürünü Çıkar</th></tr>
            <?php if(isset($_SESSION['cart'])) foreach ($_SESSION['cart'] as $ordered => $quantity):   ?>
                <tr>
                    <td> <?= str_replace("name=","",strtok($ordered,"&"))  ?> </td><td> <?= $quantity ?> </td>
                    <td><form action="remove_item.php" method="post">
                            <input type="hidden" name="item_key" value="<?= $ordered ?>">
                            <input type="submit" value="Remove"></form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>


        <form action="<?php if (isset($_SESSION['user_id']) && isset($_SESSION['cart'])) {echo "checkout.php"; $empErr=false;}
        elseif(!isset($_SESSION['cart'])) {echo "show_cart.php"; $empErr=true;}
        else {echo "login.php?alert=4"; $empErr=false;} ?>" method="post">
            <input class="btn btn-primary" type="submit" value="Sipariş ver">
        </form>
        <button class="btn btn-danger" onclick="document.location='empty_cart.php'" href="empty_cart.php">Sepeti boşalt</button>
        <button class="btn btn-primary" onclick="document.location='index.php'">Geri dön</button>
        <?php
        if($empErr)
            echo "<p class='text-warning mt-4 fw-bolder'>Sepetiniz boş. Ödeme alanına geçemezsiniz.</p>";
        ?>
    </div>


<?php
include 'layout/bottom.php';