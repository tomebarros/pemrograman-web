<?php
include "restrick.php";
include "../koneksi.php";

include '../getdata.php';

$idjeniscucian = filter($_POST['idjeniscucian']);
$nama = filter($_POST['nama']);
$harga = filter($_POST['harga']);


// cek data di transaksi
$data = mysqli_query($koneksi, "SELECT * FROM detailtransaksi WHERE idjeniscucian LIKE '$idjeniscucian'");
if (mysqli_num_rows($data) > 0) {
  mysqli_query($koneksi, "UPDATE jeniscucian SET harga='$harga' WHERE idjeniscucian='$idjeniscucian'");
  header("location:jeniscucian.php");
} else {
  // cek data sudah ada atau belum
  $data2 = mysqli_query($koneksi, "SELECT * FROM jeniscucian WHERE nama LIKE '$nama' AND idjeniscucian != '$idjeniscucian'");
  if (mysqli_num_rows($data2) > 0) {
    echo "<script>
    alert('Nama Jenis Cucian yang Anda masukan sudah terdaftar. Silahkan ulangi dengan memasukan data yang lainnya')
    document.location.href = 'jeniscucian.php'
    </script>";
  } else {
    mysqli_query($koneksi, "UPDATE jeniscucian SET nama='$nama',harga='$harga' WHERE idjeniscucian='$idjeniscucian'");
    header("location:jeniscucian.php");
  }
}
