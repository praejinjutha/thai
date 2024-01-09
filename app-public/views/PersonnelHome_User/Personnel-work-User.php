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
        <div class="row">
            <div class="col text-end">
                <span class="fw-bold ml-6"
                    style="font-family: promptlight; font-size: 16px;">&nbsp;&nbsp;<?= $this->session->userdata('Name') ?>&nbsp;</span>
                <i class="fa-solid fa-user fs-5"></i>
                <button type="button" class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="glyphicon glyphicon-cog"></span><i class="fa fa-chevron-down"
                        aria-hidden="true"></i></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item fw-bold" href="<?= site_url('auth/logout') ?>">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col pt-1 text-end" style="padding-right: 65px">
                <a href="<?= $themes ?>assets/file/ระบบงานบุคลากร.pdf" class="fw-bold" style="text-decoration: none;"
                    target="_blank">
                    <span
                        style="font-family: promptlight; font-size: 16px; font-weight: bold; cursor: pointer; color: #000;">
                        คู่มือการใช้งาน&nbsp;&nbsp;<i class="fa-solid fa-book fs-5"></i>
                    </span>
                </a>
            </div>
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
        <div class="col-md-2 menu-bar-border menu-bar-other menu-bar-active">
            <?php if ($this->session->userdata('Role') == 'admin'): ?>
                <a href="<?= site_url('PersonnelHome') ?>"><i class="fa-solid fa-user"></i></a>
                <a href="<?= site_url('PersonnelHome') ?>"> <h5 class="fw-bold">งานบุคลากร</h5> </a>
            <?php else: ?>
                <a href="<?= site_url('User_Controller/PersonnelHome_User') ?>"><i class="fa-solid fa-user"></i></a>
                <a href="<?= site_url('User_Controller/PersonnelHome_User') ?>"> <h5 class="fw-bold">งานบุคลากร</h5> </a>
            <?php endif; ?>
        </div>
        <div class="col-md-2 menu-bar-border menu-bar-other">
            <?php if ($this->session->userdata('Role') == 'admin'): ?>
                <a href="<?= site_url('HelperHome') ?>"><i class="fa-solid fa-lightbulb"></i></a>
                <a href="<?= site_url('HelperHome') ?>"><h5 class="fw-bold">ช่วยเหลือ</h5></a>
            <?php else: ?>
                <a href="<?= site_url('User_Controller/HelperHome') ?>"><i class="fa-solid fa-lightbulb"></i></a>
                <a href="<?= site_url('User_Controller/HelperHome') ?>"><h5 class="fw-bold">ช่วยเหลือ</h5></a>
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
                    <h4 class="fw-bold mt-2 text-light mt-3 mb-3" style="font-size: 24px">ข้อมูลบุคลากร</h4>
                </div>
                <div class="row free-box list-menu">
                    <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                        <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3 ml-1" ></i>
                        <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/PersonnelInformation/show/') ?><?= $this->data['IDCard'] ?>" style="font-size: 26px">ข้อมูลบุคลากรรายบุคคล</a></span>
                    </div>
                </div>
                <div class="row free-box list-menu">
                                <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                                    <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                                    <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/OperationRecord_User') ?> " style="font-size: 26px">บันทึกไปมาปฏิบัติงาน ลา ไปราชการ</a></span>
                                </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a
                                    href="<?= site_url('User_Controller/PersonnelDirectory') ?>" style="font-size: 26px">ทำเนียบบุคลากร</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/RequestForInsignia') ?>" style="font-size: 26px">การขอพระราชทานเครื่องราชอิสริยาภรณ์</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/HonorAward') ?>" style="font-size: 26px">การยกย่องเชิดชูเกียรติ /
                                    รางวัลเกียรติยศ</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/PersonnelDevelopment') ?>" style="font-size: 26px">การพัฒนาข้าราชการครูและบุคลากร</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/PlanningInformation') ?>" style="font-size: 26px">ข้อมูลการวางแผนอัตรากำลัง</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/ConsiderFiveyears/index/') ?><?= $this->data['IDCard'] ?>" style="font-size: 26px">บันทึกข้อมูลการพิจารณาความดีความชอบ ย้อนหลัง 5
                                    ปี</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/AssignmentSystem') ?>" style="font-size: 26px">ระบบมอบหมาย / ติดตามงาน</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row free-box text-center text-header-menu" style="background-color: #5b64a9;">
                        <h4 class="fw-bold mt-2 text-light mt-3 mb-3" style="font-size: 24px">นำเข้าข้อมูลและรายงานผล</h4>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/IDplan/show/') ?><?= $this->data['IDCard'] ?>" style="font-size: 26px">การประเมินผลการพัฒนางานตามข้อตกลง PA</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/LeaveNotice/user/') ?><?= $this->data['IDCard'] ?>" style="font-size: 26px">การแจ้งลา</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/BeonDuty') ?>" style="font-size: 26px">การจัดเวร</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a href="<?= site_url('User_Controller/PerformanceAppraisal') ?>" style="font-size: 26px">การประเมินผลการปฏิบัติงาน</a></span>
                        </div>
                    </div>
                    <div class="row free-box list-menu">
                        <div class="col header-box-3" style="padding: 5px 5px 5px 20px">
                            <i class="fa-solid fa-user menu-bar-icon list-menu-icon-home-3"></i>
                            <span class="list-menu-home fw-bold"><a
                                    href="https://www.ksp.or.th/ksp2018/" style="font-size: 26px" target="_blank">ระบบการขอและต่อใบอนุญาตประกอบวิชาชีพครูและผู้บริหารสถานศึกษา</a></span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>
</section>