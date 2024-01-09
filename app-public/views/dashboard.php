<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<div class="container-fluid header-background">
    <div class="clearfix">
        <div class="float-start">
            <a href="<?= site_url('Dashboard') ?>">
                <img src="<?= $themes ?>assets/images/header/02.png" class="img-fluid logo-response" alt="" width="80%">
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

<div class="container-fluid pt-0">
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

<div class="container">
    <div class="row text-center mt-3">
        <div class="col">

        </div>
        <div class="col-md-2 menu-bar-active">
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-square-poll-horizontal menu-bar-icon"></i></a>
            <a href="<?= site_url('dashboard') ?>">
                <h5 class="fw-bold">Dashboard</h5>
            </a>
        </div>
        <div class="col-md-2 menu-bar-border menu-bar-other">
            <?php if ($this->session->userdata('Role') == 'admin'): ?>
            <a href="<?= site_url('PersonnelHome') ?>"><i class="fa-solid fa-user"></i></a>
            <a href="<?= site_url('PersonnelHome') ?>">
                <h5 class="fw-bold">งานบุคลากร</h5>
            </a>
            <?php else: ?>
            <a href="<?= site_url('User_Controller/PersonnelHome_User') ?>"><i class="fa-solid fa-user"></i></a>
            <a href="<?= site_url('User_Controller/PersonnelHome_User') ?>">
                <h5 class="fw-bold">งานบุคลากร</h5>
            </a>
            <?php endif; ?>
        </div>
        <div class="col-md-2 menu-bar-border menu-bar-other">
            <?php if ($this->session->userdata('Role') == 'admin'): ?>
            <a href="<?= site_url('HelperHome') ?>"><i class="fa-solid fa-lightbulb"></i></a>
            <a href="<?= site_url('HelperHome') ?>">
                <h5 class="fw-bold">ช่วยเหลือ</h5>
            </a>
            <?php else: ?>
            <a href="<?= site_url('User_Controller/HelperHome') ?>"><i class="fa-solid fa-lightbulb"></i></a>
            <a href="<?= site_url('User_Controller/HelperHome') ?>">
                <h5 class="fw-bold">ช่วยเหลือ</h5>
            </a>
            <?php endif; ?>
        </div>
        <div class="col">

        </div>
    </div>
</div>

