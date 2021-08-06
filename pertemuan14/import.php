<?php
include('sambungan.php');
$namajadual = $_POST['namatable'];
$namafail = $_FILES['namafail']['name'];
$fail = fopen($namafail, "r");
while (!feof($fail)) {

	$medan = explode(",", fgets($fail));

	if ($namajadual === "pelajar") {
		$IDPelajar = $medan[0];
		$Nama_Pelajar = $medan[1];
		$IDKelas = $medan[2];
		$sql = "insert into pelajar values('$IDPelajar', '$Nama_Pelajar', '$IDKelas')";
		if (mysqli_query($sambungan, $sql))
			$berjaya = true;
		else
			$berjaya = false;
	}
	if ($namajadual === "soalan") {
		$IDSoalan = $medan[0];
		$Nama_Soalan = $medan[1];
		$Pilihan_A = medan[2];
		$Pilihan_B = medan[3];
		$Pilihan_C = medan[4];
		$Jawapan = medan[5];
		$IDGuru = medan[6];
		$sql = "insert into soalan values('$IDSoalan', '$Nama_Soalan', '$Pilihan_A', '$Pilihan_B', '$Pilihan_C', '$Jawapan', '$IDGuru')";
		if (mysqli_query($sambungan, $sql))
			$berjaya = true;
		else
			$berjaya = false;
	}
}
if (berjaya === true)
	echo "<script>alert('Rekod berjaya di import');</script>";
else
	echo "<script>alert('Rekod tidak berjaya di import');</script>";

mysqli_close($sambungan);



?>