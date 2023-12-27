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
                <label class="mt-1">บันทึกข้อมูลการพิจารณาความดีความชอบย้อนหลัง 5 ปี</label>
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
                                                   
                                        <!-- **** Modal **** -->
                                        <div class="modal fade" id="myModal" tabindex="-1"
                                            aria-labelledby="myModalLabel6" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="" method="POST" id="InsertConsiderFiveyears"
                                                        role="form">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มข้อมูลรายละเอียดการพิจารณาความดีความชอบย้อนหลัง
                                                                    5
                                                                    ปี</h5>
                                                            </div>

                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">ชื่อ
                                                                                -
                                                                                นามสกุล</label>
                                                                            <select class="form-select" id="SFullname"
                                                                                name="SFullname" disabled>
                                                                                <option class="select-fnz" value="<?= $this->data["IDCard"] ?>"><?= $this->data["FullName"] ?></option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">เลขบัตรประชาชน</label>
                                                                            <input type="text" class="form-control"
                                                                                id="IDCard" name="IDCard" value="" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">กระทรวง</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Ministry" name="Ministry" value="" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">กรม</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Department" name="Department"
                                                                                value="" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                            <select class="form-select" id="Year"
                                                                                name="Year">
                                                                                <option value="" class="select-fnz">
                                                                                </option>
                                                                                <?php
                                                                                foreach ($loopYear as $row => $Year) {
                                                                            ?>
                                                                                <option value="<?= $Year ?>"
                                                                                    class="select-fnz"><?= $Year ?>
                                                                                </option>
                                                                                <?php
                                                                                }
                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">ตำแหน่ง</label>
                                                                            <select class="form-select" name="PosName"
                                                                                id="PosName"
                                                                                onclick="removeOption_ConFiveyears()">
                                                                                <option value="" class="select-fnz">
                                                                                </option>
                                                                                <?php 
                                                                                foreach ($PosName as $row) {
                                                                            ?>
                                                                                <option class="select-fnz"
                                                                                    value="<?= $row->PosName ?>">
                                                                                    <?= $row->PosName ?></option>
                                                                                <?php
                                                                                }
                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">เลขที่ตำแหน่ง</label>
                                                                            <input type="text" class="form-control"
                                                                                id="PosNumber" name="PosNumber"
                                                                                value="">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">วัน/เดือน/ปี</label>
                                                                            <input type="date" class="form-control"
                                                                                id="Date" name="Date"
                                                                                value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">ระดับปัจจุบัน</label>
                                                                            <select class="form-select" name="PLevel"
                                                                                id="PLevel"
                                                                                onclick="removeOption_ConFiveyears()">
                                                                                <option value="" class="select-fnz">
                                                                                </option>
                                                                                <?php 
                                                                                foreach ($Level as $row) {
                                                                            ?>
                                                                                <option class="select-fnz"
                                                                                    value="<?= $row->Level ?>">
                                                                                    <?= $row->Level ?></option>
                                                                                <?php
                                                                                }
                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">อัตราเงินเดือนปัจจุบัน</label>
                                                                            <input type="text" class="form-control"
                                                                                id="CSalaryRate" name="CSalaryRate"
                                                                                value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">
                                                                                อัตราการเลื่อนขั้น</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ScrollRate" name="ScrollRate"
                                                                                value="">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">อัตราเงินเดือนใหม่</label>
                                                                            <input type="text" class="form-control"
                                                                                id="NSalaryRate" name="NSalaryRate"
                                                                                value="" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;font-size: 25px;">
                                                                                เอกสารอ้างอิง</label>
                                                                            <input class="form-control" type="file" id="Ref" name="Ref" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer mt-3">
                                                                <button type="sudmit"
                                                                    class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary fw-bold fs-4"
                                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- **** End Modal **** -->

                                        <div class="col-md-12">
                                                <a href="#" class="btn btn-success fw-bold fs-4 float-start"
                                                    data-bs-toggle="modal" data-bs-target="#myModal">+ เพิ่มข้อมูลรายละเอียดการพิจารณา</a>
                                        </div>
                                    </div>
                                    <input type="text" id="NationalID" name="NationalID" value="<?= $this->data["IDCard"] ?>" hidden> 
                                    <div class="row my-3">
                                        <div class="col md-auto tbodyDiv">
                                            <table class="table table-striped table-bordered"
                                                id="tbl_ConsiderFiveyears">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ลำดับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ปีการศึกษา</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">
                                                                ชื่อ-นามสกุล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ตำแหน่ง
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">วัน/เดือน/ปี
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">เลขที่ตำแหน่ง
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">ระดับ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">อัตราเงินเดือนปัจจุบัน
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">อัตราการเลื่อน
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">อัตราเงินเดือนใหม่
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">เอกสารอ้างอิง
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
</div>
<script>
$(document).ready(function() {
    get_ConsiderFiveyears();
    fetch_IDCard();
});

