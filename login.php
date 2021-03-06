<?php
//mula cek session
session_start();
require "functions.php";
//cek dah ade session ke blum
if (isset($_SESSION['username'])) {
    header("Location: home.php");
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
        header("Location: home.php");
        exit;
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
        h3.pendek {
            margin-top: 0;
        }
    </style>
    <script src="https://use.fontawesome.com/6154921c1c.js"></script>

</head>

<body>
    <center>
        <!-- start animasi -->
        <?php include "css/animation.php" ?>
        <div class="wrapper">
            <div class="laptop">
                <div class="screen">
                    <div class="wallpaper">
                        <div class="terminal"></div>
                    </div>
                </div>
                <div class="keyboard"></div>
            </div>
        </div>
        <!-- batas animasi -->
        <h3 class="pendek">Halaman Login</h3>
        <form action="" method="post" class="pendek">
            <table>
                <tr>
                    <td>
                        <div class="input-container-user">
                            <label title="ID" for="userid"><img src="css/img/user.png" alt="user"></label>
                            <input required type="text" id="userid" name="userid" maxlength="4" placeholder="IDPengguna" autofocus>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-container">
                            <label title="KataLaluan" for="KataLaluan"><img src="css/img/lock.png" alt=""></label>
                            <input required class="pass" type="password" name="KataLaluan" maxlength="16" placeholder="KataLaluan" id="KataLaluan">
                            <i class="material-icons visibility">visibility_off</i>
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" class="login" name="login"><i class="fa fa-sign-in" aria-hidden="true"></i>
                Login</button>
            <button type="button" class="signup" onclick="window.location='signup.php'"><i class="fa fa-user-plus" aria-hidden="true"></i>
                Sign Up</button>
        </form>
        <br>
        <!-- <p>Pastikan anda tidak menyekat fungsi javascript. <br>Website ini berjalan dengan optimal apabila dijalankan pada pelayar di desktop.</p> -->
    </center>
    <script src="js/script.js"></script>
</body>
<footer>
    <?php
    include "./include/footer.php";
    ?></footer>

</html>