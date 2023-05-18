<?php
include "restrick.php";
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>BEM | Pelanggan</title>
  <?php include "../cdn.php"; ?>
  <?php include "../tema.php"; ?>
</head>

<body class="color-change-2x">
  <div class="wrapper">

    <?php include "navbar.php"; ?>

    <div class="container shadow p-4 mb-4 bg-white">

      <h1 class="tracking-in-contract judul">Pengolahan Data Pelanggan</h1>

      <div class="row">
        <div class="col-md-4 mb-2">
          <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalinsert">Tambah Data <i class="bi bi-person-plus-fill"></i></a>


          <a href="laporanpelanggan.php" target="_blank" class="btn btn-sm btn-danger">Cetak <i class="bi bi-filetype-pdf"></i></a>
          <a href="laporanpelanggan2.php" class="btn btn-sm btn-success">Export <i class="bi bi-filetype-xls"></i></a>

        </div>

        <div class="col-sm-8">
          <input type="text" class="form-control" id="myInput" placeholder="Cari..">
        </div>
      </div>


      <div class="table-responsive mt-3">

        <table class="table table-striped table-hover table-sm">

          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody id="myTable">
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['jeniskelamin']; ?></td>
                <td><?php echo $d['telepon']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['email']; ?></td>

                <td>
                  <?php
                  if (verifikasi($d['idpelanggan']) == 0) { ?>
                    <a href="acc.php?idpelanggan=<?php echo $d['idpelanggan']; ?>" onclick="return confirm('Verifikasi Data')" title="Belum Verifikasi"><i class="bi bi-exclamation-circle-fill text-danger"></i></a>
                  <?php } else { ?>
                    <i class="bi bi-check2-all text-success" title="Sudah Verifikasi"></i>
                  <?php } ?>
                </td>

                <td>
                  <a href="#" data-toggle="modal" data-target="#myModalupdate<?php echo $d['idpelanggan']; ?>">Ubah</a>
                  <?php
                  $idpelanggan = $d['idpelanggan'];
                  $data1 = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE idpelanggan LIKE '$idpelanggan'");
                  if (!mysqli_num_rows($data1) > 0) {
                  ?>
                    <a class="text-danger" href="deletepelanggan.php?idpelanggan=<?php echo $d['idpelanggan']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                  <?php } ?>
                </td>

              </tr>
              <!-- modal ubah -->
              <div class=" modal fade" id="myModalupdate<?php echo $d['idpelanggan'] ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Ubah Data</h4>
                      <button class="close" type="button" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                      <form action="updatepelanggan.php" method="POST">
                        <input type="hidden" name="idpelanggan" value="<?php echo $d['idpelanggan']; ?>">

                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nama</span>
                          </div>
                          <input type="text" class="form-control" name="nama" value="<?php echo $d['nama']; ?>" required>
                        </div>

                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Jenis Kelamin</span>
                          </div>
                          <select name="jeniskelamin" class="costom-select form-control" required>
                            <option value="Laki-Laki" <?php if ($d['jeniskelamin'] == 'Laki-Laki') echo 'selected' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($d['jeniskelamin'] == 'Perempuan') echo 'selected' ?>>Perempuan</option>
                          </select>
                        </div>

                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Alamat</span>
                          </div>
                          <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat']; ?>" required>
                        </div>

                        <input type="hidden" name="telepon" value="<?php echo $d['telepon']; ?>" required>
                        <input type="hidden" name="email" value="<?php echo $d['email']; ?>" required>

                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                          </div>
                          <input type="password" class="form-control" name="password" value="<?php echo $d['password']; ?>" required>
                        </div>

                        <?php if (verifikasi($d['idpelanggan']) == 1) { ?>
                          <div class="mb-2 ml-3 form-check">
                            <input type="checkbox" class="form-check-input" id="validasi" <?php if ($d['status'] == 1) { ?> checked <?php } ?> name="validasi">
                            <label class="form-check-label" for="validasi">Validasi</label>
                          </div>
                        <?php } ?>

                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success" value="Simpan"></form>
                      <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                    </div>

                  </div>
                </div>
              </div>
            <?php $no++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- modal insert -->
    <div class="modal fade" id="myModalinsert">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <form action="insertpelanggan.php" method="POST">

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Nama</span>
                </div>
                <input type="text" class="form-control" name="nama" required>
              </div>

              <!-- tannggal terima -->
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Tanggal Lahir</span>
                </div>
                <input type="date" class="form-control" name="tanggallahir" required>
              </div>


              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Jenis Kelamin</span>
                </div>
                <select name="jeniskelamin" class="costom-select form-control" required>
                  <option value=""></option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Telepon</span>
                </div>
                <input type="number" class="form-control" name="telepon" required>
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Alamat</span>
                </div>
                <input type="text" class="form-control" name="alamat" required>
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Email</span>
                </div>
                <input type="email" class="form-control" name="email" required>
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Password</span>
                </div>
                <input type="password" class="form-control" name="password" required>
              </div>

          </div>

          <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="Simpan"></form>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php include '../footer.php'; ?>

  </div>

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    //myClock
    setInterval(() => {
      let date = new Date()
      let clock = document.getElementById('clock')
      clock.innerHTML =
        date.getHours() + ":" +
        date.getMinutes() + ":" +
        date.getSeconds()
    }, 1000);
  </script>

</body>

</html>