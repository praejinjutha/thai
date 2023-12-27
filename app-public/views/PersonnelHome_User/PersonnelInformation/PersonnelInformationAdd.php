<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<div class="container-fluid" style="padding: 0px;">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PersonnelInformation') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">เพิ่มข้อมูลบุคลากรรายบุคคล</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form action="" method="POST" id="FrmInsertData" role="form">
            <div class="row">
                <!-- ******************** Start Form Select Image ******************** -->
                <div class="col-md-3 mt-4">
                    <div class="row">
                        <div class="col" align="center">
                            <div class="form-group text-center">
                                <label class="fw-bold fs-3 ">รูปประจำตัวบุคลากร</label>
                                <hr style="margin-top: 13px; color: #eac178;height: 2px;opacity: 1;">
                            </div>
                            <img id="previewImg1" src="<?= $themes ?>assets/images/no_img/170x170.jfif" width="200px" height="200px"/>
                            <input type="file" class="form-control mt-2" id="Pic"
                                onchange="previewImage(this, 'previewImg1')">
                        </div>
                    </div>
                </div>
                <!-- ******************** End Form Select Image ******************** -->

                <!-- ******************** Start Form Select Data ******************** -->
                <div class="col-md-9 mt-4">
                    <h5 class="card-title fw-bold" style="font-size: 32px;color: #18409e; font-size: 32px;">
                        ข้อมูลส่วนตัว
                    </h5>
                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                    <div class="box-border border p-3" style="background-color: #f7e8ce;">
                        <div class="row">
                            <div class="col ">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="fw-bold">เลขบัตรประชาชน <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="IDCard" maxlength="13"
                                                    id="IDCard" required oninput="validateIDCard(this)"><span
                                                    class="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="fw-bold"><span>
                                                        เลขที่พาสปอร์ต </span></label>
                                                <input type="text" class="form-control" id="Passport" name="Passport"
                                                    maxlength="13" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="fw-bold"><span>สถานภาพการทำงาน <span
                                                            style="color: red;">*</span>
                                                    </span></label>
                                                <select class="form-select select-fnz" style='height: 45px'
                                                    name="NStatus" id="NStatus" required>
                                                    <option value="" class="select-fnz"> </option>
                                                    <?php 
                                                        foreach($NStatus->result() as $row){
                                                        ?>
                                                    <option class="select-fnz" value="<?= $row->Status ?>">
                                                        <?= $row->Status ?></option>
                                                    <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border border p-3 mt-3" style="background-color: #e4e7f0;">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="" class="fw-bold"> คำนำหน้า <span style="color: red;"> *
                                                </span></label>
                                            <select class="form-select form-select-sm" style="height: 45px" name="PName"
                                                id="PName" required>
                                                <option value="" class="select-fnz"> </option>
                                                <?php 
                                                foreach($PName->result() as $row){
                                                ?>
                                                <option class="select-fnz" value="<?= $row->TSPname ?>">
                                                    <?= $row->TSPname ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top: 45px; padding-left: 5.5%;">
                                        <i class="fa-solid fa-circle-plus" style="color: green;" data-bs-toggle="modal"
                                            data-bs-target="#modal1"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold"><span> ชื่อ <span style="color: red;"> *
                                                </span></span></label>
                                        <input type="text" class="form-control" id="FTName" name="FTName" maxlength="30"
                                            value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold"> นามสกุล <span style="color: red;"> *
                                            </span></span></label>
                                        <input type="text" class="form-control" id="LTName" name="LTName" maxlength="30"
                                            value="" required />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="" class="fw-bold"> Name Titles <span style="color: red;"> *
                                                </span>
                                            </label>
                                            <select class="form-select form-select-sm" style="height: 45px"
                                                name="PEName" id="PEName" required>
                                                <option value="" class="select-fnz"> </option>
                                                <?php 
                                        foreach($PEName->result() as $row){
                                        ?>
                                                <option class="select-fnz" value="<?= $row->SPname ?>">
                                                    <?= $row->SPname ?>
                                                </option>
                                                <?php
                                        }
                                        ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top: 45px; padding-left: 5.5%;">
                                        <i class="fa-solid fa-circle-plus" style="color: green;" data-bs-toggle="modal"
                                            data-bs-target="#modal2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">
                                            Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="FEName" name="FEName" value=""
                                            maxlength="30" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">Lastname <span style="color: red;">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="LEName" name="LEName" value=""
                                            maxlength="30" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="col-md-12 mt-4">
                                    <div class="form-group row fw-bold">
                                        <label class="col-md-3 col-form-label mt-2">เพศ <span
                                                style="color: red;">*</span></label>
                                        <div class="col-md-8 mt-3">
                                            <input class="form-check-input" type="radio" name="Sex" id="Sex" value="M"
                                                checked>
                                            <label class="fw-bold " style="padding-right: 10px"> ชาย</label>
                                            <input class="form-check-input" type="radio" name="Sex" id="Sex" value="F">
                                            <label class="fw-bold">หญิง </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">วัน/เดือน/ปี
                                            เกิด</label>
                                        <input type="date" class="form-control" id="BirthDate" name="BirthDate"
                                            value="<?php echo (date('Y-m-d')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">หมู่โลหิต</label>
                                        <select class="form-select" style='height: 45px' name="BloodG" id="BloodG">
                                            <option value="" class="select-fnz"> </option>
                                            <option value="A" class="select-fnz">A</option>
                                            <option value="B" class="select-fnz">B</option>
                                            <option value="AB" class="select-fnz">AB</option>
                                            <option value="O" class="select-fnz">O</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border border p-3 mt-3">
                        <div class="row">
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">ประเภทข้าราชการครู
                                        <span style="color: red;">*</span></label>
                                        <select class="form-select" style='height: 45px' name="PoType" id="PoType" required>
                                            <option value="" class="select-fnz"> </option>
                                            <?php 
                                            foreach($PoType->result() as $row){
                                            ?>
                                                <option class="select-fnz" value="<?= $row->ID ?>"><?= $row->TypeName ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">ตำแหน่งปัจจุบัน 
                                        <span style="color: red;">*</span></label>
                                        <select class="form-select" style='height: 45px' id="PoLine" name="PoLine" required>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">ระดับปัจจุบัน</label>
                                        <select class="form-select" style='height: 45px' name="PLevel" id="PLevel">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col"></div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">กลุ่มสาระ/หมวดวิชา</label>
                                        <select class="form-select" id="Subject_group">
                                            <option value=" " class="select-fnz"> </option>
                                            <?php 
                                        foreach($Subject_group->result() as $row){
                                    ?>
                                            <option class="select-fnz" value="<?= $row->GroupName ?>">
                                                <?= $row->GroupName ?>
                                            </option>
                                            <?php
                                    }
                                    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">ตำแหน่งอื่นที่ได้รับ</label>
                                        <input type="text" class="form-control" id="PoAssign" name="PoAssign"
                                            maxlength="20" value=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <hr class="mt-3">
                            <div class="row">
                                <div class="col mt-1">
                                    </h6>
                                    <div class="col">
                                        <h6 class="fw-bold ">หมายเหตุ
                                            <span style="color: red;">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit" value="submit">บันทึกข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ******************** End Form Select Data ******************** -->
            </div>
    </div>
    </form>
</div>

<!-- Start Modal Thai Title -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal-setting-7" class="tabcontent">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <form action="" method="POST" id="FrmInsertThai" role="form">
                                    <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                        style="color: black;font-size: 28px;">เพิ่มคำนำหน้าภาษาไทย</label>
                                    <input type="text" class="form-control" id="TSPname" name="TSPname" required>
                            </div>
                            <div class="col-md-7 mt-4">
                                <div class="float-end mt-3">
                                    <button type="sudmit" class="btn btn-primary fw-bold"
                                        style='font-size:20px;'>บันทึก</button>
                                    <button type="button" class="btn btn-secondary fw-bold" style='font-size:20px;'
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped mt-2 table-bordered" id="tbl_ThaiTitle">
                            <thead class="text-center ">
                                <tr>
                                    <th>
                                        <h3 class="fw-bold">ลำดับ</h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            คำนำหน้า
                                        </h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            ลบ</h3>
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
<!-- End Modal Thai Title -->

<!-- Start Modal English Title -->
<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal-setting-7" class="tabcontent">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <form action="" method="POST" id="FrmInsertEng" role="form">
                                    <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                        style="color: black;font-size: 28px;">เพิ่มคำนำหน้าภาษาอังกฤษ</label>
                                    <input type="text" class="form-control" id="SPname" name="SPname" required>
                            </div>
                            <div class="col-md-7 mt-4">
                                <div class="float-end mt-3">
                                    <button type="sudmit" class="btn btn-primary fw-bold"
                                        style='font-size:20px;'>บันทึก</button>
                                    <button type="button" class="btn btn-secondary fw-bold" style='font-size:20px;'
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped mt-2 table-bordered" id="tbl_EngTitle">
                            <thead class="text-center ">
                                <tr>
                                    <th>
                                        <h3 class="fw-bold">ลำดับ</h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            คำนำหน้า
                                        </h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            ลบ</h3>
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
<!-- End Modal English Title -->

<script>
$(document).ready(function() {
    getSTTPname()
    getSTPname();
});

$('#FrmInsertData').submit(function(e) {
    e.preventDefault();
    FrmInsertData();
});

function FrmInsertData() {

    let Pic = $('#Pic')[0].files[0];
    let IDCard = $('#IDCard').val();
    let Passport = $('#Passport').val();
    let NStatus = $('#NStatus').val();
    let PName = $('#PName').val();
    let FTName = $('#FTName').val();
    let LTName = $('#LTName').val();
    let PEName = $('#PEName').val();
    let FEName = $('#FEName').val();
    let LEName = $('#LEName').val();
    let Sex = $('#Sex').val();
    let PoLine = $('#PoLine').val();
    let PLevel = $('#PLevel').val();
    let BloodG = $('#BloodG').val();
    let PoType = $('#PoType').val();
    let BirthDate = $('#BirthDate').val();
    let PoAssign = $('#PoAssign').val();
    let Subject_group = $('#Subject_group').val();
    
    let formData = new FormData();
    formData.append('Pic', Pic);
    formData.append('IDCard', IDCard);
    formData.append('Passport', Passport);
    formData.append('NStatus', NStatus);
    formData.append('PName', PName);
    formData.append('FTName', FTName);
    formData.append('LTName', LTName);
    formData.append('PEName', PEName);
    formData.append('FEName', FEName);
    formData.append('LEName', LEName);
    formData.append('Sex', Sex);
    formData.append('PoLine', PoLine);
    formData.append('PLevel', PLevel);
    formData.append('BloodG', BloodG);
    formData.append('PoType', PoType);
    formData.append('BirthDate', BirthDate);
    formData.append('PoAssign', PoAssign);
    formData.append('Subject_group', Subject_group);
    
    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_Data') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            console.log(dataResult);
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location = "<?= site_url('PersonnelInformation') ?>";
                });
            } else if (dataResult == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            } else if (dataResult == 'Data') {
                swal.fire({
                    icon: 'error',
                    title: 'มีข้อมูลอยู่ในระบบแล้ว !',
                    type: "error"
                });
            }
        }
    });
}

