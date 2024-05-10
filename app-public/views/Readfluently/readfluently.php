<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page4/bg.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    margin: 0;
    padding: 0;
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
    background-color: #c5d1b2;
    overflow: hidden;
    max-height: 0;
    transition: .3s ease-in-out;

    &.open {
        max-height: 70vh;
        width: 55vh;
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
        border-bottom: 2px solid #c5d1b2;

        &:hover {
            background-color: #e1ead7;
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
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/1') ?>">๑. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/2') ?>">๒. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/3') ?>">๓. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/4') ?>">๔. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/5') ?>">๕. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/6') ?>">๖. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๖</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/7') ?>">๗. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๗</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/8') ?>">๘. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๘</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/9') ?>">๙. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๙</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/10') ?>">๑o. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑o</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/11') ?>">๑๑. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๑</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/12') ?>">๑๒. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๒</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/13') ?>">๑๓. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๓</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/14') ?>">๑๔. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๔</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/15') ?>">๑๕. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๕</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/16') ?>">๑๖. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๖</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/17') ?>">๑๗. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๗</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/18') ?>">๑๘. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๘</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/19') ?>">๑๙. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๑๙</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/20') ?>">๒o. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒o</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/21') ?>">๒๑. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๑</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/22') ?>">๒๒. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๒</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/23') ?>">๒๓. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๓</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/24') ?>">๒๔. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๔</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/25') ?>">๒๕. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๕</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/26') ?>">๒๖. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๖</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/27') ?>">๒๗. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๗</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/28') ?>">๒๘. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๘</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/29') ?>">๒๙. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๒๙</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/30') ?>">๓o. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓o</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/31') ?>">๓๑. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๑</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/32') ?>">๓๒. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๒</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/33') ?>">๓๓. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๓</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/34') ?>">๓๔. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๔</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/35') ?>">๓๕. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๕</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/36') ?>">๓๖. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๖</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/37') ?>">๓๗. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๗</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/38') ?>">๓๘. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๘</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/39') ?>">๓๙. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๓๙</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/40') ?>">๔o. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔o</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/41') ?>">๔๑. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๑</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/42') ?>">๔๒. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๒</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/43') ?>">๔๓. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๓</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/44') ?>">๔๔. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๔</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/45') ?>">๔๕. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๕</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/46') ?>">๔๖. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๖</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/47') ?>">๔๗. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๗</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/48') ?>">๔๘. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๘</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/49') ?>">๔๙. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๔๙</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/50') ?>">๕o. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕o</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/51') ?>">๕๑. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๑</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/52') ?>">๕๒. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๒</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/53') ?>">๕๓. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๓</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/54') ?>">๕๔. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๔</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/55') ?>">๕๕. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๕</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/56') ?>">๕๖. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๖</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/57') ?>">๕๗. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๗</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/58') ?>">๕๘. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๘</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/59') ?>">๕๙. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๕๙</a>
                    <a href="<?= site_url('Readfluently_controller/Read_Choose/60') ?>">๖o. ฝึกกอ่านคำศัพท์พื้นฐาน ชุดที่ ๖o</a>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
const dropdown = document.querySelector('.value-list');
dropdown.classList.add('open');
</script>