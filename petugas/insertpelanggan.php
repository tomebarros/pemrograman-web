<?php
include "restrick.php";
include "../koneksi.php";

include '../cekinput.php';

$nama = input($_POST['nama']);
$jeniskelamin = input($_POST['jeniskelamin']);
$alamat = input($_POST['alamat']);
$telepon = input($_POST['telepon']);
$email = input($_POST['email']);
$password = input($_POST['password']);
$tanggallahir = input($_POST['tanggallahir']);


$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email LIKE '$email' OR telepon LIKE '$telepon'");
if (mysqli_num_rows($data)) {
  while ($d = mysqli_fetch_array($data)) {
    echo "
    <script>
    alert('Email atau Nomor Telepon yang anda masukan sudah terdaftar.Silahkan ulanggi denggan data yang lainnya')
    history.go(-1)
    </script>
    ";
  }
} else {
  mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('','$nama','$jeniskelamin','$alamat','$telepon','$email','$password',0,'$tanggallahir')");
  header("location: pelanggan.php");
}
