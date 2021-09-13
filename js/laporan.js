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

function padam_pilihan() {
  var pilih = document.getElementById("pilihan").value;
  var paparKelas = "none";
  var paparInput = "none";

  if (pilih == 1){
    paparKelas = "none";
    paparInput = "none";
} else if (pilih == 2) {
  paparKelas = "block";
  paparInput = "none";
} else if (pilih == 3) {
  paparKelas = "none";
  paparInput = "block";
}

  document.getElementById("kelas").style.display = paparKelas;
  document.getElementById("pelajar").style.display = paparInput;
}
//fungsi papar password
function showpass() {
  var x = document.getElementById("KataLaluan");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}