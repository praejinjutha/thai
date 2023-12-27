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
                <label class="mt-1">การพัฒนาข้าราชการครูและบุคลากร</label>
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
                                <form method="post" action="<?= site_url('User_Controller/PersonnelDevelopment/export') ?>">
                                    <div class="row">
                                        <div class="col-md-3" style="padding-right: 0px">
                                            <label for="exampleInputUsername2" class="fw-bold" style="font-size: 26px">ปีการศึกษา</label>
                                            <select class="form-select" id="Year" name="Year" style="display: inline; margin-left: 20px; margin-right: 20px; width: 50%;">
                                                <option selected class="select-fnz" value="1">----- แสดงข้อมูลทั้งหมด -----</option>
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
                                        <div class="col-md-4">
                                            <label for="exampleInputUsername2" class=" fw-bold"
                                                style="font-size: 26px;">รายชื่อ</label>

                                            <select class="form-select" id="Name" name="Name" style="display: inline; margin-left: 20px; margin-right: 20px; width: 50%;">
                                                <option selected class="select-fnz" value="2">----- แสดงข้อมูลทั้งหมด -----</option>
                                                <?php 
                                                    foreach ($FullName as $row) {
                                                        if ($row->FullName !== $this->data['FullName']) {
                                                ?>
                                                    <option class="select-fnz" value="<?= $row->IDCard ?>"><?= $row->FullName ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5" style="padding-left: 0px;">
                                            <div class="float-end">
                                            <a href="#" class="btn btn-success fw-bold fs-4" style="margin-right: 10px;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#myModal">แสดงเฉพาะบุคคลที่อบรมครบ 20 ชม. ขึ้นไป</a>
                                                <!-- **** Modal **** -->
                                                <div class="modal fade" id="myModal" tabindex="-1"
                                                    aria-labelledby="myModalLabel6" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="tab">
                                                                    <h5 class="card-title fw-bold"
                                                                        style="color: #18409e;font-size: 32px;">
                                                                        ช้อมูลเฉพาะบุคคลที่อบรมครบ 20 ชั่วโมงขึ้นไป</h5>
                                                                </div>
                                                                <div id="modal-setting-7" class="tabcontent">
                                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                    <div class="container">
                                                                        <div class="row text-center">
                                                                            <div class="col-md-2" align="right" style="padding-right: 8px;">
                                                                                <label for=""
                                                                                    class="fw-bold">ปีการศึกษา</label>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <select class="form-select" style="width: 250px" id="YearHou">
                                                                                    <option selected class="select-fnz" value="1">----- แสดงข้อมูลทั้งหมด -----</option>
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
                                                                            <div class="col-md-4"></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-1"></div>
                                                                            <div class="col-10">
                                                                                <table class="table table-striped table-bordered mt-3" id="tbl_PersonnelDevelopmentHou">
                                                                                    <thead class="text-center">
                                                                                        <tr>
                                                                                            <th width="80px">
                                                                                                <h3 class="fw-bold">ลำดับที่</h3>
                                                                                            </th>
                                                                                            <th width="100px">
                                                                                                <h3 class="fw-bold">คำนำหน้า</h3>
                                                                                            </th>
                                                                                            <th width="150px">
                                                                                                <h3 class="fw-bold">ชื่อ</h3>
                                                                                            </th>
                                                                                            <th width="150px">
                                                                                                <h3 class="fw-bold">นามสกุล</h3>
                                                                                            </th>
                                                                                            <th width="150px">
                                                                                                <h3 class="fw-bold">ตำแหน่ง</h3>
                                                                                            </th>
                                                                                            <th width="120px">
                                                                                                <h3 class="fw-bold">จำนวนชั่วโมง</h3>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody class="text-center">
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-1"></div>
                                                                        </div>
                                                                        <p class="fw-bold text-center mt-3 mb-0">
                                                                            จำนวนบุคลากรที่มีชั่วโมงอบรมไม่น้อยกว่า 20
                                                                            ชั่วโมงในปีการศึกษานี้ <span
                                                                                style="color: red;" id="count1"></span> คน </p>
                                                                        <p class="fw-bold text-center pt-0 mb-0 ">
                                                                            บุคลากรที่มีชั่วโมงอบรมไม่น้อยกว่า 20
                                                                            ชั่วโมงในปีการศึกษานี้คิดเป็นร้อยละ <span 
                                                                                style="color: red;" id="tbcount1"></span> % </p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <hr>
                                                                                <h3 class="fw-bold" style="font-size: 25px;"
                                                                                    align="center">
                                                                                    จำนวนบุคลากรที่อบรมครบ 20 ชั่วโมง</h3>
                                                                                <div class="row mt-4">
                                                                                    <div class="col text-center">
                                                                                        <i class="fa-solid fa-user"
                                                                                            style="color: #8FBA23;"></i></a>
                                                                                        <p class="mb-0">จำนวนที่อบรมครบ <label id="count2"></label> คน </p>
                                                                                        <label class="mb-0" id="tbcount2"></label> %
                                                                                        <p class="mb-0">บุคคลที่อบรมครบ 20 ชม.</p>
                                                                                    </div>
                                                                                    <div class="col text-center">
                                                                                        <canvas id="chDonut1"></canvas>
                                                                                    </div>
                                                                                    <div class="col text-center">
                                                                                        <i class="fa-solid fa-user"
                                                                                            style="color: #FFBF00;"></i></a> 
                                                                                        <p class="mb-0">จำนวนที่อบรมไม่ครบ <label id="notCom1"></label> คน</p>
                                                                                        <p class="mb-0"><label id="notCom2"></label> %</p>
                                                                                        <p class="mb-0">บุคคลที่อบรมไม่ครบ 20 ชม.</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer mt-3">
                                                                        <button type="button"
                                                                            class="btn btn-secondary fw-bold fs-4"
                                                                            data-bs-dismiss="modal">ยกเลิก</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                                <button type="submit" class="btn btn-primary fw-bold fs-4">ส่งออก</button>
                                            </div>
                                        </div>
                                </form>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 tbodyDiv">
                                            <table class="table table-striped table-bordered"
                                                id="tbl_PersonnelDevelopment">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="50px">
                                                            <h3 class="fw-bold mt-2">ลำดับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold mt-2">
                                                                ชื่อ-นามสกุล</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold mt-2">ชื่อหลักสูตร
                                                            </h3>
                                                        </th>
                                                        <th width="200px"> 
                                                            <h3 class="fw-bold mt-2">
                                                                ชื่อหน่วยงาน</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold mt-2">
                                                                กลุ่มหลักสูตร</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold mt-2">วันที่เริ่ม
                                                            </h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold mt-2">วันสิ้นสุด
                                                            </h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold mt-2">สถานที่
                                                            </h3>
                                                        </th>
                                                        <th width="150px">
                                                            <h3 class="fw-bold mt-2">จังหวัด
                                                            </h3>
                                                        </th>
                                                        <th width="120px">
                                                            <h3 class="fw-bold mt-2">จำนวนวัน
                                                            </h3>
                                                        </th>
                                                        <th width="120px">
                                                            <h3 class="fw-bold mt-2">จำนวนชั่วโมง
                                                            </h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold mt-2">สถานะ
                                                            </h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col" id="tbcount" >

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
        get_PersonnelDevelopment();
        get_PersonnelDevelopmentHou();
    });

    $('#Year').change(get_PersonnelDevelopment);
    $('#Name').change(get_PersonnelDevelopment);

    function get_PersonnelDevelopment() {
        let Year = $('#Year').val();
        let IDCard = $('#Name').val();
        let table_body = $('#tbl_PersonnelDevelopment tbody');
        let count = 0;

        $.ajax({
            url: "<?= site_url('User_Controller/PersonnelDevelopment/fech_PersonnelDevelopment') ?>",
            method: "POST",
            data: {
                Year: Year,
                IDCard: IDCard
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
                            <td>${row.TNameCourse || ''}</td>
                            <td>${row.TDepart || ''}</td>
                            <td>${row.TGCourse || ''}</td>
                            <td>${new Date(row.TStartDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${new Date(row.TFinishDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.TPlace || ''}</td>
                            <td>${row.TProvince || ''}</td>
                            <td>${row.TCDay || ''}</td>
                            <td>${row.TCHou || ''}</td>
                            <td>
                            ${row.SumHou >= 20 ? `
                                <div class="float-start">
                                    <i class="fa fa-check-square mt-1" aria-hidden="true" style="transform: scale(0.8); color: green;"></i>
                                    <span class="fw-bold" style="color: green;">ผ่าน</span>
                                </div>
                            ` : `
                                <div class="float-start">
                                    <i class="fa fa-window-close mt-1" aria-hidden="true" style="transform: scale(0.8); color: red;"></i>
                                    <span class="fw-bold" style="color: red;">ไม่ผ่าน</span>
                                </div>
                            `}
                            </td>
                        </tr>`;
                        table_body.append(table_row);
                    });
                }
                $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
            }
        });
    }
    
    $('#YearHou').change(get_PersonnelDevelopmentHou);

    function get_PersonnelDevelopmentHou() {
        let Year = $('#YearHou').val();
        let table_body = $('#tbl_PersonnelDevelopmentHou tbody');
        let count = 0;

        $.ajax({
            url: "<?= site_url('User_Controller/PersonnelDevelopment/fech_PersonnelDevelopmentHou') ?>",
            method: "POST",
            data: {
                Year: Year
            },
            dataType: 'json',
            success: function(data) { 
                table_body.html('');
                if (data.results.length === 0) {
                    let table_row = `
                    <tr>
                        <td colspan="6" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                    table_body.append(table_row);
                    let sum_person_table = 0;
                    $('#tbcount1').text(sum_person_table);
                    $('#tbcount2').text(sum_person_table);

                    let sum_notperson = `${data.SUM_notPerson}`;
                    let sum_notComplete = `${data.SUM_notComplete}`;
                    $('#notCom1').text(sum_notperson);
                    $('#notCom2').text(sum_notComplete);

                    var chDonutData2 = {
                        labels: ["ครบ 20 ชม.", "ไม่ครบ 20 ชม."],
                        datasets: [{
                            backgroundColor: ['rgba(143, 186, 35)','rgba(255, 191, 0)'],
                            borderWidth: 0,
                            data: [0, sum_notperson]
                        }]
                    };
                    var chDonut1 = document.getElementById("chDonut1");
                    if (chDonut1) {
                        new Chart(chDonut1, {
                            type: 'pie',
                            data: chDonutData2,
                            options: donutOptions
                        });
                    }
                } else {
                    count = 0;
                    $.each(data.results, function(index, row) {
                        count++;
                        let table_row = `<tr>
                            <td>${count}</td>
                            <td>${row.PName}</td>
                            <td align="left">${row.FTName}</td>
                            <td align="left">${row.LTName}</td>
                            <td>${row.PosName}</td>
                            <td>${row.SumHou}</td>
                        </tr>`;
                        table_body.append(table_row);
                    });
                    let sum_person_table = `${data.SUM_Person}`;
                    $('#tbcount1').text(sum_person_table);
                    $('#tbcount2').text(sum_person_table);

                    let sum_notperson = `${data.SUM_notPerson}`;
                    let sum_notComplete = `${data.SUM_notComplete}`;
                    $('#notCom1').text(sum_notperson);
                    $('#notCom2').text(sum_notComplete);

                    let notCom1 = `${data.SUM_notPerson}`;
                    let count2 = `${count}`;
                    var chDonutData2 = {
                        labels: ["ครบ 20 ชม.", "ไม่ครบ 20 ชม."],
                        datasets: [{
                            backgroundColor: ['rgba(143, 186, 35)' ,'rgba(255, 191, 0)'],
                            borderWidth: 0,
                            data: [count2, notCom1]
                        }]
                    };
                    var chDonut1 = document.getElementById("chDonut1");
                    if (chDonut1) {
                        new Chart(chDonut1, {
                            type: 'pie',
                            data: chDonutData2,
                            options: donutOptions
                        });
                    }
                }
                $('#count1').text(`${count}`);
                $('#count2').text(`${count}`);
            }
        });
    }

    var donutOptions = {
        cutoutPercentage: 60,
        legend: {
            position: 'bottom',
            padding: 5,
            labels: {
                pointStyle: 'circle',
                usePointStyle: true
            }
        }
    };
    </script>
    