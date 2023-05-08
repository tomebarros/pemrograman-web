<?php
include "restrick.php";
include "../koneksi.php";

include '../cekinput.php';


$idpetugas = input($_GET['idpetugas']);


$target = "foto/" . $idpetugas . '.jpg';
if (file_exists($target)) {
  unlink($target);
}

mysqli_query($koneksi, "DELETE FROM petugas WHERE idpetugas = '$idpetugas'");

header("location:petugas.php");
