<?php
include 'functions.php';

echo (isset($_SESSION['cart']) ? print_r($_SESSION['cart']) : "false" );

echo "<br>".array_keys($_SESSION['cart'])[0] ."<br>";

$conn = connect_to_db();
// for just one element
echo "cart size: " . count($_SESSION['cart']);


for ($i = 0; $i< count($_SESSION['cart']); $i++){
    $arr = explode("&",array_keys($_SESSION['cart'])[$i]);

    echo $arr[1];
    $table = str_replace("table=","",$arr[1]);
    $id = (int) str_replace("id=","",$arr[2]);

    echo "<br>" . $table . "<br>";
    echo $id;

    $stmt = $conn->prepare("SELECT * FROM `". $table . "` WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo print_r($row);

    echo "<br>Quantity: ". array_values($_SESSION['cart'])[$i] ."<br>";
    $quantity = (int) array_values($_SESSION['cart'])[$i];

    $reduced_qua = (int) $row['quantity'] - $quantity;

    if ((int) $row['quantity'] >= $quantity && $row['price'] <= $_SESSION['balance']) {
        $stmt = $conn->prepare("UPDATE `". $table . "` SET quantity=? WHERE id=?");
        $stmt->bind_param("ii",$reduced_qua,$id);
        $stmt->execute();

        $_SESSION['balance'] -= $row['price'];
        $stmt = $conn->prepare("UPDATE `users` SET balance=? WHERE user_id=?");
        $stmt->bind_param("ii",$_SESSION['balance'],$_SESSION['user_id']);
        $stmt->execute();
        if($i == count($_SESSION['cart'])-1)
            unset($_SESSION['cart']);
    }
    else if(!((int) $row['quantity'] >= $quantity)) {
        echo "<p class='text-danger'>Sipariş miktarınız çok fazla</p>";
        echo "<p class='text-info'>Sipariş miktarı fazla olan ürünler sepetten cikarildi.</p>";
        $_SESSION['cart'][$i]=null;
        echo print_r($_SESSION['cart']);
    } else {
        echo "<p class='text-danger'>Siparişler için yeterli bakiyeniz yok.</p>";
        echo "<p class='text-info'>Söz konusu ürünler sepetten cikarildi.</p>";
        $_SESSION['cart'][$i]=null;
        echo print_r($_SESSION['cart']);
    }
}

// todo(kgndnc): Sipariş verildikten sonra sepeti boşalt.
