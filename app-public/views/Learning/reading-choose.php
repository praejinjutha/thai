<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-explanation-read.png");
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
    margin-right: 20vh;
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

.btn-document {
    width: 25vh;
    height: 7vh;
    margin-right: 10vh;
    transition: transform 0.3s ease-in-out;
}

.btn-document:hover {
    cursor: pointer;
    opacity: 1;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row justify-content-end align-items-end">
        <div class="col-auto">
            <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/document/<?= $this->data['ID'] ?>.pdf" target="_blank">
                <img src="<?= $themes ?>assets/img/document.png" alt="" class="btn-document">
            </a>
            <a href="#" onclick="window.close();">
                <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
            </a>
        </div>
    </div>
    <div class="row justify-content-end align-items-end" style="height: 85vh;">
        <div class="col-auto">
            <?php if ($this->data['ID'] == 1) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/1.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 2) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/2.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 3) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/3.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 4) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/4.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 5) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/5.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 6) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/6.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 7) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/7.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 8) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/8.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 9) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/9.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 10) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/10.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 11) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/11.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 12) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/12.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 13) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/13.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 14) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/14.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 15) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/15.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 16) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/16.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 17) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/17.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 18) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/18.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 19) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/19.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 20) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/20.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 21) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/21.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 22) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/22.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 23) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/23.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 24) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/24.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 25) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/25.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 26) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/26.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 27) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/27.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 28) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/28.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 29) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/29.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 30) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/30.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 31) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/31.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 32) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/32.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 33) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/33.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 34) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/34.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 35) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/35.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 36) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/36.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 37) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/37.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 38) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/38.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 39) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/39.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 40) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/40.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 41) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/41.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 42) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/42.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 43) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/43.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 44) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/44.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 45) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/45.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 46) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/46.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 47) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/47.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 48) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/48.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 49) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/49.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 50) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/50.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 51) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/51.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 52) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/52.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 53) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/53.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 54) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/54.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 55) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/55.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 56) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/56.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 57) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/57.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 58) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/58.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 59) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/59.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php elseif ($this->data['ID'] == 60) : ?>
                <a href="<?= $themes ?>assets/files/SpellTheWord/Reading/60.html">
                    <img src="<?= $themes ?>assets/img/thai/page2/btn-next-read.png" alt="" class="btn-next-read">
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>