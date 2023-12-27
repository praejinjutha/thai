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
<div class="container-fluid" style="padding: 0px;">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PersonnelHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">บันทึกไปมาปฏิบัติงาน ลา ไปราชการ</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row  m-2 mt-4">
                <div class="col-md-2">
                    <div class="row text-center fw-bold">
                        <label style="font-size: 26px">บันทึกไปมาปฏิบัติราชการประจำวัน <br> <?= $day ?></label>
                    </div>
                    <form method="POST" action="<?= site_url('OperationRecord/Export_Month') ?>">
                        <div class="row text-center fw-bold mt-4">
                            <label style="font-size: 26px">รายการสรุปประจำเดือน</label>
                            <select class="form-select mt-2" id="Month" name="Month">
                                <option class="select-fnz"></option>
                                <option value="1" class="select-fnz">มกราคม</option>
                                <option value="2" class="select-fnz">กุมภาพันธ์</option>
                                <option value="3" class="select-fnz">มีนาคม</option>
                                <option value="4" class="select-fnz">เมษายน</option>
                                <option value="5" class="select-fnz">พฤษภาคม</option>
                                <option value="6" class="select-fnz">มิถุนายน</option>
                                <option value="7" class="select-fnz">กรกฎาคม</option>
                                <option value="8" class="select-fnz">สิงหาคม</option>
                                <option value="9" class="select-fnz">กันยายน</option>
                                <option value="10" class="select-fnz">ตุลาคม</option>
                                <option value="11" class="select-fnz">พฤศจิกายน</option>
                                <option value="12" class="select-fnz">ธันวาคม</option>
                            </select>
                        </div>
                        <div class="row mt-3">
                            <div class="form-check mt-3">
                                <label class="form-check-label fw-bold"> รอบที่ 1 มีนาคม </label>
                                <input class="form-check-input" type="radio" name="myRadio" id="Checkbox1" value="3">
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="myRadio" id="Checkbox2" value="9">
                                <label class="form-check-label fw-bold"> รอบที่ 2 กันยายน </label>
                            </div>
                            <hr>
                                <a href="<?= site_url('OperationRecord') ?>" class="btn btn-success fw-bold fs-4"> เช็คประจำวัน
                            </a>
                        </div>
                        <div class="row mt-2">
                            <button type="submit" class="btn btn-primary fw-bold fs-4 w-100">ส่งออก</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-10">
                    <div class="table-responsive tbodyDiv">
                        <table class="table table-striped table-bordered" id="tbl_Personnel">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ลำดับ</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ชื่อ - นามสกุล</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ตำแหน่ง</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">มา</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">มาสาย</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ไปราชการ</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ลาป่วย</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ลากิจ</h3>
                                    </th>
                                    <th class="text-center">
                                        <h3 class="fw-bold">ขาด</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <table class="table table-borderless " id="tbl_SumPersonnel">
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col" id="tbcount" style="position:absolute; left: 330px; bottom: 63px">

                </div>
            </div> -->
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    getPersonnel();
    get_SumMonthPersonnel();
});

$('#Month').change(function() {
    $('input[name="myRadio"]').prop('checked', false);
    get_MonthOperation();
    get_SumMonthPersonnel();
});

$('input[name="myRadio"]').change(function() {
    $('#Month').val(''); 
    get_TermOperation();
    get_SumTermPersonnel();
});

