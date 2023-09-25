<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>


  <?php include "../cdn.php"; ?>



  <!-- mycss -->
  <link rel="stylesheet" href="css/style.css" />
  <title>Tome Laundry | Login Pelanggan</title>
</head>

<body>

  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'belumverifikasi') {

      // if (empty($nama) && empty($email) && empty($telepon)){
      //   // die;
      //   echo "
      //   <script>
      //     history.go(-1)
      //   </script>
      //   "; 
      //   exit;
      // }

      //data email
      $nama = $_SESSION['namapelanggan'];
      $email = $_SESSION['emailpelanggan'];
      $telepon = $_SESSION['teleponpelanggan'];
      $linkemail = 'mailto:admin@21120055laundry.my.id?subject=Verifikasi%20Data&body=Dear%20Admin%20AtoLaundry%0ASaya%20Ingin%20Verifikasi%20Akun%20Saya.%20Berikut%20Adalah%20Identitas%20Saya.%0A%0ANama:%20' . $nama . '%0AEmail:%20' . $email . '%0ANo%20Telepon:%20' . $telepon . '';
      $linkWa = 'api.whatsapp.com/send?phone=6282146199762&text=Dear+Admin+*BEM+Laundry*%0ASaya+Ingin+*Verifikasi*+Akun+Saya.+Berikut+Adalah+Identitas+Saya.%0A%0ANama:+' . $nama . '%0AEmail:+' . $email . '%0ANo+Telepon:+' . $telepon . '';


      echo "
            <script>
              Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Data Anda Belum Diverifikasi Oleh Admin Tunggu Hingga Admin Verifikaksi Data Anda.',
                showCancelButton: true,
                cancelButtonText: 'Ok',
                confirmButtonText: 'Kontak Admin',

                cancelButtonColor: '#6c757d',
                confirmButtonColor: '#28a745',
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    /* Konformasi pilihan metode kontak */
                    title: 'Kontak Admin VIA',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: `<i class='bi bi-whatsapp'></i>`,
                    denyButtonText: `<i class='bi bi-envelope'></i>`,
                    cancelButtonText: 'Kembali',

                    denyButtonColor: '#dc3545',
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    

                  }).then((result) => {
                      /* Konformasi request kontak */
                      if (result.isConfirmed) {
                        window . open(
                          'https://'+'$linkWa',
                          '_blank' // <- This is what makes it open in a new window for WhatsApp.
                        );
                      } else if (result.isDenied) {
                          window . open(
                            '$linkemail',
                            '_blank' // <- This is what makes it open in a new window for Email.
                          );
                      }
                    })
                }
              })
            </script>
            ";
    } else if ($_GET['pesan'] == 'gagal') {
      echo "
            <script>
              Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Email Atau Password Salah',
                confirmButtonColor: '#dc3545',
              })
            </script>
            ";
    } else if ($_GET['pesan'] == 'belumlogin') {
      echo "
            <script>
              Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Halaman Ini Dibatasi',
                confirmButtonColor: '#ffc107',
              })
            </script>
            ";
    } else if ($_GET['pesan'] == 'logout') {
      echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Logout',
              text: 'Anda Telah Berhasil Logout',
              confirmButtonColor: '#28a745',
            })
            </script>";
    }
  }
  ?>

  <div class="container">
    <div class="row kotak">
      <div class="col-lg-6 mt-3 header">
        <h3>Tome Laundry</h3>
        <p>Dengan Tome Laundry anda dapat memantau transaksi dan data anda</p>
      </div>

      <div class="col-lg-6">
        <div class="row mx-2">
          <div class="col-11 shadow p-4 mb-3 bg-light mx-auto rounded-lg">
            <h2>Login Pelanggan</h2>
            <hr />
            <form method="POST" action="ceklogin.php">
              <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Anda" required autofocus="1" />
                <input type="password" name="password" class="form-control mt-2" placeholder="Password Anda" required />
              </div>

              <button type="submit" class="btn btn-primary col">Login</button>
              <p><a href="lupapassword.php" class="link">Lupa Password?</a></p>
            </form>

            <div class="row">
              <div class="col">
                <hr />
              </div>
              <div class="col text-center">Atau</div>
              <div class="col">
                <hr />
              </div>
            </div>

            <div class="col d-flex justify-content-center">
              <a href="../registrasi" class="btn btn-success">Buat Akun Baru</a>
            </div>
          </div>
        </div>

        <a href="../" class="link ml-5">Kembali Ke Dashboard</a>
      </div>
    </div>
  </div>
</body>

</html>