<?php
session_start();
require "functions.php";
sec("guru");
$title = "Import";
require "header.php";

if (isset($_POST['submit'])) {
  $filename = $_FILES['namafail']['tmp_name'];
  // CEK FILE DI UPLOAD KE X
  if ($_FILES['namafail']['size'] > 0) {
    $file = fopen($filename, "r");
    while (($medan = fgetcsv($file, 0, ",")) !== false) {
      if ($_POST['namatable'] == "pelajar") {
        $import = "INSERT INTO pelajar VALUES ('" . $medan[0] . "','" . $medan[1] . "','" . $medan[2] . "','" . $medan[3] . "')";
        $tambah = mysqli_query($conn, $import);
      } elseif ($_POST['namatable'] == "soalan") {
        // ELAKKAN WARNING UNDEFINE ARRAY BILA SALAH MASUKKAN DATA DALAM TABLE
        $C = $medan[4] ?? null;
        $jaw = $medan[5] ?? null;
        $idg = $medan[6] ?? null;
        $import = "INSERT INTO soalan VALUES ('" . $medan[0] . "','" . $medan[1] . "','" . $medan[2] . "','" . $medan[3] . "','" . $C . "','" . $jaw . "','" . $idg . "')";
        $tambah = mysqli_query($conn, $import);
      }
      if (!isset($tambah) || mysqli_affected_rows($conn) == -1) {
        // kalau gagal
        $error = true;
        $pesan = "data tidak berjaya diimport";
      } else {
        $error = false;
        $pesan = "data berjaya diimport";
      }
    } //tuttup while
    fclose($file);
    if (mysqli_affected_rows($conn) == -1 || $error == true) {
      echo "<script>alert('$pesan')</script>";
    } elseif ($error == false || mysqli_affected_rows($conn) !== 0) {
      echo "<script>alert('$pesan')</script>";
    }
  } else {
    echo "<script>alert('Sila muat naik fail csv yang mengandungi data pelajar atau soalan')</script>";
  }
}


include "css/borang.php";
include "css/button.php";
?>


<body>
  <?php include "./include/menu.php" ?>
  <div class="kandungan">
    <h3 class="pendek">Import Data</h3>
    <form class="pendek" action="" method="POST" enctype="multipart/form-data">
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
            <input required type="file" name="namafail" id="namafail" accept=".csv" />
          </td>
        </tr>
      </table>
      <button type="submit" class="import" name="submit">Import</button>
    </form>
  </div>
  <br>
</body>

</html>