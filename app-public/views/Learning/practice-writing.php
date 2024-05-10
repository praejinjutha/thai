<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-practice-writing.png");
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

.frame-select {
    position: relative;
    width: 18rem;
    margin-top: 8vh;
}


.value-list {
    list-style: none;
    margin-top: 30%;
    padding: 20px 20px;
    background-color: #fff5f3;
    overflow: hidden;
    max-height: 0;
    transition: .3s ease-in-out;

    &.open {
        max-height: 70vh;
        width: 50vh;
        overflow: auto;
    }

    a {
        position: relative;
        height: 4rem;
        background-color: #fffbfa;
        padding: 1rem;
        font-size: 1.5rem;
        color: #000;
        text-decoration: none;
        display: flex;
        align-items: center;
        font-family: "niramit";
        cursor: pointer;
        transition: background-color .3s;
        opacity: 1;
        border-bottom: 2px solid #fff5f3;

        &:hover {
            background-color: #fcb4ac;
        }

        &.closed {
            max-height: 0;
            overflow: hidden;
            padding: 0;
            opacity: 0;
        }
    }
}

.value-list::-webkit-scrollbar {
    width: 12px;
    height: 12px;
}

.value-list::-webkit-scrollbar-track {
    background-color: #b2b2b2; 
}

.value-list::-webkit-scrollbar-thumb {
    background-color: #888; 
    border-radius: 50px; 
    border: 3px solid #888; 
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-7"></div>
        <div class="col-5">
            <div class="text-end">
                <a href="#" onclick="window.close();">
                    <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
                </a>
            </div>
            <div class="frame-select">
                <ul class="value-list">
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/1') ?>">๑. ชุดฝึกการเขียน ชุดที่ ๑</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/2') ?>">๒. ชุดฝึกการเขียน ชุดที่ ๒</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/3') ?>">๓. ชุดฝึกการเขียน ชุดที่ ๓</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/4') ?>">๔. ชุดฝึกการเขียน ชุดที่ ๔</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/5') ?>">๕. ชุดฝึกการเขียน ชุดที่ ๕</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/6') ?>">๖. ชุดฝึกการเขียน ชุดที่ ๖</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/7') ?>">๗. ชุดฝึกการเขียน ชุดที่ ๗</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/8') ?>">๘. ชุดฝึกการเขียน ชุดที่ ๘</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/9') ?>">๙. ชุดฝึกการเขียน ชุดที่ ๙</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/10') ?>">๑o. ชุดฝึกการเขียน ชุดที่ ๑o</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/11') ?>">๑๑. ชุดฝึกการเขียน ชุดที่ ๑๑</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/12') ?>">๑๒. ชุดฝึกการเขียน ชุดที่ ๑๒</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/13') ?>">๑๓. ชุดฝึกการเขียน ชุดที่ ๑๓</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/14') ?>">๑๔. ชุดฝึกการเขียน ชุดที่ ๑๔</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/15') ?>">๑๕. ชุดฝึกการเขียน ชุดที่ ๑๕</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/16') ?>">๑๖. ชุดฝึกการเขียน ชุดที่ ๑๖</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/17') ?>">๑๗. ชุดฝึกการเขียน ชุดที่ ๑๗</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/18') ?>">๑๘. ชุดฝึกการเขียน ชุดที่ ๑๘</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/19') ?>">๑๙. ชุดฝึกการเขียน ชุดที่ ๑๙</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/20') ?>">๒o. ชุดฝึกการเขียน ชุดที่ ๒o</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/21') ?>">๒๑. ชุดฝึกการเขียน ชุดที่ ๒๑</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/22') ?>">๒๒. ชุดฝึกการเขียน ชุดที่ ๒๒</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/23') ?>">๒๓. ชุดฝึกการเขียน ชุดที่ ๒๓</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/24') ?>">๒๔. ชุดฝึกการเขียน ชุดที่ ๒๔</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/25') ?>">๒๕. ชุดฝึกการเขียน ชุดที่ ๒๕</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/26') ?>">๒๖. ชุดฝึกการเขียน ชุดที่ ๒๖</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/27') ?>">๒๗. ชุดฝึกการเขียน ชุดที่ ๒๗</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/28') ?>">๒๘. ชุดฝึกการเขียน ชุดที่ ๒๘</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/29') ?>">๒๙. ชุดฝึกการเขียน ชุดที่ ๒๙</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/30') ?>">๓o. ชุดฝึกการเขียน ชุดที่ ๓o</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/31') ?>">๓๑. ชุดฝึกการเขียน ชุดที่ ๓๑</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/32') ?>">๓๒. ชุดฝึกการเขียน ชุดที่ ๓๒</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/33') ?>">๓๓. ชุดฝึกการเขียน ชุดที่ ๓๓</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/34') ?>">๓๔. ชุดฝึกการเขียน ชุดที่ ๓๔</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/35') ?>">๓๕. ชุดฝึกการเขียน ชุดที่ ๓๕</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/36') ?>">๓๖. ชุดฝึกการเขียน ชุดที่ ๓๖</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/37') ?>">๓๗. ชุดฝึกการเขียน ชุดที่ ๓๗</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/38') ?>">๓๘. ชุดฝึกการเขียน ชุดที่ ๓๘</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/39') ?>">๓๙. ชุดฝึกการเขียน ชุดที่ ๓๙</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/40') ?>">๔o. ชุดฝึกการเขียน ชุดที่ ๔o</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/41') ?>">๔๑. ชุดฝึกการเขียน ชุดที่ ๔๑</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/42') ?>">๔๒. ชุดฝึกการเขียน ชุดที่ ๔๒</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/43') ?>">๔๓. ชุดฝึกการเขียน ชุดที่ ๔๓</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/44') ?>">๔๔. ชุดฝึกการเขียน ชุดที่ ๔๔</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/45') ?>">๔๕. ชุดฝึกการเขียน ชุดที่ ๔๕</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/46') ?>">๔๖. ชุดฝึกการเขียน ชุดที่ ๔๖</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/47') ?>">๔๗. ชุดฝึกการเขียน ชุดที่ ๔๗</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/48') ?>">๔๘. ชุดฝึกการเขียน ชุดที่ ๔๘</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/49') ?>">๔๙. ชุดฝึกการเขียน ชุดที่ ๔๙</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/50') ?>">๕o. ชุดฝึกการเขียน ชุดที่ ๕o</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/51') ?>">๕๑. ชุดฝึกการเขียน ชุดที่ ๕๑</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/52') ?>">๕๒. ชุดฝึกการเขียน ชุดที่ ๕๒</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/53') ?>">๕๓. ชุดฝึกการเขียน ชุดที่ ๕๓</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/54') ?>">๕๔. ชุดฝึกการเขียน ชุดที่ ๕๔</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/55') ?>">๕๕. ชุดฝึกการเขียน ชุดที่ ๕๕</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/56') ?>">๕๖. ชุดฝึกการเขียน ชุดที่ ๕๖</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/57') ?>">๕๗. ชุดฝึกการเขียน ชุดที่ ๕๗</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/58') ?>">๕๘. ชุดฝึกการเขียน ชุดที่ ๕๘</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/59') ?>">๕๙. ชุดฝึกการเขียน ชุดที่ ๕๙</a>
                    <a href="<?= site_url('Learning_media_controller/Writing_Choose/60') ?>">๖o. ชุดฝึกการเขียน ชุดที่ ๖o</a>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
const dropdown = document.querySelector('.value-list');
dropdown.classList.add('open');
</script>