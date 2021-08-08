<?php 
session_start();
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;}
require "functions.php";
$IDPelajar = $_SESSION['username'];

$sql = "SELECT * FROM kuiz WHERE IDPelajar = '$IDPelajar'";
$data = mysqli_query($conn,$sql);
if (mysqli_num_rows($data) > 0) {
    header("Location: jawab_ulangkaji.php");
}else {
    header("Location: jawab_soalan.php");
}
?>