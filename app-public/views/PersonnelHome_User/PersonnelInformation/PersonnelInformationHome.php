<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>
<style>
.tbodyDiv {
    max-height: clamp(5em, 110vh, 750px);
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
                <label class="mt-1">ข้อมูลบุคลากรรายบุคคล</label>
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
                                        <div class="col-md-2">
                                            <a href="<?= site_url('PersonnelInformation/add') ?>"
                                                class="btn btn-success mt-2 fw-bold w-100 fs-4"><i class="fa-solid fa-plus fs-5"></i>
                                                เพิ่มรายชื่อใหม่</a>
                                            <hr>
                                            <h4 class="form-check-label fw-bold"> สถานภาพการทำงาน </h4>
                                            <select class="form-select select-fnz" id="Status" required>
                                                <option value="" class="select-fnz">----- แสดงข้อมูลทั้งหมด -----</option>
                                                <?php 
                                                foreach($Status->result() as $row){
                                                ?>
                                                <option class="select-fnz" value="<?= $row->Status ?>">
                                                    <?= $row->Status ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label class="form-check-label fw-bold mt-2"> ตำแหน่ง </label>
                                            <select class="form-select" id="Position" name="Position" onclick="removeOption()">
                                                <option value="" class="select-fnz"> </option>
                                            </select>
                                        </div>
                                        <div class="col md-auto">
                                            <div class="table-responsive  tbodyDiv">
                                                <table class="table table-striped table-bordered mt-2" id="tbl_Personnel">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="20px">
                                                                <h3 class="fw-bold">ลำดับ</h3>
                                                            </th>
                                                            <th width="120px">
                                                                <h3 class="fw-bold">คำนำหน้า
                                                                </h3>
                                                            </th>
                                                            <th width="200px">
                                                                <h3 class="fw-bold">
                                                                    ชื่อ-นามสกุล</h3>
                                                            </th>
                                                            <th width="180px">
                                                                <h3 class="fw-bold">ตำแหน่ง
                                                                </h3>
                                                            </th>
                                                            <th width="180px">
                                                                <h3 class="fw-bold">
                                                                    ระดับปัจจุบัน</h3>
                                                            </th>
                                                            <th width="100px">
                                                                <h3 class="fw-bold">
                                                                    อัตราเงินเดือน</h3>
                                                            </th>
                                                            <th width="100px">
                                                                <h3 class="fw-bold">วันที่บรรจุ
                                                                </h3>
                                                            </th>
                                                            <th width="100px">
                                                                <h3 class="fw-bold">ดูข้อมูล
                                                                </h3>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row mt-3">
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
    getPersonnel();
});

$('#Status').change(checkpostition);
$('#Position').change(getPersonnel);

function checkpostition() {
    fetch_Position();
    getPersonnel();
}

function fetch_Position() {
    let Status = $('#Status').val();
    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_Position') ?>",
        method: "POST",
        data: {
            Status: Status
        },
        success: function(data) {
            $('#Position').html(data);
        }
    });
}

function getPersonnel() {
    let Status = $('#Status').val();
    let Position = $('#Position').val();
    let table_body = $('#tbl_Personnel tbody');
    let count = 0;
    
    $.ajax({
        url: "<?= site_url('PersonnelInformation/getData') ?>",
        method: "POST",
        data: { 
            Status: Status,
            Position: Position
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="8" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let salary = row.MSalary !== null && row.MSalary !== undefined ? row.MSalary.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : '0.00';
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.PName}</td>
                            <td align="left">${row.FullName}</td>
                            <td>${row.PosName || ''}</td>
                            <td>${row.Level || ''}</td>
                            <td align="right">${salary}</td>
                            <td>${new Date(row.PlaceDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td class="text-center"><a href="<?= site_url('PersonnelInformation/show/') ?>${row.IDCard }" class="btn btn-primary fw-bold fs-4">ดูข้อมูล</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
            
        }
    });
}

function removeOption() {
    $("select[name='Position'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>