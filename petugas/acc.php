<?php
include "restrick.php";
include "../koneksi.php";

include '../getdata.php';


$idpelanggan= filter($_GET['idpelanggan']);


$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE idpelanggan LIKE '$idpelanggan'");
if (mysqli_num_rows($data) > 0) {
  while ($d = mysqli_fetch_array($data)) {
    $nama = $d['nama'];
    $email = $d['email'];
    $jeniskelamin = $d['jeniskelamin'];
  }
  if($jeniskelamin == 'Laki-Laki'){
    $gender = 'Bapak';
  }else {
    $gender = 'Ibu';
  }
}

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Required variables
  $FROMEMAIL  = '"AtoLaundry" <admin@21120055laundry.my.id>';
  $TOEMAIL    = $email;
  $SUBJECT    = "Verifikasi Akun";
  $PLAINTEXT  = "21120055laundry.my.id/pelanggan";
  $RANDOMHASH = "anyrandomhash";
  $FICTIONALSERVER = "@email.myownserver.com";


  // Basic headers
  $headers = "From: " . $FROMEMAIL . "\n";
  $headers .= "Reply-To: " . $FROMEMAIL . "\n";
  $headers .= "Return-path: " . $FROMEMAIL . "\n";
  $headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
  $headers .= "Dear $gender $nama ,Akun Anda Di AtoLaundry Sudah Diverifikasi Silahkan Login Ulang\n";


  // Convert plain text body to quoted printable
  $message = quoted_printable_encode($PLAINTEXT);

  // Create a BASE64 encoded subject
  $subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

  // Send email
  mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);

mysqli_query($koneksi, "UPDATE pelanggan SET status=1 WHERE idpelanggan='$idpelanggan'");
header("location:pelanggan.php");