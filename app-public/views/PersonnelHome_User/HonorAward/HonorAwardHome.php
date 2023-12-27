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
                <label class="mt-1">การยกย่องเชิดชูเกียรติ / รางวัลเกียรติยศ</label>
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
                                            <h2 class="fw-bold" style="font-size: 26px">ปีการศึกษา</h2>
                                            <select class="form-select" id="EdYear">
                                                <option value="" class="select-fnz">----- แสดงข้อมูลทั้งหมด -----
                                                </option>
                                                <?php
                                                foreach ($loopYear as $row => $Year) {
                                                ?>
                                                <option value="<?= $Year ?>" class="select-fnz"><?= $Year ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <h2 class="fw-bold mt-2" style="font-size: 26px">ตำแหน่ง</h2>
                                            <select class="form-select" id="Position" name="Position">

                                            </select>
                                            <hr>
                                            <!-- **** Modal **** -->
                                            <div class="modal fade" id="ModalAdd" aria-labelledby="myModalLabel6" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <form action="" method="POST" id="InsertHonorAward" role="form">
                                                            <div class="modal-body">
                                                                <div class="tab">
                                                                    <h5 class="card-title fw-bold"
                                                                        style="color: #18409e;font-size: 32px;">
                                                                        เพิ่มข้อมูลการยกย่องเชิดชูเกียรติ / รางวัลเกียรติยศ
                                                                    </h5>
                                                                </div>
                                                                <div id="modal-setting-7" class="tabcontent">
                                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold fs-4">ปีการศึกษา</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" id="Year" name="Year">
                                                                                        <option class="select-fnz"></option>
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
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold fs-4">วันที่ได้รับ</label>
                                                                                    <div class="col">
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date"
                                                                                            name="Date" value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ผู้ที่ได้รับรางวัล</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" id="Recipient">
                                                                                            <option value="" class="select-fnz"></option>
                                                                                                <?php 
                                                                                                    foreach ($FullName as $row) {
                                                                                                        if ($row->FullName !== $this->data['FullName']) {
                                                                                                ?>
                                                                                                <option class="select-fnz"
                                                                                                    value="<?= $row->FullName ?>">
                                                                                                    <?= $row->FullName ?>
                                                                                                </option>
                                                                                                <?php
                                                                                                        }
                                                                                                    }
                                                                                                ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ตำแหน่ง</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" name="PoLine" id="PoLine" onclick="removeOption_HonorAward()">
                                                                                            <option value="" class="select-fnz"></option>
                                                                                            <?php 
                                                                                                foreach ($PosName as $row) {
                                                                                            ?>
                                                                                            <option class="select-fnz"value="<?= $row->PosName ?>"><?= $row->PosName ?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ชื่อรางวัล</label>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control" id="PrizeName" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ระดับรางวัล</label>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control" id="PrizeLevel" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">หน่วยงานที่จัด/มอบ</label>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control" id="Organizer" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label for="" class="fw-bold fs-4 mt-2">แนบไฟล์</label>
                                                                                    <input class="form-control" type="file" id="FileNm" name="FileNm" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- ***************** เลือกไฟล์ภาพ *******************-->
                                                                        <div class="row mt-2">
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="<?= $themes ?>assets/images/no_img/WaitPhoto.png"
                                                                                        width="200" height="" alt="logo" id="previewPic1"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic1" name="Pic1" onchange="previewPic(this, 'previewPic1')" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="<?= $themes ?>assets/images/no_img/WaitPhoto.png"
                                                                                        width="200" height="" alt="logo" id="previewPic2" />
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic2" name="Pic2" onchange="previewPic(this, 'previewPic2')" value="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="<?= $themes ?>assets/images/no_img/WaitPhoto.png"
                                                                                        width="200" height="" alt="logo" id="previewPic3"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic3" name="Pic3" onchange="previewPic(this, 'previewPic3')" value="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="<?= $themes ?>assets/images/no_img/WaitPhoto.png"
                                                                                        width="200" height="" alt="logo" id="previewPic4"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic4" name="Pic4" onchange="previewPic(this, 'previewPic4')" value="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="<?= $themes ?>assets/images/no_img/WaitPhoto.png"
                                                                                        width="200" height="" alt="logo" id="previewPic5"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic5" name="Pic5" onchange="previewPic(this, 'previewPic5')" value="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="<?= $themes ?>assets/images/no_img/WaitPhoto.png"
                                                                                        width="200" height="" alt="logo" id="previewPic6"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic6" name="Pic6" onchange="previewPic(this, 'previewPic6')" value="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="sudmit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                    <button type="button" class="btn btn-secondary fw-bold fs-4"
                                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col text-center">
                                                    <button type="button" class="btn btn-success fw-bold fs-4 w-100"
                                                        style='font-size:20px; width: 70px;' data-bs-toggle="modal"
                                                        data-bs-target="#ModalAdd">+ เพิ่มข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 tbodyDiv">
                                            <table class="table table-striped mt-2 table-bordered" id="tbl_HonorAward">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ลำดับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                วันที่ได้รับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ผู้ที่ได้รับรางวัล
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ตำแหน่ง</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ชื่อรางวัล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ระดับ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ไฟล์แนบ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                แนบรูป
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                แก้ไข
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ลบ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ส่งออก
                                                            </h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center ">
                                                    
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
    get_HonorAward();
});

