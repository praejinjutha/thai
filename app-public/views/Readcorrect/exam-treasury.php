<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
.img-hover-effect {
    transition: transform 0.3s ease-in-out;
}

.img-hover-effect:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.title {
    font-size: 100px;
    font-family: "niramit";
    color: #6aa041;
}

.select {
    display: block;
    width: 40%;
    padding: 1rem 3rem 1rem 2rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 24px;
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
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
}

.fnz-select {
    font-size: 24px;
    font-family: "niramit";
}
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <div class="text-end" style="color: #8a603a;">
                <a href="<?= site_url('Readcorrectly_controller') ?>"><img
                        src="<?= $themes ?>assets/img/thai/page3/home.png" width="60vh"
                        class="img-hover-effect me-3"></a>
                <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png"
                        width="50vh" class="img-hover-effect"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center" style=" margin-top: 15vh;">
            <span class="title">คลังข้อสอบ</span>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <select name="Exam" id="Exam" class="select">
                <option value="" class="fnz-select">เลือกชุดข้อสอบ</option>
                <option value="1" class="fnz-select">ข้อสอบชุดที่ ๑</option>
                <option value="2" class="fnz-select">ข้อสอบชุดที่ ๒</option>
                <option value="3" class="fnz-select">ข้อสอบชุดที่ ๓</option>
                <option value="4" class="fnz-select">ข้อสอบชุดที่ ๔</option>
                <option value="5" class="fnz-select">ข้อสอบชุดที่ ๕</option>
                <option value="6" class="fnz-select">ข้อสอบชุดที่ ๖</option>
                <option value="7" class="fnz-select">ข้อสอบชุดที่ ๗</option>
                <option value="8" class="fnz-select">ข้อสอบชุดที่ ๘</option>
                <option value="9" class="fnz-select">ข้อสอบชุดที่ ๙</option>
                <option value="10" class="fnz-select">ข้อสอบชุดที่ ๑o</option>
                
            </select>
        </div>
    </div>
</div>

<script>
document.getElementById('Exam').addEventListener('change', function() {
    var selectedExam = this.value;
    window.location.href = '<?= site_url('Readcorrectly_controller/TreasuryID?Exam=') ?>' + selectedExam;
});
</script>