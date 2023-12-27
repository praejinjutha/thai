<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PersonnelInformation' : 'User_Controller/PersonnelHome_User') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">การจัดเวรปฏิบัติหน้าที่</label>
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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="link-1" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col mt-3">
                                                            <h3 class="fw-bold text-center">
                                                                ตารางเวรปฏิบัติหน้าที่ประจำปีการศึกษา <span id="ShowYear"></span>
                                                            </h3>
                                                            <form method="post" action="<?= site_url('User_Controller/BeonDuty/exportExcel') ?>">
                                                                <div class="row mt-4">
                                                                    <div class="col-md-2 d-flex align-items-center">
                                                                        <h4 class="fw-bold text-center"
                                                                            style="font-size: 26px; width: 200px">
                                                                            ปีการศึกษา</h4>
                                                                        <select class="form-select" id="Year" name="Year" style="display: inline;">
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
                                                                    <div class="col-md-2 d-flex align-items-center">
                                                                        <h4 class="fw-bold text-center" style="font-size: 26px; width: 200px">
                                                                            ภาคเรียน
                                                                        </h4>
                                                                        <select class="form-select" id="Terms" name="Terms"  style="display: inline;">
                                                                            <option value="1" class="select-fnz">1</option>
                                                                            <option value="2" class="select-fnz">2</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-8">
                                                                        <div class="float-end mt-2">
                                                                            <button type="submit" class="btn btn-primary fw-bold fs-4">ส่งออก</button>
                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="row mt-4">
                                                                <div class="col">
                                                                    <table class="table table-striped table-bordered"
                                                                        style="border-color: #000;" id="tbl_BeonDuty">
                                                                        <thead>
                                                                            <tr style="background-color: #d3d8e6; text-align:center; vertical-align: middle;">
                                                                                <th width="150px">
                                                                                    <h3 class="fw-bold">พื้นที่รับผิดชอบ
                                                                                    </h3>
                                                                                </th>
                                                                                <th rowspan="2" width="100px">
                                                                                    <h3 class="fw-bold">ช่วงเวลา</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 1</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 2</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 3</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 4
                                                                                    </h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 5</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 6
                                                                                    </h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 7
                                                                                    </h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 8
                                                                                    </h3>
                                                                                </th>
                                                                                <th colspan="2">
                                                                                    <h3 class="fw-bold">เวรกลางคืน</h3>
                                                                                </th>
                                                                                <th rowspan="2" width="150px">
                                                                                    <h3 class="fw-bold">ผู้ตรวจเวร</h3>
                                                                                </th>
                                                                            </tr>
                                                                            <tr class="text-center">
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold">ประจำวัน</h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position2'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position3'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position4'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position5'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position6'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position7'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position8'][0] ?></h3>
                                                                                </th>
                                                                                <th width="150px" style="background-color: #fff">
                                                                                    <h3 class="fw-bold">ครูเวร</h3>
                                                                                </th>
                                                                                <th width="150px" style="background-color: #fff">
                                                                                    <h3 class="fw-bold ">นักการ</h3>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    get_BeonDuty();
});

$('#Year').change(get_BeonDuty);
$('#Terms').change(get_BeonDuty);

function get_BeonDuty() {
    let Year = $('#Year').val();
    let Term = $('#Terms').val();
    let table_body = $('#tbl_BeonDuty tbody');

    $.ajax({
        url: "<?= site_url('User_Controller/BeonDuty/fech_BeonDuty') ?>",
        method: "POST",
        data: {
            Year: Year,
            Term: Term
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            let table_row = `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">จันทร์</td>
                                <td>เช้า</td>`;
            if (data.Monday_Morning && data.Monday_Morning.length > 0) {
                $.each(data.Monday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else { 
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Monday_Afternoon && data.Monday_Afternoon.length > 0) {
                $.each(data.Monday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Monday_Night && data.Monday_Night.length > 0) {
                $.each(data.Monday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">อังคาร</td>
                                <td>เช้า</td>`;
            if (data.Tuesday_Morning && data.Tuesday_Morning.length > 0) {
                $.each(data.Tuesday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Tuesday_Afternoon && data.Tuesday_Afternoon.length > 0) {
                $.each(data.Tuesday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Tuesday_Night && data.Tuesday_Night.length > 0) {
                $.each(data.Tuesday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">พุธ</td>
                                <td>เช้า</td>`;
            if (data.Wednesday_Morning && data.Wednesday_Morning.length > 0) {
                $.each(data.Wednesday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Wednesday_Afternoon && data.Wednesday_Afternoon.length > 0) {
                $.each(data.Wednesday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Wednesday_Night && data.Wednesday_Night.length > 0) {
                $.each(data.Wednesday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">พฤหัสบดี</td>
                                <td>เช้า</td>`;
            if (data.Thursday_Morning && data.Thursday_Morning.length > 0) {
                $.each(data.Thursday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Thursday_Afternoon && data.Thursday_Afternoon.length > 0) {
                $.each(data.Thursday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Thursday_Night && data.Thursday_Night.length > 0) {
                $.each(data.Thursday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">ศุกร์</td>
                                <td>เช้า</td>`;
            if (data.Friday_Morning && data.Friday_Morning.length > 0) {
                $.each(data.Friday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Friday_Afternoon && data.Friday_Afternoon.length > 0) {
                $.each(data.Friday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Friday_Night && data.Friday_Night.length > 0) {
                $.each(data.Friday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr><tr><td colspan="13"><h3 class="text-center fw-bold">เวรวันหยุด / นักขัตฤกษ์</h3></td></tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">เสาร์</td>
                                <td>เช้า</td>`;
            if (data.Saturday_Morning && data.Saturday_Morning.length > 0) {
                $.each(data.Saturday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Saturday_Afternoon && data.Saturday_Afternoon.length > 0) {
                $.each(data.Saturday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Saturday_Night && data.Saturday_Night.length > 0) {
                $.each(data.Saturday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">อาทิตย์</td>
                                <td>เช้า</td>`;
            if (data.Sunday_Morning && data.Sunday_Morning.length > 0) {
                $.each(data.Sunday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Sunday_Afternoon && data.Sunday_Afternoon.length > 0) {
                $.each(data.Sunday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Sunday_Night && data.Sunday_Night.length > 0) {
                $.each(data.Sunday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_body.append(table_row);
            $('#ShowYear').text(Year);
        }
    });
}
</script>