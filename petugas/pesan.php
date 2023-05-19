<?php
include "restrick.php";
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>BEM | Pesan</title>
  <?php include "../cdn.php"; ?>
  <?php include "../tema.php"; ?>
</head>

<body class="color-change-2x">
  <div class="wrapper">

    <?php include "navbar.php"; ?>
    <div class="container shadow p-4 mb-4 bg-white">
      <h1 class="tracking-in-contract judul">Pengolahan Data Pesan</h1>

      <div class="row">
        <div class="col-sm-4">
          <input type="text" class="form-control" id="myInput" placeholder="Cari...">
        </div>
      </div>
      <div class="table-responsive mt-3">

        <table class="table table-striped table-hover table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Nama</th>
              <th>Email</th>
              <!-- <th>Aksi</th> -->
            </tr>
          </thead>

          <tbody id="myTable">
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM pesan");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><a href="#" data-toggle="modal" data-target="#myModalpesan<?php echo $d['idpesan']; ?>"><?= $d['judul']; ?></a></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <!-- <td><?php echo $d['judul']; ?></td> -->
              </tr>

              <!-- modal update -->

              <div class="modal fade" id="myModalpesan<?php echo $d['idpesan']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Dari : <?= $d['nama']; ?></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                      <h5><?= $d['judul']; ?></h5>
                      <p><?= $d['pesan']; ?></p>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <form action="insertjeniscucian.php" method="POST">

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Nama Jenis Cucian</span>
                </div>
                <input type="text" class="form-control" name="nama" required>
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Harga</span>
                </div>
                <input type="number" class="form-control" name="harga" required>
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
          $(this).toggle($(this).text().toLocaleLowerCase().indexOf(value) > -1)
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