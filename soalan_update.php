<?php
session_start();
$title = "Kemaskini Soalan";
require "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";
include "css/borang.php";
include "css/button.php";
$id = $_GET["id"];
$soalan = query("SELECT * FROM soalan WHERE IDSoalan = '$id'")[0];


if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubahsoalan($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya diubah');
        document.location.href = 'soalan_senarai.php';
        </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak berjaya diubah');
        document.location.href = 'soalan_senarai.php';
        </script>
        
        ";
    }
}

?>


<body>
    <div class="kandungan">
        <center>
            <h3 class="panjang">Kemaskini Soalan</h3>
            <form class="panjang" action="" method="post">
                <table>
                    <tr>
                        <td><label for="IDSoalan">ID Soalan</label></td>
                        <td><?= $soalan['IDSoalan']; ?><input type="hidden" name="IDSoalan" id="IDSoalan" placeholder="Max Char 4" value="<?= $soalan['IDSoalan']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Nama_Soalan">Soalan</label></td>
                        <td><textarea type="text" name="Nama_Soalan" id="Nama_Soalan"><?= $soalan['Nama_Soalan']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Pilihan_A">Pilihan A</label></td>
                        <td><textarea type="text" name="Pilihan_A" id="Pilihan_A"><?= $soalan['Pilihan_A']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Pilihan_B">Pilihan B</label></td>
                        <td><textarea type="text" name="Pilihan_B" id="Pilihan_B"><?= $soalan['Pilihan_B']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Pilihan_C">Pilihan C</label></td>
                        <td><textarea type="text" name="Pilihan_C" id="Pilihan_C"><?= $soalan['Pilihan_C']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Jawapan">Jawapan</label></td>
                        <td><input oninput="let p = this.selectionStart; this.value = this.value.toUpperCase();this.setSelectionRange(p, p);" name="Jawapan" id="Jawapan" value="<?= $soalan['Jawapan']; ?>">
                        <td>
                            Jika ingin ubah jawapan sila tuliskan pilihan sama A,B atau C (HURUF BESAR).
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="IDGuru">ID Guru</label></td>
                        <td><input type="text" name="IDGuru" id="IDGuru" value="<?= $soalan['IDGuru']; ?>"></td>
                    </tr>
                </table>
                <button class="update" type="submit" name="submit">Kemaskini</button></td>
            </form>
        </center>
    </div>
</body>

</html>