<div class="container-fluid" style="background: #E5E7E9;">
    <div class="row">
        <div class="col-8">
            <div class="row" style="margin-left: 0">
                <div class="col-md-5 dash-box-style" style="margin-right: 10px">
                    <div class="col-md-12 free-box-dash " style="height: 110px;">
                        <div class="row ">
                            <div class="col-md-7 mt-4" style="padding-right: 0px;">
                                <label class=" fw-bold" style="padding-left: 20px;font-size: 24px;">วันที่</label>
                                <h4 class=" fw-bold" style="padding-left: 20px; color: #6d5e4d; font-size:26px ">
                                    <?= $day ?>
                                </h4>
                            </div>
                            <div class="col-md-5">
                                <div class="float-end mt-2">
                                    <img src="<?= $themes ?>assets/images/dashboard/Web10.png" width="220px"
                                        height="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center" style="height: 110px;">
                        <div class="row">
                            <div class="col mt-4">
                                <h4 class="fw-bold">ภาคเรียนที่</h4>
                                <h4 class="fw-bold" style="color: #6d5e4d; font-size:26px"><?= $Semester ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center" style="height: 110px;">
                        <div class="row">
                            <div class="col mt-4">
                                <h4 class="fw-bold">ปีการศึกษา</h4>
                                <h4 class="fw-bold" style="color: #6d5e4d; font-size:26px"><?= $Acayear ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center" style="height: 110px;">
                        <div class="row">
                            <div class="col mt-4">
                                <h4 class="fw-bold">ปีงบประมาณ</h4>
                                <h4 class="fw-bold" style="color: #6d5e4d; font-size:26px"><?= $Fisyear ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 0">
                <div class="col dash-box-style">
                    <div class="col free-box-dash p-1">
                        <div class="body">
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <?php if ($this->session->userdata('Role') == 'admin'): ?>
                            <a href="<?= site_url('PlanningInformation') ?>">
                                <h5 class="btn fw-bold fs-5"
                                    style="background-color: #d2a549; color: #FFFFFF; padding: 3px;">ข้อมูลสารสนเทศ</h5>
                            </a>
                            <?php else: ?>
                            <a href="<?= site_url('User_Controller/PlanningInformation') ?>">
                                <h5 class="btn fw-bold fs-5"
                                    style="background-color: #d2a549; color: #FFFFFF; padding: 3px;">ข้อมูลสารสนเทศ</h5>
                            </a>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <canvas id="chBar"
                                        style="width:830px !important; height:290px !important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row " style="margin-left: 0">
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center">
                        <div class="row">
                            <div class="col m-2" style="margin-left: 10px;">
                                <img src="<?= $themes ?>assets/images/dashboard/Web11.png" class="img-fluid">
                            </div>
                            <div class="col mt-2" style="padding-left: 0px;">
                                <h4 class=" fw-bold">มา</h4>

                                <h4 class=" fw-bold"><span
                                        style="color: #6d5e4d;"><?php echo  $this->data['Come']; ?></span> คน</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center">
                        <div class="row">
                            <div class="col m-2" style="margin-left: 10px;">
                                <img src="<?= $themes ?>assets/images/dashboard/Web12.png" class="img-fluid">
                            </div>
                            <div class="col mt-2" style="padding-left: 0px;">
                                <h4 class=" fw-bold">ลาป่วย</h4>
                                <h4 class=" fw-bold"><span
                                        style="color: #6d5e4d;"><?php echo  $this->data['Leave']; ?></span> คน</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center">
                        <div class="row">
                            <div class="col m-2" style="margin-left: 10px;">
                                <img src="<?= $themes ?>assets/images/dashboard/Web13.png" class="img-fluid">
                            </div>
                            <div class="col mt-2" style="padding-left: 0px;">
                                <h4 class=" fw-bold">ลากิจ</h4>
                                <h4 class=" fw-bold"><span
                                        style="color: #6d5e4d;"><?php echo  $this->data['PersonalLeave']; ?> </span> คน
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center">
                        <div class="row">
                            <div class="col m-2" style="margin-left: 10px;">
                                <img src="<?= $themes ?>assets/images/dashboard/Web14.png" class="img-fluid">
                            </div>
                            <div class="col mt-2 " style="padding-left: 0px;">
                                <h4 class=" fw-bold">ขาด</h4>
                                <h4 class=" fw-bold"><span
                                        style="color: #6d5e4d;"><?php echo  $this->data['Absence']; ?> </span> คน</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center">
                        <div class="row">
                            <div class="col  m-2" style="margin-left: 10px;">
                                <img src="<?= $themes ?>assets/images/dashboard/Web15.png" class="img-fluid">
                            </div>
                            <div class="col mt-2" style="padding-left: 0px;">
                                <h4 class=" fw-bold">ไปราชการ</h4>
                                <h4 class=" fw-bold"><span
                                        style="color: #6d5e4d;"><?php echo  $this->data['OnofficialDuty']; ?> </span> คน
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col dash-box-style">
                    <div class="col free-box-dash text-center">
                        <div class="row">
                            <div class="col m-2" style="margin-left: 10px;">
                                <img src="<?= $themes ?>assets/images/dashboard/Web16.png" class="img-fluid">
                            </div>
                            <div class="col mt-2" style="padding-left: 0px;">
                                <h4 class=" fw-bold">สาย</h4>
                                <h4 class=" fw-bold"><span style="color: #6d5e4d;"><?php echo  $this->data['Late']; ?>
                                    </span> คน</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <div class="col free-box-dash " style="height: auto;">
                        <div class="row" style="margin: 0px 20px 0px 20px;">
                            <table class="mt-2" style="padding-right: 35px;">
                                <thead class="border-bottom fw-bold ">
                                    <tr>
                                        <th style="font-size: 25px; width: 70% ">ผู้บริหารสถานศึกษา </th>
                                        <th style="font-size: 25px; width: 5%; text-align: right">
                                            <?= $this->data['total_rows20'] ?></th>
                                        <th style="font-size: 25px; width: 25%; text-align:right;">คน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($this->data['total_rows2'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ผู้อำนวยการสถานศึกษา</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows2'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if ($this->data['total_rows3'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">รองผู้อำนวยการสถานศึกษา</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows3'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col free-box-dash " style="height: auto;">
                        <div class="row" style="margin: 0px 20px 0px 20px;">
                            <table class="mt-2">
                                <thead class="border-bottom fw-bold">
                                    <tr>
                                        <th style="font-size: 25px; width: 70% ">ผู้สอนในหน่วยงานการศึกษา</th>
                                        <th style="font-size: 25px; width: 5%; text-align:right; ">
                                            <?= $this->data['total_rows21'] ?></th>
                                        <th style="font-size: 25px; width: 25%; text-align:right; ">คน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    <?php if ($this->data['total_rows4'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครูผู้ช่วย</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows4'] ?>
                                        </td>
                                        <td
                                            style="font-size: 22px; padding-top: 10px; text-align:right; padding-top: 5px">
                                            คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows5'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครู</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows5'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows6'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">อาจารย์</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows6'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows7'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ผู้ช่วยศาสตราจารย์</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows7'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows8'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">รองศาสตราจารย์</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows8'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows9'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ศาสตราจารย์</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows9'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col free-box-dash" style="height: auto;">
                        <div class="row" style="margin: 0px 20px 0px 20px;">
                            <table class="mt-2">
                                <thead class="border-bottom fw-bold">
                                    <tr>
                                        <th style="font-size: 25px; width: 70%">พนักงาน / ลูกจ้าง</th>
                                        <th style="font-size: 25px; width: 5%; text-align:right;">
                                            <?= $this->data['total_rows22'] ?></th>
                                        <th style="font-size: 25px; width: 25%; text-align:right;">คน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($this->data['total_rows10'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครูผู้ช่วย</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows10'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows11'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครู</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows11'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows12'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ศึกษานิเทศก์</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows12'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows13'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครูธุรการ</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows13'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows14'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครูอัตราจ้าง</td>
                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">
                                            <?= $this->data['total_rows14'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows15'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ครูพี่เลี้ยง</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows15'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows16'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ลูกจ้างชั่วคราว</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows16'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows17'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">ลูกจ้างประจำ</td>
                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">
                                            <?= $this->data['total_rows17'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right;padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows18'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">เจ้าหน้าที่ธุรการ</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows18'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php if ($this->data['total_rows19'] > 0): ?>
                                    <tr>
                                        <td style="font-size: 22px; padding-top: 5px">อื่น ๆ</td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">
                                            <?= $this->data['total_rows19'] ?>
                                        </td>
                                        <td style="font-size: 22px; text-align:right; padding-top: 5px">คน</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col free-box-dash " style="height: auto; background: #d2a549;">
                        <div class="row" style="margin: 0px 20px 0px 20px;">
                            <table class="mt-2" style="padding-right: 35px; color: #fff">
                                <thead class="fw-bold ">
                                    <tr>
                                        <th style="font-size: 25px; width: 70% ">รวม </th>
                                        <th style="font-size: 25px; width: 5%; text-align:right;">
                                            <?= $this->data['total_rows20'] + $this->data['total_rows21'] + $this->data['total_rows22'] ?>
                                        </th>
                                        <th style="font-size: 25px; width: 25%; text-align:right;">คน</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var chBar = document.getElementById("chBar");
if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: {
            labels: ["มา", "ลาป่วย", "ลากิจ", "ขาด", "ไปราชการ", "สาย"],
            datasets: [{
                data: [<?=  $this->data['Come']; ?>,
                    <?= $this->data['Leave']; ?>,
                    <?= $this->data['PersonalLeave']; ?>,
                    <?= $this->data['Absence']; ?>,
                    <?= $this->data['OnofficialDuty']; ?>,
                    <?= $this->data['Late']; ?>, 20, 0
                ],
                backgroundColor: [
                    'rgba(143, 186, 35)',
                    'rgba(253, 105, 33)',
                    'rgba(47, 161, 216)',
                    'rgba(227, 34, 50)',
                    'rgba(91, 100, 169)',
                    'rgba(255, 213, 97)'
                ],
            }, ]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    barPercentage: 1,
                    categoryPercentage: 0.6
                }]
            }
        }
    });
}
</script>