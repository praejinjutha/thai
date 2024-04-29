<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ภาษาไทย</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Niramit:wght@500&family=Thasadith:wght@700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  

  <!-- =======================================================
  * Template Name: Nova
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-portfolio">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="<?= site_url('dashboard') ?>" class="logo d-flex align-items-center">
    <img src="../assets/img/logo.png" alt="">
</a>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="<?= site_url('dashboard') ?>">หน้าหลัก</a></li>
          <li><a href="<?= site_url('Lesson') ?>" class="active">บทเรียน</a></li>
      </nav>
    </div>
    <style>
      .portfolio-item {
        display: flex;
        align-items: center;
      }
      
      .caption1 {
        position: relative;
        bottom: 0;
        left: 0;
        width: 100%;
        color: black;
        text-align: center;
        padding: 5px;
        font-size: 30px;
      }
      </style>
    
  </header>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto;">

</main>

    <!-- ======= Portfolio Section ======= -->

<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="portfolio-isotope" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-portfolio-filter=".filter-consonant">
      <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">

        <li data-filter=".filter-consonant" class="filter-active">พยัญชนะไทย</li>
        <li data-filter=".filter-vowel">สระไทย</li>
        <li data-filter=".filter-tonemarks">วรรณยุกต์</li>
      </ul><!-- End Portfolio Filters -->

      <div style="display: flex; align-items: center;">
        <p class="custom-paragraph"> Click ตัวอักษรที่ต้องการฟังเสียง </p> <br><br>



        <button onclick="window.history.back()" style="margin-left: auto; padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">ย้อนกลับ</button> 
      </div> <br><br>

      <br>
               <!--พยัญชนะ-->
        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (1).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ก.ไก่ </div> 
                   <audio src="../assets/alphabet/sound/al (1).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (2).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ข.ไข่ </div> 
                   <audio src="../assets/alphabet/sound/al (2).mp3"></audio>
            </div>
            
            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (3).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฃ.ขวด </div> 
                   <audio src="../assets/alphabet/sound/al (3).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (4).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ค.ควาย </div> 
                   <audio src="../assets/alphabet/sound/al (4).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (5).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฅ.ฅน </div> 
                   <audio src="../assets/alphabet/sound/al (5).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (6).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฆ.ระฆัง </div> 
                   <audio src="../assets/alphabet/sound/al (6).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (7).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ง.งู </div> 
                   <audio src="../assets/alphabet/sound/al (7).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (8).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> จ.จาน </div> 
                   <audio src="../assets/alphabet/sound/al (8).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (9).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฉ.ฉิ่ง </div> 
                   <audio src="../assets/alphabet/sound/al (9).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (10).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ช.ช้าง </div> 
                   <audio src="../assets/alphabet/sound/al (10).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (11).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ซ.โซ่ </div> 
                   <audio src="../assets/alphabet/sound/al (11).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (12).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฌ.กะเฌอ  </div> 
                   <audio src="../assets/alphabet/sound/al (12).mp3"></audio>
            </div>

              <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (13).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ญ.หญิง </div> 
                   <audio src="../assets/alphabet/sound/al (13).mp3"></audio>
            </div>

              <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (14).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฎ.ชะฎา </div> 
                   <audio src="../assets/alphabet/sound/al (14).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (15).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฏ.ปะฏัก </div> 
                   <audio src="../assets/alphabet/sound/al (15).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (16).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฐ.ฐาน </div> 
                   <audio src="../assets/alphabet/sound/al (16).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (17).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฑ.มณโฑ </div> 
                   <audio src="../assets/alphabet/sound/al (17).mp3"></audio>
            </div>
                
                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (18).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฒ.ผู้เฒ่า </div> 
                   <audio src="../assets/alphabet/sound/al (18).mp3"></audio>
            </div>
                
                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (19).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ณ.เณร </div> 
                   <audio src="../assets/alphabet/sound/al (19).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (20).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ด.เด็ก </div> 
                   <audio src="../assets/alphabet/sound/al (20).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (21).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ต.เต่า </div> 
                   <audio src="../assets/alphabet/sound/al (21).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (22).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ถ.ถุง </div> 
                   <audio src="../assets/alphabet/sound/al (22).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (23).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ท.ทหาร </div> 
                   <audio src="../assets/alphabet/sound/al (23).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (24).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ธ.ธง </div> 
                   <audio src="../assets/alphabet/sound/al (24).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (25).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> น.หนู </div> 
                   <audio src="../assets/alphabet/sound/al (25).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (26).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> บ.ใบไม้ </div> 
                   <audio src="../assets/alphabet/sound/al (26).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (27).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ป.ปลา </div> 
                   <audio src="../assets/alphabet/sound/al (27).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (28).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ผ.ผึ้ง </div> 
                   <audio src="../assets/alphabet/sound/al (28).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (29).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฝ.ฝา </div> 
                   <audio src="../assets/alphabet/sound/al (29).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (30).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> พ.พาน </div> 
                   <audio src="../assets/alphabet/sound/al (30).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (31).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฟ.ฟัน </div> 
                   <audio src="../assets/alphabet/sound/al (31).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (32).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ภ.สำเภา </div> 
                   <audio src="../assets/alphabet/sound/al (32).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (33).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ม.ม้า </div> 
                   <audio src="../assets/alphabet/sound/al (33).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (34).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ย.ยักษ์ </div> 
                   <audio src="../assets/alphabet/sound/al (34).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (35).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ร.เรือ </div> 
                   <audio src="../assets/alphabet/sound/al (35).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (36).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ล.ลิง </div> 
                   <audio src="../assets/alphabet/sound/al (36).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (37).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ว.แหวน </div> 
                   <audio src="../assets/alphabet/sound/al (37).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (38).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ศ.ศาลา </div> 
                   <audio src="../assets/alphabet/sound/al (38).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (39).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ษ.ฤาษี </div> 
                   <audio src="../assets/alphabet/sound/al (39).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (40).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ส.เสือ </div> 
                   <audio src="../assets/alphabet/sound/al (40).mp3"></audio>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (41).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ห.หีบ </div> 
                   <audio src="../assets/alphabet/sound/al (41).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (42).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฬ.จุฬา </div> 
                   <audio src="../assets/alphabet/sound/al (42).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (43).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> อ.อ่าง </div> 
                   <audio src="../assets/alphabet/sound/al (43).mp3"></audio>
            </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-consonant" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
              <img src="../assets/alphabet/img/al (44).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
                <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ฮ.นกฮูก </div> 
                   <audio src="../assets/alphabet/sound/al (44).mp3"></audio>
            </div>

        <!-- สระไทย -->
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">
        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (1).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/1.m4a"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (2).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอา </div> 
              <audio id="audio4" src="../assets/vowels/sound/2.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (3).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอิ </div> 
              <audio id="audio4" src="../assets/vowels/sound/3.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (4).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอี </div> 
              <audio id="audio4" src="../assets/vowels/sound/4.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (5).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอึ </div> 
              <audio id="audio4" src="../assets/vowels/sound/5.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (6).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอือ </div> 
              <audio id="audio4" src="../assets/vowels/sound/6.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (7).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอุ </div> 
              <audio id="audio4" src="../assets/vowels/sound/7.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (8).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอู </div> 
              <audio id="audio4" src="../assets/vowels/sound/8.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (9).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/9.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (10).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอ </div> 
              <audio id="audio4" src="../assets/vowels/sound/10.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (11).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระแอะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/11.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (12).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระแอ </div> 
              <audio id="audio4" src="../assets/vowels/sound/12.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (13).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระโอะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/13.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (14).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระโอ </div> 
              <audio id="audio4" src="../assets/vowels/sound/14.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (15).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอาะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/15.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (16).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระออ </div> 
              <audio id="audio4" src="../assets/vowels/sound/16.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (17).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเออะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/17.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (18).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเออ </div> 
              <audio id="audio4" src="../assets/vowels/sound/18.mp3"></audio>
        </div>

      <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (19).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอียะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/19.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (20).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอีย </div> 
              <audio id="audio4" src="../assets/vowels/sound/20.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (21).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอือะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/21.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (22).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอือ </div> 
              <audio id="audio4" src="../assets/vowels/sound/22.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (23).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอัวะ </div> 
              <audio id="audio4" src="../assets/vowels/sound/23.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (24).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอัว </div> 
              <audio id="audio4" src="../assets/vowels/sound/24.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (25).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ร รึ </div> 
              <audio id="audio4" src="../assets/vowels/sound/25.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (26).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ร รือ </div> 
              <audio id="audio4" src="../assets/vowels/sound/26.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (27).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ล ลึ </div> 
              <audio id="audio4" src="../assets/vowels/sound/27.m4a"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (28).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ล ลือ </div> 
              <audio id="audio4" src="../assets/vowels/sound/28.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (29).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระอำ </div> 
              <audio id="audio4" src="../assets/vowels/sound/29.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (30).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระใอ </div> 
              <audio id="audio4" src="../assets/vowels/sound/30.m4a"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (31).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระไอ </div> 
              <audio id="audio4" src="../assets/vowels/sound/31.mp3"></audio>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-vowel" style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
          <img src="../assets/vowels/img/Vo (32).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
            <div class="caption1"  style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สระเอา </div> 
              <audio id="audio4" src="../assets/vowels/sound/32.mp3"></audio>
        </div>

