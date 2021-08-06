<?php 
require "functions.php";

$id = $_GET["id"];
$soalan = query("SELECT * FROM soalan WHERE IDSoalan = '$id'")[0];
var_dump($soalan['IDSoalan']);

if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubahsoalan($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya diubah');
        document.location.href = 'soalan_senarai.php';
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data tidak berjaya diubah');
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
    <title>Kemaskini Soalan</title>
</head>
<body>
    <center>
        <h2>Kemaskini Soalan</h2>
        <form action="" method="post">
        <table>
            <tr>
                <td><label for="IDSoalan">ID Soalan:</label></td>
                <td><?= $soalan['IDSoalan']; ?><input type="hidden" name="IDSoalan" id="IDSoalan" placeholder="Max Char 4" value="<?= $soalan['IDSoalan']; ?>"></td>
            </tr>
            <tr>
                <td><label for="Nama_Soalan">Soalan:</label></td>
                <td><textarea type="text" name="Nama_Soalan" id="Nama_Soalan" ><?= $soalan['Nama_Soalan']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="Pilihan_A">Pilihan A:</label></td>
                <td><textarea type="text" name="Pilihan_A" id="Pilihan_A"><?= $soalan['Pilihan_A']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="Pilihan_B">Pilihan B:</label></td>
                <td><textarea type="text" name="Pilihan_B" id="Pilihan_B"><?= $soalan['Pilihan_B']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="Pilihan_C">Pilihan C:</label></td>
                <td><textarea type="text" name="Pilihan_C" id="Pilihan_C"><?= $soalan['Pilihan_C']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="Jawapan">Jawapan:</label></td>
                <td><input name="Jawapan" id="Jawapan" value="<?= $soalan['Jawapan']; ?>">
               <td> <p>Jika ingin ubah jawapan sila tuliskan pilihan sama A,B atau C (HURUF BESAR).</p></td>
                </td>
            </tr>
            <tr>
                <td><label for="IDGuru">ID Guru:</label></td>
                <td><input type="text" name="IDGuru" id="IDGuru" value="<?= $soalan['IDGuru']; ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Kemaskini</button></td>
            </tr>
        </table>
        </form>
    </center>
</body>
</html>