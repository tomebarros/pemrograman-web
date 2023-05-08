<?php
session_start();

include '../koneksi.php';
include '../cekinput.php';
include '../getdata.php';

$email = input($_POST['email']);
$password = input($_POST['password']);
$nilai = cekverifikasistatus($email);

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email = '$email' AND password = '$password'");
$cek = mysqli_num_rows($data);

// cek data akun ada atau tidak
if ($cek > 0) {

  // cek sudah diverifikasi atau belum

  if ($nilai == 1) {
    $_SESSION['usernamepelanggan'] = $email;
    $_SESSION['statuspelanggan'] = "login";
    header("location: beranda.php");
  } else {

    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email LIKE '$email'");
    $row = mysqli_fetch_assoc($query);
    $_SESSION['namapelanggan'] = $row['nama'];
    $_SESSION['emailpelanggan'] = $row['email'];
    $_SESSION['teleponpelanggan'] = $row['telepon'];
    $_SESSION['email'] = '';
    header("location:index.php?pesan=belumverifikasi");
  }
} else {
  header("location:index.php?pesan=gagal");
}
