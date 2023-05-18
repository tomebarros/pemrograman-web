<?php
include '../koneksi.php';
include '../getdata.php';

$email = filter($_POST['email']);

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email LIKE '$email'");
if (mysqli_num_rows($data) > 0) {
  while ($d = mysqli_fetch_array($data)) {
    $nama = $d['nama'];
    $password = $d['password'];
  }

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Required variables
  $FROMEMAIL  = '"AtoLaundry" <admin@21120055laundry.my.id>';
  $TOEMAIL    = $email;
  $SUBJECT    = "Lupa Password";
  $PLAINTEXT  = "password anda : $password";
  $RANDOMHASH = "anyrandomhash";
  $FICTIONALSERVER = "@email.myownserver.com";


  // Basic headers
  $headers = "From: " . $FROMEMAIL . "\n";
  $headers .= "Reply-To: " . $FROMEMAIL . "\n";
  $headers .= "Return-path: " . $FROMEMAIL . "\n";
  $headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
  $headers .= "21120055laundry.my.id/pelanggan\n";
  $headers .= "Dear $nama ,Terimah kasih sudah menggunakan AtoLaundry\n";

  // Add content type (plain text encoded in quoted printable, in this example)
  $headers .= "Berikut password anda\r\n";

  // Convert plain text body to quoted printable
  $message = quoted_printable_encode($PLAINTEXT);

  // Create a BASE64 encoded subject
  $subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

  // Send email
  mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);

  echo "
  <script>
      alert('Konfirmasi Berhasil, Silahkan Cek Email Anda!')
    document.location.href='index.php'
    </script>
  ";
} else {
  echo "
 	 <script>
      alert('Email Yang Anda Masukan Tidak Terdaftar Di BEM Laundry')
      history.go(-1)
    </script>
  ";
}
