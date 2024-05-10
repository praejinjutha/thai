<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page3/bg-spelltheword.png");
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
    width: 40vh;
    height: 15vh;
    position: absolute;
    top: 70vh;
    right: 15vh;
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
                <a href="<?= site_url('Readcorrectly_controller/Exam/') . $this->data['ID']?>"><img
                        src="<?= $themes ?>assets/img/thai/page3/home.png" width="60vh"
                        class="img-hover-effect me-3"></a>
                <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png"
                        width="50vh" class="img-hover-effect"></a>
            </div>
        </div>
    </div>
    <a href="<?= site_url('Readcorrectly_controller/Rule_Spell/') . $this->data['ID'] ?>"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell-start.png" width="60vh" class="start"></a>
</div>