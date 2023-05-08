<?php
// Konfigurasi database
$host = 'localhost';
$username = 'laundr11_tome';
$password = '1gICzygo';
$database = 'laundr11_tome';

// Konfigurasi email
$to = 'tomeobarros@gmail.com';
$subject = 'Backup database';
$from = 'admin@21120055.my.id';

// Waktu dan nama file ekspor
$date = date('Ymd_His');
$filename = $database . '_' . $date . '.sql';

// Eksekusi perintah mysqldump untuk mengekspor semua tabel
exec("mysqldump -u{$username} -p{$password} -h{$host} {$database} > {$filename}");

// Mengirimkan file hasil ekspor sebagai lampiran email
$file = file_get_contents($filename);
$attachment = chunk_split(base64_encode($file));
$boundary = md5(date('r', time()));
$headers = "From: {$from}\r\nReply-To: {$from}\r\n";
$headers .= "MIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_{$boundary}\"\r\n";

$message = "--_1_{$boundary}\r\n";
$message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
$message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$message .= "Backup database terlampir\r\n";
$message .= "--_1_{$boundary}\r\n";
$message .= "Content-Type: application/octet-stream; name=\"{$filename}\"\r\n";
$message .= "Content-Transfer-Encoding: base64\r\n";
$message .= "Content-Disposition: attachment\r\n\r\n";
$message .= $attachment . "\r\n";
$message .= "--_1_{$boundary}--";

mail($to, $subject, $message, $headers);

// Menghapus file hasil ekspor
unlink($filename);
header("location: index.php");

