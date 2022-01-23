<?php
include 'functions.php';

$page_name= "Login";
include 'layout/top.php';

if (isset($_SESSION['user_id'])  && !empty($_SESSION['user_id']) ) {
    header("Location: index.php");
    die();
}
if (isset($_SESSION['signupSuccess'])  && $_SESSION['signupSuccess'] == true ) {
    phpAlert("Signup successful. Now you can login.");
    $_SESSION['signupSuccess']=null;
}
?>


<div class="container mt-5" style=" min-width: 600px; max-width: 50%;">
    <?php
    if (isset($_SESSION['loginErr'])  && !empty($_SESSION['loginErr']) ) {
        echo "<p class='alert-danger' style='background-color: white;'>".$_SESSION['loginErr']."</p>";
    }
    if (isset($_GET['alert']) && $_GET['alert'] == 4) {
        echo "<p class='alert-danger' style='background-color: white;'>Sipariş vermek 
                için giriş yapmalisiniz.</p>";
    }
    ?>

    <form action="checkLogin.php" method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
            <input value="Show password" type="button" onclick="changeVisibility('password')" style="margin-left:1px" >
        </div>
        <input type="submit" value="Giriş yap">
        <a class="link-primary m-3" href="signup.php">Kaydol</a>
    </form>
</div>


<script src="js/login-script.js" type="text/javascript"></script>

<?php


include('layout/bottom.php');
?>
