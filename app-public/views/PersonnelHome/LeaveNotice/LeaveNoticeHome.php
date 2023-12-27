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

.tbodyDiv2 {
    max-height: clamp(5em, 60vh, 750px);
    margin-top: 10px;
    overflow: auto;
}
</style>
<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PersonnelHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">การแจ้งลา</label>
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
                                        <div class="col-md-2 mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="fw-bold" style="font-size: 26px;">ปีการศึกษา</h4>
                                                    <select class="form-select" id="Year">
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
                                                    <h4 class="fw-bold mt-2" style="font-size: 26px;">ประเภทการลา</h4>
                                                    <select class="form-select" id="Absent">
                                                        <option class="select-fnz" value=""></option>
                                                        <option value="ลาป่วย" class="select-fnz">ลาป่วย</option>
                                                        <option value="ลากิจ" class="select-fnz">ลากิจ</option>
                                                        <option value="ลาคลอดบุตร" class="select-fnz">ลาคลอดบุตร
                                                        </option>
                                                        <option value="ลาอุปสมบท" class="select-fnz">ลาอุปสมบท</option>
                                                        <option value="มาสาย" class="select-fnz">มาสาย</option>
                                                        <option value="ขาด" class="select-fnz">ขาด</option>
                                                        <option value="ลาพักผ่อน" class="select-fnz">ลาพักผ่อน</option>
                                                        <option value="ลาศึกษาต่อ" class="select-fnz">ลาศึกษาต่อ
                                                        </option>
                                                        <option value="ไปราชการ" class="select-fnz">ไปราชการ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <!-- **** Modal **** -->
                                                    <div class="modal fade" id="ModalAdd">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            <form action="" method="POST" id="InsertLeaveNotice">
                                                                <div class="modal-body">
                                                                    <div class="tab">
                                                                        <h5 class="card-title fw-bold"
                                                                            style="color: #18409e;font-size: 32px;">
                                                                            เพิ่มข้อมูลการลา</h5>
                                                                    </div>
                                                                    <div id="modal-setting-7" class="tabcontent">
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ชื่อ
                                                                                        - นามสกุล</label>
                                                                                <select class="form-select" id="FullName" name="FullName">
                                                                                    <option class="select-fnz"> </option>
                                                                                    <?php 
                                                                                        foreach ($FullName as $row) {
                                                                                    ?>
                                                                                    <option class="select-fnz" value="<?= $row->IDCard ?>">
                                                                                        <?= $row->FullName ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold"
                                                                                        style="color: black;font-size: 25px;">เลขบัตรประชาชน</label>
                                                                                    <input type="text" class="form-control" id="IDCard"
                                                                                        name="IDCard" value="" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ตำแหน่ง</label>
                                                                                    <input type="text" class="form-control" id="PosName"
                                                                                        name="PosName" value="" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1  fw-bold"
                                                                                        style="color: black;font-size: 25px;">ประเภทการลา</label>
                                                                                    <select class="form-select" id="TypeLeave" name="TypeLeave">
                                                                                        <option class="select-fnz"> </option>
                                                                                        <?php 
                                                                                            foreach ($type_leave as $row) {
                                                                                        ?>
                                                                                        <option class="select-fnz" value="<?= $row->id ?>">
                                                                                            <?= $row->type_leave ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold"
                                                                                        style="color: black;font-size: 25px;">เริ่มวันที่</label>
                                                                                    <input type="date"
                                                                                        class="form-control" id="StartDate" name="StartDate" 
                                                                                        value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ถึงวันที่</label>
                                                                                    <input type="date"
                                                                                        class="form-control" id="EndDate" name="EndDate" 
                                                                                        value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold"
                                                                                        style="color: black;font-size: 25px;">แนบไฟล์</label>
                                                                                    <input class="form-control" type="file" id="FileName" name="FileName" value="">
                                                                                </div>
                                                                            </div>
                                                                            <input class="form-control" type="text" id="Status" name="Status" value="รออนุมัติ" hidden>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1  fw-bold"
                                                                                        style="color: black;font-size: 25px;">หมายเหตุ</label>
                                                                                    <input type="textarea" class="form-control" id="Remark"
                                                                                        name="Remark" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer mt-3">
                                                                        <button type="sudmit"
                                                                            class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                        <button type="button"
                                                                            class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->

                                                    <a href="#" class="btn btn-success fw-bold fs-4 w-100"
                                                        data-bs-toggle="modal" data-bs-target="#ModalAdd">
                                                        + เพิ่มข้อมูลการลา</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col float-end">
                                                <a href="#" class="btn btn-success fw-bold fs-4 m-2"
                                                    data-bs-toggle="modal" data-bs-target="#ModalAbsentType">
                                                    + เพิ่มประเภทการลา</a>
                                                <!-- **** Modal **** -->
                                                <div class="modal fade" id="ModalAbsentType">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div id="modal-setting-7" class="tabcontent">
                                                                    <div class="container">
                                                                        <form action="" method="POST" id="InsertAbsentType" role="form">
                                                                            <div class="row mt-2">
                                                                                <div class="col-md-5">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1  fw-bold"
                                                                                        style="color: black;font-size: 25px;">ประเภทการลา</label>
                                                                                    <input type="text" class="form-control"
                                                                                        id="Type" name="Type" value="">
                                                                                </div>
                                                                                <div class="col-md-7 mt-4">
                                                                                    <div class="float-end mt-4">
                                                                                        <button type="sudmit"
                                                                                            class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary fw-bold fs-4"
                                                                                            data-bs-dismiss="modal">ยกเลิก</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <table
                                                                            class="table table-striped mt-2 table-bordered" id="tbl_AbsentType">
                                                                            <thead class="text-center ">
                                                                                <tr>
                                                                                    <th width="150px">
                                                                                        <h3 class="fw-bold">ลำดับ</h3>
                                                                                    </th>
                                                                                    <th>
                                                                                        <h3 class="fw-bold">
                                                                                            ประเภทการลา
                                                                                        </h3>
                                                                                    </th>
                                                                                    <th width="100px">
                                                                                        <h3 class="fw-bold">
                                                                                            ลบ</h3>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="text-center ">
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                                <a href="#" class="btn btn-primary fw-bold fs-4"
                                                    data-bs-toggle="modal" data-bs-target="#ModalExport">
                                                    ส่งออกรายงาน</a>

                                                <!-- **** Modal **** -->
                                                <div class="modal fade" id="ModalExport">
                                                    <div class="modal-dialog" style="max-width: 1500px">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div id="modal-setting-7" class="tabcontent">
                                                                    <div class="container" style="max-width: 1400px">
                                                                        <div class="tab">
                                                                            <h5 class="card-title fw-bold"
                                                                                style="color: #18409e;font-size: 32px;">
                                                                                ออกรายงาน รายเดือน รายปี</h5>
                                                                        </div>
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <form method="post" action="<?= site_url('LeaveNotice/exportExcel') ?>">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="row">
                                                                                        <div class="col mt-1">
                                                                                            <input class="form-check-input" type="radio" name="Check" id="MonthRadio">
                                                                                            <label class="form-check-label fw-bold">รายเดือน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col mt-4">
                                                                                            <input class="form-check-input" type="radio" name="Check" id="PosNameRadio">
                                                                                            <label class="form-check-label fw-bold">ตำแหน่ง</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    <div class="row" id="DateSection">
                                                                                        <div class="col">
                                                                                            <label for="startDate" class="col fw-bold" style="color: black; font-size: 25px; display: inline;">ตั้งแต่วันที่</label>
                                                                                            <input type="date" class="form-control w-25" id="EStartDate" name="EStartDate" value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>" style="display: inline;">
                                                                                            <label for="endDate" class="col fw-bold" style="color: black; font-size: 25px; display: inline;">ถึงวันที่</label>
                                                                                            <input type="date" class="form-control w-25" id="EEndDate" name="EEndDate" value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>" style="display: inline;">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <select class="form-select w-25" id="MonthSelect"  name="MonthSelect"  style="display: none;">
                                                                                                <option class="select-fnz" value="">----- เลือกเดือน -----</option>
                                                                                                <option value="01" class="select-fnz">มกราคม</option>
                                                                                                <option value="02" class="select-fnz">กุมภาพันธ์</option>
                                                                                                <option value="03" class="select-fnz">มีนาคม</option>
                                                                                                <option value="04" class="select-fnz">เมษายน</option>
                                                                                                <option value="05" class="select-fnz">พฤษภาคม</option>
                                                                                                <option value="06" class="select-fnz">มิถุนายน</option>
                                                                                                <option value="07" class="select-fnz">กรกฎาคม</option>
                                                                                                <option value="08" class="select-fnz">สิงหาคม</option>
                                                                                                <option value="09" class="select-fnz">กันยายน</option>
                                                                                                <option value="10" class="select-fnz">ตุลาคม</option>
                                                                                                <option value="11" class="select-fnz">พฤศจิกายน</option>
                                                                                                <option value="12" class="select-fnz">ธันวาคม</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col"> 
                                                                                            <select class="form-select w-50 mt-2"  id="PosNameSelect" name="PosNameSelect" onclick="removeOption_LeaveNotice()"  style="display: none;">
                                                                                                <option class="select-fnz" value="">----- เลือกตำแหน่ง -----</option>
                                                                                                <?php 
                                                                                                    foreach ($PosName as $row) {
                                                                                                ?>
                                                                                                <option class="select-fnz" value="<?= $row->PosName ?>">
                                                                                                    <?= $row->PosName ?></option>
                                                                                                <?php
                                                                                                    }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <div class="float-end">
                                                                                                <button type="submit" class="btn btn-primary fw-bold fs-4">ส่งออก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col tbodyDiv2">
                                                                                <table class="table table-striped mt-2 table-bordered"
                                                                                style="max-width: 1400px"  id="tbl_AbsentRecd">
                                                                                    <thead class="text-center ">
                                                                                        <tr>
                                                                                            <th>
                                                                                                <h4 class="fw-bold">ลำดับ</h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold">ชื่อ -
                                                                                                    นามสกุล</h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold">ตำแหน่ง</h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][0] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][1] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][6] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][2] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][9] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][3] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][10] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][7] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][11] ?></h4>
                                                                                            </th>
                                                                                            <th>
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][5] ?></h4>
                                                                                            </th>
                                                                                            <th width="55px">
                                                                                                <h4 class="fw-bold"><?= $this->data['type_leaves'][12] ?></h4>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody class="text-center ">
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col" id="tbcount2">

                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="float-end text-danger fw-bold">
                                                                                    หมายเหตุการแสดงข้อมูลตามตาราง : ครั้ง / วัน
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->

                                            </div>
                                            <div class="col-md-12 tbodyDiv">
                                                <table class="table table-striped mt-2 table-bordered"
                                                    id="tbl_LeaveNotice">
                                                    <thead class="text-center ">
                                                        <tr>
                                                            <th width="80px">
                                                                <h3 class="fw-bold">ลำดับ</h3>
                                                            </th>
                                                            <th >
                                                                <h3 class="fw-bold">
                                                                    ชื่อ - นามสกุล
                                                                </h3>
                                                            </th>
                                                            <th >
                                                                <h3 class="fw-bold">
                                                                    ตำแหน่ง</h3>
                                                            </th>
                                                            <th >
                                                                <h3 class="fw-bold">
                                                                    ประเภทการลา</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    ตั้งแต่วันที่</h3>
                                                            </th>
                                                            <th >
                                                                <h3 class="fw-bold">
                                                                    ถึงวันที่</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    รวม</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    รายละเอียด</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    เอกสารแนบ</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    สถานะการอนุมัติ
                                                                </h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    สถานะ
                                                                </h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    แก้ไข
                                                                </h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">
                                                                    ลบ
                                                                </h3>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center ">
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
</div>
<script>
$(document).ready(function() {
    get_LeaveNotice();
    get_AbsentType();
    get_AbsentRecd();
});

$('#Year').change(get_LeaveNotice);
$('#Absent').change(get_LeaveNotice);


function get_LeaveNotice() {
    let Year = $('#Year').val();
    let Absent = $('#Absent').val();
    let table_body = $('#tbl_LeaveNotice tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('LeaveNotice/fech_LeaveNotice') ?>",
        method: "POST",
        data: {
            Year: Year,
            Absent: Absent
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="12" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td align="left">${row.FullName || ''}</td>
                            <td>${row.PosName || ''}</td>
                            <td>${row.type_leave || ''}</td>
                            <td>${new Date(row.dtp1).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${new Date(row.dtp2).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.amount || ''}</td>
                            <td>${row.remark || ''}</td>
                            <td><a href="<?= site_url('LeaveNotice/export/') ?>${row.id}">${row.FileName || ''}</a></td>
                            <td>${row.status || ''}</td>
                            <td><a href="#" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#ModalStatus${count}">อนุมัติ</a>
                                <div class="modal fade" id="ModalStatus${count}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left">
                                                <div class="tab">
                                                    <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> แก้ไขสถานะการลา</h5>
                                                </div>
                                                <div id="modal-setting-7" class="tabcontent">
                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ชื่อ
                                                                                        - นามสกุล</label>
                                                                                    <input type="text" class="form-control" id="FullNameEdit${count}"
                                                                                        name="FullNameEdit" value="${row.FullName}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">เลขบัตรประชาชน</label>
                                                                                    <input type="text" class="form-control" id="IDCardEdit${count}"
                                                                                        name="IDCardEdit" value="${row.CID}" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ตำแหน่ง</label>
                                                                                    <input type="text" class="form-control" id="PosNameEdit${count}"
                                                                                        name="PosNameEdit" value="${row.PosName}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2  fw-bold"
                                                                                        style="color: black;font-size: 25px;">ประเภทการลา</label>
                                                                                    <select class="form-select" id="TypeLeaveEdit${count}" name="TypeLeaveEdit" onclick="removeOption_LeaveNotice()" disabled>
                                                                                        <option class="select-fnz" value="${row.idtypeleave}">${row.type_leave}</option>
                                                                                        <?php 
                                                                                            foreach ($type_leave as $row) {
                                                                                        ?>
                                                                                        <option class="select-fnz" value="<?= $row->id ?>">
                                                                                            <?= $row->type_leave ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">เริ่มวันที่</label>
                                                                                    <input type="date"
                                                                                        class="form-control" id="StartDateEdit${count}" name="StartDateEdit" 
                                                                                        value="${row.dtp1}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ถึงวันที่</label>
                                                                                    <input type="date"
                                                                                        class="form-control" id="EndDateEdit${count}" name="EndDateEdit" 
                                                                                        value="${row.dtp2}" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2  fw-bold"
                                                                                        style="color: black;font-size: 25px;">หมายเหตุ</label>
                                                                                    <input type="textarea" class="form-control" id="RemarkEdit${count}"
                                                                                        name="RemarkEdit" value="${row.remark}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="" class="fw-bold mt-2">สถานะ</label>
                                                                                    <select class="form-select" id="StatusEdit${count}" name="StatusEdit" onclick="removeOption_LeaveNotice()">
                                                                                        <option class="select-fnz" value="${row.Status}">${row.Status}</option>
                                                                                        <option value="รออนุมัติ" class="select-fnz">รออนุมัติ</option>
                                                                                        <option value="อนุมัติ" class="select-fnz">อนุมัติ</option>
                                                                                    </select>
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
                                                    <button type="sudmit" class="btn btn-primary fw-bold fs-4" onclick="UpdateStatus(${row.id}, ${count})">บันทึก</button>
                                                    <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#ModalEdit${count}">แก้ไข</a>
                                <div class="modal fade" id="ModalEdit${count}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left">
                                                <div class="tab">
                                                    <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> แก้ไขข้อมูลการลา</h5>
                                                </div>
                                                <div id="modal-setting-7" class="tabcontent">
                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ชื่อ
                                                                                        - นามสกุล</label>
                                                                                    <input type="text" class="form-control" id="FullName_Edit${count}"
                                                                                        name="FullName_Edit" value="${row.FullName}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">เลขบัตรประชาชน</label>
                                                                                    <input type="text" class="form-control" id="IDCard_Edit${count}"
                                                                                        name="IDCard_Edit" value="${row.CID}" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ตำแหน่ง</label>
                                                                                    <input type="text" class="form-control" id="PosName_Edit${count}"
                                                                                        name="PosName_Edit" value="${row.PosName}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2  fw-bold"
                                                                                        style="color: black;font-size: 25px;">ประเภทการลา</label>
                                                                                    <select class="form-select" id="TypeLeave_Edit${count}" name="TypeLeave_Edit" onclick="removeOption_LeaveNotice()" disabled>
                                                                                        <option class="select-fnz" value="${row.idtypeleave}">${row.type_leave}</option>
                                                                                        <?php 
                                                                                            foreach ($type_leave as $row) {
                                                                                        ?>
                                                                                        <option class="select-fnz" value="<?= $row->id ?>">
                                                                                            <?= $row->type_leave ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">เริ่มวันที่</label>
                                                                                    <input type="date"
                                                                                        class="form-control" id="StartDate_Edit${count}" name="StartDate_Edit" 
                                                                                        value="${row.dtp1}" readonly>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold"
                                                                                        style="color: black;font-size: 25px;">ถึงวันที่</label>
                                                                                    <input type="date"
                                                                                        class="form-control" id="EndDate_Edit${count}" name="EndDate_Edit" 
                                                                                        value="${row.dtp2}" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="col">
                                                                                        <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                                            <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                            <a href="<?= site_url('LeaveNotice/export/') ?>${row.id}"><input class="form-control" type="text" id="Ref_Edit${count}" name="Ref_Edit" value="${row.FileName !== null ? row.FileName : ''}" style="cursor: pointer; color: blue;" disabled></a>
                                                                                        </div>
                                                                                        <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                                            <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                            <input class="form-control" type="file" id="FileName_Edit${count}" name="FileName_Edit">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2  fw-bold"
                                                                                        style="color: black;font-size: 25px;">หมายเหตุ</label>
                                                                                    <input type="textarea" class="form-control" id="Remark_Edit${count}"
                                                                                        name="Remark_Edit" value="${row.remark}" readonly>
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
                                                    <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit_LeaveNotice(${count}, this)">แก้ไข</button>
                                                    <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateLeaveNotice(${row.id}, ${count})">บันทึก</button>
                                                    <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="Delete_LeaveNotice('${row.id}')">ลบ</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

$('#FullName').change(fetch_IDCard);

function fetch_IDCard() {
    let IDCard = $('#FullName').val();

    $.ajax({
        url: "<?= site_url('LeaveNotice/fetch_IDCard') ?>",
        method: "POST",
        data: {
            IDCard: IDCard
        },
        success: function(data) { 
            let parsedData = JSON.parse(data);
            $('#IDCard').val(parsedData.IDCard !== '' ? parsedData.IDCard : '-');
            $('#PosName').val(parsedData.PosName !== '' ? parsedData.PosName : '-');
        }
    });
}

$('#InsertLeaveNotice').submit(function(e) {
    e.preventDefault();
    InsertLeaveNotice();
});

function InsertLeaveNotice() {
    let IDCard = $('#IDCard').val();
    let TypeLeave = $('#TypeLeave').val();
    let StartDate = $('#StartDate').val();
    let EndDate = $('#EndDate').val();
    let FileName = $('#FileName')[0].files[0];
    let Remark = $('#Remark').val();
    let Status = $('#Status').val();
    
    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('TypeLeave', TypeLeave);
    formData.append('StartDate', StartDate);
    formData.append('EndDate', EndDate);
    formData.append('FileName', FileName);
    formData.append('Remark', Remark);
    formData.append('Status', Status);

    $.ajax({
        url: "<?= site_url('LeaveNotice/Insert_LeaveNotice') ?>",
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

function UpdateLeaveNotice(id, modalCount) {
    let IDCard = $(`#IDCard_Edit${modalCount}`).val();
    let TypeLeave = $(`#TypeLeave_Edit${modalCount}`).val();
    let StartDate = $(`#StartDate_Edit${modalCount}`).val();
    let EndDate = $(`#EndDate_Edit${modalCount}`).val();
    let Remark = $(`#Remark_Edit${modalCount}`).val();
    let FileName = $(`#FileName_Edit${modalCount}`)[0].files[0];

    let formData = new FormData();
    formData.append('id', id);
    formData.append('IDCard', IDCard);
    formData.append('TypeLeave', TypeLeave);
    formData.append('StartDate', StartDate);
    formData.append('EndDate', EndDate);
    formData.append('FileName', FileName);
    formData.append('Remark', Remark);

    $.ajax({
        url: "<?= site_url('LeaveNotice/update_LeaveNotice') ?>",
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

function UpdateStatus(id, modalCount) {
    let Status = $(`#StatusEdit${modalCount}`).val();

    let formData = new FormData();
    formData.append('id', id);
    formData.append('Status', Status);

    $.ajax({
        url: "<?= site_url('LeaveNotice/update_Status') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#ModalStatus${modalCount}`).modal('hide');
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

function Delete_LeaveNotice(id) {
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
        if (result.value) { console.log(id);
            $.ajax({
                url: "<?= site_url('LeaveNotice/delete_LeaveNotice') ?>",
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

function toggleEdit_LeaveNotice(count, button) {
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
    $("#TypeLeave_Edit" + count).prop("disabled", false);
    $("#StartDate_Edit" + count).prop("readonly", false);
    $("#EndDate_Edit" + count).prop("readonly", false);
    $("#Remark_Edit" + count).prop("readonly", false);
});

function removeOption_LeaveNotice() {
    $("select[name='TypeLeave_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='StatusEdit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PosNameSelect'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}

function get_AbsentType() {
    let table_body = $('#tbl_AbsentType tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('LeaveNotice/fech_AbsentType') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="4" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr> 
                            <td>${count}</td>
                            <td align="left">${row.type_leave || ''}</td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="Delete_AbsentType('${row.id}')">ลบ</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

$('#InsertAbsentType').submit(function(e) {
    e.preventDefault();
    InsertAbsentType();
});

function InsertAbsentType() {
    let Type = $('#Type').val();

    let formData = new FormData();
    formData.append('Type', Type);

    $.ajax({
        url: "<?= site_url('LeaveNotice/Insert_AbsentType') ?>",
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

function Delete_AbsentType(id) {
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
        if (result.value) { console.log(id);
            $.ajax({
                url: "<?= site_url('LeaveNotice/delete_AbsentType') ?>",
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

$('#EStartDate').change(get_AbsentRecd);
$('#EEndDate').change(get_AbsentRecd);
$('#MonthSelect').change(get_AbsentRecd);
$('#PosNameSelect').change(get_AbsentRecd);

function get_AbsentRecd() {
    let EStartDate = $('#EStartDate').val();
    let EEndDate = $('#EEndDate').val();
    let MonthSelect = $('#MonthSelect').val();
    let PosNameSelect = $('#PosNameSelect').val();
    let table_body = $('#tbl_AbsentRecd tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('LeaveNotice/fech_AbsentRecd') ?>",
        method: "POST",
        data: {
            EStartDate: EStartDate,
            EEndDate: EEndDate,
            MonthSelect: MonthSelect,
            PosNameSelect: PosNameSelect
        },
        dataType: 'json',
        success: function(data) { console.log(data);
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="4" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.FullName || ''}</td>
                            <td>${row.PosName || ''}</td>
                            <td>${row.Sick === '0/0' ? '' : row.Sick}</td>
                            <td>${row.Business === '0/0' ? '' : row.Business}</td>
                            <td>${row.TVacation === '0/0' ? '' : row.TVacation}</td>
                            <td>${row.Maternity === '0/0' ? '' : row.Maternity}</td>
                            <td>${row.Spouse === '0/0' ? '' : row.Spouse}</td>
                            <td>${row.Ordination === '0/0' ? '' : row.Ordination}</td>
                            <td>${row.Military === '0/0' ? '' : row.Military}</td>
                            <td>${row.Study === '0/0' ? '' : row.Study}</td>
                            <td>${row.International === '0/0' ? '' : row.International}</td>
                            <td>${row.Absent === '0/0' ? '' : row.Absent}</td>
                            <td>${row.Other === '0/0' ? '' : row.Other}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount2').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

$('#MonthRadio').click(function() {
    $('#PosNameSelect').hide();
    $('#DateSection').hide();
    $('#MonthSelect').show();

    $('#PosNameSelect').val('');
    $('#EStartDate').val('');
    $('#EEndDate').val('');
});
$('#PosNameRadio').click(function() {
    $('#MonthSelect').hide();
    $('#PosNameSelect').show();
    $('#DateSection').show();

    $('#MonthSelect').val('');
    $('#EStartDate').val('<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>');
    $('#EEndDate').val('<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>');
});
</script>