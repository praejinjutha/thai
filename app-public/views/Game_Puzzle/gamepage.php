<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    font-family: 'Sarabun', sans-serif;
    background-image: url("<?= $themes ?>assets/img/thai/page6/choicerole/bg-page.png");
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

.role {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    height: 85vh; 
    margin-left: 65vh;
}

.boy {
    width: 40vh;
    transition: transform 0.3s ease-in-out;
}

.boy:hover {
    cursor: pointer;
    width: 40vh;
    transform: scale(1.05);
}

.girl {
    margin-left: 10vh;
    width: 40vh;
    transition: transform 0.3s ease-in-out;
}

.girl:hover {
    cursor: pointer;
    width: 40vh;
    transform: scale(1.05);
}

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="#" onclick="window.close();"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/exit.png" alt="" class="btn-exit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="role">
                <a href="<?= site_url('GamePuzzle_controller/Rules/1') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/boy.png" class="boy"></a>
                <a href="<?= site_url('GamePuzzle_controller/Rules/2') ?>"><img src="<?= $themes ?>assets/img/thai/page6/choicerole/girl.png" class="girl"></a>
            </div>
        </div>
    </div>
</div>