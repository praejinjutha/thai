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
                <a class="float-start" href="<?= site_url('PersonnelHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">การประเมินผลการพัฒนางานตามข้อตกลง PA</label>
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
                                        <div class="col-md-2 mt-4">
                                            <h3 class="fw-bold">ปีการศึกษา</h3>
                                            <select class="form-select" id="Year">
                                                <?php
                                                    foreach ($loopYear as $row => $Year) {
                                                ?>
                                                <option value="<?= $Year ?>" class="select-fnz">
                                                    <?= $Year ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                            <button type="button" class="btn btn-blankform fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalTeacher">การประเมินผลการปฏิบัติงาน<br>ครูและบุคลากรทางการศึกษา</button>
                                            <div class="modal fade" id="ModalTeacher">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                                                    แบบข้อตกลงในการพัฒนางาน (PA1 - PA5) สำหรับข้าราชการครูและบุคลากรทางการศึกษา
                                                                </h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="row mt-4">
                                                                                <div class="col">
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู ไม่มีวิทยฐานะ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู ไม่มีวิทยฐานะ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู ชำนาญการ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู ชำนาญการพิเศษ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู เชี่ยวชาญ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู เชี่ยวชาญพิเศษ</a>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู ไม่มีวิทยฐานะ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู ไม่มีวิทยฐานะ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู ชำนาญการ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู ชำนาญการพิเศษ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู เชี่ยวชาญ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู เชี่ยวชาญพิเศษ</a>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <a href="<?= $themes ?>assets/file/PA3 Personnel/PA 3 แบบสรุปผลการประเมินการพัฒนางาน.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 3 แบบสรุปผลการประเมินการพัฒนางาน</a><br>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-4">
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู ชำนาญการ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู ชำนาญการพิเศษ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู เชี่ยวชาญ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู เชี่ยวชาญพิเศษ</a><br>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="float-start">
                                                                                    <a href="<?= $themes ?>assets/file/PA5 Personnel/แบบประเมินด้านผลงานทางวิชาการ ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 5 แบบประเมินด้านผลงานทางวิชาการ ครู เชี่ยวชาญ</a><br>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-2"></div>
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
                                            <button type="button" class="btn btn-blankform fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalExecutive">การประเมินผลการปฏิบัติงาน<br>ผู้บริหารสถานศึกษา</button>
                                            <div class="modal fade" id="ModalExecutive">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                                                    แบบข้อตกลงในการพัฒนางาน (PA1 - PA3) สำหรับผู้บริหารสถานศึกษา
                                                                </h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row mt-4">
                                                                        <div class="col">
                                                                            <a href="<?= $themes ?>assets/file/PA1 SchoolAdministrators/PA 1 บส ยังไม่มีวิทยะฐานะ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 บส ไม่มีวิทยฐานะ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA1 SchoolAdministrators/PA 1 บส วิทยฐานะชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 บส ชำนาญการ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA1 SchoolAdministrators/PA 1 บส วิทยะฐานะชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 บส ชำนาญการพิเศษ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA1 SchoolAdministrators/PA 1 บส วิทยฐานะเชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 บส เชี่ยวชาญ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA1 SchoolAdministrators/PA 1 บส วิทยะฐานะเชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 บส เชี่ยวชาญพิเศษ</a>
                                                                        </div>
                                                                        <div class="col">
                                                                            <a href="<?= $themes ?>assets/file/PA2 SchoolAdministrators/PA 2 บส ไม่มีวิทยฐานะ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 บส ไม่มีวิทยะฐานะ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA2 SchoolAdministrators/PA 2 บส ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 บส ชำนาญการ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA2 SchoolAdministrators/PA 2 บส ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 บส ชำนาญการพิเศษ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA2 SchoolAdministrators/PA 2 บส เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 บส เชี่ยวชาญ</a><br>
                                                                            <a href="<?= $themes ?>assets/file/PA2 SchoolAdministrators/PA 2 บส เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 บส เชี่ยวชาญพิเศษ</a>
                                                                        </div>
                                                                        <div class="col">
                                                                            <a href="<?= $themes ?>assets/file/PA3 SchoolAdministrators/PA 3 บส แบบสรุปผลการประเมิน.docx" class="fw-bold" style="text-decoration: none;">
                                                                            <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 3 บส แบบสรุปผลการประเมิน</a><br>
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
                                            <div class="row">
                                                <p class="fw-bold mt-4">หมายเหตุ</p>
                                                <div class="col-2 text-center">
                                                    <i class="fa-solid text-success fa-check"></i>
                                                </div>
                                                <div class="col-2 text-center">=</div>
                                                <div class="col">
                                                    <span class="fw-bold">ผ่าน</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2 text-center">
                                                    <i class="fa-solid text-danger fa-xmark"></i>
                                                </div>
                                                <div class="col-2 text-center">=</div>
                                                <div class="col">
                                                    <span class="fw-bold">ไม่ผ่าน</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2 text-center">
                                                    <i class="fa-solid text-primary fa-user-clock"></i> 
                                                </div>
                                                <div class="col-2 text-center">=</div>
                                                <div class="col">
                                                    <span class="fw-bold">รอการประเมิน</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 mt-3 tbodyDiv">
                                            <table class="table table-striped mt-2 table-bordered" id="tbl_IDPlan">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th width="80px">
                                                            <h3 class="fw-bold">ลำดับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ชื่อ - นามสกุล</h3>
                                                        </th>
                                                        <th width="350px">
                                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">PA 1</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">PA 2</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">PA 3</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">PA 4</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">PA 5</h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">เพิ่ม/แก้ไข</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col" id="tbcount" style="margin-left: 17%">

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
    get_IDPlan();
});

