<?php
session_start();
$page_name = 'Çıkış';
include 'layout/top.php';

$_SESSION['user_id']=null;
$_SESSION['user_name']=null;

header("Location: index.php");

include 'layout/bottom.php';