// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById('ky');
var container = document.getElementById('ajax');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function() {
    console.log(keyword);
    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/hasil.php?keyword=' + keyword.value, true);
    xhr.send();

});
