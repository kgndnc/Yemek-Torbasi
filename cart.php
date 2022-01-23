<?php
include_once 'functions.php';
include 'food.php';
$page_name = "Sepet";
include 'layout/top.php';

$conn = connect_to_db();



// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables, so we easily identify them, also make sure they are integer

    $food = new food($_POST['food_name'],$_POST['table'], $_POST['id']);
    $food = $food->uniqFoodName();

    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our database
    $stmt = $conn->prepare("SELECT * FROM `" . $_POST['table'] . "` WHERE id = ?");
    $stmt->bind_param("i",$_POST['id']);
    $stmt->execute();
    // Fetch the product from the database and return the result as an Array
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($food, $_SESSION['cart'] )) {
                // Product exists in cart so just update the quantity
                $_SESSION['cart'][$food] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$food] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($food => $quantity);
        }
    }
    // Prevent form resubmission...
    // exit;
}
?>
    <div class="container mt-4">
        <table class="table table-striped" style="max-width: 50%">
            <tr><th>Ürün</th><th>Miktar</th></tr>
            <?php if(isset($_SESSION['cart'])) foreach ($_SESSION['cart'] as $ordered => $quantity):   ?>
            <tr><td> <?= str_replace("name=","",strtok($ordered,"&"))  ?> </td><td> <?= $quantity ?> </td> </tr>
            <?php endforeach ?>
        </table>


        <form action="<?php if (isset($_SESSION['user_id']) && isset($_SESSION['cart'])) {echo "checkout.php"; $empErr=false;}
        elseif(!isset($_SESSION['user_id'])) {echo "login.php?alert=4"; $empErr=false;}
        else {echo "cart.php"; $empErr=true;} ?>" method="post">
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

// todo: Sepetteki ürünleri ayrı ayrı çıkarma özelliği ekle.