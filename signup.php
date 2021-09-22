<?php
require "functions.php";
include "css/borang.php";
include "css/button.php";
if (isset($_POST["signup"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('Berjaya Sign Up!');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/img/mylogo.jpg" type="image/x-icon">
    <title>Sign Up</title>
    <script src="https://use.fontawesome.com/6154921c1c.js"></script>


</head>

<body>
    <center>
        <h3 class="panjang">SIGN UP</h3>
        <form class="panjang" action="" method="post">
            <table>
                <tr>
                    <td><label for="IDPelajar">ID Pelajar </label></td>
                    <td><input maxlength="4" type="text" name="IDPelajar" id="IDPelajar" placeholder="Max 4 char"></td>
                </tr>
                <tr>
                    <td><label for="Nama_Pelajar">Nama </label></td>
                    <td><input type="text" name="Nama_Pelajar" id="Nama_Pelajar"></td>
                </tr>
                <tr>
                    <td><label for="IDKelas">Kelas </label></td>
                    <td><select id="IDKelas" name="IDKelas">
                            <?php kelaslist(); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="KataLaluan">KataLaluan </label></td>
                    <td><input type="password" maxlength="16" name="KataLaluan" id="KataLaluan"></td>
                </tr>
                <tr>
                    <td><label for="KataLaluan2">Pengesahan KataLaluan </label></td>
                    <td><input type="password" maxlength="16" name="KataLaluan2" id="KataLaluan2"></td>
                </tr>
            </table>
            <button type="submit" class="signup" name="signup"><i class="fa fa-user-plus" aria-hidden="true"></i>
                Daftar</button>
            <button type="button" class="padam" onclick="window.location='login.php'"><i class="fa fa-ban" aria-hidden="true"></i>
                Batal</button>
        </form>
    </center>
    <?php
    include "footer.php"
    ?>
</body>

</html>