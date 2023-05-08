<?php
include "restrick.php";
include "../koneksi.php";

include '../cekinput.php';


$idtransaksi = input($_GET['idtransaksi']);

mysqli_query($koneksi, "DELETE FROM transaksi WHERE idtransaksi = '$idtransaksi'");
mysqli_query($koneksi, "DELETE FROM detailtransaksi WHERE idtransaksi = '$idtransaksi'");

header("location:transaksi.php");
