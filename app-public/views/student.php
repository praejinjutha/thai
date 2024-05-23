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
                    <li><a href="<?= site_url('dashboard') ?>">หน้าหลัก</a></li>
                    <li><a href="<?= site_url('Lesson') ?>" class="active">บทเรียน</a></li>
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
        <h6 style="font-weight: bold;"> ข้อมูลนักเรียน <br> Student Information </h6>
        <div class="row mt-4">
            <div class="col-8 text-end pe-5">
                <button
                    style="padding: 5px 10px; background-color: #8c6239; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px; margin-right: 5px;">นำเข้าข้อมูลจาก
                    Excel
                </button>
                <button
                    style="padding: 5px 10px; background-color: #2aa5df; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">เพิ่มชื่อนักเรียน
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
                      foreach ($result as $row) { 
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
                      foreach ($result as $row) { 
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
                            <th width="150px"><span class="fw-bold fs-4">ลำดับ</span></th>
                            <th width="150px"><span class="fw-bold fs-4">รหัสประจำตัว</span></th>
                            <th><span class="fw-bold fs-4">ชื่อ - นามสกุล</span></th>
                            <th width="160px"><span class="fw-bold fs-4">ชั้นห้อง</span></th>
                            <th width="130px"><span class="fw-bold fs-4">เกิดวันที่</span></th>
                            <th width="165px"><span class="fw-bold fs-4">อายุ</span></th>
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
        success: function(data) { console.log(data);
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
</script>