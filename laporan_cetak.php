<?php
session_start();
$title = "Laporan Prestasi";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";
require "header.php";
include "css/senarai.php";
include "css/button.php";
?>

<head>
    <style>
        @media print {

            .header,
            .footer,
            div.menu,
            button.cetak {
                display: none;
            }

            th {
                color: black;
            }

            table {
                margin: auto;
            }

            div.all {
                border: none;
                box-shadow: none;
            }

            div.kandungan {
                overflow: visible;
            }
        }
    </style>
</head>


<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <table class="list">
            <tr>
                <th class="bil">Bil</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tarikh</th>
                <th>Peratus</th>
            </tr>
            <?php
            $Pilihan = $_POST["pilihan"];
            $IDKelas = $_POST["IDKelas"];
            $Peratus = $_POST["peratus"];
            $sql = "select * from kuiz join pelajar on kuiz.IDPelajar = pelajar.IDPelajar 
        join kelas on pelajar.IDKelas = kelas.IDKelas group by kuiz.IDPelajar";

            switch ($Pilihan) {
                case 1:
                    $syarat = "";
                    $tajuk = "PENCAPAIAN KESELURUHAN";
                    break;
                case 2:
                    $syarat = "having kelas.IDKelas = '$IDKelas'";
                    $tajuk = "PENCAPAIAN MENGIKUT KELAS";
                    break;
                case 3:
                    if ($Peratus == 80) {
                        $syarat = "having Peratus >= 80";
                        $tajuk = "PENCAPAIAN LEBIH DARI 80%";
                    } else if ($Peratus == 50) {
                        $syarat = "having Peratus >= 50";
                        $tajuk = "PENCAPAIAN LEBIH DARI 50%";
                    } else if ($Peratus == 0) {
                        $syarat = "having Peratus < 50";
                        $tajuk = "PENCAPAIAN KURANG DARI 50%";
                    }
                    break;
                case 4:
                    if ($Peratus == 80) {
                        $syarat = "having Peratus >= 80 and kelas.IDKelas = '" . $IDKelas . "'";
                        $tajuk = "PENCAPAIAN MENGIKUT KELAS DAN LEBIH 80%";
                    } else if ($Peratus == 50) {
                        $syarat = "having Peratus >= 50 and kelas.IDKelas = '" . $IDKelas . "'";
                        $tajuk = "PENCAPAIAN MENGIKUT KELAS DAN LEBIH 50%";
                    } else if ($Peratus == 0) {
                        $syarat = "having Peratus < 50 and kelas.IDKelas = '" . $IDKelas . "'";
                        $tajuk = "PENCAPAIAN MENGIKUT KELAS DAN KURANG 50%";
                    }
                    break;
            }
            $bil = 1;
            $sql = $sql . " " . $syarat; //cantum
            //echo $sql;

            $data = mysqli_query($conn, $sql);
            while ($kuiz = mysqli_fetch_array($data)) {
            ?>

                <tr class="list">
                    <td><?php echo $bil; ?></td>
                    <td><?php echo $kuiz['Nama_Pelajar']; ?></td>
                    <td><?php echo $kuiz['Nama_Kelas']; ?></td>
                    <td><?php echo $kuiz['Tarikh']; ?></td>
                    <td><?php echo $kuiz['Peratus']; ?></td>
                </tr>

            <?php
                $bil = $bil + 1;
            }
            ?>
            <caption><?php echo $tajuk; ?></caption>
        </table>
        <button class="cetak" onclick="window.print()">Cetak</button>
    </div>
</body>

</html>