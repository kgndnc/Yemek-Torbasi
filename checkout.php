<?php
include 'functions.php';
$page_name = "Ödeme";
include "layout/top.php";


if (!isset($_SESSION['cart']))
    header("Location: index.php");

$error="";
$success="";

$conn = connect_to_db();

if (count($_SESSION['cart']) <= 0)
    header("Location: cart.php");

for ($i = 0; $i< count($_SESSION['cart']); $i++){
    $arr = explode("&",array_keys($_SESSION['cart'])[$i]);

    $table = str_replace("table=","",$arr[1]);
    $id = (int) str_replace("id=","",$arr[2]);


    $stmt = $conn->prepare("SELECT * FROM `" . $table. "` WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    $quantity = (int) array_values($_SESSION['cart'])[$i];

    /*echo "<br>Price: ". $row['price'] ."<br>";
    echo "<br>Balance: ". $_SESSION['balance'] ."<br>";*/

    $reduced_qua = (int) $row['quantity'] - $quantity;

    if ((int) $row['quantity'] >= $quantity && $row['price'] <= $_SESSION['balance']) {
        $stmt = $conn->prepare("UPDATE `". $table . "` SET quantity=? WHERE id=?");
        $stmt->bind_param("ii",$reduced_qua,$id);
        $stmt->execute();

        $_SESSION['balance'] -= $row['price'];
        $stmt = $conn->prepare("UPDATE `users` SET balance=? WHERE user_id=?");
        $stmt->bind_param("di",$_SESSION['balance'],$_SESSION['user_id']);
        $stmt->execute();
        if($i == count($_SESSION['cart'])-1) {
            unset($_SESSION['cart']);
            $success = "<p class='text-success fs-5 fw-bold'>Siparisiniz basariyla alinmistir.</p>";
            break;
        }
    }
    else if(!((int) $row['quantity'] >= $quantity)) {
        $success="";
        $error= "<p class='text-danger fs-5 fw-bold'>Sipariş miktarınız çok fazla</p> <br>
                 <p class='text-danger fs-5 fw-bold'>Söz konusu ürünler sepetten çikarildi.</p>";
        // $_SESSION['cart'][$i]=0;
        // $_SESSION['cart'][$i]=null;
        unset($_SESSION['cart'][$i]);
        unset($_SESSION['cart'][array_keys($_SESSION['cart'])[$i]]);
        $i--;
        // echo print_r($_SESSION['cart']);
    } else {
        $success="";
        $error= "<p class='text-danger fs-5 fw-bold'>Siparişler için yeterli bakiyeniz yok.</p>
                 <p class='text-danger fs-5 fw-bold'>Söz konusu ürünler sepetten çikarildi.</p>";
        // $_SESSION['cart'][$i]=null;
        // $_SESSION['cart'][$i]=0;
        unset($_SESSION['cart'][array_keys($_SESSION['cart'])[$i]]);
        $i--;
        // echo print_r($_SESSION['cart']);
    }
}

?>
<div class="container mt-4">
    <?php
        if ($success!="") echo $success;
        else echo $error;
    header('Refresh: 5; url=index.php');
    ?>
    <button class="btn btn-primary" onclick="document.location='index.php'">Geri dön</button>
</div>


<?php
include "layout/bottom.php";

