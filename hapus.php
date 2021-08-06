<?php 

require "functions.php";


    $id = $_GET["id"];
    $fill = $_GET["fill"];
    $table = $_GET["table"];

if ( hapus($id,$table,$fill) > 0) {
    if ($table == "soalan") {
        echo "
        <script>
        alert('Data berjaya dihapus !');
        document.location.href = 'soalan_senarai.php';
        </script>
        
        ";
    }elseif ($table == "guru" || "pelajar") {
        echo "
        <script>
        alert('Data berjaya dihapus !');
        document.location.href = 'guru_senarai.php';
        </script>
        
        ";
    }
    
}else{ echo "
        <script>
        alert('Data tidak berjaya dihapus.');
        document.location.href = 'home_guru.php';
        </script>";  
}
?>