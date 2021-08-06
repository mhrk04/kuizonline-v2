<?php 

require "functions.php";
$id = $_GET["IDKelas"];

if ( hapuskel($id) > 0) {
    echo "
        <script>
        alert('data berjaya dihapus');
        document.location.href = 'kelas_senarai.php';
        </script>
        
        ";
}else{
    echo "
    <script>
    alert('data tidak berjaya dihapus');
    document.location.href = 'kelas_senarai.php';
    </script>
    
    ";
}
?>