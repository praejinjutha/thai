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
                <label class="mt-1">ทำเนียบบุคลากร</label>
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
                                        <div class="col-md-2 mt-3">
                                            <form method="POST" action="<?= site_url('PersonnelDirectory/Export') ?>">
                                                <h2 class="fw-bold fs-3 mt-2 text-center">ค้นหาบุคลากร</h2>
                                                <hr>
                                                <div class="form-check ">
                                                    <label class="form-check-label fw-bold"> ตำแหน่งงาน </label>
                                                    <input class="form-check-input checked" type="radio" name="myRadio"
                                                        id="PosNameJob" onclick="showPosName()"  checked>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="myRadio"
                                                        id="SubjectGroup" onclick="showGroupName()">
                                                    <label class="form-check-label fw-bold"> กลุ่มสาระ </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="myRadio"
                                                        id="Status" onclick="showNStatus()">
                                                    <label class="form-check-label fw-bold"> สถานภาพการทำงาน </label>
                                                </div>
                                                <select class="form-select mt-3" id="PosName" name="PosName" onclick="removeOption()">
                                                    <option value=""class="select-fnz">----- แสดงข้อมูลทั้งหมด -----</option>
                                                    <?php 
                                                        foreach ($PosName as $row) {
                                                            if ($row->PosName !== $this->data['PosName']) {
                                                    ?>
                                                    <option class="select-fnz" value="<?= $row->PosName ?>"><?= $row->PosName ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <select class="form-select mt-3" id="GroupName" style="display: none;">
                                                    <option value=""class="select-fnz">----- แสดงข้อมูลทั้งหมด -----</option>
                                                    <?php 
                                                        foreach ($GroupName as $row) {
                                                            if ($row->GroupName !== $this->data['GroupName']) {
                                                    ?>
                                                    <option class="select-fnz" value="<?= $row->GroupName ?>"><?= $row->GroupName ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <select class="form-select mt-3" id="NStatus" style="display: none;">
                                                    <option value=""class="select-fnz">----- แสดงข้อมูลทั้งหมด -----</option>
                                                    <?php 
                                                        foreach ($NStatus as $row) {
                                                            if ($row->NStatus !== $this->data['NStatus']) {
                                                    ?>
                                                    <option class="select-fnz" value="<?= $row->Status ?>"><?= $row->Status ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4 w-100 mt-3">ส่งออก</button>
                                            </form>
                                        </div>
                                        <div class="col-md-10 tbodyDiv">
                                            <table class="table table-striped mt-2 table-bordered"
                                                id="tbl_PersonnelDirectory">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ลำดับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                ชื่อ-นามสกุล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ตำแหน่ง
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                เลขที่ตำแหน่ง</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">
                                                                วุฒิสูงสุด</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วุฒิในตำแหน่งปัจจุบัน
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วุฒิที่ใช้บรรจุ
                                                            </h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">สถานภาพการทำงาน
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

function showPosName() {
    document.getElementById("PosName").style.display = "block";
    document.getElementById("GroupName").style.display = "none";
    document.getElementById("NStatus").style.display = "none";
    resetSearch();
}

function showGroupName() {
    document.getElementById("PosName").style.display = "none";
    document.getElementById("GroupName").style.display = "block";
    document.getElementById("NStatus").style.display = "none";
    resetSearch(); 
}

function showNStatus() {
    document.getElementById("PosName").style.display = "none";
    document.getElementById("GroupName").style.display = "none";
    document.getElementById("NStatus").style.display = "block";
    resetSearch(); 
}

function resetSearch() {
    $('#PosName').val('');
    $('#GroupName').val('');
    $('#NStatus').val('');
    get_PersonnelDirectory(); 
}

$(document).ready(function() {
    get_PersonnelDirectory();
});

$('#PosName').change(get_PersonnelDirectory);
$('#GroupName').change(get_PersonnelDirectory);
$('#NStatus').change(get_PersonnelDirectory);

function get_PersonnelDirectory() {
    let PosName = $('#PosName').val();
    let GroupName = $('#GroupName').val();
    let NStatus = $('#NStatus').val();
    let table_body = $('#tbl_PersonnelDirectory tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelDirectory/fech_PersonnelDirectory') ?>",
        method: "POST",
        data:{
            PosName: PosName,
            GroupName: GroupName,
            NStatus: NStatus
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) { 
                let table_row = `
                    <tr>
                        <td colspan="8" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) { 
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td align="left">${row.FullName}</td>
                            <td>${row.PosName}</td>
                            <td>${row.PoNo || ''}</td>
                            <td>${row.TopBA || ''}</td>
                            <td>${row.PoBA || ''}</td>
                            <td>${row.PlaceBA || ''}</td>
                            <td>${row.NStatus || ''}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

function removeOption() {
    $("select[name='PosName'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>