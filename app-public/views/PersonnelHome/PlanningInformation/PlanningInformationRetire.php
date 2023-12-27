<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PlanningInformation') ?>"><i
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
        <div class="col-sm-12">
            <div class="card m-3 mt-0">
                <div class="card-body">
                    <div class="row text-center">
                        <h3 class="fw-bold">แสดงรายชื่อบุคลากรที่จะเกษียณอายุ</h3>
                        <hr>
                        <div class="col-5" align="right">
                            <label for="" class="fw-bold">ปีการศึกษา</label>
                        </div>
                        <div class="col-2">
                            <select class="form-select w-100" id="Year">
                                <option selected class="select-fnz" value="1">----- แสดงข้อมูลทั้งหมด -----</option>
                                <?php
                                    foreach ($loopRetire as $row => $Year) {
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
                            <table class="table table-striped table-bordered mt-3" id="tbl_PlanningInformationRetire">
                                <thead class="text-center">
                                    <tr>
                                        <th>
                                            <h3 class="fw-bold">ลำดับที่</h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold">ชื่อ - นามสกุล</h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <p class="fw-bold text-center mt-3"> แสดงรายชื่อบุคลากรที่จะเกษียณอายุในปี <span id="tbYears"></span> จำนวน <span
                            style="color: red;" id="tbcount">1</span> คน</p>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <table class="table table-striped table-bordered">
                                <thead class="text-center" style="background-color: #d3d8e6;">
                                    <tr>
                                        <th>
                                            <h4 class="fw-bold"><?= $this->data['Year'] ?></h4>
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
                                        <td class="fw-bold"> <?= $this->data['Retire2565'] ?> </td>
                                        <td class="fw-bold"> <?= $this->data['Retire2566'] ?> </td>
                                        <td class="fw-bold"> <?= $this->data['Retire2567'] ?> </td>
                                        <td class="fw-bold"> <?= $this->data['Retire2568'] ?> </td>
                                        <td class="fw-bold"> <?= $this->data['Retire2569'] ?> </td>
                                    </tr>
                                </tbody>
                            </table>
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
    PlanningInformationRetire();
});

$('#Year').change(PlanningInformationRetire);

function PlanningInformationRetire() {
    let Year = $('#Year').val();
    let table_body = $('#tbl_PlanningInformationRetire tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PlanningInformation/fech_PlanningInformationRetire') ?>",
        method: "POST",
        data: {
            Year: Year
        },
        dataType: 'json',
        success: function(data) { console.log(data);
            table_body.html('');
            if (data.results.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="3" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);

                let Years = `${data.Years}`;
                if (Years === '1') {
                    Years = 'ทั้งหมด';
                }
                $('#tbYears').text(Years);
            } else {
                count = 0;
                $.each(data.results, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td align="left">${row.FullName}</td>
                            <td>${row.PosName}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
                let Years = `${data.Years}`;
                if (Years === '1') {
                    Years = 'ทั้งหมด';
                }
                $('#tbYears').text(Years);
            }
            $('#tbcount').text(`${count}`);
        }
    });
}
</script>