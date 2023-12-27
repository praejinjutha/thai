<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>
<style>
.tbodyDiv {
    max-height: clamp(5em, 110vh, 750px);
    margin-top: 10px;
    overflow: auto;
}
</style>
<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('HelperHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">จัดการบัญชีผู้ใช้งาน</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card m-3 mt-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <h3 class="fw-bold text-center mt-3">จัดการบัญชี</h3>
                                    <hr>
                                    <a href="#" class="btn btn-success fw-bold fs-4 w-100" data-bs-toggle="modal"
                                        data-bs-target="#ModalAdd">+ เพิ่มผู้ใช้ใหม่</a>

                                    <!-- **** Modal **** -->
                                    <div class="modal fade" id="ModalAdd" >
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <form action="" method="POST" id="InsertUseraccounts" role="form">
                                                    <div class="modal-body">
                                                        <div class="tab">
                                                            <h5 class="card-title fw-bold"
                                                                style="color: #18409e;font-size: 32px;">
                                                                เพิ่มข้อมูลบัญชีผู้ใช้งานใหม่</h5>
                                                        </div>
                                                        <div id="modal-setting-7" class="tabcontent">
                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ชื่อ - นามสกุล (ระบุคำนำหน้า)</label>
                                                                        <input type="text" class="form-control" id="Name" name="Name" value="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">เลขบัตรประชาชน</label>
                                                                        <input type="text" class="form-control" id="NationalID" name="NationalID" maxlength="13" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">อีเมล</label>
                                                                        <input type="text" class="form-control" id="Email" name="Email" value=" ">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">หมายเลขโทรศัพท์</label>
                                                                        <input type="text" class="form-control" id="Mobile" name="Mobile" value="">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h3 class="fw-bold" style="color: #18409e;">ข้อมูลสำหรับล็อคอิน</h3>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ชื่อผู้ใช้</label>
                                                                        <input type="text" class="form-control" id="Username" name="Username" value="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 25px;">รหัสผ่าน</label>
                                                                        <input type="textarea" class="form-control" id="Password" name="Password" value="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ยืนยันรหัสผ่าน</label>
                                                                        <input type="textarea" class="form-control" id="Confirm" name="Confirm" value="">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col m-2 border">
                                                                        <h3 class="fw-bold mt-2">ตั้งค่าระดับผู้ใช้</h3>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Level" id="Leve1" value="admin">
                                                                            <label class="form-check-label fw-bold">ผู้ดูแลระบบ (ทั้งหมด)</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Level" id="Level2" value="user" checked>
                                                                            <label class="form-check-label fw-bold">ผู้ใช้ทั่วไป</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col m-2 border">
                                                                        <h3 class="fw-bold mt-2">ตั้งค่าฝ่ายบุคลากร</h3>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Personnel" id="Personnel1" value="admin">
                                                                            <label class="form-check-label fw-bold">ผู้ดูแลระบบฝ่ายบุคลากร</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Personnel" id="Personnel2" value="user" checked>
                                                                            <label class="form-check-label fw-bold">ผู้ใช้ทั่วไป</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col m-2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-3">  
                                                            <button type="sudmit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                    <hr>
                                    <h3 class="fw-bold text-center mt-3">เปลี่ยนรหัสผ่าน</h3>
                                    <div class="col">
                                        <input type="text" class="form-control" id="ID" name="ID" value="" hidden>
                                        <label for="exampleInputUsername2" class="col mt-1 fw-bold" style="color: black;font-size: 25px;">ชื่อผู้ใช้</label>
                                        <input type="text" class="form-control" id="UsernameReset" name="UsernameReset" value="" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPassword" class="col mt-1 fw-bold" style="color: black;font-size: 25px;">รหัสผ่านใหม่</label>
                                        <input type="password" class="form-control" id="PasswordReset" name="PasswordReset" value="" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPasswordConfirm" class="col mt-1 fw-bold" style="color: black;font-size: 25px;">ยืนยันรหัสผ่านใหม่</label>
                                        <input type="password" class="form-control" id="ConfirmPasswordReset" name="ConfirmPasswordReset" value="" readonly>
                                    </div>
                                    <div class="col mt-3">
                                        <button class="btn btn-primary fw-bold fs-4 w-100" id="btn-pass" onclick="UpdatePassword()" style="display: none;">อัปเดตรหัสผ่าน</button>
                                    </div>
                                </div>
                                <div class="col-md-10 tbodyDiv">
                                    <table class="table table-striped table-bordered mt-2" id="tbl_ManageUseraccounts">
                                        <thead class="text-center ">
                                            <tr>
                                                <th>
                                                    <h3 class="fw-bold">ลำดับ</h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">เลขบัตรประชาชน
                                                    </h3>
                                                </th>
                                                <th width="300px">
                                                    <h3 class="fw-bold">
                                                        ชื่อ-นามสกุล</h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">อีเมล
                                                    </h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">
                                                        หมายเลขโทรศัพท์</h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">
                                                        ชื่อผู้ใช้</h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">ระดับผู้ใช้งาน
                                                    </h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">เปลี่ยนรหัสผ่าน
                                                    </h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">แก้ไข
                                                    </h3>
                                                </th>
                                                <th>
                                                    <h3 class="fw-bold">ลบ
                                                    </h3>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    get_ManageUseraccounts();
});

