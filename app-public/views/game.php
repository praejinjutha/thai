<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<body class="page-portfolio">
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="<?= site_url('dashboard') ?>" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
            </a>
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
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto; pointer-events: none;">
    </main>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
                <ul class="portfolio-flters" data-aos-delay="100">
                    <li data-filter="*" class="filter" >เกมรอบรู้ภาษาไทย</li>
                    <li data-filter=".filter-lesson" class="filter">เกมปริศนาทายคำ</li>
                </ul>
            </div>
            <div class="text-end">
                <a href="<?= site_url('lesson'); ?>"
                    style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
                </a>
            </div>
            <div class="mt-5" id="Game_LearningThai">
                <a href="<?= site_url('GameLearningThai_controller'); ?>" target="_brank">
                    <img src="<?= $themes ?>assets/img/game1.png" style="width: 100%; height: auto; border-radius: 10px;">
                </a>
            </div>
            <div class="mt-5" id="Game_Puzzle">
                <a href="<?= site_url('GamePuzzle_controller'); ?>" target="_brank">
                    <img src="<?= $themes ?>assets/img/game2.png" style="width: 100%; height: auto; border-radius: 10px;">
                </a>
            </div>
        </div>
    </section>
</body>
<link href="<?= $themes ?>assets/css/main.css" rel="stylesheet">
  <script src="<?= $themes ?>assets/js/main.js"></script>
<script>
$(document).ready(function() {
    $('.portfolio-flters li').removeClass('filter-active'); // ลบคลาส filter-active จากทุก filter
    $('.portfolio-flters li:first-child').addClass('filter-active'); // เพิ่มคลาส filter-active ให้กับ filter แรก

    var selectedFilter = $('.portfolio-flters li:first-child').data('filter'); // รับค่า filter ของ filter แรกที่ถูกเลือก

    if (selectedFilter === '*') {
        $('#Game_LearningThai').show();
        $('#Game_Puzzle').hide();
    } else {
        $('#Game_LearningThai').hide();
        $('#Game_Puzzle').show();
    }

    $('.portfolio-flters li').click(function() {
        // เมื่อคลิกที่ filter ใดๆ
        $('.portfolio-flters li').removeClass('filter-active'); // ลบคลาส filter-active จากทุก filter
        $(this).addClass('filter-active'); // เพิ่มคลาส filter-active ให้กับ filter ที่ถูกคลิก

        var selectedFilter = $(this).data('filter'); // รับค่า filter ที่ถูกคลิก

        $('.portfolio-item').each(function() {
            if (selectedFilter === '*' || $(this).is(selectedFilter)) {
                $(this).show(); // แสดง portfolio-item ที่ตรงกับ filter ที่ถูกคลิก
            } else {
                $(this).hide(); // ซ่อน portfolio-item ที่ไม่ตรงกับ filter ที่ถูกคลิก
            }
        });
        if (selectedFilter === '*') {
            $('#Game_LearningThai').show();
            $('#Game_Puzzle').hide();
        } else {
            $('#Game_LearningThai').hide();
            $('#Game_Puzzle').show();
        }
    });
});
</script>