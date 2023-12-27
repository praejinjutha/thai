<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PersonnelHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
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
        <div class="col-md-12">
            <div class="card m-3 mt-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col" style="background: #f2daae; border-radius: 5px; width:">
                                    <h3 class="fw-bold text-center mt-2">อัตรากำลัง</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col" style="height: auto;">
                                        <div class="row" style="margin: 0px 20px 0px 20px;">
                                            <table class="mt-2" style="padding-right: 35px;">
                                                <thead class="fw-bold ">
                                                    <tr>
                                                        <th style="font-size: 25px; width: 70% ">ผู้บริหารสถานศึกษา </th>
                                                        <th style="font-size: 25px; width: 5%; text-align: right">
                                                            <?= $this->data['total_rows20'] ?></th>
                                                        <th style="font-size: 25px; width: 25%; text-align:right;">คน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($this->data['total_rows2'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ผู้อำนวยการสถานศึกษา</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows2'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if ($this->data['total_rows3'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">รองผู้อำนวยการสถานศึกษา</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows3'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="col " style="height: auto;">
                                        <div class="row" style="margin: 0px 20px 0px 20px;">
                                        <table class="mt-2">
                                            <thead class="fw-bold">
                                                <tr>
                                                    <th style="font-size: 25px; width: 70% ">ผู้สอนในหน่วยงานการศึกษา</th>
                                                    <th style="font-size: 25px; width: 5%; text-align:right; ">
                                                        <?= $this->data['total_rows21'] ?></th>
                                                    <th style="font-size: 25px; width: 25%; text-align:right; ">คน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                <?php if ($this->data['total_rows4'] > 0): ?>
                                                <tr>
                                                    <td style="font-size: 22px; padding-top: 5px">ครูผู้ช่วย</td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows4'] ?>
                                                    </td>
                                                    <td style="font-size: 22px; padding-top: 10px; text-align:right; padding-top: 5px">คน</td>
                                                </tr>
                                                <?php endif; ?>

                                                <?php if ($this->data['total_rows5'] > 0): ?>
                                                <tr>
                                                    <td style="font-size: 22px; padding-top: 5px">ครู</td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows5'] ?>
                                                    </td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                </tr>
                                                <?php endif; ?>

                                                <?php if ($this->data['total_rows6'] > 0): ?>
                                                <tr>
                                                    <td style="font-size: 22px; padding-top: 5px">อาจารย์</td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows6'] ?>
                                                    </td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                </tr>
                                                <?php endif; ?>

                                                <?php if ($this->data['total_rows7'] > 0): ?>
                                                <tr>
                                                    <td style="font-size: 22px; padding-top: 5px">ผู้ช่วยศาสตราจารย์</td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows7'] ?>
                                                    </td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                </tr>
                                                <?php endif; ?>

                                                <?php if ($this->data['total_rows8'] > 0): ?>
                                                <tr>
                                                    <td style="font-size: 22px; padding-top: 5px">รองศาสตราจารย์</td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows8'] ?>
                                                    </td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                </tr>
                                                <?php endif; ?>

                                                <?php if ($this->data['total_rows9'] > 0): ?>
                                                <tr>
                                                    <td style="font-size: 22px; padding-top: 5px">ศาสตราจารย์</td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px"><?= $this->data['total_rows9'] ?>
                                                    </td>
                                                    <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="col" style="height: auto;">
                                        <div class="row" style="margin: 0px 20px 0px 20px;">
                                            <table class="mt-2">
                                                <thead class="fw-bold">
                                                    <tr>
                                                        <th style="font-size: 25px; width: 70%">พนักงาน / ลูกจ้าง</th>
                                                        <th style="font-size: 25px; width: 5%; text-align:right;">
                                                            <?= $this->data['total_rows22'] ?></th>
                                                        <th style="font-size: 25px; width: 25%; text-align:right;">คน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($this->data['total_rows10'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ครูผู้ช่วย</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows10'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows11'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ครู</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows11'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows12'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ศึกษานิเทศก์</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows12'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows13'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ครูธุรการ</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows13'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows14'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ครูอัตราจ้าง</td>
                                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">
                                                            <?= $this->data['total_rows14'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows15'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ครูพี่เลี้ยง</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows15'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows16'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ลูกจ้างชั่วคราว</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows16'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows17'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">ลูกจ้างประจำ</td>
                                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">
                                                            <?= $this->data['total_rows17'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows18'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">เจ้าหน้าที่ธุรการ</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows18'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>

                                                    <?php if ($this->data['total_rows19'] > 0): ?>
                                                    <tr>
                                                        <td style="font-size: 22px; padding-top: 5px">อื่น ๆ</td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                                            <?= $this->data['total_rows19'] ?>
                                                        </td>
                                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col" style="height: auto;  background: #f2daae; border-radius: 5px;">
                                    <div class="row" style="margin: 0px 20px 0px 20px;">
                                        <table class="mt-2" style="padding-right: 35px;">
                                            <thead class="fw-bold ">
                                                <tr>
                                                    <th style="font-size: 25px; width: 70% ">รวม </th>
                                                    <th style="font-size: 25px; width: 5%; text-align:right;">
                                                        <?= $this->data['total_rows20'] + $this->data['total_rows21'] + $this->data['total_rows22'] ?>
                                                    </th>
                                                    <th style="font-size: 25px; width: 25%; text-align:right;">คน</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-5">
                                    <h3 for="" class="fw-bold" style="padding-left: 20px">อัตรากำลังที่จะเกษียณอายุในอีก 4
                                        ปีข้างหน้า</h3>
                                </div>
                                <div class="col-7">
                                    <div class="form-group float-end ">
                                        <a href="<?= site_url('PlanningInformation/Retire') ?>"
                                            class="btn btn-success fw-bold fs-5">รายชื่อเกษียณ</a>
                                    </div>
                                </div>
                                <table class="table table-striped mt-3 table-bordered " align="center" style="width:97.5%"> 
                                    <thead class="text-center" style="background-color: #d3d8e6;">
                                        <tr>
                                            <th>
                                                <h4 class="fw-bold"><?= $this->data['Year']  ?></h4>
                                            </th>
                                            <th>
                                                <h4 class="fw-bold"><?= $this->data['Year1'] ?></h4>
                                            </th>
                                            <th>
                                                <h4 class="fw-bold"><?= $this->data['Year2'] ?></h4>
                                            </th>
                                            <th>
                                                <h4 class="fw-bold"><?= $this->data['Year3'] ?></h4>
                                            </th>
                                            <th>
                                                <h4 class="fw-bold"><?= $this->data['Year4'] ?></h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td class="fw-bold"><?= $this->data['Retire2565'] ?></td>
                                            <td class="fw-bold"><?= $this->data['Retire2566'] ?></td>
                                            <td class="fw-bold"><?= $this->data['Retire2567'] ?></td>
                                            <td class="fw-bold"><?= $this->data['Retire2568'] ?></td>
                                            <td class="fw-bold"><?= $this->data['Retire2569'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="free-box-dash">
                                        <h3 class="fw-bold" style="padding: 8px 0 0 20px;"> อัตรากำลังตามข้าราชการครู </h3>
                                        <canvas id="chBar1"
                                            style="width:120px !important; height:55px !important; "></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="free-box-dash">
                                        <h3 class="fw-bold" style="padding: 8px 0 0 20px;">
                                            อัตรากำลังตามกลุ่มสาระการเรียนรู้</h3>
                                        <canvas id="chBar2"
                                            style="width:120px !important; height:55px !important; "></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col free-box-dash mt-3" style="height: 280px ">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="fw-bold" style="padding: 8px 0 0 20px;">
                                                    จำนวนบุคลากรที่อบรมครบ 20 ชม.</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="float-end">
                                                    <a href="<?= site_url('PlanningInformation/Show') ?>"
                                                        class="btn btn-success fw-bold fs-5">แสดงรายชื่อบุคลากรที่อบรมครบ
                                                        20
                                                        ชม.</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5 text-center">
                                            <div class="col-3" style="padding-top: 3%;">
                                                <p class="mb-0">จำนวนที่อบรมครบ <?= $this->data['Complete'] ?> คน</p>
                                                <p class="mb-0"><?= $this->data['PersonComplete'] ?> %</p>
                                            </div>
                                            <div class="col-5">
                                                <canvas id="chDonut1" style="height: 100%; width: 100%; margin-left: 20px;"></canvas>
                                            </div>
                                            <div class="col-4" style="padding-top: 3%;">
                                                <p class="mb-0" style="margin-left: 20px;">จำนวนที่อบรมไม่ครบ <br> <?= $this->data['NotComplete'] ?> คน</p>
                                                <p class="mb-0" style="margin-left: 20px;"><?= $this->data['PersonNotComplete'] ?> %</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col free-box-dash mt-3" style="height: 280px ">
                                        <h3 class="fw-bold pt-1" style="padding: 8px 0 0 20px;"> อัตรากำลังตามเพศ</h3>
                                        <div class="row mt-5 text-center">
                                            <div class="col-3" style="padding-top: 4%">
                                                <p class="mb-0">จำนวน <?= $this->data['male'] ?> คน</p>
                                                <p class="mb-0"><?= number_format($this->data['male_percent'], 2) ?> %</p>
                                                <p class="mb-0">ชาย</p>
                                            </div>
                                            <div class="col-6 ">
                                                <canvas id="chDonut2" style="height: 80%; width: 80%"></canvas>
                                            </div>
                                            <div class="col-3" style="padding-top: 4%">
                                                <p class="mb-0">จำนวน <?= $this->data['female'] ?> คน</p>
                                                <p class="mb-0"><?= number_format($this->data['female_percent'], 2) ?> %</p>
                                                <p class="mb-0">หญิง</p>
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
/* donut charts */
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

// chDonut1
var chDonutData2 = {
    labels: ["ครบ 20 ชม.", "ไม่ครบ 20 ชม."],
    datasets: [{
        backgroundColor: ['rgba(143, 186, 35)','rgba(255, 191, 0)'],
        borderWidth: 0,
        data: [<?= $this->data['Complete'] ?>,<?= $this->data['NotComplete'] ?>]
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

// donut 2
var chDonutData2 = {
    labels: ["ชาย", "หญิง"],
    datasets: [{
        backgroundColor: ['#7FB3D5', '#ffbfc3'],
        borderWidth: 0,
        data: [<?= $this->data['male']; ?>, <?= $this->data['female']; ?>]
    }]
};

var chDonut2 = document.getElementById("chDonut2");
if (chDonut2) {
    new Chart(chDonut2, {
        type: 'pie',
        data: chDonutData2,
        options: donutOptions
    });
}
</script>

<!-- ************************************************ -->

<!-- chBar1 -->
<script>
var chBar = document.getElementById("chBar1");
if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: {
            labels: ["คศ.1", "คศ.2", "คศ.3", "คศ.4", "คศ.5"],
            datasets: [{
                data: [<?= $this->data['KS1']; ?>, <?= $this->data['KS2']; ?>, <?= $this->data['KS3']; ?>, <?= $this->data['KS4']; ?>, <?= $this->data['KS5']; ?>,
                    <?= $this->data['Graph']; ?>, 0
                ],
                backgroundColor: [
                    'rgba(100, 149, 237)',
                    'rgba(100, 149, 237)',
                    'rgba(100, 149, 237)',
                    'rgba(100, 149, 237)',
                    'rgba(100, 149, 237)',
                    'rgba(100, 149, 237)',

                ],
            }, ]

        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    barPercentage: 1,
                    categoryPercentage: 0.6
                }]
            }
        }
    });
}
</script>
<!-- chBar2 -->
<script>
var chBar = document.getElementById("chBar2");
if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: {
            labels: ["ภาษาไทย", "คณิตศาสตร์", "วิทยาศาสตร์", "ศิลปะ", "สังคมศึกษา", "สุขศึกษา ", "การงานอาชีพ",
                "ภาษาต่างประเทศ"
            ],
            datasets: [{
                data: [<?= $this->data['Thailanguage']; ?>, <?= $this->data['Mathematics']; ?>, <?= $this->data['Science']; ?>, <?= $this->data['Art']; ?>,
                    <?= $this->data['Social']; ?>, <?= $this->data['health']; ?>, <?= $this->data['Career']; ?>, <?= $this->data['England']; ?>,
                    <?= $this->data['Graph']; ?>, 0
                ],
                backgroundColor: [
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)',
                    'rgba(252, 177, 91)'
                ],
            }, ]

        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    barPercentage: 1,
                    categoryPercentage: 0.6
                }]
            }
        }
    });
}
</script>