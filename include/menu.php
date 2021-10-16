<?php
// elak user terjah ke file ini
if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit;
}
?>
<!-- Menu Guru -->
<?php
if ($_SESSION['status'] == "guru") { ?>
  <div class="menu">
    <h3 class="menu">Menu Utama</h3>
    <h2 class="nama"><?= $_SESSION['nama']; ?></h2>
    <ul>
      <li><a class="<?php if ($title == 'Home Guru') {
                      echo 'aktif';
                    } ?>" href="home_guru.php">Home</a></li>

      <li><a class="<?php if ($title == 'Soalan' || $title == 'Kemaskini Soalan') {
                      echo 'aktif';
                    } ?>" href="soalan_senarai.php">Soalan Kuiz</a></li>

      <li><a class="<?php if ($title == 'Laporan' || $title == 'Laporan Prestasi') {
                      echo 'aktif';
                    } ?>" href="laporan_pilihan.php">Laporan Prestasi</a></li>
      <li><a class="<?php if ($title == 'Senarai Guru & Pelajar' || $title == 'Kemaskini Guru' || $title == 'Kemaskini Pelajar') {
                      echo 'aktif';
                    } ?>" href="guru_senarai.php">Senarai Guru & Pelajar</a></li>

      <li><a class="<?php if ($title == 'Tambah Pelajar') {
                      echo 'aktif';
                    } ?>" href="pelajar_insert.php">Menambah Pelajar</a></li>
      <li><a class="<?php if ($title == 'Tambah Guru') {
                      echo 'aktif';
                    } ?>" href="guru_insert.php">Menambah Guru</a></li>
      <li><a class="<?php if ($title == 'Kelas' || $title == 'Kemaskini Kelas') {
                      echo 'aktif';
                    } ?>" href="kelas_insert.php">Menambah Kelas</a></li>
      <li><a class="<?php if ($title == 'Import') {
                      echo 'aktif';
                    } ?>" href="import.php">Import Data</a></li>
      <!-- ini batas logout -->
      <li><a class="logout" href="include/logout.php">Log Keluar</a></li>
    </ul>
  </div>
<?php } else { ?>
  <!-- Menu pelajar -->
  <div class="menu">
    <h3 class="menu">Main Menu</h3>
    <h2 class="nama"><?= $_SESSION['nama']; ?></h2>
    <div class="menu-area">
      <ul>
        <li><a class="<?php if ($title == 'Home Pelajar') {
                        echo 'aktif';
                      } ?>" href="home_pelajar.php">Home</a></li>
        <li><a class="<?php if ($title == 'Mula Kuiz') {
                        echo 'aktif';
                      } ?>" href="jawab_soalan.php">Mula Kuiz</a></li>
        <li><a class="<?php if ($title == 'Laporan') {
                        echo 'aktif';
                      } ?>" href="jawab_ulangkaji.php">Laporan</a></li>
        <li><a class="logout" href="include/logout.php">Log Keluar</a></li>
      </ul>
    </div>
  </div>
<?php } ?>