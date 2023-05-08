<?php
session_start();
if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] == 'login') {
    header("location: petugas.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../cdn.php"; ?>
  <!-- mycss -->
  <link rel="stylesheet" href="css/style.css" />
  <title>Login Petugas</title>
</head>

<body>
  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'gagal') {
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
    <h3>AtoLaundry</h3>
    <div class="row kotak ">
      <div class="col-lg-6 animasi">
        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_vvtkfqbo.json" background="transparent" speed="1" style="width: 100%;" loop autoplay></lottie-player>
        <!-- 
        <p>Dengan AtoLaundry anda dapat memantau transaksi dan data anda</p> -->
      </div>

      <div class="col-lg-6 my-auto">
        <div class="row mx-2">
          <div class="col-11 shadow p-4 mb-3 bg-light mx-auto rounded-lg">
            <h2>Login Petugas</h2>
            <hr />
            <form method="POST" action="ceklogin.php">
              <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Anda" required autofocus="1" />
                <input type="password" name="password" class="form-control mt-2" placeholder="Password Anda" required />
              </div>

              <button type="submit" class="btn btn-primary col">Login</button>
              <a href="../" class="btn btn-success col mt-1">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>