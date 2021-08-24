<?php 
require "/xampp/htdocs/kuizonline-v2/functions.php";
$guru = query("SELECT * FROM guru");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/menu2.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: rgb(192, 111, 111);
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
/* nav ul {
  list-style-type: none;
  padding: 0;
} */

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>



<header>
  <h2>Cities</h2>
</header>

<section>
  <nav>
    <?php include "/xampp/htdocs/kuizonline-v2/menu_guru.php" ?>
  </nav>
  
  <article>
  <h3>Senarai Guru</h3>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Bil.</th>
            <th>ID Guru</th>
            <th>Nama Guru</th>
            <th>Kata Laluan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($guru as $row) :?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["IDGuru"]; ?></td>
            <td><?= $row["Nama_Guru"]; ?></td>
            <td><?= $row["KataLaluan"]; ?></td>            
            <td>
                <a href="guru_update.php?id=<?= $row['IDGuru']; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row['IDGuru']; ?>&table=guru&fill=IDGuru" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
  </article>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>
