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
    <link rel="icon" type="image/x-icon" href="<?= $themes ?>assets/images/logo/icon.png">
    <meta content="<?= DESCRIPTION_NAME ?>" name="description">
    <meta content="<?= KEYWORDS_NAME ?>" name="keywords">

    <link rel="stylesheet" href="<?= $themes ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $themes ?>assets/css/auth.css">
    <link rel="stylesheet" href="<?= $themes ?>assets/css/Font-Prompt/stylesheet.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css'>

    <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="<?= $themes ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js'></script>

</head>

<style>
body {
    background-color: #fff4dc;
    height: 100vh;
    margin: 0;
    font-family: 'Prompt', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
}

.error {
    margin-left: 5px;
    color: #F00;
}

.error.true {
    color: #6bc900;
}

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
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="padding: 5rem 5rem;">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title text-center fw-bold fs-4">ลงทะเบียนเข้าใช้งาน</h4>
                                <form id="signupForm" action="" method="POST" class="form-horizontal">
                                    <div class="form-group mt-5">
                                        <label for="exampleInputName1 font-black" style="color: #000;">
                                            <font color="red">*</font> ชื่อ - สกุล (ระบุคำนำหน้า)
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail3" style="color: #000;">
                                            <font color="red">*</font> เลขบัตรประชาชน
                                        </label>
                                        <input type="text" class="form-control" id="idcard" name="idcard" maxlength="13"
                                            required>
                                        <span class="error"></span>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail3" style="color: #000;">
                                            <font color="red">*</font> อีเมล์
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputPassword4" style="color: #000;">
                                            <font color="red">*</font> หมายเลขโทรศัพท์
                                        </label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputPassword4" style="color: #000;">
                                            <font color="red">*</font> ชื่อผู้ใช้ (Username) ประกอบด้วยอักษร A-Z, a-z,
                                            0-9 เท่านั้น
                                        </label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputPassword4" style="color: #000;">
                                            <font color="red">*</font> รหัสผ่าน (Password) ประกอบด้วยอักษร A-Z, a-z,
                                            0-9, !, @, #, $ เท่านั้น
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputCity1" style="color: #000;">
                                            <font color="red">*</font> ยืนยันรหัสผ่าน
                                        </label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirmPassword" required>
                                    </div>
                                    <div class="col text-center mt-4">
                                        <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                                        <a href="<?= site_url('auth') ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>

<script>
$(document).ready(function() {
    $('#idcard').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                $('span.error').removeClass('true').text('เลขบัตรผิด');
            } else {
                $('span.error').addClass('true').text('เลขบัตรถูกต้อง');
            }
        } else {
            $('span.error').removeClass('true').text('');

        }
    })

    $('#signupForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "<?= site_url('Auth/register') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var alertData = JSON.parse(response);
                swal.fire({
                    icon: alertData.type,
                    title: alertData.title,
                    type: alertData.type
                }).then(function() {
                    if (alertData.type === 'success') {
                        window.location = "<?= site_url('Auth') ?>";
                    }
                });
            },
            error: function() {
                swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    type: 'error'
                });
            }
        });
    });
});

function Script_checkID(id) {
    if (!IsNumeric(id)) return false;
    if (id.substring(0, 1) == 0) return false;
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
    return true;
}

function IsNumeric(input) {
    var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
    return (RE.test(input));
}
</script>