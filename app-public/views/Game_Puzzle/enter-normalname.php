<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page6/bg-select.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.btn-home {
    margin-top: 5vh;
    margin-right: 30px;
    width: 6vh;
    height: 5vh;
    transition: transform 0.3s ease-in-out;
}

.btn-home:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-exit {
    margin-top: 5vh;
    margin-right: 5vh;
    width: 5vh;
    height: 5vh;
    transition: transform 0.3s ease-in-out;
}

.btn-exit:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.text-type {
    margin-top: 35vh;
    margin-left: 55vh;
    color: #754c24;
    font-size: 38px;
    font-family: "niramit";
}

.btn-search {
    top: 46vh;
    left: 148vh;
    width: 18vh;
    height: 8vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-search:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.input-form {
    display: block;
    width: 60vh;
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
    top: 58vh;
    left: 105vh;
    position: absolute;
}

.name {
    color: #754c24;
    font-size: 42px;
    font-family: "niramit-nm";
}

.btn-confirm {
    top: 70vh;
    left: 125vh;
    width: 23vh;
    height: 13vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-confirm:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.score-stat {
    width: 30vh;
    margin-right: 5vh;
    transition: transform 0.3s ease-in-out;
}

.score-stat:hover {
    cursor: pointer;
    transform: scale(1.05);
}

.tbodyDiv {
    max-height: 600px;
    overflow: auto;
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-md-6 text-end">
            <img src="<?= $themes ?>assets/img/thai/page5/stat.png" class="score-stat" data-toggle="modal" data-target="#Stat">
            <a href="<?= site_url('GamePuzzle_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/home.png" alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <span class="text-type">กรอกข้อมูลเลขบัตรประชาชน</span>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center" style="margin-top: 5vh">
            <input type="text" class="input-form" id="No" name="No" value="" placeholder="กรอกเลขบัตรประชาชน">
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

<!-- Modal -->
<div class="modal fade" id="Search" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-3" id="exampleModalLongTitle">สืบค้นข้อมูล</h5>
            </div>
            <div class="modal-body tbodyDiv">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-info">
                            <th width="200px"><span class="fs-5">รหัสประจำตัว</span></th>
                            <th><span class="fs-5">ชื่อ - นามสกุล</span></th>
                            <th width="100px"><span class="fs-5">ชั้น</span></th>
                            <th width="100px"><span class="fs-5">เลือก</span></th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($Student as $row) { ?>
                            <tr>
                                <td class="text-center"><span class="fs-4"><?= $row->StudentNo ?></span></td>
                                <td><span class="fs-4"><?= $row->FullName ?></span></td>
                                <td class="text-center"><span class="fs-4"><?= $row->ClassYear ?></span></td>
                                <td class="text-center">
                                    <button class="btn btn-primary fw-bold fs-5" data-dismiss="modal" onclick="selectStudent('<?= $row->StudentNo ?>','<?= $row->FullName ?>','<?= $row->ClassYear ?>','<?= $row->Room ?>')">เลือก</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="Stat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-3" id="exampleModalLongTitle">สถิติคะแนน</h5>
            </div>
            <div class="modal-body tbodyDiv">
                <table class="table table-bordered" id="tbl_Stat">
                    <thead>
                        <tr class="text-center table-warning">
                            <th width="80px"><span class="fs-5">ลำดับ</span></th>
                            <th width="180px"><span class="fs-5">เลขบัตรประชาชน</span></th>
                            <th><span class="fs-5">ชื่อ - นามสกุล</span></th>
                            <th width="130px"><span class="fs-5">แต้มสะสม</span></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    get_Stat();
});

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
            var url = "<?= site_url('GamePuzzle_controller/Role?No=') ?>" + IDCard;
            window.location.href = url;
        }
    }
});

function get_Stat() {
    let table_body = $('#tbl_Stat tbody');

    $.ajax({
        url: "<?= site_url('GamePuzzle_controller/get_StatNormal') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="6" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลสถิติ </td>
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
</script>
