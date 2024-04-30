<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page3/bg-treasury.png");
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

.start {
    width: 30vh;
    height: 27vh;
    position: absolute;
    top: 20vh;
    right: 20vh;
    transition: transform 0.3s ease-in-out;
}

.start:hover {
    cursor: pointer;
    transform: scale(1.1);
}
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <div class="text-end" style="color: #8a603a;">
                <a href="<?= site_url('Readcorrectly_controller') ?>"><img
                        src="<?= $themes ?>assets/img/thai/page3/home.png" width="60vh"
                        class="img-hover-effect me-3"></a>
                <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png"
                        width="50vh" class="img-hover-effect"></a>
            </div>
        </div>
    </div>
    <?php
        $exam = isset($_GET['Exam']) ? $_GET['Exam'] : null;

        if ($exam == 1) {
            $link = site_url('Readcorrectly_controller/1');
        } elseif ($exam == 2) {
            $link = site_url('Readcorrectly_controller/2');
        } elseif ($exam == 3) {
            $link = site_url('Readcorrectly_controller/3');
        } elseif ($exam == 4) {
            $link = site_url('Readcorrectly_controller/4');
        } elseif ($exam == 5) {
            $link = site_url('Readcorrectly_controller/5');
        } elseif ($exam == 6) {
            $link = site_url('Readcorrectly_controller/6');
        } elseif ($exam == 7) {
            $link = site_url('Readcorrectly_controller/7');
        } elseif ($exam == 8) {
            $link = site_url('Readcorrectly_controller/8');
        } elseif ($exam == 9) {
            $link = site_url('Readcorrectly_controller/9');
        } elseif ($exam == 10) {
            $link = site_url('Readcorrectly_controller/10');
        } else {
            $link = site_url('Readcorrectly_controller/ExamTreasury');
        }
    ?>
    <a href="<?= $link ?>"><img src="<?= $themes ?>assets/img/thai/page3/btn-start.png" width="60vh" class="start"></a>
</div>