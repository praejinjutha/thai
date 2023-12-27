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
                <label class="mt-1">การขอพระราชทานเครื่องราชอิสริยาภรณ์</label>
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
                                            <select class="form-select" id="Year">
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
                                            <hr>

                                            <!-- **** Modal **** -->
                                            <div class="modal fade" id="myModal6" aria-labelledby="myModalLabel6"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form action="" method="POST" id="InsertRequestForInsignia"
                                                            role="form">
                                                            <div class="modal-body">
                                                                <div class="tab">
                                                                    <h5 class="card-title fw-bold"
                                                                        style="color: #18409e;font-size: 32px;">
                                                                        เพิ่มข้อมูลการขอพระราชทานเครื่องราชอิสริยาภรณ์
                                                                    </h5>
                                                                </div>
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1 fw-bold fs-4">ปีการศึกษา</label>
                                                                                <div class="col w-50">
                                                                                    <select class="form-select"
                                                                                        id="Acyear">
                                                                                        <option value=""
                                                                                            class="select-fnz">
                                                                                        </option>
                                                                                        <?php
                                                                                            foreach ($loopYear as $row => $Year) {
                                                                                            ?>
                                                                                        <option value="<?= $Year ?>"
                                                                                            class="select-fnz">
                                                                                            <?= $Year ?></option>
                                                                                        <?php
                                                                                                }
                                                                                            ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mt-2">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1  fw-bold fs-4">ชื่อ
                                                                                    - นามสกุล</label>
                                                                                <div class="col">
                                                                                    <select class="form-select"
                                                                                        id="FullName">
                                                                                        <option value=""
                                                                                            class="select-fnz">
                                                                                        </option>
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
                                                                            <div class="form-group mt-2">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col  fw-bold fs-4">ตำแหน่ง</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control" id="Position" name="Position" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1  fw-bold fs-4">วัน/เดือน/ปี</label>
                                                                                <div class="col">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="StartDate" name="StartDate"
                                                                                        value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1  fw-bold fs-4">รายละเอียด</label>
                                                                                <div class="col">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="Description"
                                                                                        name="Description" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1  fw-bold fs-4">หมายเหตุ</label>
                                                                                <div class="col">
                                                                                    <input type="text"
                                                                                        class="form-control" id="Remark"
                                                                                        name="Remark" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mt-2">
                                                                                <label for=""
                                                                                    class="fw-bold fs-4">แนบไฟล์</label>
                                                                                <input class="form-control" type="file"
                                                                                    id="FileName" name="FileName"
                                                                                    value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="sudmit"
                                                                        class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                    <button type="button"
                                                                        class="btn btn-secondary fw-bold fs-4"
                                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- **** End Modal **** -->

                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-success fw-bold fs-4 w-100"
                                                        style='font-size:20px; width: 70px;' data-bs-toggle="modal"
                                                        data-bs-target="#myModal6">+ เพิ่มรายการใหม่</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="<?= $themes ?>assets/file/BlinkForm.docx"><button
                                                            type="submit"
                                                            class="btn btn-blankform fw-bold mt-2 fs-4 w-100"
                                                            name="submit" value="submit">แบบฟอร์มเปล่า</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 tbodyDiv">
                                            <table class="table table-striped mt-2 table-bordered"
                                                id="tbl_RequestForInsignia">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th width="50px">
                                                            <h3 class="fw-bold">ลำดับ</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">
                                                                ปีการศึกษา</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">ชื่อ -
                                                                นามสกุล
                                                            </h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                                        </th>
                                                        <th width="130px">
                                                            <h3 class="fw-bold">
                                                                วัน/เดือน/ปี</h3>
                                                        </th>
                                                        <th width="250px">
                                                            <h3 class="fw-bold">
                                                                ไฟล์แนบ</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">
                                                                รายละเอียด
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                หมายเหตุ
                                                            </h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">
                                                                แก้ไข
                                                            </h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">
                                                                ลบ
                                                            </h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">
                                                                ส่งออก
                                                            </h3>
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
    get_RequestForInsignia();
});

$('#Year').change(get_RequestForInsignia);

