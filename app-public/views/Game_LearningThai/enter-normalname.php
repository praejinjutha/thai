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
    font-size: 52px;
    font-family: "niramit";
}

.btn-search {
    margin-left: 5vh;
    width: 20vh;
    height: 10vh;
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
            <span class="title">กรอกข้อมูลเลขบัตรประชาชน</span>
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

<script>
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
            var url = "<?= site_url('GameLearningThai_controller/Level?No=') ?>" + IDCard;
            window.location.href = url;
        }
    }
});
</script>