<!-- วรรณยุกต์ -->
<div class="row gy-4" data-aos="fade-up" data-aos-delay="300"> 
  <div class="col-lg-3 col-md-6 portfolio-item filter-tonemarks"style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
    <img src="../assets/tone/img/to (1).png" alt="" style="width: 150px; height: auto;">
    <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> สามัญ </div> 
  </div><!-- End Portfolio Item -->

  <div class="col-lg-3 col-md-6 portfolio-item filter-tonemarks"style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
    <img src="../assets/tone/img/to (2).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
    <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ไม้เอก </div> 
    <audio id="audio4" src="../assets/tone/sound/2.mp3"></audio>
  </div><!-- End Portfolio Item -->

  <div class="col-lg-3 col-md-6 portfolio-item filter-tonemarks"style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
    <img src="../assets/tone/img/to (3).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
    <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ไม้โท </div> 
    <audio id="audio4" src="../assets/tone/sound/3.mp3"></audio>
  </div><!-- End Portfolio Item -->

  <div class="col-lg-3 col-md-6 portfolio-item filter-tonemarks"style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
    <img src="../assets/tone/img/to (4).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
    <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ไม้ตรี </div> 
    <audio id="audio4" src="../assets/tone/sound/4.mp3"></audio>
  </div><!-- End Portfolio Item -->

  <div class="col-lg-3 col-md-6 portfolio-item filter-tonemarks"style="margin-bottom: 20px; display: flex; flex-direction: column; align-items: center;">
    <img src="../assets/tone/img/to (5).png" class="img-fluid bi-volume-up" alt="" style="width: 150px; height: auto;">
    <div class="caption1" style="text-align: center; margin-top: 30px; margin-bottom: 50px;"> ไม้จัตวา </div> 
    <audio id="audio4" src="../assets/tone/sound/5.mp3"></audio>
  </div><!-- End Portfolio Item -->

    </div> <!-- End Portfolio Container -->
    


    </section><!-- End Portfolio Section -->
  </main><!-- End #main -->



