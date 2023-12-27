<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PersonnelInformation' : 'User_Controller/PersonnelHome_User') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
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
                        <label style="font-size: 26px">บันทึกไปมาปฏิบัติราชการประจำวัน<br>
                            <?= $day ?></label>
                    </div>
                    <form method="POST" action="<?= site_url('User_Controller/OperationRecord_User/Export_Day') ?>">
                        <div class="row text-center fw-bold mt-4">
                            <label style="font-size: 26px">ค้นหาจาก วัน/เดือน/ปี</label>
                            <input type="date" class="form-control" id="Date" name="Date"
                                value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                        </div>
                        <div class="row mt-4">
                            <hr>
                            <a href="<?= site_url('User_Controller/OperationRecord_User/Sum') ?>"
                                class="btn btn-success fw-bold fs-4">สรุปรายเดือน / ภาคเรียน</a>
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
                                <tr class="text-center">
                                    <th width="30px">
                                        <h3 class="fw-bold">ลำดับ</h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">ชื่อ - นามสกุล</h3>
                                    </th>
                                    <th width="250">
                                        <h3 class="fw-bold">ตำแหน่ง</h3>
                                    </th>
                                    <th width="70px">
                                        <h3 class="fw-bold">มา</h3>
                                    </th>
                                    <th width="70px">
                                        <h3 class="fw-bold">มาสาย</h3>
                                    </th>
                                    <th width="100px">
                                        <h3 class="fw-bold">ไปราชการ</h3>
                                    </th>
                                    <th width="70px">
                                        <h3 class="fw-bold">ลาป่วย</h3>
                                    </th>
                                    <th width="70px">
                                        <h3 class="fw-bold">ลากิจ</h3>
                                    </th>
                                    <th width="70px">
                                        <h3 class="fw-bold">ขาด</h3>
                                    </th>
                                    <th width="400px">
                                        <h3 class="fw-bold">หมายเหตุ</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <table class="table table-borderless" id="tbl_SumPersonnel">
                        <tbody>

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col" id="tbcount" style="position:absolute; bottom: 60px;">

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
    getSumPersonnel();
});

$('#Date').change(getPersonnel);
$('#Date').change(getSumPersonnel);

function getPersonnel() {
    let BirthDate = $('#Date').val();
    let table_body = $('#tbl_Personnel tbody');

    $.ajax({
        url: "<?= site_url('User_Controller/OperationRecord_User/getData') ?>",
        method: "POST",
        data: {
            BirthDate: BirthDate
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
                    let table_row = `<tr class="text-center">
                            <td>${count}
                                <input type="hidden" id="BirthDate" name="BirthDate" value="${BirthDate}">
                                <input type="hidden" id="PersID" name="PersID" value="${row.IDCard}">
                            </td>
                            <td align="left">${row.FullName} </td>
                            <td>${row.PosName}</td>
                            <td><input class="form-check-input ch-radio" type="radio" name="ch${count}" id="ch1" value="${row.OprtType0 === 'Y' ? 'Y' : 'N'}" ${row.OprtType0 === 'Y' ? 'checked' : ''}></td>
                            <td><input class="form-check-input ch-radio" type="radio" name="ch${count}" id="ch2" value="${row.OprtType1 === 'Y' ? 'Y' : 'N'}" ${row.OprtType1 === 'Y' ? 'checked' : ''}></td>
                            <td><input class="form-check-input ch-radio" type="radio" name="ch${count}" id="ch3" value="${row.OprtType2 === 'Y' ? 'Y' : 'N'}" ${row.OprtType2 === 'Y' ? 'checked' : ''}></td>
                            <td><input class="form-check-input ch-radio" type="radio" name="ch${count}" id="ch4" value="${row.OprtType3 === 'Y' ? 'Y' : 'N'}" ${row.OprtType3 === 'Y' ? 'checked' : ''}></td>
                            <td><input class="form-check-input ch-radio" type="radio" name="ch${count}" id="ch5" value="${row.OprtType4 === 'Y' ? 'Y' : 'N'}" ${row.OprtType4 === 'Y' ? 'checked' : ''}></td>
                            <td><input class="form-check-input ch-radio" type="radio" name="ch${count}" id="ch6" value="${row.OprtType5 === 'Y' ? 'Y' : 'N'}" ${row.OprtType5 === 'Y' ? 'checked' : ''}></td>
                            <td><input type="text" name="Rem" class="form-control text-center" value="${row.Rem !== null ? row.Rem : ''}"></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }

            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}
$(document).on('change', '.ch-radio', function() {
    if ($(this).is(':checked')) {
        $(this).val('Y');
        if ($(this).attr('id') !== 'ch1') {
            $(this).closest('tr').find('#ch1').val('N');
        }
    } else {
        $(this).val('N');
    }
});

function check() {
    $('input[id="ch1"]').prop('checked', true);
    $('input[id="ch1"]').val('Y');

    if (!$('input[id="ch1"]').is(':checked')) {
        $('input[id="ch1"]').val('N');
    }
}

function cancel() {
    $('input[type="radio"]').prop('checked', false);
    $('input[type="radio"]').val('N');
}

function getSumPersonnel() {
    let BirthDate = $('#Date').val();
    let table_body = $('#tbl_SumPersonnel tbody');

    $.ajax({
        url: "<?= site_url('User_Controller/OperationRecord_User/Official_SumDay') ?>",
        method: "POST",
        data: {
            BirthDate: BirthDate
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr class="text-center">
                                <td colspan="3"></td>
                                <td width="250" align="center"><h3 class="fw-bold" >ยอดสรุป</h3></td>
                                <td width="70px"><input type="text" class="form-control text-center" value="${row.Come !== null ? row.Come : 0}"></td>
                                <td width="70px"><input type="text" class="form-control text-center" value="${row.Leave !== null ? row.Leave : 0}"></td>
                                <td width="100px" align="center" ><input type="text" style="width: 65%; " class="form-control text-center" value="${row.BLeave !== null ? row.BLeave : 0}"></td>
                                <td width="70px"><input type="text" class="form-control text-center" value="${row.Absent !== null ? row.Absent : 0}"></td>
                                <td width="70px"><input type="text" class="form-control text-center" value="${row.OnAsCivil !== null ? row.OnAsCivil : 0}"></td>
                                <td width="70px"><input type="text" class="form-control text-center" value="${row.Late !== null ? row.Late : 0}"></td>
                                <td width="400px"></td>
                        </tr>`;
                table_body.append(table_row);
            });
        }
    });
}

</script>