<?php
//mula cek session
session_start();
require "functions.php";
//cek dah ade session ke blum
if (isset($_SESSION['guru'])) {
    header("Location: home_guru.php");
    exit;
} elseif (isset($_SESSION['pelajar'])) {
    header("Location: home_pelajar.php");
    exit;
}
//tamat cek session
//css dimasukkan ke php
require "css/borang.php";
require "css/button.php";
//semak user
if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $KataLaluan = $_POST['KataLaluan'];

    $sql = "select * from pelajar";
    $result = mysqli_query($conn, $sql);
    $jumpa = FALSE;
    while ($pelajar = mysqli_fetch_assoc($result)) {
        if ($pelajar['IDPelajar'] == $userid && $pelajar["KataLaluan"] == $KataLaluan) {
            $jumpa = TRUE;
            $_SESSION['username'] = $pelajar['IDPelajar'];
            $_SESSION['nama'] = $pelajar['Nama_Pelajar'];
            $_SESSION['status'] = 'pelajar';
            $_SESSION['pelajar'] = '2';
            break;
        }
    }
    if ($jumpa == FALSE) {
        $sql = "select * from guru";
        $result = mysqli_query($conn, $sql);
        while ($guru = mysqli_fetch_assoc($result)) {
            if ($guru['IDGuru'] == $userid && $guru["KataLaluan"] == $KataLaluan) {
                $jumpa = TRUE;
                $_SESSION['username'] = $guru['IDGuru'];
                $_SESSION['nama'] = $guru['Nama_Guru'];
                $_SESSION['status'] = 'guru';
                $_SESSION['guru'] = '1';
                break;
            }
        }
    }
    if ($jumpa == TRUE) {
        if ($_SESSION["status"] == "guru") {
            header("Location: home_guru.php");
        } else {
            header("Location: home_pelajar.php");
        }
    } else
        echo "<script>alert('kesalahan pada username atau katalaluan');window.location='login.php'</script>";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kuiz Santai Sejarah untuk projek sk | @mhaziqrk">
    <meta name="keywords" content="@mhaziqrk kuiz website">
    <meta name="author" content="Mhaziq Rohaizan">
    <link rel="shortcut icon" href="css/img/mylogo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Login | Kuiz Santai Sejarah</title>
    <noscript>
        <h3> Anda mesti mengaktifkan JavaScript untuk menggunakan laman web ini. Sila aktifkan JavaScript dan kemudian muatkan semula halaman ini untuk meneruskan. </h3>
        <meta HTTP-EQUIV="refresh" content=0;url="js/javascriptNotEnabled.php">
    </noscript>
    <style>
        h1 {
            font-size: 40px;
            text-decoration: teal;
        }

        /* p {
            border: 2px dotted red;
            margin: auto;
            display: block;
            border-radius: 1.15rem;
            background-color: salmon;
        } */
    </style>
</head>

<body>
    <center>
        <h1>Selamat Datang ke Laman Kuiz Santai Sejarah</h1>
        <h3 class="pendek">Halaman Login</h3>
        <form action="" method="post" class="pendek">
            <table>
                <tr>
                    <td>
                        <div class="input-container-user">
                            <img src="css/img/user.png" alt="user"> <input required type="text" id="userid" name="userid" maxlength="4" placeholder="IDPengguna" autofocus>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-container">
                            <img src="css/img/lock.png" alt="">
                            <input required class="pass" type="password" name="KataLaluan" maxlength="16" placeholder="KataLaluan" id="KataLaluan">
                            <i class="material-icons visibility">visibility_off</i>
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" class="login" name="login">Login</button>
            <button type="button" class="signup" onclick="window.location='signup.php'">Sign Up</button>
        </form>
        <br>
        <!-- <p>Pastikan anda tidak menyekat fungsi javascript. <br>Website ini berjalan dengan optimal apabila dijalankan pada pelayar di desktop.</p> -->
    </center>
    <script src="js/script.js"></script>
</body>
<footer>
    <?php
    include "footer.php";
    ?></footer>

</html>