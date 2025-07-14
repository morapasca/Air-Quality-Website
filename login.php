<?php
session_start();

include 'koneksi.php';

if(isset($_POST['submit'])){

  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);

  $cek  = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '".$username."'");
  if(mysqli_num_rows($cek) > 0){
    $d = mysqli_fetch_object($cek);
    if(md5($password) == $d->password){
      $_SESSION['status_login']   = true;
      $_SESSION['id_user'] 			  = $d->id_user;
      $_SESSION['nama_depan'] 		= $d->nama_depan;
      $_SESSION['level'] 		      = $d->level;
      echo "<script>window.location = 'admin/index.php'</script>";
    }else{
      echo "<script> 
      alert('Password Anda Salah!');</script>";
    }
  }else{
    echo "<script> 
      alert('Username Tidak DItemukan!');</script>";
  }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SPK-KU | Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/loguKU.png" />

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <!-- Akhir CSS -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <div class="preloader-inner">
        <div class="preloader-icon">
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- /End Preloader -->

    <section class="login section">
      <div class="form-signin" >
        <form class="pt-20 text-center wow fadeInUp" method="POST" data-wow-delay=".5s">
          <img class="my-4" src="assets/img/loguKU.png" alt="" width="auto" height="150" />
          <h1 class="h3 mb-3 fw-normal">Halo, silahkan login</h1>
 
          <div class="form-floating">
            <input type="username" class="form-control" id="floatingInput" placeholder="username" name="username" required />
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password" required />
            <label for="floatingPassword">Password</label>
          </div>
					<input type="submit" name="submit" class="w-100 btn btn-lg btn-primary my-3">

          <p class="my-0">Belum ada akun?</p>
          <a class="w-100 btn btn-lg btn-info my-3" href="daftarakun.php">Daftar Akun</a>
          <a class="w-100 btn btn-lg btn-outline-primary" href="index.php">Halaman Utama</a>
          <p class="mt-5 mb-3 text-muted">&copy; 2022 - STMKG</p>
        </form>
      </div>
    </section>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script type="text/javascript">
     (function () {
      "use strict";
      //===== Prealoder

      window.onload = function () {
          window.setTimeout(fadeout, 200);
      }

      function fadeout() {
          document.querySelector('.preloader').style.opacity = '0';
          document.querySelector('.preloader').style.display = 'none';
      }

      // WOW active
      new WOW().init();

    })();
    </script>
  </body>
</html>
