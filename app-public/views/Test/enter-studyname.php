<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'niramit';
    background-color: #feedd7;
}

.no-save {
    width: 40vh;
    pointer-events: none;
}

.btn-exit {
    width: 5vh;
    height: 5vh;
    top: 5vh;
    right: 8vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-exit:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-home {
    width: 6vh;
    height: 5vh;
    top: 5vh;
    right: 16vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-home:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.score-stat {
    width: 35vh;
    top: 2vh;
    right: 27vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.score-stat:hover {
    cursor: pointer;
    transform: scale(1.05);
}

.btn-search {
    width: 18vh;
    height: 9vh;
    margin-left: 5vh;
    transition: transform 0.3s ease-in-out;
}

.btn-search:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.input-form {
    display: block;
    width: 100%;
    padding: 1.5vh 3vh;
    font-size: 26px;
    font-weight: 400;
    font-family: "niramit";
    line-height: 1.5;
    color: #ababab;
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: right .75rem center;
    background-size: 16px 12px;
    border: 1px solid #ababab;
    border-radius: 1.5rem;
}

.name {
    color: #754c24;
    font-size: 46px;
    font-family: "niramit-nm";
}

.btn-confirm {
    width: 25vh;
    height: 15vh;
    transition: transform 0.3s ease-in-out;
}

.btn-confirm:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.tbodyDiv {
    max-height: 600px;
    overflow: auto;
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <img src="<?= $themes ?>assets/img/thai/page1/test-logo.png" alt="" class="no-save">
        </div>
        <div class="col-9 text-end">
            <img src="<?= $themes ?>assets/img/thai/page5/stat.png" class="score-stat" data-toggle="modal" data-target="#Stat">
            <a href="<?= site_url('Test_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/home.png" alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt=""
                    class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <span style="color: #754c24; font-size: 46px;">กรอกชื่อ - นามสกุล</span>
                    <img src="<?= $themes ?>assets/img/thai/page5/btn-search.png" class="btn-search" data-toggle="modal" data-target="#Search">
                </div>
            </div>
            <form method="post" action="<?= site_url('GamePuzzle_controller/study') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center" style="margin-top: 5vh">
                        <input type="text" class="input-form" id="No" name="No" value="<?= isset($this->data['StudentNo']) ? $this->data['StudentNo'] : '' ?>" placeholder="กรอกรหัสประจําตัว">
                    </div>
                </div>
            </form>
            <div class="row" style="margin-top: 5vh">
                <div class="col-2 text-end" style="width: 28vh;">
                    <span class="name">ชื่อ - นามสกุล :</span>
                </div>
                <div class="col">
                    <span class="name" id="fullname"><?= isset($this->data['FullName']) ? $this->data['FullName'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-2 text-end" style="width: 28vh;">
                    <span class="name">ชั้น :</span>
                </div>
                <div class="col">
                    <span class="name" id="class"><?= isset($this->data['ClassYear']) ? $this->data['ClassYear'] . '/' : '' ?></span>
                    <span class="name" id="room"><?= isset($this->data['Room']) ? $this->data['Room'] : '' ?></span>
                </div>
            </div>
            <div class="row" style="margin-top: 1vh">
                <div class="col d-flex justify-content-center align-items-center">
                    <a href="#" id="confirm">
                        <img src="<?= $themes ?>assets/img/thai/page5/btn-confirm.png" alt="" class="btn-confirm">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="Stat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="fs-3" id="exampleModalLongTitle">สถิติคะแนน</span>
            </div>
            <div class="modal-body tbodyDiv">
                <table class="table table-bordered" id="tbl_Stat">
                    <thead>
                        <tr class="text-center table-warning">
                            <th width="80px"><span class="fs-3">ลำดับ</span></th>
                            <th width="150px"><span class="fs-3">รหัสนักเรียน</span></th>
                            <th><span class="fs-3">ชื่อ - นามสกุล</span></th>
                            <th width="100px"><span class="fs-3">ชั้น</span></th>
                            <th width="130px"><span class="fs-3">คะแนนสะสม</span></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger fs-5" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Search" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="fs-3" id="exampleModalLongTitle">สืบค้นข้อมูล</span>
            </div>
            <div class="modal-body tbodyDiv">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-info">
                            <th width="200px"><span class="fs-3">รหัสประจำตัว</span></th>
                            <th><span class="fs-3">ชื่อ - นามสกุล</span></th>
                            <th width="100px"><span class="fs-3">ชั้น</span></th>
                            <th width="100px"><span class="fs-3">เลือก</span></th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($Student as $row) { ?>
                            <tr>
                                <td class="text-center"><span class="fs-3"><?= $row->StudentNo ?></span></td>
                                <td><span class="fs-3"><?= $row->FullName ?></span></td>
                                <td class="text-center"><span class="fs-3"><?= $row->ClassYear ?>/<?= $row->Room ?></span></td>
                                <td class="text-center">
                                    <button class="btn btn-primary fw-bold fs-4" data-dismiss="modal" onclick="selectStudent('<?= $row->StudentNo ?>','<?= $row->FullName ?>','<?= $row->ClassYear ?>','<?= $row->Room ?>')">เลือก</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger fs-5" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    get_Stat();
});

function get_Stat() {
    let table_body = $('#tbl_Stat tbody');

    $.ajax({
        url: "<?= site_url('Test_controller/get_Stat') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) { 
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="5" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลสถิติคะแนน </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr class="fs-4">
                            <td>${count}</td>
                            <td>${row.id_user || ''}</td>
                            <td align="left">${row.FullName || ''}${row.Name || ''}</td>
                            <td>${row.ClassYear || ''}/${row.Room || ''}</td>
                            <td>${row.Score || ''}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function selectStudent(studentNo, FullName, ClassYear, Room) {
    document.querySelector('.input-form').value = studentNo;
    document.getElementById('fullname').innerText = FullName;
    document.getElementById('class').innerText = ClassYear;
    document.getElementById('room').innerText = '/' + Room;
}

document.getElementById('confirm').addEventListener('click', function(event) {
    var studentNo = document.getElementById('No').value;
    
    if (studentNo === '') {
        alert('กรุณากรอกรหัสประจำตัวนักเรียน');
        event.preventDefault();
    } else {
        var student = <?php echo json_encode($this->data['Student']); ?>; 
        var found = student.find(function(item) {
            return item.StudentNo === studentNo;
        });

        if (!found) {
            alert('ไม่พบนักเรียน กรุณาตรวจสอบรหัสประจำตัวนักเรียน');
        } else {
            var url = "<?= site_url('Test_controller/Testing?No=') ?>" + studentNo;
            window.location.href = url;
        }
    }
});
</script>