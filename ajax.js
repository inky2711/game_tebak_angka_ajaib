// ambil elemen2 yang dibutuhkan
var posting = document.getElementById('posting');
var user = document.getElementById('user');
var keluh = document.getElementById('keluh');
var daftar = document.getElementById('daftar');
var isi = document.getElementById('isi');

// tambahkan event ketika posting ditulis
user.addEventListener('keyup', function() {

    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            isi.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/user.php?id=' + user.value, true);
    xhr.send();

});
