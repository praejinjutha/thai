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
                <label class="mt-1">นำเข้ารายชื่อบุคลากร</label>
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
            <div class="row mt-2">
                <div class="col-md-2">
                    <h4 class="fw-bold" style="font-size: 26px;">1. เลือกไฟล์รายชื่อ</h4>
                    <div class="input-group ">
                        <input type="file" class="form-control" id="Excel_file" name="Excel_file"
                            onchange="getDataExcel()">
                    </div>
                    <p class="fw-bold mt-3"><a href="<?= $themes ?>assets/fileexcel/ตัวอย่างไฟล์นำเข้า.xlsx" style="text-decoration: none;">
                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;ดาวน์โหลดตัวอย่างไฟล์นำเข้า.xlsx</a></p>
                    <hr>
                    <div class="col fw-bold select-fnz">
                        <label>หมายเหตุ</label>
                        <label>* คำนำหน้า ได้แก่ นาย, นาง, นางสาว, ครู, ว่าที่ ร.ต., Dr., Mr., Mrs, Miss.
                            เป็นต้น</label>
                        <label style="color: red;">* เลขบัตรประจำตัวประชาชน ใส่เฉพาะตัวเลขเท่านั้น</label>
                        <label style="color: red;">* เพศ ให้ใส่เป็น M หรือ F ตัวอักษรพิมพ์ใหญ่เท่านั้น</label><br>
                        <label style="padding-left: 13px"> M = ผู้ชาย <i class="fa-solid fa-mars"
                                style="font-size: 20px; color: #03a9f4;"></i></label><br>
                        <label style="padding-left: 13px"> F&nbsp; = ผู้หญิง <i class="fa-solid fa-venus"
                                style="font-size: 20px; color: #ec407a;"></i></label>
                    </div>
                </div>
                <div class="col-md-10">
                    <form action="" method="POST" id="FrmInsertExcel" role="form">
                        <div class="col tbodyDiv">

                            <table class="table table-striped table-bordered" id="ShowExcelData">
                                <thead class="text-center ">
                                    <tr>
                                        <th>
                                            <h3 class="fw-bold mt-2">ลำดับ</h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">คำนำหน้า</h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">ชื่อ</h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">นามสกุล</h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">เลขบัครประชาชน
                                            </h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">เพศ
                                            </h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">เชื้อชาติ
                                            </h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">สัญชาติ
                                            </h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">ศาสนา
                                            </h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">วุฒิการศึกษา
                                            </h3>
                                        </th>
                                        <th>
                                            <h3 class="fw-bold mt-2">หมู่โลหิต
                                            </h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>

                        </div>
                        <div class="col text-center mt-2">
                            <button type="submit" class="btn btn-primary fw-bold fs-4" id="saveDataButton"
                                style="display: none">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('#Excel_file').change(getDataExcel);

function getDataExcel() {
    let formData = new FormData();
    formData.append('Excel_file', $('#Excel_file')[0].files[0]);

    $.ajax({
        url: '<?= site_url('ImportData/Read_Excel')?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            let jsonData = JSON.parse(data);
            let tableBody = "";
            count = 0;
            $.each(jsonData, function(index, value) {
                count++;
                tableBody += `<tr>
                <td>${count}</td>
                <td><input type='text' class='form-control text-center' name='PName[]' value='${value[0]}' required></td>
                <td><input type='text' class='form-control text-center' name='FTName[]' value='${value[1]}' required></td>
                <td><input type='text' class='form-control text-center' name='LTName[]' value='${value[2]}' required></td>";
                <td><input type='text' class='form-control text-center' name='IDCard[]' value='${value[3]}' required></td>";
                <td><input type='text' class='form-control text-center' name='Sex[]' value='${value[9]}' required></td>";
                <td><input type='text' class='form-control text-center' name='Race[]' value='${value[5]}' required></td>";
                <td><input type='text' class='form-control text-center' name='Nationnality[]' value='${value[6]}' required></td>";
                <td><input type='text' class='form-control text-center' name='Religion[]' value='${value[7]}' required></td>";
                <td><input type='text' class='form-control text-center' name='PlaceBA[]' value='${value[4]}' required></td>";
                <td><input type='text' class='form-control text-center' name='BloodG[]' value='${value[8]}' required></td>";
                </tr>`;
            });
            $("#ShowExcelData tbody").html(tableBody);
            $("#saveDataButton").show();
        }
    });
}

$('#FrmInsertExcel').submit(function(e) {
    e.preventDefault();
    FrmInsertExcel();
});

function FrmInsertExcel() {
    let PName = $('input[name="PName[]"]').toArray().map(e => e.value);
    let FTName = $('input[name="FTName[]"]').toArray().map(e => e.value);
    let LTName = $('input[name="LTName[]"]').toArray().map(e => e.value);
    let IDCard = $('input[name="IDCard[]"]').toArray().map(e => e.value);
    let Sex = $('input[name="Sex[]"]').toArray().map(e => e.value);
    let Race = $('input[name="Race[]"]').toArray().map(e => e.value);
    let Nationnality = $('input[name="Nationnality[]"]').toArray().map(e => e.value);
    let Religion = $('input[name="Religion[]"]').toArray().map(e => e.value);
    let PlaceBA = $('input[name="PlaceBA[]"]').toArray().map(e => e.value);
    let BloodG = $('input[name="BloodG[]"]').toArray().map(e => e.value);

    $.ajax({
        url: '<?= site_url('ImportData/importFiles')?>',
        type: 'POST',
        data: {
            PName: PName,
            FTName: FTName,
            LTName: LTName,
            IDCard: IDCard,
            Sex: Sex,
            Race: Race,
            Nationnality: Nationnality,
            Religion: Religion,
            PlaceBA: PlaceBA,
            BloodG: BloodG
        },
        success: function(data) {
            if (data == 1) {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (data == 2) {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}
</script>