<script>
  document.addEventListener('DOMContentLoaded', function() {
    const speakerIcons = document.querySelectorAll('.bi-volume-up');
    const audios = document.querySelectorAll('audio');

    speakerIcons.forEach((icon, index) => {
      icon.addEventListener('click', () => {
        audios[index].play();
      });
    });
  });

  let portfolionIsotope = document.querySelector('.portfolio-isotope');

  if (portfolionIsotope) {
    let portfolioFilter = portfolionIsotope.getAttribute('data-portfolio-filter') ? portfolionIsotope.getAttribute('data-portfolio-filter') : '*';
    let portfolioLayout = portfolionIsotope.getAttribute('data-portfolio-layout') ? portfolionIsotope.getAttribute('data-portfolio-layout') : 'masonry';
    let portfolioSort = portfolionIsotope.getAttribute('data-portfolio-sort') ? portfolionIsotope.getAttribute('data-portfolio-sort') : 'original-order';

    window.addEventListener('load', () => {
      let portfolioIsotope = new Isotope(document.querySelector('.portfolio-container'), {
        itemSelector: '.portfolio-item',
        layoutMode: portfolioLayout,
        filter: portfolioFilter,
        sortBy: portfolioSort
      });

      let menuFilters = document.querySelectorAll('.portfolio-isotope .portfolio-flters li');
      menuFilters.forEach(function(el) {
        el.addEventListener('click', function() {
          document.querySelector('.portfolio-isotope .portfolio-flters .filter-active').classList.remove('filter-active');
          this.classList.add('filter-active');
          portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          if (typeof aos_init === 'function') {
            aos_init();
          }
        }, false);
      });

    });
  }


    </script>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>