<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <?php      
      $page = basename($_SERVER['PHP_SELF']);
      $title = "SPK-KU" ;
      if($page == 'index.php'){ $title = "SPK-KU | Dashboard";}
      if($page == 'ispu.php'){ $title = "SPK-KU | ISPU";}
      if($page == 'tentang.php'){ $title = "SPK-KU | Tentang";}
      ?>
    <title><?php echo $title ?></title>
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
    <!-- <link rel="stylesheet" href="assets/css/tiny-slider.css" /> -->
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
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

    <?php $page = basename($_SERVER['PHP_SELF']);?>
    
    <!-- Header -->
    <header class="header navbar-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="nav-inner">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                  <img src="assets/img/navbar.png" alt="Logo" />
                </a>
                <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                </button>                
                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                  <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="<?php if($page == 'index.php'){ echo ' active"';}?>" href="index.php" aria-label="Toggle navigation">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="<?php if($page == 'ispu.php'){ echo ' active"';}?>" href="ispu.php" aria-label="Toggle navigation">ISPU</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="<?php if($page == 'tentang.php'){ echo ' active"';}?>" href="tentang.php" aria-label="Toggle navigation">Tentang</a>
                    </li>
                    <li class="nav-item nav-login-1">
                      <a class="<?php if($page == 'login.php'){ echo ' active"';}?>" href="login.php" aria-label="Toggle navigation">Login</a>
                    </li>
                    <li class="nav-item nav-login-1">
                      <a class="<?php if($page == 'daftarakun.php'){ echo ' active"';}?>" href="daftarakun.php" aria-label="Toggle navigation">Daftar Akun</a>
                    </li>
                  </ul>
                </div>
                <!-- navbar collapse -->
                <div class="login-button">
                  <ul>
                    <li>
                      <a href="login.php"><i class="lni lni-enter"></i> Login</a>
                    </li>
                    <li>
                      <a href="daftarakun.php"><i class="lni lni-user"></i> Daftar Akun</a>
                    </li>
                  </ul>
                </div>
              </nav>
              <!-- navbar -->
            </div>
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </header>
    <!-- Akhir Header -->