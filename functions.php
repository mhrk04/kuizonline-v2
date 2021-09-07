<?php
// sambung ke database
$conn = mysqli_connect("localhost", "root", "12345678", "kuizonline");

//function mengquery database
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    //ambil data dari setiap elemen form
    $IDPelajar = htmlspecialchars($data["IDPelajar"]);
    $Nama_Pelajar = htmlspecialchars($data["Nama_Pelajar"]);
    $IDKelas = htmlspecialchars($data["IDKelas"]);
    $KataLaluan = htmlspecialchars($data["KataLaluan"]);

    // cek ID dah ade blum sudah ada atau belum
    $result = mysqli_query($conn, "SELECT IDPelajar FROM pelajar WHERE IDPelajar = '$IDPelajar' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                 alert('ID sudah digunakan!')
               </script>";
        return false;
    }
    //query insert data
    $query = "INSERT INTO pelajar VALUES ('$IDPelajar','$Nama_Pelajar','$IDKelas','$KataLaluan') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahSO($data)
{
    global $conn;
    //ambil data dari setiap elemen form
    $IDSoalan = htmlspecialchars($data["IDSoalan"]);
    $Nama_Soalan = htmlspecialchars($data["Nama_Soalan"]);
    $Pilihan_A = htmlspecialchars($data["Pilihan_A"]);
    $Pilihan_B = htmlspecialchars($data["Pilihan_B"]);
    $Pilihan_C = htmlspecialchars($data["Pilihan_C"]);
    $Jawapan = htmlspecialchars($data["Jawapan"]);
    $IDGuru = htmlspecialchars($data["IDGuru"]);
    if (empty($IDSoalan && $Nama_Soalan && $Pilihan_A && $Pilihan_B && $Pilihan_C)) {
        echo "<script>
          alert('Terdapat ruangan borang yang belum terisi!');
          document.location.href = 'soalan_senarai.php';
          </script>";

        return false;
    }

    // cek ID dah ade blum sudah ada atau belum
    $result = mysqli_query($conn, "SELECT IDSoalan FROM soalan WHERE IDSoalan = '$IDSoalan' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                 alert('ID sudah digunakan!')
               </script>";
        return false;
    }
    //query insert data
    $query = "INSERT INTO soalan VALUES ('$IDSoalan','$Nama_Soalan','$Pilihan_A','$Pilihan_B','$Pilihan_C','$Jawapan','$IDGuru') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambahkelas($data)
{
    global $conn;
    //amik data dari form
    $IDKelas = htmlspecialchars($data["IDKelas"]);
    $Nama_Kelas = htmlspecialchars($data["Nama_Kelas"]);

    //cek form dah isi blum
    if (empty($IDKelas) || empty($Nama_Kelas)) {
        echo "<script>
          alert('Terdapat ruangan borang yang belum terisi');
          document.location.href = 'kelas_insert.php';
          </script>";

        return false;
    }
    //cek kelas dah ade blum
    $result = mysqli_query($conn, "SELECT IDKelas FROM kelas WHERE IDKelas = '$IDKelas'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('ID sudah digunakan!')
              </script>";
        return false;
    }
    if (strlen($IDKelas) > 3) {
        echo "<script>
            alert('Panjang ID melebihi 3 aksara');
          </script>";
        return false;
    }
    //query insert data
    $query = "INSERT INTO kelas VALUES ('$IDKelas','$Nama_Kelas') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahguru($data)
{
    global $conn;
    //ambil data dari setiap elemen form
    $IDGuru = htmlspecialchars($data["IDGuru"]);
    $Nama_Guru = htmlspecialchars($data["Nama_Guru"]);
    $KataLaluan = htmlspecialchars($data["KataLaluan"]);

    // cek form dah diisi blum
    if (empty($IDGuru) || empty($Nama_Guru) || empty($KataLaluan)) {
        echo "<script>
              alert('Terdapat ruangan borang yang belum terisi');
              document.location.href = 'guru_insert.php';
              </script>";

        return false;
    }

    // cek ID dah ade blum sudah ada atau belum
    $result = mysqli_query($conn, "SELECT IDGuru FROM guru WHERE IDGuru = '$IDGuru' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                 alert('ID sudah digunakan!')
               </script>";
        return false;
    }
    //query insert data
    $query = "INSERT INTO guru VALUES ('$IDGuru','$Nama_Guru','$KataLaluan') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id, $table, $fill)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM $table WHERE $fill = '$id'");
    return mysqli_affected_rows($conn);
}

function hapuskel($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kelas WHERE IDKelas = '$id'");
    return mysqli_affected_rows($conn);
}


function kelaslist()
{
    global $conn;
    $sql = "SELECT * FROM kelas";
    $data = mysqli_query($conn, $sql);
    while ($kelas = mysqli_fetch_assoc($data)) {
        echo "<option value='$kelas[IDKelas]'>$kelas[Nama_Kelas]</option>";
    }
}
function ubahguru($data)
{
    global $conn;
    $IDGuru = htmlspecialchars($data["IDGuru"]);
    $Nama_Guru = htmlspecialchars($data["Nama_Guru"]);
    $KataLaluan = htmlspecialchars($data["KataLaluan"]);

    $query = "UPDATE guru SET
            Nama_Guru = '$Nama_Guru',
            KataLaluan = '$KataLaluan'
            where IDGuru = '$IDGuru'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    //ambil data dari setiap elemen form
    $IDPelajar = htmlspecialchars($data["IDPelajar"]);
    $Nama_Pelajar = htmlspecialchars($data["Nama_Pelajar"]);
    $IDKelas = htmlspecialchars($data["IDKelas"]);
    $KataLaluan = htmlspecialchars($data["KataLaluan"]);

    //query insert data
    $query = "UPDATE pelajar SET
            Nama_Pelajar = '$Nama_Pelajar',
            IDKelas = '$IDKelas',
            KataLaluan = '$KataLaluan'
            where IDPelajar = '$IDPelajar'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahsoalan($data)
{
    global $conn;
    //ambil data dari setiap elemen form
    $IDSoalan = htmlspecialchars($data["IDSoalan"]);
    $Nama_Soalan = htmlspecialchars($data["Nama_Soalan"]);
    $Pilihan_A = htmlspecialchars($data["Pilihan_A"]);
    $Pilihan_B = htmlspecialchars($data["Pilihan_B"]);
    $Pilihan_C = htmlspecialchars($data["Pilihan_C"]);
    $Jawapan = htmlspecialchars($data["Jawapan"]);
    $IDGuru = htmlspecialchars($data["IDGuru"]);


    //query insert data
    $query = "UPDATE soalan SET
            Nama_Soalan = '$Nama_Soalan',
            Pilihan_A = '$Pilihan_A',
            Pilihan_B = '$Pilihan_B',
            Pilihan_C = '$Pilihan_C',
            Jawapan = '$Jawapan',
            IDGuru = '$IDGuru'
            where IDSoalan = '$IDSoalan'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahkel($data)
{
    global $conn;
    // variable
    $IDKelas = htmlspecialchars($data["IDKelas"]);
    $Nama_Kelas = htmlspecialchars($data["Nama_Kelas"]);
    // query update
    $query = "UPDATE kelas SET
            Nama_kelas = '$Nama_Kelas'
            where IDKelas = '$IDKelas'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM pelajar
                WHERE
                Nama_Pelajar LIKE '%$keyword%' OR 
                IDPelajar LIKE '%$keyword%'
                ";
    return query($query);
}


//fungsi sign up
function registrasi($data)
{
    global $conn;
    // isi variable
    $IDPelajar = $data["IDPelajar"];
    $Nama_Pelajar = htmlspecialchars($data["Nama_Pelajar"]);
    $IDKelas = htmlspecialchars($data["IDKelas"]);
    $KataLaluan = mysqli_real_escape_string($conn, $data["KataLaluan"]);
    $KataLaluan2 = mysqli_real_escape_string($conn, $data["KataLaluan2"]);
    //cek klau kosong value
    if (empty($IDPelajar && $Nama_Pelajar && $KataLaluan && $KataLaluan2)) {
        echo "<script>
				alert('Sila isi semua ruang borang signup!');
		      </script>";
        return false;
    }

    // cek ID dah ade blum sudah ada atau belum
    $result = mysqli_query($conn, "SELECT IDPelajar FROM pelajar WHERE IDPelajar = '$IDPelajar' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('ID sudah digunakan!')
		      </script>";
        return false;
    }
    // cek panjang string
    if (strlen($IDPelajar) > 4) {
        echo "<script>
            alert('Panjang ID melebihi 4');
          </script>";
        return false;
    }
    // cek passwod
    if ($KataLaluan !== $KataLaluan2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
          </script>";
        return false;
    }    // tambahkan userbaru ke database
    $query = "INSERT INTO pelajar VALUES ('$IDPelajar','$Nama_Pelajar','$IDKelas','$KataLaluan') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
