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

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <script src="../assets/js/main.js"></script>

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

    <div class="container mb-5">
        <h6 style="font-weight: bold;"> ข้อมูลนักเรียน <br> Student Information </h6>
        <div class="row mt-4">
            <div class="col-8 text-end pe-5">
                <a href="<?= site_url('Student/StudentImport') ?>" style="padding: 7px 10px; background-color: #8c6239; color: white; border: none; 
                  border-radius: 5px; cursor: pointer;font-size: 22px; font-family: Thasadith; margin-right: 5px;">
                    นำเข้าข้อมูลจาก Excel
                </a>
                <button
                    style="padding: 5px 10px; background-color: #2aa5df; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;"
                    data-toggle="modal" data-target="#AddStuden">
                    เพิ่มชื่อนักเรียน
                </button>
            </div>
            <div class="col-4 text-end">
                <a href="<?= site_url('lesson'); ?>"
                    style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
                </a>
            </div>
        </div>
        <div class="row mt-5">
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
            <div class="col text-end">
                <span class="fw-bold fs-5 d-inline">ค้นหา ชื่อ-นามสกุล</span>
                <input type="text" class="form-control w-50 fw-bold d-inline" name="Fullname" id="Fullname"
                    style="margin-bottom: 0; margin-left: 20px;">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col tbodyDiv">
                <table id="tbl_Student" style="margin-left: 0; width: 100%;">
                    <thead class="text-center">
                        <tr>
                            <th width="100px"><span class="fw-bold fs-4">ลำดับ</span></th>
                            <th width="180px"><span class="fw-bold fs-4">รหัสประจำตัว</span></th>
                            <th><span class="fw-bold fs-4">ชื่อ - นามสกุล</span></th>
                            <th width="180px"><span class="fw-bold fs-4">ชั้นห้อง</span></th>
                            <th width="180px"><span class="fw-bold fs-4">เกิดวันที่</span></th>
                            <th width="180px"><span class="fw-bold fs-4">อายุ</span></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<!-- modal -->
<div class="modal fade" id="AddStuden" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="fs-3 fw-bold" id="exampleModalLongTitle">เพิ่มชื่อนักเรียน</span>
            </div>
            <form action="" method="POST" id="InsertStudent" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <span class="fw-bold fs-5">ปีการศึกษา</span>
                            <select class="form-select fw-bold" name="AcYear" id="AcYear" required>
                                <option class="fnz-select" value=""></option>
                                <?php
                          foreach ($loopYear as $row => $Year) {
                        ?>
                                <option value="<?= $Year ?>" class="fnz-select"><?= $Year ?></option>
                                <?php
                          }
                        ?>
                            </select>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">รหัสประจำตัว</span>
                            <input type="text" class="form-control w-100 fw-bold" name="StudentNo" id="StudentNo"
                                style="margin: 0; padding: .375rem 2.25rem .375rem .75rem;" required>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">คำนำหน้า</span>
                            <select class="form-select fw-bold" name="Titlename" id="Titlename" required>
                                <option class="fnz-select" value=""></option>
                                <option class="fnz-select" value="เด็กชาย">เด็กชาย</option>
                                <option class="fnz-select" value="เด็กหญิง">เด็กหญิง</option>
                                <option class="fnz-select" value="นาย">นาย</option>
                                <option class="fnz-select" value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="fw-bold fs-5">ชื่อ</span>
                            <input type="text" class="form-control w-100 fw-bold" name="Firstname" id="Firstname"
                                style="margin: 0; padding: .375rem 2.25rem .375rem .75rem;" required>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">นามสกุล</span>
                            <input type="text" class="form-control w-100 fw-bold" name="Lastname" id="Lastname"
                                style="margin: 0; padding: .375rem 2.25rem .375rem .75rem;" required>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">เพศ</span>
                            <select class="form-select fw-bold" name="Gender" id="Gender" required>
                                <option class="fnz-select" value=""></option>
                                <option class="fnz-select" value="ช">ชาย</option>
                                <option class="fnz-select" value="ญ">หญิง</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="fw-bold fs-5">ระดับชั้น</span>
                            <select class="form-select fw-bold" name="AClassYear" id="AClassYear" required>
                                <option class="fnz-select" value=""></option>
                                <option class="fnz-select" value="อ.1">อ.1</option>
                                <option class="fnz-select" value="อ.2">อ.2</option>
                                <option class="fnz-select" value="อ.3">อ.3</option>
                                <option class="fnz-select" value="ป.1">ป.1</option>
                                <option class="fnz-select" value="ป.2">ป.2</option>
                                <option class="fnz-select" value="ป.3">ป.3</option>
                                <option class="fnz-select" value="ป.4">ป.4</option>
                                <option class="fnz-select" value="ป.5">ป.5</option>
                                <option class="fnz-select" value="ป.6">ป.6</option>
                            </select>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">ห้อง</span>
                            <input type="text" class="form-control w-100 fw-bold" name="ARoom" id="ARoom"
                                style="margin: 0; padding: .375rem 2.25rem .375rem .75rem;" required>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">วันเดือนปีเกิด</span>
                            <input type="date" class="form-control w-100 fw-bold" name="Birthdate" id="Birthdate"
                                style="margin: 0;" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary fs-5">บันทึก</button>
                    <button type="button" class="btn btn-danger fs-5" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>

