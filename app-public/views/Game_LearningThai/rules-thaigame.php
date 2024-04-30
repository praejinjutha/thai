<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page5/bg-rule.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.btn-exit {
    margin-top: 5vh;
    margin-right: 5vh;
    width: 5vh;
    height: 5vh;
    transition: transform 0.3s ease-in-out;
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

.btn-exit:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-rule {
    width: 30vh;
    height: 20vh;
    position: absolute;
    top: 75vh;
    right: 15vh;
    transition: transform 0.3s ease-in-out;
}

.btn-rule:hover {
    cursor: pointer;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-end">
            <a href="#" id="home"><img src="<?= $themes ?>assets/img/thai/page5/home.png"alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="#" onclick="appendNoParam()">
                <img src="<?= $themes ?>assets/img/thai/page5/btn-rule.png" alt="" class="btn-rule">
            </a>
        </div>
    </div>
</div>

<script>
     function appendNoParam() {
        var urlParams = new URLSearchParams(window.location.search);
        var level = window.location.pathname.split('/').pop();
        var No = urlParams.get('No');
        var url = "<?= site_url('GameLearningThai_controller/Thaigame/') ?>" + level + "?No=" + No;
        window.location.href = url;
    }

    document.getElementById('home').addEventListener('click', function(event) {
        var urlParams = new URLSearchParams(window.location.search);
        var No = urlParams.get('No');
        var url = "<?= site_url('GameLearningThai_controller/Level?No=') ?>" + No;
        window.location.href = url;
    });
</script>

