<?php
include "restrick.php";
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../cdn.php"; ?>
  <title>Laundry | Detail Transaksi</title>

  <?php include "../tema.php"; ?>

</head>

<body class="color-change-2x">
  <div class="wrapper">


    <?php include "navbar.php"; ?>

    <div class="container shadow p-4 mb-4 bg-white">
      <h1 class="tracking-in-contract judul">Detail Transaksi</h1>


      <?php
      $idtransaksi = $_GET['id'];
      $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE idtransaksi='$idtransaksi'");
      $row = mysqli_fetch_array($query);
      ?>



      <div class="row">
        <div class="col-xl-4">
          <table class="table">
            <thead>
              <tr>
                <td>
                  Pelanggan <br>
                  Tanggal Terima <br>
                  Petugas Terima <br>
                  Tanggal Serah <br>
                  Petugas Serah
                </td>
                <td>
                  : <?php echo namapelanggan($row['idpelanggan']); ?> <br>
                  : <?php echo tanggal($row['tanggalterima']); ?> <br>
                  : <?php echo namapetugas1($row['idpetugaspenerima']); ?> <br>
                  : <?php echo ($row['tanggalserah'] !== '0000-00-00') ? tanggal($row['tanggalserah']) : '-'; ?> <br>
                  : <?php echo namapetugas1($row['idpetugasserah']); ?> <br>
                </td>
              </tr>
            </thead>
          </table>

          <form action="insertdetailtransaksi.php" method="POST">
            <input type="hidden" name="idtransaksi" value="<?php echo $_GET['id']; ?>">

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Jenis Cucian</span>
              </div>
              <select name="idjeniscucian" class="contom-select form-control" required>
                <option value=""></option>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM jeniscucian");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                  <option value="<?php echo $d['idjeniscucian']; ?>"><?php echo $d['nama']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Berat</span>
              </div>
              <input type="number" name="berat" class="form-control" required>
            </div>
            <?php if (ceksimpantransaksi($_GET['id']) == '0') { ?>
              <input type="submit" class="btn btn-success" value="Tambah">
            <?php } else { ?>
              <input type="submit" class="d-none" disabled value="Tambah">
            <?php } ?>
          </form>
        </div>

        <div class="col-md-8">
          <input type="text" class="form-control" id="myInput" placeholder="Cari...">
          <div class="table-responsive mt-3">

            <table class="table table-striped table-hover table-sm">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Cucian</th>
                  <th style="text-align:right;">Berat</th>
                  <th style="text-align:right;">Harga</th>
                  <th style="text-align:right;">Total</th>
                  <?php if (ceksimpantransaksi($_GET['id']) == '0') { ?>
                    <th>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>

              <tbody id="myTable">
                <?php
                $gt = 0;
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM detailtransaksi WHERE idtransaksi = $id");
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo namajeniscucian($d['idjeniscucian']); ?></td>
                    <td style="text-align:right;"><?php echo $d['berat']; ?></td>
                    <td style="text-align:right;"><?php echo rupiah($d['harga']); ?></td>

                    <td style="text-align:right;"><?php echo rupiah($d['berat'] * $d['harga']);
                                                  $gt += $d['berat'] * $d['harga'];
                                                  ?></td>

                    <?php if (ceksimpantransaksi($_GET['id']) == '0') { ?>
                      <td>
                        <a href="deletedetailtransaksi.php?iddetailtransaksi=<?php echo $d['iddetailtransaksi']; ?>&id=<?php echo $d['idtransaksi']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                      </td>
                    <?php } ?>

                  </tr>
                <?php $no++;
                } ?>
              </tbody>
            </table>

            <hr>
            Grand Total : <?php echo rupiah($gt); ?>
            <hr>


            <?php
            if ($gt > 0) {
              if (ceksimpantransaksi($_GET['id']) == '0') { ?>
                <form action="spt.php" method="POST">
                  <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idtransaksi">
                  <input type="submit" value="Simpan Permanen" class="btn btn-success">
                </form>
              <?php } else { ?>
                <a target="_blank" href="nota.php?idtransaksi=<?php echo $_GET['id']; ?>&nama=<?php echo $namapetugas; ?>" class="btn btn-warning">Cetak Nota</a>
            <?php }
            } ?>


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