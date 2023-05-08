<?php
include "restrick.php";
include "../koneksi.php";


include '../cekinput.php';
include '../getdata.php';

$idtransaksi = input($_POST['idtransaksi']);
$idjeniscucian = input($_POST['idjeniscucian']);
$berat = input($_POST['berat']);
$harga = input(hargasatuan($_POST['idjeniscucian']));

mysqli_query($koneksi, "INSERT INTO detailtransaksi VALUES('','$idtransaksi','$idjeniscucian','$berat','$harga') ");

header("location:detailtransaksi.php?id=$idtransaksi");