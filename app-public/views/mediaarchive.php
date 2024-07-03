<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <style>
    body {
        background-color: #fffaf0;
    }

    .story {
        background-color: #fff;
        padding: 10px 15px;
        font-size: 22px;
        border: 1px solid #e9e9e9;
        cursor: pointer;
        font-weight: bold;
    }

    .story:hover {
        background-color: #f3f3f3;
    }

    .story.active {
        background-color: #82af1e;
        color: #fff;
    }

    .menu-story {
        max-height: 400px;
        max-width: 300px;
        overflow: auto;
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
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= site_url('dashboard') ?>" class="fw-bold">หน้าหลัก</a></li>
                    <li><a href="<?= site_url('Lesson') ?>" class="active fw-bold">บทเรียน</a></li>
            </nav>
        </div>


    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto; pointer-events: none;">
    </main>

    <div class="container">
        <h6 style="font-weight: bold;"> คลังสื่อ <br> Media Archive </h6>
        <div class="text-end">
            <a href="<?= site_url('lesson'); ?>"
                style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
            </a>
        </div>
        <div class="row">
            <div class="col-3">
                <h4 class="fw-bold text-center mb-4">สื่อ</h4>
                <div class="menu-story">
                    <div class="story" onclick="loadVideo('การคัดลายมือ', this)">การคัดลายมือ</div>
                    <div class="story" onclick="loadVideo('การอ่านออกเสียง', this)">การอ่านออกเสียง</div>
                    <div class="story" onclick="loadVideo('การอ่านออกเสียงและบอกความหมายคำ', this)">การอ่านออกเสียงและบอกความหมายคำ</div>
                    <div class="story" onclick="loadVideo('เรื่องการอ่านเขียนพยัญชนะ', this)">เรื่องการอ่านเขียนพยัญชนะ</div>
                    <div class="story" onclick="loadVideo('เรื่องอักษรไทย', this)">เรื่องอักษรไทย</div>
                </div>
            </div>
            <div class="col-8">
                <video id="videoPlayer" width="113%" height="450px" style="margin-top: 10px; border: 1px solid #989898;"
                    controls></video>
            </div>
        </div>
    </div>
</body>

</html>

<script>
function loadVideo(storyName, element) {
    document.querySelectorAll('.story').forEach(story => {
        story.classList.remove('active');
    });

    element.classList.add('active');

    var videoPlayer = document.getElementById('videoPlayer');
    videoPlayer.src = `../assets/video/media/${storyName}.mp4`;
    videoPlayer.load();
    videoPlayer.play();
}
</script>