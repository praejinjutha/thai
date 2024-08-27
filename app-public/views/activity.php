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

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <style>
    #practice-heading {
        position: relative;
        bottom: -50px;
        /* ปรับตามความเหมาะสม */
    }

    .service-item:nth-child(odd) {
        margin-bottom: 25px;
        /* ระยะห่างสำหรับแถวที่เป็นลำดับคู่ */
    }

    .service-item:nth-child(even) {
        margin-bottom: 70px;
        /* ระยะห่างสำหรับแถวที่เป็นลำดับคี่ */
    }

    .services-list {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .service-item {
        height: 50px;
        /* ปรับความสูงตามความเหมาะสม */
        width: auto;
        overflow: hidden;
        /* ป้องกันข้อความที่ยาวเกินขอบของคอลัมน์ */
        width: calc(33.33%);
        /* กำหนดให้คอลัมน์มีความกว้าง 33.33% ของพื้นที่ทั้งหมดและลบระยะห่างระหว่างคอลัมน์ออก */
        margin-bottom: 20px;
        /* ระยะห่างระหว่างแต่ละคอลัมน์ */
        box-sizing: border-box;
        /* ให้ขอบของคอลัมน์นับเข้าไปในความกว้าง */
    }


    .services-list .row {
        display: flex;
        flex-wrap: wrap;
        /* ให้คอลัมน์ขึ้นบรรทัดใหม่เมื่อไม่พอที่จะแสดงทั้งหมด */

    }

    .services-list .service-item {
        display: flex;
        justify-content: flex-start;
        /* จัดให้ข้อความอยู่ชิดซ้าย */
        align-items: center;
        /* จัดให้ข้อความอยู่กึ่งกลางในแนวตั้ง */
    }

    .services-list .service-item h4 {
        margin: 0;
        /* ลบ margin ทั้งหมด */
        text-align: left;
        /* จัดให้ข้อความชิดซ้าย */
        width: 100%;
        /* กำหนดขนาดของข้อความให้เต็มคอลัมน์ */
        margin-left: 100px;
    }


    /* เพิ่ม CSS เพื่อปรับขนาดภาพ */
    img {
        max-width: auto;
        /* รูปภาพจะไม่เกินขนาดความกว้างของพื้นที่ที่มันอยู่ */
        height: auto;
        /* ความสูงของรูปภาพจะปรับให้เหมาะสมกับขนาดความกว้าง */
    }


    .img-container,
    .img-con {
        display: flex;
        justify-content: center;
        /* จัดให้รูปอยู่ตรงกลาง */
    }

    .img-container img {
        margin-left: 100px;
        margin-right: 120px;
        margin-bottom: 50px;
        /* ลดระยะห่างด้านล่างของรูปภาพ */
    }

    .img-con {
        margin-left: 100px;
        margin-top: -40px;
        /* ปรับตามความต้องการของคุณ */
        margin-right: 120px;
    }


    .service-item a {
        color: #8c6239;
        /* เลือกสีที่คุณต้องการ */
    }

    .service-item h4 a.active {
        background-color: #8c6239;
        color: white;
        padding: 2px 10px;
        border-radius: 50px;


        transition: all 0.3s ease;
    }

    /* เมื่อ hover ที่เมนูภายใน services-list */
    .services-list .service-item:hover {
        background-color: #8c6239;
        color: white;
        padding: 2px 10px;
        border-radius: 50px;

        transition: all 0.3s ease;
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



    <h6 style="font-weight: bold;"> ใบกิจกรรม <br> Activity </h6>


    <div style="display: flex; justify-content: flex-end; margin-right: 100px;">
        <a href="<?= site_url('lesson'); ?>"
            style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">ย้อนกลับ</a>
    </div>

    <section id="portfolio" class="portfolio">
        <div class="container" style="margin-top: -100px;">
            <h2 id="practice-heading">ใบงานมาตราตัวสะกด
                <hr>
            </h2>
        </div>


        <section id="services-list" class="services-list">
            <div class="container">
                <div class="row">



                    <div class="col-lg-4 col-md-6 service-item" data-aos-delay="100">
                        <div class="service-content d-flex" data-aos="fade-up" data-aos-delay="400">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; "> ✤
                                    มาตราตัวสะกดแม่กก</a></h4>
                        </div><!-- End Service Content -->
                    </div><!-- End Service Item -->





                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่กง</a></h4>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่กด</a></h4>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่กน</a></h4>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่กบ</a></h4>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่กม</a></h4>
                    </div><!-- End Service Item -->


                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่เกย</a></h4>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                        <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                มาตราตัวสะกดแม่เกอว</a></h4>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- End Our Services Section -->


        <section id="services-lost" class="services-list" style="margin-top: -230px;">
            <div class="container">
                <h2 id="practice-heading">ใบงานทั่วไป
                    <hr>
                </h2>
            </div>

            <section id="services-lost" class="services-list">
                <div class="container">
                    <div class="row">


                        <div class="img-container">
                            <img src="../assets/img/bowl11.png" alt="รูปภาพที่ 1" style="width: 90%; height: auto;">
                        </div>


                        <div class="col-lg-4 col-md-6 service-item" data-aos-delay="100">
                            <div class="service-content d-flex" data-aos="fade-up" data-aos-delay="400">
                                <h4 class="title"><a href="1" class="stretched-link" style="font-size: 28px;  "> ✤
                                        หาดอกไม้ในเพลง</a></h4>
                            </div><!-- End Service Content -->
                        </div><!-- End Service Item -->


                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤ อักษรนำ</a>
                            </h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                    ฝึกแต่งประโยค</a></h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                    วรรณยุกต์</a></h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                    คำที่มักเขียนผิด</a></h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                    คำที่มีตัวการันต์</a></h4>
                        </div><!-- End Service Item -->


                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤ คำประสม</a>
                            </h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤ คำที่ใช้
                                    บรร - บัน</a></h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                    คำควบกล้ำ</a></h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤ คำเป็น
                                    คำตาย</a></h4>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="50">
                            <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px;"> ✤
                                    คำคล้องจอง</a></h4>
                        </div><!-- End Service Item -->

                    </div>
                    <div class="img-con">
                        <img src="../assets/img/bowl22.png" alt="รูปภาพที่ 2" style="width: 100%; height: auto;">
                    </div>
                </div>

            </section><!-- End Our Services Section -->


            <script>
            // เพิ่มคลาส 'active' ให้กับลิงก์ที่มีข้อความเป็น "มาตราตัวสะกดแม่กก" หรือ "หาดอกไม้ในเพลง"
            const serviceItems = document.querySelectorAll('.service-item h4 a');
            serviceItems.forEach(item => {
                if (item.textContent.includes('มาตราตัวสะกดแม่กก') || item.textContent.includes(
                        'หาดอกไม้ในเพลง')) {
                    item.classList.add('active');
                }
            });

            // สำหรับลบคลาส 'active' เมื่อ hover ที่ section บน (services-list)
            const serviceListItems = document.querySelectorAll('#services-list .service-item h4 a');
            serviceListItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    serviceListItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                });
            });

            // สำหรับลบคลาส 'active' เมื่อ hover ที่ section ล่าง (services-lost)
            const serviceLostItems = document.querySelectorAll('#services-lost .service-item h4 a');
            serviceLostItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    serviceLostItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
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