$('#EdYear').change(checkpostition);
$('#Position').change(get_HonorAward);

function checkpostition() {
    get_Position();
    get_HonorAward();
}

function get_Position() {
    let EdYear = $('#EdYear').val();
    $.ajax({
        url: "<?= site_url('User_Controller/HonorAward/fetch_Position') ?>",
        method: "POST",
        data: {
            EdYear: EdYear
        },
        success: function(data) {
            $('#Position').html(data);
        }
    });
}

function get_HonorAward() {
    let EdYear = $('#EdYear').val();
    let Position = $('#Position').val();
    let table_body = $('#tbl_HonorAward tbody');
    let count = 0;
    
    $.ajax({
        url: "<?= site_url('User_Controller/HonorAward/fech_HonorAward') ?>",
        method: "POST",
        data: { 
            EdYear: EdYear,
            Position: Position
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="11" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${new Date(row.Date).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td align="left">${row.Recipient || ''}</td>
                            <td>${row.PoLine || ''}</td>
                            <td>${row.PrizeName || ''}</td>
                            <td>${row.PrizeLevel || ''}</td>
                            <td><a href="<?= site_url('User_Controller/HonorAward/export/') ?>${row.ID}">${row.FileNm || ''}</a></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalPic${count}"><i class="fa-sharp fa-solid fa-images"></i></button>
                                <div class="modal fade" id="myModalPic${count}" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom: 0">
                                                <h5 class="modal-title fw-bold fs-2" style="color: #18409e;font-size: 32px;">รูปภาพ</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <hr style="color: #eac178;height: 3px;opacity: 1; margin: 0 20px 0 20px;">
                                            <div class="modal-body">
                                                <div class="row text-center">
                                                    <div class="col-md-4">
                                                        <img src="${row.Pic1 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}" id="Pic1${count}" width="300" height="" alt="logo" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="${row.Pic2 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}" id="Pic2${count}" width="300" height="" alt="logo" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="${row.Pic3 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}" id="Pic3${count}" width="300" height="" alt="logo" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row text-center">
                                                    <div class="col-md-4">
                                                        <img src="${row.Pic4 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}" id="Pic4${count}" width="300" height="" alt="logo" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="${row.Pic5 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}" id="Pic5${count}" width="300" height="" alt="logo" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="${row.Pic6 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}" id="Pic6${count}" width="300" height="" alt="logo" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#ModalEdit${count}">แก้ไข</a>
                                <div class="modal fade" id="ModalEdit${count}" aria-labelledby="myModalLabel6" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left;">
                                                <div class="tab">
                                                                    <h5 class="card-title fw-bold"
                                                                        style="color: #18409e;font-size: 32px;">
                                                                        เพิ่มข้อมูลการยกย่องเชิดชูเกียรติ / รางวัลเกียรติยศ
                                                                    </h5>
                                                                </div>
                                                                <div id="modal-setting-7" class="tabcontent">
                                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold fs-4">ปีการศึกษา</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" id="Year_Edit${count}" name="Year_Edit" onclick="removeOption_HonorAward()" disabled>
                                                                                        <option value="${row.EdYear}" class="select-fnz">${row.EdYear}</option>
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
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1 fw-bold fs-4">วันที่ได้รับ</label>
                                                                                    <div class="col">
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date_Edit${count}"
                                                                                            name="Date_Edit" value="${row.Date}" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ผู้ที่ได้รับรางวัล</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" id="Recipient_Edit${count}" disabled>
                                                                                            <option value="${row.Recipient}" class="select-fnz">${row.Recipient}</option>
                                                                                                <?php 
                                                                                                    foreach ($FullName as $row) {
                                                                                                        if ($row->FullName !== $this->data['FullName']) {
                                                                                                ?>
                                                                                                <option class="select-fnz"
                                                                                                    value="<?= $row->FullName ?>">
                                                                                                    <?= $row->FullName ?>
                                                                                                </option>
                                                                                                <?php
                                                                                                        }
                                                                                                    }
                                                                                                ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ตำแหน่ง</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" name="PoLine_Edit" id="PoLine_Edit${count}" onclick="removeOption_HonorAward()" disabled>
                                                                                            <option value="${row.PoLine}" class="select-fnz">${row.PoLine}</option>
                                                                                            <?php 
                                                                                                    foreach ($PosName as $row) {
                                                                                                ?>
                                                                                                <option class="select-fnz"
                                                                                                    value="<?= $row->PosName ?>">
                                                                                                    <?= $row->PosName ?>
                                                                                                </option>
                                                                                                <?php
                                                                                                    }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ชื่อรางวัล</label>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control" id="PrizeName_Edit${count}" value="${row.PrizeName}" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">ระดับรางวัล</label>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control" id="PrizeLevel_Edit${count}" value="${row.PrizeLevel}" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group ">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-2 fw-bold fs-4">หน่วยงานที่จัด/มอบ</label>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control" id="Organizer_Edit${count}" value="${row.Organizer}" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                                    <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                    <a href="<?= site_url('User_Controller/HonorAward/export/') ?>${row.ID}"><input class="form-control" type="text" id="FileNameEdit${count}" name="FileNameEdit" value="${row.FileNm !== null ? row.FileNm : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                                                </div>
                                                                                <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                                    <label for="" class="fw-bold">แนบไฟล์</label>
                                                                                    <input class="form-control" type="file" id="FileNm_Edit${count}" name="FileNm_Edit">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- ***************** เลือกไฟล์ภาพ *******************-->
                                                                        <div class="row mt-2">
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="${row.Pic1 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}"
                                                                                        width="200" height="" id="previewImg1"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic1_Edit${count}" name="Pic1_Edit" onchange="previewImage(this, 'previewImg1')" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="${row.Pic2 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}"
                                                                                        width="200" height="" id="previewImg2"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic2_Edit${count}" name="Pic2_Edit" onchange="previewImage(this, 'previewImg2')" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="${row.Pic3 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}"
                                                                                        width="200" height="" id="previewImg3"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic3_Edit${count}" name="Pic3_Edit" onchange="previewImage(this, 'previewImg3')" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="${row.Pic4 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}"
                                                                                        width="200" height="" id="previewImg4"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic4_Edit${count}" name="Pic4_Edit" onchange="previewImage(this, 'previewImg4')" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="${row.Pic5 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}"
                                                                                        width="200" height="" id="previewImg5"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic5_Edit${count}" name="Pic5_Edit" onchange="previewImage(this, 'previewImg5')" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col ">
                                                                                <div class="form-group text-center">
                                                                                    <img src="${row.Pic6 || '<?= $themes ?>assets/images/no_img/WaitPhoto.png'}"
                                                                                        width="200" height="" id="previewImg6"/>
                                                                                    <div class="col mt-1">
                                                                                        <input class="form-control" type="file" id="Pic6_Edit${count}" name="Pic6_Edit" onchange="previewImage(this, 'previewImg6')" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-md-12 ">
                                                                            <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEditFile(${count}, this)">แก้ไข</button>
                                                                    <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateHonorAward(${row.ID}, ${count})">บันทึก</button>
                                                                    <button type="button" class="btn btn-secondary fw-bold fs-4"
                                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                            </td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="DeleteHonorAward('${row.ID}')">ลบ</a></td>
                            <td><a href="<?= site_url('User_Controller/HonorAward/Export_Data/')?>${row.ID}" class="btn btn-primary fw-bold fs-4">ส่งออก</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

$('#InsertHonorAward').submit(function(e) {
    e.preventDefault();
    InsertHonorAward();
});

function InsertHonorAward() {
    let EdYear = $('#Year').val();
    let Date = $('#Date').val();
    let Recipient = $('#Recipient').val();
    let PoLine = $('#PoLine').val();
    let PrizeName = $('#PrizeName').val();
    let PrizeLevel = $('#PrizeLevel').val();
    let Organizer = $('#Organizer').val();
    let FileNm = $('#FileNm')[0].files[0];
    let Pic1 = $('#Pic1')[0].files[0];
    let Pic2 = $('#Pic2')[0].files[0];
    let Pic3 = $('#Pic3')[0].files[0];
    let Pic4 = $('#Pic4')[0].files[0];
    let Pic5 = $('#Pic5')[0].files[0];
    let Pic6 = $('#Pic6')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('Date', Date);
    formData.append('Recipient', Recipient);
    formData.append('PoLine', PoLine);
    formData.append('PrizeName', PrizeName);
    formData.append('PrizeLevel', PrizeLevel);
    formData.append('Organizer', Organizer);
    formData.append('FileNm', FileNm);
    formData.append('Pic1', Pic1);
    formData.append('Pic2', Pic2);
    formData.append('Pic3', Pic3);
    formData.append('Pic4', Pic4);
    formData.append('Pic5', Pic5);
    formData.append('Pic6', Pic6);

    $.ajax({
        url: "<?= site_url('User_Controller/HonorAward/Insert_HonorAward') ?>",
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

function UpdateHonorAward(ID, modalCount) {
    let EdYear = $(`#Year_Edit${modalCount}`).val();
    let Date = $(`#Date_Edit${modalCount}`).val();
    let Recipient = $(`#Recipient_Edit${modalCount}`).val();
    let PoLine = $(`#PoLine_Edit${modalCount}`).val();
    let PrizeName = $(`#PrizeName_Edit${modalCount}`).val();
    let PrizeLevel = $(`#PrizeLevel_Edit${modalCount}`).val();
    let Organizer = $(`#Organizer_Edit${modalCount}`).val();
    let FileNm = $(`#FileNm_Edit${modalCount}`)[0].files[0];
    let Pic1 = $(`#Pic1_Edit${modalCount}`)[0].files[0];
    let Pic2 = $(`#Pic2_Edit${modalCount}`)[0].files[0];
    let Pic3 = $(`#Pic3_Edit${modalCount}`)[0].files[0];
    let Pic4 = $(`#Pic4_Edit${modalCount}`)[0].files[0];
    let Pic5 = $(`#Pic5_Edit${modalCount}`)[0].files[0];
    let Pic6 = $(`#Pic6_Edit${modalCount}`)[0].files[0];
    
    let formData = new FormData();
    formData.append('ID', ID);
    formData.append('EdYear', EdYear);
    formData.append('Date', Date);
    formData.append('Recipient', Recipient);
    formData.append('PoLine', PoLine);
    formData.append('PrizeName', PrizeName);
    formData.append('PrizeLevel', PrizeLevel);
    formData.append('Organizer', Organizer);
    formData.append('FileNm', FileNm);
    formData.append('Pic1', Pic1);
    formData.append('Pic2', Pic2);
    formData.append('Pic3', Pic3);
    formData.append('Pic4', Pic4);
    formData.append('Pic5', Pic5);
    formData.append('Pic6', Pic6);
    
    $.ajax({
        url: "<?= site_url('User_Controller/HonorAward/update_HonorAward') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) { console.log(results);
            if (results == 'Success') {
                $(`#ModalEdit${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (results == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function DeleteHonorAward(ID) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('User_Controller/HonorAward/delete_HonorAward') ?>",
                type: 'POST',
                data: {
                    ID: ID
                },
                success: function(results) {
                    if (results == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

function previewImage(input, imgId) {
    let file = input.files[0];
    let reader = new FileReader();
    let previewImg = document.getElementById(imgId);

    reader.onload = function(e) {
        previewImg.src = e.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '<?php echo $themes . 'assets/images/no_img/200x200.png'; ?>';
    }

    let fileName = input.files[0].name;
    let nextSibling = input.nextElementSibling;
    if (nextSibling) {
        nextSibling.innerText = fileName;
    }
}

function previewPic(input, imgId) {
    let file = input.files[0];
    let reader = new FileReader();
    let previewImg = document.getElementById(imgId);

    reader.onload = function(e) {
        previewImg.src = e.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '<?php echo $themes . 'assets/images/no_img/200x200.png'; ?>';
    }

    let fileName = input.files[0].name;
    let nextSibling = input.nextElementSibling;
    if (nextSibling) {
        nextSibling.innerText = fileName;
    }
}

function toggleEditFile(count, button) {
    let FileNameDownloadDiv = document.getElementById(`FileNameDownload${count}`);
    let FileNameInputDiv = document.getElementById(`FileNameInput${count}`);
    let editButton = button;
    let saveButton = editButton.nextElementSibling;

    if (FileNameDownloadDiv.style.display === "none") {
        FileNameDownloadDiv.style.display = "block";
        FileNameInputDiv.style.display = "none";
        editButton.style.display = "block";
        saveButton.style.display = "none";
    } else {
        FileNameDownloadDiv.style.display = "none";
        FileNameInputDiv.style.display = "block";
        editButton.style.display = "none";
        saveButton.style.display = "block";
    }
}

$(document).on("click", "#edit", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#Year_Edit" + count).prop("disabled", false);
    $("#Date_Edit" + count).prop("readonly", false);
    $("#PoLine_Edit" + count).prop("disabled", false);
    $("#PrizeName_Edit" + count).prop("readonly", false);
    $("#PrizeLevel_Edit" + count).prop("readonly", false);
    $("#Organizer_Edit" + count).prop("readonly", false);
    $("#FileNm_Edit" + count).prop("disabled", false);
    $("#Pic1_Edit" + count).prop("disabled", false);
    $("#Pic2_Edit" + count).prop("disabled", false);
    $("#Pic3_Edit" + count).prop("disabled", false);
    $("#Pic4_Edit" + count).prop("disabled", false);
    $("#Pic5_Edit" + count).prop("disabled", false);
    $("#Pic6_Edit" + count).prop("disabled", false);
});

function removeOption_HonorAward(modalCount) {
    $("select[name='Year_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PoLine_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='PoLine'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}

</script>