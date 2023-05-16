<?php
include "../koneksi.php";

include '../getdata.php';

$nama_berkas = 'Nota Laundry';
include("../mpdf60/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
$mpdf->SetHeader('');
ob_start();

$nama = $_GET['nama'];

$idtransaksi = $_GET['idtransaksi'];
$data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE idtransaksi LIKE '$idtransaksi'");
if (mysqli_num_rows($data) > 0) {
  while ($d = mysqli_fetch_array($data)) {
    $idtransaksi = $d['idtransaksi'];
    $tanggalterima = $d['tanggalterima'];
    $idpetugaspenerima = $d['idpetugaspenerima'];
    $tanggalserah = $d['tanggalserah'];
    $idpetugasserah = $d['idpetugasserah'];
    $idpelanggan = $d['idpelanggan'];
    $catatan = $d['catatan'];
    $nik = $d['nik'];
    $status = $d['status'];
  }
}
?>


<p style="text-align:center">
  <img src="../img/logo.png" width='40px'><br>

  Ato Laundry <br>
  Jl. Perintis Kemerdekaan 1,Kayu Putih,Kupang-NTT <br>
  Telp.0812121212

</p>
<hr>
<table width="100%">
  <tr>
    <td>
      Nota Nomor <br>
      Tanggal Terima <br>
      Petugas Penerima <br>
      Pelanggan <br>
      Status
    </td>
    <td>
      : <?php echo $idtransaksi; ?> <br>
      : <?php echo tanggal($tanggalterima); ?> <br>
      : <?php echo namapetugas1($idpetugaspenerima); ?> <br>
      : <?php echo namapelanggan($idpelanggan); ?> <br>
      : <?php echo $status ?>
    </td>
    <td>
      Tanggal Serah <br>
      Petugas Serah <br>
      Catatan<br>
      NIK
    </td>
    <td>
      : <?php echo tanggal($tanggalserah); ?><br>
      : <?php echo namapetugas1($idpetugasserah); ?> <br>
      : <?php echo $catatan; ?> <br>
      : <?php echo $nik; ?><br>
    </td>
  </tr>
</table>

<table border="1" cellspacing="0" width="100%" style="margin-top:30px;">

  <thead>
    <tr style="background-color:blue;">
      <th style="color:white;">No</th>
      <th style="color:white;">Jeniscucian</th>
      <th style="text-align:right; color:white;">Berat</th>
      <th style="text-align:right; color:white;">Harga Satuan</th>
      <th style="text-align:right; color:white;">Total</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $gt = 0;
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM detailtransaksi WHERE idtransaksi LIKE '$idtransaksi'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo namajeniscucian($d['idjeniscucian']); ?></td>
        <td style="text-align:right;"><?php echo $d['berat']; ?></td>
        <td style="text-align:right;"><?php echo rupiah($d['harga']); ?></td>
        <td style="text-align:right;"><?php echo rupiah($d['berat'] * $d['harga']);
                                      $gt += $d['berat'] * $d['harga'];
                                      ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>


<br>




<table>
  <tr>
    <td>Grand Total </td>
    <td>: <?php echo rupiah($gt); ?></td>
  </tr>
  <tr>
    <td>Terbilan</td>
    <td> : <?php echo ucwords(terbilang($gt) . " rupiah"); ?></td>
  </tr>
</table>


<table width="100%" cellpadding="20" style="text-align: center; font-size:15px; margin-top:50px;">
  <tr>
    <td>
      Kupang, <?php echo date('d M Y', strtotime($tanggalterima)); ?><br>
      Petugas Penerima
    </td>
    <td>
      Kupang, <?php echo date('d M Y'); ?><br>
      Pelanggan
    </td>
    <td>
      Kupang, <?php echo date('d M Y', strtotime($tanggalserah)); ?><br>
      Petugas Serah
    </td>
  </tr>
  <tr>
    <td>
      (<?php echo namapetugas1($idpetugaspenerima); ?>)
    </td>
    <td>
      (<?php echo namapelanggan($idpelanggan); ?>)
    </td>
    <td>
      (<?php echo namapetugas1($idpetugasserah); ?>)
    </td>
  </tr>
</table>

<hr>
<?php
date_default_timezone_set('Asia/Ujung_Pandang');
echo "Cetak Pada Tanggal " . date('d M Y') . " Dan Dicetak Oleh " . $nama . " Jam " . date("h:i:sa");
?>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_berkas . ".pdf", 'I');
exit;
?>