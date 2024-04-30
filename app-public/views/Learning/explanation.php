<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-explanation.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.btn-start {
    margin-bottom: 2vh;
    margin-right: 5vh;
    width: 40vh;
    height: 17vh;
    opacity: 1;
    transition: transform 0.3s ease-in-out;
}

.btn-start:hover {
    cursor: pointer;
    opacity: 1;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row justify-content-end align-items-end" style="height: 100vh;">
        <div class="col-auto">
            <a href="<?= site_url('Learning_media_controller/Choose/1') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-start.png" alt="" class="btn-start">
            </a>
        </div>
    </div>
</div>