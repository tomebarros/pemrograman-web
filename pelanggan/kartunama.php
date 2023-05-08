<?php
session_start();
include '../koneksi.php';
include '../getdata.php';


$email = $_SESSION['usernamepelanggan'];

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email LIKE '$email'");
if (mysqli_num_rows($data) > 0) {
  while ($d = mysqli_fetch_array($data)) {
    $idpelanggan = $d['idpelanggan'];
    $nama = $d['nama'];
    $jeniskelamin = $d['jeniskelamin'];
    $telepon = $d['telepon'];
    $alamat = $d['alamat'];
    $email = $d['email'];
    $tanggallahir = $d['tanggallahir'];
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../cdn.php'; ?>
  <title>Kartu nama</title>
  <link rel="stylesheet" href="css/kartunama.css">
</head>





<div class="row mx-2">
  <div class="col-md-7 col-lg-4 mx-auto kotak" id="photo">

    <div class="row">
      <div class="col-1">
        <img src="../img/logo.png" alt="logo" width="40">
      </div>
      <div class="col">
        <h3 style="font-family: cambria;font-size: 13px;font-weight: 1000;" align="center">ID CARD AtoLaundry<br>Jln.Perintis Kemerdekaan 1, Kayu Putih, Kota Kupang<br>
          Nusa Tenggara Timur</h3>
      </div>
    </div>


    <hr>

    <div class="row">
      <div class="col">

        <p>nama</p>
        <p>jenis kelamin</p>
        <p>tanggal lahir</p>
        <p>alamat</p>
        <p>telepon</p>
        <p>email</p>

      </div>
      <div class="col identitas">
        <p><?= $nama; ?></p>
        <p><?= $jeniskelamin; ?></p>
        <p><?= tanggal($tanggallahir); ?></p>
        <p><?= $alamat; ?></p>
        <p><?= $telepon; ?></p>
        <p class="email"><?= $email; ?></p>
      </div>
    </div>

  </div>
</div>


<!-- tombol download -->
<div class="container justify-content-center d-flex" id="download">
  <button class="button" style="vertical-align:middle"><span>Download</span></button>
</div>



<script>
  jQuery(document).ready(function() {
    jQuery("#download").click(function() {
      screenshot();
    });
  });

  function screenshot() {
    html2canvas(document.getElementById("photo")).then(function(canvas) {
      downloadImage(canvas.toDataURL(), "KartuPelanggan_<?php echo str_replace(" ", "", $nama); ?>.png");
    });
  }

  function downloadImage(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download !== 'string') {
      window.open(uri);
    } else {
      link.href = uri;
      link.download = filename;
      accountForFirefox(clickLink, link);
    }
  }

  function clickLink(link) {
    link.click();
  }

  function accountForFirefox(click) {
    var link = arguments[1];
    document.body.appendChild(link);
    click(link);
    document.body.removeChild(link);
  }
</script>

</body>

</html>