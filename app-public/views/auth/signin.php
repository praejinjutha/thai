<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_NAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?= $themes ?>assets/images/icon/01.png">
    <meta content="<?= DESCRIPTION_NAME ?>" name="description">
    <meta content="<?= KEYWORDS_NAME ?>" name="keywords">

    <link rel="stylesheet" href="<?= $themes ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $themes ?>assets/css/auth.css">
    <link rel="stylesheet" href="<?= $themes ?>assets/css/Font-Prompt/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css'>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="<?= $themes ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js'></script>

</head>

<style>
    .alert,
    .brand,
    .btn-simple,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    .navbar,
    .td-name,
    input,
    option,
    button,
    a,
    body,
    button.close,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    td,
    i {
        font-family: "promptlight";
    }
</style>

<body>

    <div class="container">
        <div class="row header-form">
            <div class="col"></div>
            <div class="col-lg-8">
                <div class="row free-box-dash">
                    <div class="col-lg-7 log-img">
                        <center><img src="<?= $themes ?>assets/images/login/img-03.png" alt="" class="img-fluid"></center>
                        <h6 class="text-left mt-4">Last Update: 12/09/2566 15:00:00</h6>
                    </div>
                    <div class="col-lg-5 log-text fw-bold" style="padding-right: 50px;">
                        <h2 class="mb-1 h-1 text-center fw-bold" style="color: #000;">เข้าสู่ระบบ</h2>
                        <div class="row">
                            <form action="<?= site_url('auth/signin') ?>" method="POST" class="form-horizontal">
                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <label for="inputUsername">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="button-blue-s w-100 fw-bold" style="background: #d2a549;"role="button">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col mt-2"> <a href="">ลืมรหัสผ่าน</a></div>
                                <div class="col mt-2"> <a href="<?= site_url('auth/singupForm') ?>">ลงทะเบียนเข้าใช้งาน</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script>
        <?php if ($this->session->flashdata('msg_error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'รหัสผ่านของคุณไม่ถูกต้อง',
                text: 'กรุณา ใส่ Username / Password ใหม่อีกครั้ง!',
                confirmButtonText: 'close'
            })
        <?php endif; ?>
    </script>

</body>

</html>