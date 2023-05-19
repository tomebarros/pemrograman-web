<?php
include "koneksi.php";


include 'cekinput.php';

$nama = input($_POST['nama']);
$email = input($_POST['email']);
$judul = input($_POST['judul']);
$pesan = input($_POST['pesan']);

mysqli_query($koneksi, "INSERT INTO pesan VALUES('','$nama','$email','$judul','$pesan') ");

echo "
<script>
  alert('Pesan Anda berhasil terkirim, Terima Kasih');
  document.location = 'index.php#contact';
</script>
";

mysqli_close($koneksi);
