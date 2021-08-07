function papar_pilihan() {
  var pilih = document.getElementById("pilihan").value;
  var paparKelas = "none";
  var paparPeratus = "none";

  if (pilih == 1) {
    paparKelas = "none";
    paparPeratus = "none";
  } else if (pilih == 2) {
    paparKelas = "block";
    paparPeratus = "none";
  } else if (pilih == 3) {
    paparKelas = "none";
    paparPeratus = "block";
  } else if (pilih == 4) {
    paparKelas = "block";
    paparPeratus = "block";
  }
  document.getElementById("kelas").style.display = paparKelas;
  document.getElementById("peratus").style.display = paparPeratus;
}
