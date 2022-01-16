<?php
include 'functions.php';

// To all pages you want to check the user logged in put the lines above.
$page_name= "Kaydol";
include 'layout/top.php';

if (isset($_SESSION['user_id'])  && !empty($_SESSION['user_id']) ) {
    header("Location: index.php");
}
?>


<div class="container mt-5" style=" min-width: 600px; max-width: 50%;">
    <?php
    if (isset($_SESSION['signupErr']) && !empty($_SESSION['signupErr'])) {
        echo "<p class='alert-danger' style='background-color: white;'>" . $_SESSION['signupErr'] . "</p>";
    }
    ?>
    <form action="add_user.php" method="post">
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
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_rpt" id="password_rpt" placeholder="Please enter your password again" >
            <input value="Show password" type="button" onclick="changeVisibility('password_rpt')" style="margin-left:1px" >
        </div>
        <input type="submit" value="Kaydol">
        <span class="ms-2">Hesabınız var mı?</span><a class="link-primary ms-1" href="login.php">Giriş yapın</a>
    </form>
</div>


<script src="js/login-script.js" type="text/javascript"></script>

<?php


include('layout/bottom.php');
?>
