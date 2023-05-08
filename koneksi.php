<?php
$koneksi = mysqli_connect("localhost", "laundr11_tome", "1gICzygo", "laundr11_tome");

//cek koneksi berhasil atau tidak
if (mysqli_connect_errno()) {
  echo "Koneksi Database Gagal : " . mysqli_connect_error();
}
