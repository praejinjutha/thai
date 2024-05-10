<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'niramit', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page6/playgame/bg-play.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    font-family: "niramit";
}

.frame-title {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    margin-left: 20vh;
    margin-right: 1vh;
    margin-top: 3vh;
    text-align: center;
}

.frame-answer {
    margin-left: 23vh;
    margin-right: 1vh;
    height: 10vh;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.answer {
    width: 10vh;
    border-bottom: 2px #000 solid;
    margin: 0 1vh;
}

.frame-answer-top {
    margin-top: 10vh;
    margin-left: 23vh;
    margin-right: 1vh;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.answer-top {
    padding-left: 5vh;
    line-height: 0;
    width: 10vh;
    border-bottom: 2px #000 solid;
    margin: 0 1vh;
}

.answer-top-no {
    padding-left: 5vh;
    width: 10vh;
    /* border-bottom: 2px #fffaf0 solid; */
    opacity: 0.5;
    margin: 0 1vh;
}

.frame-answer-bottom {
    margin-left: 23vh;
    margin-right: 1vh;
    height: 8vh;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.answer-bottom {
    padding-left: 5vh;
    width: 10vh;
    border-bottom: 2px #000 solid;
    margin: 0 1vh;
}

.answer-bottom-no {
    padding-left: 5vh;
    width: 10vh;
    /* border-bottom: 2px #fffaf0 solid; */
    opacity: 0.5;
    margin: 0 1vh;
}

.frame-time {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    height: 15vh;
    width: 17vh;
}

.time {
    text-align: center;
    font-size: 58px;
    font-weight: 2px bold;
    font-family: 'niramit', sans-serif;
}

.btn-home {
    margin-top: 5vh;
    margin-right: 30px;
    width: 6vh;
    height: 5vh;
    transition: transform 0.3s ease-in-out;
}

.btn-home:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-exit {
    margin-top: 5vh;
    margin-right: 5vh;
    width: 5vh;
    height: 5vh;
    transition: transform 0.3s ease-in-out;
}

.btn-exit:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.dragon-hero {
    width: 38vh;
    margin-top: 2vh;
    margin-left: 5vh;
    pointer-events: none;
}

.boy-hero {
    width: 20vh;
    margin-top: 14vh;
    margin-left: 6vh;
    pointer-events: none;
}

.girl-hero {
    width: 21vh;
    margin-top: 17vh;
    margin-left: 5vh;
    pointer-events: none;
}

.dragon-heart {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    height: 220px;
    margin-top: 4vh;
    pointer-events: none;
}

.dragon-heart img {
    margin-bottom: 40px;
}

.dragon-score {
    font-size: 68px;
    font-weight: bold;
    color: #ffff;
    font-family: 'niramit', sans-serif;
    position: absolute;
    top: 18vh;
    right: 85vh;
}

.hero-score {
    font-size: 68px;
    font-weight: bold;
    color: #ffff;
    font-family: 'niramit', sans-serif;
    position: absolute;
    top: 18vh;
    right: 25vh;
}

.hero-heart {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    height: 200px;
    margin-top: 4vh;
    margin-left: 2.5vh;
}

.hero-heart img {
    margin-bottom: 40px;
}

.frame-word {
    display: flex;
    flex-wrap: wrap;
}

.btn-word {
    font-size: 36px;
    font-weight: bold;
    font-family: 'Sarabun', sans-serif;
    margin-right: 3vh;
    margin-bottom: 2vh;
    cursor: pointer;
    flex: 1;
    max-width: calc(100% / 10 - 3vh);
    transition: transform 0.3s ease-in-out;
}

.btn-word:hover {
    cursor: pointer;
    transform: scale(1.5);
}

.btn-sara {
    font-size: 36px;
    font-weight: bold;
    font-family: 'Sarabun', sans-serif;
    margin-left: 5vh;
    margin-bottom: 1vh;
    flex: 1;
    max-width: calc(100% / 10 - 3vh);
    transition: transform 0.3s ease-in-out;
}

.btn-sara:hover {
    cursor: pointer;
    transform: scale(1.5);
}

.btn-sara:active {
    border: none;
}

b {
    font-weight: 500;
}

.tick-mark {
    width: 100px;
    top: 38vh;
    left: 68vh;
    position: absolute;
    display: none;
    animation: bounceIn 0.5s ease;
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
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col">
                    <div class="frame-title">
                        <h1 style="font-family: niramit; font-size: 32px;" id="questionTitle"></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="frame-answer-top">
                        <span class="answer-top"></span>
                    </div>
                    <div class="frame-answer">
                        <span class="answer"></span>
                    </div>
                    <div class="frame-answer-bottom">
                        <span class="answer-bottom"></span>
                    </div>
                </div>
            </div>
            <img src="<?= $themes ?>assets/img/correct.png" class="tick-mark">
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 d-flex justify-content-end">
                    <div class="frame-time">
                        <h1 class="time">๓oo</h1>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-end">
                        <a href="<?= site_url('GamePuzzle_controller') ?>"><img
                                src="<?= $themes ?>assets/img/thai/page6/choicerole/home.png" alt=""
                                class="btn-home"></a>
                        <a href="#" onclick="window.close();"><img
                                src="<?= $themes ?>assets/img/thai/page6/choicerole/exit.png" alt=""
                                class="btn-exit"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-7"></div>
                                <div class="col-3" style="padding-left: 7px;">
                                    <div class="dragon-heart">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg1" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg2" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg3" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg4" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg5" alt="" width="20vh">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="dragon-heart">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg6" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg7" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg8" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg9" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="dg10" alt="" width="20vh">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <h2 class="dragon-score d-none" id="dragon-score">0</h2>
                            <h2 class="dragon-score show">o</h2>
                            <img src="<?= $themes ?>assets/img/thai/page6/playgame/dragon.gif" alt=""
                                class="dragon-hero">
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <h2 class="hero-score d-none" id="hero-score">0</h2>
                    <h2 class="hero-score show">o</h2>
                    <div class="row">
                        <div class="col">
                            <div class="text-start">
                                <?php if ($this->data['Role'] == 1): ?>
                                <img src="<?= $themes ?>assets/img/thai/page6/playgame/boy.gif" alt="" class="boy-hero">
                                <?php else: ?>
                                <img src="<?= $themes ?>assets/img/thai/page6/playgame/girl.gif" alt=""
                                    class="girl-hero">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-5">
                                    <div class="hero-heart">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr1" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr2" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr3" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr4" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr5" alt="" width="20vh">
                                    </div>
                                </div>
                                <div class="col-7" style="padding-left: 5px;">
                                    <div class="hero-heart" style="margin-left: 0;">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr6" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr7" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr8" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr9" alt="" width="20vh">
                                        <img src="<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png" id="hr10" alt="" width="20vh">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="row" style="margin-top: 17vh; border-right: 5px solid #ff0000;">
                <div class="col frame-word">
                    <span class="btn-word">ก</span>
                    <span class="btn-word">ข</span>
                    <span class="btn-word">ฃ</span>
                    <span class="btn-word">ค</span>
                    <span class="btn-word">ฅ</span>
                    <span class="btn-word">ฆ</span>
                    <span class="btn-word">ง</span>
                    <span class="btn-word">จ</span>
                    <span class="btn-word">ฉ</span>
                    <span class="btn-word">ช</span>
                    <span class="btn-word">ซ</span>
                    <span class="btn-word">ฌ</span>
                    <span class="btn-word">ญ</span>
                    <span class="btn-word">ฎ</span>
                    <span class="btn-word">ฏ</span>
                    <span class="btn-word">ฐ</span>
                    <span class="btn-word">ฑ</span>
                    <span class="btn-word">ฒ</span>
                    <span class="btn-word">ณ</span>
                    <span class="btn-word">ด</span>
                    <span class="btn-word">ต</span>
                    <span class="btn-word">ถ</span>
                    <span class="btn-word">ท</span>
                    <span class="btn-word">ธ</span>
                    <span class="btn-word">น</span>
                    <span class="btn-word">บ</span>
                    <span class="btn-word">ป</span>
                    <span class="btn-word">ผ</span>
                    <span class="btn-word">ฝ</span>
                    <span class="btn-word">พ</span>
                    <span class="btn-word">ฟ</span>
                    <span class="btn-word">ภ</span>
                    <span class="btn-word">ม</span>
                    <span class="btn-word">ย</span>
                    <span class="btn-word">ร</span>
                    <span class="btn-word">ล</span>
                    <span class="btn-word">ว</span>
                    <span class="btn-word">ศ</span>
                    <span class="btn-word">ษ</span>
                    <span class="btn-word">ส</span>
                    <span class="btn-word">ห</span>
                    <span class="btn-word">ฬ</span>
                    <span class="btn-word">อ</span>
                    <span class="btn-word">ฮ</span>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row" style="margin-top: 17vh; margin-right: 3vh;">
                <div class="col frame-word">
                    <span class="btn-word">เ</span>
                    <span class="btn-word">แ</span>
                    <span class="btn-word">โ</span>
                    <span class="btn-word">ใ</span>
                    <span class="btn-word">ไ</span>
                    <span class="btn-word">ะ</span>
                    <span class="btn-word">า</span>
                    <span class="btn-word">อ</span>
                    <span class="btn-word">ำ</span>
                    <span class="btn-word">ฤ</span>
                    <span class="btn-word">ฦ</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= $themes ?>assets/files/Question/PuzzleQuiz.js"></script>

<script>
$(document).ready(function() {
    Question();
    startCountdown();
});

var correctAnswer;

function Question() {
    var randomIndex = Math.floor(Math.random() * questions.length);
    var selectedQuestion = questions[randomIndex];
    // questions.splice(randomIndex, 1);

    var questionTitleElement = document.getElementById('questionTitle');
    questionTitleElement.innerHTML = selectedQuestion.Title;

    correctAnswer = selectedQuestion.correct;
    
    var hiddenAnswer = '';
    var hiddenTopAnswer = '';
    var hiddenBottomAnswer = '';
    var checkbottom = 0;
    var checkcenter = 0;
    var checktop = 0;

    for (var i = 0; i < correctAnswer.length; i++) {

        if (correctAnswer[i] === '่' || correctAnswer[i] === '้' || correctAnswer[i] === '๊' || correctAnswer[i] ===
            '๋' || correctAnswer[i] === '็' || correctAnswer[i] === '์' || correctAnswer[i] === 'ั' || correctAnswer[
                i] === 'ิ' || correctAnswer[i] === 'ี' || correctAnswer[i] === 'ึ' || correctAnswer[i] === 'ื') {

            if (checkbottom === 1) {
                if (checkcenter === 1) {
                    hiddenTopAnswer = hiddenTopAnswer.slice(0, -35);
                } else {
                    hiddenTopAnswer = hiddenTopAnswer.slice(0, -70);
                }
                hiddenTopAnswer += '<span class="answer-top" style="font-size: 68px; color: red;">' + correctAnswer[i] + '</span>';
                
            } else {
                hiddenTopAnswer = hiddenTopAnswer.slice(0, -12);
                hiddenTopAnswer += '"style="font-size: 68px; color: red;">' + correctAnswer[i] + '</span>';
                checkcenter = 0;
                checkbottom = 0;
                checktop += 1;
            }

        } else {
            hiddenTopAnswer += '<span class="answer-top-no"></span>';
        }

        // แสดง bottom-line ของตัวอักษร
        if (correctAnswer[i] === '่' || correctAnswer[i] === '้' || correctAnswer[i] === '๊' || correctAnswer[i] ===
            '๋' || correctAnswer[i] === '็' || correctAnswer[i] === '์' || correctAnswer[i] === 'ั' || correctAnswer[
                i] === 'ิ' || correctAnswer[i] === 'ี' || correctAnswer[i] === 'ึ' || correctAnswer[i] === 'ื' ||
            correctAnswer[i] === 'ุ' || correctAnswer[i] === 'ู') {
            hiddenAnswer += '';

        } else {

            hiddenAnswer += '<span class="answer"></span>';
            checkcenter += 1;
        }

        // แสดง bottom-line ของสระล่าง
        if (correctAnswer[i] === 'ุ' || correctAnswer[i] === 'ู') {

            hiddenBottomAnswer = hiddenBottomAnswer.slice(0, -12);
            hiddenBottomAnswer += '" style="font-size: 68px; color: red;">' + correctAnswer[i] + '</span>';
            checkbottom += 1;
            hiddenTopAnswer += '<span class="answer-top-no"></span>';
        } else {
            if (checktop === 1) {
                hiddenBottomAnswer = hiddenBottomAnswer.slice(0, -38);
            }
            checktop = 0;
            hiddenBottomAnswer += '<span class="answer-bottom-no"></span>';
        }

    }

    document.querySelector('.frame-answer').innerHTML = hiddenAnswer;
    document.querySelector('.frame-answer-top').innerHTML = hiddenTopAnswer;
    document.querySelector('.frame-answer-bottom').innerHTML = hiddenBottomAnswer;
}

$('.btn-word').click(function() {
    var word = $(this).text();
    var correctIndex = 0;
    var isCorrectAnswer = false;
    
    for (var a = 0; a < correctAnswer.length; a++) {
        if (correctAnswer[a] === '่' || correctAnswer[a] === '้' || correctAnswer[a] === '๊' || correctAnswer[a] === '๋'
            || correctAnswer[a] === '็' || correctAnswer[a] === '์' || correctAnswer[a] === 'ั' || correctAnswer[a] === 'ิ' || correctAnswer[a] === 'ี' || correctAnswer[a] === 'ึ' || correctAnswer[a] === 'ื' || correctAnswer[a] === 'ุ' || correctAnswer[a] === 'ู') {
            correctIndex - 1;
        } else {
            correctIndex++;
        }

        if (word === correctAnswer[a]) {
            // เช็คว่า correctAnswer[i] มีตัวอักษรซ้ำกันหรือไม่
            var occurrences = correctAnswer.split(word).length - 1;
            var emptySpans = $('.frame-answer .answer').eq(correctIndex - 1).filter(function() {
                return $(this).text().trim() === '';
            });
            emptySpans.slice(0, occurrences).each(function() {
                $(this).text(word).css({'font-size': '68px', 'color': 'red'});
            });

            isCorrectAnswer = true;

            // เพิ่มคะแนนใน dragon-score และรีเซ็ตภาพใหม่
            var redHeartCount = 0;
            for (var i = 1; i <= 10; i++) {
                var heartId = '#hr' + i;
                var heartImg = $(heartId).attr('src');
                if (heartImg.indexOf('red-heart.png') !== -1) {
                    redHeartCount++;
                }
            }

            if (redHeartCount === 10) {
                var currentScore = parseInt($('.hero-score').text());
                $('.hero-score').text(currentScore + 1);
                heroScore = currentScore + 1;
                document.querySelector('.hero-score.show').textContent = convertToThaiNumber(heroScore);
                
                for (var i = 1; i <= 10; i++) {
                    var heartId = '#hr' + i;
                    if (i === 1) {
                        $(heartId).attr('src', '<?= $themes ?>assets/img/thai/page6/playgame/red-heart.png');
                    } else {
                        $(heartId).attr('src', '<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png');
                    }
                }
            } else {
                for (var i = 1; i <= 10; i++) {
                    var heartId = '#hr' + i;
                    var heartImg = $(heartId).attr('src');
                    if (heartImg.indexOf('gray-heart.png') !== -1) {
                        $(heartId).attr('src', '<?= $themes ?>assets/img/thai/page6/playgame/red-heart.png');
                        break;
                    }
                }
            }
        }
    }

    if (!isCorrectAnswer) {
        $(this).css({'pointer-events': 'none', 'color': 'red'});

        var redHeartCount = 0;
        for (var i = 1; i <= 10; i++) {
            var heartId = '#dg' + i;
            var heartImg = $(heartId).attr('src');
            if (heartImg.indexOf('red-heart.png') !== -1) {
                redHeartCount++;
            }
        }

        if (redHeartCount === 10) {
            var currentScore = parseInt($('.dragon-score').text());
            $('.dragon-score').text(currentScore + 1);
            dragonScore = currentScore + 1;
            document.querySelector('.dragon-score.show').textContent = convertToThaiNumber(dragonScore);
            for (var i = 1; i <= 10; i++) {
                var heartId = '#dg' + i;
                if (i === 1) {
                    $(heartId).attr('src', '<?= $themes ?>assets/img/thai/page6/playgame/red-heart.png');
                } else {
                    $(heartId).attr('src', '<?= $themes ?>assets/img/thai/page6/playgame/gray-heart.png');
                }
            }
        } else {
            for (var i = 1; i <= 10; i++) {
                var heartId = '#dg' + i;
                var heartImg = $(heartId).attr('src');
                if (heartImg.indexOf('gray-heart.png') !== -1) {
                    $(heartId).attr('src', '<?= $themes ?>assets/img/thai/page6/playgame/red-heart.png');
                    break;
                }
            }
        }
        
    } else {
        $(this).css({'pointer-events': 'none', 'color': 'black'});
        var isAnswerComplete = true;
        $('.frame-answer .answer').each(function() {
            if ($(this).text().trim() === '') {
                isAnswerComplete = false;
                return false;
            }
        });

        if (isAnswerComplete) {
            var audio = new Audio("<?= $themes ?>assets/sounds/correct.mp3");
            audio.play();
            $('.tick-mark').show();
            setTimeout(function() {
                Question();
                resetGameUI();
                $('.tick-mark').hide();
            }, 1500);
        }
    }
});

function resetGameUI() {
    $('.btn-word').css({'pointer-events': 'auto', 'color': 'black'});
}


var countdown = 300; 
var timerDisplay = document.querySelector('.time');
const thaiNumbers = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];

function startCountdown() {
    heroScore = document.getElementById('#hero-score');
    dragonScore = document.getElementById('#dragon-score');

    var timer = setInterval(function() {
        countdown--;
        timerDisplay.textContent = convertToThaiNumber(countdown);
        if (countdown <= 280) {
            if (heroScore > dragonScore) {
                window.location.href = "<?= site_url('GamePuzzle_controller/Score_summary/h/') . $this->data['Role'] . '?score=' ?>" + heroScore;
            } else if (dragonScore > heroScore) {
                window.location.href = "<?= site_url('GamePuzzle_controller/Score_summary/d/3?score=') ?>" + dragonScore;
            } else {
                window.location.href = "<?= site_url('GamePuzzle_controller/Score_summary/e/') . $this->data['Role'] . '?score=' ?>" + heroScore;
            }
        }
    }, 1000);
}

function convertToThaiNumber(number) {
    var thaiNumberString = '';
    var digits = number.toString().split('');
    digits.forEach(digit => {
        thaiNumberString += thaiNumbers[digit];
    });
    return thaiNumberString;
}
</script>