<?php 
session_start();
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}
require "menu_pelajar.php";
echo 'INI PAGE PELAJAR';

?>