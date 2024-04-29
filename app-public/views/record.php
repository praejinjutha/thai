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
<link href="https://fonts.googleapis.com/css2?family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  <style>
    body {
      background-color: #fffaf0; /* สีเทาอ่อน */
    }

    #downloadLink:hover {
      font-size: 20px;
      color: red; /* สีที่ต้องการเมื่อ hover */
      transition: font-size 0.3s ease; /* เพิ่ม transition เพื่อทำให้การเปลี่ยนขนาดตัวอักษรมีการเบาอย่างนุ่มนวล */
    }

  </style>
</head>

<body class="page-portfolio">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?= site_url('dashboard') ?>" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= site_url('dashboard') ?>">หน้าหลัก</a></li>
          <li><a href="<?= site_url('Lesson') ?>" class="active">บทเรียน</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
    <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto;">
  </main>

  <h6 style="font-weight: bold;"> บันทึกการออกเสียง <br> Reading Record </h6>

  <div style="display: flex; justify-content: flex-end; margin-right: 100px;">
    <a href="<?= site_url('lesson'); ?>" style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">ย้อนกลับ</a>
  </div>

  
  <div style="display: flex; position: relative;">
    <!-- Column 1 -->
    <div style="flex: 1;">
        <div style="position: absolute; top: 0; left: 200px;">
            <img src="../assets/img/bg-rec.png" alt="Image" width="100%" height="auto">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">

                <p style="font-size: 24px; position: relative; top: -100px;">กดปุ่มเพื่อบันทึกเสียง</p>

                <button id="buttonStart" style="position: relative; top: -70px;"><img src="../assets/img/rec.png" alt="เริ่มบันทึกเสียง" width="90" height="70"></button>
                <button id="buttonPause" style="position: relative; top: -70px;"><img src="../assets/img/pause.png" alt="พักบันทึกเสียง" width="90" height="70"></button>
                <button id="buttonStop" style="position: relative; top: -70px;"><img src="../assets/img/stop.png" alt="หยุดการบันทึกเสียง" width="90" height="70"></button>
            </div>
        </div>
        </div>

        <!-- ทับกันเมื่อเปิดจอใน ipad -->


    <!-- Column 2 -->
    <div style="flex: 1; margin-top: 80px; margin-right: 150px;">
        <div style="text-align: center; font-size: 20px;">
            เวลาที่บันทึกเสียง <span id="timer">00:00 </span> นาที
            <br>
            <audio controls id="audio" style="display: inline-block; margin-top: 15px;"></audio>
            <br>
            <a id="downloadLink" href="#" style="font-size: 16px; text-decoration: none; color: black;">
                <img src="../assets/img/download.png" alt="Download Icon" style="vertical-align: middle; margin-right: 5px; width: 35%; height: auto;">
            </a>
        </div>
    </div>
</div>







  <script src="../assets/js/encode-audio.js"></script>
  <script src="../assets/js/main2.js"></script>

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