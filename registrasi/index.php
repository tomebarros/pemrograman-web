<!DOCTYPE html>
<html lang="en">

<head>


  <?php include "../cdn.php"; ?>



  <!-- mycss -->
  <link rel="stylesheet" href="style.css" />
  <title>Registrasi Akun Pelanggan</title>
</head>

<body>

  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'berhasil') {
      echo "
            <script>
            Swal.fire({
              icon:   'success',
              title: 'Berhasil',
              text:'Akun Anda Sudah Berhasil Daftar Di AtoLaundry',
              confirmButtonText: 'Save',
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              document.location.href='../pelanggan'
            })
            </script>
            ";
    } else if ($_GET['pesan'] == 'gagal') {
      echo "
            <script>
            Swal.fire({
              icon:   'error',
              title: 'Gagal',
              text:'Email Atau Telepon Yang Anda Masukan Sudah Terdaftar Di AtoLaundry',
              confirmButtonText: 'Coba Lagi',
            })
            </script>
            ";
    }
  }
  ?>




  <div class="container-fluid">
    <h3>Registrasi Akun Baru</h3>

    <div class="row kotak">

      <div class="col-md-6 header">
        <!-- <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_jcikwtux.json" background="transparant" speed="1" style="width: 100%; height:500px;" loop autoplay></lottie-player> -->
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_x3icjzbq.json" background="transparent" speed="1" style="width: 100%; height:500px;" loop autoplay></lottie-player>
      </div>


      <div class="col-md-6">

        <div class="row mx-2">
          <div class="col-12 p-1 mb-3 mx-auto rounded-lg">
            <form method="POST" action="registrasi.php">

              <div class="mb-2">
                <label for="nama" class="form-label">Nama </label>
                <input type="text" class="form-control input" id="nama" required name="nama" autofocus="1">
              </div>

              <div class="mb-2">
                <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control input" id="tanggallahir" name="tanggallahir" required>
              </div>

              <div class="">
              </div>
              <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>

              <div class="form-check">
                <input type="radio" class="form-radio-input" id="perempuan" name="jeniskelamin" required value="Perempuan">
                <label class="form-radio-label" for="perempuan">Perempuan</label>

                <input type="radio" class="form-radio-input" id="lakilaki" name="jeniskelamin" required value="Laki-Laki">
                <label class="form-radio-label" for="lakilaki">Laki-Laki</label>
              </div>


              <div class=" mb-2">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control input" id="telepon" name="telepon" required>
              </div>

              <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control input" id="alamat" name="alamat" required>
              </div>


              <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control input" id="email" name="email" required>
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control input" id="exampleInputPassword1" name="password" required>
              </div>

              <button type="submit" class="btn btn-primary tombol">Daftar</button>
              <a href="../" class="btn btn-secondary tombol">Kembali</a>
            </form>
          </div>
        </div>
      </div>




    </div>
  </div>
</body>

</html>