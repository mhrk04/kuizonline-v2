<?php
session_start();
//tamabah header
$title = "Home Pelajar";
require "header.php";
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}

?>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <center>
            <h2>Peratus markah akan terus dikira <br>Selepas anda <br>Habis menjawab soalan</h2>
        </center>
    </div>
</body>

</html>