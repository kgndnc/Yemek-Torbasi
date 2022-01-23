<?php
include "functions.php";

function check_login() : void
{
    $conn = connect_to_db();
    $username = "";
    $ent_password = filterInput($_POST['password']);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = $conn->prepare("SELECT user_id,user_name,password,balance FROM users WHERE user_name=? LIMIT 1");
    $sql->bind_param("s", $username);
    $username = filterInput($_POST['username']);
    $sql->execute();

    $result = $sql->get_result();

    $row = $result->fetch_assoc();

    if (password_verify($ent_password, $row['password']) ) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['balance'] = $row['balance'];
        unset($_SESSION['loginErr']);
        unset($_SESSION['signupErr']);
        $sql->free_result();
        $conn->close();
        header("Location: index.php");
        die();
    } else {
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;
        $_SESSION['balance'] = null;
        $_SESSION['loginErr']="Wrong username and/or password";
        $sql->free_result();
        $conn->close();
        header("Location: login.php?alert=2"); // alert 2 means wrong password or username
        die("Wrong username and/or password");
    }
}
check_login();