<?php
session_start();


function connect_to_db () {
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "yemek_torbasi";
    $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    return $conn;
}

function check_login()
{
    $conn = connect_to_db();
    $username = "";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = $conn->prepare("SELECT user_id,user_name,password FROM users WHERE user_name=? LIMIT 1");
    $sql->bind_param("s", $username);
    $username = $_POST['username'];
    $sql->execute();

    $result = $sql->get_result();

    $row = $result->fetch_assoc();
    if ($row['password'] === $_POST['password']) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['loginErr'] = null;
        $_SESSION['signupErr'] = null;
        header("Location: index.php");
        die();
    } else {
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;
        $_SESSION['loginErr']="Wrong username and/or password";
        header("Location: login.php");
        die("Wrong username and/or password");
    }



    $sql->free_result();
    $conn->close();

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
    $username = $_SESSION['user_name'];
    $sql->execute();

    $result = $sql->get_result();

    $row = $result->fetch_assoc();

    echo
    '<table class="table table-striped" style="max-width: 50%">
        <tr><th>User ID</th><th>User Name</th><th>Balance</th></tr>
        <tr><td>'.$row["user_id"].'</td><td>'.$row["user_name"].'</td><td>'.$row["balance"].'</td></tr>
    </table>';
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