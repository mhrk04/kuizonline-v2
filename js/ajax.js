// ambil elemen html

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//tambah event bile keyword ditulis
keyword.addEventListener('keyup', function(){
  //buat objek ajax
  var xhr = new XMLHttpRequest();

  //cek kesiapan ajax
  xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200){
      container.innerHTML = xhr.responseText;
    }
  }

  xhr.open('GET','js/pelajar.php?keyword='+keyword.value,true);
  xhr.send();




});

