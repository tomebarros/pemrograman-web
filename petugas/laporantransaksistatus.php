<?php
include "restrick.php";
include "../koneksi.php";

include '../getdata.php';

if ($_POST['pilihan'] == 'pdf') {
  $nama_dokument = 'Laporan Transaksi Status-';
  include("../mpdf60/mpdf.php");
  $mpdf = new mPDF("en-GB-x", "Letter-L", "", "", 10, 10, 10, 10, 6, 3);
  $mpdf->SetHeader('');
  ob_start();
  $status = $_POST['status'];
} else {
  $tanggal = date("Y-m-d h:i:sa");
  header("Content-type: aplication/vnd-ms-excel");
  header("Content-Disposition: attacment; filename=Laporan Transaksi Status-" . $tanggal . ".xls");
  $status = $_POST['status'];
}
?>


<p style="text-align:center">
  <img src="../img/logo.png" alt="" width="30px"><br>
  <small>
    BEM STIKOM<br>
    Jl. Perintis Kemerdekaan 1,Kayu Putih,Kupang-NTT <br>
    Telp.081212121212
  </small>
</p>

<hr>
LAPORAN DATA TRANSAKSI <br>
Status : <?php echo $status; ?>

<?php
$cek = $data = mysqli_query($koneksi, "SELECT * FROM transaksi,detailtransaksi WHERE transaksi.idtransaksi = detailtransaksi.idtransaksi AND status LIKE '$status'");
if (mysqli_num_rows($cek) > 0) {
?>

  <table border="1" cellspacing="0" width="100%">

    <thead>
      <tr style="background-color:blue;">
        <th style="color:white;"><small>No</small></th>
        <th style="color:white;"><small>Tanggal Terima</small></th>
        <th style="color:white;"><small>Petugas Penerima</small></th>
        <th style="color:white;"><small>Tanggal Serah</small></th>
        <th style="color:white;"><small>Petugas Serah</small></th>
        <th style="color:white;"><small>Pelanggan</small></th>
        <th style="color:white;"><small>Jenis Cucian</small></th>
        <th style="color:white;"><small>Catatan</small></th>
        <th style="color:white;"><small>NIK</small></th>
        <th style="color:white;"><small>Berat</small></th>
        <th style="color:white;"><small>Harga</small></th>
        <th style="color:white;"><small>Total</small></th>
      </tr>
    </thead>

    <tbody>
      <?php
      $gt = 0;
      $no = 1;
      $data = mysqli_query($koneksi, "SELECT * FROM transaksi,detailtransaksi WHERE transaksi.idtransaksi = detailtransaksi.idtransaksi AND status LIKE '$status'");
      while ($d = mysqli_fetch_array($data)) {
      ?>
        <tr>
          <td><small><?php echo $no++; ?></small></td>
          <td><small><?php echo tanggal($d['tanggalterima']); ?></small></td>
          <td><small><?php echo namapetugas1($d['idpetugaspenerima']); ?></small></td>

          <td><small>
              <center>
                <?php
                if ($d['tanggalserah'] == '0000-00-00') {
                  echo '-';
                } else {
                  echo tanggal($d['tanggalserah']);
                }
                ?></center>
            </small>
          </td>

          <td><small><?php echo namapetugas1($d['idpetugasserah']); ?></small></td>
          <td><small><?php echo namapelanggan($d['idpelanggan']); ?></small></td>
          <td><small><?php echo namajeniscucian($d['idjeniscucian']); ?></small></td>
          <td><small><?php echo $d['catatan']; ?></small></td>
          <td><small><?php echo $d['nik']; ?></small></td>
          <td style="text-align: right;"><small><?php echo $d['berat']; ?></small></td>
          <td style="text-align: right;"><small><?php echo rupiah($d['harga']) ?></small></td>
          <td style="text-align: right;"><small><?php echo rupiah($d['harga'] * $d['berat']);
                                                $gt += $d['berat'] * $d['harga'];
                                                ?></small></td>
        </tr>
      <?php } ?>
    </tbody>

  </table>

<?php
} else {
  echo '<h1>Data Tidak Ditemukan</h1>';
}
?>

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


<table width="100%" cellpadding="20" style="text-align: center; font-size:14px; margin-top:100px;">
  <tr>
    <td>
      Kupang, <?php echo date('d M Y'); ?><br>
      Petugas
    </td>
  </tr>
  <tr>
    <td>
      (<?php echo $_POST['petugas']; ?>)
    </td>
  </tr>
</table>
<hr>
<?php echo "Cetak Pada Tanggal " . date('d M Y') . " Dan Dicetak Oleh " . $_POST['petugas'] . " Jam " . date("h:i:sa"); ?>


<?php
if ($_POST['pilihan'] == 'pdf') {
  $html = ob_get_contents();
  ob_end_clean();
  $mpdf->WriteHTML(utf8_encode($html));
  $mpdf->Output($nama_dokument . ".pdf", 'I');
  exit;
}
?>