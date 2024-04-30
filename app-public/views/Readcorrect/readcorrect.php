<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page3/bg.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.img-hover-effect {
    transition: transform 0.3s ease-in-out;
}

.img-hover-effect:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.top-150 {
    margin-top: 150px;
}

.top-100 {
    margin-top: 100px;
}

.top-50 {
    margin-top: 50px;
}

.btn-exit {
    width: 5vh;
    height: 5vh;
}

.btn-allexam {
    width: 400px;
    top: 80%;
    right: 10%;
    position: absolute;
}

.select {
    display: block;
    width: 80%;
    padding: 1.5rem 3rem 1.5rem 2rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 2rem;
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
    font-size: 2rem;
    font-family: "niramit";
}

@media (max-width: 768px) {
    .img-hover-effect {
        transition: transform 0.3s ease-in-out;
    }

    .img-hover-effect:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .btn-exit {
        width: 5vh;
        height: 5vh;
    }

    .btn-allexam {
        width: 30vh;
    }
}

@media (max-width: 430px) {
    .img-hover-effect {
        transition: transform 0.3s ease-in-out;
    }

    .img-hover-effect:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .btn-exit {
        width: 4vh;
        height: 4vh;
    }

    .btn-allexam {
        width: 25vh;
    }
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">
            <div class="row">
                <div class="col mt-3">
                    <div class="text-end">
                        <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" class="img-hover-effect btn-exit"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col d-flex justify-content-around top-100">
                    <select name="Exam" id="Exam" class="select" onchange="redirectToExam()">
                        <option value="" class="fnz-select">เลือกชุด</option>
                        <option value="1" class="fnz-select">ชุดที่ ๑</option>
                        <option value="2" class="fnz-select">ชุดที่ ๒</option>
                        <option value="3" class="fnz-select">ชุดที่ ๓</option>
                        <option value="4" class="fnz-select">ชุดที่ ๔</option>
                        <option value="5" class="fnz-select">ชุดที่ ๕</option>
                        <option value="6" class="fnz-select">ชุดที่ ๖</option>
                        <option value="7" class="fnz-select">ชุดที่ ๗</option>
                        <option value="8" class="fnz-select">ชุดที่ ๘</option>
                        <option value="9" class="fnz-select">ชุดที่ ๙</option>
                        <option value="10" class="fnz-select">ชุดที่ ๑o</option>
                    </select>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a href="<?= site_url('Readcorrectly_controller/ExamTreasury') ?>"><img src="<?= $themes ?>assets/img/thai/page3/btn-allexam.png" class="img-hover-effect btn-allexam"></a>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function redirectToExam() {
        var selectedValue = document.getElementById("Exam").value;
        if (selectedValue !== "") {
            window.location.href = "<?= site_url('Readcorrectly_controller/Exam/') ?>" + selectedValue;
        }
    }
</script>