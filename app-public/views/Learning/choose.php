<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-choose.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    font-family: "niramit";
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

.btn-choose {
    width: 28vh; 
    height: 10vh; 
    background-color: #d8a53f;
    border-radius: 50px; 
    border: solid 5px white;
    box-shadow: 2px 2px 5px #b9b9b9;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: white;
    font-size: 52px;
}

.btn-choose:hover {
    cursor: pointer;
    opacity: 0.5;
}

.btn-prev {
    width: 15vh;
    height: 8vh;
    transition: transform 0.3s ease-in-out;
}

.btn-prev:hover {
    transform: scale(1.1);
}

.btn-next {
    width: 15vh;
    height: 8vh;
    margin-left: 2vh;
    transition: transform 0.3s ease-in-out;
}

.btn-next:hover {
    transform: scale(1.1);
}
</style>

<?php if ($this->data['ID'] == 1) : ?>
<div class="container-fluid">
    <div class="row justify-content-end align-items-end">
        <div class="col-auto">
            <a href="<?= site_url('Learning_media_controller/media') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/home.png" alt="" class="btn-home">
            </a>
            <a href="#" onclick="window.close();">
                <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 12vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๖</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๑</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๖</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๑</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๖</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๗</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๒</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๗</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๒</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๗</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๘</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๓</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๘</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๓</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๘</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๙</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๔</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๘</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๔</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๙</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑o</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๑๕</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒o</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๒๕</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓o</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5 text-end">
            <img src="<?= $themes ?>assets/img/thai/page2/btn-prev.png" alt="" class="btn-prev" style="opacity: 0.5;">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5 text-start">
            <a href="<?= site_url('Learning_media_controller/Choose/2') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-next.png" alt="" class="btn-next">
            </a>
        </div>
    </div>
</div>

<?php elseif ($this->data['ID'] == 2) : ?>
<div class="container-fluid">
    <div class="row justify-content-end align-items-end">
        <div class="col-auto">
            <a href="<?= site_url('Learning_media_controller/media') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/home.png" alt="" class="btn-home">
            </a>
            <a href="#" onclick="window.close();">
                <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 12vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๑</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๖</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๑</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๖</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๑</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๖</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๒</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๗</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๒</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๗</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๒</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๗</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๓</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๘</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๓</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๘</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๓</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๘</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๔</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๙</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๔</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๙</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๔</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๙</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 2vh;">
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๓๕</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔o</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๔๕</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕o</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๕๕</a>
            <a href="<?= site_url('Learning_media_controller/media') ?>" class="btn-choose">ชุด ๖o</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5 text-end">
            <a href="<?= site_url('Learning_media_controller/Choose/1') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-prev.png" alt="" class="btn-prev">
            </a>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5 text-start">
            <img src="<?= $themes ?>assets/img/thai/page2/btn-next.png" alt="" class="btn-next" style="opacity: 0.5;">
        </div>
    </div>
</div>
<?php endif; ?>
