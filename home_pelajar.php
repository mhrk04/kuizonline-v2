<?php 
require "menu_pelajar.php";
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Home</title>
    <link rel="stylesheet" href="css/menu2.css">
    <style>
        body{
            background-color: burlywood;
        }
    </style>
</head>
<body>
    <div class="kandungan">
        <center>
        <h2>Perarus markah akan terus dikira <br>Selepas anda <br>Habis menjawab</h2>
        </center>
    </div>
</body>
</html>