function get_RequestForInsignia() {
    let Year = $('#Year').val();
    let table_body = $('#tbl_RequestForInsignia tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('RequestForInsignia/fech_RequestForInsignia') ?>", 
        method: "POST",
        data: {
            Year: Year
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
                            <td>${row.Acyear || ''}</td>
                            <td align="left">${row.Teacher || ''}</td>
                            <td>${row.Position || ''}</td>
                            <td>${new Date(row.StartDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td><a href="<?= site_url('RequestForInsignia/export/') ?>${row.ID}">${row.FileName || ''}</a></td>
                            <td>${row.Description || ''}</td>
                            <td>${row.Remark || ''}</td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#myModal${count}">แก้ไข</a>
                                <div class="modal fade" id="myModal${count}" aria-labelledby="myModalLabel6" style="text-align: left;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                            <div id="modal-setting-7" class="tabcontent">
                                                <div class="container">
                                                    <div class="tab">
                                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">แก้ไขข้อมูลการขอพระราชทานเครื่องราชอิสริยาภรณ์</h5>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group mt-2">
                                                                <label for="exampleInputUsername2" class="col  fw-bold" style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                <div class="col w-50">
                                                                    <select class="form-select" id="Acyear_Edit${count}" name="Acyear_Edit" onclick="removeOption_RequestForInsignia()" disabled>
                                                                        <option value="${row.Acyear}" class="select-fnz">${row.Acyear}</option>
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
                                                            <div class="form-group mt-2">
                                                                <label for="exampleInputUsername2" class="col  fw-bold" style="color: black;font-size: 25px;">ชื่อ - นามสกุล</label>
                                                                <div class="col w-100">
                                                                    <input type="text" class="form-control" id="Teacher_Edit${count}" name="Teacher_Edit" value="${row.Teacher}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="exampleInputUsername2" class="col  fw-bold" style="color: black;font-size: 25px;">ตำแหน่ง</label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="Position_Edit${count}" name="Position_Edit" value="${row.Position}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="exampleInputUsername2" class="col  fw-bold" style="color: black;font-size: 25px;">วัน/เดือน/ปี</label>
                                                                <div class="col">
                                                                    <input type="date" class="form-control" id="StartDate_Edit${count}" name="StartDate_Edit" value="${row.StartDate}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="exampleInputUsername2" class="col  fw-bold" style="color: black;font-size: 25px;">รายละเอียด</label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="Description_Edit${count}" name="Description_Edit" value="${row.Description}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="exampleInputUsername2" class="col  fw-bold" style="color: black;font-size: 25px;">หมายเหตุ</label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="Remark_Edit${count}" name="Remark_Edit" value="${row.Remark}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                <label for="" class="fw-bold">แนบไฟล์</label>
                                                                <a href="<?= site_url('RequestForInsignia/export/') ?>${row.ID}"><input class="form-control" type="text" id="FileNameEdit${count}" name="FileNameEdit" value="${row.FileName !== null ? row.FileName : ''}" style="cursor: pointer; color: blue;" disabled></a>
                                                            </div>
                                                            <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                <label for="" class="fw-bold">แนบไฟล์</label>
                                                                <input class="form-control" type="file" id="FileName_Edit${count}" name="FileName_Edit" value="${row.FileName}">
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
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEditFile(${count}, this)" data-count="${count}">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateRequestForInsignia(${row.ID}, ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="FrmRequestForInsignia('${row.ID}')">ลบ</a></td>
                            <td><a href="<?= site_url('RequestForInsignia/Export_Data/')?>${row.ID}" class="btn btn-primary fw-bold fs-4">ส่งออก</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
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
    $("#Acyear_Edit" + count).prop("disabled", false);
    $("#Position_Edit" + count).prop("readonly", false);
    $("#StartDate_Edit" + count).prop("readonly", false);
    $("#Description_Edit" + count).prop("readonly", false);
    $("#Remark_Edit" + count).prop("readonly", false);
});

$('#InsertRequestForInsignia').submit(function(e) {
    e.preventDefault();
    InsertRequestForInsignia();
});

function InsertRequestForInsignia() {
    let Acyear = $('#Acyear').val();
    let Teacher = $('#FullName').val();
    let Position = $('#Position').val();
    let StartDate = $('#StartDate').val();
    let Description = $('#Description').val();
    let Remark = $('#Remark').val();
    let FileName = $('#FileName')[0].files[0];

    let formData = new FormData();
    formData.append('Acyear', Acyear);
    formData.append('Teacher', Teacher);
    formData.append('Position', Position);
    formData.append('StartDate', StartDate);
    formData.append('Description', Description);
    formData.append('Remark', Remark);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('RequestForInsignia/Insert_RequestForInsignia') ?>",
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

function UpdateRequestForInsignia(ID, modalCount) {
    let Acyear = $(`#Acyear_Edit${modalCount}`).val();
    let Teacher = $(`#Teacher_Edit${modalCount}`).val();
    let Position = $(`#Position_Edit${modalCount}`).val();
    let StartDate = $(`#StartDate_Edit${modalCount}`).val();
    let Description = $(`#Description_Edit${modalCount}`).val();
    let Remark = $(`#Remark_Edit${modalCount}`).val();
    let FileName = $(`#FileName_Edit${modalCount}`)[0].files[0];
    
    let formData = new FormData();
    formData.append('ID', ID);
    formData.append('Acyear', Acyear);
    formData.append('Teacher', Teacher);
    formData.append('Position', Position);
    formData.append('StartDate', StartDate);
    formData.append('Description', Description);
    formData.append('Remark', Remark);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('RequestForInsignia/update_RequestForInsignia') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#myModal${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmRequestForInsignia(ID) {
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
                url: "<?= site_url('RequestForInsignia/delete_RequestForInsignia') ?>",
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

function removeOption_RequestForInsignia(modalCount) {
    $("select[name='Acyear_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>