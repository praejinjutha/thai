<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page6/rules/rules.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
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

.role {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    height: 85vh; 
}

.start {
    width: 30vh;
    margin-right: 8vh;
    transition: transform 0.3s ease-in-out;
}

.start:hover {
    cursor: pointer;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="<?= site_url('GamePuzzle_controller') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/home.png" alt="" class="btn-home"></a>
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="role">
                <a href="<?= site_url('GamePuzzle_controller/PlayGame/' . $this->data['Role']) ?>"><img src="<?= $themes ?>assets/img/thai/page6/rules/start.png" class="start"></a>
            </div>
        </div>
    </div>
</div>