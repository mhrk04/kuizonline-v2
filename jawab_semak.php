<?php
session_start();
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;}

    require "functions.php";
    
    $IDPelajar = $_SESSION['username'];
    date_default_timezone_set("Asia/Kuala_Lumpur");

    $Tarikh = date('d/m/Y');
    $sql = "select * from soalan order by IDSoalan ASC";
    $data = mysqli_query($conn, $sql);
    while ($Soalan = mysqli_fetch_array($data)) {
        $IDSoalan = $Soalan['IDSoalan'];
        $jawapanpelajar = $_POST['$IDSoalan'];
        $sql = "insert into kuiz values('$IDPelajar','$IDSoalan', '$Tarikh', '$jawapanpelajar',0)";
        $datakuiz = mysqli_query($conn, $sql);
    }
    require('jawab_ulangkaji.php');
?>