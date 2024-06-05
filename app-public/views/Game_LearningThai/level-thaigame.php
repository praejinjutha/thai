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
        <div class="col-md-6"></div>
        <div class="col-md-6 text-end">
            <a href="<?= site_url('GameLearningThai_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/home.png" alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex justify-content-around" style="margin-top: 45vh">
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
});
</script>