<?php
include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['submit'])){
  $nama_depan        = $_POST['nama_depan'];
  $nama_lengkap      = $_POST['nama_lengkap'];
  $username          = $_POST['username'];
  $password          = $_POST['password'];
  $password1         = $_POST['password1'];
	$currdate          = date('Y-m-d h:i:sa');

  if($password != $password1){
		echo "<script> 
          alert('Password Tidak Sama, Silahkan isi kembali password anda dengan benar!');</script>";
					}else{
          $tambah = mysqli_query($koneksi, "INSERT INTO user (username, password, nama_depan, nama_lengkap, level, creat_at) VALUES('".$username."', '".MD5($password)."', '".$nama_depan."', '".$nama_lengkap."', 'User', '".$currdate."')") or die(mysqli_error($koneksi));

					if($tambah){
						echo "<script> 
                 alert('Berhasil Daftar, Silahkan Login!'); 
                 document.location.href = 'login.php';</script>";
					}else{
						echo 'Gagal Daftar!';
					}
  }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SPK-KU | Daftar Akun</title>
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
      <div class="form-signin">
        <form class="pt-20 text-center wow fadeInUp" method="POST" data-wow-delay=".5s">
        <img class="mb-4" src="assets/img/loguKU.png" alt="" width="auto" height="150" />
        <h1 class="h3 mb-3 fw-normal">Daftar Akun</h1>
        <h6 class="text-start py-2">Untuk mendaftar isi komponen dibawah ini!</h6>

        <div class="form-floating">
          <input type="name" class="form-control" id="floatingInput1" placeholder="name" name="nama_depan" required />
          <label for="floatingInput">Nama Depan</label>
        </div>
        <div class="form-floating">
          <input type="name" class="form-control" id="floatingInput2" placeholder="name" name="nama_lengkap" required />
          <label for="floatingInput">Nama Lengkap</label>
        </div>
        <div class="form-floating">
          <input type="username" class="form-control" id="floatingInput3" placeholder="username" name="username" required />
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword1" placeholder="Password" name="password" required />
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword2" placeholder="Password1" name="password1" required />
          <label for="floatingPassword">Ulangi Password</label>
        </div>

        <!-- <h6 class="text-start py-2">Apa alasan anda mendaftar?</h6>
        <div class="form-floating pb-2">
          <textarea class="form-control" id="Textarea1" rows="3" required></textarea>
        </div> -->

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required />
          <label class="form-check-label text-start" for="flexCheckDefault"> Ceklis untuk setuju dengan semua kebijakan SPK-KU </label>
        </div>

        <button class="w-100 btn btn-lg btn-primary my-3" type="submit" name="submit">Daftar Akun</button>
        <p class="my-0">Sudah ada akun?</p>
        <a class="w-100 btn btn-lg btn-info my-3" href="login.php">Login</a>
        <a class="w-100 btn btn-lg btn-outline-primary" href="index.php">Halaman Utama</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2022 - STMKG</p>
        </form>
      </div>
    </section>

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
      <i class="lni lni-chevron-up"></i>
    </a>

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
