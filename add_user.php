<?php
include 'functions.php';

$new_username = filterInput($_POST['username']);
$new_password = filterInput($_POST['password']);
$new_password_rpt = filterInput($_POST['password_rpt']);

$conn = connect_to_db();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($new_password != $new_password_rpt){
    $_SESSION['signupErr'] = "Passwords should be same";
    header("Location: signup.php");
    die();
} elseif (empty($new_username) || empty($new_password) || empty($new_password_rpt)){
    $_SESSION['signupErr'] = "Please enter all the fields";
    header("Location: signup.php");
    die();
}
$_SESSION['signupErr'] = null;

$sql = $conn->prepare("SELECT user_name,password FROM users WHERE user_name=?");
$sql->bind_param("s", $new_username);
$new_username = filterInput($_POST['username']);
$sql->execute();

$result = $sql->get_result();

// If result's num_rows is zero that means there is no user which has this name
if($result->num_rows == 0){
    // Add a new user
    $sql = $conn->prepare("INSERT INTO users (user_id, user_name, password) VALUES (?,?,?)");
    $new_user_id = random_num(10);
    $sql->bind_param("iss", $new_user_id,$new_username, $new_password_rpt);
    $new_password_rpt = password_hash($new_password_rpt, PASSWORD_BCRYPT);
    $res = $sql->execute();
    if ($res){
        $_SESSION['signupSuccess'] = true;
        $_SESSION['loginErr']=null;
        // phpAlert("Signup successful. Now you can login.");
        header("Location: login.php");
        die();
    }
    $_SESSION['signupSuccess'] = null;
} else {
    $_SESSION['signupErr'] = "Please choose a different username";
    $_SESSION['signupSuccess'] = null;
    header("Location: signup.php");
    die();
}