function get_ManageUseraccounts() {
    let table_body = $('#tbl_ManageUseraccounts tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('ManageUseraccounts/fech_ManageUseraccounts') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="9" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.NationalID || ''}</td>
                            <td align="left">${row.Name || ''}</td>
                            <td>${row.Email || ''}</td>
                            <td>${row.Mobile || ''}</td>
                            <td>${row.Username || ''}</td>
                            <td>${row.Role || ''}</td>
                            <td><a href="#" class="btn btn-primary fw-bold fs-4" id="UpdatePass" onclick="ChangePassword('${row.ID}')" data-count="${row.ID}">เปลี่ยนรหัสผ่าน</a></td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#ModalEdit${count}">แก้ไข</a>
                                <div class="modal fade" id="ModalEdit${count}" >
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                    <div class="modal-body" style="text-align: left">
                                                        <div class="tab">
                                                            <h5 class="card-title fw-bold"
                                                                style="color: #18409e;font-size: 32px;">
                                                                แก้ไขข้อมูลบัญชีผู้ใช้งาน</h5>
                                                        </div>
                                                        <div id="modal-setting-7" class="tabcontent">
                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ชื่อ - นามสกุล (ระบุคำนำหน้า)</label>
                                                                        <input type="text" class="form-control" id="Name_Edit${count}" name="Name_Edit" value="${row.Name}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">เลขบัตรประชาชน</label>
                                                                        <input type="text" class="form-control" id="NationalID_Edit${count}" name="NationalID_Edit" maxlength="13" value="${row.NationalID}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">อีเมล</label>
                                                                        <input type="text" class="form-control" id="Email_Edit${count}" name="Email_Edit" value="${row.Email}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">หมายเลขโทรศัพท์</label>
                                                                        <input type="text" class="form-control" id="Mobile_Edit${count}" name="Mobile_Edit" value="${row.Mobile}" readonly>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h3 class="fw-bold" style="color: #18409e;">ข้อมูลสำหรับล็อคอิน</h3>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ชื่อผู้ใช้</label>
                                                                        <input type="text" class="form-control" id="Username_Edit${count}" name="Username_Edit" value="${row.Username}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 25px;">รหัสผ่าน</label>
                                                                        <input type="textarea" class="form-control" id="Password_Edit${count}" name="Password_Edit" value="" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2" class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ยืนยันรหัสผ่าน</label>
                                                                        <input type="textarea" class="form-control" id="Confirm_Edit${count}" name="Confirm_Edit" value="" readonly>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col m-2 border">
                                                                        <h3 class="fw-bold mt-2">ตั้งค่าระดับผู้ใช้</h3>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Level_Edit${count}" id="Leve_Edit1" value="admin" ${row.Role === 'admin' ? 'checked' : ''} disabled>
                                                                            <label class="form-check-label fw-bold">ผู้ดูแลระบบ (ทั้งหมด)</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Level_Edit${count}" id="Level_Edit2" value="user" ${row.Role === 'user' ? 'checked' : ''} disabled>
                                                                            <label class="form-check-label fw-bold">ผู้ใช้ทั่วไป</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col m-2 border">
                                                                        <h3 class="fw-bold mt-2">ตั้งค่าฝ่ายบุคลากร</h3>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Personnel_Edit${count}" id="Personnel_Edit1" value="admin" ${row.AdminPersonal === 'admin' ? 'checked' : ''} disabled>
                                                                            <label class="form-check-label fw-bold">ผู้ดูแลระบบฝ่ายบุคลากร</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="Personnel_Edit${count}" id="Personnel_Edit2" value="user" ${row.AdminPersonal === 'user' ? 'checked' : ''} disabled>
                                                                            <label class="form-check-label fw-bold">ผู้ใช้ทั่วไป</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col m-2">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col-md-12 ">
                                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.RegisDate} </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-3">
                                                            <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit(${count}, this)" data-count="${count}">แก้ไข</button>
                                                            <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;"  onclick="UpdateUseraccounts(${row.ID}, ${count})">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="DeleteUseraccounts('${row.ID}')">ลบ</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

function ChangePassword(ID) {

    $.ajax({
        url: "<?= site_url('ManageUseraccounts/Edit_Password') ?>",
        method: "POST",
        data: {
            ID: ID
        },
        dataType: 'json',
        success: function(data) { 
            $('#UsernameReset').val(data.Username);
            $('#ID').val(data.ID);
            $('#btn-pass').show();
        }
    });
}

$('#InsertUseraccounts').submit(function(e) {
    e.preventDefault();
    InsertUseraccounts();
});

function InsertUseraccounts() {
    let Name = $('#Name').val();
    let NationalID = $('#NationalID').val();
    let Email = $('#Email').val();
    let Mobile = $('#Mobile').val();
    let Username = $('#Username').val();
    let Password = $('#Password').val();
    let Confirm = $('#Confirm').val();
    let Level = $('[name="Level"]:checked').val();
    let Personnel = $('[name="Personnel"]:checked').val();

    let formData = new FormData();
    formData.append('Name', Name);
    formData.append('NationalID', NationalID);
    formData.append('Email', Email);
    formData.append('Mobile', Mobile);
    formData.append('Username', Username);
    formData.append('Password', Password);
    formData.append('Confirm', Confirm);
    formData.append('Level', Level); 
    formData.append('Personnel', Personnel); 

    $.ajax({
        url: "<?= site_url('ManageUseraccounts/Insert_Useraccounts') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) {
            if (results == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            }else if (results === "PasswordMismatch") {
                swal.fire({
                    icon: 'error',
                    title: 'พาสเวิร์ดไม่ตรงกัน',
                    type: "error"
                });
            }else if (results === "ThisUsernameAlreadyExists") {
                swal.fire({
                    icon: 'error',
                    title: 'ชื่อผู้ใช้งานนี้มีอยู่แล้ว',
                    type: "error"
                });
            }else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function UpdateUseraccounts(ID, modalCount) {
    let Name = $(`#Name_Edit${modalCount}`).val();
    let NationalID = $(`#NationalID_Edit${modalCount}`).val();
    let Email = $(`#Email_Edit${modalCount}`).val();
    let Mobile = $(`#Mobile_Edit${modalCount}`).val();
    let Username = $(`#Username_Edit${modalCount}`).val();
    let Level = $(`input[name="Level_Edit${modalCount}"]:checked`).val();
    let Personnel = $(`input[name="Personnel_Edit${modalCount}"]:checked`).val();

    
    let formData = new FormData();
    formData.append('ID', ID);
    formData.append('Name', Name);
    formData.append('NationalID', NationalID);
    formData.append('Email', Email);
    formData.append('Mobile', Mobile);
    formData.append('Username', Username);
    formData.append('Level', Level); 
    formData.append('Personnel', Personnel); 

    $.ajax({
        url: "<?= site_url('ManageUseraccounts/update_Useraccounts') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#ModalEdit${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function DeleteUseraccounts(ID) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('ManageUseraccounts/delete_Useraccounts') ?>",
                type: 'POST',
                data: {
                    ID: ID
                },
                success: function(results) {
                    if (results == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

function UpdatePassword() {
    let ID = $(`#ID`).val();
    let Password = $(`#PasswordReset`).val();
    let ConfirmPassword = $(`#ConfirmPasswordReset`).val();

    
    let formData = new FormData();
    formData.append('ID', ID);
    formData.append('Password', Password);
    formData.append('ConfirmPassword', ConfirmPassword);

    $.ajax({
        url: "<?= site_url('ManageUseraccounts/update_Password') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เปลี่ยนรหัสผ่านสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            }else if (response === "PasswordMismatch") {
                swal.fire({
                    icon: 'error',
                    title: 'พาสเวิร์ดไม่ตรงกัน',
                    type: "error"
                });
            }else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเปลี่ยนรหัสผ่านได้',
                    type: "error"
                });
            }
        }
    });
}

function toggleEdit(count, button) {
    let editButton = button;
    let saveButton = editButton.nextElementSibling;

    editButton.style.display = "block";
    saveButton.style.display = "none";

    editButton.style.display = "none";
    saveButton.style.display = "block";
}


$(document).on("click", "#edit", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#Name_Edit" + count).prop("readonly", false);
    $("#NationalID_Edit" + count).prop("readonly", false);
    $("#Email_Edit" + count).prop("readonly", false);
    $("#Mobile_Edit" + count).prop("readonly", false);
    $("#Username_Edit" + count).prop("readonly", false);
    $(`input[name="Level_Edit${count}"]`).prop("disabled", false);
    $(`input[name="Personnel_Edit${count}"]`).prop("disabled", false);
});

$(document).on("click", "#UpdatePass", function() {
    $("#PasswordReset").prop("readonly", false);
    $("#ConfirmPasswordReset").prop("readonly", false);
});

$(document).ready(function() {
    $(".change-password-btn").click(function() {
        var username = "ชื่อผู้ใช้งานที่คุณต้องการ";

        $("#usernameField").val(username);

        $("#changePasswordModal").modal("show");
    });
    
    $(".update-password-btn").click(function() {
        var newPassword = $("#newPasswordField").val();
        var confirmNewPassword = $("#confirmPasswordField").val();
    });
});
</script>