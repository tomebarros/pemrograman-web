<?php
include "restrick.php";
include "../koneksi.php";

include '../cekinput.php';


$iddetailtransaksi = input($_GET['iddetailtransaksi']);
$id = input($_GET['id']);


mysqli_query($koneksi, "DELETE FROM detailtransaksi WHERE iddetailtransaksi = '$iddetailtransaksi'");


header("location:detailtransaksi.php?id=$id");