$('#FrmInsertThai').submit(function(e) {
    e.preventDefault();
    FrmInsertThai();
});

function FrmInsertThai() {
    let TSPname = $('#TSPname').val();

    let formData = new FormData();
    formData.append('TSPname', TSPname);
    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_STTPname') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

$('#FrmInsertEng').submit(function(e) {
    e.preventDefault();
    FrmInsertEng();
});

function FrmInsertEng() {
    let SPname = $('#SPname').val();

    let formData = new FormData();
    formData.append('SPname', SPname);
    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_STPname') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteThai(IDTPname) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_STTPname') ?>",
                type: 'POST',
                data: {
                    IDTPname: IDTPname
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
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

function FrmDeleteEng(IDPname) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_STPname') ?>",
                type: 'POST',
                data: {
                    IDPname: IDPname
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
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

function getSTTPname() {
    let table_body = $('#tbl_ThaiTitle tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_STTPname') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr>
                        <td>${count}</td>
                        <td>${row.TSPname}</td>
                        <td class="text-center"><button class="btn btn-danger fw-bold fs-4 " onclick="FrmDeleteThai(${row.IDTPname})">ลบ</button></td>
                    </tr>`;
                table_body.append(table_row);
            });
        }
    });
}

function getSTPname() {
    let table_body = $('#tbl_EngTitle tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_STPname') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr>
                        <td>${count}</td>
                        <td>${row.SPname}</td>
                        <td class="text-center"><button class="btn btn-danger fw-bold fs-4 " onclick="FrmDeleteEng(${row.IDPname})">ลบ</button></td>
                    </tr>`;
                table_body.append(table_row);
            });
        }
    });
}
</script>

