<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-explanation-read.jpg");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
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

.btn-next-read {
    margin-right: 15.5vh;
    width: 32vh;
    height: 14vh;
    opacity: 1;
    transition: transform 0.3s ease-in-out;
}

.btn-next-read:hover {
    cursor: pointer;
    opacity: 1;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row justify-content-end align-items-end">
        <div class="col-auto">
            <a href="#" onclick="window.close();">
                <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
            </a>
        </div>
    </div>
    <div class="row justify-content-end align-items-end" style="height: 83vh;">
        <div class="col-auto">
            <?php if ($this->data['ID'] == 1) : ?>
                <a href="<?= site_url('Learning_media_controller/Practice_reading/1') ?>">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 2) : ?>
            <?php elseif ($this->data['ID'] == 3) : ?>
            <?php elseif ($this->data['ID'] == 4) : ?>
            <?php elseif ($this->data['ID'] == 5) : ?>
            <?php elseif ($this->data['ID'] == 6) : ?>
            <?php elseif ($this->data['ID'] == 7) : ?>
            <?php elseif ($this->data['ID'] == 8) : ?>
            <?php elseif ($this->data['ID'] == 9) : ?>
            <?php elseif ($this->data['ID'] == 10) : ?>
            <?php elseif ($this->data['ID'] == 11) : ?>
            <?php elseif ($this->data['ID'] == 12) : ?>
            <?php elseif ($this->data['ID'] == 13) : ?>
            <?php elseif ($this->data['ID'] == 14) : ?>
            <?php elseif ($this->data['ID'] == 15) : ?>
            <?php elseif ($this->data['ID'] == 16) : ?>
            <?php elseif ($this->data['ID'] == 17) : ?>
            <?php elseif ($this->data['ID'] == 18) : ?>
            <?php elseif ($this->data['ID'] == 19) : ?>
            <?php elseif ($this->data['ID'] == 20) : ?>
            <?php elseif ($this->data['ID'] == 21) : ?>
            <?php elseif ($this->data['ID'] == 22) : ?>
            <?php elseif ($this->data['ID'] == 23) : ?>
            <?php elseif ($this->data['ID'] == 24) : ?>
            <?php elseif ($this->data['ID'] == 25) : ?>
            <?php elseif ($this->data['ID'] == 26) : ?>
            <?php elseif ($this->data['ID'] == 27) : ?>
            <?php elseif ($this->data['ID'] == 28) : ?>
            <?php elseif ($this->data['ID'] == 29) : ?>
            <?php elseif ($this->data['ID'] == 30) : ?>
            <?php elseif ($this->data['ID'] == 31) : ?>
            <?php elseif ($this->data['ID'] == 32) : ?>
            <?php elseif ($this->data['ID'] == 33) : ?>
            <?php elseif ($this->data['ID'] == 34) : ?>
            <?php elseif ($this->data['ID'] == 35) : ?>
            <?php elseif ($this->data['ID'] == 36) : ?>
            <?php elseif ($this->data['ID'] == 37) : ?>
            <?php elseif ($this->data['ID'] == 38) : ?>
            <?php elseif ($this->data['ID'] == 39) : ?>
            <?php elseif ($this->data['ID'] == 40) : ?>
            <?php elseif ($this->data['ID'] == 41) : ?>
            <?php elseif ($this->data['ID'] == 42) : ?>
            <?php elseif ($this->data['ID'] == 43) : ?>
            <?php elseif ($this->data['ID'] == 44) : ?>
            <?php elseif ($this->data['ID'] == 45) : ?>
            <?php elseif ($this->data['ID'] == 46) : ?>
            <?php elseif ($this->data['ID'] == 47) : ?>
            <?php elseif ($this->data['ID'] == 48) : ?>
            <?php elseif ($this->data['ID'] == 49) : ?>
            <?php elseif ($this->data['ID'] == 50) : ?>
            <?php elseif ($this->data['ID'] == 51) : ?>
            <?php elseif ($this->data['ID'] == 52) : ?>
            <?php elseif ($this->data['ID'] == 53) : ?>
            <?php elseif ($this->data['ID'] == 54) : ?>
            <?php elseif ($this->data['ID'] == 55) : ?>
            <?php elseif ($this->data['ID'] == 56) : ?>
            <?php elseif ($this->data['ID'] == 57) : ?>
            <?php elseif ($this->data['ID'] == 58) : ?>
            <?php elseif ($this->data['ID'] == 59) : ?>
            <?php elseif ($this->data['ID'] == 60) : ?>
            <?php endif; ?>
        </div>
    </div>
</div>