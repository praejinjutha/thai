<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PersonnelInformation' : 'User_Controller/PersonnelHome_User') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">การประเมินผลการปฏิบัติงาน</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 flex-column d-flex stretch-card">
            <div class="row flex-grow">
                <div class="col-sm-12">
                    <div class="card m-3 mt-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputUsername2" class=" fw-bold"
                                                style="font-size: 26px;">ปีการศึกษา</label>
                                            <select class="form-select " id="YearSearch" name="YearSearch"
                                                style="display: inline; margin-left: 20px; width: 60%;">
                                                <option class="select-fnz" value="">----- แสดงข้อมูลทั้งหมด -----</option>
                                                <?php
                                                    foreach ($loopYear as $row => $Year) {
                                                ?>
                                                <option value="<?= $Year ?>" class="select-fnz">
                                                    <?= $Year ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="exampleInputUsername2" class=" fw-bold"
                                                style="font-size: 26px;">คัดกรองผู้ถูกประเมิน</label>
                                            <select class="form-select" id="FullNameSearch" name="FullNameSearch" 
                                                style="display: inline; margin: 0 20px 0 20px; width: 50%;">
                                                <option class="select-fnz" value="">----- แสดงข้อมูลทั้งหมด -----</option>
                                                <?php 
                                                    foreach ($FullName as $row) {
                                                ?>
                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <!-- **** Modal **** -->
                                        <div class="modal fade" id="myModal" >
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="" method="POST" id="InsertPerformanceAppraisal" role="form">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มข้อมูลการประเมินผลการปฏิบัติงาน</h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                            <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ปีการศึกษา</label>
                                                                            <select class="form-select" id="AcYear" name="AcYear">
                                                                                <option class="select-fnz" value=""></option>
                                                                                <?php
                                                                                    foreach ($loopYear as $row => $Year) {
                                                                                ?>
                                                                                <option value="<?= $Year ?>" class="select-fnz">
                                                                                    <?= $Year ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ผู้ที่ถูกประเมิน</label>
                                                                            <select class="form-select" id="IDCard" name="IDCard">
                                                                                <option class="select-fnz" value=""></option>
                                                                                <?php 
                                                                                    foreach ($FullName as $row) {
                                                                                ?>
                                                                                    <option class="select-fnz" value="<?= $row->IDCard ?>"><?= $row->FullName ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <input type="text" class="form-control" id="AppraiseePosition" name="AppraiseePosition" value="" hidden>
                                                                            <input type="text" class="form-control" id="Appraisee" name="Appraisee" value="" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ผู้ทำประเมิน</label>
                                                                            <select class="form-select" id="Appraiser" name="Appraiser">
                                                                                <option class="select-fnz" value=""> </option>
                                                                                <?php 
                                                                                    foreach ($FullName as $row) {
                                                                                ?>
                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">หัวข้อการประเมินผลการสอน</label>
                                                                            <input type="text" class="form-control" id="Heading" name="Heading" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">องค์ประกอบ</label>
                                                                            <input type="text" class="form-control" id="Component" name="Component" value="">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">ข้อคำถาม</label>
                                                                            <input type="text" class="form-control" id="Question" name="Question" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">ผลการประเมิน</label>
                                                                            <select class="form-select" name="Result" id="Result">
                                                                                <option value="" class="select-fnz"></option>
                                                                                <option value="ดีเด่น" class="select-fnz">ดีเด่น</option>
                                                                                <option value="ดีมาก" class="select-fnz">ดีมาก</option>
                                                                                <option value="ดี" class="select-fnz">ดี</option>
                                                                                <option value="พอใช้" class="select-fnz">พอใช้</option>
                                                                                <option value="ปรับปรุง" class="select-fnz">ปรับปรุง</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ความคิดเห็นของผู้บังคับบัญชา</label>
                                                                            <input type="text" class="form-control" id="Opinion" name="Opinion" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">หมายเหตุ</label>
                                                                            <input type="text" class="form-control" id="Remark" name="Remark" value="">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">แนบไฟล์</label>
                                                                            <input class="form-control" type="file" id="FileName" name="FileName" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer mt-3">
                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                <button type="button" class="btn btn-secondary fw-bold fs-4"
                                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

                                        <div class="col-md-4 ">
                                            <a href="#" class="btn btn-success fw-bold fs-4 float-end"
                                                data-bs-toggle="modal" data-bs-target="#myModal"
                                                style="margin-right: 10px;">+ เพิ่มข้อมูลการประเมินผลการปฏิบัติงาน</a>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col md-auto">
                                            <table class="table table-striped table-bordered" id="tbl_PerformanceAppraisal">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">ปีการศึกษา</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">ผู้ที่ถูกประเมิน</h3>
                                                        </th>
                                                        <th width="250px">
                                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">ผู้ทำประเมิน</h3>
                                                        </th>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">ผลการประเมิน</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ความคิดเห็นของผู้บังคับบัญชา</h3>
                                                        </th>
                                                        <th width="250px">
                                                            <h3 class="fw-bold">ไฟล์แนบ</h3>
                                                        </th>
                                                        <th width="80px">
                                                            <h3 class="fw-bold">แก้ไข
                                                            </h3>
                                                        </th>
                                                        <th width="80px">
                                                            <h3 class="fw-bold">ลบ
                                                            </h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">ส่งออก
                                                            </h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col" id="tbcount">

                                            </div>
                                        </div>
                                    </div>
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
    get_PerformanceAppraisal();
});

$('#YearSearch').change(get_PerformanceAppraisal);
$('#FullNameSearch').change(get_PerformanceAppraisal);

function get_PerformanceAppraisal() {
    let Year = $('#YearSearch').val();
    let FullName = $('#FullNameSearch').val();
    let table_body = $('#tbl_PerformanceAppraisal tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('User_Controller/PerformanceAppraisal/fech_PerformanceAppraisal') ?>",
        method: "POST",
        data: {
            Year: Year,
            FullName: FullName
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="10" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${row.AcYear || ''}</td>
                            <td align="left">${row.Appraisee || ''}</td>
                            <td>${row.AppraiseePosition || ''}</td>
                            <td align="left">${row.Appraiser || ''}</td>
                            <td>${row.Result || ''}</td>
                            <td>${row.Opinion || ''}</td>
                            <td><a href="<?= site_url('User_Controller/PerformanceAppraisal/export/') ?>${row.ID}">${row.FileName || ''}</a></td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#ModalEdit${count}">แก้ไข</a>
                                <div class="modal fade" id="ModalEdit${count}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                        <div class="modal-body" style="text-align: left">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มข้อมูลการประเมินผลการปฏิบัติงาน</h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                            <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ปีการศึกษา</label>
                                                                            <select class="form-select" id="AcYear_Edit${count}" name="AcYear_Edit" onclick="removeOption()" disabled>
                                                                                <option class="select-fnz" value="${row.AcYear}">${row.AcYear}</option>
                                                                                <?php
                                                                                    foreach ($loopYear as $row => $Year) {
                                                                                ?>
                                                                                <option value="<?= $Year ?>" class="select-fnz">
                                                                                    <?= $Year ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ผู้ที่ถูกประเมิน</label>
                                                                            <select class="form-select" id="IDCard_Edit${count}" name="IDCard_Edit" onclick="removeOption()" onchange="fetch_AppraiseeEdit(${count})" disabled>
                                                                                <option class="select-fnz" value="${row.Appraisee}">${row.Appraisee}</option>
                                                                                <?php 
                                                                                    foreach ($FullName as $row) {
                                                                                ?>
                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <input type="text" class="form-control" id="AppraiseePosition_Edit${count}" name="AppraiseePosition_Edit" value="${row.AppraiseePosition}" hidden>
                                                                            <input type="text" class="form-control" id="Appraisee_Edit${count}" name="Appraisee_Edit" value="${row.Appraisee}" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ผู้ทำประเมิน</label>
                                                                            <select class="form-select" id="Appraiser_Edit${count}" name="Appraiser_Edit" onclick="removeOption()" disabled>
                                                                                <option class="select-fnz" value="${row.Appraiser}">${row.Appraiser}</option>
                                                                                <?php 
                                                                                    foreach ($FullName as $row) {
                                                                                ?>
                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">หัวข้อการประเมินผลการสอน</label>
                                                                            <input type="text" class="form-control" id="Heading_Edit${count}" name="Heading_Edit" value="${row.Heading}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">องค์ประกอบ</label>
                                                                            <input type="text" class="form-control" id="Component_Edit${count}" name="Component_Edit" value="${row.Component}" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">ข้อคำถาม</label>
                                                                            <input type="text" class="form-control" id="Question_Edit${count}" name="Question_Edit" value="${row.Question}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">ผลการประเมิน</label>
                                                                            <select class="form-select" name="Result_Edit" id="Result_Edit${count}" onclick="removeOption()" disabled>
                                                                                <option value="${row.Result}" class="select-fnz">${row.Result}</option>
                                                                                <option value="ดีเด่น" class="select-fnz">ดีเด่น</option>
                                                                                <option value="ดีมาก" class="select-fnz">ดีมาก</option>
                                                                                <option value="ดี" class="select-fnz">ดี</option>
                                                                                <option value="พอใช้" class="select-fnz">พอใช้</option>
                                                                                <option value="ปรับปรุง" class="select-fnz">ปรับปรุง</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2 fw-bold"
                                                                                style="font-size: 25px;">ความคิดเห็นของผู้บังคับบัญชา</label>
                                                                            <input type="text" class="form-control" id="Opinion_Edit${count}" name="Opinion_Edit" value="${row.Opinion}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="font-size: 25px;">หมายเหตุ</label>
                                                                            <input type="text" class="form-control" id="Remark_Edit${count}" name="Remark_Edit" value="${row.Remark}" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                                <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                <a href="<?= site_url('User_Controller/PerformanceAppraisal/export/') ?>${row.ID}"><input class="form-control" type="text" id="FileNameEdit${count}" name="FileNameEdit" value="${row.FileName !== null ? row.FileName : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                                            </div>
                                                                            <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                                    <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                    <input class="form-control" type="file" id="FileName_Edit${count}" name="FileName_Edit">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-md-12 ">
                                                                            <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer mt-3">
                                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit_PerformanceAppraisal(${count}, this)">แก้ไข</button>
                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdatePerformanceAppraisal(${row.ID}, ${count})">บันทึก</button>
                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                            </td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="DeletePerformanceAppraisal('${row.ID}')">ลบ</a></td>
                            <td><a href="<?= site_url('User_Controller/PerformanceAppraisal/exportExcel/') ?>${row.ID}" class="btn btn-primary fw-bold fs-4">ส่งออก</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

$('#IDCard').change(fetch_Appraisee);

function fetch_Appraisee() {
    let IDCard = $('#IDCard').val();

    $.ajax({
        url: "<?= site_url('User_Controller/PerformanceAppraisal/fetch_Appraisee') ?>",
        method: "POST",
        data: {
            IDCard: IDCard
        },
        success: function(data) { 
            let parsedData = JSON.parse(data);
            $('#AppraiseePosition').val(parsedData.PosName !== '' ? parsedData.PosName : '-');
            $('#Appraisee').val(parsedData.FullName !== '' ? parsedData.FullName : '-');
        }
    });
}

function fetch_AppraiseeEdit(count) {
    let IDCard = $(`#IDCard_Edit${count}`).val();

    $.ajax({
        url: "<?= site_url('User_Controller/PerformanceAppraisal/fetch_AppraiseeEdit') ?>",
        method: "POST",
        data: {
            IDCard: IDCard
        },
        success: function(data) { 
            let parsedData = JSON.parse(data);
            $(`#AppraiseePosition_Edit${count}`).val(parsedData.PosName !== '' ? parsedData.PosName : '-');
            $(`#Appraisee_Edit${count}`).val(parsedData.FullName !== '' ? parsedData.FullName : '-');
        }
    });
}

$('#InsertPerformanceAppraisal').submit(function(e) {
    e.preventDefault();
    InsertPerformanceAppraisal();
});

function InsertPerformanceAppraisal() {
    let AcYear = $('#AcYear').val();
    let Appraisee = $('#Appraisee').val();
    let AppraiseePosition = $('#AppraiseePosition').val();
    let Appraiser = $('#Appraiser').val();
    let Heading = $('#Heading').val();
    let Component = $('#Component').val();
    let Question = $('#Question').val();
    let Result = $('#Result').val();
    let Opinion = $('#Opinion').val();
    let Remark = $('#Remark').val();
    let FileName = $('#FileName')[0].files[0];

    let formData = new FormData();
    formData.append('AcYear', AcYear);
    formData.append('Appraisee', Appraisee);
    formData.append('AppraiseePosition', AppraiseePosition);
    formData.append('Appraiser', Appraiser);
    formData.append('Heading', Heading);
    formData.append('Component', Component);
    formData.append('Question', Question);
    formData.append('Result', Result);
    formData.append('Opinion', Opinion);
    formData.append('Remark', Remark);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('User_Controller/PerformanceAppraisal/Insert_PerformanceAppraisal') ?>",
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

function UpdatePerformanceAppraisal(ID, modalCount) {
    let AcYear = $(`#AcYear_Edit${modalCount}`).val();
    let Appraisee = $(`#Appraisee_Edit${modalCount}`).val();
    let AppraiseePosition = $(`#AppraiseePosition_Edit${modalCount}`).val();
    let Appraiser = $(`#Appraiser_Edit${modalCount}`).val();
    let Heading = $(`#Heading_Edit${modalCount}`).val();
    let Component = $(`#Component_Edit${modalCount}`).val();
    let Question = $(`#Question_Edit${modalCount}`).val();
    let Result = $(`#Result_Edit${modalCount}`).val();
    let Opinion = $(`#Opinion_Edit${modalCount}`).val();
    let Remark = $(`#Remark_Edit${modalCount}`).val();
    let FileName = $(`#FileName_Edit${modalCount}`)[0].files[0];

    let formData = new FormData();
    formData.append('ID', ID);
    formData.append('AcYear', AcYear);
    formData.append('Appraisee', Appraisee);
    formData.append('AppraiseePosition', AppraiseePosition);
    formData.append('Appraiser', Appraiser);
    formData.append('Heading', Heading);
    formData.append('Component', Component);
    formData.append('Question', Question);
    formData.append('Result', Result);
    formData.append('Opinion', Opinion);
    formData.append('Remark', Remark);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('User_Controller/PerformanceAppraisal/update_PerformanceAppraisal') ?>",
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

function DeletePerformanceAppraisal(ID) {
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
                url: "<?= site_url('User_Controller/PerformanceAppraisal/delete_PerformanceAppraisal') ?>",
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

function toggleEdit_PerformanceAppraisal(count, button) {
    let FileNameDownloadDiv = document.getElementById(`FileNameDownload${count}`);
    let FileNameInputDiv = document.getElementById(`FileNameInput${count}`);
    let editButton = button;
    let saveButton = editButton.nextElementSibling;

    if (FileNameDownloadDiv.style.display === "none") {
        FileNameDownloadDiv.style.display = "block";
        FileNameInputDiv.style.display = "none";
        editButton.style.display = "block";
        saveButton.style.display = "none";
    } else {
        FileNameDownloadDiv.style.display = "none";
        FileNameInputDiv.style.display = "block";
        editButton.style.display = "none";
        saveButton.style.display = "block";
    }
}

$(document).on("click", "#edit", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#AcYear_Edit" + count).prop("disabled", false);
    $("#IDCard_Edit" + count).prop("disabled", false);
    $("#Appraiser_Edit" + count).prop("disabled", false);
    $("#Heading_Edit" + count).prop("readonly", false);
    $("#Component_Edit" + count).prop("readonly", false);
    $("#Question_Edit" + count).prop("readonly", false);
    $("#Result_Edit" + count).prop("disabled", false);
    $("#Opinion_Edit" + count).prop("readonly", false);
    $("#Remark_Edit" + count).prop("readonly", false);
});

function removeOption() {
    $("select[name='AcYear_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Appraiser_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Result_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='IDCard_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>