<script>
function previewImage(input, imgId) {
    let file = input.files[0];
    let reader = new FileReader();
    let previewImg = document.getElementById(imgId);

    reader.onload = function(e) {
        previewImg.src = e.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '<?php echo $themes . 'assets/images/no_img/170x170.jfif'; ?>';
    }

    let fileName = input.files[0].name;
    let nextSibling = input.nextElementSibling;
    if (nextSibling) {
        nextSibling.innerText = fileName;
    }
}
</script>

<!-- input idcard and passport -->
<script>
IDCard.addEventListener('input', function() {

    if (IDCard.value !== '') {

        Passport.disabled = true;
        Passport.value = '';
    } else {

        Passport.disabled = false;
    }
});


Passport.addEventListener('input', function() {

    if (Passport.value !== '') {

        IDCard.disabled = true;
        IDCard.value = '';
    } else {

        IDCard.disabled = false;
    }
});
</script>

<script>
function Script_checkID(id) {
    if (id.substring(0, 1) == 0) return false;
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
    return true;
}

function validateIDCard(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 13);
}

jQuery(document).ready(function($) {
    $('#IDCard').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            var id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                $('span.error').removeClass('valid').addClass('invalid').text('เลขบัตรผิด');
            } else {
                $('span.error').removeClass('invalid').addClass('valid').text('เลขบัตรถูกต้อง');
            }
        } else {
            $('span.error').removeClass('valid invalid').text('');
        }
    });
});

$('#PoType').change(fetch_TeacherPosition);
$('#PoLine').change(fetch_TeacherPoLevel);

function fetch_TeacherPosition() {
    let PoType = $('#PoType').val();
    
    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_TeacherPosition') ?>",
        method: "POST",
        data: {
            PoType: PoType
        },
        success: function(data) {
            $('#PoLine').html(data);
        }
    });
}

function fetch_TeacherPoLevel() {
    let PoLine = $('#PoLine').val();

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_TeacherPoLevel') ?>",
        method: "POST",
        data: {
            PoLine: PoLine
        },
        success: function(data) {
            $('#PLevel').html(data);
        }
    });
}
</script>