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

    <div class="container">
        <h6 style="font-weight: bold;"> แผนการเรียนรู้ <br> Learning Plan </h6>
        <div class="text-end">
            <a href="<?= site_url('lesson'); ?>"
                style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
            </a>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex">
                <span class="fw-bold fs-5 me-4">ระดับชั้น</span>
                <select class="form-select fw-bold w-50" name="ClassYear" id="ClassYear" onchange="updateUnits()">
                    <option class="fnz-select" value=""></option>
                    <option class="fnz-select" value="ป.1">ป.1</option>
                    <option class="fnz-select" value="ป.2">ป.2</option>
                    <option class="fnz-select" value="ป.3">ป.3</option>
                    <option class="fnz-select" value="ป.4">ป.4</option>
                    <option class="fnz-select" value="ป.5">ป.5</option>
                    <option class="fnz-select" value="ป.6">ป.6</option>
                </select>
            </div>
            <div class="col-2 d-flex">
                <span class="fw-bold fs-5 me-4">หน่วยที่</span>
                <select class="form-select w-50 fw-bold" name="Unit" id="Unit" onchange="updatePlans()">
                    <option class="fnz-select" value=""></option>
                </select>
            </div>
            <div class="col d-flex">
                <span class="fw-bold fs-5 me-4">แผนการสอน</span>
                <select class="form-select w-50 fw-bold" name="Plan" id="Plan" onchange="openPDF()">
                    <option class="fnz-select" value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-5">
                <iframe id="pdfViewer" style="width:100%; height:800px;" hidden></iframe>
            </div>
        </div>
    </div>
</body>

</html>

<script>
function updateUnits() {
    var classYear = document.getElementById('ClassYear').value;
    var unitSelect = document.getElementById('Unit');
    unitSelect.innerHTML = '<option class="fnz-select" value=""></option>';

    if (classYear === 'ป.1') {
        for (let i = 1; i <= 4; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.innerHTML = `${i}`;
            option.className = 'fnz-select';
            unitSelect.appendChild(option);
        }
    } else if (classYear !== '') {
        var option = document.createElement('option');
        option.value = 1;
        option.innerHTML = '1';
        option.className = 'fnz-select';
        unitSelect.appendChild(option);
    }
}

function updatePlans() {
    var classYear = document.getElementById('ClassYear').value;
    var unit = document.getElementById('Unit').value;
    var planSelect = document.getElementById('Plan');
    planSelect.innerHTML = '<option class="fnz-select" value=""></option>';

    if (classYear === 'ป.1' && unit !== '') {
        for (let i = 1; i <= 10; i++) {
            var option = document.createElement('option');
            option.value = `หน่วยที่ ${unit} แผนที่ ${i}`;
            option.innerHTML = `หน่วยที่ ${unit} แผนที่ ${i}`;
            option.className = 'fnz-select';
            planSelect.appendChild(option);
        }
    } else if (classYear === 'ป.2' || classYear === 'ป.3' || classYear === 'ป.4' || classYear === 'ป.5' || classYear ===
        'ป.6') {
        var option = document.createElement('option');
        option.value = 'หน่วยที่ 1 แผนที่ 1';
        option.innerHTML = `หน่วยที่ ${unit} แผนที่ 1`;
        option.className = 'fnz-select';
        planSelect.appendChild(option);
    }
}

function openPDF() {
    var selectedPlan = document.getElementById('Plan').value;
    var unit = document.getElementById('Unit').value;
    var ClassYear = document.getElementById('ClassYear').value;
    var plan = ClassYear.split('ป.')[1];

    var url = `../assets/files/Plan/P${plan}/Unit${unit}/${selectedPlan}.pdf`;
    var pdfViewer = document.getElementById('pdfViewer');
    pdfViewer.src = url;
    pdfViewer.hidden = false;
}
</script>