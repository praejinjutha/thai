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
    font-family: 'niramit';
}

.btn-exit {
    width: 5vh;
    height: 5vh;
    top: 5vh;
    right: 8vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-exit:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-home {
    width: 6vh;
    height: 5vh;
    top: 5vh;
    right: 16vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-home:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.no-save {
    width: 40vh;
    pointer-events: none;
    user-select: none;
    -webkit-touch-callout: none;
}

.title p {
    font-size: 42px;
    color: #8a603a;
    font-family: 'niramit-nm';
    line-height: 0.5;
    display: contents;
}

.title b {
    font-size: 42px;
    font-family: 'niramit-nm';
    font-weight: bold;
}

.choice {
    margin-top: 1vh;
    font-size: 42px;
    font-family: 'niramit-nm';
    font-weight: bold;
    line-height: 1;
    cursor: pointer;
}

.send-img {
    position: absolute;
    bottom: 10%;
    right: 10%;
    width: 33vh;
    height: 20vh;
    z-index: 1;
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
    top: 5%;
    left: 29%;
    z-index: 1;
    font-size: 26px;
    font-family: 'niramit';
}

.number {
    position: absolute;
    top: 21%;
    left: 17%;
    z-index: 1;
    line-height: 50px;
    color: #ffffff;
    font-size: 42px;
    font-weight: bold;
    font-family: 'niramit';
    background-color: #8c6239;
    padding: 3vh 5vh 5vh 4vh;
    border-radius: 50%;
    width: 18vh;
    height: 18vh;
}

h4 span {
    font-size: 70px;
}

.testing {
    position: absolute;
    width: 125vh;
    top: 23%;
    left: 28%;
    z-index: 1;
}

.answer {
    position: absolute;
    width: 125vh;
    top: 33%;
    left: 28%;
    z-index: 1;
}

.answer input {
    margin-top: 12px;
    margin-right: 10px
}

.correct-score {
    position: absolute;
    top: 70%;
    left: 29%;
    width: 100vh;
    height: 20vh;
    color: #006837;
    font-size: 62px;
    font-weight: bold;
}

.wrong-score {
    position: absolute;
    top: 78%;
    left: 29%;
    width: 29%;
    width: 100vh;
    height: 20vh;
    color: #c1272d;
    font-size: 62px;
    font-weight: bold;
}

.score {
    padding: 0 5vh;
    font-size: 98px;
}

.choice-form {
    display: flex;
    margin-top: 5vh;
}

.tick-mark {
    width: 20vh;
    top: 40%;
    left: 45%;
    position: absolute;
    animation: bounceIn 0.5s ease;
    z-index: 2;
}

@keyframes bounceIn {
    0% {
        transform: scale(0);
    }

    50% {
        transform: scale(1.2);
    }

    100% {
        transform: scale(1);
    }
}

.form-check-input:checked {
    background-color: #8cc63f;
    border-color: #8cc63f;
}

.add-question {
    width: 25vh;
    height: 10vh;
    color: #8a603a;
    font-size: 24px;
    font-family: 'niramit';
    padding-left: 20px;
    background-color: #ffffff;
    border-radius: 10vh 0 0 0;
    text-align: center;
    right: 0;
    bottom: 0;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
}

.add-question:hover {
    cursor: pointer;
    color: #ffffff;
    background-color: #198754;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 1);
}

.submit {
    padding-top: 5px;
    height: 60px;
    color: #ffffff;
    font-size: 32px;
    font-family: 'niramit';
    background-color: #c0272d;
    border: 1px solid #ffffff;
    border-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0.5, 0.5);
    display: block;
    margin-top: 50px;
    transition: transform 0.3s ease-in-out;
}

.submit:hover {
    transform: scale(1.05);
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <img src="<?= $themes ?>assets/img/thai/page1/test-logo.png" alt="" class="no-save">
        </div>
        <div class="col text-end">
            <a href="<?= site_url('PreTest_controller') ?>" id="home"><img
                    src="<?= $themes ?>assets/img/thai/page5/home.png" alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt=""
                    class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="text-center">
                <span class="explanation">คำชี้แจง: จงเลือกคำตอบที่ถูกที่สุดเพียงข้อเดียว (ข้อสอบมีจำนวน ๒๐ ข้อ)</span>
                <h4 class="number d-none">ข้อที่ <br><span id="number">1</span></h4>
                <span class="number">ข้อที่ <span id="number-show" style="font-size: 102px;"></span></span>
                <img src="<?= $themes ?>assets/img/thai/page1/sent.png" alt="sent" class="send-img">
            </div>
        </div>
    </div>
    <div id="question-container">

    </div>
    <div class="row">
        <div class="col-lg">
            <div class="correct-score">
                <span>คะแนนสะสม</span>
                <span class="score d-none" id="score">0</span>
                <span class="score" id="score-show"></span>
                <span>คะแนน</span>
            </div>
            <div class="wrong-score">
                <span>ตอบผิด</span>
                <span class="score d-none" id="wrong-number">0</span>
                <span style="padding: 0 5vh 0 16vh; font-size: 98px;" id="wrongnumber-show"></span>
                <span>ข้อ</span>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="Score" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 700px;">
        <div class="modal-content" style="padding: 3vh 6vh 6vh 6vh;">
            <div style="display: flex; justify-content: space-between;">
                <span class="modal-title" style="color: #8c6239; font-size: 26px;">บันทึกคะแนนคลังข้อสอบ</span>
                <span class="fw-bold fs-2" role="button" onclick="closeModal()">X</span>
            </div>
            <div class="text-center mt-5">
                <span style="color: #76a52b; font-size: 28px; display: block;" id="total-score"></span>
                <span style="color: #c1272d; font-size: 28px; display: block; margin-top: 20px;"
                    id="total-wrong"></span>
                <span style="font-size: 28px; display: block; margin-top: 20px;" id="total"></span>
                <span style="display: none;" id="hidden-score"></span>
                <a href="#" style="text-decoration: none;" onclick="Insert()"><span class="submit">บันทึกลงสถิติ และ
                        แบบประเมิน</span></a>
            </div>
        </div>
    </div>
</div>

<!-- <script src="<?= $themes ?>assets/files/Question/testQuiz.js"></script> -->
<script>
$(document).ready(function() {
    Question();
});

function convertToThaiNumber(number) {
    const thaiNumbers = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];
    return String(number).replace(/\d/g, (match) => thaiNumbers[parseInt(match)]);
}

function updateNumberShow() {
    var numberElement = document.getElementById('number').textContent;
    var numberShowElement = document.getElementById('number-show');
    var number = parseInt(numberElement, 10);
    var thaiNumber = convertToThaiNumber(number);
    numberShowElement.textContent = thaiNumber;

    var scoreElement = document.getElementById('score').textContent;
    var scoreShowElement = document.getElementById('score-show');
    var score = parseInt(scoreElement, 10);
    var thaiScore = convertToThaiNumber(score);
    scoreShowElement.textContent = thaiScore;

    var wrongnumberElement = document.getElementById('wrong-number').textContent;
    var wrongnumberShowElement = document.getElementById('wrongnumber-show');
    var wrongnumber = parseInt(wrongnumberElement, 10);
    var thaiWrong = convertToThaiNumber(wrongnumber);
    wrongnumberShowElement.textContent = thaiWrong;

    var hiddenScoreElement = document.getElementById('hidden-score');
    hiddenScoreElement.textContent = scoreElement;

    if (number > 20) {
        var totalScore = document.getElementById('total-score');
        var totalWrong = document.getElementById('total-wrong');
        var total = document.getElementById('total');
        totalScore.textContent = 'จำนวนข้อที่ถูก ' + thaiScore;
        totalWrong.textContent = 'จำนวนข้อที่ผิด ' + thaiWrong;
        total.textContent = 'คะแนนสะสม  ' + thaiScore + '  คะแนน';
        var numberfinish = number - 1;
        var thaiNumber = convertToThaiNumber(numberfinish);
        numberShowElement.textContent = thaiNumber;
        $('#Score').modal('show');
    }
}

function closeModal() {
    $('#Score').modal('hide');
}

var QuestionRandom = true;
var randomQuestion;
var score = 0;
var number = 0;
var wrong = 0;

function Question() {
    updateNumberShow();
    if (QuestionRandom === true) {
        var questions = <?= json_encode($this->data['Question']) ?>;
        var randomIndex = Math.floor(Math.random() * questions.length);
        randomQuestion = questions[randomIndex];
        questions.splice(randomIndex, 1);
        var questionContainer = document.getElementById("question-container");
        var html = `
            <div class="row">
                <div class="col-lg-5 testing">
                    <span style="font-size: 62px; font-weight: bold; color: #8a603a;">คำถาม : </span>
                    <span class="title">${randomQuestion.title}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 answer">
                    <div class="row">
                        <div class="col">
                            <div class="choice-form">
                                <input class="form-check-input fs-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" style="cursor: pointer">
                                <label class="choice" for="flexRadioDefault1">ก. ${randomQuestion.choice1}</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="choice-form">
                                <input class="form-check-input fs-1" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" style="cursor: pointer">
                                <label class="choice" for="flexRadioDefault2">ข. ${randomQuestion.choice2}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="choice-form">
                                <input class="form-check-input fs-1" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="3" style="cursor: pointer">
                                <label class="choice" for="flexRadioDefault3">ค. ${randomQuestion.choice3}</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="choice-form">
                                <input class="form-check-input fs-1" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="4" style="cursor: pointer">
                                <label class="choice" for="flexRadioDefault4">ง. ${randomQuestion.choice4}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        questionContainer.innerHTML = html;
    }
}

var questionDisplayed = false;

$('.send-img').click(function() {
    if (questionDisplayed) {
        return;
    }

    var selectedAnswer = parseInt($('input[name="flexRadioDefault"]:checked').val(), 10);
    var correctAnswer = randomQuestion.correct;
    var numberElement = document.getElementById('number');
    var number = parseInt(numberElement.textContent, 10);
    var scoreElement = document.getElementById('score');
    var score = parseInt(scoreElement.textContent, 10);
    var wrongElement = document.getElementById('wrong-number');
    var wrong = parseInt(wrongElement.textContent, 10);

    if (selectedAnswer === correctAnswer) {
        $('body').append(
            '<img src="<?= $themes ?>assets/img/correct.png" class="tick-mark">'
        );
        var audio = new Audio("<?= $themes ?>assets/sounds/correct.mp3");
        audio.play();
        score += 1;
    } else if (selectedAnswer !== undefined) {
        $('body').append(
            '<img src="<?= $themes ?>assets/img/wrong.png" class="tick-mark">'
        );
        var audio = new Audio("<?= $themes ?>assets/sounds/wrong.mp3");
        audio.play();
        wrong += 1;
    } else {
        alert('กรุณาเลือกคำตอบก่อน (กดส่งคำตอบ)');
        return;
    }

    number += 1;
    scoreElement.textContent = score;
    wrongElement.textContent = wrong;

    updateNumberShow();

    if (number > 20) {
        QuestionRandom = false;
    }

    setTimeout(function() {
        $('.tick-mark').remove();
        numberElement.textContent = number;
        questionDisplayed = false;
        Question();
    }, 1500);
    questionDisplayed = true;
});

$('#Score').on('hidden.bs.modal', function () {
    location.reload(); 
});

function Insert() {
    var urlParams = new URLSearchParams(window.location.search);
    var No = urlParams.get('No');
    var Score = document.getElementById('hidden-score').textContent;

    let formData = new FormData();
    formData.append('No', No);
    formData.append('Score', Score);
    $.ajax({
        url: "<?= site_url('PreTest_controller/Insert_Score') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) {
            if (results == 'Success') {
                window.location.href = "<?= site_url('Estimate') ?>";
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถบันทึกลงสถิติได้',
                    type: "error"
                });
            }
        }
    });
}
</script>