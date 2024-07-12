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
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@500&family=Thasadith:wght@700&display=swap"
        rel="stylesheet">

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
                    <span style="margin-right: 30px; font-weight: bold; font-size: 22px">
                        <i class="fa-regular fa-user"></i> <?= $this->session->userdata('Name'); ?>
                    </span>
                    <li><a href="<?= site_url('auth/logout') ?>" class="active">ออกจากระบบ</a></li>
                </ul>
            </nav>
        </div>

        <style>
        body {
            background-color: #efe9e3;
            /* สีเทาอ่อน */
        }


        .list-group-item.active {
            border-color: #A4DBD0;
            /* กำหนดสีเส้นขอบเมื่อรายการถูกเลือก */
        }

        .list-group-item.active a {
            color: #ffffff !important;
            /* กำหนดสีข้อความเมื่อรายการถูกเลือก */
        }
        </style>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto; pointer-events: none;">
    </main>


    <br>

    <?php
$pros = $_GET['pros'] ?? ''; // ดึงค่าของพารามิเตอร์ pros จาก URL
$pros_title = '';
// กำหนดข้อความของแต่ละบทเรียน
if (empty($pros) || $pros == 1) {
  $pros = 1;
  $image_file = "../assets/img/literature/pros/pros1.jpg";
  $pros_title = "เกือบไป";
} elseif ($pros == 2) {
    $image_file = "../assets/img/literature/pros/pros2.jpg";
    $pros_title = "ช้างน้อยน่ารัก";
} elseif ($pros == 3) {
    $image_file = "../assets/img/literature/pros/pros3.jpg";
    $pros_title = "ตามหา";
} elseif ($pros == 4) {
    $image_file = "../assets/img/literature/pros/pros4.jpg";
    $pros_title = "ใบโบก ใบบัว";
} elseif ($pros == 5) {
    $image_file = "../assets/img/literature/pros/pros5.jpg";
    $pros_title = "ไปดูช้าง";
} elseif ($pros == 6) {
    $image_file = "../assets/img/literature/pros/pros6.jpg";
    $pros_title = "ไปโรงเรียน";
} elseif ($pros == 7) {
    $image_file = "../assets/img/literature/pros/pros7.jpg";
    $pros_title = "พูด ดี ขายดี";
} elseif ($pros == 8) {
    $image_file = "../assets/img/literature/pros/pros8.jpg";
    $pros_title = "พูดเพราะ";
} elseif ($pros == 9) {
    $image_file = "../assets/img/literature/pros/pros9.jpg";
    $pros_title = "เพื่อนกัน";
} elseif ($pros == 10) {
    $image_file = "../assets/img/literature/pros/pros10.jpg";
    $pros_title = "เพื่อนรัก เพื่อนเล่น";
} elseif ($pros == 11) {
    $image_file = "../assets/img/literature/pros/pros11.jpg";
    $pros_title = "เพื่อนรู้ใจ";
} elseif ($pros == 12) {
    $image_file = "../assets/img/literature/pros/pros12.jpg";
    $pros_title = "วันสงกรานต์";
}


?>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-9 order-md-4">
                <!-- Right column for large image -->
                <?php if (!empty($pros)) : ?>
                <div class="d-flex flex-column text-left mb-3" style="margin-left: 30px;">

                    <div class="mb-5">
                        <img id="prosImage" width="100%" height="auto" src="<?= $image_file ?>" alt="Pros Image"
                            style="margin-top: 80px;">
                        <?php
                        $audio_file = '';
                        if ($pros == 1) {
                            $audio_file = "../assets/audio/first2lines/pros1.wav";
                        } elseif ($pros == 2) {
                            $audio_file = "../assets/audio/first2lines/pros2.wav";
                        } elseif ($pros == 3) {
                            $audio_file = "../assets/audio/first2lines/pros3.wav";
                        } elseif ($pros == 4) {
                            $audio_file = "../assets/audio/first2lines/pros4.wav";
                        } elseif ($pros == 5) {
                            $audio_file = "../assets/audio/first2lines/pros5.wav";
                        } elseif ($pros == 6) {
                            $audio_file = "../assets/audio/first2lines/pros6.wav";
                        } elseif ($pros == 7) {
                            $audio_file = "../assets/audio/first2lines/pros7.wav";
                        } elseif ($pros == 8) {
                            $audio_file = "../assets/audio/first2lines/pros8.wav";
                        } elseif ($pros == 9) {
                            $audio_file = "../assets/audio/first2lines/pros9.wav";
                        } elseif ($pros == 10) {
                            $audio_file = "../assets/audio/first2lines/pros10.wav";
                        } elseif ($pros == 11) {
                            $audio_file = "../assets/audio/first2lines/pros11.wav";
                        } elseif ($pros == 12) {
                            $audio_file = "../assets/audio/first2lines/pros12.wav";
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
                        <h4 style="font-size: 40px; font-weight: bold;">บทร้อยแก้ว</h4>

                    </div>
                    <br>
                    <ul class="list-group">
                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <li class="list-group-item <?php echo ($pros == $i) ? 'active' : ''; ?>"
                            style="background-color: <?php echo ($pros == $i) ? '#A4DBD0' : '#f8f9fa'; ?>;">
                            <a href="?pros=<?php echo $i; ?>" class="text-decoration-none">
                                <?php 
                                $pros_text = '';
                                if ($i == 1) {
                                    $pros_text = "๑. เกือบไป";
                                } elseif ($i == 2) {
                                    $pros_text = "๒. ช้างน้อยน่ารัก";
                                } elseif ($i == 3) {
                                    $pros_text = "๓. ตามหา";
                                } elseif ($i == 4) {
                                    $pros_text = "๔. ใบโบก ใบบัว";
                                } elseif ($i == 5) {
                                    $pros_text = "๕. ไปดูช้าง";
                                } elseif ($i == 6) {
                                    $pros_text = "๖. ไปโรงเรียน";
                                } elseif ($i == 7) {
                                    $pros_text = "๗. พูด ดี ขายดี";
                                } elseif ($i == 8) {
                                    $pros_text = "๘. พูดเพราะ";
                                } elseif ($i == 9) {
                                    $pros_text = "๙. เพื่อนกัน";
                                } elseif ($i == 10) {
                                    $pros_text = "๑๐. เพื่อนรัก เพื่อนเล่น";
                                } elseif ($i == 11) {
                                    $pros_text = "๑๑. เพื่อนรู้ใจ";
                                } else {
                                    $pros_text = "๑๒. วันสงกรานต์";
                                }
                                ?>
                                <span
                                    style="font-size: 18px; color: #333; font-weight: bold; font-family: Thasadith;"><?php echo $pros_text; ?></span>

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
                        <a href="<?= site_url('literature'); ?>"
                            style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>


        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>



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