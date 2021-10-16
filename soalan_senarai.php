<?php
session_start();
$title = "Soalan";
require "header.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";
include "css/senarai.php";
include "css/button.php";
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


<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <center>
            <h2>Soalan</h2>
            <table class="list">
                <tr>
                    <th class="bil">Bil.</th>
                    <th>ID Soalan</th>
                    <th>Soalan</th>
                    <!-- <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th> -->
                    <th>Jawapan</th>
                    <th>ID Guru</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($soalan as $row) : ?>
                    <tr class="list">
                        <td><?= $i; ?></td>
                        <td><?= $row["IDSoalan"]; ?></td>
                        <td><?= $row["Nama_Soalan"]; ?></td>
                        <td><?= $row["Jawapan"]; ?></td>
                        <td><?= $row["IDGuru"]; ?></td>
                        <td>
                            <a class="update" href="soalan_update.php?id=<?= $row['IDSoalan']; ?>">Lebih lagi</a>
                            <a class="padam" href="./include/hapus.php?id=<?= $row['IDSoalan']; ?>&table=soalan&fill=IDSoalan" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
            <br>
            <!-- batas tambah soalah -->
            <?php include "css/borang.php";  ?>
            <h3 class="panjang">Tambah Soalan</h3>
            <form class="panjang" action="" method="post">
                <table>
                    <tr>
                        <td class="tak"><label for="IDSoalan">ID Soalan</label></td>
                        <td class="tak"><input required maxlength="4" type="text" name="IDSoalan" id="IDSoalan" placeholder="Max Char 4"></td>
                    </tr>
                    <tr>
                        <td class="tak"><label for="Nama_Soalan">Soalan</label></td>
                        <td class="tak"><textarea required type="text" name="Nama_Soalan" id="Nama_Soalan"></textarea></td>
                    </tr>
                    <tr>
                        <td class="tak"><label for="Pilihan_A">Pilihan A</label></td>
                        <td class="tak"><textarea required type="text" name="Pilihan_A" id="Pilihan_A"></textarea></td>
                    </tr>
                    <tr>
                        <td class="tak"><label for="Pilihan_B">Pilihan B</label></td>
                        <td class="tak"><textarea required type="text" name="Pilihan_B" id="Pilihan_B"></textarea></td>
                    </tr>
                    <tr>
                        <td class="tak"><label for="Pilihan_C">Pilihan C</label></td>
                        <td class="tak"><textarea required type="text" name="Pilihan_C" id="Pilihan_C"></textarea></td>
                    </tr>
                    <tr>
                        <td class="tak"><label for="Jawapan">Jawapan</label></td>
                        <td class="tak"><select name="Jawapan" id="Jawapan">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tak"><label for="IDGuru">ID Guru</label></td>
                        <td class="tak"><input required type="text" name="IDGuru" id="IDGuru" value="<?= $_SESSION['username'] ?>"></td>
                    </tr>
                </table>
                <button type="submit" class="tambah" name="submit">Tambah</button>

            </form>
            <br>

            <!-- batas padam jawapan pelajar -->
            <?php
            // ini fungsi delete
            if (isset($_POST["padam"])) {
                //cek berjaya dipadam ke tak
                if (padamJawapan($_POST) > 0) {
                    echo "
                    <script>
                    alert('data berjaya dipadam');
                    document.location.href = 'soalan_senarai.php';
                    </script>
                    
                    ";
                } else {
                    echo "
                    <script>
                    alert('data tidak berjaya dipadam');
                    document.location.href = 'soalan_senarai.php';
              
                    </script>
                    
                    ";
                }
            } ?>

            <div class="kandungan">
                <h3 class="panjang">Padam Jawapan Pelajar</h3>
                <!-- mula form -->
                <form class="panjang" action="" method="POST">
                    <!-- papar pilihan; js akan pilih ikut value -->
                    <select name='pilihan' id='pilihan' onchange='padam_pilihan()'>
                        <option value="1">Padam Semua Jawapan Pelajar</option>
                        <option value="2">Padam Mengikut Kelas</option>
                        <option value="3">Mengikut ID Pelajar</option>
                    </select>

                    <br>
                    <div id="kelas" style="display: none;">
                        <select name="IDKelas">
                            <?php
                            kelaslist()
                            ?>
                        </select>
                    </div>

                    <div id="pelajar" style="display: none;">
                        <input type="text" placeholder="ID Pelajar" maxlength="4" name="IDPelajar">
                    </div>
                    <!-- batas ke butang -->
                    <button class="padam" name="padam" type="submit" onclick="return confirm('Yakin hendak padam jawapan pelajar');">Padam</button>
                </form>
                <?php echo "<script src='js/laporan.js'></script>" ?>
            </div>
            <?php include "footer.php" ?>
</body>

</html>