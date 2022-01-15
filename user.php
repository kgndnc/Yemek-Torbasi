<?php
include 'functions.php';
$page_name = "Hesap Seçenekleri";

include 'layout/top.php';
?>

<div class="container-sm m-5">


    <?php acc_details(); ?>

    <a href="logout.php">
        <input type="button" class="btn btn-danger" value="Oturumu kapat">
    </a>
</div>




<?php
include 'layout/bottom.php';