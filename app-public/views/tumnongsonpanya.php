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
$tumnongsonpanya = $_GET['tumnongsonpanya'] ?? ''; // ดึงค่าของพารามิเตอร์ tumnongsonpanya จาก URL
$tumnongsonpanya_title = '';
// กำหนดข้อความของแต่ละบทเรียน
if (empty($tumnongsonpanya) || $tumnongsonpanya == 1) {
  $tumnongsonpanya = 1;
  $image_file = "../assets/img/literature/pros/tumnongsonpanya1.jpg";
  $tumnongsonpanya_title = "บทสรรเสริญพระบารมีง";
} elseif ($tumnongsonpanya == 2) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya2.jpg";
    $tumnongsonpanya_title = "บทสวดชยสิทธคาถา";
} elseif ($tumnongsonpanya == 3) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya3.jpg";
    $tumnongsonpanya_title = "บทสวดทำนองสรภัญญะชยสิทธคาถา";
} elseif ($tumnongsonpanya == 4) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya4.jpg";
    $tumnongsonpanya_title = "บทสวดเคารพครูอาจารย์";
} elseif ($tumnongsonpanya == 5) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya5.jpg";
    $tumnongsonpanya_title = "บทสวดทำนองสรภัญญะเคารพครูอาจารย์";
} elseif ($tumnongsonpanya == 6) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya6.jpg";
    $tumnongsonpanya_title = "บทสวดเคารพคุณมารดาบิดา";
} elseif ($tumnongsonpanya == 7) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya7.jpg";
    $tumnongsonpanya_title = "บทสวดทำนองสรภัญญะเคารพคุณมารดาบิดา";
} elseif ($tumnongsonpanya == 8) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya8.jpg";
    $tumnongsonpanya_title = "บทสวดพระธรรมคุณ ";
} elseif ($tumnongsonpanya == 9) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya9.jpg";
    $tumnongsonpanya_title = "บทสวดทำนองสรภัญญะพระธรรมคุณ";
} elseif ($tumnongsonpanya == 10) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya10.jpg";
    $tumnongsonpanya_title = "บทสวดพระพุทธคุณ";
} elseif ($tumnongsonpanya == 11) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya11.jpg";
    $tumnongsonpanya_title = "บทสวดทำนองสรภัญญะพระพุทธคุณ";
} elseif ($tumnongsonpanya == 12) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya12.jpg";
    $tumnongsonpanya_title = "บทสวดพระสังฆคุณ";
} elseif ($tumnongsonpanya == 13) {
    $image_file = "../assets/img/literature/pros/tumnongsonpanya13.jpg";
    $tumnongsonpanya_title = "บทสวดทำนองสรภัญญะพระสังฆคุณ";
}


?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-9 order-md-4">
            <!-- Right column for large image -->
            <?php if (!empty($tumnongsonpanya)) : ?>
                <div class="d-flex flex-column text-left mb-3" style="margin-left: 30px;">

                    <div class="mb-5">
                        <img id="tumnongsonpanyaImage" width="100%" height="auto" src="<?= $image_file ?>" alt="tumnongsonpanya Image" style="margin-top: 80px;">
                        <?php
                        $audio_file = '';
                        if ($tumnongsonpanya == 1) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya1.wav";
                        } elseif ($tumnongsonpanya == 2) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya2.wav";
                        } elseif ($tumnongsonpanya == 3) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya3.wav";
                        } elseif ($tumnongsonpanya == 4) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya4.wav";
                        } elseif ($tumnongsonpanya == 5) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya5.wav";
                        } elseif ($tumnongsonpanya == 6) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya6.wav";
                        } elseif ($tumnongsonpanya == 7) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya7.wav";
                        } elseif ($tumnongsonpanya == 8) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya8.wav";
                        } elseif ($tumnongsonpanya == 9) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya9.wav";
                        } elseif ($tumnongsonpanya == 10) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya10.wav";
                        } elseif ($tumnongsonpanya == 11) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya11.wav";
                        } elseif ($tumnongsonpanya == 12) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya12.wav";
                        } elseif ($tumnongsonpanya == 13) {
                            $audio_file = "../assets/audio/second3lines/tumnongsonpanya13.wav";
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
            <h4 style="font-size: 40px; font-weight: bold;">ทำนองสรภัญญะ</h4>

    </div>
            <br>
                <ul class="list-group">
                    <?php for ($i = 1; $i <= 13; $i++) : ?>
                        <li class="list-group-item <?php echo ($tumnongsonpanya == $i) ? 'active' : ''; ?>" style="background-color: <?php echo ($tumnongsonpanya == $i) ? '#A4DBD0' : '#f8f9fa'; ?>;">
                            <a href="?tumnongsonpanya=<?php echo $i; ?>" class="text-decoration-none">
                                <?php 
                                $tumnongsonpanya_text = '';
                                if ($i == 1) {
                                    $tumnongsonpanya_text = "๑. บทสรรเสริญพระบารมี";
                                } elseif ($i == 2) {
                                    $tumnongsonpanya_text = "๒. บทสวดชยสิทธคาถา";
                                } elseif ($i == 3) {
                                    $tumnongsonpanya_text = "๓. บทสวดทำนองสรภัญญะชยสิทธคาถา";
                                } elseif ($i == 4) {
                                    $tumnongsonpanya_text = "๔. บทสวดเคารพครูอาจารย์";
                                } elseif ($i == 5) {
                                    $tumnongsonpanya_text = "๕. บทสวดทำนองสรภัญญะเคารพครูอาจารย์";
                                } elseif ($i == 6) {
                                    $tumnongsonpanya_text = "๖. บทสวดเคารพคุณมารดาบิดา";
                                } elseif ($i == 7) {
                                    $tumnongsonpanya_text = "๗. บทสวดทำนองสรภัญญะเคารพคุณมารดาบิดา";
                                } elseif ($i == 8) {
                                    $tumnongsonpanya_text = "๘. บทสวดพระธรรมคุณ ";
                                } elseif ($i == 9) {
                                    $tumnongsonpanya_text = "๙. บทสวดทำนองสรภัญญะพระธรรมคุณ";
                                } elseif ($i == 10) {
                                    $tumnongsonpanya_text = "๑๐. บทสวดพระพุทธคุณ";
                                } elseif ($i == 11) {
                                    $tumnongsonpanya_text = "๑๑. บทสวดทำนองสรภัญญะพระพุทธคุณ";
                                } elseif ($i == 12) {
                                    $tumnongsonpanya_text = "๑๒. บทสวดพระสังฆคุณ";
                                } elseif ($i == 13) {
                                    $tumnongsonpanya_text = "๑๓. บทสวดทำนองสรภัญญะพระสังฆคุณ";
                                }
                                ?>
                          <span style="font-size: 18px; color: #333; font-weight: bold; font-family: Thasadith;">
                          <?php echo $tumnongsonpanya_text; ?></span>
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