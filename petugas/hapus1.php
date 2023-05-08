<?php
include "restrick.php";

$target = "foto/" . $_GET['idpetugas'] . '.jpg';
if (file_exists($target)) {
  unlink($target);
}

header("location:petugas.php?pesan=hapusberhasil");
echo "<script>window.location='petugas.php'</script>";
