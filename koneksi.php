<?php
$koneksi = mysqli_connect("localhost", "root", "", "la");

//cek koneksi berhasil atau tidak
if (mysqli_connect_errno()) {
  echo "Koneksi Database Gagal : " . mysqli_connect_error();
}
