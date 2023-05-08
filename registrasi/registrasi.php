<?php
include '../koneksi.php';
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
  header("location: index.php?pesan=gagal");
} else {
  mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('','$nama','$jeniskelamin','$alamat','$telepon','$email','$password',0,'$tanggallahir') ");
  header("location: index.php?pesan=berhasil");
}
