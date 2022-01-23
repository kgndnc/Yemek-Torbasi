
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $title = "<title>$page_name | Yemek Torbası</title>";
    $style = '<link rel="stylesheet" href="css/style.css">';
    echo $title; echo $style;
    ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="index.php"><img src="img/logo.png" height="60px" alt="logo"></a>
        <a class="navbar-brand" style="margin-left: 5px" href="index.php">Yemek Torbası</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav nav-item">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="cart.php">Sepet</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php
                if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                    echo "user.php";
                } else
                    echo "login.php" ?>">

                    <?php if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                        echo $_SESSION['user_name'];
                    } else
                        echo "Giris/Kayit Ol" ?></a>
            </li>
        </ul>
    </div>
</nav>