<script>
$(document).ready(function() {
    get_Student();

    $('#ClassYear').change(function() {
        $('#Fullname').val('');
        get_Student();
    });

    $('#Room').change(function() {
        $('#Fullname').val('');
        get_Student();
    });

    $('#Fullname').on('input', function() {
        $('#ClassYear').val('');
        $('#Room').val('');
        get_Student();
    });
});

function get_Student() {
    let ClassYear = $('#ClassYear').val();
    let Room = $('#Room').val();
    let Fullname = $('#Fullname').val();
    let table_body = $('#tbl_Student tbody');

    $.ajax({
        url: "<?= site_url('Student/get_Student') ?>",
        method: "POST",
        data: {
            ClassYear: ClassYear,
            Room: Room,
            Fullname: Fullname
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="6" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลคะแนน </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let Birthdate = formatBirthdate(row.Birthdate);
                    let Age = calculateAge(row.Birthdate);
                    let table_row = `<tr class="fs-4">
                            <td>${count}</td>
                            <td>${row.StudentNo || ''}</td>
                            <td align="left">${row.FullName || ''}${row.Name || ''}</td>
                            <td>${row.ClassYear}/${row.Room}</td>
                            <td>${Birthdate || ''}</td>
                            <td>${Age || ''}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function calculateAge(birthdate) {
    if (!birthdate) return '';

    let dateParts = birthdate.split('-');
    let day = parseInt(dateParts[2]);
    let month = parseInt(dateParts[1]);
    let year = parseInt(dateParts[0]) + 543;

    let birthDate = new Date(year - 543, month - 1, day);
    let currentDate = new Date();

    let ageYears = currentDate.getFullYear() - birthDate.getFullYear();
    let ageMonths = currentDate.getMonth() - birthDate.getMonth();
    let ageDays = currentDate.getDate() - birthDate.getDate();

    if (ageDays < 0) {
        ageMonths--;
        ageDays += new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
    }

    if (ageMonths < 0) {
        ageYears--;
        ageMonths += 12;
    }

    return `${ageYears} ปี ${ageMonths} เดือน ${ageDays} วัน`;
}

function formatBirthdate(birthdate) {
    if (!birthdate) return '';

    let dateParts = birthdate.split('-');
    let day = parseInt(dateParts[2]);
    let month = parseInt(dateParts[1]);
    let year = parseInt(dateParts[0]) + 543;

    return `${day}-${month}-${year}`;
}

$('#InsertStudent').submit(function(e) {
    e.preventDefault();
    InsertStudent();
});

function InsertStudent() {
    let AcYear = $('#AcYear').val();
    let StudentNo = $('#StudentNo').val();
    let Titlename = $('#Titlename').val();
    let Firstname = $('#Firstname').val();
    let Lastname = $('#Lastname').val();
    let Gender = $('#Gender').val();
    let ClassYear = $('#AClassYear').val();
    let Room = $('#ARoom').val();
    let Birthdate = $('#Birthdate').val();

    let formData = new FormData();
    formData.append('AcYear', AcYear);
    formData.append('StudentNo', StudentNo);
    formData.append('Titlename', Titlename);
    formData.append('Firstname', Firstname);
    formData.append('Lastname', Lastname);
    formData.append('Gender', Gender);
    formData.append('ClassYear', ClassYear);
    formData.append('Room', Room);
    formData.append('Birthdate', Birthdate);

    $.ajax({
        url: "<?= site_url('Student/Insert_Student') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            swal.fire({
                title: 'กรุณารอสักครู่',
                html: '<div class="spinner-border spinner-border-blue spinner-border-sm mt-4 mb-5" role="status"><span class="visually-hidden">Loading...</span></div>',
                allowOutsideClick: false,
                showConfirmButton: false
            });
        },
        success: function(results) {
            if (results == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มชื่อนักเรียนสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else if (results == 'HaveStudent') {
                swal.fire({
                    icon: 'error',
                    title: 'มีข้อมูลรหัสประจำตัวนักเรียนนี้เเล้ว',
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