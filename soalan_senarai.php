<?php
require "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";
$soalan = query("SELECT * FROM soalan");


//untuk tamabah soalan
if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambahSO($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'soalan_senarai.php';
        </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak berjaya ditambah');
        document.location.href = 'soalan_senarai.php';

        </script>
        
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/senarai.css">
    <title>Senarai Soalan</title>

</head>

<body>
    <div class="kandungan">
        <center>
            <h2>Soalan</h2>
            <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <th>Bil.</th>
                    <th>ID Soalan</th>
                    <th>Soalan</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Jawapan</th>
                    <th>ID Guru</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($soalan as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["IDSoalan"]; ?></td>
                        <td><?= $row["Nama_Soalan"]; ?></td>
                        <td><?= $row["Pilihan_A"]; ?></td>
                        <td><?= $row["Pilihan_B"]; ?></td>
                        <td><?= $row["Pilihan_C"]; ?></td>
                        <td><?= $row["Jawapan"]; ?></td>
                        <td><?= $row["IDGuru"]; ?></td>


                        <td>
                            <a href="soalan_update.php?id=<?= $row['IDSoalan']; ?>">Ubah</a> |
                            <a href="hapus.php?id=<?= $row['IDSoalan']; ?>&table=soalan&fill=IDSoalan" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
            <br>
            <?php include "css/borang.php";  ?>
            <h3 class="panjang">Tambah Soalan</h3>
            <form class="panjang" action="" method="post">
                <table>
                    <tr>
                        <td><label for="IDSoalan">ID Soalan:</label></td>
                        <td><input type="text" name="IDSoalan" id="IDSoalan" placeholder="Max Char 4"></td>
                    </tr>
                    <tr>
                        <td><label for="Nama_Soalan">Soalan:</label></td>
                        <td><textarea type="text" name="Nama_Soalan" id="Nama_Soalan"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Pilihan_A">Pilihan A:</label></td>
                        <td><textarea type="text" name="Pilihan_A" id="Pilihan_A"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Pilihan_B">Pilihan B:</label></td>
                        <td><textarea type="text" name="Pilihan_B" id="Pilihan_B"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Pilihan_C">Pilihan C:</label></td>
                        <td><textarea type="text" name="Pilihan_C" id="Pilihan_C"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Jawapan">Jawapan:</label></td>
                        <td><select name="Jawapan" id="Jawapan">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="IDGuru">ID Guru:</label></td>
                        <td><input type="text" name="IDGuru" id="IDGuru" value="<?= $_SESSION['username'] ?>"></td>
                    </tr>
                </table>
                <button type="submit" name="submit">Tambah</button>

            </form>
            <?php

            if (isset($_POST['padam'])) {
                $IDPelajar = $_POST['IDPelajar'];
                $q = "DELETE FROM kuiz WHERE IDPelajar = '$IDPelajar'";
                mysqli_query($conn, $q);

                if (mysqli_affected_rows($conn) > 0) {
                    echo "
         <script>
         alert('Data berjaya dihapus !');
         document.location.href = 'soalan_senarai.php';
         </script>";
                } else {
                    echo "
         <script>
         alert('Data tidak berjaya dihapus !');
         document.location.href = 'soalan_senarai.php';
         </script>";
                }
            }
            ?>

            <h3 class="panjang">Padam Jawapan Pelajar</h3>
            <form class="panjang" action="" method="POST">
                <table>
                    <tr>
                        <td> <label for="IDPelajar">ID Pelajar :</label></td>
                        <td><input type="text" name="IDPelajar" id="IDPelajar"></label></td>
                    </tr>
                </table>
                <button type="submit" name="padam">Padam</button>
            </form>
        </center>
    </div>
</body>

</html>