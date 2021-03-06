<?php
session_start();
require "functions.php";
sec("pelajar");
$title = "Laporan";
require "header.php";
include "css/senarai.php";
include "css/button.php";

$IDPelajar = $_SESSION['username'];

$sql1 = "SELECT * FROM kuiz WHERE IDPelajar = '$IDPelajar'";
$data = mysqli_query($conn, $sql1);
if (mysqli_num_rows($data) == 0) {
  echo
  "<script>
    alert('Anda belum menjawab kuiz. Maka anda akan dialihkan ke laman Mula Kuiz.');
    document.location.href = 'jawab_soalan.php';
    </script>";
}
?>

<body>
  <?php include "./include/menu.php" ?>
  <div class="kandungan">
    <table class="list">
      <caption>SKEMA DAN KEPUTUSAN</caption>
      <tr>
        <th class="bil">Bil</th>
        <th>Soalan</th>
        <th>Skema</th>
      </tr>
      <?php
      $jumlah = 0;
      $betul = 0;
      $sql = "SELECT * FROM `kuiz` JOIN soalan on kuiz.IDSoalan = soalan.IDSoalan WHERE IDPelajar = '" . $IDPelajar . "'";
      $data = mysqli_query($conn, $sql);
      $bil = 1;
      while ($kuiz = mysqli_fetch_array($data)) {
      ?>
        <tr class="list">
          <td class="bil"><?php echo $bil; ?></td>
          <td class="soalan">
            <?php
            echo $kuiz['Nama_Soalan'] . "<hr><br>";
            echo "A. " . $kuiz['Pilihan_A'] . "<br>";
            echo "B. " . $kuiz['Pilihan_B'] . "<br>";
            echo "C. " . $kuiz['Pilihan_C'] . "<br>";
            ?>
          </td>
          <td class="skema">
            <?php
            echo "Jawapannya :" . $kuiz['Jawapan'] . "<br>";
            echo "Anda pilih " . $kuiz['Pilihan'] . "<br>";
            if ($kuiz['Pilihan'] == $kuiz['Jawapan']) {
              echo "<img src='css/img/betul.png' alt='Betul'>";
              $betul = $betul + 1;
            } else
              echo "<img src='css/img/delet.png' alt='Salah'>";
            ?>
          </td>
        </tr>
        <!-- ini batas keputusan -->
      <?php
        $bil = $bil + 1;
        $jumlah = $jumlah + 1;
      }
      ?>
    </table>
    <?php
    $Peratus = $betul / $jumlah * 100;
    $salah = $jumlah - $betul;

    $sql = "update kuiz set Peratus = $Peratus where IDPelajar = '$IDPelajar'";
    $data = mysqli_query($conn, $sql);
    ?>
    <table class="list">
      <caption>KEPUTUSAN PRESTASI INDIVIDU</caption>
      <tr>
        <th class="keputusan">Perkara</th>
        <th class="keputusan">Bilangan</th>
      </tr>
      <tr class="list">
        <td class="keputusan">Bilangan yang betul</td>
        <td class="keputusan"><?php echo $betul; ?></td>
      </tr>
      <tr class="list">
        <td class="keputusan">Jumlah soalan</td>
        <td class="keputusan"><?php echo $jumlah; ?></td>
      </tr>
      <tr class="list">
        <td class="keputusan">Keputusan</td>
        <td class="keputusan"><?php echo number_format($Peratus, 0); ?> % </td>
      </tr>
    </table>
  </div>
</body>


</html>