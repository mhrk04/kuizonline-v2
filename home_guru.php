<?php 
require "menu_guru.php";
include "header.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu2.css">
    <title>Home Guru</title>
</head>
<body>
    <div class="kandungan">
    <h1>Selamat Datang ke Kuiz santai sejarah</h1>
    </div>
</body>
</html>