<?php
include "restrick.php";
include "../koneksi.php";

include '../cekinput.php';

$idpelanggan = input($_GET['idpelanggan']);

mysqli_query($koneksi, "DELETE FROM pelanggan WHERE idpelanggan = '$idpelanggan'");

header("location:pelanggan.php");
