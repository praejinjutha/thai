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
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PersonnelInformation' : 'User_Controller/PersonnelHome_User') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
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
                                                    <input type="text" id="NationalID" name="NationalID" value="<?= $this->data['IDCard'] ?>" hidden>
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
                                                        <option class="select-fnz"> </option>
                                                        <?php 
                                                            foreach ($type_leave as $row) {
                                                        ?>
                                                            <option class="select-fnz" value="<?= $row->type_leave ?>"><?= $row->type_leave ?></option>
                                                        <?php
                                                            }
                                                        ?>
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
                                                                                    <input type="text" class="form-control" id="Full" name="Full" value="<?= $this->data["FullName"] ?>" readonly>
                                                                                    <input type="text" class="form-control" id="FullName" name="FullName" value="<?= $this->data["IDCard"] ?>" hidden>
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
                                            <div class="col-md-12 tbodyDiv">
                                                <table class="table table-striped mt-2 table-bordered"
                                                    id="tbl_LeaveNotice">
                                                    <thead class="text-center ">
                                                        <tr>
                                                            <th width="80px">
                                                                <h3 class="fw-bold">ลำดับ</h3>
                                                            </th>
                                                            <th width="300px">
                                                                <h3 class="fw-bold">
                                                                ประเภทการลา
                                                                </h3>
                                                            </th>
                                                            <th width="200px">
                                                                <h3 class="fw-bold">
                                                                ตั้งแต่วันที่</h3>
                                                            </th>
                                                            <th width="200px">
                                                                <h3 class="fw-bold">
                                                                ถึงวันที่</h3>
                                                            </th>
                                                            <th width="100px">
                                                                <h3 class="fw-bold">
                                                                รวม</h3>
                                                            </th>
                                                            <th >
                                                                <h3 class="fw-bold">
                                                                รายละเอียด</h3>
                                                            </th>
                                                            <th width="150px">
                                                                <h3 class="fw-bold">
                                                                สถานะ</h3>
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
    fetch_IDCard();
});

$('#Year').change(get_LeaveNotice);
$('#Absent').change(get_LeaveNotice);


function get_LeaveNotice() {
    let NationalID = $('#NationalID').val();
    let Year = $('#Year').val();
    let Absent = $('#Absent').val();
    let table_body = $('#tbl_LeaveNotice tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('User_Controller/LeaveNotice/fetch_LeaveNotices') ?>",
        method: "POST",
        data: {
            NationalID: NationalID,
            Year: Year,
            Absent: Absent
        },
        dataType: 'json',
        success: function(data) { 
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="7" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.type_leave || ''}</td>
                            <td>${new Date(row.dtp1).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${new Date(row.dtp2).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.amount || ''}</td>
                            <td>${row.remark || ''}</td>
                            <td>${row.status || ''}</td>
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
console.log(IDCard);
    $.ajax({
        url: "<?= site_url('User_Controller/LeaveNotice/fetch_IDCard') ?>",
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
        url: "<?= site_url('User_Controller/LeaveNotice/Insert_LeaveNotice') ?>",
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
</script>