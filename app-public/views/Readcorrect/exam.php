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
    <!---------------------------------------------- ชุดที่ 1  ---------------------------------------------->
    <?php if ($this->data['ID'] == 1) :  ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-1.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="<?= $themes ?>assets/files/Readcorrectly/Exam1/Vocabulary.html">
                <img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh" class="img-hover-effect me-3">
            </a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/1') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 2  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 2) :  ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-2.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/2') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 3  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 3) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-3.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/3') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 4  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 4) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-4.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/4') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 5  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 5) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-5.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/5') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 6  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 6) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-6.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/6') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 7  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 7) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-7.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/7') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 8  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 8) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-8.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/8') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 9  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 9) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-9.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/9') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh" class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <!---------------------------------------------- ชุดที่ 10  ---------------------------------------------->
    <?php elseif ($this->data['ID'] == 10) : ?>
    <div class="row">
        <div class="col text-center" style="margin-top: 110px">
            <img src="<?= $themes ?>assets/img/thai/page3/btn-10.png" width="230vh">
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="padding-left: 240px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-vocab.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="<?= site_url('Readcorrectly_controller/Explanation_Exam/10') ?>">
                <img src="<?= $themes ?>assets/img/thai/page3/brn-exam.png" width="600vh"class="img-hover-effect me-3">
            </a>
        </div>
        <div class="col-6" style="padding-left: 130px; padding-top: 110px">
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-gameread.png" width="600vh"
                    class="img-hover-effect me-3"></a>
            <a href="#"><img src="<?= $themes ?>assets/img/thai/page3/btn-spell.png" width="600vh"
                    class="img-hover-effect me-3"></a>
        </div>
    </div>
    <?php endif; ?>
</div>