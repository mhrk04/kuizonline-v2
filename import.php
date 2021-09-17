<?php
session_start();
$title = "Import";
require "header.php";
require "menu_guru.php";
//session
if ($_SESSION['status'] != "guru") {
  header("Location: login.php");
  exit;
}

require "functions.php";

if (isset($_POST['submit'])) {

  //cek file diupload ke tak
  $is_uploading = $_FILES["namafail"]["error"];
  $can_pass = $is_uploading == 0 ? true : false;
  if ($can_pass) {
    $namajadual = $_POST['namatable'];
    $namafail = $_FILES['namafail']['tmp_name'];

    $fail = fopen($namafail, "r");
    while (!feof($fail)) {
      $medan = explode(",", fgets($fail));

      if ($namajadual == "pelajar") {
        $IDPelajar = $medan[0];
        $Nama_Pelajar = $medan[1];
        $IDKelas = $medan[2];
        $KataLaluan = $medan[3];
        $sql = "INSERT INTO pelajar VALUES ('$IDPelajar','$Nama_Pelajar','$IDKelas','$KataLaluan');";
        mysqli_query($conn, $sql);
        // if (mysqli_query($conn, $sql)) {
        //   $berjaya = true;
        // } else {
        //   $berjaya = false;
        // }
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
        mysqli_query($conn, $sql);
        // if (mysqli_query($conn, $sql)) {
        //   $berjaya = true;
        // } else {
        //   $berjaya = false;
        // }
      }
    }
    if (mysqli_affected_rows($conn) !== 0) {
      echo "
          <script>
          alert('data berjaya ditambah');
          document.location.href = 'import.php';
          </script>
          
          ";
    } else {
      echo "
          <script>
          alert('data tidak berjaya ditambah');
          document.location.href = 'import.php';
          </script>";
    }
  } else {
    echo "<script>
    alert('data tidak berjaya ditambah !');
    document.location.href = 'import.php';
    </script>";
  }
}


include "css/borang.php";
include "css/button.php";

?>


<body>
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
            <input required type="file" name="namafail" id="namafail" accept=".txt" />
          </td>
        </tr>
      </table>
      <button type="submit" class="import" name="submit">Import</button>
    </form>
  </div>
  <br>
</body>

</html>