$('#Year').change(get_IDPlan);

function get_IDPlan() {
    let Year = $('#Year').val();
    let table_body = $('#tbl_IDPlan tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('IDplan/fech_IDPlan') ?>",
        method: "POST",
        data: {
            Year: Year
        },
        dataType: 'json',
        success: function(data) {  console.log(data);
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="5" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let PA1 = row.PA1 === 'ผ่าน' ? '<i class="fa-solid text-success fa-check mt-2"></i>' : row.PA1 === 'ไม่ผ่าน' ? '<i class="fa-solid text-danger fa-xmark mt-2"></i>' : row.PA1 === 'รอประเมิน' ? '<i class="fa-solid text-primary fa-user-clock mt-2"></i>' : '';
                    let PA2 = row.PA2 === 'ผ่าน' ? '<i class="fa-solid text-success fa-check mt-2"></i>' : row.PA2 === 'ไม่ผ่าน' ? '<i class="fa-solid text-danger fa-xmark mt-2"></i>' : row.PA2 === 'รอประเมิน' ? '<i class="fa-solid text-primary fa-user-clock mt-2"></i>' : '';
                    let PA3 = row.PA3 === 'ผ่าน' ? '<i class="fa-solid text-success fa-check mt-2"></i>' : row.PA3 === 'ไม่ผ่าน' ? '<i class="fa-solid text-danger fa-xmark mt-2"></i>' : row.PA3 === 'รอประเมิน' ? '<i class="fa-solid text-primary fa-user-clock mt-2"></i>' : '';
                    let PA4 = row.PA4 === 'ผ่าน' ? '<i class="fa-solid text-success fa-check mt-2"></i>' : row.PA4 === 'ไม่ผ่าน' ? '<i class="fa-solid text-danger fa-xmark mt-2"></i>' : row.PA4 === 'รอประเมิน' ? '<i class="fa-solid text-primary fa-user-clock mt-2"></i>' : '';
                    let PA5 = row.PA5 === 'ผ่าน' ? '<i class="fa-solid text-success fa-check mt-2"></i>' : row.PA5 === 'ไม่ผ่าน' ? '<i class="fa-solid text-danger fa-xmark mt-2"></i>' : row.PA5 === 'รอประเมิน' ? '<i class="fa-solid text-primary fa-user-clock mt-2"></i>' : '';
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td align="left">${row.FullName || ''}</td>
                            <td>${row.PosName || ''}</td>
                            <td>${PA1 || ''}</td>
                            <td>${PA2 || ''}</td>
                            <td>${PA3 || ''}</td>
                            <td>${PA4 || ''}</td>
                            <td>${PA5 || ''}</td>
                            <td><a href="<?= site_url('IDplan/show/') ?>${row.IDCard}" class="btn btn-primary fw-bold fs-4">ดูข้อมูล</a>
                            </td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}
</script>