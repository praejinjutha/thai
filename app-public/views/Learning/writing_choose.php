<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-explanation-write.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.btn-home {
    width: 10vh;
    height: 10vh;
    opacity: 1;
    transition: transform 0.3s ease-in-out;
}

.btn-home:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-close {
    margin-right: 10px;
    width: 5vw;
    height: 10vh;
    opacity: 1;
    transition: transform 0.3s ease-in-out;
}

.btn-close:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-start {
    top: 65%;
    right: 16%;
    width: 25vh;
    height: 25vh;
    opacity: 1;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-start:hover {
    cursor: pointer;
    opacity: 1;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="text-end">
                <a href="<?= site_url('Learning_media_controller/Practice_writing') ?>">
                    <img src="<?= $themes ?>assets/img/thai/page2/home.png" alt="" class="btn-home">
                </a>
                <a href="#" onclick="window.close();">
                    <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
                </a>
            </div>
            <a href="<?= $themes ?>assets/files/SpellTheWord/Write/1.html">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-next-write.png" alt="" class="btn-start">
            </a>
        </div>
    </div>
</div>