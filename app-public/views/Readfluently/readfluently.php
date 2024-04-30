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

.img-hover-effect {
    transition: transform 0.3s ease-in-out;
}

.img-hover-effect:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.col.text-center {
    margin-top: 25%;
}

.col.text-center img {
    width: 40vh;
}

.text-end img {
    width: 10vh;
}

@media (max-width: 768px) {
    .img-hover-effect {
        transition: transform 0.3s ease-in-out;
    }

    .img-hover-effect:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .col.text-center {
        margin-top: 55vh;
        margin-left: 5vh
    }

    .col.text-center img {
        width: 25vh;
    }

    .text-end img {
        width: 8vh;
    }
}

@media (max-width: 430px) {
    .img-hover-effect {
        transition: transform 0.3s ease-in-out;
    }

    .img-hover-effect:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .col.text-center {
        margin-top: 55vh;
        margin-left: 2vh;
    }

    .col.text-center img {
        width: 20vh;
    }

    .text-end img {
        width: 7vh;
    }
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col mt-3">
                    <div class="text-end">
                        <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page4/exit.png"
                            class="img-hover-effect"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="#"><img src="<?= $themes ?>assets/img/thai/page4/choose.png"
                            class="img-hover-effect"></a>
                </div>
            </div>
        </div>
    </div>
</div>