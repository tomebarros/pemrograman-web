<?php
session_start();
if ($_SESSION['statuspelanggan'] != "login") {
  header("location:index.php?pesan=belumlogin");
}

include '../koneksi.php';
include '../getdata.php';

$email = $_SESSION['usernamepelanggan'];
$data2 = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email LIKE '$email'");
if (mysqli_num_rows($data2)) {
  while ($d2 = mysqli_fetch_array($data2)) {
    $idpelanggan = $d2['idpelanggan'];
    $nama = $d2['nama'];
    $jeniskelamin = $d2['jeniskelamin'];
    $alamat = $d2['alamat'];
    $telepon = $d2['telepon'];
    $tanggallahir = $d2['tanggallahir'];
  }
}
$namapelanggan = explode(' ', namapelanggan($idpelanggan));
$namapelanggan = $namapelanggan[0];

$v1 = date('m-d',strtotime($tanggallahir));
$v2 = date('m-d');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Beranda</title>
  
  
  
  <?php include '../cdn.php'; ?>
  <link rel="stylesheet" href="css/beranda.css">
  <!-- AOS Animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body class="color-change-2x">
  <div class="wa-desc">
    <a href="https://bit.ly/admin_laundry" target="_blank" title="Hubungi Admin via Whatsapp" aria-hidden="true"><i class="bi bi-whatsapp"></i></a>
  </div>
  <div class="wa-hp">
    <a style="z-index: 1;position: fixed;color: #f8f9fa;background: #28a745;margin: 0 30px 50px 0;padding: 1px;bottom: 0;right: 0;border-radius: 50%;font-size: 13px;" href="https://bit.ly/admin_laundry" target="_blank" title="Hubungi Admin via Whatsapp" aria-hidden="true"><i class="bi bi-whatsapp" style="margin: 5px;font-size: 20px;"></i></a>
  </div>
  <div class="wrapper">

    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <a href="#" class="navbar-brand">Ato Laundry </a>
      <span class="tgl"><?php echo date("D, d M Y"); ?> </span><span id="clock"></span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="collapseNavbar" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="logout.php" class="nav-link" onclick="return confirm('Logout')">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container shadow p-4 mb-4 bg-white">
      <h1 id="header"></h1>
      
      <?php 
      if ($v1 == $v2) {
      ?>
      <div class="row baner">
      	<div class="col-lg-9">
        	<?php include '../crs.php'; ?>
        </div>
      	<div class="col-lg-3 mt-5 mx-auto">
          <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_PojUhtZ8aP.json"  background="transparent" style="width: 70%; margin:auto;"  speed="1" loop  autoplay></lottie-player>
        </div>
      </div>
      
      <?php 
      } else {
        include '../crs.php';
      }      
      ?>

      <p class="mt-2 judul">
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H') + 1;

        if ($waktu >= '01' and $waktu <= '11') {
          $sapa = 'Selamat Pagi ';
          $pesan = ' Selamat Beraktivitas';
        } else if ($waktu >= '12' and $waktu <= '14') {
          $sapa = 'Selamat Siang ';
          $pesan = ' Istirahatlah Sejenak';
        } elseif ($waktu >= '13' and $waktu < '18') {
          $sapa = 'Selamat Sore ';
          $pesan = ' Ngopi Yuk';
        } else {
          $sapa = 'Selamat Malam ';
          $pesan = ' Selamat Beristirahat';
        }
        ?>
      </p>

      <p class="lead mt-2 judul"></p>
      <?php
    
      // var_dump($v1);
      // var_dump($v2);
      if ($v1 == $v2) {
          echo "<marquee style='background-image: linear-gradient(to right,#007bff,rgb(43, 0, 216)); padding:4px; color:white;'scrollamount='5'>Selamat Ulang Tahun $namapelanggan</marquee>";
          echo '
              <audio autoplay>
                <source src="../audio/hbd.mp3" type="audio/mpeg">
              </audio>
          ';
                
      }
      ?>


      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a href="#home" class="nav-link" data-toggle="tab">Riwayat</a>
        </li>
        <li class="nav-item">
          <a href="#menu1" class="nav-link" data-toggle="tab">Biodata</a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane container active" id="home">

          <input type="text" class="form-control mt-3" id="myInput" placeholder="Cari...">



          <div class="table-responsive mt-3">
            <table class="table table-striped table-hover table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nota</th>
                  <th>Tanggal Terima</th>
                  <th>Petugas Penerima</th>
                  <th>Tanggal Serah</th>
                  <th>Petugas Serah</th>
                  <th>Status</th>
                  <th>Catatan</th>
                  <th>NIK</th>
                </tr>
              </thead>
              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE idpelanggan = $idpelanggan");
              if (mysqli_num_rows($query) > 0) {
              ?>
                <tbody id="myTable">
                  <?php
                  $no = 1;
                  $data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE idpelanggan LIKE '$idpelanggan'");
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><a href="../petugas/nota.php?idtransaksi=<?php echo $d['idtransaksi']; ?>&nama=<?php echo $nama ?>" target="_blank">Cetak</a></td>
                      <td><?php echo tanggal($d['tanggalterima']); ?></td>
                      <td><?php echo namapetugas1($d['idpetugaspenerima']); ?></td>

                      <td>
                        <?php
                        if ($d['tanggalserah'] == '0000-00-00') {
                          echo '-';
                        } else {
                          echo tanggal($d['tanggalserah']);
                        }
                        ?>
                      </td>

                      <td><?php echo namapetugas1($d['idpetugasserah']); ?></td>
                      <td><?php echo $d['status']; ?></td>
                      <td><?php echo $d['catatan']; ?></td>
                      <td><?php echo $d['nik']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              <?php } else { ?>
                <tbody>
                  <tr>
                    <td colspan="9" style="text-align:center;">Anda Belum Melakukan Transaksi</td>
                  </tr>

                </tbody>
              <?php } ?>
            </table>
          </div>


        </div>
        <div class="tab-pane container mt-3 fade" id="menu1">
          <br>

          <div class="row">
            <div class="col-md-6">
              
             	<table>
                  <thead>
                    <tr>
                    <td>
                      Nama <br>
                      Jenis-Kelamin <br>
                      Tanggal Lahir <br>
                      Alamat <br>
                      Email <br>
                      Telepon
                    </td>
                    <td>
                      :<?php echo $nama; ?> <br>
                      : <?php echo $jeniskelamin; ?> <br>
                      : <?php echo $tanggallahir; ?> <br>
                      : <?php echo $alamat; ?> <br>
                      : <?php echo $email; ?> <br>
                      : <?php echo $telepon; ?> <br>
                    </td>
                    </tr>
                  </thead>
                </table>

            <a class="btn btn-outline-primary btn-sm" href="kartunama.php" target="_blank">Kartu Nama</a>
            
            
            
            </div>

            <div class="col-md-6 mt-3">

              <form action="ubahpassword.php" method="POST">
                <input type="hidden" name="idpelanggan" value="<?php echo $idpelanggan; ?>">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Password Lama</span>
                  </div>
                  <input type="password" class="form-control" name="password1" placeholder="Masukan Password Lama" required>
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Password Baru</span>
                  </div>
                  <input type="password" name="password2" class="form-control" placeholder="Masukan Password Baru" required>
                </div>

                <input type="submit" class="btn btn-success btn-sm" value="Simpan">

              </form>

            </div>
          </div>



        </div>
      </div> <!-- tab conten -->

    </div> <!-- container -->




    <footer class="text-center text-white fix" style="background-color: #f1f1f1;">
      <!-- Grid container -->
      <div class="container">
        <!-- pt-4 -->
        <!-- Section: Social media -->
        <section>
          <!-- mb-4 -->
          <!-- Youtube -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.youtube.com/channel/UCs6i13Cahk4zNTwfZ35EGXA" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-youtube"></i></a>
          <!-- Instagram -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/tome_barros/" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></a>
          <!-- Github -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/tomebarros" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-github"></i></a>
          <!-- Facebook -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://web.facebook.com/ato.barros.37?_rdc=1&_rdr" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Sistem Ini Dibuat Denggan Penuh <i class="bi bi-heart-fill"></i>
      </div>
      <!-- Copyright -->
    </footer>

  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/TextPlugin.min.js"></script>
  <script>
    gsap.registerPlugin(TextPlugin);
    gsap.to(".lead", {
      duration: 7,
      delay: 0.1,
      text: "<?php echo $sapa . $namapelanggan . $pesan; ?>"
    });

    gsap.from(".navbar", {
      duration: 1.5,
      y: "-100%",
      opacity: 0,
      ease: "bounce"
    });
  </script>



  <script>
    // formCari
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    //myClock
    
  function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    
    // Pad jam, menit, dan detik dengan nol jika diperlukan
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;
    
    // Membangun string waktu yang akan ditampilkan
    var timeString = hours + ":" + minutes + ":" + seconds;
    
    // Mengambil elemen HTML yang akan digunakan untuk menampilkan jam
    var clockElement = document.getElementById("clock");
    
    // Menampilkan jam di elemen HTML
    clockElement.innerHTML = timeString;
  }
  
  // Memanggil fungsi updateClock setiap detik
  setInterval(updateClock, 1000);

  </script>


</body>

</html>