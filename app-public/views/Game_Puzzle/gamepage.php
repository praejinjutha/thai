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

.student {
    width: 60vh; 
    height: 10vh; 
    background-color: #29aae1;
    border-radius: 30px; 
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: white;
    font-size: 42px;
    font-family: "niramit";
    top: 57vh;
    left: 106vh;
    position: absolute;
}

.student:hover {
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.normal {
    width: 60vh; 
    height: 10vh; 
    background-color: #ffff;
    border-radius: 30px; 
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: #9e9e9e;
    font-size: 42px;
    font-family: "niramit";
    top: 70vh;
    left: 106vh;
    position: absolute;
}

.normal:hover {
    color: #9e9e9e;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.text-type {
    margin-top: 37vh;
    margin-left: 35vh;
    color: #754c24;
    font-size: 38px;
    font-family: "niramit";
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <span class="text-type">ประเภทบุคคล</span>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <a href="<?= site_url('GamePuzzle_controller/study') ?>" class="student">นักเรียน</a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <a href="<?= site_url('GamePuzzle_controller/normal') ?>" class="normal">บุคคลทั่วไป</a>
        </div>
    </div>
</div>