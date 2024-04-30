<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg.png");
    background-size: 100% 105%;
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
    opacity: 1;
    transform: scale(1.1);
}

.btn-document {
    margin-top: 26%;
    margin-left: 8vh;
    width: 70%;  
}

.btn-document:hover {
    box-shadow: 5px 10px #262626;
    cursor: pointer;
    border-radius: 60px;
}

.btn-login {
    margin-top: 3%;
    margin-left: 8vh;
    width: 70%;
}

.btn-login:hover {
    box-shadow: 5px 10px #262626;
    cursor: pointer;
    border-radius: 60px;
}

@media (max-width: 768px) {
    body {
        font-family: 'Sarabun', sans-serif;
        background-image: url("<?= $themes ?>assets/img/thai/page2/bg.png");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .btn-close {
        margin-right: 0;
        width: 8vw;
        height: 8vh;
        opacity: 1;
        transition: transform 0.3s ease-in-out;
    }

    .btn-close:hover {
        cursor: pointer;
        opacity: 1;
        transform: scale(1.1);
    }

    .btn-document {
        margin-top: 30vh;
        margin-left: 5vh;
        width: 30vh;  
    }

    .btn-document:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-login {
        margin-top: 1vh;
        margin-left: 5vh;
        width: 30vh;
    }

    .btn-login:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }
}

@media (max-width: 430px) {
    body {
        font-family: 'Sarabun', sans-serif;
        background-image: url("<?= $themes ?>assets/img/thai/page2/bg.png");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    .btn-close {
        margin-right: 0;
        width: 10vw;
        height: 5vh;
        opacity: 1;
        transition: transform 0.3s ease-in-out;
    }

    .btn-close:hover {
        cursor: pointer;
        opacity: 1;
        transform: scale(1.1);
    }

    .btn-document {
        margin-top: 30vh;
        margin-left: 0;
        width: 20vh;  
    }

    .btn-document:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-login {
        margin-top: 2vh;
        margin-left: 0;
        width: 20vh;
    }

    .btn-login:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
            <div class="row">
                <div class="col text-end">
                    <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close"></a>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="<?= $themes ?>assets/files/Reading/Spellwords.pdf" target="_brank"><img src="<?= $themes ?>assets/img/thai/page2/btn-document.png" alt="" class="btn-document"></a>
                    <a href="<?= site_url('Learning_media_controller/media') ?>"><img src="<?= $themes ?>assets/img/thai/page2/btn-login.png" alt="" class="btn-login"></a>
                </div>
            </div>
        </div>
    </div>
</div>

