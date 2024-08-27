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
            <a href="<?= site_url('PreTest_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/home.png" alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt=""
                    class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <span style="color: #754c24; font-size: 46px;">กรอกข้อมูลเลขบัตรประชาชน</span>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center" style="margin-top: 5vh">
                    <input type="text" class="input-form" id="No" name="No" value="" placeholder="กรอกเลขบัตรประชาชน">
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center" style="margin-top: 5vh">
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
                            <th width="180px"><span class="fs-3">เลขบัตรประชาชน</span></th>
                            <th><span class="fs-3">ชื่อ - นามสกุล</span></th>
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

<script>
$(document).ready(function() {
    get_Stat();
});

function get_Stat() {
    let table_body = $('#tbl_Stat tbody');

    $.ajax({
        url: "<?= site_url('PreTest_controller/get_StatNormal') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) { 
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="4" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลสถิติคะแนน </td>
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
    var IDCard = document.getElementById('No').value;

    if (IDCard === '') {
        alert('กรุณากรอกเลขบัตรประชาชน');
        event.preventDefault();
    } else {
        var user = <?php echo json_encode($this->data['User']); ?>; 
        var found = user.find(function(item) {
            return item.NationalID === IDCard;
        });
        
        if (!found) {
            alert('ไม่พบผู้ใช้งาน กรุณาตรวจสอบเลขบัตรประชาชน');
        } else {
            var url = "<?= site_url('PreTest_controller/PreTest?No=') ?>" + IDCard;
            window.location.href = url;
        }
    }
});
</script>