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
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PersonnelInformation' : 'User_Controller/PersonnelHome_User') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">ระบบมอบหมายงาน / ติดตามงาน</label>
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
                                        <div class="col-md-3" style="padding-right: 0px">
                                            <label for="exampleInputUsername2" class=" fw-bold"
                                                style="font-size: 26px;">ปีการศึกษา</label>
                                            <select class="form-select"
                                                style="display: inline; margin: 0 20px 0 20px; width: 60%;" id="Year" name="Year">
                                                <option selected class="select-fnz" value="">----- แสดงข้อมูลทั้งหมด -----</option>
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
                                        <div class="col-md-9">
                                            <a href="#" class="btn btn-success fw-bold fs-4 float-start" data-bs-toggle="modal" 
                                            data-bs-target="#myModal" style="margin-right: 10px;">+ เพิ่มข้อมูล</a>
                                            
                                            <!-- **** Modal **** -->
                                            <div class="modal fade" id="myModal">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <form action="" method="POST" id="InsertAssignmentSystem" role="form">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มข้อมูลการมอบหมายงาน/ติดตามงาน</h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                            <?php
                                                                                foreach ($get_PrID as $row) {
                                                                                    if (isset($row->Pr_id_max)) {
                                                                                        $Pr_id = $row->Pr_id_max + 1;
                                                                                    } else {
                                                                                        $Pr_id = 1; 
                                                                                    }
                                                                            ?>
                                                                                <input type="text" class="form-control" id="Pr_id" name="Pr_id"
                                                                                    value="<?= $Pr_id ?>" style="display:none;">
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                            <select class="form-select" id="EdYear" name="EdYear">
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
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">ประเภทคำสั่ง</label>
                                                                            <select class="form-select" id="PrType" name="PrType">
                                                                                <option class="select-fnz"> </option>
                                                                                <option value="คำสั่งภายในโรงเรียน" class="select-fnz">
                                                                                    คำสั่งภายในโรงเรียน
                                                                                </option>
                                                                                <option value="คำสั่งเทศบาล" class="select-fnz">
                                                                                    คำสั่งเทศบาล
                                                                                </option>
                                                                                <option value="คำสั่งต้นสังกัด/เขต" class="select-fnz">
                                                                                    คำสั่งต้นสังกัด/เขต
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">เรื่อง</label>
                                                                            <input type="text" class="form-control" id="PrDepart"
                                                                                name="PrDepart" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">เลขที่คำสั่ง</label>
                                                                            <input type="text" class="form-control" id="Prsubj"
                                                                                name="Prsubj" value="">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">วันที่ออกคำสั่ง</label>
                                                                            <input type="date" class="form-control" id="Prdate"
                                                                                name="Prdate" value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">ชื่อผู้ที่ได้รับหมอบหมาย</label>
                                                                            <select class="form-select"  id="PrNamete" name="PrNamete">
                                                                                <option class="select-fnz"> </option>
                                                                                <?php 
                                                                                foreach ($FullName as $row) {
                                                                                ?>
                                                                                <option class="select-fnz" value="<?= $row->FullName ?>">
                                                                                    <?= $row->FullName ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">เพิ่มเติมชื่อผู้ที่ได้รับหมอบหมาย</label>
                                                                            <input type="text" class="form-control" id="TeaAll"
                                                                                name="TeaAll" value="">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">หมายเหตุ</label>
                                                                            <input type="text" class="form-control" id="Prother"
                                                                                name="Prother" value="">
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2" class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">แนบไฟล์</label>
                                                                            <input type="file" class="form-control" id="FileNm" name="FileNm" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer mt-3">
                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4" >บันทึก</button>
                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                            </div>
                                                        </div> 
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col md-auto tbodyDiv">
                                            <table class="table table-striped table-bordered" id="tbl_AssignmentSystem">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ลำดับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">คำสั่งเลขที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ปีการศึกษา</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">วันที่ออกคำสั่ง</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">เรื่อง
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ประเภทคำสั่ง
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ชื่อผู้ที่ได้รับหมอบหมาย
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">เพิ่มเติมชื่อผู้ที่ได้รับหมอบหมาย
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ไฟล์แนบ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">หมายเหตุ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">แก้ไข
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ลบ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ส่งออก
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
    </div>
</div>
<script>
$(document).ready(function() {
    get_AssignmentSystem();
});

$('#Year').change(get_AssignmentSystem);

function get_AssignmentSystem() {
    let Year = $('#Year').val();
    let table_body = $('#tbl_AssignmentSystem tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('User_Controller/AssignmentSystem/fech_AssignmentSystem') ?>",
        method: "POST",
        data: {
            Year: Year
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="13" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.Prsubj || ''}</td>
                            <td>${row.EdYear || ''}</td>
                            <td>${new Date(row.Prdate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.PrDepart || ''}</td>
                            <td>${row.PrType || ''}</td>
                            <td align="left">${row.PrNamete || ''}</td>
                            <td>${row.TeaAll || ''}</td>
                            <td><a href="<?= site_url('User_Controller/AssignmentSystem/export/') ?>${row.IdAt}">${row.FileNm || ''}</a></td>
                            <td>${row.Prother || ''}</td>
                            <td><a href="#" class="btn btn-warning fw-bold select-fnz" data-bs-toggle="modal" data-bs-target="#EditModal${count}">แก้ไข</a>
                                <div class="modal fade" id="EditModal${count}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-body" style="text-align: left">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มข้อมูลการมอบหมายงาน/ติดตามงาน</h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                            <?php
                                                                                foreach ($get_PrID as $row) {
                                                                                    if (isset($row->Pr_id_max)) {
                                                                                        $Pr_id = $row->Pr_id_max + 1;
                                                                                    } else {
                                                                                        $Pr_id = 1; 
                                                                                    }
                                                                            ?>
                                                                                <input type="text" class="form-control" id="Pr_id_Edit${count}" name="Pr_id_Edit"
                                                                                    value="${row.Pr_id}" style="display:none;">
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                            <select class="form-select" id="EdYear_Edit${count}" name="EdYear_Edit" onclick="removeOption_AssignmentSystem()" disabled>
                                                                                <option class="select-fnz" value="${row.EdYear}">${row.EdYear}</option>
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
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">ประเภทคำสั่ง</label>
                                                                            <select class="form-select" id="PrType_Edit${count}" name="PrType_Edit" onclick="removeOption_AssignmentSystem()" disabled>
                                                                                <option class="select-fnz" value="${row.PrType}">${row.PrType}</option>
                                                                                <option value="คำสั่งภายในโรงเรียน" class="select-fnz">
                                                                                    คำสั่งภายในโรงเรียน
                                                                                </option>
                                                                                <option value="คำสั่งเทศบาล" class="select-fnz">
                                                                                    คำสั่งเทศบาล
                                                                                </option>
                                                                                <option value="คำสั่งต้นสังกัด/เขต" class="select-fnz">
                                                                                    คำสั่งต้นสังกัด/เขต
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">เรื่อง</label>
                                                                            <input type="text" class="form-control" id="PrDepart_Edit${count}"
                                                                                name="PrDepart_Edit" value="${row.PrDepart}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">เลขที่คำสั่ง</label>
                                                                            <input type="text" class="form-control" id="Prsubj_Edit${count}"
                                                                                name="Prsubj_Edit" value="${row.Prsubj}" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">วันที่ออกคำสั่ง</label>
                                                                            <input type="date" class="form-control" id="Prdate_Edit${count}"
                                                                                name="Prdate_Edit" value="${row.Prdate}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">ชื่อผู้ที่ได้รับหมอบหมาย</label>
                                                                            <select class="form-select"  id="PrNamete_Edit${count}" name="PrNamete_Edit" onclick="removeOption_AssignmentSystem()" disabled>
                                                                                <option class="select-fnz" value="${row.PrNamete}">${row.PrNamete}</option>
                                                                                <?php 
                                                                                foreach ($FullName as $row) {
                                                                                ?>
                                                                                <option class="select-fnz" value="<?= $row->FullName ?>">
                                                                                    <?= $row->FullName ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">เพิ่มเติมชื่อผู้ที่ได้รับหมอบหมาย</label>
                                                                            <input type="text" class="form-control" id="TeaAll_Edit${count}"
                                                                                name="TeaAll_Edit" value="${row.TeaAll}" readonly>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-2  fw-bold"
                                                                                style="color: black;font-size: 25px;">หมายเหตุ</label>
                                                                            <input type="text" class="form-control" id="Prother_Edit${count}"
                                                                                name="Prother_Edit" value="${row.Prother}" readonly>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                                <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                <a href="<?= site_url('User_Controller/AssignmentSystem/export/') ?>${row.IdAt}"><input class="form-control" type="text" id="FileNameEdit${count}" name="FileNameEdit" value="${row.FileNm !== null ? row.FileNm : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                                            </div>
                                                                            <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                                <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                <input class="form-control" type="file" id="FileNm_Edit${count}" name="FileNm_Edit" value="">
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
                                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit_AssignmentSystem(${count}, this)">แก้ไข</button>
                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateAssignmentSystem(${row.IdAt}, ${count})">บันทึก</button>
                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="Delete_AssignmentSystem('${row.IdAt}')">ลบ</button></td>
                            <td><a href="<?= site_url('User_Controller/AssignmentSystem/Export_Data/')?>${row.IdAt}" class="btn btn-primary fw-bold fs-4">ส่งออก</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

$('#InsertAssignmentSystem').submit(function(e) {
    e.preventDefault();
    InsertAssignmentSystem();
});

function InsertAssignmentSystem() {
    let EdYear = $('#EdYear').val();
    let PrType = $('#PrType').val();
    let PrDepart = $('#PrDepart').val();
    let Prsubj = $('#Prsubj').val();
    let Prdate = $('#Prdate').val();
    let PrNamete = $('#PrNamete').val();
    let TeaAll = $('#TeaAll').val();
    let Prother = $('#Prother').val();
    let Pr_id = $('#Pr_id').val();
    let FileNm = $('#FileNm')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('PrType', PrType);
    formData.append('PrDepart', PrDepart);
    formData.append('Prsubj', Prsubj);
    formData.append('Prdate', Prdate);
    formData.append('PrNamete', PrNamete);
    formData.append('TeaAll', TeaAll);
    formData.append('Prother', Prother);
    formData.append('Pr_id', Pr_id);
    formData.append('FileNm', FileNm); 

    $.ajax({
        url: "<?= site_url('User_Controller/AssignmentSystem/Insert_AssignmentSystem') ?>",
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

function UpdateAssignmentSystem(IdAt, modalCount) {
    let EdYear = $(`#EdYear_Edit${modalCount}`).val();
    let PrType = $(`#PrType_Edit${modalCount}`).val();
    let PrDepart = $(`#PrDepart_Edit${modalCount}`).val();
    let Prsubj = $(`#Prsubj_Edit${modalCount}`).val();
    let Prdate = $(`#Prdate_Edit${modalCount}`).val();
    let PrNamete = $(`#PrNamete_Edit${modalCount}`).val();
    let TeaAll = $(`#TeaAll_Edit${modalCount}`).val();
    let Prother = $(`#Prother_Edit${modalCount}`).val();
    let Pr_id = $(`#Pr_id_Edit${modalCount}`).val();
    let FileNm = $(`#FileNm_Edit${modalCount}`)[0].files[0];
    
    let formData = new FormData();
    formData.append('IdAt', IdAt);
    formData.append('EdYear', EdYear);
    formData.append('PrType', PrType);
    formData.append('PrDepart', PrDepart);
    formData.append('Prsubj', Prsubj);
    formData.append('Prdate', Prdate);
    formData.append('PrNamete', PrNamete);
    formData.append('TeaAll', TeaAll);
    formData.append('Prother', Prother);
    formData.append('Pr_id', Pr_id);
    formData.append('FileNm', FileNm);

    $.ajax({
        url: "<?= site_url('User_Controller/AssignmentSystem/update_AssignmentSystem') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#EditModal${modalCount}`).modal('hide');
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

function Delete_AssignmentSystem(IdAt) {
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
                url: "<?= site_url('User_Controller/AssignmentSystem/delete_AssignmentSystem') ?>",
                type: 'POST',
                data: {
                    IdAt: IdAt
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

function toggleEdit_AssignmentSystem(count, button) {
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
    $("#EdYear_Edit" + count).prop("disabled", false);
    $("#PrType_Edit" + count).prop("disabled", false);
    $("#PrDepart_Edit" + count).prop("readonly", false);
    $("#Prsubj_Edit" + count).prop("readonly", false);
    $("#Prdate_Edit" + count).prop("readonly", false);
    $("#PrNamete_Edit" + count).prop("disabled", false);
    $("#TeaAll_Edit" + count).prop("readonly", false);
    $("#Prother_Edit" + count).prop("readonly", false);
    $("#Pr_id_Edit" + count).prop("readonly", false);
    $("#FileNm_Edit" + count).prop("readonly", false);
});

function removeOption_AssignmentSystem() {
    $("select[name='EdYear_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PrType_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PrNamete_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>