$('#Position').change(get_ConsiderFiveyears);
$('#Fullname').change(get_ConsiderFiveyears);

function get_ConsiderFiveyears() {
    let NationalID = $('#NationalID').val();
    let Position = $('#Position').val();
    let IDCard = $('#Fullname').val();
    let table_body = $('#tbl_ConsiderFiveyears tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('User_Controller/ConsiderFiveyears/fech_ConsiderFiveyears') ?>",
        method: "POST",
        data: {
            NationalID: NationalID,
            Position: Position,
            IDCard: IDCard
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="14" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.BudYear || ''}</td>
                            <td align="left">${row.FullName || ''}</td>
                            <td>${row.Detail || ''}</td>
                            <td>${new Date(row.dtp).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.PoNo || ''}</td>
                            <td>${row.PLevel || ''}</td>
                            <td align="right">${(row.Salary || 0).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                            <td>${row.Degree || ''}</td>
                            <td align="right">${(row.NSalary || 0).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                            <td><a href="<?= site_url('User_Controller/ConsiderFiveyears/export/') ?>${row.id}">${row.Ref || ''}</a></td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#myModal${count}" onclick="fetch_IDCardEdit(${count});">แก้ไข</a>
                                <div class="modal fade" id="myModal${count}" >
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body" style="text-align: left">
                                                        <div class="tab">
                                                            <h5 class="card-title fw-bold"
                                                                style="color: #18409e;font-size: 32px;">
                                                                เพิ่มข้อมูลรายละเอียดการพิจารณาความดีความชอบย้อนหลัง 5
                                                                ปี</h5>
                                                        </div>
                                                        
                                                        <div id="modal-setting-7" class="tabcontent">
                                                            <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">ชื่อ -
                                                                            นามสกุล</label>
                                                                        <select class="form-select" id="Fullname_Edit${count}" name="Fullname_Edit" disabled>
                                                                            <option class="select-fnz" value="${row.IDCard}">${row.FullName}</option>
                                                                            <?php 
                                                                                foreach ($FullName as $row) {
                                                                            ?>
                                                                                <option class="select-fnz" value="<?= $row->IDCard ?>"><?= $row->FullName ?></option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">เลขบัตรประชาชน</label>
                                                                        <input type="text" class="form-control" id="IDCard_Edit${count}"
                                                                            name="IDCard_Edit" value="${row.IDCard}" onchange="SubjectCode_Edit(${count})" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">กระทรวง</label>
                                                                        <input type="text" class="form-control" id="Ministry_Edit${count}"
                                                                            name="Ministry_Edit" value="" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">กรม</label>
                                                                        <input type="text" class="form-control" id="Department_Edit${count}"
                                                                            name="Department_Edit" value="" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                        <select class="form-select" id="Year_Edit${count}" name="Year_Edit" onclick="removeOption_ConFiveyears()" disabled>
                                                                            <option value="${row.BudYear}" class="select-fnz">${row.BudYear}</option>
                                                                            <?php
                                                                                foreach ($loopYear as $row => $Year) {
                                                                            ?>
                                                                                <option value="<?= $Year ?>" class="select-fnz"><?= $Year ?></option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">ตำแหน่ง</label>
                                                                        <select class="form-select" name="PosName_Edit" id="PosName_Edit${count}" onclick="removeOption_ConFiveyears()" disabled>
                                                                        <option value="${row.Detail}" class="select-fnz">${row.Detail}</option>
                                                                            <?php 
                                                                                foreach ($PosName as $row) {
                                                                            ?>
                                                                                <option class="select-fnz"value="<?= $row->PosName ?>"><?= $row->PosName ?></option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">เลขที่ตำแหน่ง</label>
                                                                        <input type="text" class="form-control" id="PosNumber_Edit${count}"
                                                                            name="PosNumber_Edit" value="${row.PoNo}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">วัน/เดือน/ปี</label>
                                                                        <input type="date" class="form-control" id="Date_Edit${count}"
                                                                            name="Date_Edit" value="${row.dtp}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">ระดับปัจจุบัน</label>
                                                                        <select class="form-select"name="PLevel_Edit" id="PLevel_Edit${count}" onclick="removeOption_ConFiveyears()" disabled>
                                                                            <option value="${row.PLevel}" class="select-fnz">${row.PLevel}</option>
                                                                            <?php 
                                                                                foreach ($Level as $row) {
                                                                            ?>
                                                                                <option class="select-fnz"value="<?= $row->Level ?>"><?= $row->Level ?></option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">อัตราเงินเดือนปัจจุบัน</label>
                                                                        <input type="text" class="form-control" id="CSalaryRate_Edit${count}"
                                                                            name="CSalaryRate_Edit" value="${row.Salary}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">
                                                                            อัตราการเลื่อน</label>
                                                                        <input type="text" class="form-control" id="ScrollRate_Edit${count}"
                                                                            name="ScrollRate_Edit" value="${row.Degree}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-1  fw-bold"
                                                                            style="color: black;font-size: 25px;">อัตราเงินเดือนใหม่</label>
                                                                        <input type="text" class="form-control" id="NSalaryRate_Edit${count}"
                                                                            name="NSalaryRate_Edit" value="${row.NSalary}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="col">
                                                                            <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                                <label for="" class="fw-bold">เอกสารอ้างอิง</label>
                                                                                <a href="<?= site_url('User_Controller/ConsiderFiveyears/export/') ?>${row.id}"><input class="form-control" type="text" id="Ref_Edit${count}" name="Ref_Edit" value="${row.Ref !== null ? row.Ref : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                                            </div>
                                                                            <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                                <label for="" class="fw-bold">เอกสารอ้างอิง</label>
                                                                                <input class="form-control" type="file" id="Reference_Edit${count}" name="Reference_Edit">
                                                                            </div>
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
                                                            <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit_ConsiderFiveyears(${count}, this)">แก้ไข</button>
                                                            <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateConsiderFiveyears(${row.id}, ${count})">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="Delete_ConsiderFiveyears('${row.id}')">ลบ</button></td>
                            <td><a href="<?= site_url('User_Controller/ConsiderFiveyears/Export_Data/')?>${row.id}" class="btn btn-primary fw-bold fs-4">ส่งออก</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

function fetch_IDCard() {
    let IDCard = $('#SFullname').val();

    $.ajax({
        url: "<?= site_url('User_Controller/ConsiderFiveyears/fetch_IDCard') ?>",
        method: "POST",
        data: {
            IDCard: IDCard
        },
        success: function(data) { console.log(data);
            let parsedData = JSON.parse(data);
            $('#IDCard').val(parsedData.IDCard !== '' ? parsedData.IDCard : '-');
            $('#Ministry').val(parsedData.Ministry !== '' ? parsedData.Ministry : '-');
            $('#Department').val(parsedData.PZone !== '' ? parsedData.PZone : '-');
        }
    });
}


function fetch_IDCardEdit(count) {
    let IDCard = $('#IDCard_Edit' + count).val();

    $.ajax({
        url: "<?= site_url('User_Controller/ConsiderFiveyears/fetch_IDCardEdit') ?>",
        method: "POST",
        data: {
            IDCard: IDCard
        },
        success: function(data) {
            let Data = JSON.parse(data);
            $('#Ministry_Edit' + count).val(Data.Ministry || '-');
            $('#Department_Edit' + count).val(Data.PZone || '-');
        }
    });
}

$('#InsertConsiderFiveyears').submit(function(e) {
    e.preventDefault();
    InsertConsiderFiveyears();
});

function InsertConsiderFiveyears() {
    let IDCard = $('#IDCard').val();
    let Year = $('#Year').val();
    let PosName = $('#PosName').val();
    let PosNumber = $('#PosNumber').val();
    let Date = $('#Date').val();
    let PLevel = $('#PLevel').val();
    let CSalaryRate = $('#CSalaryRate').val();
    let ScrollRate = $('#ScrollRate').val();
    let NSalaryRate = $('#NSalaryRate').val();
    let Ref = $('#Ref')[0].files[0];
    
    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('Year', Year);
    formData.append('PosName', PosName);
    formData.append('PosNumber', PosNumber);
    formData.append('Date', Date);
    formData.append('PLevel', PLevel);
    formData.append('CSalaryRate', CSalaryRate);
    formData.append('ScrollRate', ScrollRate);
    formData.append('NSalaryRate', NSalaryRate);
    formData.append('Ref', Ref);

    $.ajax({
        url: "<?= site_url('User_Controller/ConsiderFiveyears/InsertConsiderFiveyears') ?>",
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

function UpdateConsiderFiveyears(id, modalCount) {
    let IDCard = $(`#IDCard_Edit${modalCount}`).val();
    let BudYear = $(`#Year_Edit${modalCount}`).val();
    let Detail = $(`#PosName_Edit${modalCount}`).val();
    let PoNo = $(`#PosNumber_Edit${modalCount}`).val();
    let dtp = $(`#Date_Edit${modalCount}`).val();
    let PLevel = $(`#PLevel_Edit${modalCount}`).val();
    let Salary = $(`#CSalaryRate_Edit${modalCount}`).val();
    let Degree = $(`#ScrollRate_Edit${modalCount}`).val();
    let NSalary = $(`#NSalaryRate_Edit${modalCount}`).val();
    let Ref = $(`#Reference_Edit${modalCount}`)[0].files[0];

    let formData = new FormData();
    formData.append('id', id);
    formData.append('IDCard', IDCard);
    formData.append('Ministry', Ministry);
    formData.append('Department', Department);
    formData.append('BudYear', BudYear);
    formData.append('Detail', Detail);
    formData.append('PoNo', PoNo);
    formData.append('dtp', dtp);
    formData.append('PLevel', PLevel);
    formData.append('Salary', Salary);
    formData.append('Degree', Degree);
    formData.append('NSalary', NSalary);
    formData.append('Ref', Ref);
    
    $.ajax({
        url: "<?= site_url('User_Controller/ConsiderFiveyears/update_ConsiderFiveyears') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#myModal${modalCount}`).modal('hide');
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

function Delete_ConsiderFiveyears(id) {
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
                url: "<?= site_url('User_Controller/ConsiderFiveyears/delete_ConsiderFiveyears') ?>",
                type: 'POST',
                data: {
                    id: id
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

function removeOption_ConFiveyears() {
    $("select[name='PosName'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PLevel'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Position'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Year_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PLevel_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}

const CSalaryRateInput = document.getElementById("CSalaryRate");
const ScrollRateInput = document.getElementById("ScrollRate");
const NSalaryRateInput = document.getElementById("NSalaryRate");

CSalaryRateInput.addEventListener("input", updateNSalaryRate);
ScrollRateInput.addEventListener("input", updateNSalaryRate);

function updateNSalaryRate() {
    const CSalaryRate = parseFloat(CSalaryRateInput.value);
    const ScrollRate = parseFloat(ScrollRateInput.value);

    if (!isNaN(CSalaryRate) && !isNaN(ScrollRate)) {
        const newSalary = CSalaryRate * (1 + ScrollRate / 100);
        NSalaryRateInput.value = newSalary.toFixed();
    } else {
        NSalaryRateInput.value = "";
    }
}

function toggleEdit_ConsiderFiveyears(count, button) {
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
    $("#Year_Edit" + count).prop("disabled", false);
    $("#PosNumber_Edit" + count).prop("readonly", false);
    $("#Date_Edit" + count).prop("readonly", false);
    $("#PLevel_Edit" + count).prop("disabled", false);
    $("#CSalaryRate_Edit" + count).prop("readonly", false);
    $("#step_Edit" + count).prop("disabled", false);
    $("#percent_Edit" + count).prop("disabled", false);
    $("#ScrollRate_Edit" + count).prop("readonly", false);
    $("#Reference_Edit" + count).prop("readonly", false);
});
</script>