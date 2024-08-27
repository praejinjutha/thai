<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ภาษาไทย</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

                    <span style="margin-right: 30px; font-weight: bold; font-size: 22px">
                        <i class="fa-regular fa-user"></i> <?= $this->session->userdata('Name'); ?>
                    </span>
                    <li><a href="<?= site_url('auth/logout') ?>" class="active">ออกจากระบบ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto; pointer-events: none;">

    </main>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
                <ul class="portfolio-flters" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">ทั้งหมด</li>
                    <li data-filter=".filter-lesson">บทเรียน</li>
                    <li data-filter=".filter-prac">ฝึกปฏิบัติ</li>
                    <li data-filter=".filter-ex">แบบฝึกหัด</li>
                    <li data-filter=".filter-tea">สำหรับครู</li>
                </ul><!-- End Portfolio Filters -->

                <!-- บทเรียน -->
                <h2 id="lesson-heading">บทเรียน
                    <hr>
                </h2>
                <div class="row gy-4 portfolio-container" data-aos-delay="300">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('alphabet') ?>">
                            <img src="../assets/img/portfolio/lesson-1.png" class="img-fluid" alt="">
                            <div class="caption"> อักษรไทย <br> Thai Alphabet</div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('dictionary') ?>">
                            <img src="../assets/img/portfolio/lesson-2.png" class="img-fluid" alt="">
                            <div class="caption"> พจนานุกรม <br>Dictionary</div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('misspelled') ?>">
                            <img src="../assets/img/portfolio/lesson-3.png" class="img-fluid" alt="">
                            <div class="caption"> คำที่มักเขียนผิด <br>Misspelled Words</div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('literature') ?>">
                            <img src="../assets/img/portfolio/lesson-4.png" class="img-fluid" alt="">
                            <div class="caption"> วรรณคดี/วรรณกรรม <br>Literature</div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('Learning_media_controller') ?>" target="_brank">
                            <img src="../assets/img/portfolio/lesson-5.png" class="img-fluid" alt="">
                            <div class="caption"> สะกดคำ <br>Spell Words </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('Readcorrectly_controller') ?>" target="_brank">
                            <img src="../assets/img/portfolio/lesson-6.png" class="img-fluid" alt="">
                            <div class="caption"> อ่านออก อ่านถูก <br>Reading Accuracy </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('Tale_controller') ?>">
                            <img src="../assets/img/portfolio/lesson-7.png" class="img-fluid" alt="">
                            <div class="caption">นิทาน <br> Tale </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('karaoke') ?>">
                            <img src="../assets/img/portfolio/lesson-8.png" class="img-fluid" alt="">
                            <div class="caption"> เพลงคาราโอเกะ <br> Karaoke</div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-lesson">
                        <a href="<?= site_url('Media_archive_controller') ?>">
                            <img src="../assets/img/portfolio/lesson-9.png" class="img-fluid" alt="">
                            <div class="caption"> คลังสื่อ <br>Media Archive</div>
                        </a>
                    </div><!-- End Portfolio Item -->
                </div><!-- End Portfolio Container -->

                <!--ฝึกปฏิบัติ-->
                <h2 id="practice-heading" style="margin-top: 50px;">ฝึกปฏิบัติ
                    <hr>
                </h2>
                <div class="row gy-4 portfolio-container" data-aos-delay="300">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-prac">
                        <a href="<?= site_url('Readfluently_controller') ?>" target="_brank">
                            <img src="../assets/img/portfolio/prac1.png" class="img-fluid" alt="">
                            <div class="caption"> อ่านเร็ว อ่านคล่อง <br> Speed Reading Test </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-prac">
                        <a href="<?= site_url('critical') ?>">
                            <img src="../assets/img/portfolio/prac2.png" class="img-fluid" alt="">
                            <div class="caption"> อ่านการคิดวิเคราะห์ <br> Critical Thinking </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-prac">
                        <a href="<?= site_url('record') ?>">
                            <img src="../assets/img/portfolio/prac3.png" class="img-fluid" alt="">
                            <div class="caption"> บันทึกการออกเสียง <br> Reading Record </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-prac">
                        <a href="#">
                            <img src="../assets/img/portfolio/prac5.png" class="img-fluid" alt="">
                            <div class="caption"> ฝึกลีลามือ <br> Writing </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-prac">
                        <a href="<?= site_url('Game_controller') ?>">
                            <img src="../assets/img/portfolio/prac4.png" class="img-fluid" alt="">
                            <div class="caption"> เกม <br> Games </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                </div><!-- End Portfolio Container -->

                <!-- แบบฝึกหัด -->
                <h2 id="exercise-heading" style="margin-top: 50px;">แบบฝึกหัด
                    <hr>
                </h2>
                <div class="row gy-4 portfolio-container" data-aos-delay="300">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-ex">
                        <a href="<?= site_url('activity') ?>">
                            <img src="../assets/img/portfolio/ex2.png" class="img-fluid" alt="">
                            <div class="caption"> ใบกิจกรรม <br> Activity </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                    <div class="col-lg-3 col-md-6 portfolio-item filter-ex">
                        <a href="<?= site_url('PreTest_controller/Question') ?>">
                            <img src="../assets/img/portfolio/ex1.png" class="img-fluid" alt="">
                            <div class="caption"> คลังข้อสอบ <br> Exam Archive </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                    <div class="col-lg-3 col-md-6 portfolio-item filter-ex">
                        <a href="<?= site_url('PreTest_controller') ?>" target="_brank">
                            <img src="../assets/img/portfolio/ex1.png" class="img-fluid" alt="">
                            <div class="caption"> แบบทดสอบก่อนเรียน <br> Pre Test </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                    <div class="col-lg-3 col-md-6 portfolio-item filter-ex">
                        <a href="<?= site_url('PostTest_controller') ?>" target="_brank">
                            <img src="../assets/img/portfolio/ex1.png" class="img-fluid" alt="">
                            <div class="caption"> แบบทดสอบหลังเรียน <br> Post Test </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                </div><!-- End Portfolio Container -->

                <!-- สำหรับครู -->
                <h2 id="teacher-heading" style="margin-top: 50px;">สำหรับครู
                    <hr>
                </h2>
                <div class="row gy-4 portfolio-container" data-aos-delay="300">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-tea">
                        <a href="<?= site_url('Learning_Plan_controller') ?>">
                            <img src="../assets/img/portfolio/tc1.png" class="img-fluid" alt="">
                            <div class="caption"> แผนการเรียนรู้ <br> Learning Plan </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-tea">
                        <a href="<?= site_url('student') ?>">
                            <img src="../assets/img/portfolio/tc2.png" class="img-fluid" alt="">
                            <div class="caption"> ข้อมูลนักเรียน <br> Student Information </div>
                        </a>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-3 col-md-6 portfolio-item filter-tea">
                        <a href="<?= site_url('estimate') ?>">
                            <img src="../assets/img/portfolio/tc3.png" class="img-fluid" alt="">
                            <div class="caption"> แบบประเมินผล <br> Estimate </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                </div><!-- End Portfolio Container -->


            </div>
        </div> <!-- End Portfolio Container -->
    </section><!-- End Portfolio Section -->
    </main><!-- End #main -->


    <script>
    $(document).ready(function() {
        $('.portfolio-item').show(); // แสดงทุก portfolio-item เมื่อหน้าเว็บโหลดเสร็จ

        $('.portfolio-flters li').click(function() {
            // เมื่อคลิกที่ filter ใดๆ
            $('.portfolio-flters li').removeClass(
            'filter-active'); // ลบคลาส filter-active จากทุก filter
            $(this).addClass('filter-active'); // เพิ่มคลาส filter-active ให้กับ filter ที่ถูกคลิก

            var selectedFilter = $(this).data('filter'); // รับค่า filter ที่ถูกคลิก

            $('.portfolio-item').each(function() {
                if (selectedFilter === '*' || $(this).is(selectedFilter)) {
                    $(this).show(); // แสดง portfolio-item ที่ตรงกับ filter ที่ถูกคลิก
                } else {
                    $(this).hide(); // ซ่อน portfolio-item ที่ไม่ตรงกับ filter ที่ถูกคลิก
                }
            });

            // แสดงหัวข้อของ filter ที่ถูกเลือก
            $('html, body').animate({
                scrollTop: $("#portfolio").offset().top
            }, 800);

            // แสดงหรือซ่อนหัวข้อของแต่ละ filter ตามที่ถูกเลือก
            if (selectedFilter !== '*') {
                $('#lesson-heading').hide();
                $('#practice-heading').hide();
                $('#exercise-heading').hide();
                $('#teacher-heading').hide();
            } else {
                $('#lesson-heading').show();
                $('#practice-heading').show();
                $('#exercise-heading').show();
                $('#teacher-heading').show();
            }
        });
    });
    </script>

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