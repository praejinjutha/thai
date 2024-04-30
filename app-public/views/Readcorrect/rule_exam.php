<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page3/bg-ruleexam.png");
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

.btn-exam-start {
    top: 73%;
    left: 45%;
    width: 20vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-exam-start:hover {
    cursor: pointer;
    transform: scale(1.1);
}
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <div class="text-end" style="color: #8a603a;">
                <a href="<?= site_url('Readcorrectly_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page3/home.png" width="60vh"
                        class="img-hover-effect me-3"></a>
                <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" width="50vh"
                        class="img-hover-effect"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="#">
                <img src="<?= $themes ?>assets/img/thai/page3/btn-exam-start.png" class="btn-exam-start">
            </a>
        </div>
    </div>
</div>