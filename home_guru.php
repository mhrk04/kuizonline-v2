<?php 
session_start();
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "menu_guru.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Guru</title>
</head>
<body>
    <h1>Selamat Datang ke Kuiz santai sejarah</h1>
</body>
</html>