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
$patee = $_GET['patee'] ?? ''; // ดึงค่าของพารามิเตอร์ patee จาก URL
$patee_title = '';
// กำหนดข้อความของแต่ละบทเรียน
if (empty($patee) || $patee == 1) {
  $patee = 1;
  $image_file = "../assets/img/literature/pros/patee1.jpg";
  $patee_title = "เข้าแถว";
} elseif ($patee == 2) {
    $image_file = "../assets/img/literature/pros/patee2.jpg";
    $patee_title = "ใครไล่ให้ทัน";
} elseif ($patee == 3) {
    $image_file = "../assets/img/literature/pros/patee3.jpg";
    $patee_title = "ฉันชื่ออะไร";
} elseif ($patee == 4) {
    $image_file = "../assets/img/literature/pros/patee4.jpg";
    $patee_title = "ช้างป่าน่ารัก";
} elseif ($patee == 5) {
    $image_file = "../assets/img/literature/pros/patee5.jpg";
    $patee_title = "โป๊ก เป๊ก";
} elseif ($patee == 6) {
    $image_file = "../assets/img/literature/pros/patee6.jpg";
    $patee_title = "เพื่อนภูผา";
} elseif ($patee == 7) {
    $image_file = "../assets/img/literature/pros/patee7.jpg";
    $patee_title = "เพื่อนลูกช้าง";
} elseif ($patee == 8) {
    $image_file = "../assets/img/literature/pros/patee8.jpg";
    $patee_title = "โยกมา โยกไป";
}


?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-9 order-md-4">
            <!-- Right column for large image -->
            <?php if (!empty($patee)) : ?>
                <div class="d-flex flex-column text-left mb-3" style="margin-left: 30px;">

                    <div class="mb-5">
                        <img id="pateeImage" width="100%" height="auto" src="<?= $image_file ?>" alt="patee Image" style="margin-top: 80px;">
                        <?php
                        $audio_file = '';
                        if ($patee == 1) {
                            $audio_file = "../assets/audio/first2lines/patee1.wav";
                        } elseif ($patee == 2) {
                            $audio_file = "../assets/audio/first2lines/patee2.wav";
                        } elseif ($patee == 3) {
                            $audio_file = "../assets/audio/first2lines/patee3.wav";
                        } elseif ($patee == 4) {
                            $audio_file = "../assets/audio/first2lines/patee4.wav";
                        } elseif ($patee == 5) {
                            $audio_file = "../assets/audio/first2lines/patee5.wav";
                        } elseif ($patee == 6) {
                            $audio_file = "../assets/audio/first2lines/patee6.wav";
                        } elseif ($patee == 7) {
                            $audio_file = "../assets/audio/first2lines/patee7.wav";
                        } elseif ($patee == 8) {
                            $audio_file = "../assets/audio/first2lines/patee8.wav";
                        } 
                        ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-3 order-md-1">
            <!-- Left column for image list -->
            <div class="d-flex flex-column text-left mb-3" style="margin-bottom: 10px;">
            <div style="margin: 0 auto;">
            <h4 style="font-size: 40px; font-weight: bold;">ภาษาพาที</h4>

    </div>
            <br>
                <ul class="list-group">
                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                        <li class="list-group-item <?php echo ($patee == $i) ? 'active' : ''; ?>" style="background-color: <?php echo ($patee == $i) ? '#A4DBD0' : '#f8f9fa'; ?>;">
                            <a href="?patee=<?php echo $i; ?>" class="text-decoration-none">
                                <?php 
                                $patee_text = '';
                                if ($i == 1) {
                                    $patee_text = "๑. เข้าแถว";
                                } elseif ($i == 2) {
                                    $patee_text = "๒ .ใครไล่ให้ทัน";
                                } elseif ($i == 3) {
                                    $patee_text = "๓. ฉันชื่ออะไร";
                                } elseif ($i == 4) {
                                    $patee_text = "๔. ช้างป่าน่ารัก";
                                } elseif ($i == 5) {
                                    $patee_text = "๕. โป๊ก เป๊ก";
                                } elseif ($i == 6) {
                                    $patee_text = "๖. เพื่อนภูผา";
                                } elseif ($i == 7) {
                                    $patee_text = "๗. เพื่อนลูกช้าง";
                                } elseif ($i == 8) {
                                    $patee_text = "๘. โยกมา โยกไป";
                                }
                                ?>
                          <span style="font-size: 18px; color: #333; font-weight: bold;">
                          <?php echo $patee_text; ?></span>
                            </a>
                        </li>
                    <?php endfor; ?>
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