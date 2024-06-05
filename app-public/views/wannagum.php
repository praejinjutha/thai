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
  body {
    background-color: #efe9e3; /* สีเทาอ่อน */
  }


  .list-group-item.active {
        border-color: #A4DBD0; /* กำหนดสีเส้นขอบเมื่อรายการถูกเลือก */
    }
    .list-group-item.active a {
        color: #ffffff !important; /* กำหนดสีข้อความเมื่อรายการถูกเลือก */
    }
</style>
  </header>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto;">
</main>


<br>

<?php
$wannagum = $_GET['wannagum'] ?? 1; // ดึงค่าของพารามิเตอร์ wannagum จาก URL หรือกำหนดค่าเริ่มต้นเป็น 1
$wannagum = max(1, min(3, (int)$wannagum)); // จำกัดค่าให้อยู่ในช่วง 1-3
$image_files = [
    1 => "../assets/img/literature/kapyani/wannagum1.jpg",
    2 => "../assets/img/literature/kapyani/wannagum2.jpg",
    3 => "../assets/img/literature/kapyani/wannagum3.jpg"
];
$audio_file = "../assets/audio/second3lines/wannagum.wav";

$image_file = $image_files[$wannagum];
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-9 order-md-4">
            <!-- Right column for large image -->
            <?php if (!empty($wannagum)) : ?>
                <div class="d-flex flex-column text-left mb-3" style="margin-left: 30px;">
                    <div class="mb-5">
                        <img id="wannagumImage" width="100%" height="auto" src="<?= $image_file ?>" alt="wannagum Image" style="margin-top: 80px;">
                    </div>
                    <!-- เพิ่มปุ่มรูปก่อนหน้า -->
                    <div class="d-flex justify-content-between"> <!-- ใช้ Flexbox เพื่อจัดหน้า -->
                        <?php if ($wannagum > 1) : ?>
                            <div style="text-align: left;">
                                <a href="?wannagum=<?= $wannagum - 1 ?>" style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">รูปก่อนหน้า</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- เพิ่มปุ่มรูปถัดไป -->
                    <div class="d-flex justify-content-end" style="margin-top: 10px;"> <!-- ใช้ Flexbox เพื่อจัดหน้า -->
                        <?php if ($wannagum < 3) : ?>
                            <div style="text-align: right;">
                                <a href="?wannagum=<?= $wannagum + 1 ?>" style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">รูปถัดไป</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-3 order-md-1">
            <!-- Left column for image list -->
            <div class="d-flex flex-column text-left mb-3" style="margin-bottom: 10px;">
                <div style="margin: 0 auto;">
                    <h4 style="font-size: 36px; font-weight: bold;">วรรณกรรมพื้นบ้าน</h4>
                </div>
                <br>
                <ul class="list-group">
                <li class="list-group-item <?php echo ($wannagum == 1 || $wannagum == 2 || $wannagum == 3) ? 'active' : ''; ?>" style="background-color: <?php echo ($wannagum == 1 || $wannagum == 2 || $wannagum == 3) ? '#A4DBD0' : '#f8f9fa'; ?>;">
    <a href="?wannagum=1" class="text-decoration-none">
        <span style="font-size: 18px; color: #333; font-weight: bold; font-family: Thasadith;">
            ๑. วรรณกรรมพื้นบ้าน
        </span>
    </a>
</li>

                </ul>
            </div>

            <!-- เพิ่มเครื่องเล่น audio ตรงนี้ -->
            <?php if (!empty($audio_file)) : ?>
                <audio controls>
                    <source src="<?= $audio_file ?>" type="audio/wav">
                    Your browser does not support the audio element.
                </audio>
            <?php endif; ?>

            <br> <br>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="margin-right: 20px;">
                    <a href="<?= site_url('literature'); ?>" style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
</div>


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