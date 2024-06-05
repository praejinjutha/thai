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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= $themes ?>assets/css/main.css" rel="stylesheet">
    <script src="<?= $themes ?>assets/js/main.js"></script>

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

    /* ซ่อน Lightbox Popup เริ่มต้น */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .lightbox-content {
        background-color: #fefefe;
        margin: 20% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
                <img src="<?= $themes ?>assets/img/logo.png" alt="">
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
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="<?= $themes ?>assets/img/navbar.png" alt="Navbar"
            style="width: 100%; height: auto; pointer-events: none;">
    </main>

    <div class="container-fluid mb-5">
        <h6 style="font-weight: bold;"> นำเข้าข้อมูลนักเรียนจาก Excel <br> Import Student Form Excel </h6>
        <form action="" method="POST" id="InsertExcel" role="form">
            <div class="row mt-4">
                <div class="col-3">
                    <a href="<?= $themes ?>assets/files/ตัวอย่างไฟล์นำเข้า.xlsx"
                        style="padding: 5px 20px; background-color: #8c6239; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ดาวน์โหลดตัวอย่างไฟล์นำเข้า
                    </a>
                    <button type="submit" class="btn btn-primary ms-3 d-none" id="saveDataButton">บันทึกข้อมูล</button>
                </div>
                <div class="col text-end">
                    <a href="<?= site_url('student'); ?>"
                        style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    <input type="file" class="form-control mb-3" name="Excel_file" id="Excel_file"
                        onchange="getDataExcel()">
                    <p style="font-family: Thasadith; font-weight: 600; color: red">** หมายเหตุ</p>
                    <p style="font-family: Thasadith; font-weight: 600; color: red">คำนำหน้า ได้แก่ เด็กชาย, เด็กหญิง, นาย, นางสาว</p>
                    <p style="font-family: Thasadith; font-weight: 600; color: red">ชั้น ได้แก่ อ.1, อ.2, อ.3, ป.1, ป.2, ป.3, ป.4, ป.5, ป.6</p>
                    <p style="font-family: Thasadith; font-weight: 600; color: red">เกิดวันที่ ได้แก่ 01/01/2564</p>
                    <div class="title1 mt-3">
                        <p style="font-family: Thasadith; font-weight: 900;">ขั้นตอนการนำเข้าข้อมูลนักเรียนจากไฟล์ Excel
                            เข้าระบบ</p>
                        <p style="font-family: Thasadith; font-weight: 600;">1.ดาวน์โหลดไฟล์ตัวอย่างนำเข้าข้อมูล
                        </p>
                        <p style="font-family: Thasadith; font-weight: 600;">2.กรอกข้อมูลนักเรียนที่ต้องการแล้วบันทึกไฟล์ Excel</p>
                        <p style="font-family: Thasadith; font-weight: 600;">3.คลิกเลือกไฟล์ Excel ที่มีการกรอกข้อมูลนักเรียนไว้เเล้ว</p>
                        <p style="font-family: Thasadith; font-weight: 600;">4.คลิกปุ่ม เปิด (open)</p>
                        <p style="font-family: Thasadith; font-weight: 600;">5.ตรวจสอบข้อมูลนักเรียนที่เพิ่มบนหน้าตาราง</p>
                        <p style="font-family: Thasadith; font-weight: 600;">6.คลิกปุ่มบันทึก</p>
                    </div>

                </div>
                <div class="col-9 tbodyDiv">
                    <table id="ShowExcelData" style="margin-left: 0; width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th width="110px"><span class="fw-bold fs-4">รหัสประจำตัว</span></th>
                                <th width="80px"><span class="fw-bold fs-4">คำนำหน้า</span></th>
                                <th width="200px"><span class="fw-bold fs-4">ชื่อ</span></th>
                                <th width="200px"><span class="fw-bold fs-4">นามสกุล</span></th>
                                <th width="80px"><span class="fw-bold fs-4">ชั้น</span></th>
                                <th width="80px"><span class="fw-bold fs-4">ห้อง</span></th>
                                <th width="110px"><span class="fw-bold fs-4">เกิดวันที่</span></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<script>
$('#Excel_file').change(getDataExcel);

function getDataExcel() {
    let formData = new FormData();
    formData.append('Excel_file', $('#Excel_file')[0].files[0]);

    $("#ShowExcelData tbody").html(
        "<tr ><td colspan='7' valign='middle' style='height:100px;' class='text-center fs-4'>กรุณารอสักครู่...</td></tr>"
    );
    $("#saveDataButton").addClass('d-none');

    $.ajax({
        url: '<?= site_url('Student/Read_Excel')?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            let jsonData = JSON.parse(data);
            let tableBody = "";
            $.each(jsonData, function(index, value) {
                tableBody += "<tr>";
                if (value[0]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='StudentNo[]' value='${value[0]}' required></td>`;
                if (value[1]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='Titlename[]' value='${value[1]}' required></td>`;
                if (value[2]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='Firstname[]' value='${value[2]}' required></td>`;
                if (value[3]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='Lastname[]' value='${value[3]}' required></td>`;
                if (value[4]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='ClassYear[]' value='${value[4]}' required></td>`;
                if (value[5]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='Room[]' value='${value[5]}' required></td>`;
                if (value[6]) tableBody += `<td><input type='text' class='form-control text-center w-100 fs-4' style="margin: 0;" name='Birthdate[]' value='${value[6]}' required></td>`;
                tableBody += "</tr>";
            });
            $("#ShowExcelData tbody").html(tableBody);
            $("#saveDataButton").removeClass('d-none');
        },
        error: function() {
            $("#ShowExcelData tbody").html(
                "<tr><td colspan='7' valign='middle' style='height:100px;' class='text-center fs-4'>เกิดข้อผิดพลาดในการโหลดข้อมูล กรุณาลองใหม่อีกครั้ง</td></tr>"
            );
        }
    });
}

$('#InsertExcel').submit(function(e) {
    e.preventDefault();
    InsertExcel();
});

function InsertExcel() {
    let StudentNo = $('input[name="StudentNo[]"]').toArray().map(e => e.value);
    let Titlename = $('input[name="Titlename[]"]').toArray().map(e => e.value);
    let Firstname = $('input[name="Firstname[]"]').toArray().map(e => e.value);
    let Lastname = $('input[name="Lastname[]"]').toArray().map(e => e.value);
    let ClassYear = $('input[name="ClassYear[]"]').toArray().map(e => e.value);
    let Room = $('input[name="Room[]"]').toArray().map(e => e.value);
    let Birthdate = $('input[name="Birthdate[]"]').toArray().map(e => e.value);

    $.ajax({
        url: '<?= site_url('Student/importFiles')?>',
        type: 'POST',
        data: {
            StudentNo: StudentNo,
            Titlename: Titlename,
            Firstname: Firstname,
            Lastname: Lastname,
            ClassYear: ClassYear,
            Room: Room,
            Birthdate: Birthdate
        },
        beforeSend: function() {
            swal.fire({
                title: 'กรุณารอสักครู่',
                html: '<div class="spinner-border spinner-border-blue spinner-border-sm mt-4 mb-5" role="status"><span class="visually-hidden">Loading...</span></div>',
                allowOutsideClick: false,
                showConfirmButton: false
            });
        },
        success: function(data) {
            if (data == 'success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มชื่อนักเรียนสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (data == 'SameStudentNo') {
                swal.fire({
                    icon: 'error',
                    title: 'รหัสประจำตัวซ้ำกัน กรุณาตรวจสอบรหัสประจำตัวนักเรียน',
                    type: "error"
                });
            } else if (data == 'HaveStudent') {
                swal.fire({
                    icon: 'error',
                    title: 'มีข้อมูลนักเรียนอยู่เเล้ว กรุณาตรวจสอบรหัสประจำตัวนักเรียน',
                    type: "error"
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มชื่อนักเรียนได้',
                    type: "error"
                });
            }
        }
    });
}
</script>