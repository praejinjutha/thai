<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>
<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-Suggestions.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.btn-close {
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

.btn-back {
    width: 5vw;
    height: 10vh;
    transition: transform 0.3s ease-in-out;
}

.btn-back:hover {
    cursor: pointer;
    opacity: 1;
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .btn-close {
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

    .btn-back {
        width: 8vw;
        height: 6vh;
        transition: transform 0.3s ease-in-out;
    }

    .btn-back:hover {
        cursor: pointer;
        opacity: 1;
        transform: scale(1.1);
    }
}

@media (max-width: 430px) {
    .btn-close {
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

    .btn-back {
        width: 8vw;
        height: 6vh;
        transition: transform 0.3s ease-in-out;
    }

    .btn-back:hover {
        cursor: pointer;
        opacity: 1;
        transform: scale(1.1);
    }
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col text-end">
            <a href="<?= site_url('Learning_media_controller/media') ?>"><img src="<?= $themes ?>assets/img/thai/page2/back.png" alt="" class="btn-back"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close"></a>
        </div>
    </div>
</div>
