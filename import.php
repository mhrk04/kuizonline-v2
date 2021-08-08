<?php 
require "menu_guru.php";

if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;}
require "functions.php";
if (isset($_POST['submit'])) {
    $namajadual = $_POST['namatable'];
    $namafail = $_FILES['namafail']['tmp_name'];

$fail = fopen($namafail,"r");

while (!feof($fail)) {
    $medan = explode(",",fgets($fail));

    if ($namajadual == "pelajar") {
        $IDPelajar = $medan[0];
        $Nama_Pelajar = $medan[1];
        $IDKelas = $medan[2];
        $KataLaluan = $medan[3];
        $sql = "INSERT INTO pelajar VALUES ('$IDPelajar','$Nama_Pelajar','$IDKelas','$KataLaluan')";
        if (mysqli_query($conn,$sql)) {
            $berjaya = true;
        }else {
            $berjaya = false;
        }
    }
    if ($namajadual == "soalan") {
        $IDSoalan = $medan[0];
        $soalan = $medan[1];
        $piliha = $medan[2];
        $pilihb = $medan[3];
        $pilihc = $medan[4];
        $jawapan = $medan[5];
        $IDGuru = $medan[6];
        $sql = "INSERT INTO soalan VALUES ('$IDSoalan','$soalan','$piliha','$pilihb','$pilihc','$jawapan','$IDGuru')";
        if (mysqli_query($conn,$sql)) {
            $berjaya = true;
        }else {
            $berjaya = false;
        
        }
    }
    
}
if ($berjaya === true) {
  echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'import.php';
        </script>
        
        ";
}else {
  echo "
        <script>
        alert('data tidak berjaya ditambah');
        document.location.href = 'import.php';
        </script>";
}

}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Import data</title>
  </head>
  <body>
    <h3>Import Data</h3><br>
    <h2>test nom2
    </h2>
    <h3>pastikan data yang diamsukkan mengikut kriterian yang ditetapkan seperti id pelajar hanay 4 aksara sahaja</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Jadual</td>
          <td>
            <select name="namatable" id="namatable">
              <option value="pelajar">pelajar</option>
              <option value="soalan">Soalan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="namafail">Fail</label></td>
          <td>
            <input type="file" name="namafail" id="namafail" accept=".txt" />
          </td>
        </tr>
        <tr>
          <td><button type="submit" name="submit">Import</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>
