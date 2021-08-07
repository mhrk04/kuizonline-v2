<?php 
session_start();
require "functions.php";
if( $_SESSION["status"] == "guru" ) {
	header("Location: guru_senarai.php");
	exit;
}elseif ($_SESSION["status"] == "pelajar") {
    header("Location: home_pelajar.php");
	exit;
}

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $KataLaluan = $_POST['KataLaluan'];

    $sql = "select * from pelajar";
    $result = mysqli_query($conn, $sql);
    $jumpa = FALSE;
    while($pelajar = mysqli_fetch_assoc($result)){
        if ($pelajar['IDPelajar'] == $userid && $pelajar["KataLaluan"] == $KataLaluan){
            $jumpa = TRUE;
            $_SESSION['username'] = $pelajar['IDPelajar'];
            $_SESSION['nama'] = $pelajar['Nama_Pelajar'];
            $_SESSION['status'] = 'pelajar';
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
                break;
            }
        }
    }
    if ($jumpa == TRUE) {
        if ( $_SESSION["status"] == "guru" ) {
            header("Location: guru_senarai.php");
        }else {
            header("Location: home_pelajar.php");
        }
        
    }
    else
        echo "<script>alert('kesalahan pada username atau katalaluan');window.location='login.php'</script>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body><center>
    <h2>Halaman Login</h2>
    <form action="" method="post">
        <table >
            <tr>
                <td><label for="userid">User ID :</label></td>
                <td> <input type="text" id="userid" name="userid" placeholder="idpengguna"></td>
            </tr>
            <tr>
                <td><label for="KataLaluan">KataLaluan :</label></td>
                <td><input type="password" name="KataLaluan" id="KataLaluan"></td>   
            </tr>
        </table>
        <button type="submit" name="login">Login</button>
        <button type="button" onclick="window.location='signup.php'">Sign Up</button>
    </form></center>
</body>
</html>