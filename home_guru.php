<?php
include "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION['nama'];

include "footer.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/img/mylogo.jpg" type="image/x-icon">
    <title>Home Guru</title>
</head>

<body>
</body>

</html>