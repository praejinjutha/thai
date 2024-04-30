<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>
<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page1/bg.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.no-save {
    pointer-events: none;
    user-select: none;
    -webkit-touch-callout: none;
}

.banner {
    margin-top: 50px;
}

.title {
    font-size: 36px;
}

.choice {
    font-size: 26px;
}

.send-img {
    position: absolute;
    top: 53%;
    left: 65%;
    width: 15vh;
    z-index: 1;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.send-img:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.cerrect-img {
    position: absolute;
    top: 67%;
    left: 35%;
    width: 280px;
    z-index: 1;
    pointer-events: none;
}

.wrong-img {
    position: absolute;
    top: 67%;
    left: 50%;
    width: 280px;
    z-index: 1;
    pointer-events: none;
}

.explanation {
    position: absolute;
    top: 15%;
    left: 35%;
    z-index: 1;
    color: #8a603a;
    font-size: 32px;
    font-weight: bold;
}

.number {
    position: absolute;
    top: 35%;
    left: 22%;
    z-index: 1;
    color: #8a603a;
    font-size: 32px;
    font-weight: bold;
}

h4 span {
    font-size: 70px;
}

.testing {
    position: absolute;
    top: 30%;
    left: 29%;
    z-index: 1;
    text-align: center;
}

.answer {
    position: absolute;
    top: 39%;
    left: 29%;
    z-index: 1;
}

.answer input {
    margin-top: 12px;
    margin-right: 10px
    
}

.correct-score {
    position: absolute;
    top: 73%;
    left: 38.5%;
    z-index: 2;
    color: #fff;
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    line-height: 1.2;
}

.wrong-score {
    position: absolute;
    top: 73%;
    left: 54.5%;
    z-index: 2;
    color: #fff;
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    line-height: 1.2;
}

.score {
    font-size: 56px;
}

@media (max-width: 768px) {
    .logo {
        width: 30vh;
    }

    .banner {
        margin-top: 0;
    }

    .title {
        font-size: 28px
    }

    .choice {
        font-size: 24px;
    }
    
    .send-img {
        position: absolute;
        top: 52vh;
        left: 52vh;
        width: 12vh;
        z-index: 1;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .send-img:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .cerrect-img {
        position: absolute;
        top: 63%;
        left: 25%;
        width: 20vh;
        z-index: 1;
        pointer-events: none;
    }

    .wrong-img {
        position: absolute;
        top: 63%;
        left: 50%;
        width: 20vh;
        z-index: 1;
        pointer-events: none;
    }

    .explanation {
        position: absolute;
        top: 28vh;
        left: 13vh;
        z-index: 1;
        color: #8a603a;
        font-size: 26px;
        font-weight: bold;
    }

    .number {
        position: absolute;
        top: 43vh;
        left: 6.5vh;
        z-index: 1;
        color: #8a603a;
        font-size: 28px;
        font-weight: bold;
    }

    h4 span {
        font-size: 55px;
    }

    .testing {
        position: absolute;
        top: 38vh;
        left: 0;
        z-index: 1;
        text-align: center;
    }

    .answer {
        position: absolute;
        top: 43vh;
        left: 0;
        z-index: 1;
    }

    .answer input {
        margin-top: 8px;
        margin-right: 10px
        
    }

    .correct-score {
        position: absolute;
        top: 67vh;
        left: 23vh;
        z-index: 2;
        color: #fff;
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        line-height: 1.2;
    }

    .wrong-score {
        position: absolute;
        top: 67vh;
        left: 44vh;
        z-index: 2;
        color: #fff;
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        line-height: 1.2;
    }

    .score {
        font-size: 42px;
    }
}

@media (max-width: 390px) {
    .logo {
        width: 20vh;
    }

    .banner {
        margin-top: 0;
    }

    .title {
        font-size: 18px
    }

    .choice {
        font-size: 16px;
    }
    
    .send-img {
        position: absolute;
        top: 35vh;
        left: 31vh;
        width: 7vh;
        z-index: 1;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .send-img:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .cerrect-img {
        position: absolute;
        top: 43vh;
        left: 10.5vh;
        width: 15vh;
        z-index: 1;
        pointer-events: none;
    }

    .wrong-img {
        position: absolute;
        top: 43vh;
        left: 23vh;
        width: 15vh;
        z-index: 1;
        pointer-events: none;
    }

    .explanation {
        position: absolute;
        top: 16vh;
        left: 5vh;
        z-index: 1;
        color: #8a603a;
        font-size: 16px;
        font-weight: bold;
    }

    .number {
        position: absolute;
        top: 30vh;
        left: 5vh;
        z-index: 1;
        color: #8a603a;
        font-size: 16px;
        font-weight: bold;
    }

    h4 span {
        font-size: 26px;
    }

    .testing {
        position: absolute;
        top: 27vh;
        left: 0;
        z-index: 1;
        text-align: center;
    }

    .answer {
        position: absolute;
        top: 30vh;
        left: 0;
        z-index: 1;
    }

    .answer input {
        margin-top: 0px;
        margin-right: 10px
        
    }

    .correct-score {
        position: absolute;
        top: 46vh;
        left: 14vh;
        z-index: 2;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        line-height: 1.2;
    }

    .wrong-score {
        position: absolute;
        top: 46vh;
        left: 28vh;
        z-index: 2;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        line-height: 1.2;
    }

    .score {
        font-size: 24px;
    }
}

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <img src="<?= $themes ?>assets/img/thai/page1/test-logo.png" alt="" class="no-save img-fluid logo">
        </div>
        <div class="col-lg">
            <div class="text-center">
                <h4 class="explanation">คำชี้แจง: จงเลือกคำตอบที่ถูกที่สุดเพียงข้อเดียว (ข้อสอบมีจำนวน 20 ข้อ)</h4>
                <h4 class="number">ข้อที่ <br><span>1</span></h4>
                <img src="<?= $themes ?>assets/img/thai/page1/banner.png" alt="" class="no-save img-fluid banner">
                <img src="<?= $themes ?>assets/img/thai/page1/btn-send.png" alt="" class="send-img">
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-5 testing">
            <h4 class="fw-bold title">คำถาม : ใครเป็นนักกล้ามในโมดโซลูชั่น ?</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 answer">
            <div class="row">
                <div class="col-3"></div>
                <div class="col">
                    <input class="form-check-input fs-5" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="fw-bold choice" for="flexRadioDefault1">๑. ปิง</label><br>
                    <input class="form-check-input fs-5" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="fw-bold choice" for="flexRadioDefault2">๒. อาร์ม</label><br>
                    <input class="form-check-input fs-5" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="fw-bold choice" for="flexRadioDefault2">๓. เลิฟ</label>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="correct-score">
                <span>คะแนนสะสม</span><br>
                <span class="score">9</span><br>
                <span>คะแนน</span>
            </div>
            <img src="<?= $themes ?>assets/img/thai/page1/btn-cerrect.png" alt="" class="cerrect-img">
        </div>
        <div class="col-lg">
            <div class="wrong-score">
                <span>ตอบผิด</span><br>
                <span class="score">1</span><br>
                <span>ข้อ</span>
            </div>
            <img src="<?= $themes ?>assets/img/thai/page1/btn-wrong.png" alt="" class="wrong-img">
        </div>
    </div>
</div>
