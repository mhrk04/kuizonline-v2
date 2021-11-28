<?php
session_start();
require "../functions.php";

if ($_GET == false) {
    header("Location: ../login.php");
    exit;
}
if ($_SESSION['status'] != "guru") {
    header("Location: ../login.php");
    exit;
}


$id = $_GET["id"];
$fill = $_GET["fill"];
$table = $_GET["table"];
if ($id == $_SESSION['username'] && $table == 'guru') {
    echo "
           <script>
           alert('User sedang digunakan !');
           document.location.href = '../guru_senarai.php';
           </script>";
    exit;
}
if (hapus($id, $table, $fill) > 0) {
    switch ($table) {
        case 'soalan':
            echo "
         <script>
         alert('Data berjaya dihapus !');
         document.location.href = '../soalan_senarai.php';
         </script>";
            break;
        case 'pelajar':
            echo "
             <script>
             alert('Data berjaya dihapus !');
             document.location.href = '../guru_senarai.php';
             </script>";
            break;
        case 'guru':
            echo "
           <script>
           alert('Data berjaya dihapus !');
           document.location.href = '../guru_senarai.php';
           </script>";
            break;
        case 'kelas':
            echo "<script>
            alert('Data berjaya dihapus !');
            document.location.href = '../kelas_insert.php';
            </script>";
    }
} else {
    echo "
        <script>
        alert('Data tidak berjaya dihapus.');
        document.location.href = '../home_guru.php';
        </script>";
}
