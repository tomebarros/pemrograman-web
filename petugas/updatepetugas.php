<?php
include "restrick.php";
include "../koneksi.php";


include '../getdata.php';

$idpetugas = filter($_POST['idpetugas']);
$nama = filter($_POST['nama']);
$jeniskelamin = filter($_POST['jeniskelamin']);
$alamat = filter($_POST['alamat']);
$password = filter($_POST['password']);

mysqli_query($koneksi, "UPDATE petugas SET nama='$nama', jeniskelamin='$jeniskelamin', alamat='$alamat',password='$password' WHERE idpetugas='$idpetugas'");

header("location:petugas.php");
