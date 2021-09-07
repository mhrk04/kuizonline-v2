<?php
require "header.php";
require "menu_pelajar.php";
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}
require "functions.php";
$IDPelajar = $_SESSION['username'];

$sql1 = "SELECT * FROM kuiz WHERE IDPelajar = '$IDPelajar'";
$data = mysqli_query($conn, $sql1);
if (mysqli_num_rows($data) > 0) {
    echo
    "<script>
    alert('Anda telah menjawab kuiz. Maka anda akan dialihkan ke laman laporan.');
    document.location.href = 'jawab_ulangkaji.php';
    </script>";
}
//masukkan input user ke database
if (isset($_POST['submit'])) {

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $Tarikh = date('d/m/Y');
    $sql = "select * from soalan order by IDSoalan ASC";
    $data = mysqli_query($conn, $sql);
    while ($Soalan = mysqli_fetch_array($data)) {
        $IDSoalan = $Soalan['IDSoalan'];
        $jawapanpelajar = $_POST[$IDSoalan];
        $sql = "insert into kuiz values('$IDPelajar','$IDSoalan', '$Tarikh', '$jawapanpelajar',0)";
        mysqli_query($conn, $sql);
    }
    echo "<script>
    document.location.href = 'jawab_ulangkaji.php';
    </script>";
}
include "css/senarai.php";
include "css/button.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <center>
        <div class="kandungan">
            <form action="" method="POST">
                <table class="list">
                    <caption>SOALAN KUIZ ONLINE</caption>
                    <tr>
                        <th class="bil">Bil</th>
                        <th>Soalan</th>
                    </tr>
                    <?php
                    $sql = "select * from soalan order by IDSoalan ASC";
                    $data = mysqli_query($conn, $sql);
                    $bil = 1;
                    while ($Soalan = mysqli_fetch_array($data)) {
                    ?>
                        <tr class="list">
                            <td class="bil"><?php echo $bil; ?></td>
                            <td>
                                <!-- Soalan -->
                                <p><?= $Soalan['Nama_Soalan']; ?></p>
                                <!-- Pilihan Jawapan A -->
                                <input type="radio" id="<?php echo $Soalan['Pilihan_A']; ?>" name="<?php echo $Soalan['IDSoalan']; ?>" value="A">
                                <label for="<?php echo $Soalan['Pilihan_A']; ?>"><?php echo "A. " . $Soalan['Pilihan_A']; ?></label><br>
                                <!-- pilihan jawapan  B -->
                                <input type="radio" id="<?php echo $Soalan['Pilihan_B']; ?>" name="<?php echo $Soalan['IDSoalan']; ?>" value="B">
                                <label for="<?php echo $Soalan['Pilihan_B']; ?>"><?php echo "B. " . $Soalan['Pilihan_B']; ?></label><br>
                                <!-- Pilihan jawapan C -->
                                <input type="radio" id="<?php echo $Soalan['Pilihan_C']; ?>" name="<?php echo $Soalan['IDSoalan']; ?>" value="C">
                                <label for="<?php echo $Soalan['Pilihan_C']; ?>"><?php echo "C. " . $Soalan['Pilihan_C']; ?></label><br>

                            </td>
                        </tr>
                    <?php $bil = $bil + 1;
                    } ?>
                </table>
                <button class="semak" type="submit" name="submit">Semak</button>
            </form>
        </div>
    </center>
</body>

</html>