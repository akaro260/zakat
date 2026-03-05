<?php
include "menu/koneksi.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - HeroBiz Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  body{
    background-color: rgb(2,4,19)  
  }
  .hero{
    background-image: linear-gradient(180deg, rgba(2,6,23,0.6), rgba(2, 5, 23, 0.84)), url(assets/img/hero-back.jpg);
    width:100%;
    height:100vh;
    display:flex;
    align-items:center;
    background-size:cover;
    background-position:center;
    color:#fff;
  }
  .container thead tr th{
    background-color: rgb(1, 4, 34);
    color: #08b0ce;
  }
.card {
  backdrop-filter: blur(6px);
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 255, 255, 0.08);
}
.hero h1 {
  font-size: 64px;   /* gedein judul */
  font-weight: 800;
}

.hero h1 span {
  font-size: 48px;   /* gedein tulisan bawahnya */
  color: #08b0ce;
}

.hero p {
  font-size: 22px;   /* gedein paragraf */
  margin-top: 20px;
}
.hero .butu {
  font-size: 20px;      /* gedein tulisan */
  padding: 14px 35px;   /* gedein tombol */
  border-radius: 50px;  /* biar lebih modern */
  font-weight: 600;
}
.card {
  background: rgba(0, 20, 40, 0.8);
  color: #08b0ce;
  border: none;
  border-radius: 20px;

    
}



.statistik-card .card-footer {
  background: transparent;
  border-top: 1px solid rgba(0,255,255,0.1);
}
.table {
  border-radius: 5px;
  overflow: hidden;
}

.table thead th {
  border: none;
}

.table td, .table th {
  border-color: rgba(255,255,255,0.1);
}
</style>
<body class="index-page">


    


      



<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      

     


 

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container d-flex gap-2 justify-content-center align-items-center text-center position-relative" data-aos="zoom-out" >
        <div>
          <h1 style="font-weight: bold;" class="text-white">Zakat <br>
          <span>Masjid Riyhadusshalihin</span></h1>
          <p class="text-white">Yuk, tunaikan zakat sekarang juga untuk membersihkan harta dan menyucikan jiwa kita.</p>
          
          <a href="#about" class="btn-get-started scrollto butu">Get Started</a>
          
        </div>
      </div>

    </section><!-- /Hero Section -->

    
  <!-- Featured Services Section -->
<div class="container my-5">
  
  <div class="card bg-dark text-light shadow-lg ">
    <div class="card-body p-4">
        
      <h2 class="text-center fw-bold text-info" style="margin-bottom : 60px ;">
        Zakat yang Terkumpul
      </h2>
      
      <div class="row d-flex justify-content-center align-items-center g-4 statistik-card h-100 ">
                    <div class="col-xl-4 col-md-6 ">
                        <div class="card  mb-4 solo">
                            <?php
                            $hitung = mysqli_query($koneksi, "SELECT SUM(jumlah_rupiah) AS total FROM tbl_zakat");
                            $data = mysqli_fetch_assoc($hitung);
                            $total = $data['total'];
                            ?>
                            <div class="card-body fs-4 ">Total Uang yang terkumpul &nbsp; <i
                                    class="fa-solid fa-sack-dollar"></i></div>
                            <div class="card-footer d-flex ">
                                <p class="fs-5  mt-2 text-white ">Rp <?= number_format($total, 0, ',', '.'); ?></p>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card  mb-4 solo">
                            <?php
                            $hitung = mysqli_query($koneksi, "SELECT SUM(jumlah_beras) AS beras FROM tbl_zakat");
                            $data = mysqli_fetch_assoc($hitung);
                            $beras = $data['beras'];
                            ?>
                            <div class="card-body fs-4 ">jumlah Beras yang terkumpul &nbsp; <i
                                    class="fa-solid fa-bowl-rice"></i></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="fs-5  mt-2 text-white"><?= $beras ?> Kg </i></p>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card  mb-4 solo">
                            <?php
                            $hitung = mysqli_query($koneksi, "SELECT SUM(keterengan) AS orang FROM tbl_zakat");
                            $data = mysqli_fetch_assoc($hitung);
                            $orang = $data['orang'];
                            ?>
                            <div class="card-body fs-4 ">Jumlah orang yang zakat &nbsp; <i class="fa-solid fa-user"></i></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="fs-5  mt-2 text-white"><?= number_format($orang, 0, ',', '.'); ?> Orang</p>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
      </div>          
      <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered align-middle text-center mb-4">

          <thead class="table-info text-dark">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Zakat</th>
              <th>Jumlah Rupiah</th>
              <th>Jumlah Beras</th>
              <th>Metode</th>
              <th>Tanggal</th>
              <th>Keterangan</th>

            </tr>
          </thead>

         <tbody>
            <?php
            $no = 1;
            $zukir = mysqli_query($koneksi, "SELECT * FROM tbl_zakat");
            foreach ($zukir as $row) :
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama_zakat'] ?></td>
              <td><?= $row['jenis_zakat'] ?></td>
              <td>Rp <?= number_format($row['jumlah_rupiah'], 0, ',', '.') ?></td>
              <td><?= $row['jumlah_beras'] ?> Kg</td>
              <td>
                <span class="badge bg-info text-dark">
                  <?= $row['metode'] ?>
                </span>
              </td>
              <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
              <td><?= $row['keterengan'] ?> Orang</td>

            </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>

    </div>
  </div>

</div>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</body>

</html>