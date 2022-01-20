<?php
session_start();


function connect_to_db () {
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "yemek_torbasi";
    return mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
}

function check_login() :void
{
    $conn = connect_to_db();
    $username = "";
    $ent_password = filterInput($_POST['password']);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = $conn->prepare("SELECT user_id,user_name,password FROM users WHERE user_name=? LIMIT 1");
    $sql->bind_param("s", $username);
    $username = filterInput($_POST['username']);
    $sql->execute();

    $result = $sql->get_result();

    $row = $result->fetch_assoc();

    if (password_verify($ent_password, $row['password']) ) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        unset($_SESSION['loginErr']);
        unset($_SESSION['signupErr']);
        $sql->free_result();
        $conn->close();
        header("Location: index.php");
        die();
    } else {
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;
        $_SESSION['loginErr']="Wrong username and/or password";
        $sql->free_result();
        $conn->close();
        header("Location: login.php?alert=2"); // alert 2 means wrong password or username
        die("Wrong username and/or password");
    }
}

function acc_details() {
    $conn = connect_to_db();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } elseif (empty($_SESSION['user_id'])){
        header("Location: login.php");
        die("You are not logged in");
    }
    $sql = $conn->prepare("SELECT user_id,user_name,balance FROM users WHERE user_name=? LIMIT 1");
    $sql->bind_param("s", $username);
    $username = filterInput($_SESSION['user_name']);
    $sql->execute();

    $result = $sql->get_result();

    $row = $result->fetch_assoc();

    if($result->num_rows>0) {
        echo
            '<table class="table table-striped" style="max-width: 50%">
        <tr><th>User ID</th><th>User Name</th><th>Balance</th></tr>
        <tr><td>' . $row["user_id"] . '</td><td>' . $row["user_name"] . '</td><td>' . $row["balance"] . '</td></tr>
    </table>';
    } else{
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;
        header("Location: index.php");
        die();
    }

}

function random_num($length): int
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    // generating a random user_id at different lengths
    return (int) $text;
}

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function filterInput($input) : string {

    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);

    return $input;
}