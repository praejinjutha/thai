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
        /* สีเทาอ่อน */
    }

    select option {
        width: 300px;
        /* กำหนดความกว้างของ option */
        height: 40px;
        /* กำหนดความสูงของ option */
    }

    #studentTable {
        display: none;
    }

    .tbodyDiv {
        max-height: 600px;
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
        <h6 style="font-weight: bold;"> แบบประเมินผล <br> Estimate </h6>
        <div class="text-end">
            <a href="<?= site_url('lesson'); ?>"
                style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
            </a>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex">
                <span class="fw-bold fs-5 me-4">ประเภทบุคคล</span>
                <select class="form-select w-50 fw-bold" name="Type" id="Type">
                    <option class="fnz-select" value=""></option>
                    <option class="fnz-select" value="นักเรียน">นักเรียน</option>
                    <option class="fnz-select" value="บุคคลทั่วไป">บุคคลทั่วไป</option>
                </select>
            </div>
            <div class="col-2 d-flex">
                <span class="fw-bold fs-5 me-4">ชั้นเรียน</span>
                <select class="form-select w-50 fw-bold" name="ClassYear" id="ClassYear">
                    <option class="fnz-select" value=""></option>
                    <?php 
                      foreach ($getClassYear as $row) { 
                    ?>
                    <option class="fnz-select" value="<?= $row->ClassYear ?>"><?= $row->ClassYear ?></option>
                    <?php    
                      }
                    ?>
                </select>
            </div>
            <div class="col-2 d-flex">
                <span class="fw-bold fs-5 me-4">ห้อง</span>
                <select class="form-select w-50 fw-bold" name="Room" id="Room">
                    <option class="fnz-select" value=""></option>
                    <?php 
                      foreach ($getRoom as $row) { 
                    ?>
                    <option class="fnz-select" value="<?= $row->Room ?>"><?= $row->Room ?></option>
                    <?php    
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col tbodyDiv">
                <table id="tbl_EvaluationForm" style="margin-left: 0; width: 100%;">
                    <thead class="text-center">
                        <tr>
                            <th width="150px"><span class="fw-bold fs-4">รหัสประจำตัว</span></th>
                            <th><span class="fw-bold fs-4">ชื่อ - นามสกุล</span></th>
                            <th width="160px"><span class="fw-bold fs-4">แบบคัดลายมือ</span><br>(๒๐ คะแนน)</th>
                            <th width="130px"><span class="fw-bold fs-4">แบบทดสอบ</span><br>(๒๐ คะแนน)</th>
                            <th width="165px"><span class="fw-bold fs-4">วาดภาพระบายสี</span><br>(๒๐ คะแนน)</th>
                            <th width="120px"><span class="fw-bold fs-4">ร้องเพลง</span><br>(๒๐ คะแนน)</th>
                            <th width="120px"><span class="fw-bold fs-4">เล่านิทาน</span><br>(๒๐ คะแนน)</th>
                            <th width="130px"><span class="fw-bold fs-4">คะแนนรวม</span><br>(๑๐๐ คะแนน)</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<script>
$(document).ready(function() {
    get_EvaluationForm();
});

$('#Type').change(get_EvaluationForm);
$('#ClassYear').change(get_EvaluationForm);
$('#Room').change(get_EvaluationForm);

function get_EvaluationForm() {
    let Type = $('#Type').val();
    let ClassYear = $('#ClassYear').val();
    let Room = $('#Room').val();
    let table_body = $('#tbl_EvaluationForm tbody');
    console.log(Type);
    $.ajax({
        url: "<?= site_url('Estimate/get_EvaluationForm') ?>",
        method: "POST",
        data: {
            Type: Type,
            ClassYear: ClassYear,
            Room: Room
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="8" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลคะแนน </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    let table_row = `<tr class="fs-4">
                            <td>${row.id_user || ''}</td>
                            <td align="left">${row.FullName || ''}${row.Name || ''}</td>
                            <td>${row.CScore || 0}</td>
                            <td>${row.TScore || 0}</td>
                            <td>${row.WScore || 0}</td>
                            <td>${row.SScore || 0}</td>
                            <td>${row.RScore || 0}</td>
                            <td>${0 + row.TScore + 0 + 0 + 0}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}
</script>