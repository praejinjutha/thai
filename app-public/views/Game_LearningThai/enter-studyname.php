<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page5/bg-study.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
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

.title {
    color: #754c24;
    font-size: 54px;
    font-family: "niramit";
}

.btn-search {
    margin-left: 5vh;
    width: 18vh;
    height: 8vh;
    transition: transform 0.3s ease-in-out;
}

.btn-search:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.input-form {
    display: block;
    width: 70vh;
    padding: 2vh 3rem;
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
    margin-top: 3vh;
    width: 23vh;
    height: 13vh;
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
        <div class="col-md-6"></div>
        <div class="col-md-6 text-end">
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt=""
                    class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center" style="margin-top: 25vh">
            <span class="title">กรอกชื่อ - นามสกุล</span>
            <img src="<?= $themes ?>assets/img/thai/page5/btn-search.png" alt="" class="btn-search"
                data-toggle="modal" data-target="#Search">
        </div>
    </div>
    <form method="post" action="<?= site_url('GameLearningThai_controller/study') ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center" style="margin-top: 5vh">
                <input type="text" class="input-form" id="No" name="No" value="<?= isset($this->data['StudentNo']) ? $this->data['StudentNo'] : '' ?>" placeholder="กรอกรหัสประจําตัว">
            </div>
        </div>
    </form>
    <div class="row" style="margin-top: 5vh">
        <div class="col-4"></div>
        <div class="col-2 text-end" style="width: 28vh;">
            <span class="name">ชื่อ - นามสกุล :</span>
        </div>
        <div class="col-3">
            <span class="name" id="fullname"><?= isset($this->data['FullName']) ? $this->data['FullName'] : '' ?></span>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-2 text-end" style="width: 28vh;">
            <span class="name">ชั้น :</span>
        </div>
        <div class="col-3">
            <span class="name" id="class"><?= isset($this->data['ClassYear']) ? $this->data['ClassYear'] . '/' : '' ?></span>
            <span class="name" id="room"><?= isset($this->data['Room']) ? $this->data['Room'] : '' ?></span>
        </div>
        <div class="col"></div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
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
            var url = "<?= site_url('GameLearningThai_controller/Level?No=') ?>" + studentNo;
            window.location.href = url;
        }
    }
});
</script>
