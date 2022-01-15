<?php
session_start();
    include 'functions.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // something was posted
        $user_name = $_POST['user_name']; // form's name value
        $password = $_POST['password']; // form's name value

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            // if everything's legit save to database
            $user_id = random_num(20); // 20: max length
            $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
            mysqli_query($con, $query);

            // after signup user is redirected to login page
            header("Location: login.php");
            die;
        }else {
            echo "Please enter valid information ";
        }

    }

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
</head>
<body>
<div>

    <form method="post">
        <span>Signup</span>
        Username:<input type="text" name="user_name"><br><br>
        Password:<input type="password" name="password"><br><br>
        <input type="submit" value="Login"><br><br>
        <a href="login.php">Click to login</a>
    </form>

</div>
</body>
</html>
