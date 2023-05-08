<?php
include "restrick.php";
include "../koneksi.php";

include '../getdata.php';
$idpelanggan = filter($_POST['idpelanggan']);
$nama = filter($_POST['nama']);
$jeniskelamin = filter($_POST['jeniskelamin']);
$alamat = filter($_POST['alamat']);
$password = filter($_POST['password']);


if(!isset($_POST['validasi'])){
  mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama',jeniskelamin='$jeniskelamin',alamat='$alamat', password='$password',status=0 WHERE idpelanggan='$idpelanggan'");
  header("location:pelanggan.php");
} else {
  mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama',jeniskelamin='$jeniskelamin',alamat='$alamat', password='$password' WHERE idpelanggan='$idpelanggan'"); 
  header("location:pelanggan.php");
}
