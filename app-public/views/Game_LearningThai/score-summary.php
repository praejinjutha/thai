<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page5/bg-score.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    margin: 0;
    padding: 0;
    overflow: hidden;
    top: 0;
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

.score {
    font-size: 9rem;
    color: #000;
    font-family: 'niramit', sans-serif;
    margin-top: 25vh;
    margin-left: 70vh;
}

.pyro > .before,
.pyro > .after {
  position: absolute;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff;
  -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
}

.pyro > .after {
  -moz-animation-delay: 1.25s, 1.25s, 1.25s;
  -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
  -o-animation-delay: 1.25s, 1.25s, 1.25s;
  -ms-animation-delay: 1.25s, 1.25s, 1.25s;
  animation-delay: 1.25s, 1.25s, 1.25s;
  -moz-animation-duration: 1.25s, 1.25s, 6.25s;
  -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
  -o-animation-duration: 1.25s, 1.25s, 6.25s;
  -ms-animation-duration: 1.25s, 1.25s, 6.25s;
  animation-duration: 1.25s, 1.25s, 6.25s;
}

@-webkit-keyframes bang {
  to {
    box-shadow: -158px -402.6666666667px #ff00d9, -39px -155.6666666667px #00fbff, 229px -52.6666666667px #ff5e00, 211px -4.6666666667px #00b7ff, -47px -311.6666666667px #002bff, -247px -95.6666666667px #f700ff, -108px -384.6666666667px #ff004d, -12px -336.6666666667px #ffe600, -121px -324.6666666667px #eeff00, -178px -91.6666666667px #0084ff, -230px -116.6666666667px #ff00a6, -8px -140.6666666667px #00ff80, 110px -378.6666666667px #00f7ff, 165px -341.6666666667px #ff0048, -232px -213.6666666667px #ff00f7, -188px -73.6666666667px #ff00cc, 237px -65.6666666667px #00ff8c, 9px -216.6666666667px #4000ff, 199px 52.3333333333px #40ff00, -52px -21.6666666667px #0004ff, -144px 25.3333333333px #40ff00, -21px -272.6666666667px #ff00b7, -44px -295.6666666667px #ff00ae, 203px -137.6666666667px #ff00ee, -219px 14.3333333333px #00ccff, 59px 82.3333333333px #7bff00, 103px -321.6666666667px #7700ff, -8px -42.6666666667px #ff0051, -169px -68.6666666667px #00ccff, 81px -322.6666666667px #0080ff, -38px -259.6666666667px #5500ff, -84px -234.6666666667px #fffb00, -151px -407.6666666667px #00ff11, -220px -373.6666666667px #55ff00, -5px -176.6666666667px #ff005e, 229px -138.6666666667px #6fff00, 136px -118.6666666667px #91ff00, -178px -110.6666666667px #8400ff, -78px -31.6666666667px #59ff00, 83px -64.6666666667px #ffc400, 50px -111.6666666667px #04ff00, 206px 25.3333333333px #00fff2, 172px -307.6666666667px #ff00ee, 112px -405.6666666667px #ffa200, 147px -75.6666666667px #d500ff, 154px -70.6666666667px #ff7700, 91px 78.3333333333px #ff4800, 144px -158.6666666667px #d500ff, -54px 34.3333333333px #ff1a00, -109px -201.6666666667px #ff00ee, -12px -385.6666666667px #00f2ff;
  }
}
@-moz-keyframes bang {
  to {
    box-shadow: -158px -402.6666666667px #ff00d9, -39px -155.6666666667px #00fbff, 229px -52.6666666667px #ff5e00, 211px -4.6666666667px #00b7ff, -47px -311.6666666667px #002bff, -247px -95.6666666667px #f700ff, -108px -384.6666666667px #ff004d, -12px -336.6666666667px #ffe600, -121px -324.6666666667px #eeff00, -178px -91.6666666667px #0084ff, -230px -116.6666666667px #ff00a6, -8px -140.6666666667px #00ff80, 110px -378.6666666667px #00f7ff, 165px -341.6666666667px #ff0048, -232px -213.6666666667px #ff00f7, -188px -73.6666666667px #ff00cc, 237px -65.6666666667px #00ff8c, 9px -216.6666666667px #4000ff, 199px 52.3333333333px #40ff00, -52px -21.6666666667px #0004ff, -144px 25.3333333333px #40ff00, -21px -272.6666666667px #ff00b7, -44px -295.6666666667px #ff00ae, 203px -137.6666666667px #ff00ee, -219px 14.3333333333px #00ccff, 59px 82.3333333333px #7bff00, 103px -321.6666666667px #7700ff, -8px -42.6666666667px #ff0051, -169px -68.6666666667px #00ccff, 81px -322.6666666667px #0080ff, -38px -259.6666666667px #5500ff, -84px -234.6666666667px #fffb00, -151px -407.6666666667px #00ff11, -220px -373.6666666667px #55ff00, -5px -176.6666666667px #ff005e, 229px -138.6666666667px #6fff00, 136px -118.6666666667px #91ff00, -178px -110.6666666667px #8400ff, -78px -31.6666666667px #59ff00, 83px -64.6666666667px #ffc400, 50px -111.6666666667px #04ff00, 206px 25.3333333333px #00fff2, 172px -307.6666666667px #ff00ee, 112px -405.6666666667px #ffa200, 147px -75.6666666667px #d500ff, 154px -70.6666666667px #ff7700, 91px 78.3333333333px #ff4800, 144px -158.6666666667px #d500ff, -54px 34.3333333333px #ff1a00, -109px -201.6666666667px #ff00ee, -12px -385.6666666667px #00f2ff;
  }
}
@-o-keyframes bang {
  to {
    box-shadow: -158px -402.6666666667px #ff00d9, -39px -155.6666666667px #00fbff, 229px -52.6666666667px #ff5e00, 211px -4.6666666667px #00b7ff, -47px -311.6666666667px #002bff, -247px -95.6666666667px #f700ff, -108px -384.6666666667px #ff004d, -12px -336.6666666667px #ffe600, -121px -324.6666666667px #eeff00, -178px -91.6666666667px #0084ff, -230px -116.6666666667px #ff00a6, -8px -140.6666666667px #00ff80, 110px -378.6666666667px #00f7ff, 165px -341.6666666667px #ff0048, -232px -213.6666666667px #ff00f7, -188px -73.6666666667px #ff00cc, 237px -65.6666666667px #00ff8c, 9px -216.6666666667px #4000ff, 199px 52.3333333333px #40ff00, -52px -21.6666666667px #0004ff, -144px 25.3333333333px #40ff00, -21px -272.6666666667px #ff00b7, -44px -295.6666666667px #ff00ae, 203px -137.6666666667px #ff00ee, -219px 14.3333333333px #00ccff, 59px 82.3333333333px #7bff00, 103px -321.6666666667px #7700ff, -8px -42.6666666667px #ff0051, -169px -68.6666666667px #00ccff, 81px -322.6666666667px #0080ff, -38px -259.6666666667px #5500ff, -84px -234.6666666667px #fffb00, -151px -407.6666666667px #00ff11, -220px -373.6666666667px #55ff00, -5px -176.6666666667px #ff005e, 229px -138.6666666667px #6fff00, 136px -118.6666666667px #91ff00, -178px -110.6666666667px #8400ff, -78px -31.6666666667px #59ff00, 83px -64.6666666667px #ffc400, 50px -111.6666666667px #04ff00, 206px 25.3333333333px #00fff2, 172px -307.6666666667px #ff00ee, 112px -405.6666666667px #ffa200, 147px -75.6666666667px #d500ff, 154px -70.6666666667px #ff7700, 91px 78.3333333333px #ff4800, 144px -158.6666666667px #d500ff, -54px 34.3333333333px #ff1a00, -109px -201.6666666667px #ff00ee, -12px -385.6666666667px #00f2ff;
  }
}
@-ms-keyframes bang {
  to {
    box-shadow: -158px -402.6666666667px #ff00d9, -39px -155.6666666667px #00fbff, 229px -52.6666666667px #ff5e00, 211px -4.6666666667px #00b7ff, -47px -311.6666666667px #002bff, -247px -95.6666666667px #f700ff, -108px -384.6666666667px #ff004d, -12px -336.6666666667px #ffe600, -121px -324.6666666667px #eeff00, -178px -91.6666666667px #0084ff, -230px -116.6666666667px #ff00a6, -8px -140.6666666667px #00ff80, 110px -378.6666666667px #00f7ff, 165px -341.6666666667px #ff0048, -232px -213.6666666667px #ff00f7, -188px -73.6666666667px #ff00cc, 237px -65.6666666667px #00ff8c, 9px -216.6666666667px #4000ff, 199px 52.3333333333px #40ff00, -52px -21.6666666667px #0004ff, -144px 25.3333333333px #40ff00, -21px -272.6666666667px #ff00b7, -44px -295.6666666667px #ff00ae, 203px -137.6666666667px #ff00ee, -219px 14.3333333333px #00ccff, 59px 82.3333333333px #7bff00, 103px -321.6666666667px #7700ff, -8px -42.6666666667px #ff0051, -169px -68.6666666667px #00ccff, 81px -322.6666666667px #0080ff, -38px -259.6666666667px #5500ff, -84px -234.6666666667px #fffb00, -151px -407.6666666667px #00ff11, -220px -373.6666666667px #55ff00, -5px -176.6666666667px #ff005e, 229px -138.6666666667px #6fff00, 136px -118.6666666667px #91ff00, -178px -110.6666666667px #8400ff, -78px -31.6666666667px #59ff00, 83px -64.6666666667px #ffc400, 50px -111.6666666667px #04ff00, 206px 25.3333333333px #00fff2, 172px -307.6666666667px #ff00ee, 112px -405.6666666667px #ffa200, 147px -75.6666666667px #d500ff, 154px -70.6666666667px #ff7700, 91px 78.3333333333px #ff4800, 144px -158.6666666667px #d500ff, -54px 34.3333333333px #ff1a00, -109px -201.6666666667px #ff00ee, -12px -385.6666666667px #00f2ff;
  }
}
@keyframes bang {
  to {
    box-shadow: -158px -402.6666666667px #ff00d9, -39px -155.6666666667px #00fbff, 229px -52.6666666667px #ff5e00, 211px -4.6666666667px #00b7ff, -47px -311.6666666667px #002bff, -247px -95.6666666667px #f700ff, -108px -384.6666666667px #ff004d, -12px -336.6666666667px #ffe600, -121px -324.6666666667px #eeff00, -178px -91.6666666667px #0084ff, -230px -116.6666666667px #ff00a6, -8px -140.6666666667px #00ff80, 110px -378.6666666667px #00f7ff, 165px -341.6666666667px #ff0048, -232px -213.6666666667px #ff00f7, -188px -73.6666666667px #ff00cc, 237px -65.6666666667px #00ff8c, 9px -216.6666666667px #4000ff, 199px 52.3333333333px #40ff00, -52px -21.6666666667px #0004ff, -144px 25.3333333333px #40ff00, -21px -272.6666666667px #ff00b7, -44px -295.6666666667px #ff00ae, 203px -137.6666666667px #ff00ee, -219px 14.3333333333px #00ccff, 59px 82.3333333333px #7bff00, 103px -321.6666666667px #7700ff, -8px -42.6666666667px #ff0051, -169px -68.6666666667px #00ccff, 81px -322.6666666667px #0080ff, -38px -259.6666666667px #5500ff, -84px -234.6666666667px #fffb00, -151px -407.6666666667px #00ff11, -220px -373.6666666667px #55ff00, -5px -176.6666666667px #ff005e, 229px -138.6666666667px #6fff00, 136px -118.6666666667px #91ff00, -178px -110.6666666667px #8400ff, -78px -31.6666666667px #59ff00, 83px -64.6666666667px #ffc400, 50px -111.6666666667px #04ff00, 206px 25.3333333333px #00fff2, 172px -307.6666666667px #ff00ee, 112px -405.6666666667px #ffa200, 147px -75.6666666667px #d500ff, 154px -70.6666666667px #ff7700, 91px 78.3333333333px #ff4800, 144px -158.6666666667px #d500ff, -54px 34.3333333333px #ff1a00, -109px -201.6666666667px #ff00ee, -12px -385.6666666667px #00f2ff;
  }
}
@-webkit-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-moz-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-o-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-ms-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-webkit-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-moz-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-o-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-ms-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
</style>

<div class="container-fluid">
    <div class="pyro">
        <div class="before"></div>
        <div class="after"></div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-end">
            <a href="#" id="home"><img src="<?= $themes ?>assets/img/thai/page5/home.png"alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center ">
            <span class="score" id="scoreValue"></span>
        </div>
    </div>
    <audio id="correctSound">
        <source src="<?= $themes ?>assets/sounds/finish.mp3" type="audio/mpeg">
    </audio>
</div>

<script>
    function convertToThaiNumber(number) {
        const thaiNumbers = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];
        return String(number).replace(/\d/g, (match) => thaiNumbers[parseInt(match)]);
    }

    var urlParams = new URLSearchParams(window.location.search);
    var score = urlParams.get('score');
    var thaiScore = convertToThaiNumber(score);

    document.getElementById('scoreValue').innerText = thaiScore + " คะแนน";

    window.onload = function() {
        var audio = document.getElementById('correctSound');
        audio.play();
    };

    document.getElementById('home').addEventListener('click', function(event) {
        var path = window.location.pathname;
        var parts = path.split('/');
        var No = parts[parts.length - 1];
        var url = "<?= site_url('GameLearningThai_controller/Level?No=') ?>" + No;
        window.location.href = url;
    });
</script>


