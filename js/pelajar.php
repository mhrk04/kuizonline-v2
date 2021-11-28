<?php
session_start();
require "../functions.php";
sec("guru");
$keyword = $_GET['keyword'];
$query = "SELECT * FROM pelajar WHERE
Nama_Pelajar LIKE '%$keyword%' OR 
IDPelajar LIKE '%$keyword%' OR
IDKelas LIKE '%$keyword%';
";
$pelajar = query($query);
?>


<table class="list">
  <tr>
    <th>Bil.</th>
    <th>ID Pelajar</th>
    <th>Nama Pelajar</th>
    <th>ID Kelas</th>
    <th>Aksi</th>
  </tr>
  <?php $j = 1; ?>
  <?php foreach ($pelajar as $pel) : ?>
    <tr class="list">
      <td><?= $j; ?></td>
      <td><?= $pel["IDPelajar"]; ?></td>
      <td><?= $pel["Nama_Pelajar"]; ?></td>
      <td><?= $pel["IDKelas"]; ?></td>
      <td>
        <a class="update" href="pelajar_update.php?id=<?= $pel['IDPelajar']; ?>">Ubah</a>
        <a class="padam" href="include/hapus.php?id=<?= $pel['IDPelajar']; ?>&table=pelajar&fill=IDPelajar" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
      </td>
    </tr>
    <?php $j++; ?>
  <?php endforeach; ?>
</table>