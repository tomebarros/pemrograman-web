<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #dedede !important;
    }
    
  .navbar-brand{
    font-family: Viga;
    color : black;
    font-size: 32px !important;
  }

    .kotak{
      margin-top: 5vh;

    }
  </style>
  <?php include "../cdn.php"; ?>
  <title>Lupa Password</title>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-light navbar-light">
    <div class="container">

      <a href="#" class="navbar-brand">AtoLaundry</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <form class="d-flex" method="POST" action="ceklogin.php">
            <input class="form-control" placeholder="Email" type="email" name="email" required>
            <input class="form-control mx-1" placeholder="Password" type="password" name="password" required>
            <button class="btn btn-primary login" type="submit">Login</button>
          </form>
        </ul>
      </div>
    </div>
  </nav>


  <div class="row mx-2 kotak">
    <div class="col-md-6 col-xl-4 p-4 mb-3 bg-light mx-auto rounded-lg">
      <h3>Temukan Akun Anda</h3>
      <hr>
      <p>Silakan Masukan Email Anda Yang Terdaftar Untuk Konfirmasi</p>

      <form method="POST" action="emaillupapassword.php">
        <div class="mb-3">
          <input type="email" name="email" class="form-control" id="email" placeholder="Email Anda" required autofocus="1">
          <hr>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
        <a class="btn btn-secondary" href="index.php">Batal</a>
      </form>

    </div>
  </div>


</body>

</html>