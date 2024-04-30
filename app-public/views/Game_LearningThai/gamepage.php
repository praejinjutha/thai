<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page5/bg-type.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.student {
    margin-top: 36vh;
    width: 70vh; 
    height: 13vh; 
    background-color: #29aae1;
    border-radius: 30px; 
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: white;
    font-size: 68px;
    font-family: "niramit";
}

.student:hover {
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.normal {
    margin-top: 5vh;
    width: 70vh; 
    height: 13vh; 
    background-color: #ffff;
    border-radius: 30px; 
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: #9e9e9e;
    font-size: 68px;
    font-family: "niramit";
}

.normal:hover {
    color: #9e9e9e;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-end">
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <a href="<?= site_url('GameLearningThai_controller/study') ?>" class="student">นักเรียน</a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <a href="<?= site_url('GameLearningThai_controller/normal') ?>" class="normal">บุคคลทั่วไป</a>
        </div>
    </div>
</div>


