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

.student {
    width: 60vh; 
    height: 10vh; 
    background-color: #29aae1;
    border-radius: 20px; 
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: white;
    font-size: 42px;
    font-family: 'niramit';
    margin-top: 4vh;
}

.student:hover {
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.normal {
    width: 60vh; 
    height: 10vh; 
    background-color: #ffff;
    border-radius: 20px; 
    border: 1px solid #6666;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: #9e9e9e;
    font-size: 42px;
    font-family: "niramit";
    margin-top: 4vh;
}

.normal:hover {
    color: #9e9e9e;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <img src="<?= $themes ?>assets/img/thai/page1/test-logo.png" alt="" class="no-save">
        </div>
        <div class="col-9 text-end">
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt=""
                    class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <span style="color: #754c24; font-size: 46px;">ประเภทบุคคล</span>
            <a href="<?= site_url('PostTest_controller/study') ?>" class="student">นักเรียน</a>
            <a href="<?= site_url('PostTest_controller/normal') ?>" class="normal">บุคคลทั่วไป</a>
        </div>
        <div class="col-4"></div>
    </div>
</div>