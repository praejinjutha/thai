<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-media.png");
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
    opacity: 1;
    transform: scale(1.1);
}

.btn-Suggestions {
    margin-top: 34%;
    width: 50%;  
}

.btn-Suggestions:hover {
    box-shadow: 5px 10px #262626;
    cursor: pointer;
    border-radius: 60px;
}

.btn-listenread {
    margin-top: 3%;
    width: 60%;  
}

.btn-listenread:hover {
    box-shadow: 5px 10px #262626;
    cursor: pointer;
    border-radius: 60px;
}

.btn-read {
    margin-top: 3%;
    width: 60%;  
}

.btn-read:hover {
    box-shadow: 5px 10px #262626;
    cursor: pointer;
    border-radius: 60px;
}

.btn-write {
    margin-top: 3%;
    width: 60%;  
}

.btn-write:hover {
    box-shadow: 5px 10px #262626;
    cursor: pointer;
    border-radius: 60px;
}

@media (max-width: 768px) {
    .btn-close {
        margin-right: 0;
        width: 8vw;
        height: 6vh;
        opacity: 1;
        transition: transform 0.3s ease-in-out;
    }

    .btn-close:hover {
        cursor: pointer;
        opacity: 1;
        transform: scale(1.1);
    }

    .btn-Suggestions {
        margin-top: 34vh;
        width: 25vh;  
    }

    .btn-Suggestions:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-listenread {
        margin-top: 15px;
        width: 30vh;  
    }

    .btn-listenread:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-read {
        margin-top: 15px;
        width: 30vh;  
    }

    .btn-read:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-write {
        margin-top: 15px;
        width: 30vh;  
    }

    .btn-write:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }
}

@media (max-width: 430px) {
    .btn-close {
        margin-right: 0;
        width: 10vw;
        height: 6vh;
        opacity: 1;
        transition: transform 0.3s ease-in-out;
    }

    .btn-close:hover {
        cursor: pointer;
        opacity: 1;
        transform: scale(1.1);
    }

    .btn-Suggestions {
        margin-top: 34vh;
        width: 20vh;  
    }

    .btn-Suggestions:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-listenread {
        margin-top: 15px;
        width: 25vh;  
    }

    .btn-listenread:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-read {
        margin-top: 15px;
        width: 25vh;
    }

    .btn-read:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }

    .btn-write {
        margin-top: 15px;
        width: 25vh;  
    }

    .btn-write:hover {
        box-shadow: 5px 10px #262626;
        cursor: pointer;
        border-radius: 60px;
    }
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-6 text-center">
            <a href="<?= site_url('Learning_media_controller/suggestions') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-Suggestions.png" alt="" class="btn-Suggestions">
            </a><br>
            <a href="<?= site_url('Learning_media_controller/explanation') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-listenread.png" alt="" class="btn-listenread">
            </a><br>
            <a href="<?= site_url('Learning_media_controller/Reading') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-read.png" alt="" class="btn-read">
            </a><br>
            <a href="<?= site_url('Learning_media_controller/Writing') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/btn-write.png" alt="" class="btn-write">
            </a>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col text-end">
                    <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close"></a>
                </div>
            </div>
        </div>
    </div>
</div>