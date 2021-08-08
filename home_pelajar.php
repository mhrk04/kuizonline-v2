<?php 
require "menu_pelajar.php";
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}

echo 'INI PAGE PELAJAR';

?>