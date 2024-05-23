<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page3/bg-spelllevel.png");
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

.level {
    width: 65vh;
    height: 65vh;
    transition: transform 0.3s ease-in-out;
}

.level:hover {
    cursor: pointer;
    transform: scale(1.03);
}

.level2 {
    width: 65vh;
    height: 65vh;
    transition: transform 0.3s ease-in-out;
}

.level2:hover {
    transform: scale(1.03);
}

.level2lock {
    width: 65vh;
    height: 65vh;
    cursor: context-menu;
}
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <div class="text-end" style="color: #8a603a;">
                <a href="<?= site_url('Readcorrectly_controller/Exam/') . $this->data['ID']?>"><img
                        src="<?= $themes ?>assets/img/thai/page3/home.png" width="60vh"
                        class="img-hover-effect me-3"></a>
                <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png"
                        width="50vh" class="img-hover-effect"></a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 15vh;">
        <div class="col text-end">
            <a href="<?= site_url('Readcorrectly_controller/Rule_Spell/') . $this->data['ID'] ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/level1.png" width="60vh" class="level">
            </a>
        </div>
        <div class="col">
            <a href="#">
                <img src="<?= $themes ?>assets/img/thai/page3/level2lock.png" width="60vh" class="level2lock">
            </a>
            <a href="<?= site_url('Readcorrectly_controller/Rule_Spell/') . $this->data['ID'] ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/level2.png" width="60vh" class="level2 d-none">
            </a>
        </div>
    </div>
</div>