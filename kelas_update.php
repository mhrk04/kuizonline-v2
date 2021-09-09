<?php
$title = "Kemaskini Kelas";
require "header.php";
require "menu_guru.php";
include "css/borang.php";
include "css/button.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";

//ambil id di url
$id = $_GET["IDKelas"];

//query data Kelas

$kelas = query("SELECT * FROM kelas WHERE IDKelas = '$id'")[0];

if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubahkel($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya diubah');
        document.location.href = 'kelas_insert.php';
        </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak berjaya diubah');
        document.location.href = 'kelas_insert.php';
        </script>
        
        ";
    }
}
?>


<body>
    <div class="kandungan">
        <h3 class="pendek">Kemaskini Data Kelas</h3>
        <form class="pendek" action="" method="post">
            <table>
                <input type="hidden" name="IDKelas" id="IDKelas" placeholder="cht:P001" value="<?= $kelas['IDKelas'] ?>">
                <tr>
                    <td> ID Kelas: <?= $kelas['IDKelas']; ?> </td>
                </tr>
                <tr>
                    <td>
                        <label for="Nama_Kelas">
                            Nama Kelas :
                            <input type="text" name="Nama_Kelas" id="Nama_Kelas" required value="<?= $kelas['Nama_Kelas'] ?>">
                        </label>
                    </td>
                </tr>
            </table>
            <button type="submit" class="update" name="submit">Kemaskini</button>
        </form>
    </div>
</body>

</html>