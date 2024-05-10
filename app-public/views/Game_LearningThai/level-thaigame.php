<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page5/bg-page.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.score-stat {
    width: 40vh;
    margin: 4vh 0 0 10vh;
    transition: transform 0.3s ease-in-out;
}

.score-stat:hover {
    cursor: pointer;
    transform: scale(1.05);
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

.choice {
    display: flex;
    align-items: center;
    border-radius: 80px;
    padding: 10px 20px;
    width: 40vh;
    justify-content: center; 
    border: 1px solid;
}

.choice:hover {
    cursor: pointer;
    color: #ffff;
    background-color: #32a852;
}

.choice span {
    text-decoration: none;
    font-size: 60px;
    font-weight: bold;
    padding-left: 20px;
}


.tbodyDiv {
    max-height: 600px;
    overflow: auto;
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $themes ?>assets/img/thai/page5/stat.png" class="score-stat" data-toggle="modal" data-target="#Stat">
        </div>
        <div class="col-md-6 text-end">
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex justify-content-around" style="margin-top: 35vh">
            <a href="#" onclick="appendNoParam(1)" style="text-decoration: none; color: #8c6239;">
                <div class="choice active">
                    <img src="<?= $themes ?>assets/img/thai/page5/bullet.png" width="70vh">
                    <span >ระดับ ๑</span>
                </div>
            </a>
            <a href="#"  onclick="appendNoParam(2)" style="text-decoration: none; color: #8c6239;">
                <div class="choice">
                    <img src="<?= $themes ?>assets/img/thai/page5/bullet.png" width="70vh">
                    <span >ระดับ ๒</span>
                </div>
            </a>
            <a href="#" onclick="appendNoParam(3)" style="text-decoration: none; color: #8c6239;">
                <div class="choice">
                    <img src="<?= $themes ?>assets/img/thai/page5/bullet.png" width="70vh">
                    <span >ระดับ ๓</span>
                </div>
            </a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex justify-content-around" style="margin-top: 10vh">
            <a href="#" onclick="appendNoParam(4)" style="text-decoration: none; color: #8c6239;">
                <div class="choice">
                    <img src="<?= $themes ?>assets/img/thai/page5/bullet.png" width="70vh">
                    <span >ระดับ ๔</span>
                </div>
            </a>
            <a href="#" onclick="appendNoParam(5)" style="text-decoration: none; color: #8c6239;">
                <div class="choice">
                    <img src="<?= $themes ?>assets/img/thai/page5/bullet.png" width="70vh">
                    <span >ระดับ ๕</span>
                </div>
            </a>
            <a href="#" onclick="appendNoParam(6)" style="text-decoration: none; color: #8c6239;">
                <div class="choice">
                    <img src="<?= $themes ?>assets/img/thai/page5/bullet.png" width="70vh">
                    <span >ระดับ ๖</span>
                </div>
            </a>
        </div>
        <div class="col-md-2"></div>
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
                            <th width="130px"><span class="fs-5">รหัสนักเรียน</span></th>
                            <th><span class="fs-5">ชื่อ - นามสกุล</span></th>
                            <th width="100px"><span class="fs-5">ห้อง</span></th>
                            <th width="100px"><span class="fs-5">ระดับ</span></th>
                            <th width="130px"><span class="fs-5">แต้มสะสม</span></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-5" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     function appendNoParam(level) {
        var urlParams = new URLSearchParams(window.location.search);
        var No = urlParams.get('No');
        var url = "<?= site_url('GameLearningThai_controller/rules/') ?>" + level + "?No=" + No;
        window.location.href = url;
    }

$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var No = urlParams.get('No');
    get_Stat(No);
});

function get_Stat(No) {
    let table_body = $('#tbl_Stat tbody');

    $.ajax({
        url: "<?= site_url('GameLearningThai_controller/get_Stat') ?>",
        method: "POST",
        data: {
            No: No
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="4" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลสถิติ </td>
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
                            <td>${row.ClassYear}/${row.Room}</td>
                            <td>${row.unit || ''}</td>
                            <td>${row.Score || ''}</td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}
</script>