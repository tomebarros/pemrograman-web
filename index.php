<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="icon" href="img/logo.png">

  <title>Tome Laundry</title>

  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" /> -->

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- icon fontAwesome -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <!-- Aos Animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- lottie animation -->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <!-- my css -->
  <link rel="stylesheet" href="style.css" />
</head>

<body id="home">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">AtoLaundry</a>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link active" id="home" href="#home">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="#about">About Us</a>
          <a class="nav-link" href="#location">Location</a>


          <div class="ml-auto mb-2 akun">
            <a class="btn btn-outline-light" href="registrasi/">Sign Up</a>
          </div>

          <ul class="justify-content-end d-flex akun">
            <li>
              <a class="btn btn-light dropdown-toggle">Sign In</a>
              <ul>
                <li><a href="pelanggan/" class="text-light" title="Login Pelanggan">pelanggan</a></li>
                <li><a href="petugas/" class="text-light" title="Login Petugas">petugas</a></li>
              </ul>
            </li>
          </ul>



        </div>
      </div>
    </div>
  </nav>

  <!-- akhir navbar -->

  <!-- jumbutron -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4">
        Cuci <span>Bersih</span> Dan <span>Rapi</span><br />
        Di <span>AtoLaundry</span>
      </h1>
    </div>
  </div>

  <!-- akhir jumbutron -->
  <!-- container -->
  <div class="container">

    <!-- info panel -->
    <div class="row justify-content-center" data-aos="zoom-in-down" data-aos-offset="20" data-aos-duration="1200" data-aos-easing="ease-out">
      <div class="col-lg-11 info-panel">
        <div class="row">
          <div class="col-lg">
            <img src="img/24jam.png" alt="" class="float-left" />
            <h4>24 Jam</h4>
            <p>Admin aktif 24 jam untuk melayani Anda</p>
          </div>
          <div class="col-lg">
            <img src="img/registrasi.png" alt="" class="float-left" />
            <h4><a href="registrasi/">registrasi sekarang</a></h4>
            <p>Registrasi akun untuk mengakses AtoLaundry</p>
          </div>
          <div class="col-lg">
            <img src="img/security.png" alt="" class="float-left" />
            <h4>Keamanan</h4>
            <p>Prosses transfer data di enkripsi secara maksimal</p>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir info panel -->

    <audio autoplay>
      <source src="audio/jinglebel.mp3" type="audio/mpeg">
    </audio>
    <!-- about us -->

    <!-- awal about -->
    <div class="row justify-content-center about" id="about">
      <div class="col">
        <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">About Us</h2>
      </div>
    </div>

    <div class="row mb-3 mt-4 justify-content-center">
      <div class="col-lg-6" data-aos="zoom-in-right" data-aos-duration="1000">
        <lottie-player src="https://lottie.host/cb66832c-3c1c-45e4-97ce-d3b5dc77ba79/Q7GMQdjjas.json" background="transparent" speed="1" style="width: 100%;" loop autoplay>
          </lottie-playe>
      </div>
      <div class="col-lg-6 mt-5" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
        <h3>Website <span>Tugas</span> kampus <br><span>Web Program 1</span></h3>
        <p>Website ini dibuat oleh tome ornai barros mahasiswa stikom uyelindo kupang </p>
        <a href="mailto:admin@21120055laundry.my.id?subject=Dari%20AtoLaundry&body=Dear%20Admin%0A" class="btn btn-primary kontak tombol" title="Contak Admin Via Email">Contact me</a>
      </div>
    </div>
    <!-- akhir about us -->


    <!-- location -->

    <div class="row justify-content-center location" id="location">
      <div class="col">
        <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Location</h2>
      </div>
    </div>

    <div class="row mb-3 mt-4 justify-content-center">
      <div class="col-lg-6" data-aos="zoom-in-right" data-aos-duration="1000">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254.29578027190226!2d125.51799766559786!3d-8.55385399473089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe2bfcfa2bcd0fd0c!2sFamily%20of%20G2!5e1!3m2!1sid!2sid!4v1670423941666!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-lg-6 mt-5" data-aos="zoom-in" data-aos-duration="1000">
        <h3>Lokasi <span>AtoLaundry</span></h3>
        <p>Lokasi AtoLaundry Yang Terletak Di Timor-Leste</p>
      </div>
    </div>

    <!-- akhir location -->


    <!-- developer -->
    <div class="dev">
      <div class="row justify-content-center">
        <div class="col-6  justify-content-center d-flex">
          <figure class="figure">
            <img src="img/tome.jpg" class="figure-img img-fluid rounded-circle img-thumbnail" alt="TomeOrnaiBarros" data-aos="flip-left" data-aos-duration="2000">
            <figcaption class="text-center">Tome Ornai Barros</figcaption>
            <p class="text-muted text-center">Mahasiswa Biasa</p>

            <div class="row">
              <div class="col justify-content-center d-flex">
                <a href="https://www.instagram.com/tome_barros/" target="_blank" class="mx-2"><i class="fa-brands fa-instagram bg-dark p-2 rounded text-light text-center"></i></a>
                <a href="https://www.youtube.com/@tomebarros2153" target="_blank" class="mx-2"><i class="fa-brands fa-youtube bg-dark p-2 rounded text-light text-center"></i></a>
                <a href="https://web.facebook.com/ato.barros.37" target="_blank" class="mx-2"><i class="fa-brands fa-facebook bg-dark p-2 rounded text-light"></i></a>
              </div>
            </div>
          </figure>
        </div>
      </div>
    </div>

    <!-- developer akir -->

    <!-- akhir container -->

    <!-- footer -->

    <div class="row justify-content-center footer">
      <div class="col justify-content-center d-flex">
        © 2022 Copyright: <a href="#home" class="text-dark"> AtoLaundry</a>
      </div>
    </div>

    <!-- akhir footer -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Aos Animation-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
      $(document).ready(function() {
        $(window).on("scroll", function() {
          var wn = $(window).scrollTop();
          if (wn > 10) {
            $(".navbar").css("background", "rgba(0,0,0,0.6)");
            $(".navbar-brand").css("font-size", "32px");
            // $("navbar").css("transition", "all 3s");
          } else {
            $(".navbar").css("background", "none");
          }

          if (wn == 0) {
            $(".navbar-brand").css("font-size", "50px");
          }
        });


      });

      $(document).ready(function() {
        $(".navbar-toggler").on("click", function() {
          $(".navbar").css("background", "rgba(0,0,0,0.6)");
        });
      });
    </script>
    <!-- snow -->
    <script src="script.js"></script>
</body>

</html>