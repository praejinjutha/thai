<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-practice-read.png");
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

img.choose.active {
    opacity: 0.5;
}

.btn-choose {
    width: 28vh;
    height: 26vh;
    transition: transform 0.3s ease-in-out;
}

.btn-choose:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.choose {
    width: 28vh; 
    height: 9vh; 
    background-color: #e1f3ff;
    border-radius: 50px; 
    box-shadow: 2px 5px 5px #8ccbee;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    color: #26719b;
    font-size: 28px;
    font-family: "niramit";
}

.choose.active {
    cursor: pointer;
    background-color: #a4dfff;
    color: #26719b;
}

.choose:hover {
    cursor: pointer;
    background-color: #a4dfff;
    color: #26719b;
}
</style>


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
        <div class="col-md-12 d-flex justify-content-around" style="margin-top: 15vh; margin-bottom: 3vh;">
            <a href="<?= site_url('Learning_media_controller/Practice_reading/1') ?>" class="choose">ชุดที่ ๑ - ๑o</a>
            <a href="<?= site_url('Learning_media_controller/Practice_reading/2') ?>" class="choose">ชุดที่ ๑๑ - ๒o</a>
            <a href="<?= site_url('Learning_media_controller/Practice_reading/3') ?>" class="choose">ชุดที่ ๒๑ - ๓o</a>
            <a href="<?= site_url('Learning_media_controller/Practice_reading/4') ?>" class="choose">ชุดที่ ๓๑ - ๔o</a>
            <a href="<?= site_url('Learning_media_controller/Practice_reading/5') ?>" class="choose">ชุดที่ ๔๑ - ๕o</a>
            <a href="<?= site_url('Learning_media_controller/Practice_reading/6') ?>" class="choose">ชุดที่ ๕๑ - ๖o</a>
        </div>
    </div>

    <?php if ($this->data['ID'] == 1) : ?>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/1') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose1.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/2') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose2.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/3') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose3.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/4') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose4.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/5') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose5.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/6') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose6.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/7') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose7.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/8') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose8.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/9') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose9.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/10') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose10.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <?php elseif ($this->data['ID'] == 2) : ?>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/11') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose11.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/12') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose12.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/13') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose13.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/14') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose14.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/15') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose15.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around mt-3">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/16') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose16.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/17') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose17.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/18') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose18.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/19') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose19.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/20') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose20.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <?php elseif ($this->data['ID'] == 3) : ?>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/21') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose21.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/22') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose22.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/23') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose23.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/24') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose24.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/25') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose25.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around mt-3">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/26') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose26.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/27') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose27.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/28') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose28.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/29') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose29.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/30') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose30.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <?php elseif ($this->data['ID'] == 4) : ?>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/31') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose31.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/32') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose32.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/33') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose33.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/34') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose34.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/35') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose35.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around mt-3">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/36') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose36.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/37') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose37.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/38') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose38.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/39') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose39.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/40') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose40.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <?php elseif ($this->data['ID'] == 5) : ?>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/41') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose41.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/42') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose42.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/43') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose43.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/44') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose44.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/45') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose45.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around mt-3">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/46') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose46.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/47') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose47.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/48') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose48.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/49') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose49.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/50') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose50.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <?php elseif ($this->data['ID'] == 6) : ?>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/51') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose51.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/52') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose52.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/53') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose53.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/54') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose54.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/55') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose55.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-around mt-3">
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/56') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose56.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/57') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose57.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/58') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose58.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/59') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose59.png" alt="" class="btn-choose">
            </a>
            <a href="<?= site_url('Learning_media_controller/Reading_Choose/60') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/practice-read/btn-choose60.png" alt="" class="btn-choose">
            </a>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.href;
    var chooseLinks = document.querySelectorAll(".choose");

    chooseLinks.forEach(function(link) {
        var linkUrl = link.getAttribute("href");
        
        if (currentUrl.includes(linkUrl)) {
            link.classList.add("active");
        }
    });
});
</script>


