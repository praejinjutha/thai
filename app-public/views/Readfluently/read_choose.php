<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page4/bg-choose.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.img-hover-effect {
    transition: transform 0.3s ease-in-out;
}

.img-hover-effect:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-next {
    top: 80vh;
    right: 30vh;
    width: 25vh;
    position: absolute;
    transition: transform 0.3s ease-in-out;
}

.btn-next:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-document {
    width: 25vh;
    height: 7vh;
    margin-right: 10vh;
    transition: transform 0.3s ease-in-out;
}

.btn-document:hover {
    cursor: pointer;
    opacity: 1;
    transform: scale(1.1);
}
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <div class="text-end">
                <a href="<?= $themes ?>assets/files/Reading/document/<?= $this->data['ID'] ?>.pdf" target="_blank">
                    <img src="<?= $themes ?>assets/img/document.png" alt="" class="btn-document">
                </a>
                <a href="<?= site_url('Readfluently_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page3/home.png" width="60vh"
                        class="img-hover-effect me-3"></a>
                <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page3/exit.png" width="50vh"
                        class="img-hover-effect"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="#">
                <img src="<?= $themes ?>assets/img/thai/page4/btn-next.png" class="btn-next">
            </a>
        </div>
    </div>
</div>