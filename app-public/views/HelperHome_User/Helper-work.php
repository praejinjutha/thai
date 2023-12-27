<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>
<div class="container-fluid header-background">
    <div class="clearfix">
        <div class="float-start">
            <a href="<?= site_url('Dashboard') ?>">
                <img src="<?= $themes ?>assets/images/header/02.png" class="img-fluid logo-response" alt="">
            </a>
        </div>
        <div class="float-end setting-profile">
            <span class="fw-bold setting-profile-span"
                style="font-family: promptlight; font-size: 16px;">&nbsp;&nbsp;&nbsp;<?= $this->session->userdata('Name') ?>&nbsp;</span>
            <span class="fw-bold"><img src="<?= $themes ?>assets/images/profile/profile.png" class="setting-profile-img"
                    alt="profile"></span>
            <button type="button" class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span><i class="fa fa-chevron-down"
                    aria-hidden="true"></i></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="clearfix">
        <div class="float-start">
        </div>
        <div class="float-end header-school">
            <h5 class="fw-bold" style="font-family: promptlight; font-size: 20px;">
                <?= $this->session->userdata('SchoolName') ?>
                ต.<?= $this->session->userdata('SubDistrict') ?>
                อ.<?= $this->session->userdata('District') ?>
                จ.<?= $this->session->userdata('Province') ?>
            </h5>
        </div>
    </div>
</div>

<!-- header -->
<div class="container">
    <div class="row text-center mt-3">
        <div class="col">

        </div>
        <div class="col-md-2 menu-bar-other">
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-square-poll-horizontal menu-bar-icon"></i></a>
            <a href="<?= site_url('dashboard') ?>">
                <h5 class="fw-bold">Dashboard</h5>
            </a>
        </div>
        <div class="col-md-2 menu-bar-border menu-bar-other">
            <?php if ($this->session->userdata('Role') == 'admin'): ?>
                <a href="<?= site_url('PersonnelHome') ?>"><i class="fa-solid fa-user"></i></a>
                <a href="<?= site_url('PersonnelHome') ?>"> <h5 class="fw-bold">งานบุคลากร</h5> </a>
            <?php else: ?>
                <a href="<?= site_url('User_Controller/PersonnelHome_User') ?>"><i class="fa-solid fa-user"></i></a>
                <a href="<?= site_url('User_Controller/PersonnelHome_User') ?>"> <h5 class="fw-bold">งานบุคลากร</h5> </a>
            <?php endif; ?>
        </div>
        <div class="col-md-2 menu-bar-border menu-bar-other menu-bar-active">
            <?php if ($this->session->userdata('Role') == 'admin'): ?>
                <a href="<?= site_url('HelperHome') ?>"><i class="fa-solid fa-lightbulb"></i></a>
                <a href="<?= site_url('HelperHome') ?>"><h5 class="fw-bold">ช่วยเหลือ</h5></a>
            <?php else: ?>
                <a href="<?= site_url('User_Controller/HelperHome') ?>"><i class="fa-solid fa-lightbulb"></i></a>
                <a href="<?= site_url('User_Controller/HelperHome') ?>"> <h5 class="fw-bold">งานบุคลากร</h5> </a>
            <?php endif; ?>
        </div>
        <div class="col">

        </div>
    </div>
</div>
<!-- header -->

<section class="theames-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-md-5">
                <div class="row free-box text-center text-header-menu" style="background-color: #464e8f;">
                    <h4 class="fw-bold mt-3 mb-3 text-light" style="font-size: 24px">รายละเอียดการอัปเดต</h4>
                </div>
                <div class="card mt-2">
                    <div class="card-body" style="padding: 0rem 1rem;">
                        <i class="fa-solid fa-lightbulb menu-bar-icon list-menu-icon-home-3"></i>
                        <span class="list-menu-home fw-bold"><a href="#" class="link-hover" style="font-size: 26px">V2.3.7 แก้ไขเมนูข้อมูลบุคลากรรายคน</a></span>
                        <br>
                        <i class="fa-solid fa-lightbulb menu-bar-icon list-menu-icon-home-3"></i>
                        <span class="list-menu-home fw-bold"><a href="#" class="link-hover" style="font-size: 26px">V2.3.6 ยกเลิกการเข้าถึงข้อมูลส่วนบุคคล ผ่านเมนูทำเนียบบุคลากร</a></span>
                        <br>
                        <i class="fa-solid fa-lightbulb menu-bar-icon list-menu-icon-home-3"></i>
                        <span class="list-menu-home fw-bold"><a href="#" class="link-hover" style="font-size: 26px">V2.4.6.5 ปรับปรุงระบบ เพื่อรองรับการกรอกข้อมูลบุคลากรผ่านเว็บไซต์</a></span>
                        <br>
                        <i class="fa-solid fa-lightbulb menu-bar-icon list-menu-icon-home-3"></i>
                        <span class="list-menu-home fw-bold"><a href="#" class="link-hover" style="font-size: 26px">V2.4.5 แก้ไขเมนูการขอพระราชทานเครื่องราชอิสริยาภรณ์</a></span>
                        <br>
                        <i class="fa-solid fa-lightbulb menu-bar-icon list-menu-icon-home-3"></i>
                        <span class="list-menu-home fw-bold"><a href="#" class="link-hover" style="font-size: 26px">V2.4.6.3 ปรับการทำงานเมนูทำเนียบบุคลากรให้สามารถแก้ไขข้อมูลส่วนบุคคลได้</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row free-box text-center text-header-menu " style="background-color: #5b64a9;">
                    <h4 class="fw-bold mt-3 mb-3 text-light" style="font-size: 24px">ช่วยเหลือผู้ใช้งาน</h4>
                </div>
                <div class="row free-box list-menu">
                    <div class="col header-box-3 p-2">
                        <i class="fa-solid fa-lightbulb menu-bar-icon list-menu-icon-home-3"></i>
                        <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/Helpdesk') ?>" style="font-size: 26px">Helpdesk</a></span>
                    </div>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
</section>