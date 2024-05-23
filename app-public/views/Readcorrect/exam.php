<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page3/bg-exam.png");
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

.number {
    width: 20vh;
    height: 13vh;
    font-size: 36px;
    font-family: "niramit";
    color: #ffff;
    background-color: #ce9036;
    border: 5px solid #fce7c9;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}

</style>

<?php
    $numArr = ['๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙', '๑o', '๑๑', '๑๒', '๑๓', '๑๔', '๑๕', '๑๖', '๑๗', '๑๘', '๑๙', '๒o'];
    $num = isset($numArr[$this->data['ID'] - 1]) ? $numArr[$this->data['ID'] - 1] : '';
?>

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
        <div class="col text-center" style="margin-top: 110px; display: flex; justify-content: center;">
            <!-- <img src="<?= $themes ?>assets/img/thai/page3/btn-1.png" width="230vh"> -->
            <div class="number">ชุดที่ <?= $num ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 150px">
            <a href="<?= $themes ?>assets/files/Readcorrectly/Exam1/Vocabulary.html">
                <img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh" class="img-hover-effect me-3">
            </a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/') . $this->data['ID'] ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 150px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/SpellTheWord/') . $this->data['ID'] ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
    </div>
</div>