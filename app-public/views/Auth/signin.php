<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="<?= $themes ?>assets/css/main.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- =======================================================
  * Template Name: Nova
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
.role {
    margin-top: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

}

.std-role,
.tec-role {
    display: flex;
    align-items: center;
    border: 1px solid #8c6239;
    border-radius: 5px;
    padding: 3px 15px;
    cursor: pointer;
}

.std-role:hover,
.tec-role:hover,
.std-role.active,
.tec-role.active {
    background-color: #8c6239;
    color: #ffffff;
    border: 1px solid #8c6239;
    border-radius: 5px;
}
</style>
<body class="page-index">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="<?= site_url('dashboard') ?>" class="logo d-flex align-items-center">
                <img src="<?= $themes ?>assets/img/logo.png" alt="">
            </a>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="role">
                        <div class="tec-role active" onclick="toggleActive(this)" name="role" value="teacher">
                            <i class="fa-solid fa-user-tie me-2"></i>
                            <span>ครู</span>
                        </div>
                        <div class="std-role" onclick="toggleActive(this)" name="role" value="student">
                            <i class="fa-solid fa-user me-2"></i>
                            <span>นักเรียน</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>
            </div>
            <div class="row">
                <div class="col-xl-3 mt-5" id="teacher">
                    <form action="<?= site_url('auth/signin') ?>" method="POST" class="form-horizontal">
                        <div class="col-12">
                            <label for="inputUsername">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                style="margin: 0; padding: .375rem .75rem; width: 100%;">
                            <label for="inputPassword" class="mt-3">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col mt-3 text-end"> <a href="<?= site_url('auth/singupForm') ?>"
                                style="color: #000000">ลงทะเบียนเข้าใช้งาน</a>
                            <div class="col-md-12 mt-3">
                                <button class="btn w-100" style="background: #8c6239; color: #ffff; font-size: 18px"
                                    role="button">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-3 mt-5 d-none" id="student">
                    <form action="<?= site_url('auth/signinStd') ?>" method="POST" class="form-horizontal">
                        <div class="col-12">
                            <label for="inputUsername">เลขบัตรประชาชน</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                style="margin: 0; padding: .375rem .75rem; width: 100%;">
                            <label for="inputPassword" class="mt-3">เลขที่นักเรียน</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col mt-3 text-end"> <a href="<?= site_url('auth/singupForm') ?>"
                                style="color: #000000">ลงทะเบียนเข้าใช้งาน</a>
                            <div class="col-md-12 mt-3">
                                <button class="btn w-100" style="background: #8c6239; color: #ffff; font-size: 18px"
                                    role="button">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-2"></div>
            </div>
        </div>
    </section>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <script src="../assets/js/main.js"></script>

</body>

</html>

<script>
<?php if ($this->session->flashdata('msg_error')) : ?>
Swal.fire({
    icon: 'error',
    title: 'รหัสผ่านของคุณไม่ถูกต้อง',
    text: 'กรุณา ใส่ Username / Password ใหม่อีกครั้ง!',
    confirmButtonText: 'close'
})
<?php endif; ?>

function toggleActive(element) {
    var activeElements = document.querySelectorAll('.role .active');
    activeElements.forEach(function(active) {
        active.classList.remove('active');
    });

    element.classList.add('active');

    var teacher = document.getElementById('teacher');
    var student = document.getElementById('student');
    if (element.classList.contains('tec-role')) {
        teacher.classList.remove('d-none');
        student.classList.add('d-none');
    } else if (element.classList.contains('std-role')) {
        student.classList.remove('d-none');
        teacher.classList.add('d-none');
    }
}
</script>