function getPersonnel() {

    let table_body = $('#tbl_Personnel tbody');

    $.ajax({
        url: "<?= site_url('OperationRecord/get_SumPersonnelData') ?>",
        method: "POST",
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
                    let table_row = `<tr class="text-center">
                            <td width="70px">${count}
                                <input type="hidden" class="form-control "id="PersID" value="${row.IDCard}">
                            </td>
                            <td align="left">${row.FullName}</td>
                            <td width="200px">${row.PosName}</td>
                            <td width="150px"><input type="text" class="form-control text-center personnel_input" id="input1_${count}" name=" value=""></td>
                            <td width="150px"><input type="text" class="form-control text-center personnel_input" id="input2_${count}" name="" value=""></td>
                            <td width="150px"><input type="text" class="form-control text-center personnel_input" id="input3_${count}" name="" value=""></td>
                            <td width="150px"><input type="text" class="form-control text-center personnel_input" id="input4_${count}" name="" value=""></td>
                            <td width="150px"><input type="text" class="form-control text-center personnel_input" id="input5_${count}" name="" value=""></td>
                            <td width="150px"><input type="text" class="form-control text-center personnel_input" id="input6_${count}" name="" value=""></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
            get_MonthOperation();
        }
    });
}

function get_MonthOperation() {
    let Month = $('#Month').val();
    let personnelArray = [];

    $('#tbl_Personnel tbody tr').each(function() {
        let row = $(this);
        let PersID = row.find('input[id="PersID"]').val();

        let personnel = {
            PersID: PersID
        };

        personnelArray.push(personnel);
    });

    $.ajax({
        url: "<?= site_url('OperationRecord/get_MonthOperationData') ?>",
        method: "POST",
        data:{
            Month: Month,
            personnelArray: JSON.stringify(personnelArray)
        },
        dataType: 'json',
        success: function(data) {
            if (data.length !== 0) {
                data.forEach(function(row, index) {
                    let count = index + 1;
                    $(`#input1_${count}`).val(row[0].Come);
                    $(`#input2_${count}`).val(row[0].Leave);
                    $(`#input3_${count}`).val(row[0].BLeave);
                    $(`#input4_${count}`).val(row[0].Absent);
                    $(`#input5_${count}`).val(row[0].OnAsCivil);
                    $(`#input6_${count}`).val(row[0].Late);
                });
            }
        }
    });
}

function get_TermOperation() {
    let Term = $('input[name="myRadio"]:checked').val();
    let personnelArray = [];
    
    $('#tbl_Personnel tbody tr').each(function() {
        let row = $(this);
        let PersID = row.find('input[id="PersID"]').val();

        let personnel = {
            PersID: PersID
        };

        personnelArray.push(personnel);
    });
    
    $.ajax({
        url: "<?= site_url('OperationRecord/get_TermOperationData') ?>",
        method: "POST",
        data:{
            Term: Term,
            personnelArray: JSON.stringify(personnelArray)
        },
        dataType: 'json',
        success: function(data) {
            if (data.length !== 0) {
                data.forEach(function(row, index) {
                    let count = index + 1;
                    $(`#input1_${count}`).val(row[0].Come);
                    $(`#input2_${count}`).val(row[0].Leave);
                    $(`#input3_${count}`).val(row[0].BLeave);
                    $(`#input4_${count}`).val(row[0].Absent);
                    $(`#input5_${count}`).val(row[0].OnAsCivil);
                    $(`#input6_${count}`).val(row[0].Late);
                });
            }
        }
    });
}

function get_SumMonthPersonnel() {
    let Month = $('#Month').val();
    let table_body = $('#tbl_SumPersonnel tbody');

    $.ajax({
        url: "<?= site_url('OperationRecord/Official_SumMonth') ?>",
        method: "POST",
        data: {
            Month: Month
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr class="text-center">
                                <td colspan="3" width="300px"></td>
                                <td width="250" align="center"><h3 class="fw-bold" style="padding-left: 50px">ยอดสรุป</h3></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Come !== null ? row.Come : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Leave !== null ? row.Leave : 0}"></td>
                                <td width="150px" align="center" ><input type="text" class="form-control text-center" value="${row.BLeave !== null ? row.BLeave : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Absent !== null ? row.Absent : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.OnAsCivil !== null ? row.OnAsCivil : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Late !== null ? row.Late : 0}"></td>
                        </tr>`;
                table_body.append(table_row);
            });
        }
    });
}

function get_SumTermPersonnel() {
    let Term = $('input[name="myRadio"]:checked').val();
    let table_body = $('#tbl_SumPersonnel tbody');

    $.ajax({
        url: "<?= site_url('OperationRecord/Official_SumTerm') ?>",
        method: "POST",
        data: {
            Term: Term
        },
        dataType: 'json',
        success: function(data) { console.log(data);
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr class="text-center">
                                <td colspan="3" width="300px"></td>
                                <td width="250" align="center"><h3 class="fw-bold" style="padding-left: 50px">ยอดสรุป</h3></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Come !== null ? row.Come : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Leave !== null ? row.Leave : 0}"></td>
                                <td width="150px" align="center" ><input type="text" class="form-control text-center" value="${row.BLeave !== null ? row.BLeave : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Absent !== null ? row.Absent : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.OnAsCivil !== null ? row.OnAsCivil : 0}"></td>
                                <td width="150px"><input type="text" class="form-control text-center" value="${row.Late !== null ? row.Late : 0}"></td>
                        </tr>`;
                table_body.append(table_row);
            });
        }
    });
}
</script>