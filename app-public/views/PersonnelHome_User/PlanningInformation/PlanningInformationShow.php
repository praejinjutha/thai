<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PlanningInformation' : 'User_Controller/PlanningInformation') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">ข้อมูลการวางแผนอัตรากำลัง</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card m-3 mt-0">
                <div class="card-body">
                    <div class="row text-center">
                        <h3 class="fw-bold">แสดงรายชื่อบุคลากรที่อบรมครบ 20 ชั่วโมง</h3>
                        <hr>
                        <div class="col-5" align="right">
                            <label for="" class="fw-bold">ปีการศึกษา</label>
                        </div>
                        <div class="col-2">
                            <select class="form-select w-100" id="Year">
                                <option selected class="select-fnz" value="1">----- แสดงข้อมูลทั้งหมด -----</option>
                                <?php
                                    foreach ($loopYear as $row => $Year) {
                                ?>
                                <option value="<?= $Year ?>" class="select-fnz"><?= $Year ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <table class="table table-striped table-bordered mt-3" id="tbl_PlanningInformationTrain">
                                <thead class="text-center">
                                    <tr>
                                        <th width="100px">
                                            <h3 class="fw-bold">ลำดับที่</h3>
                                        </th>
                                        <th width="120px">
                                            <h3 class="fw-bold">คำนำหน้า</h3>
                                        </th>
                                        <th width="170px">
                                            <h3 class="fw-bold">ชื่อ</h3>
                                        </th>
                                        <th width="170px">
                                            <h3 class="fw-bold">นามสกุล</h3>
                                        </th>
                                        <th width="170px">
                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                        </th>
                                        <th width="140px">
                                            <h3 class="fw-bold">จำนวนชั่วโมง</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <p class="fw-bold text-center mt-3 mb-0"> จำนวนบุคลากรที่มีชั่วโมงอบรมไม่น้อยกว่า 20
                        ชั่วโมงในปีการศึกษานี้ <span style="color: red;" id="count1"></span> คน </p>
                    <p class="fw-bold text-center pt-0 mb-0"> บุคลากรที่มีชั่วโมงอบรมไม่น้อยกว่า 20
                        ชั่วโมงในปีการศึกษานี้คิดเป็นร้อยละ <span style="color: red;" id="tbcount1"></span> % </p>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <hr>
                            <h3 class="fw-bold" style="font-size: 25px;" align="center">
                                จำนวนบุคลากรที่อบรมครบ 20 ชั่วโมง</h3>
                            <div class="row mt-4">
                                <div class="col text-center">
                                    <i class="fa-solid fa-user" style="color: #8FBA23;"></i></a>
                                    <p class="mb-0">จำนวนที่อบรมครบ <span id="count2"></span> คน</p>
                                    <p class="mb-0"><span id="tbcount2"></span> %</p>
                                    <p class="mb-0">บุคคลที่อบรมครบ 20 ชม.</p>
                                </div>
                                <div class="col text-center">
                                    <canvas id="chDonut1"></canvas>
                                </div>
                                <div class="col text-center">
                                    <i class="fa-solid fa-user" style="color: #FFBF00;"></i></a>
                                    <p class="mb-0">จำนวนที่อบรมไม่ครบ <span id="notCom1"></span> คน</p>
                                    <p class="mb-0"><span id="notCom2"></span> %</p>
                                    <p class="mb-0">บุคคลที่อบรมไม่ครบ 20 ชม.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    get_PlanningInformationTrain();
});

$('#Year').change(get_PlanningInformationTrain);

function get_PlanningInformationTrain() {
    let Year = $('#Year').val();
    let table_body = $('#tbl_PlanningInformationTrain tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('User_Controller/PlanningInformation/fech_PlanningInformatTrain') ?>",
        method: "POST",
        data: {
            Year: Year
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
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

                var chDonutData = {
                    labels: ["ครบ 20 ชม.","ไม่ครบ 20 ชม."],
                    datasets: [{
                        backgroundColor: ['rgba(143, 186, 35)', 'rgba(255, 191, 0)'],
                        borderWidth: 0,
                        data: [0, sum_notperson]
                    }]
                };
                var chDonut = document.getElementById("chDonut1");
                if (chDonut) {
                    new Chart(chDonut, {
                        type: 'pie',
                        data: chDonutData,
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
                var chDonutData = {
                    labels: [ "ครบ 20 ชม.","ไม่ครบ 20 ชม."],
                    datasets: [{
                        backgroundColor: ['rgba(143, 186, 35)', 'rgba(255, 191, 0)'],
                        borderWidth: 0,
                        data: [count2, notCom1]
                    }]
                };
                var chDonut = document.getElementById("chDonut1");
                if (chDonut) {
                    new Chart(chDonut, {
                        type: 'pie',
                        data: chDonutData,
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