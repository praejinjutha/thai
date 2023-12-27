<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="container-fluid" style="padding: 0px;">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PersonnelInformation') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">ข้อมูลบุคลากรรายบุคคล</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-4" style="padding-right: 0px;">
                <div class="col border">
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active w-100"><a href="#showdata" data-toggle="tab"
                                class="nav-link active fw-bold ">ข้อมูลทั่วไป</a></li>
                        <li class="w-100"><a href="#address " data-toggle="tab" class="nav-link fw-bold ">ที่อยู่</a>
                        </li>
                        <li class="w-100"><a href="#familydetail" data-toggle="tab"
                                class="nav-link fw-bold ">ข้อมูลครอบครัว</a></li>
                        <li class="w-100"><a href="#contact" data-toggle="tab"
                                class="nav-link fw-bold ">ผู้ที่สามารถติดต่อได้</a></li>
                        <li class="w-100"><a href="#study" data-toggle="tab"
                                class="nav-link fw-bold ">ข้อมูลการศึกษา</a></li>
                        <li class="w-100"><a href="#training" data-toggle="tab"
                                class="nav-link fw-bold ">ประวัติการอบรม</a></li>
                        <li class="w-100"><a href="#position" data-toggle="tab"
                                class="nav-link fw-bold ">ประวัติการเลื่อนตำแหน่ง</a></li>
                        <li class="w-100"><a href="#teaching" data-toggle="tab"
                                class="nav-link fw-bold ">ข้อมูลการสอน</a></li>
                        <li class="w-100"><a href="#license" data-toggle="tab"
                                class="nav-link fw-bold ">ใบอนุญาตประกอบวิชาชีพ</a></li>
                        <li class="w-100"><a href="#leave" data-toggle="tab"
                                class="nav-link fw-bold ">ประวัติการลา/การเปลี่ยนชื่อ</a></li>
                        <li class="w-100 "><a href="#insignia" data-toggle="tab"
                                class="nav-link fw-bold">ประวัติการรับเครื่องราชอิสริยาภรณ์</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10">
                <div class="tab-content">
                    <!-- ************************* START ข้อมูลทั้วไป ************************* -->
                    <div class="tab-pane active" id="showdata">
                        <!-- ********** รูปบุคลากร ************ -->
                        <div class="col mt-4">
                            <form action="" method="POST" id="UpdateData" role="form">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <h3 style="font-weight: bold; margin-top: 10px">รูปประจำตัวบุคลากร</h3>
                                        <div class="col">
                                            <img id="previewImg1" src="<?= empty($this->data['Pic']) ? $themes . 'assets/images/no_img/170x170.jfif' 
                                        : 'data:Pic/jpeg;base64,'. base64_encode($this->data['Pic']) ?>" width="170"
                                                height="170" />
                                            <input type="file" class="form-control mt-3" id="Pic"
                                                onchange="previewImage(this, 'previewImg1')">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h5 class="card-title mt-2 fw-bold"
                                                    style="font-size: 32px;color: #18409e; font-size: 32px;">
                                                    ข้อมูลส่วนตัว</h5>
                                            </div>
                                            <div class="col-sm-1">
                                                <a href="<?= site_url('PersonnelInformation/Export_Personnel/') . '?IDCard=' . $this->data['IDCard'] ?>" class="btn btn-primary fw-bold fs-4" style="height: 50px">ส่งออก</a>
                                            </div>
                                            
                                            <?php if ($this->session->userdata('Role') == 'admin') {
                                        ?>
                                            <div class="col-sm-2">
                                                <a class="btn btn-danger remove fw-bold fs-4" style="height: 50px;">ย้ายโรงเรียน/ตามคำสั่ง</a>
                                            </div>
                                            <?php
                                            } else {
                                        ?>
                                            <?php
                                            }
                                        ?>
                                        </div>
                                        <hr style="color: #eac178;height: 2px;opacity: 1;">
                                        <!-- ********* ข้อมูลส่วนที่ 1 ********** -->
                                        <div class="box-border border" style="background-color: #f2daae;">
                                            <div class="row m-2 mt-3">
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group row fw-bold">
                                                        <label class="col-md-5 col-form-label">เลขที่บัตรประชาชน
                                                            <span style="color: red;">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="IDCard"
                                                                name="IDCard" value="<?= $this->data['IDCard'] ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group row fw-bold">
                                                        <label class="col-md-5 col-form-label">เลขที่พาสปอร์ต</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="Passport"
                                                                name="Passport" maxlength="13"
                                                                value="<?= $this->data['Passport'] ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <div class="col-md-6 mt-3 mb-3">
                                                    <div class="form-group row fw-bold">
                                                        <label class="col-md-5 col-form-label">เลขที่ตำแหน่ง
                                                            <span style="color: red;">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="PoNo"
                                                                name="PoNo" maxlength="12"
                                                                value="<?= $this->data['PoNo'] ?>" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3 mb-3">
                                                    <div class="form-group row fw-bold">
                                                        <label class="col-md-5 col-form-label">สถานภาพการทำงาน
                                                            <span style="color: red;">*</span></label>
                                                        <div class="col-md-6">
                                                            <select class="form-select" name="NStatus" id="NStatus"
                                                                value="" required>
                                                                <option value="<?= $this->data['NStatus'] ?>"
                                                                    class="select-fnz">
                                                                    <?= $this->data['NStatus'] ?></option>
                                                                <?php 
                                                            foreach ($Status as $row) {

                                                                if ($row->Status !== $this->data['NStatus']) {
                                                                ?>
                                                                <option class="select-fnz" value="<?= $row->Status ?>">
                                                                    <?= $row->Status ?></option>
                                                                <?php
                                                                    }
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ********* ข้อมูลส่วนที่ 2 ********** -->
                                <div class="col box-border border mt-2" style="background-color: #d3d8e6;">
                                    <div class="row mt-4 m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">คำนำหน้า
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-6">
                                                    <select class="form-select" name="PName" id="PName" value=""
                                                        required>
                                                        <option value="<?= $this->data['PName'] ?>" class="select-fnz">
                                                            <?= $this->data['PName'] ?></option>
                                                        <?php 
                                                    foreach ($STTPname as $row) {

                                                        if ($row->TSPname !== $this->data['PName']) {
                                                        ?>
                                                        <option class="select-fnz" value="<?= $row->TSPname ?>">
                                                            <?= $row->TSPname ?></option>
                                                        <?php
                                                            }
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 mt-2">&nbsp;
                                                    <i class="fa-solid fa-circle-plus" style="color: green;"
                                                        data-bs-toggle="modal" data-bs-target="#ModalThaiTitle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">ชื่อ
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="FTName" name="FTName"
                                                        value="<?= $this->data['FTName'] ?>" maxlength="20" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">นามสกุล
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="LTName" name="LTName"
                                                        value="<?= $this->data['LTName'] ?>" maxlength="20" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">Name
                                                    Titles <span style="color: red;">*</span></label>
                                                <div class="col-md-6">
                                                    <select class="form-select" style='font-size:22px;' name="PEName"
                                                        id="PEName" value=" " required>
                                                        <option value="<?= $this->data['PEName'] ?>">
                                                            <?= $this->data['PEName'] ?></option>
                                                        <?php 
                                                    foreach ($STPname as $row) {

                                                        if ($row->SPname !== $this->data['PEName']) {
                                                        ?>
                                                        <option class="select-fnz" value="<?= $row->SPname ?>">
                                                            <?= $row->SPname ?></option>
                                                        <?php
                                                            }
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 mt-2">&nbsp;
                                                    <i class="fa-solid fa-circle-plus" style="color: green;"
                                                        data-bs-toggle="modal" data-bs-target="#ModalEngTitle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">Name
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="FEName" name="FEName"
                                                        value="<?= $this->data['FEName'] ?>" maxlength="20" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">Lastname
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="LEName" name="LEName"
                                                        value="<?= $this->data['LEName'] ?>" maxlength="20" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">ประเภทข้าราชการ</label>
                                                <div class="col-md-7">
                                                    <select class="form-select" name="PoType" id="PoType" onclick="removeOptionPersonnalData()">
                                                        <option value="<?= $this->data['PoType'] ?>" class="select-fnz">
                                                            <?= $this->data['TypeName'] ?></option>
                                                            <?php 
                                                                foreach($getTeacherType as $row){
                                                                    echo '<option value="'.$row->ID.'" class="select-fnz">'.$row->TypeName.'</option>';
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">ตำแหน่งปัจจุบัน
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-7">
                                                    <select class="form-select" name="PoLine" id="PoLine" required>
                                                        <option value="<?= $this->data['PoLine'] ?>" class="select-fnz">
                                                            <?= $this->data['PosName'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">ระดับปัจจุบัน</label>
                                                <div class="col-md-7">
                                                    <select class="form-select" name="PLevel" id="PLevel">
                                                        <option value="<?= $this->data['PLevel'] ?>" class="select-fnz">
                                                            <?= $this->data['Level']  ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">เพศ
                                                    <span style="color: red;">*</span></label>
                                                <div class="col-md-8 mt-2">
                                                    <input class="form-check-input" type="radio" name="Sex" id="SexM"
                                                        value="M" <?php if ($this->data['Sex'] == 'M') {
                                                        echo 'checked';
                                                        } else {
                                                        echo '';
                                                        }
                                                    ?> required>
                                                    <label class="form-check-label fw-bold "
                                                        style="padding-right: 10px">
                                                        ชาย</label>
                                                    <input class="form-check-input" type="radio" name="Sex" id="SexF"
                                                        value="F" <?php if ($this->data['Sex'] == 'F') {
                                                        echo 'checked';
                                                        } else {
                                                        echo '';
                                                        }
                                                    ?> required>
                                                    <label class="form-check-label fw-bold">หญิง </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">กลุ่มสาระ/หมวดวิชา</label>
                                                <div class="col-md-7">
                                                    <select class="form-select" style='font-size:22px;'
                                                        name="Subject_group" id="Subject_group" value="">
                                                        <option value="<?= $this->data['Subject_group'] ?>"
                                                            class="select-fnz">
                                                            <?= $this->data['Subject_group'] ?></option>
                                                        <?php 
                                                    foreach ($SubGroup as $row) {
                                                        if ($row->GroupName !== $this->data['Subject_group']) {
                                                        ?>
                                                        <option class="select-fnz" value="<?= $row->GroupName ?>">
                                                            <?= $row->GroupName ?></option>
                                                        <?php
                                                            }
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">ตำแหน่งอื่นที่ได้รับ</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="PoAssign"
                                                        name="PoAssign" maxlength="20"
                                                        value="<?= $this->data['PoAssign'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">วัน/เดือน/ปี
                                                    เกิด</label>
                                                <div class="col-md-7">
                                                    <input type="date" class="form-control" id="BirthDate"
                                                        name="BirthDate" value="<?= $this->data['BirthDate'] ?>"
                                                        onchange="calculateAge()">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-2 col-form-label text">อายุ</label>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control text-center" id="Year"
                                                        name="Year" value="<?= $years ?>">
                                                </div>
                                                <label class="col-md-1 col-form-label text-center">ปี</label>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control text-center" id="Month"
                                                        name="Month" value="<?= $months ?>">
                                                </div>
                                                <label class="col-md-1 col-form-label text-center">เดือน</label>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control text-center" id="Day"
                                                        name="Day" value="<?= $days ?>">
                                                </div>
                                                <label class="col-md-1 col-form-label text-center">วัน</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">วันครบเกษียณอายุ</label>
                                                <div class="col-md-7">
                                                    <input type="date" class="form-control" id="MretireDate"
                                                        name="MretireDate" value="<?= $this->data['MretireDate'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row fw-bold ">
                                                <label class="col-md-2 col-form-label"
                                                    style="padding-right: 0px;">อายุข้าราชการเหลือ</label>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control text-center"
                                                        id="years_remaining" name="years_remaining"
                                                        value="<?= $years_remaining ?>" readonly>
                                                </div>
                                                <label class="col-md-1 col-form-label text-center">ปี</label>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control text-center"
                                                        id="months_remaining" name="months_remaining"
                                                        value="<?= $months_remaining ?>" readonly>
                                                </div>
                                                <label class="col-md-1 col-form-label text-center">เดือน</label>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control text-center"
                                                        id="days_remaining" name="days_remaining"
                                                        value="<?= $days_remaining ?>" readonly>
                                                </div>
                                                <label class="col-md-1 col-form-label text-center">วัน</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#eac178; height: 3px;">
                                <div class="col mt-2">
                                    <div class="row">
                                        <!-- ********* ข้อมูลส่วนที่ 3 ********** -->
                                        <div class="col-md-3 ">
                                            <div class="row box-border fw-bold border" style="margin: 0px;">
                                                <div class="form-group row fw-bold" style="padding: 6px 0 6px 25px">
                                                    <label class="col-md-6 col-form-label mt-3">สัญชาติ</label>
                                                    <div class="col-md-6">
                                                        <select class="form-select mt-3" style='font-size:22px;'
                                                            name="Nationality" id="Nationality" value=" ">
                                                            <?= $fixedData = $this->data['Nationality'];
                                                        $options = array("ไทย", "จีน", "อังกฤษ", "ลาว", "เมียนมาร์", "มาเลเซีย", "ฟิลิปปินส์", "แคเมอรูน", "อื่น ๆ");
                                                        foreach ($options as $option) {
                                                            if ($option !== $fixedData) {
                                                                echo "<option value=\"$option\" class=\"select-fnz\">$option</option>";
                                                            } else {
                                                                echo "<option value=\"$fixedData\" class=\"select-fnz\" selected>$fixedData</option>";
                                                            }
                                                        } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row fw-bold" style="padding: 6px 0 6px 25px">
                                                    <label class="col-md-6 col-form-label">เชื้อชาติ</label>
                                                    <div class="col-md-6">
                                                        <select class="form-select" style='font-size:22px;' name="Race"
                                                            id="Race" value=" ">
                                                            <?= $fixedData = $this->data['Race'];
                                                        $options = array("ไทย", "จีน", "อังกฤษ", "ลาว", "เมียนมาร์", "มาเลเซีย", "ฟิลิปปินส์", "แคเมอรูน", "อื่น ๆ");
                                                        foreach ($options as $option) {
                                                            if ($option !== $fixedData) {
                                                                echo "<option value=\"$option\" class=\"select-fnz\">$option</option>";
                                                            } else {
                                                                echo "<option value=\"$fixedData\" class=\"select-fnz\" selected>$fixedData</option>";
                                                            }
                                                        } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row fw-bold" style="padding: 6px 0 6px 25px">
                                                    <label class="col-md-6 col-form-label">ศาสนา</label>
                                                    <div class="col-md-6">
                                                        <select class="form-select" style='font-size:22px;'
                                                            name="Religion" id="Religion" value=" ">
                                                            <?= $fixedData = $this->data['Religion'];
                                                        $options = array("พุทธ", "คริสต์", "อิสลาม", "ฮินดู", "ซิกซ์", "อื่น ๆ");
                                                        foreach ($options as $option) {
                                                            if ($option !== $fixedData) {
                                                                echo "<option value=\"$option\" class=\"select-fnz\">$option</option>";
                                                            } else {
                                                                echo "<option value=\"$fixedData\" class=\"select-fnz\" selected>$fixedData</option>";
                                                            }
                                                        } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row fw-bold" style="padding: 6px 0 6px 25px">
                                                    <label class="col-md-6 col-form-label">หมู่โลหิต</label>
                                                    <div class="col-md-6">
                                                        <select class="form-select" style='font-size:22px;'
                                                            name="BloodG" id="BloodG" value=" ">
                                                            <?= $fixedData = $this->data['BloodG'];
                                                        $options = array("A", "B", "AB", "O");
                                                        foreach ($options as $option) {
                                                            if ($option !== $fixedData) {
                                                                echo "<option value=\"$option\" class=\"select-fnz\">$option</option>";
                                                            } else {
                                                                echo "<option value=\"$fixedData\" class=\"select-fnz\" selected>$fixedData</option>";
                                                            }
                                                        } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row fw-bold" style="padding: 6px 0 6px 25px">
                                                    <label class="col-md-6 col-form-label">สถานภาพ</label>
                                                    <div class="col-md-6">
                                                        <select class="form-select mb-2" style='font-size:22px;'
                                                            name="MStatus" id="MStatus">
                                                            <?= $fixedData = $this->data['MStatus'];
                                                        $options = array("โสด","สมรส", "หย่าร้าง", "หม้าย", "แยกกันอยู่");
                                                        foreach ($options as $option) {
                                                            if ($option !== $fixedData) {
                                                                echo "<option value=\"$option\" class=\"select-fnz\">$option</option>";
                                                            } else {
                                                                echo "<option value=\"$fixedData\" class=\"select-fnz\" selected>$fixedData</option>";
                                                            }
                                                        } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ********* ข้อมูลส่วนที่ 4 ********** -->
                                        <div class="col-md-9 border" style="width: 74%;">
                                            <div class="row box-border fw-bold ">
                                                <div class="row mb-4 mt-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label">ชื่อบิดา</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="FaName"
                                                                    name="FaName" value="<?= $this->data['FaName'] ?>"
                                                                    maxlength="20">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label">ชื่อมารดา</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="MaName"
                                                                    name="MaName" value="<?= $this->data['MaName'] ?>"
                                                                    maxlength="20">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label">วันสั่งบรรจุ</label>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control" id="PlaceDate"
                                                                    name="PlaceDate"
                                                                    value="<?= $this->data['PlaceDate']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label
                                                                class="col-md-6 col-form-label">วันเริ่มปฏิบัติราชการ</label>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control" id="StartDate"
                                                                    name="StartDate"
                                                                    value="<?= $this->data['StartDate'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label">ว/ด/ป
                                                                ที่ออกใบอนุญาตครั้งแรก</label>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control"
                                                                    id="LProfessionFirstDate"
                                                                    name="LProfessionFirstDate"
                                                                    value="<?= $this->data['LProfessionFirstDate'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label"
                                                                style="padding-right: 0px">ว/ด/ป
                                                                ปฏิบัติราชการในสถานศึกษาปัจจุบัน</label>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control" id="NowDate"
                                                                    name="NowDate"
                                                                    value="<?= $this->data['NowDate'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label">การเป็นสมาชิก
                                                                กบข.</label>
                                                            <div class="col-md-6 ">
                                                                <select class="form-select" name="MemberKBK"
                                                                    id="MemberKBK" onchange="MemberKBKChange()">
                                                                    <?php
                                                                    $fixedData = $this->data['MemberKBK'] == "Y" ? "เป็น" : "ไม่เป็น";
                                                                    $options = array("เป็น", "ไม่เป็น");
                                                                    foreach ($options as $option) {
                                                                        $value = $option == "เป็น" ? "Y" : "N";
                                                                        $selected = $fixedData == $option ? "selected" : "";
                                                                        echo "<option value=\"$value\" class=\"select-fnz\" $selected>$option</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row fw-bold">
                                                            <label class="col-md-6 col-form-label">การสะสมเข้า
                                                                กบข.</label>
                                                            <div class="col-md-4">
                                                                <?php
                                                            if ($this->data['MemberKBK'] == "Y") {
                                                                $newSalary = $this->data['NSalary'];
                                                                echo '<input type="text" class="form-control text-end" id="CAccessKBK" name="CAccessKBK" value="' . number_format($newSalary, 2) . '" readonly>';
                                                            } else {
                                                                echo '<input type="text" class="form-control text-end" id="CAccessKBK" name="CAccessKBK" value="0" readonly>';
                                                            }
                                                            ?>
                                                            </div>&nbsp;
                                                            <label class="col-md-1 col-form-label">บาท</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#eac178; height: 3px;">
                                <!-- ********* ข้อมูลส่วนที่ 5 ********** -->
                                <div class="col box-border border mt-2">
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">สถานที่ปฏิบัติงาน</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="School" name="School"
                                                        value="<?= $this->data['School'] ?>" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">สังกัด</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="Member" name="Member"
                                                        value="<?= $this->data['Member'] ?>" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">กรม</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="PZone" name="PZone"
                                                        value="<?= $this->data['PZone'] ?>" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">กระทรวง</label>
                                                <div class="col-md-7">
                                                    <select class="form-select" style='font-size:22px;' id="Ministry"
                                                        name="Ministry" value=" ">
                                                        <option value="<?= $this->data['Ministry'] ?>"
                                                            class="select-fnz">
                                                            <?= $this->data['Ministry'] ?></option>
                                                        <option value="ศึกษาธิการ" class="select-fnz">
                                                            ศึกษาธิการ</option>
                                                        <option value="มหาดไทย" class="select-fnz">
                                                            มหาดไทย</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">สพท./เขต</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="Area" name="Area"
                                                        value="<?= $this->data['Area'] ?>" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-6 col-form-label">เลขที่คำสั่ง</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="MemId" name="MemId"
                                                        value="<?= $this->data['MemId'] ?>" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-6 col-form-label">ว/ด/ป
                                                    ที่ดำรงตำแหน่งปัจจุบัน</label>
                                                <div class="col-md-5">
                                                    <input type="date" class="form-control" id="PoDate" name="PoDate"
                                                        value="<?= $this->data['PoDate'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-6 col-form-label">วุฒิที่ใช้บรรจุ</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="PlaceBA" name="PlaceBA"
                                                        value="<?= $this->data['PlaceBA'] ?>" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-6 col-form-label">วุฒิสูงสุด</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="TopBA" name="TopBA"
                                                        value="<?= $this->data['TopBA'] ?>" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-6 col-form-label">วุฒิในตำแหน่งปัจจุบัน</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="PoBA" name="PoBA"
                                                        value="<?= $this->data['PoBA'] ?>" maxlength="20">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row_class col-md-4">
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">เงินเดือน</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control text-end" id="MSalary"
                                                        name="MSalary"
                                                        value="<?= number_format($this->data['MSalary'], 2) ?>">
                                                </div>
                                                <label class="col-md-2 col-form-label">บาท</label>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">เงินวิทยฐานะ</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control text-end" id="EMoney"
                                                        name="EMoney"
                                                        value="<?= number_format($this->data['EMoney'], 2) ?>">

                                                </div>
                                                <label class="col-md-2 col-form-label">บาท</label>
                                            </div>
                                            <div class="form-group row fw-bold mb-1">
                                                <label class="col-md-4 col-form-label">เงินประจำตำแหน่ง</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control text-end" id="PoSalary"
                                                        name="PoSalary"
                                                        value="<?= number_format($this->data['PoSalary'], 2) ?>">

                                                </div>
                                                <label class="col-md-2 col-form-label">บาท</label>
                                            </div>
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">รายได้สุทธิรวม</label>
                                                <div class="col-md-5 ">
                                                    <input type="text" class="form-control text-end" name="Salsum"
                                                        id="Salsum"
                                                        value="<?= number_format($this->data['Salsum'], 2) ?>" readonly>
                                                </div>
                                                <label class="col-md-2 col-form-label">บาท</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#eac178; height: 3px;">
                                <!-- ********* ข้อมูลส่วนที่ 6 ********** -->
                                <div class="col box-border border mt-2">
                                    <div class="row m-2">
                                        <h4 class="fw-bold">ข้อมูลวิทยฐานะ</h4>
                                        <div class="col-md-3">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-5 col-form-label">วันที่ได้รับ</label>
                                                <div class="col-md-7">
                                                    <input type="date" class="form-control" id="RecieveDate"
                                                        name="RecieveDate" value="<?= $this->data['RecieveDate'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-5 col-form-label">วันที่มีผล</label>
                                                <div class="col-md-7">
                                                    <input type="date" class="form-control" id="ResultDate"
                                                        name="ResultDate" value="<?= $this->data['ResultDate'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-6 col-form-label">เลขที่คำสั่งวิทยฐานะ</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="OrderNo" name="OrderNo"
                                                        value="<?= $this->data['OrderNo'] ?>" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row fw-bold">
                                                <label class="col-md-4 col-form-label">วิทยฐานะ</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" id="Enhance" name="Enhance"
                                                        value="<?= $this->data['Enhance'] ?>" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 ">
                                        <h4 class="fs-4 float-end " style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ <?= $this->data['DtUpdatedAt']; ?> </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3 text-center">
                                        <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                            value="button">บันทึกข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                    <!-- ************************* END ข้อมูลทั้วไป ************************* -->

                    <!-- ************************* START ที่อยู่ ************************* -->
                    <div class="tab-pane" id="address">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 30px;">
                                            ที่อยู่ตามทะเบียนบ้าน</h5>
                                        <hr style="color: #eac178;height: 2px;opacity: 1;">
                                        <form action="" method="POST" id="UpdateAddress" role="form">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">บ้านเลขที่<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="RNo" name="RNo"
                                                            value="<?= $this->data['RNo'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมู่ที่<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="RMoo" name="RMoo"
                                                            value="<?= $this->data['RMoo'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมู่บ้าน</label>
                                                        <input type="text" class="form-control" id="Rvillage"
                                                            name="Rvillage" value="<?= $this->data['Rvillage'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ซอย</label>
                                                        <input type="text" class="form-control" id="Rsoi" name="Rsoi"
                                                            value="<?= $this->data['Rsoi'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">อาคาร/ชั้น</label>
                                                        <input type="text" class="form-control" id="RBuid" name="RBuid"
                                                            value="<?= $this->data['RBuid'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ถนน</label>
                                                        <input type="text" class="form-control" id="RRoad" name="RRoad"
                                                            value="<?= $this->data['RRoad'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ตำบล<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="RSubDistric"
                                                            name="RSubDistric" value="<?= $this->data['RDistrict'] ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">อำเภอ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="RDistrict"
                                                            name="RDistrict" value="<?= $this->data['RSubDistric'] ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">จังหวัด<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="RProvince"
                                                            name="RProvince" value="<?= $this->data['RProvince'] ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">รหัสไปรษณีย์<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="RZipcode"
                                                            name="RZipcode" maxlength="5"
                                                            value="<?= $this->data['RZipcode'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมายเลขโทรศัพท์</label>
                                                        <input type="text" class="form-control" id="RTel" name="RTel"
                                                            maxlength="10" value="<?= $this->data['RTel'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">

                                                </div>
                                                <div class="col">

                                                </div>
                                                <div class="col">

                                                </div>
                                                <div class="col">
                                                            
                                                </div>
                                            </div>   
                                            <h5 class="card-title mt-5 fw-bold" style="color: #18409e;font-size: 32px;">
                                                ที่อยู่ปัจจุบัน
                                            </h5>
                                            <hr style="color: #eac178;height: 2px;opacity: 1;">
                                            <div class="form-check pt-1" style="background-color: #FFDDBE; margin-bottom: 4px">
                                                <label class="form-check-label fw-bold">
                                                    <input type="checkbox" class="form-check-input" id="sameAddress"
                                                        style="border: 3px solid #253C81; width: 23px; height: 23px;"/>&nbsp;<span style="font-size: 26px;">ที่อยู่ตามทะเบียนบ้าน</span>
                                                </label>
                                            </div>
                                            </h4>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">บ้านเลขที่<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CNo" name="CNo"
                                                            value="<?= $this->data['CNo'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมู่ที่<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CMoo" name="CMoo"
                                                            value="<?= $this->data['CMoo'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมู่บ้าน</label>
                                                        <input type="text" class="form-control" id="Cvillage"
                                                            name="Cvillage" value="<?= $this->data['Cvillage'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ซอย</label>
                                                        <input type="text" class="form-control" id="Csoi" name="Csoi"
                                                            value="<?= $this->data['Csoi'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">อาคาร/ชั้น</label>
                                                        <input type="text" class="form-control" id="CBuid" name="CBuid"
                                                            value="<?= $this->data['CBuid'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ถนน</label>
                                                        <input type="text" class="form-control" id="CRoad" name="CRoad"
                                                            value="<?= $this->data['CRoad'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ตำบล<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CSubDistric"
                                                            name="CSubDistric" value="<?= $this->data['CDistrict'] ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">อำเภอ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CDistrict"
                                                            name="CDistrict" value="<?= $this->data['CSubDistric'] ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">จังหวัด<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CProvince"
                                                            name="CProvince" value="<?= $this->data['CProvince'] ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">รหัสไปรษณีย์<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CZipcode"
                                                            name="CZipcode" maxlength="5"
                                                            value="<?= $this->data['CZipcode'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมายเลขโทรศัพท์<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CTel" name="CTel"
                                                            maxlength="10" value="<?= $this->data['CTel'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col">

                                                </div>
                                                <div class="col">

                                                </div>
                                                <div class="col">

                                                </div>
                                                <div class="col">
                                                    
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="col">
                                                        <h6 class="fw-bold ">หมายเหตุ
                                                            <span style="color: red;">(*)</span>
                                                            เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                <?php
                                                if ($this->PersonnelInformation_model->checkIDCard($this->session->userdata('idcard_id'))) {

                                                    echo '<h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ' . $this->data['RgUpdatedAt'] . '</h4>';
                                                } else {

                                                    echo '<h4 class="fs-4 float-end" style="color: #18409e;" hidden>อัพเดทข้อมูลล่าสุดวันที่ ' . $this->data['RgUpdatedAt'] . '</h4>';
                                                }
                                                ?>
                                                </div>
                                            </div> 
                                            <div class="row mt-1">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                                        value="submit">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ที่อยู่ ************************* -->

                    <!-- ************************* START ข้อมูลครอบครัว ************************* -->
                    <div class="tab-pane" id="familydetail">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ข้อมูลครอบครัว
                                        </h5>
                                        <hr style="color: #eac178; height: 3px;opacity: 1;">
                                        <form action="" method="POST" id="InsertFamily" role="form">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">เลขบัตรประชาชน<span
                                                                style="color: red;">
                                                                *</span> </label>
                                                        <input type="text" class="form-control" name="FamIDCard"
                                                            id="FamIDCard" maxlength="13" required
                                                            oninput="validateIDCard(this)" />
                                                        <span class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">คำนำหน้า<span style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="PName" id="PName" required>
                                                            <option value="" class="select-fnz"></option>
                                                            <?php 
                                                            foreach ($STTPname as $row) {
                                                                ?>
                                                            <option class="select-fnz" value="<?= $row->TSPname ?>">
                                                                <?= $row->TSPname ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ชื่อ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="FName" name="FName"
                                                            value="" maxlength="20" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">นามสกุล<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="LName" name="LName"
                                                            value="" maxlength="20" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="fw-bold">วัน/เดือน/ปี เกิด<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="date" class="form-control" id="BirthDate"
                                                            name="BirthDate"
                                                            value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ความสัมพันธ์ของคนในครอบครัว<span
                                                                style="color: red;"> *</span></label>
                                                        <select class="form-select" name="ReStatus" id="ReStatus"
                                                            required>
                                                            <option value=""></option>
                                                            <option value="บิดา" class="select-fnz">บิดา</option>
                                                            <option value="มารดา" class="select-fnz">มารดา</option>
                                                            <option value="สามี" class="select-fnz">สามี</option>
                                                            <option value="ภรรยา" class="select-fnz">ภรรยา</option>
                                                            <option value="ลุง" class="select-fnz">ลุง</option>
                                                            <option value="ป้า" class="select-fnz">ป้า</option>
                                                            <option value="น้า" class="select-fnz">น้า</option>
                                                            <option value="อา" class="select-fnz">อา</option>
                                                            <option value="อื่น ๆ" class="select-fnz">อื่น ๆ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สถานภาพสมรส<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="Status" id="Status"
                                                            value="แต่งงานเเล้ว" required>
                                                            <option value=""></option>
                                                            <option value="โสด" class="select-fnz">โสด</option>
                                                            <option value="สมรส" class="select-fnz">สมรส</option>
                                                            <option value="หย่าร้าง" class="select-fnz">หย่าร้าง
                                                            </option>
                                                            <option value="หม้าย" class="select-fnz">หม้าย</option>
                                                            <option value="แยกกันอยู่" class="select-fnz">แยกกันอยู่
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สถานภาพการมีชีวิต<span
                                                                style="color: red;"> *</span></label>
                                                        <select class="form-select" name="LifeStatus" id="LifeStatus"
                                                            required>
                                                            <option value="" style='font-size:28px;'></option>
                                                            <option value="มีชีวิตอยู่" class="select-fnz">มีชีวิตอยู่
                                                            </option>
                                                            <option value="เสียชีวิต" class="select-fnz">เสียชีวิต
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">อาชีพ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Job" name="Job"
                                                            value="" maxlength="20" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมายเลขโทรศัพท์</label>
                                                        <input type="text" class="form-control" id="FRTel" name="FRTel"
                                                            value="" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title mt-5 fw-bold" style="color: #18409e;font-size: 32px;">
                                                ข้อมูลครอบครัวเพิ่มเติม</h5>
                                            <hr style="color: #eac178;height: 2px;opacity: 1;">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สิทธิการลดหย่อนภาษี</label>
                                                        <select class="form-select" name="Modulate" id="Modulate">
                                                            <option value=""></option>
                                                            <option value="ไม่มีสิทธิ์" class="select-fnz">
                                                                ไม่มีสิทธิ์</option>
                                                            <option value="มีสิทธิ์" class="select-fnz">
                                                                มีสิทธิ์</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">การศึกษา</label>
                                                        <select class="form-select" name="Edu" id="Edu">
                                                            <option class="col" value=""></option>
                                                            <option value="มีการศึกษา" class="select-fnz">มีการศึกษา
                                                            </option>
                                                            <option value="ไม่มีการศึกษา" class="select-fnz">
                                                                ไม่มีการศึกษา</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ศึกษาในระดับ</label>
                                                        <select class="form-select" name="LevelEdu" id="LevelEdu">
                                                            <option class="col" value=""></option>
                                                            <option value="ประถมศึกษา" class="select-fnz">ประถมศึกษา
                                                            </option>
                                                            <option value="มัธยมศึกษาตอนต้น" class="select-fnz">
                                                                มัธยมศึกษาตอนต้น</option>
                                                            <option value="มัธยมศึกษาตอนปลาย" class="select-fnz">
                                                                มัธยมศึกษาตอนปลาย</option>
                                                            <option value="ปริญญาตรี" class="select-fnz">ปริญญาตรี
                                                            </option>
                                                            <option value="ปริญญาโท" class="select-fnz">ปริญญาโท
                                                            </option>
                                                            <option value="ปริญญาตเอก" class="select-fnz">ปริญญาเอก
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สิทธิ์การเบิกค่าเล่าเรียน</label>
                                                        <select class="form-select" name="StuFee" id="StuFee">
                                                            <option class="col" value=""></option>
                                                            <option value="ไม่มีสิทธิ์" class="select-fnz">ไม่มีสิทธิ์
                                                            </option>
                                                            <option value="มีสิทธิ์" class="select-fnz">มีสิทธิ์
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สิทธิ์เบิกค่ารักษาพยาบาล</label>
                                                        <select class="form-select" name="HealthCare" id="HealthCare">
                                                            <option class="col" value=""></option>
                                                            <option value="ไม่มีสิทธิ์" class="select-fnz">ไม่มีสิทธิ์
                                                            </option>
                                                            <option value="มีสิทธิ์" class="select-fnz">มีสิทธิ์
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ประเภทการลดหย่อนบุคร</label>
                                                        <select class="form-select" name="TypeModulate"
                                                            id="TypeModulate">
                                                            <option class="col" value=""></option>
                                                            <option value="เต็ม" class="select-fnz">เต็ม</option>
                                                            <option value="คนละครึ่ง" class="select-fnz">คนละครึ่ง
                                                            </option>
                                                            <option value="บุตรหมดสิทธิ์" class="select-fnz">
                                                                บุตรหมดสิทธิ์</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="col">
                                                        <h6 class="fw-bold ">หมายเหตุ
                                                            <span style="color: red;">(*)</span>
                                                            เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4 " name="submit"
                                                        value="submit">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col md-10 mt-5">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelFamily">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">คำนำหน้า</h3>
                                                        </th>
                                                        <th width="400px">
                                                            <h3 class="fw-bold">ชื่อ - นามสกุล</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">ความสัมพันธ์</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">อาชีพ</h3>
                                                        </th>
                                                        <th width="250px">
                                                            <h3 class="fw-bold">หมายเลขโทรศัพท์</h3>
                                                        </th>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">ดูข้อมูล</h3>
                                                        </th>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ข้อมูลครอบครัว ************************* -->

                    <!-- ************************* START ผู้ที่สามารถติดต่อได้ ************************* -->
                    <div class="tab-pane" id="contact">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ผู้ที่สามารถติดต่อได้ </h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <form action="" method="POST" id="InsertContact" role="form">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">เลขบัตรประชาชน<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" name="CtFamIDCard"
                                                            id="CtFamIDCard" maxlength="13" required
                                                            oninput="validateIDCard(this)" />
                                                        <span class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">คำนำหน้า<span style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="CtPName" id="CtPName"
                                                            required>
                                                            <option value="" class="select-fnz"></option>
                                                            <?php 
                                                            foreach ($STTPname as $row) {
                                                                ?>
                                                            <option class="select-fnz" value="<?= $row->TSPname ?>">
                                                                <?= $row->TSPname ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ชื่อ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CtFName"
                                                            name="CtFName" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">นามสกุล<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CtLName"
                                                            name="CtLName" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="fw-bold">วัน/เดือน/ปี เกิด<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="date" class="form-control" id="CtBirthDate"
                                                            name="CtBirthDate"
                                                            value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ความสัมพันธ์ของคนในครอบครัว<span
                                                                style="color: red;"> *</span></label>
                                                        <select class="form-select" name="CtReStatus" id="CtReStatus"
                                                            value="" required>
                                                            <option value=""></option>
                                                            <option value="บิดา" class="select-fnz">บิดา</option>
                                                            <option value="มารดา" class="select-fnz">มารดา</option>
                                                            <option value="สามี" class="select-fnz">สามี</option>
                                                            <option value="ภรรยา" class="select-fnz">ภรรยา</option>
                                                            <option value="ลุง" class="select-fnz">ลุง</option>
                                                            <option value="ป้า" class="select-fnz">ป้า</option>
                                                            <option value="น้า" class="select-fnz">น้า</option>
                                                            <option value="อา" class="select-fnz">อา</option>
                                                            <option value="อื่นๆ" class="select-fnz">อื่น ๆ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">อาชีพ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="CtJob" name="CtJob"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หมายเลขโทรศัพท์</label>
                                                        <input type="text" class="form-control" id="CtRTel"
                                                            name="CtRTel" value="" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <h6 class="fw-bold ">หมายเหตุ <span style="color: red;">(*)</span>
                                                        เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง </h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                                        value="submit">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col md-10 mt-5">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered"
                                                    id="tbl_PersonnelContact">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="200px">
                                                                <h3 class="fw-bold">คำนำหน้า</h3>
                                                            </th>
                                                            <th width="400px">
                                                                <h3 class="fw-bold">ชื่อ - นามสกุล</h3>
                                                            </th>
                                                            <th width="200px">
                                                                <h3 class="fw-bold">ความสัมพันธ์</h3>
                                                            </th>
                                                            <th width="200px">
                                                                <h3 class="fw-bold">อาชีพ</h3>
                                                            </th>
                                                            <th width="250px">
                                                                <h3 class="fw-bold">หมายเลขโทรศัพท์</h3>
                                                            </th>
                                                            <th width="150px">
                                                                <h3 class="fw-bold">ดูข้อมูล</h3>
                                                            </th>
                                                            <th width="150">
                                                                <h3 class="fw-bold">ลบ</h3>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ผู้ที่สามารถติดต่อได้ ************************* -->

                    <!-- ************************* START ข้อมูลการศึกษา ************************* -->
                    <div class="tab-pane" id="study">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ประวัติการศึกษา
                                        </h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <form action="" method="POST" id="InsertStudy" role="form">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ปีที่เข้าศึกษา <span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="EStartYear" id="EStartYear"
                                                            required>
                                                            <option class="select-fnz" value=""></option>
                                                            <?php
                                                                foreach ($loopDate as $row => $value) {
                                                            ?>
                                                                <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ปีที่จบการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="EFinishYear" id="EFinishYear"
                                                            required>
                                                            <option class="select-fnz" value=""></option>
                                                            <?php
                                                                foreach ($loopDate as $row => $value) {
                                                            ?>
                                                                <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วันที่จบการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="date" class="form-control" id="EFinishDate"
                                                            name="EFinishDate"
                                                            value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ระดับการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="BA" id="BA" required>
                                                            <option value=""> </option>
                                                            <?php
                                                            foreach ($FullName as $row) {
                                                        ?>
                                                            <option class="select-fnz" value="<?= $row->FullName ?>">
                                                                <?= $row->FullName ?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วุฒิการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="Degree" id="Degree" required>
                                                            <option value=""> </option>
                                                            <?php
                                                            foreach ($ShortName as $row3) {
                                                        ?>
                                                            <option class="select-fnz" value="<?= $row3->ShortName ?>">
                                                                <?= $row3->ShortName ?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วิชาเอก<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Major" name="Major"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วิชาโท<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Minor" name="Minor"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สถาบันศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Institute"
                                                            name="Institute" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ได้รับทุนการศึกษา</label>
                                                        <select class="form-select" name="Scholarship" id="Scholarship"
                                                            value="" onchange="toggleFields()">
                                                            <option value="" class="select-fnz"></option>
                                                            <option value="Y" class="select-fnz">มี</option>
                                                            <option value="N" class="select-fnz">ไม่มี</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ประเภททุน</label>
                                                        <input type="text" class="form-control" id="TypeSch"
                                                            name="TypeSch" value="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หน่วยงานที่ให้ทุน</label>
                                                        <input type="text" class="form-control" id="CountrySch"
                                                            name="CountrySch" value="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ประเทศที่ให้ทุน</label>
                                                        <select class="form-select" name="AgenSch" id="AgenSch">
                                                            <option value=""></option>
                                                            <option value="ไทย" class="select-fnz">ไทย</option>
                                                            <option value="จีน" class="select-fnz">จีน</option>
                                                            <option value="อังกฤษ" class="select-fnz">อังกฤษ</option>
                                                            <option value="ลาว" class="select-fnz">ลาว</option>
                                                            <option value="แคเมอรูน" class="select-fnz">แคเมอรูน
                                                            </option>
                                                            <option value="ฟิลิปปินส์" class="select-fnz">ฟิลิปปินส์
                                                            </option>
                                                            <option value="อื่นๆ" class="select-fnz">อื่น ๆ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                foreach ($getP_at_study as $row) {
                                                    if (isset($row->P_at_max)) {
                                                        $P_at = $row->P_at_max + 1;
                                                    } else {
                                                        $P_at = 1; 
                                                    }
                                            ?>
                                            <input type="text" class="form-control" id="P_at" name="P_at"
                                                value="<?= $P_at ?>" style="display:none;">
                                            <?php
                                                }
                                            ?>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="col">
                                                <h6 class="fw-bold ">หมายเหตุ<span style="color: red;"> (*)</span>
                                                    เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                                value="submit">บันทึกข้อมูล</button>
                                        </div>
                                    </div>

                                    </form>
                                    <br>
                                    <div class="col-md-12 mt-5">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ตารางประวัติการศึกษา</h5>
                                        <hr style="color: #eac178;height: 2px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelStudy">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ปีที่เข้าศึกษา</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ปีที่จบการศึกษา</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วุฒิการศึกษา</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วิชาเอก</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วิชาโท</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">สถาบันศึกษา</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ดูข้อมูล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ข้อมูลเกียรติคุณ
                                        </h5>
                                        <hr style="color: #eac178;height: 2px;opacity: 1;">
                                        <form action="" method="POST" id="InsertFame" role="form">
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ประเภทเกียรติคุณ <span
                                                                style="color: red;"> *</span></label>
                                                        <input type="text" class="form-control" id="FType" name="FType"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หน่วยงาน<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Agencies"
                                                            name="Agencies" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ปีที่ได้รับ <span style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="RecieveYear" id="RecieveYear"
                                                            required>
                                                            <option class="select-fnz" value=""></option>
                                                            <?php
                                                                foreach ($loopDate as $row => $value) {
                                                            ?>
                                                                <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">แนบไฟล์</label>
                                                        <input class="form-control" type="file" id="FileNm" name="FileNm">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                    foreach ($getP_at_fame as $row) {
                                                        if (isset($row->P_at_max)) {
                                                            $P_at = $row->P_at_max + 1;
                                                        } else {
                                                            $P_at = 1; 
                                                        }
                                            ?>
                                            <input type="text" class="form-control" id="P_at_fame" name="P_at_fame"
                                                value="<?= $P_at ?>" style="display:none;">
                                            <?php
                                                }
                                            ?>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="col">
                                                        <h6 class="fw-bold ">หมายเหตุ
                                                            <span style="color: red;">(*)</span>
                                                            เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                                        value="submit">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ตารางข้อมูลเกียรติคุณ</h5>
                                        <hr style="color: #eac178;height: 2px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelFame">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ประเภทเกียรติคุณ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">หน่วยงาน</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ปีที่ได้รับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ไฟล์แนบ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ดูข้อมูล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                </thead>
                                                <tbody class="text-center">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ข้อมูลการศึกษา ************************* -->

                    <!-- ************************* START ประวัติการอบรม ************************* -->
                    <div class="tab-pane" id="training">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ประวัติการอบรมศึกษา ดูงาน</h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelTraining">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ชื่อหลักสูตรอบรม</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ชื่อหน่วยงาน</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">กลุ่มหลักสูตร</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วันที่เริ่ม</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วันที่สิ้นสุด</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">สถานที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">จังหวัด</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ประเทศ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">วัน</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ชั่วโมง</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ค่าใช้จ่าย</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ดูข้อมูล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Modal -->
                                        <form action="" method="POST" id="InsertTraining" role="form">
                                            <div class="modal fade" id="myModalTraining" tabindex="-1"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มประวัติการอบรม ศึกษา ดูงาน</h5>
                                                            </div>
                                                            <div id="modal-setting-1" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="row">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1 fw-bold"
                                                                                    style="color: black;font-size: 25px;">ชื่อหลักสูตรอบรม<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text"
                                                                                        class="form-control mt-1"
                                                                                        id="TNameCourse" name="TNameCourse"
                                                                                        value="" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">ชื่อหน่วยงาน<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TDepart" name="TDepart" value=""
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2  fw-bold"
                                                                                    style="color: black;">กลุ่มหลักสูตร<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TGCourse" name="TGCourse"
                                                                                        value="" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">สถานที่</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TPlace" name="TPlace" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col  mt-2 fw-bold"
                                                                                    style="color: black;">จังหวัด<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TProvince" name="TProvince"
                                                                                        value="" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">วันที่เริ่ม<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="date" class="form-control"
                                                                                        id="TStartDate" name="TStartDate"
                                                                                        value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">วันที่สิ้นสุด<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="date" class="form-control"
                                                                                        id="TFinishDate" name="TFinishDate"
                                                                                        value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">ประเทศ</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TCountry" name="TCountry"
                                                                                        value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">วัน<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TCDay" name="TCDay" value=""
                                                                                        oninput="validateInput(this)" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">ชั่วโมง<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TCHou" name="TCHou" value=""
                                                                                        oninput="validateInput(this)" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputMobile"
                                                                                    class="col mt-2 fw-bold"
                                                                                    style="color: black;">ค่าใช้จ่าย<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="TPay" name="TPay" value=""
                                                                                        oninput="validateInput(this)" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            foreach ($getP_at_train as $row) {
                                                                                if (isset($row->P_at_max)) {
                                                                                    $P_at = $row->P_at_max + 1;
                                                                                } else {
                                                                                    $P_at = 1; 
                                                                                }
                                                                        ?>
                                                                        <input type="text" class="form-control" id="P_at_train" name="P_at_train"
                                                                            value="<?= $P_at ?>" style="display:none;">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mt-2">
                                                                <h6 class="fw-bold ">หมายเหตุ
                                                                    <span style="color: red;">(*)</span>
                                                                    เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>                                    
                                         <div class="row mt-3">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-success fw-bold fs-4" data-bs-toggle="modal"
                                                        data-bs-target="#myModalTraining" >เพิ่มข้อมูล</button> &nbsp;
                                                    &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ประวัติการอบรม ************************* -->

                    <!-- ************************* START ประวัติการเลื่อนตำแหน่ง ************************* -->
                    <div class="tab-pane" id="position">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ประวัติการเลื่อนตำแหน่ง</h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelPosition">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">ระดับ</h3>
                                                        </th>
                                                        <th width="250px">
                                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">หน่วยงาน</h3>
                                                        </th>
                                                        <th width="250px">
                                                            <h3 class="fw-bold">จังหวัด</h3>
                                                        </th>
                                                        <th width="200px">
                                                            <h3 class="fw-bold">วันที่เลื่อนตำแหน่ง</h3>
                                                        </th>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">ดูข้อมูล</h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Modal -->
                                        <form action="" method="POST" id="InsertPosition" role="form">
                                            <div class="modal fade" id="myModalPosition" tabindex="-1"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มประวัติการเลื่อนตำแหน่ง</h5>
                                                            </div>
                                                            <div id="modal-setting-1" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail2"
                                                                                    class="col mt-1  fw-bold"
                                                                                    style="color: black; ">ระดับ<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="PPLevel" name="PPLevel" value=""
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail2"
                                                                                class="col mt-3  fw-bold"
                                                                                style="color: black; ">ตำแหน่ง<span
                                                                                    style="color: red;"> *</span></label>
                                                                            <div class="col">
                                                                                <input type="text" class="form-control"
                                                                                    id="PPo" name="PPo" value="" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputMobile"
                                                                                class="col mt-3  fw-bold"
                                                                                style="color: black;">วันที่เลื่อนตำแหน่ง<span
                                                                                    style="color: red;"> *</span></label>
                                                                            <div class="col">
                                                                                <input type="date" class="form-control"
                                                                                    id="PChangeDate" name="PChangeDate"
                                                                                    value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputMobile"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;">หน่วยงาน<span
                                                                                    style="color: red;"> *</span></label>
                                                                            <div class="col">
                                                                                <input type="text" class="form-control"
                                                                                    id="PAgencies" name="PAgencies"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputMobile"
                                                                                class="col mt-3  fw-bold"
                                                                                style="color: black;">จังหวัด</label>
                                                                            <div class="col">
                                                                                <input type="text" class="form-control"
                                                                                    id="PProvince" name="PProvince">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                            foreach ($getP_at_position as $row) {
                                                                                if (isset($row->P_at_max)) {
                                                                                    $P_at = $row->P_at_max + 1;
                                                                                } else {
                                                                                    $P_at = 1; 
                                                                                }
                                                                        ?>
                                                                        <input type="text" class="form-control" id="P_at_position" name="P_at_position"
                                                                            value="<?= $P_at ?>" style="display:none;">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                </div>
                                                            </div>
                                                            <div class="col mt-2">
                                                                <h6 class="fw-bold ">หมายเหตุ
                                                                    <span style="color: red;">(*)</span>
                                                                    เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-success fw-bold fs-4" data-bs-toggle="modal"
                                                    data-bs-target="#myModalPosition">เพิ่มข้อมูล</button> &nbsp;
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ประวัติการเลื่อนตำแหน่ง ************************* --> 

                    <!-- ************************* START ข้อมูลการสอน ************************* -->
                    <div class="tab-pane" id="teaching">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                                ข้อมูลการสอน
                                            </h5>
                                            <hr style="color: #eac178;height: 3px;opacity: 1;">
                                            <form action="" method="POST" id="InsertTeaching" role="form">
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">ปีที่เข้าศึกษา<span
                                                                    style="color: red;">
                                                                    *</span></label>
                                                            <select class="form-select" name="EYea" id="EYea" required>
                                                                <option value=""> </option>
                                                                    <?php
                                                                        foreach ($loopDate as $row => $value) {
                                                                    ?>
                                                                        <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">ภาคเรียนที่<span style="color: red;">
                                                                    *</span></label>
                                                            <input type="text" class="form-control" id="ETerm" name="ETerm"
                                                                value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">ระดับชั้นที่สอน<span
                                                                    style="color: red;">
                                                                    *</span></label>
                                                            <select class="form-select" name="LevClss" id="LevClss" required>
                                                                <option value=""></option>
                                                                <option value="อ.1" class="select-fnz">อ.1</option>
                                                                <option value="อ.2" class="select-fnz">อ.2</option>
                                                                <option value="อ.2" class="select-fnz">อ.3</option>
                                                                <option value="ป.1" class="select-fnz">ป.1</option>
                                                                <option value="ป.2" class="select-fnz">ป.2</option>
                                                                <option value="ป.3" class="select-fnz">ป.3</option>
                                                                <option value="ป.4" class="select-fnz">ป.4</option>
                                                                <option value="ป.5" class="select-fnz">ป.5</option>
                                                                <option value="ป.6" class="select-fnz">ป.6</option>
                                                                <option value="ม.1" class="select-fnz">ม.1</option>
                                                                <option value="ม.2" class="select-fnz">ม.2</option>
                                                                <option value="ม.3" class="select-fnz">ม.3</option>
                                                                <option value="ม.4" class="select-fnz">ม.4</option>
                                                                <option value="ม.5" class="select-fnz">ม.5</option>
                                                                <option value="ม.6" class="select-fnz">ม.6</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">ห้อง<span style="color: red;">
                                                                    *</span></label>
                                                            <select class="form-select" name="Room" id="Room" required>
                                                                <option value=""></option>
                                                                <?php
                                                                        foreach ($loopRoom as $row => $value) {
                                                                    ?>
                                                                        <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">วิชาที่สอนเพิ่มเติม</label>
                                                            <input type="text" class="form-control" id="GLearn_more"
                                                                name="GLearn_more" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold"> กลุ่มสาระการเรียนรู้<span
                                                                    style="color: red;"> *</span></label>
                                                            <select class="form-select" name="GLearn" id="GLearn" required>
                                                                <option value=""></option>
                                                                <?php 
                                                                foreach ($get_GroupName as $row) {
                                                                ?>
                                                                    <option class="select-fnz" value="<?= $row->GroupName ?>"><?= $row->Sequence ?>/<?= $row->GroupName ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <select class="form-select" name="SubjCode" id="SubjCode" hidden></select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">วิชาที่สอน<span class="text-danger"> *</span></label>
                                                            <select class="form-select" name="Titles" id="Titles" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">ชั่วโมงสอน/สัปดาห์<span
                                                                    style="color: red;"> *</span></label>
                                                            <input type="text" class="form-control" id="HourPerWeek"
                                                                name="HourPerWeek" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">สอนตรงตามวิชาเอก</label>
                                                            <select class="form-select" name="TeaMajor" id="TeaMajor">
                                                                <option value=""></option>
                                                                <option value="Y" class="select-fnz">สอนตรง</option>
                                                                <option value="N" class="select-fnz">สอนไม่ตรง</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">สอนตรงตามความถนัด</label>
                                                            <select class="form-select" name="TeaBold" id="TeaBold">
                                                                <option value=""></option>
                                                                <option value="Y" class="select-fnz">สอนถนัด</option>
                                                                <option value="N" class="select-fnz">สอนไม่ถนัด
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="fw-bold">วิชาที่ต้องการเข้ารับการพัฒนา</label>
                                                            <select class="form-select" name="DevelopSub" id="DevelopSub">
                                                                <option value=""></option>
                                                                <option value="Y" class="select-fnz">ใช่</option>
                                                                <option value="N" class="select-fnz">ไม่ใช่</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <?php
                                                        foreach ($get_Id as $row) {
                                                            if (isset($row->Id_max)) {
                                                                $Id = $row->Id_max + 1;
                                                            } else {
                                                                $Id = 1; 
                                                            }
                                                        ?>
                                                            <input type="text" class="form-control" id="Id_Teaching" name="Id_Teaching"
                                                                value="<?= $Id ?>" style="display:none;">
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="col">
                                                            <h6 class="fw-bold ">หมายเหตุ
                                                                <span style="color: red;">(*)</span>
                                                                เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                                            value="submit">บันทึกข้อมูล</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col mt-5">
                                                <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                                    ตารางข้อมูลการสอน
                                                </h5>
                                                <hr style="color: #eac178;height: 2px;opacity: 1;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" id="tbl_PersonnelTeaching">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>
                                                                    <h3 class="fw-bold ">ปีการศึกษา</h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">ภาคเรียนที่</h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">กลุ่มสาระการเรียนรู้
                                                                    </h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">วิชาที่สอน</h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">วิชาที่สอนเพิ่มเติม
                                                                    </h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">ชั้น</h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">ห้อง</h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">ชั่วโมงสอน/สัปดาห์
                                                                    </h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">ดูข้อมูล
                                                                    </h3>
                                                                </th>
                                                                <th>
                                                                    <h3 class="fw-bold">ลบ
                                                                    </h3>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ข้อมูลการสอน ************************* -->

                    <!-- ************************* START ใบอนุญาตประกอบวิชาชีพ ************************* -->
                    <div class="tab-pane" id="license">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ใบอนุญาตประกอบวิชาชีพ</h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <form action="" method="POST" id="InsertLicense" role="form">
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">เลขที่สมาชิก (เลขบัตรประชาชน)<span
                                                                style="color: red;"> *</span></label>
                                                        <input type="text" class="form-control" id="LPNo" name="LPNo"
                                                            value="<?= $this->data['IDCard'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ชื่อใบประกอบวิชาชีพ<span
                                                                style="color: red;"> *</span></label>
                                                        <select class="form-select" name="LPName" id="LPName" required>
                                                            <option class="col-md-3" value=""></option>
                                                            <option value="ใบประกอบวิชาชีพครู" class="select-fnz">
                                                                ใบประกอบวิชาชีพครู</option>
                                                            <option value="ผู้บริหารสถานศึกษา" class="select-fnz">
                                                                ผู้บริหารสถานศึกษา</option>
                                                            <option value="ผู้บริหารการศึกษา" class="select-fnz">
                                                                ผู้บริหารการศึกษา</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">เลขที่ใบอนุญาตทำงาน<span
                                                                style="color: red;"> *</span></label>
                                                        <input type="text" class="form-control" id="LPWorkPermit"
                                                            name="LPWorkPermit" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หน่วยงานที่ออกให้ </label>
                                                        <input type="text" class="form-control" id="LPLeave" name="LPLeave"
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold"> วันที่ออก<span style="color: red;">
                                                                *</span></label>
                                                        <input type="date" class="form-control" id="LPLeaveDate"
                                                            name="LPLeaveDate"
                                                            value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วันหมดอายุ<span style="color: red;">
                                                                *</span></label>
                                                        <input type="date" class="form-control" id="LPExpireDate"
                                                            name="LPExpireDate"
                                                            value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">การต่อใบอนุญาต<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="LPToPermit" id="LPToPermit"
                                                            required>
                                                            <option class="col-md-3" value=""></option>
                                                            <option value="Y" class="select-fnz">ต่อเเล้ว</option>
                                                            <option value="N" class="select-fnz">ยังไม่ได้ต่อ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold"> การเพิกถอนใบอนุญาต</label>
                                                        <input type="text" class="form-control" id="LPRevocation"
                                                            name="LPRevocation" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="col">
                                                        <h6 class="fw-bold ">
                                                            หมายเหตุ
                                                            <span style="color: red;">(*)</span>
                                                            เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4" name="submit"
                                                        value="submit" >บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <div class="col mt-5">
                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                                ตารางใบอนุญาตประกอบวิชาชีพ
                                            </h5>
                                            <hr style="color: #eac178;height: 3px;opacity: 1;">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="tbl_PersonnelLicense">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>
                                                                <h3 class="fw-bold">เลขที่ใบอนุญาตทำงาน</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">ชื่อใบประกอบวิชาชีพ</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">หน่วยงานที่ออกให้</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">วันที่ออกให้</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">วันหมดอายุ</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">การต่อใบอนุญาต</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">ดูข้อมูล</h3>
                                                            </th>
                                                            <th>
                                                                <h3 class="fw-bold">ลบ</h3>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ใบอนุญาตประกอบวิชาชีพ ************************* -->

                    <!-- ************************* START ประวัติการลา/การเปลี่ยนชื่อ ************************* -->
                    <div class="tab-pane" id="leave">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ประวัติการลาประจำปี</h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelLeave">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ปี</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">มาสาย</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลาป่วย</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลากิจ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ขาด</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ไปราชการ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลาพักผ่อน</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลาคลอดบุตร</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลาบวช/ฮัจย์</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ศึกษาต่อ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal4" tabindex="-1"
                                            aria-labelledby="myModalLabel4" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <form action="" method="POST" id="InsertLeave" role="form">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มประวัติการลาประจำปี</h5>
                                                            </div>
                                                                <div id="modal-setting-5" class="tabcontent">
                                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <label for="exampleInputUsername2"
                                                                                        class="col mt-1  fw-bold"
                                                                                        style="margin-left: 16px;">ปี<span
                                                                                            style="color: red;">
                                                                                            *</span></label>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <select class="form-select w-50" name="EYa"
                                                                                            id="EYa" required>
                                                                                        <option class="select-fnz" value=""></option>
                                                                                        <?php
                                                                                            foreach ($loopDate as $row => $value) {
                                                                                        ?>
                                                                                            <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputEmail2"
                                                                                                class="col m-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;">มาสาย</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text" value=""
                                                                                                class="form-control text-center" id="VLate"
                                                                                                name="VLate" maxlength="2">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col mt-3  fw-bold"
                                                                                                style="color: black;font-size: 25px; padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col m-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;">ลาป่วย</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                class="form-control text-center" id="Vsick"
                                                                                                name="Vsick" value=""
                                                                                                maxlength="2">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col mt-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                        class="col m-3  fw-bold"
                                                                                                        style="color: black;font-size: 25px;">ลากิจ</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                        class="form-control text-center" id="Vkit"
                                                                                                        name="Vkit" value=""
                                                                                                        maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                        class="col mt-3  fw-bold"
                                                                                                        style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                        class="col m-3  fw-bold"
                                                                                                        style="color: black;font-size: 25px;">ขาด</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                        class="form-control text-center"
                                                                                                        id="VAbsence" name="VAbsence"
                                                                                                        value="" maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                        class="col mt-3  fw-bold"
                                                                                                        style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                        class="col m-3  fw-bold"
                                                                                                        style="color: black;font-size: 25px;">ไปราชการ</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                        class="form-control text-center" id="VServ"
                                                                                                        name="VServ" value=""
                                                                                                        maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                        class="col mt-3  fw-bold"
                                                                                                        style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col m-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;">ลาพักผ่อน</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                class="form-control text-center" id="VRelax"
                                                                                                name="VRelax" value=""
                                                                                                maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col mt-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col m-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;">ลาคลอด</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                class="form-control text-center" id="VSpawn"
                                                                                                name="VSpawn" value=""
                                                                                                maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col mt-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col m-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;">ลาบวช</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                class="form-control text-center"
                                                                                                id="VOrdinate" name="VOrdinate"
                                                                                                value="" maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col mt-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4"
                                                                                            style="padding-right: 0px;">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col m-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;">ลาศึกษาต่อ</label>
                                                                                        </div>
                                                                                        <div class="col-3 mt-3">
                                                                                            <input type="text"
                                                                                                class="form-control text-center" id="VStudy"
                                                                                                name="VStudy" value=""
                                                                                                maxlength="2">
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <label for="exampleInputUsername2"
                                                                                                class="col mt-3  fw-bold"
                                                                                                style="color: black;font-size: 25px;padding-left: 20px;">วัน</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    foreach ($getP_at_Leave as $row) {
                                                                        if (isset($row->P_at_max)) {
                                                                            $P_at = $row->P_at_max + 1;
                                                                    } else {
                                                                        $P_at = 1; 
                                                                    }
                                                                ?>
                                                                    <input type="text" class="form-control" id="P_at_Leave" name="P_at_Leave"
                                                                        value="<?= $P_at ?>" style="display:none;">
                                                                <?php
                                                                    }
                                                                ?>
                                                            <div class="row mt-3">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold ">หมายเหตุ
                                                                            <span style="color: red;">(*)</span>
                                                                            เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary fw-bold fs-4"
                                                                style='font-size:20px;'>บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4"
                                                                style='font-size:20px;'
                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-success fw-bold fs-4" data-bs-toggle="modal"
                                                    data-bs-target="#myModal4">เพิ่มข้อมูล</button>
                                            </div>
                                        </div>
                                        <br>
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ประวัติการเปลี่ยนชื่อ</h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelRename">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">คำนำหน้าเดิม</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ชื่อเดิม</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">สกุลเดิม</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ว/ด/ป ที่เปลี่ยน</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- **** Modal **** -->
                                        <div class="modal fade" id="myModal5" tabindex="-1"
                                            aria-labelledby="myModalLabel5" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <form action="" method="POST" id="InsertRename" role="form">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มประวัติการเปลี่ยนชื่อ</h5>
                                                            </div>
                                                            <div id="modal-setting-9" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <input type="hidden" class="form-control" id="IDCard"
                                                                    name="IDCard" value=" ">
                                                                <div class="form-group" style="display:none">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="P_at"
                                                                            name="P_at" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group ">
                                                                            <label for="exampleInputUsername2"
                                                                                class="col mt-1 fw-bold"
                                                                                style="color: black;">คำนำหน้าเดิม<span
                                                                                    style="color: red;"> *</span></label>

                                                                            <select class="form-select" name="CPName"
                                                                                id="CPName" required>
                                                                                <option value="" class="select-fnz">
                                                                                </option>
                                                                                <option value="นาย" class="select-fnz">
                                                                                    นาย</option>
                                                                                <option value="นาง" class="select-fnz">
                                                                                    นาง</option>
                                                                                <option value="นางสาว" class="select-fnz">
                                                                                    นางสาว
                                                                                </option>
                                                                            </select>

                                                                        </div>
                                                                        <div class="form-group row3">
                                                                            <label for="exampleInputEmail2"
                                                                                class="col mt-3  fw-bold"
                                                                                style="color: black;">ชื่อ<span
                                                                                    style="color: red;"> *</span></label>
                                                                            <div class="col">
                                                                                <input type="text" class="form-control"
                                                                                    name="CFName" id="CFName" value=""
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group row3">
                                                                            <label for="exampleInputMobile"
                                                                                class="col mt-1  fw-bold"
                                                                                style="color: black;">ว/ด/ป ที่เปลี่ยน<span
                                                                                    style="color: red;"> *</span></label>
                                                                            <div class="col">
                                                                                <input type="date" class="form-control"
                                                                                    name="CDate" id="CDate" 
                                                                                    value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row3">
                                                                            <label for="exampleInputMobile"
                                                                                class="col mt-3  fw-bold"
                                                                                style="color: black;">นามสกุล<span
                                                                                    style="color: red;"> *</span></label>
                                                                            <div class="col">
                                                                                <input type="text" class="form-control"
                                                                                    name="CLName" id="CLName" value=""
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <?php
                                                                    foreach ($getP_at_Rename as $row) {
                                                                        if (isset($row->P_at_max)) {
                                                                            $P_at = $row->P_at_max + 1;
                                                                    } else {
                                                                        $P_at = 1; 
                                                                    }
                                                                ?>
                                                                    <input type="text" class="form-control" id="P_at_Rename" name="P_at_Rename"
                                                                        value="<?= $P_at ?>" style="display:none;">
                                                                <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold ">หมายเหตุ
                                                                            <span style="color: red;">(*)</span>
                                                                            เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-success fw-bold fs-4" data-bs-toggle="modal"
                                                    data-bs-target="#myModal5">เพิ่มข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ประวัติการลา/การเปลี่ยนชื่อ ************************* -->

                    <!-- ************************* START ประวัติการรับเครื่องราชฯ ************************* -->
                    <div class="tab-pane" id="insignia">
                        <div class="card">
                            <div class="col m-3 mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                            ประวัติการรับเครื่องราชอิสริยาภรณ์</h5>
                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_PersonnelInsignia">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            <h3 class="fw-bold">ปีที่ได้รับ</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ชั้นเครื่องราชอิสริยาภรณ์</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ตำแหน่ง</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ราชกิจเล่มที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ราชกิจตอนที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ราชกิจหน้าที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ราชกิจเลขที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลงวันที่</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ดูข้อมูล</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">ลบ</h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- **** Modal **** -->
                                        <div class="modal fade" id="myModal6" tabindex="-1"
                                            aria-labelledby="myModalLabel6" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="" method="POST" id="InsertInsignia" role="form">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold"
                                                                    style="color: #18409e;font-size: 32px;">
                                                                    เพิ่มประวัติการรับเครื่องราชอิสริยาภรณ์</h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <input type="hidden" class="form-control" id="IDCard"
                                                                    name="IDCard" value="">
                                                                <div class="form-group" style="display:none">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="P_at"
                                                                            name="P_at" value=" ">
                                                                    </div>
                                                                </div>
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ปีที่ได้รับ<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <select class="form-select" name="RRDare"
                                                                                            id="RRDare" required>
                                                                                        <option class="select-fnz" value=""></option>
                                                                                        <?php
                                                                                            foreach ($loopDate as $row => $value) {
                                                                                        ?>
                                                                                            <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </select>          
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-1 fw-bold"
                                                                                    style="color: black;font-size: 25px;">หน่วยงาน</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RDepart" name="RDepart" 
                                                                                        value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ชั้นเครื่องราช<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RLevel" name="RLevel" value=""
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ตำแหน่ง<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RPo" name="RPo" value=""
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ราชกิจเล่มที่</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RGVol" name="RGVol" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ราชกิจตอนที่</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RGPart" name="RGPart" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ราชกิจหน้าที่</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RGPage" name="RGPage" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">ราชกิจเลขที่</label>
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control"
                                                                                        id="RGNo" name="RGNo" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">วันที่ได้รับ<span
                                                                                        style="color: red;">
                                                                                        *</span></label>
                                                                                <div class="col">
                                                                                    <input type="date" class="form-control"
                                                                                        id="RDate" name="RDate" 
                                                                                        value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label for="exampleInputUsername2"
                                                                                    class="col mt-3  fw-bold"
                                                                                    style="color: black;font-size: 25px;">วันที่ประกาศ</label>
                                                                                <div class="col">
                                                                                    <input type="date" class="form-control"
                                                                                        id="RDate2" name="RDate2" 
                                                                                        value="<?php echo date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            foreach ($getP_at_Insignia as $row) {
                                                                                if (isset($row->P_at_max)) {
                                                                                    $P_at = $row->P_at_max + 1;
                                                                                } else {
                                                                                    $P_at = 1; 
                                                                                }
                                                                        ?>
                                                                            <input type="text" class="form-control" id="P_at_Insignia" name="P_at_Insignia"
                                                                                value="<?= $P_at ?>" style="display:none;">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col">
                                                                            <div class="col">
                                                                                <h6 class="fw-bold ">หมายเหตุ
                                                                                    <span style="color: red;">(*)</span>
                                                                                    เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer mt-3">
                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4" >บันทึก</button>
                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-success fw-bold fs-4" data-bs-toggle="modal"
                                                    data-bs-target="#myModal6">เพิ่มข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ************************* END ประวัติการรับเครื่องราชฯ ************************* -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Modal Thai Title -->
<div class="modal fade" id="ModalThaiTitle" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal-setting-7" class="tabcontent">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <form action="" method="POST" id="FrmInsertThai" role="form">
                                    <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                        style="color: black;font-size: 28px;">เพิ่มคำนำหน้าภาษาไทย</label>
                                    <input type="text" class="form-control" id="TSPname" name="TSPname" required>
                            </div>
                            <div class="col-md-7 mt-4">
                                <div class="float-end mt-3">
                                    <button type="sudmit" class="btn btn-primary fw-bold"
                                        style='font-size:20px;'>บันทึก</button>
                                    <button type="button" class="btn btn-secondary fw-bold" style='font-size:20px;'
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped mt-2 table-bordered" id="tbl_ThaiTitle">
                            <thead class="text-center ">
                                <tr>
                                    <th>
                                        <h3 class="fw-bold">ลำดับ</h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            คำนำหน้า
                                        </h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            ลบ</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Thai Title -->

<!-- Start Modal English Title -->
<div class="modal fade" id="ModalEngTitle" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal-setting-7" class="tabcontent">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <form action="" method="POST" id="FrmInsertEng" role="form">
                                    <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                        style="color: black;font-size: 28px;">เพิ่มคำนำหน้าภาษาอังกฤษ</label>
                                    <input type="text" class="form-control" id="SPname" name="SPname" required>
                            </div>
                            <div class="col-md-7 mt-4">
                                <div class="float-end mt-3">
                                    <button type="sudmit" class="btn btn-primary fw-bold"
                                        style='font-size:20px;'>บันทึก</button>
                                    <button type="button" class="btn btn-secondary fw-bold" style='font-size:20px;'
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped mt-2 table-bordered" id="tbl_EngTitle">
                            <thead class="text-center ">
                                <tr>
                                    <th>
                                        <h3 class="fw-bold">ลำดับ</h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            คำนำหน้า
                                        </h3>
                                    </th>
                                    <th>
                                        <h3 class="fw-bold">
                                            ลบ</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal English Title -->

<script>
$(document).ready(function() {
    $('.nav-tabs a').on('shown.bs.tab', function(event) {
        var target = $(event.target).attr("href");
        $('.nav-tabs .active').removeClass('active');
        $(this).addClass('active');
        $('.tab-content .active').removeClass('active');
        $(target).addClass('active');
    });
});

var currentTab = localStorage.getItem('currentTab');

$('.nav-tabs a').on('shown.bs.tab', function(event) {
    var selectedTab = $(event.target).attr('href');
    localStorage.setItem('currentTab', selectedTab);
});

$(window).on('load', function() {
    if (currentTab) {
        $('.nav-tabs a[href="' + currentTab + '"]').tab('show');
    } else {
        $('.nav-tabs a:first').tab('show');
    }
});
</script>

<script>
function Script_checkID(id) {
    if (id.substring(0, 1) == 0) return false;
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
    return true;
}

function validateIDCard(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 13);
}

jQuery(document).ready(function($) {
    $('#FamIDCard').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            var id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                $('span.error').removeClass('valid').addClass('invalid').text('เลขบัตรผิด');
            } else {
                $('span.error').removeClass('invalid').addClass('valid').text('เลขบัตรถูกต้อง');
            }
        } else {
            $('span.error').removeClass('valid invalid').text('');
        }
    });
});
jQuery(document).ready(function($) {
    $('#CtFamIDCard').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            var id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                $('span.error').removeClass('valid').addClass('invalid').text('เลขบัตรผิด');
            } else {
                $('span.error').removeClass('invalid').addClass('valid').text('เลขบัตรถูกต้อง');
            }
        } else {
            $('span.error').removeClass('valid invalid').text('');
        }
    });
});
</script>

<!-- ***************************************** Javascript Personnel Data ***************************************** -->
<script>
$('#UpdateData').submit(function(event) {
    event.preventDefault();

    let IDCard = $('#IDCard').val();
    let Pic = $('#Pic')[0].files[0];
    let Passport = $('#Passport').val();
    let PoNo = $('#PoNo').val();
    let NStatus = $('#NStatus').val();
    let PName = $('#PName').val();
    let FTName = $('#FTName').val();
    let LTName = $('#LTName').val();
    let PEName = $('#PEName').val();
    let FEName = $('#FEName').val();
    let LEName = $('#LEName').val();
    let PoLine = $('#PoLine').val();
    let PLevel = $('#PLevel').val();
    let PoType = $('#PoType').val();
    let Sex = $('input[name=Sex]:checked').val();
    let Subject_group = $('#Subject_group').val();
    let PoAssign = $('#PoAssign').val();
    let BirthDate = $('#BirthDate').val();
    let MretireDate = $('#MretireDate').val();
    let Nationality = $('#Nationality').val();
    let Race = $('#Race').val();
    let Religion = $('#Religion').val();
    let BloodG = $('#BloodG').val();
    let MStatus = $('#MStatus').val();
    let FaName = $('#FaName').val();
    let MaName = $('#MaName').val();
    let PlaceDate = $('#PlaceDate').val();
    let StartDate = $('#StartDate').val();
    let LProfessionFirstDate = $('#LProfessionFirstDate').val();
    let NowDate = $('#NowDate').val();
    let MemberKBK = $('#MemberKBK').val();
    let School = $('#School').val();
    let Member = $('#Member').val();
    let PZone = $('#PZone').val();
    let Ministry = $('#Ministry').val();
    let Area = $('#Area').val();
    let MemId = $('#MemId').val();
    let PoDate = $('#PoDate').val();
    let PlaceBA = $('#PlaceBA').val();
    let TopBA = $('#TopBA').val();
    let PoBA = $('#PoBA').val();
    let MSalary = $('#MSalary').val();
    let EMoney = $('#EMoney').val();
    let PoSalary = $('#PoSalary').val();
    let Salsum = $('#Salsum').val();
    let RecieveDate = $('#RecieveDate').val();
    let ResultDate = $('#ResultDate').val();
    let OrderNo = $('#OrderNo').val();
    let Enhance = $('#Enhance').val();

    MSalary = parseFloat(MSalary.replace(/[^\d.-]/g, ''));
    EMoney = parseFloat(EMoney.replace(/[^\d.-]/g, ''));
    PoSalary = parseFloat(PoSalary.replace(/[^\d.-]/g, ''));
    Salsum = parseFloat(Salsum.replace(/[^\d.-]/g, ''));

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('Pic', Pic);
    formData.append('Passport', Passport);
    formData.append('PoNo', PoNo);
    formData.append('NStatus', NStatus);
    formData.append('PName', PName);
    formData.append('FTName', FTName);
    formData.append('LTName', LTName);
    formData.append('PEName', PEName);
    formData.append('FEName', FEName);
    formData.append('LEName', LEName);
    formData.append('PoLine', PoLine);
    formData.append('PLevel', PLevel);
    formData.append('PoType', PoType);
    formData.append('Sex', Sex);
    formData.append('Subject_group', Subject_group);
    formData.append('PoAssign', PoAssign);
    formData.append('BirthDate', BirthDate);
    formData.append('MretireDate', MretireDate);
    formData.append('Nationality', Nationality);
    formData.append('Race', Race);
    formData.append('Religion', Religion);
    formData.append('BloodG', BloodG);
    formData.append('MStatus', MStatus);
    formData.append('FaName', FaName);
    formData.append('MaName', MaName);
    formData.append('PlaceDate', PlaceDate);
    formData.append('StartDate', StartDate);
    formData.append('LProfessionFirstDate', LProfessionFirstDate);
    formData.append('NowDate', NowDate);
    formData.append('MemberKBK', MemberKBK);
    formData.append('School', School);
    formData.append('Member', Member);
    formData.append('PZone', PZone);
    formData.append('Ministry', Ministry);
    formData.append('Area', Area);
    formData.append('MemId', MemId);
    formData.append('PoDate', PoDate);
    formData.append('PlaceBA', PlaceBA);
    formData.append('TopBA', TopBA);
    formData.append('PoBA', PoBA);
    formData.append('MSalary', MSalary);
    formData.append('EMoney', EMoney);
    formData.append('PoSalary', PoSalary);
    formData.append('Salsum', Salsum);
    formData.append('RecieveDate', RecieveDate);
    formData.append('ResultDate', ResultDate);
    formData.append('OrderNo', OrderNo);
    formData.append('Enhance', Enhance);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelData') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            console.log(dataResult)
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
});

$('#FrmInsertThai').submit(function(e) {
    e.preventDefault();
    FrmInsertThai();
});

function FrmInsertThai() {
    let TSPname = $('#TSPname').val();

    let formData = new FormData();
    formData.append('TSPname', TSPname);
    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_STTPname') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}
$('#FrmInsertEng').submit(function(e) {
    e.preventDefault();
    FrmInsertEng();
});

function FrmInsertEng() {
    let SPname = $('#SPname').val();

    let formData = new FormData();
    formData.append('SPname', SPname);
    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_STPname') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteThai(IDTPname) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_STTPname') ?>",
                type: 'POST',
                data: {
                    IDTPname: IDTPname
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

function FrmDeleteEng(IDPname) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_STPname') ?>",
                type: 'POST',
                data: {
                    IDPname: IDPname
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).ready(function() {
    getSTTPname()
    getSTPname();
});

function getSTTPname() {
    let table_body = $('#tbl_ThaiTitle tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_STTPname') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr>
                        <td>${count}</td>
                        <td>${row.TSPname}</td>
                        <td class="text-center"><button class="btn btn-danger fw-bold fs-4 " onclick="FrmDeleteThai(${row.IDTPname})">ลบ</button></td>
                    </tr>`;
                table_body.append(table_row);
            });
        }
    });
}

function getSTPname() {
    let table_body = $('#tbl_EngTitle tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_STPname') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            count = 0;
            $.each(data, function(index, row) {
                count++;
                let table_row = `<tr>
                        <td>${count}</td>
                        <td>${row.SPname}</td>
                        <td class="text-center"><button class="btn btn-danger fw-bold fs-4 " onclick="FrmDeleteEng(${row.IDPname})">ลบ</button></td>
                    </tr>`;
                table_body.append(table_row);
            });
        }
    });
}
</script>

<!-- เปลี่ยนรูปภาพบุคลากร -->
<script>
function previewImage(input, imgId) {
    let file = input.files[0];
    let reader = new FileReader();
    let previewImg = document.getElementById(imgId);

    reader.onload = function(e) {
        previewImg.src = e.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '<?php echo $themes . 'assets/images/no_img/200x200.png'; ?>';
    }

    let fileName = input.files[0].name;
    let nextSibling = input.nextElementSibling;
    if (nextSibling) {
        nextSibling.innerText = fileName;
    }
}
</script>

<!-- ลบข้อมูลบุคลากร -->
<script>
$(function() {
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");

        Swal.fire({
            title: 'ลบข้อมูลรายบุคคลของ <?= $this->data['PName'] ?> <?= $this->data['FTName'] ?> <?= $this->data['LTName'] ?> ?',
            text: "<?= $this->data['PName'] ?> <?= $this->data['FTName'] ?> <?= $this->data['LTName'] ?>!",
            html: "<span style='font-size: 26px;'>ท่านแน่ใจที่จะลบข้อมูลบุคลากรใช่หรือไม่ ?</span>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "<span class='fs-5 fw-bold'>ตกลง</span>",
            cancelButtonText: "<span class='fs-5 fw-bold'>ยกเลิก</span>"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= site_url('PersonnelInformation/delete_Personnel/' . $this->data['IDCard']) ?>',
                    type: 'post',
                    success: function(results) {
                        $("#" + id).remove();
                        swal("ลบข้อมูล <?= $this->data['PName'] ?> <?= $this->data['FTName'] ?> <?= $this->data['LTName'] ?> เรียบร้อย!",
                            "Your file has been deleted.",
                            "success");

                    }
                });
                window.location = "<?= site_url('PersonnelInformation') ?>";

            } else {
                swal("ยกเลิกการลบข้อมูล", "Your imaginary file is safe.",
                    "error");
            }

        });
    });
});
</script>

<script>
function MemberKBKChange() {
    var memberKBKSelect = document.getElementById("MemberKBK");
    var selectedValue = memberKBKSelect.options[memberKBKSelect.selectedIndex].value;
    var CAccessKBKInput = document.getElementById("CAccessKBK");

    if (selectedValue === "Y") {
        var newSalary = <?= $this->data['NSalary'] ?>;
        CAccessKBKInput.value = newSalary.toLocaleString(undefined, {
            minimumFractionDigits: 2
        });
    } else {
        CAccessKBKInput.value = "0";
    }
}
</script>

<!-- คำนวณวันเกษียญ -->
<script>

$(document).ready(function() {
    calculateAge();
});
function calculateAge() {
    let birthDateInput = $('#BirthDate').val();
    let birthDate = new Date(birthDateInput);
    let currentDate = new Date();

    let ageInterval = currentDate - birthDate;

    let years = Math.floor(ageInterval / (365.25 * 24 * 60 * 60 * 1000));
    let months = Math.floor((ageInterval % (365.25 * 24 * 60 * 60 * 1000)) / (30.44 * 24 * 60 * 60 * 1000));
    let days = Math.floor((ageInterval % (30.44 * 24 * 60 * 60 * 1000)) / (24 * 60 * 60 * 1000));

    $('#Year').val(years);
    $('#Month').val(months);
    $('#Day').val(days);

    let retirementDate = new Date(birthDate);
    let retirement;

    if (birthDate.getMonth() < 9 || birthDate.getDate() < 1) { 
        retirement = birthDate.getFullYear() + 60;
        
    } else {
        retirement = birthDate.getFullYear() + 61;
    }

    retirementDate.setFullYear(retirement);
    retirementDate.setMonth(8);
    retirementDate.setDate(30);

    let months_remaining = (retirementDate.getMonth() + 1).toString().padStart(2, '0');
    let days_remaining = retirementDate.getDate().toString().padStart(2, '0');
    let formattedRetirementDate = retirement + "-" + months_remaining + "-" + days_remaining;
    let years_remain = retirement.toString().substr(-2);

    year_show = 59 - years;
    month_show = 11 - months;
    day_show = days_remaining - days;

    document.getElementById("MretireDate").value = formattedRetirementDate;

    document.getElementById("years_remaining").value = year_show;
    document.getElementById("months_remaining").value = month_show;
    document.getElementById("days_remaining").value = day_show;
}

function removeOptionPersonnalData() {
    $("select[name='PoType'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}

$('#PoType').change(fetch_TeacherPosition);
$('#PoLine').change(fetch_TeacherPoLevel);

function fetch_TeacherPosition() {
    let PoType = $('#PoType').val();
console.log(PoType);
    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_TeacherPosition') ?>",
        method: "POST",
        data: {
            PoType: PoType
        },
        success: function(data) {
            $('#PoLine').html(data);
        }
    });
}

function fetch_TeacherPoLevel() {
    let PoLine = $('#PoLine').val();

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_TeacherPoLevel') ?>",
        method: "POST",
        data: {
            PoLine: PoLine
        },
        success: function(data) {
            $('#PLevel').html(data);
        }
    });
}
</script>

<!-- ***************************************** Javascript Address  ***************************************** -->
<script>
$("input#sameAddress").click(function() {
    if ($(this).is(":checked")) {
        $("#CNo").val($("#RNo").val());
        $("#CMoo").val($("#RMoo").val());
        $("#Cvillage").val($("#Rvillage").val());
        $("#Csoi").val($("#Rsoi").val());
        $("#CBuid").val($("#RBuid").val());
        $("#CRoad").val($("#RRoad").val());
        $("#CDistrict").val($("#RDistrict").val());
        $("#CSubDistric").val($("#RSubDistric").val());
        $("#CProvince").val($("#RProvince").val());
        $("#CZipcode").val($("#RZipcode").val());
        $("#CTel").val($("#RTel").val());
    } else {
        $("#CNo").val('');
        $("#CMoo").val('');
        $("#Cvillage").val('');
        $("#Csoi").val('');
        $("#CBuid").val('');
        $("#CRoad").val('');
        $("#CDistrict").val('');
        $("#CSubDistric").val('');
        $("#CProvince").val('');
        $("#CZipcode").val('');
        $("#CTel").val('');
    }
});

$('#UpdateAddress').submit(function(event) {
    event.preventDefault();

    // ดึงค่าข้อมูลจากฟอร์ม
    let IDCard = $('#IDCard').val();
    let RNo = $('#RNo').val();
    let RMoo = $('#RMoo').val();
    let Rvillage = $('#Rvillage').val();
    let Rsoi = $('#Rsoi').val();
    let RBuid = $('#RBuid').val();
    let RRoad = $('#RRoad').val();
    let RDistrict = $('#RDistrict').val();
    let RSubDistric = $('#RSubDistric').val();
    let RProvince = $('#RProvince').val();
    let RZipcode = $('#RZipcode').val();
    let RTel = $('#RTel').val();
    let CNo = $('#CNo').val();
    let CMoo = $('#CMoo').val();
    let Cvillage = $('#Cvillage').val();
    let Csoi = $('#Csoi').val();
    let CBuid = $('#CBuid').val();
    let CRoad = $('#CRoad').val();
    let CDistrict = $('#CDistrict').val();
    let CSubDistric = $('#CSubDistric').val();
    let CProvince = $('#CProvince').val();
    let CZipcode = $('#CZipcode').val();
    let CTel = $('#CTel').val();

    // ส่งข้อมูลผ่าน AJAX
    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('RNo', RNo);
    formData.append('RMoo', RMoo);
    formData.append('Rvillage', Rvillage);
    formData.append('Rsoi', Rsoi);
    formData.append('RBuid', RBuid);
    formData.append('RRoad', RRoad);
    formData.append('RDistrict', RDistrict);
    formData.append('RSubDistric', RSubDistric);
    formData.append('RProvince', RProvince);
    formData.append('RZipcode', RZipcode);
    formData.append('RTel', RTel);
    formData.append('CNo', CNo);
    formData.append('CMoo', CMoo);
    formData.append('Cvillage', Cvillage);
    formData.append('Csoi', Csoi);
    formData.append('CBuid', CBuid);
    formData.append('CRoad', CRoad);
    formData.append('CDistrict', CDistrict);
    formData.append('CSubDistric', CSubDistric);
    formData.append('CProvince', CProvince);
    formData.append('CZipcode', CZipcode);
    formData.append('CTel', CTel);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelAddress') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            console.log(dataResult)
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
});
</script>

<!-- ***************************************** Javascript Family  ***************************************** -->
<script>
// ล็อคค่าช่อง input idcard ให้มีความยาว 13 ตัวอักษร และใส่ได้เฉพาะตัวเลข 
function validateInput(input) {

    input.value = input.value.replace(/\D/g, '');

    if (input.value.length > 13) {
        input.value = input.value.slice(0, 13);
    }
}
$('#InsertFamily').submit(function(e) {
    e.preventDefault();
    InsertFamily();
});InsertFamily

function InsertFamily() {
    let IDCard = $('#IDCard').val();
    let FamIDCard = $('#FamIDCard').val();
    let PName = $('#PName').val();
    let FName = $('#FName').val();
    let LName = $('#LName').val();
    let BirthDate = $('#BirthDate').val();
    let ReStatus = $('#ReStatus').val();
    let Status = $('#Status').val();
    let LifeStatus = $('#LifeStatus').val();
    let Job = $('#Job').val();
    let RTel = $('#FRTel').val();
    let Modulate = $('#Modulate').val();
    let Edu = $('#Edu').val();
    let LevelEdu = $('#LevelEdu').val();
    let StuFee = $('#StuFee').val();
    let HealthCare = $('#HealthCare').val();
    let TypeModulate = $('#TypeModulate').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('FamIDCard', FamIDCard);
    formData.append('PName', PName);
    formData.append('FName', FName);
    formData.append('LName', LName);
    formData.append('BirthDate', BirthDate);
    formData.append('ReStatus', ReStatus);
    formData.append('Status', Status);
    formData.append('LifeStatus', LifeStatus);
    formData.append('Job', Job);
    formData.append('RTel', RTel);
    formData.append('Modulate', Modulate);
    formData.append('Edu', Edu);
    formData.append('LevelEdu', LevelEdu);
    formData.append('StuFee', StuFee);
    formData.append('HealthCare', HealthCare);
    formData.append('TypeModulate', TypeModulate);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_PersonnelFamily') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else if (dataResult == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            } else if (dataResult == 'exists') {
                swal.fire({
                    icon: 'error',
                    title: 'มีเลขบัตรประชาชนนี้ในระบบอยู่แล้ว',
                    type: "error"
                });
            }
        }
    });
}

$(document).ready(function() {
    getPersonnelFamily();
});

function getPersonnelFamily() {
    let table_body = $('#tbl_PersonnelFamily tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelFamily') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="7" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) { 
                    count++;
                    let table_row = `
                        <tr> 
                            <td align="center" >${row.PName}</td>
                            <td align="left" >${row.FName + '&nbsp;&nbsp;' + row.LName}</td>
                            <td class="text-center" >${row.ReStatus}</td>
                            <td class="text-center" >${row.Job}</td>
                            <td class="text-center" >${row.RTel || ''}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModal${count}">ดูข้อมูล</button>
                                <div class="modal fade " id="editModal${count}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog" style="max-width: 1300px;">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> ข้อมูลครอบครัว </h5>
                                                        </div>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">เลขบัตรประชาชน<span style="color: red;"> *</span> </label>
                                                                    <input type="text" class="form-control" tabindex="1" name="FamIDCard" id="FamIDCard${count}" size="25"
                                                                    value="${row.FamIDCard}" onkeyup="autoTab(this)" minlength="13" maxlength="20" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">คำนำหน้า<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="PName" id="PName${count}" required disabled onclick="removeOption_family()">
                                                                    <option value="${row.PName}" class="select-fnz">${row.PName}</option>
                                                                    <?php 
                                                                    foreach ($STTPname as $row) {
                                                                        ?>
                                                                        <option class="select-fnz" value="<?= $row->TSPname ?>">
                                                                            <?= $row->TSPname ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ชื่อ<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="FName${count}" name="FName" value="${row.FName}" maxlength="20" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">นามสกุล<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="LName${count}" name="LName" value="${row.LName}" maxlength="20" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="fw-bold">วัน/เดือน/ปี เกิด<span style="color: red;"> *</span></label>
                                                                <input type="date" class="form-control" id="BirthDate${count}" name="BirthDate" 
                                                                    value="${row.BirthDate}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold" style='font-size:24px;'>ความสัมพันธ์ของคนในครอบครัว<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="ReStatus" id="ReStatus${count}" required disabled onclick="removeOption_family()">
                                                                    <option value="${row.ReStatus}" class="select-fnz">${row.ReStatus}</option>
                                                                    <option value="บิดา" class="select-fnz">บิดา</option>
                                                                    <option value="มารดา" class="select-fnz">มารดา</option>
                                                                    <option value="สามี" class="select-fnz">สามี</option>
                                                                    <option value="ภรรยา" class="select-fnz">ภรรยา</option>
                                                                    <option value="ลุง" class="select-fnz">ลุง</option>
                                                                    <option value="ป้า" class="select-fnz">ป้า</option>
                                                                    <option value="น้า" class="select-fnz">น้า</option>
                                                                    <option value="อา" class="select-fnz">อา</option>
                                                                    <option value="อื่นๆ" class="select-fnz">อื่น ๆ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สถานภาพสมรส<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="Status" id="Status${count}" value="แต่งงานเเล้ว" required disabled onclick="removeOption_family()">
                                                                    <option value="${row.Status}" class="select-fnz">${row.Status}</option>
                                                                    <option value="โสด" class="select-fnz">โสด</option>
                                                                    <option value="สมรส" class="select-fnz">สมรส</option>
                                                                    <option value="หย่าร้าง" class="select-fnz">หย่าร้าง</option>
                                                                    <option value="หม้าย" class="select-fnz">หม้าย</option>
                                                                    <option value="แยกกันอยู่" class="select-fnz">แยกกันอยู่</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สถานภาพการมีชีวิต<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="LifeStatus" id="LifeStatus${count}" required disabled onclick="removeOption_family()">
                                                                    <option value="${row.LifeStatus}" class="select-fnz">${row.LifeStatus}</option>
                                                                    <option value="มีชีวิตอยู่" class="select-fnz">มีชีวิตอยู่</option>
                                                                    <option value="เสียชีวิต" class="select-fnz">เสียชีวิต</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">อาชีพ<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="Job${count}" name="Job" value="${row.Job}" maxlength="20" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">หมายเลขโทรศัพท์</label>
                                                                <input type="text" class="form-control" id="FRTel${count}" name="FRTel" value="${row.RTel}" maxlength="10" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="card-title mt-5 fw-bold" style="color: #18409e;font-size: 32px;"> ข้อมูลครอบครัวเพิ่มเติม</h5>
                                                    <hr style="color: #eac178;height: 2px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สิทธิการลดหย่อนภาษี</label>
                                                                <select class="form-select" name="Modulate" id="Modulate${count}" disabled onclick="removeOption_family()">
                                                                    <option class="col select-fnz" value="${row.Modulate}">${row.Modulate}</option>
                                                                    <option value="ไม่มีสิทธิ์" class="select-fnz">ไม่มีสิทธิ์</option>
                                                                    <option value="มีสิทธิ์" class="select-fnz">มีสิทธิ์</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">การศึกษา</label> 
                                                                <select class="form-select" name="Edu" id="Edu${count}" disabled onclick="removeOption_family()"> 
                                                                    <option class="col select-fnz"value="${row.Edu}" >${row.Edu}</option>
                                                                    <option value="มีการศึกษา" class="select-fnz">มีการศึกษา</option>
                                                                    <option value="ไม่มีการศึกษา" class="select-fnz">ไม่มีการศึกษา</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ศึกษาในระดับ</label>
                                                                <select class="form-select" name="LevelEdu" id="LevelEdu${count}" disabled onclick="removeOption_family()">
                                                                    <option class="col select-fnz" value="${row.LevelEdu}">${row.LevelEdu}</option>
                                                                    <option value="ประถมศึกษา" class="select-fnz">ประถมศึกษา</option>
                                                                    <option value="มัธยมศึกษาตอนต้น" class="select-fnz">มัธยมศึกษาตอนต้น</option>
                                                                    <option value="มัธยมศึกษาตอนปลาย" class="select-fnz">มัธยมศึกษาตอนปลาย</option>
                                                                    <option value="ปริญญาตรี" class="select-fnz">ปริญญาตรี</option>
                                                                    <option value="ปริญญาโท" class="select-fnz">ปริญญาโท</option>
                                                                    <option value="ปริญญาตเอก" class="select-fnz">ปริญญาตเอก</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สิทธิ์การเบิกค่าเล่าเรียน</label>
                                                                <select class="form-select" name="StuFee" id="StuFee${count}" disabled onclick="removeOption_family()">
                                                                    <option class="col select-fnz" value="${row.StuFee}">${row.StuFee}</option>
                                                                    <option value="ไม่มีสิทธิ์" class="select-fnz">ไม่มีสิทธิ์</option>
                                                                    <option value="มีสิทธิ์" class="select-fnz">มีสิทธิ์</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สิทธิ์เบิกค่ารักษาพยาบาล</label>
                                                                <select class="form-select" name="HealthCare" id="HealthCare${count}" disabled onclick="removeOption_family()">
                                                                    <option class="col select-fnz" value="${row.HealthCare}">${row.HealthCare}</option>
                                                                    <option value="ไม่มีสิทธิ์" class="select-fnz">ไม่มีสิทธิ์</option>
                                                                    <option value="มีสิทธิ์" class="select-fnz">มีสิทธิ์</option>                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ประเภทการลดหย่อนบุคร</label>
                                                                <select class="form-select" name="TypeModulate" id="TypeModulate${count}" disabled onclick="removeOption_family()">
                                                                    <option class="select-fnz" value="${row.TypeModulate}">${row.TypeModulate}</option>
                                                                    <option value="เต็ม" class="select-fnz">เต็ม</option>
                                                                    <option value="คนละครึ่ง" class="select-fnz">คนละครึ่ง</option>
                                                                    <option value="บุตรหมดสิทธิ์"class="select-fnz">บุตรหมดสิทธิ์</option>                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="col">
                                                                <h6 class="fw-bold "> หมายเหตุ <span style="color: red;">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12 ">
                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_family" onclick="toggleEdit_Family(this)">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display:none;" onclick="UpdateFamily(${row.FamIDCard}, ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4"  data-bs-dismiss="modal">ยกเลิก</button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteFamily(${row.FamIDCard})">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Family(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

function UpdateFamily(FamIDCard, modalCount) {

    let PName = $(`#PName${modalCount}`).val();
    let FName = $(`#FName${modalCount}`).val();
    let LName = $(`#LName${modalCount}`).val();
    let BirthDate = $(`#BirthDate${modalCount}`).val();
    let ReStatus = $(`#ReStatus${modalCount}`).val();
    let Status = $(`#Status${modalCount}`).val();
    let LifeStatus = $(`#LifeStatus${modalCount}`).val();
    let Job = $(`#Job${modalCount}`).val();
    let RTel = $(`#FRTel${modalCount}`).val();
    let Modulate = $(`#Modulate${modalCount}`).val();
    let Edu = $(`#Edu${modalCount}`).val();
    let LevelEdu = $(`#LevelEdu${modalCount}`).val();
    let StuFee = $(`#StuFee${modalCount}`).val();
    let HealthCare = $(`#HealthCare${modalCount}`).val();
    let TypeModulate = $(`#TypeModulate${modalCount}`).val();

    let formData = new FormData();
    formData.append('FamIDCard', FamIDCard);
    formData.append('PName', PName);
    formData.append('FName', FName);
    formData.append('LName', LName);
    formData.append('BirthDate', BirthDate);
    formData.append('ReStatus', ReStatus);
    formData.append('Status', Status);
    formData.append('LifeStatus', LifeStatus);
    formData.append('Job', Job);
    formData.append('RTel', RTel);
    formData.append('Modulate', Modulate);
    formData.append('Edu', Edu);
    formData.append('LevelEdu', LevelEdu);
    formData.append('StuFee', StuFee);
    formData.append('HealthCare', HealthCare);
    formData.append('TypeModulate', TypeModulate);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelFamily') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                getPersonnelFamily();
                $(`#editModal${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteFamily(FamIDCard) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelFamily') ?>",
                type: 'POST',
                data: {
                    FamIDCard: FamIDCard
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).on("click", "#edit_family", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#PName" + count).prop("disabled", false);
    $("#FName" + count).prop("readonly", false);
    $("#LName" + count).prop("readonly", false);
    $("#BirthDate" + count).prop("readonly", false);
    $("#ReStatus" + count).prop("disabled", false);
    $("#Status" + count).prop("disabled", false);
    $("#LifeStatus" + count).prop("disabled", false);
    $("#Job" + count).prop("readonly", false);
    $("#FRTel" + count).prop("readonly", false);
    $("#Modulate" + count).prop("disabled", false);
    $("#Edu" + count).prop("disabled", false);
    $("#LevelEdu" + count).prop("disabled", false);
    $("#StuFee" + count).prop("disabled", false);
    $("#HealthCare" + count).prop("disabled", false);
    $("#TypeModulate" + count).prop("disabled", false);
});

function removeOption_family(modalCount){
    $("select[name='PName'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='ReStatus'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Status'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='LifeStatus'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Modulate'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Edu'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='LevelEdu'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='StuFee'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='HealthCare'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='TypeModulate'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>

<!-- ***************************************** Javascript Contact  ***************************************** -->
<script>
$('#InsertContact').submit(function(e) {
    e.preventDefault();
    InsertContact();
});

function InsertContact() {
    let IDCard = $('#IDCard').val();
    let FamIDCard = $('#CtFamIDCard').val();
    let PName = $('#CtPName').val();
    let FName = $('#CtFName').val();
    let LName = $('#CtLName').val();
    let BirthDate = $('#CtBirthDate').val();
    let ReStatus = $('#CtReStatus').val();
    let Job = $('#CtJob').val();
    let RTel = $('#CtRTel').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('FamIDCard', FamIDCard);
    formData.append('PName', PName);
    formData.append('FName', FName);
    formData.append('LName', LName);
    formData.append('BirthDate', BirthDate);
    formData.append('ReStatus', ReStatus);
    formData.append('Job', Job);
    formData.append('RTel', RTel);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_PersonnelContact') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else if (dataResult == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            } else if (dataResult == 'exists') {
                swal.fire({
                    icon: 'error',
                    title: 'มีเลขบัตรประชาชนนี้ในระบบอยู่แล้ว',
                    type: "error"
                });
            }
        }
    });
}

$(document).ready(function() {
    getPersonnelContact();
});

function getPersonnelContact() {
    let table_body = $('#tbl_PersonnelContact tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelFamily') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="7" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td align="center" >${row.PName}</td>
                            <td align="left" >${row.FName + '&nbsp;&nbsp;' + row.LName}</td>
                            <td class="text-center" >${row.ReStatus}</td>
                            <td class="text-center" >${row.Job}</td>
                            <td class="text-center" >${row.RTel || ''}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalContact${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalContact${count}" tabindex="-1"aria-labelledby="myModalLabel" aria-hidden="true"style="text-align: left;">
                                    <div class="modal-dialog modal-xl" > 
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> ข้อมูลผู้ที่สามารถติดต่อได้ </h5>
                                                        </div>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">เลขบัตรประชาชน<span style="color: red;"> *</span> </label>
                                                                <input type="text" class="form-control" tabindex="1" name="CtFamIDCard" id="CtFamIDCard${count}" size="25"
                                                                value="${row.FamIDCard}" onkeyup="autoTab(this)" minlength="13" maxlength="20" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                        <div class="form-group">
                                                                <label for="" class="fw-bold">คำนำหน้า<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="CtPName" id="CtPName${count}" required disabled onclick="removeOption_contact()">
                                                                    <option value="${row.PName}" class="select-fnz">${row.PName} </option>
                                                                    <?php 
                                                                    foreach ($STTPname as $row) {
                                                                        ?>
                                                                    <option class="select-fnz" value="<?= $row->TSPname ?>"><?= $row->TSPname ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                                <div class="form-group">
                                                                    <label for="" class="fw-bold">ชื่อ<span style="color: red;"> *</span></label>
                                                                    <input type="text" class="form-control" id="CtFName${count}" name="CtFName" value="${row.FName}" maxlength="20" required readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="" class="fw-bold">นามสกุล<span style="color: red;"> *</span></label>
                                                                    <input type="text" class="form-control" id="CtLName${count}" name="CtLName" value="${row.LName}" maxlength="20" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">    
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="fw-bold">วัน/เดือน/ปี เกิด<span style="color: red;"> *</span></label>
                                                                    <input type="date" class="form-control" id="CtBirthDate${count}" name="CtBirthDate" 
                                                                        value="${row.BirthDate}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="" class="fw-bold" style='font-size:24px;'>ความสัมพันธ์ของคนในครอบครัว<span style="color: red;"> *</span></label>
                                                                    <select class="form-select" name="CtReStatus" id="CtReStatus${count}" required disabled onclick="removeOption_contact()">
                                                                        <option value="${row.ReStatus}" class="select-fnz">${row.ReStatus}</option>
                                                                        <option value="บิดา" class="select-fnz">บิดา</option>
                                                                        <option value="มารดา" class="select-fnz">มารดา</option>
                                                                        <option value="สามี" class="select-fnz">สามี</option>
                                                                        <option value="ภรรยา" class="select-fnz">ภรรยา</option>
                                                                        <option value="ลุง" class="select-fnz">ลุง</option>
                                                                        <option value="ป้า" class="select-fnz">ป้า</option>
                                                                        <option value="น้า" class="select-fnz">น้า</option>
                                                                        <option value="อา" class="select-fnz">อา</option>
                                                                        <option value="อื่นๆ" class="select-fnz">อื่น ๆ</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="" class="fw-bold">อาชีพ<span style="color: red;"> *</span></label>
                                                                    <input type="text" class="form-control" id="CtJob${count}" name="CtJob" value="${row.Job}" maxlength="20" required readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="" class="fw-bold">หมายเลขโทรศัพท์</label>
                                                                    <input type="text" class="form-control" id="CtRTel${count}" name="CtRTel" value="${row.RTel}" maxlength="10" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <h6 class="fw-bold "> หมายเหตุ <span style="color: red;">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12 ">
                                                                <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_contact" onclick="toggleEdit_Contact(this)">แก้ไข</button>
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4" style="display:none;" onclick="UpdateContact(${row.FamIDCard}, ${count})">บันทึก</button>
                                                    <button type="button" class="btn btn-secondary fw-bold fs-4"  data-bs-dismiss="modal">ยกเลิก</button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                   
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteFamily(${row.FamIDCard})">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Contact(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

function UpdateContact(FamIDCard, modalCount) {

    let PName = $(`#CtPName${modalCount}`).val();
    let FName = $(`#CtFName${modalCount}`).val();
    let LName = $(`#CtLName${modalCount}`).val();
    let BirthDate = $(`#CtBirthDate${modalCount}`).val();
    let ReStatus = $(`#CtReStatus${modalCount}`).val();
    let Job = $(`#CtJob${modalCount}`).val();
    let RTel = $(`#CtRTel${modalCount}`).val();

    let formData = new FormData();
    formData.append('FamIDCard', FamIDCard);
    formData.append('PName', PName);
    formData.append('FName', FName);
    formData.append('LName', LName);
    formData.append('BirthDate', BirthDate);
    formData.append('ReStatus', ReStatus);
    formData.append('Job', Job);
    formData.append('RTel', RTel);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelContact') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                getPersonnelContact();
                $(`#editModalContact${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

$(document).on("click", "#edit_contact", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#CtPName" + count).prop("disabled", false);
    $("#CtFName" + count).prop("readonly", false);
    $("#CtLName" + count).prop("readonly", false);
    $("#CtBirthDate" + count).prop("readonly", false);
    $("#CtReStatus" + count).prop("disabled", false);
    $("#CtJob" + count).prop("readonly", false);
    $("#CtRTel" + count).prop("readonly", false);
});

function removeOption_contact(modalCount){
    $("select[name='CtPName'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='CtReStatus'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>

<!-- ***************************************** Javascript Study  ***************************************** -->
<script>
$('#InsertStudy').submit(function(e) {
    e.preventDefault();
    InsertStudy();
});

function InsertStudy() {
    let IDCard = $('#IDCard').val();
    let EStartYear = $('#EStartYear').val();
    let EFinishYear = $('#EFinishYear').val();
    let EFinishDate = $('#EFinishDate').val();
    let BA = $('#BA').val();
    let Degree = $('#Degree').val();
    let Major = $('#Major').val();
    let Minor = $('#Minor').val();
    let Institute = $('#Institute').val();
    let Scholarship = $('#Scholarship').val();
    let TypeSch = $('#TypeSch').val();
    let CountrySch = $('#CountrySch').val();
    let AgenSch = $('#AgenSch').val();
    let P_at = $('#P_at').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('EStartYear', EStartYear);
    formData.append('EFinishYear', EFinishYear);
    formData.append('EFinishDate', EFinishDate);
    formData.append('BA', BA);
    formData.append('Degree', Degree);
    formData.append('Major', Major);
    formData.append('Minor', Minor);
    formData.append('Institute', Institute);
    formData.append('Scholarship', Scholarship);
    formData.append('TypeSch', TypeSch);
    formData.append('CountrySch', CountrySch);
    formData.append('AgenSch', AgenSch);
    formData.append('P_at', P_at);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_PersonnelStudy') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

$(document).ready(function() {
    getPersonnelStudy();
    getPersonnelFame();
});

function getPersonnelStudy() {
    let table_body = $('#tbl_PersonnelStudy tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelStudy') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="8" valign="middle" style="height:100px;" class="text-center">
                            ไม่พบข้อมูล
                        </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr> 
                            <td>${row.EStartYear}</td>
                            <td>${row.EFinishYear}</td>
                            <td>${row.Degree}</td>
                            <td>${row.Major}</td>
                            <td>${row.Minor}</td>
                            <td>${row.Institute}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalStudy${count}">ดูข้อมูล</button>
                                <div class="modal fade " id="editModalStudy${count}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog modal-xl" >
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> ข้อมูลประวัติการศึกษา </h5>
                                                        </div>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ปีที่เข้าศึกษา <span
                                                                        style="color: red;">
                                                                        *</span></label>
                                                        <select class="form-select" name="EStartYear" id="EStartYear${count}" required disabled onclick="removeOption_study()">
                                                            <option class="select-fnz" value="${row.EStartYear}" >${row.EStartYear}</option>
                                                            <?php
                                                                foreach ($loopDate as $row => $value) {
                                                            ?>
                                                                <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ปีที่จบการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="EFinishYear" id="EFinishYear${count}" required disabled onclick="removeOption_study()">
                                                            <option class="select-fnz" value="${row.EFinishYear}">${row.EFinishYear}</option>
                                                            <?php
                                                                foreach ($loopDate as $row => $value) {
                                                            ?>
                                                                <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วันที่จบการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="date" class="form-control" id="EFinishDate${count}" name="EFinishDate" value="${row.EFinishDate}" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ระดับการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="BA" id="BA${count}" required disabled onclick="removeOption_study()">
                                                            <option class="select-fnz" value="${row.BA}">${row.BA}</option>
                                                            <?php
                                                            foreach ($FullName as $row) {
                                                        ?>
                                                            <option class="select-fnz" value="<?= $row->FullName ?>">
                                                                <?= $row->FullName ?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วุฒิการศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <select class="form-select" name="Degree" id="Degree${count}" required disabled onclick="removeOption_study()">
                                                            <option class="select-fnz" value="${row.Degree}">${row.Degree}</option>
                                                            <?php
                                                            foreach ($ShortName as $row) {
                                                        ?>
                                                            <option class="select-fnz" value="<?= $row->ShortName ?>">
                                                                <?= $row->ShortName ?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วิชาเอก<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Major${count}" name="Major"
                                                            value="${row.Major}" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">วิชาโท<span style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Minor${count}" name="Minor"
                                                            value="${row.Minor}" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">สถาบันศึกษา<span
                                                                style="color: red;">
                                                                *</span></label>
                                                        <input type="text" class="form-control" id="Institute${count}"
                                                            name="Institute" value="${row.Institute}" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ได้รับทุนการศึกษา</label>
                                                        <select class="form-select" name="Scholarship" id="Scholarship${count}" onchange="toggleFields()" disabled onclick="removeOption_study()">
                                                            <option value="${row.Scholarship}" class="select-fnz">${row.Scholarship === "Y" ? "มี" : row.Scholarship === "N" ? "ไม่มี" : ""}</option>
                                                            <option value="Y" class="select-fnz">มี</option>
                                                            <option value="N" class="select-fnz">ไม่มี</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ประเภททุน</label>
                                                        <input type="text" class="form-control" id="TypeSch${count}"
                                                            name="TypeSch" value="${row.TypeSch}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">หน่วยงานที่ให้ทุน</label>
                                                        <input type="text" class="form-control" id="CountrySch${count}"
                                                            name="CountrySch" value="${row.CountrySch}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="fw-bold">ประเทศที่ให้ทุน</label>
                                                        <select class="form-select" name="AgenSch" id="AgenSch${count}" disabled onclick="removeOption_study()">
                                                            <option value="${row.AgenSch}" class="select-fnz">${row.AgenSch}</option>
                                                            <option value="ไทย" class="select-fnz">ไทย</option>
                                                            <option value="จีน" class="select-fnz">จีน</option>
                                                            <option value="อังกฤษ" class="select-fnz">อังกฤษ</option>
                                                            <option value="ลาว" class="select-fnz">ลาว</option>
                                                            <option value="แคเมอรูน" class="select-fnz">แคเมอรูน
                                                            </option>
                                                            <option value="ฟิลิปปินส์" class="select-fnz">ฟิลิปปินส์
                                                            </option>
                                                            <option value="อื่นๆ" class="select-fnz">อื่น ๆ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                foreach ($getP_at_study as $row) {
                                                    if (isset($row->P_at_max)) {
                                                        $P_at = $row->P_at_max + 1;
                                                    } else {
                                                        $P_at = 1; 
                                                    }
                                        ?>
                                            <input type="text" class="form-control" id="P_at${count}" name="P_at"
                                                value="<?= $P_at ?>" style="display:none;">
                                        <?php
                                                }
                                        ?>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="col">
                                                    <h6 class="fw-bold ">หมายเหตุ<span style="color: red;"> (*)</span>
                                                        เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12 ">
                                                <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_study" onclick="toggleEdit_Study(this)">แก้ไข</button>
                                            <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateStudy('${row.IDCard}', '${row.P_at}', ${count})">บันทึก</button>
                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button> 
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteStudy('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Study(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

function UpdateStudy(IDCard, P_at, modalCount) {

    let EStartYear = $(`#EStartYear${modalCount}`).val();
    let EFinishYear = $(`#EFinishYear${modalCount}`).val();
    let EFinishDate = $(`#EFinishDate${modalCount}`).val();
    let BA = $(`#BA${modalCount}`).val();
    let Degree = $(`#Degree${modalCount}`).val();
    let Major = $(`#Major${modalCount}`).val();
    let Minor = $(`#Minor${modalCount}`).val();
    let Institute = $(`#Institute${modalCount}`).val();
    let Scholarship = $(`#Scholarship${modalCount}`).val();
    let TypeSch = $(`#TypeSch${modalCount}`).val();
    let CountrySch = $(`#CountrySch${modalCount}`).val();
    let AgenSch = $(`#AgenSch${modalCount}`).val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('EStartYear', EStartYear);
    formData.append('EFinishYear', EFinishYear);
    formData.append('EFinishDate', EFinishDate);
    formData.append('BA', BA);
    formData.append('Degree', Degree);
    formData.append('Major', Major);
    formData.append('Minor', Minor);
    formData.append('Institute', Institute);
    formData.append('Scholarship', Scholarship);
    formData.append('TypeSch', TypeSch);
    formData.append('CountrySch', CountrySch);
    formData.append('AgenSch', AgenSch);
    formData.append('P_at', P_at);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelStudy') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                $(`#editModalStudy${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteStudy(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelStudy') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).on("click", "#edit_study", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#EStartYear" + count).prop("disabled", false);
    $("#EFinishYear" + count).prop("disabled", false);
    $("#EFinishDate" + count).prop("readonly", false);
    $("#BA" + count).prop("disabled", false);
    $("#Degree" + count).prop("disabled", false);
    $("#Major" + count).prop("readonly", false);
    $("#Minor" + count).prop("readonly", false);
    $("#Institute" + count).prop("readonly", false);
    $("#Scholarship" + count).prop("disabled", false);
    $("#TypeSch" + count).prop("readonly", false);
    $("#CountrySch" + count).prop("readonly", false);
    $("#AgenSch" + count).prop("disabled", false);
});

function removeOption_study(modalCount){
    $("select[name='EStartYear'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='EFinishYear'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='BA'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Degree'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Scholarship'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='AgenSch'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='RecieveYear'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}

$('#InsertFame').submit(function(e) {
    e.preventDefault();
    InsertFame();
});

function InsertFame() {
    let IDCard = $('#IDCard').val();
    let FType = $('#FType').val();
    let Agencies = $('#Agencies').val();
    let RecieveYear = $('#RecieveYear').val();
    let FileNm = $('#FileNm')[0].files[0];
    let P_at = $('#P_at_fame').val();
    
    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('FType', FType);
    formData.append('Agencies', Agencies);
    formData.append('RecieveYear', RecieveYear);
    formData.append('FileNm', FileNm);
    formData.append('P_at', P_at);
    
    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_PersonnelFame') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function getPersonnelFame() {
    let table_body = $('#tbl_PersonnelFame tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelFame') ?>",
        method: "POST", 
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="8" valign="middle" style="height:100px;" class="text-center">
                            ไม่พบข้อมูล
                        </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) { 
                    count++;
                    let table_row = `<tr> 
                            <td>${row.FType}</td>
                            <td>${row.Agencies}</td>
                            <td>${row.RecieveYear}</td>
                            <td><a href="<?= site_url('PersonnelInformation/export/') ?>${row.IDCard}/${row.P_at}">${row.FileNm || ''}</a></td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalFame${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalFame${count}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog" style="max-width: 1000px;">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> ข้อมูลเกียรติคุณ </h5>
                                                        </div>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ประเภทเกียรติคุณ<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="FType${count}" name="FType" value="${row.FType}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">หน่วยงาน<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="Agencies${count}" name="Agencies" value="${row.Agencies}" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ปีที่ได้รับ <span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="RecieveYear" id="RecieveYear${count}"required disabled onclick="removeOption_study()">
                                                                    <option class="select-fnz" value="${row.RecieveYear}">${row.RecieveYear}</option>
                                                                    <?php
                                                                        foreach ($loopDate as $row => $value) {
                                                                    ?>
                                                                        <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <div class="col">
                                                    <div class="form-group" id="FileNameDownload${count}">
                                                        <label for="" class="fw-bold">แนบไฟล์</label>
                                                        <a href="<?= site_url('PersonnelInformation/export/') ?>${row.IDCard}/${row.P_at}"><input class="form-control" type="text" id="FileNmEdit${count}" name="FileNmEdit" value="${row.FileNm !== null ? row.FileNm : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                    </div>
                                                    <div class="form-group" id="FileNameInput${count}" style="display: none;">
                                                        <label for="" class="fw-bold">แนบไฟล์</label>
                                                        <input class="form-control" type="file" id="FileNm_Edit${count}" name="FileNm_Edit">
                                                    </div>
                                                </div>
                                                <?php
                                                foreach ($getP_at_study as $row) {
                                                    if (isset($row->P_at_max)) {
                                                        $P_at = $row->P_at_max + 1;
                                                    } else {
                                                        $P_at = 1; 
                                                    }
                                                ?>
                                                    <input type="text" class="form-control" id="P_at${count}" name="P_at"
                                                        value="<?= $P_at ?>" style="display:none;">
                                                <?php
                                                        }
                                                ?>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="col">
                                                            <h6 class="fw-bold ">หมายเหตุ<span style="color: red;"> (*)</span>
                                                                เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12 ">
                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_fame" onclick="toggleEditFile(${count}, this)">แก้ไข</button>
                                                    <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateFame('${row.IDCard}', '${row.P_at}', ${count})">บันทึก</button>
                                                    <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteFame('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEditFile(count, button) {
    let FileNameDownloadDiv = document.getElementById(`FileNameDownload${count}`);
    let FileNameInputDiv = document.getElementById(`FileNameInput${count}`);
    let editButton = button;
    let saveButton = editButton.nextElementSibling;

    if (FileNameDownloadDiv.style.display === "none") {
        FileNameDownloadDiv.style.display = "block";
        FileNameInputDiv.style.display = "none";
        editButton.style.display = "block";
        saveButton.style.display = "none";
    } else {
        FileNameDownloadDiv.style.display = "none";
        FileNameInputDiv.style.display = "block";
        editButton.style.display = "none";
        saveButton.style.display = "block";
    }
}

function FrmDeleteFame(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelFame') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

function UpdateFame(IDCard, P_at, modalCount) {

    let FType = $(`#FType${modalCount}`).val();
    let Agencies = $(`#Agencies${modalCount}`).val();
    let RecieveYear = $(`#RecieveYear${modalCount}`).val();
    let FileNm = $(`#FileNm_Edit${modalCount}`)[0].files[0];
    
    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('P_at', P_at);
    formData.append('FType', FType);
    formData.append('Agencies', Agencies);
    formData.append('RecieveYear', RecieveYear);
    formData.append('FileNm', FileNm);
    
    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelFame') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                $(`#editModalFame${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

$(document).on("click", "#edit_fame", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#FType" + count).prop("readonly", false);
    $("#Agencies" + count).prop("readonly", false);
    $("#RecieveYear" + count).prop("disabled", false);
    $("#FileNm" + count).prop("readonly", false);
});

function toggleFields() {
    const scholarshipSelect = document.getElementById("Scholarship");
    const typeSchInput = document.getElementById("TypeSch");
    const countrySchInput = document.getElementById("CountrySch");
    const agenSchSelect = document.getElementById("AgenSch");

    const scholarshipValue = scholarshipSelect.value;
    const isScholarshipEmpty = scholarshipValue === "N";

    typeSchInput.readOnly = isScholarshipEmpty;
    countrySchInput.readOnly = isScholarshipEmpty;
    agenSchSelect.disabled = isScholarshipEmpty;
}
toggleFields();
</script>

<!-- ***************************************** Javascript Training ***************************************** -->
<script>
$(document).ready(function() {
    getPersonnelTraining();
});

function getPersonnelTraining() {
    let table_body = $('#tbl_PersonnelTraining tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelTraining') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="13" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td>${row.TNameCourse}</td>
                            <td>${row.TDepart}</td>
                            <td>${row.TGCourse}</td>
                            <td>${new Date(row.TStartDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${new Date(row.TFinishDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.TPlace}</td>
                            <td>${row.TProvince}</td>
                            <td>${row.TCountry}</td>
                            <td>${row.TCDay}</td>
                            <td>${row.TCHou}</td>
                            <td align="right">${row.TPay}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalTrain${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalTrain${count}" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">ข้อมูลประวัติการอบรม ศึกษา ดูงาน</h5>
                                                    </div>
                                                </div>
                                                <div id="modal-setting-1" class="tabcontent">
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername2" class="col mt-1 fw-bold" style="color: black;font-size: 25px;">ชื่อหลักสูตรอบรม
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control mt-1" id="TNameCourse${count}" name="TNameCourse" value="${row.TNameCourse}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail" class="col mt-2 fw-bold" style="color: black;">ชื่อหน่วยงาน
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TDepart${count}" name="TDepart" value="${row.TDepart}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2  fw-bold" style="color: black;">กลุ่มหลักสูตร
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TGCourse${count}" name="TGCourse" value="${row.TGCourse}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold" style="color: black;">สถานที่</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TPlace${count}" name="TPlace" value="${row.TPlace}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col  mt-2 fw-bold" style="color: black;">จังหวัด
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TProvince${count}" name="TProvince" value="${row.TProvince}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold" style="color: black;">วันที่เริ่ม
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="date" class="form-control" id="TStartDate${count}" name="TStartDate" value="${row.TStartDate}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold" style="color: black;">วันที่สิ้นสุด
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="date" class="form-control" id="TFinishDate${count}" name="TFinishDate" value="${row.TFinishDate}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold" style="color: black;">ประเทศ</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TCountry${count}" name="TCountry" value="${row.TCountry}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold" style="color: black;">วัน
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TCDay${count}" name="TCDay" value="${row.TCDay}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold"  style="color: black;">ชั่วโมง
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col"> 
                                                                        <input type="text" class="form-control" id="TCHou${count}" name="TCHou" value="${row.TCHou}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleInputMobile" class="col mt-2 fw-bold" style="color: black;">ค่าใช้จ่าย
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="TPay${count}" name="TPay" value="${row.TPay}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                        <?php
                                                                            foreach ($getP_at_train as $row) {
                                                                                if (isset($row->P_at_max)) {
                                                                                    $P_at = $row->P_at_max + 1;
                                                                                } else {
                                                                                    $P_at = 1; 
                                                                                }
                                                                        ?>
                                                                        <input type="text" class="form-control" id="P_at_train" name="P_at_train" value="<?= $P_at ?>" style="display:none;">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mt-2">
                                                    <h6 class="fw-bold ">หมายเหตุ <span style="color: red;">(*)</span>  เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง </h6>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12 ">
                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_train" onclick="toggleEdit_Training(this)">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateTraining('${row.IDCard}', '${row.P_at}', ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteTrain('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Training(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

$('#InsertTraining').submit(function(e) {
    e.preventDefault();
    InsertTraining();
});

function InsertTraining() {
    let IDCard = $('#IDCard').val();
    let TNameCourse = $('#TNameCourse').val();
    let TDepart = $('#TDepart').val();
    let TGCourse = $('#TGCourse').val();
    let TPlace = $('#TPlace').val();
    let TProvince = $('#TProvince').val();
    let TStartDate = $('#TStartDate').val();
    let TFinishDate = $('#TFinishDate').val();
    let TCountry = $('#TCountry').val();
    let TCDay = $('#TCDay').val();
    let TCHou = $('#TCHou').val();
    let TPay = $('#TPay').val();
    let P_at = $('#P_at_train').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('TNameCourse', TNameCourse);
    formData.append('TDepart', TDepart);
    formData.append('TGCourse', TGCourse);
    formData.append('TPlace', TPlace);
    formData.append('TProvince', TProvince);
    formData.append('TStartDate', TStartDate);
    formData.append('TFinishDate', TFinishDate);
    formData.append('TCountry', TCountry);
    formData.append('TCDay', TCDay);
    formData.append('TCHou', TCHou);
    formData.append('TPay', TPay);
    formData.append('P_at', P_at);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/insert_PersonnelTraining') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function UpdateTraining(IDCard, P_at, modalCount) {

    let TNameCourse = $(`#TNameCourse${modalCount}`).val();
    let TDepart = $(`#TDepart${modalCount}`).val();
    let TGCourse = $(`#TGCourse${modalCount}`).val();
    let TPlace = $(`#TPlace${modalCount}`).val();
    let TProvince = $(`#TProvince${modalCount}`).val();
    let TStartDate = $(`#TStartDate${modalCount}`).val();
    let TFinishDate = $(`#TFinishDate${modalCount}`).val();
    let TCountry = $(`#TCountry${modalCount}`).val();
    let TCDay = $(`#TCDay${modalCount}`).val();
    let TCHou = $(`#TCHou${modalCount}`).val();
    let TPay = $(`#TPay${modalCount}`).val();
    
    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('P_at', P_at);
    formData.append('TNameCourse', TNameCourse);
    formData.append('TDepart', TDepart);
    formData.append('TGCourse', TGCourse);
    formData.append('TPlace', TPlace);
    formData.append('TProvince', TProvince);
    formData.append('TStartDate', TStartDate);
    formData.append('TFinishDate', TFinishDate);
    formData.append('TCountry', TCountry);
    formData.append('TCDay', TCDay);
    formData.append('TCHou', TCHou);
    formData.append('TPay', TPay);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelTraining') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                $(`#editModalTraining${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteTrain(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelTrain') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).on("click", "#edit_train", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#TNameCourse" + count).prop("readonly", false);
    $("#TDepart" + count).prop("readonly", false);
    $("#TGCourse" + count).prop("readonly", false);
    $("#TPlace" + count).prop("readonly", false);
    $("#TProvince" + count).prop("readonly", false);
    $("#TStartDate" + count).prop("readonly", false);
    $("#TFinishDate" + count).prop("readonly", false);
    $("#TCountry" + count).prop("readonly", false);
    $("#TCDay" + count).prop("readonly", false);
    $("#TCHou" + count).prop("readonly", false);
    $("#TPay" + count).prop("readonly", false);
});
</script>

<!-- ***************************************** Javascript Position ***************************************** -->
<script>
$(document).ready(function() {
    getPersonnelPosition();
});

function getPersonnelPosition() {
    let table_body = $('#tbl_PersonnelPosition tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelPosition') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="7" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td>${row.PLevel}</td>
                            <td>${row.PPo}</td>
                            <td>${row.PAgencies}</td>
                            <td>${row.PProvince}</td>
                            <td>${new Date(row.PChangeDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalPosition${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalPosition${count}" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">ข้อมูลประวัติการเลื่อนตำแหน่ง</h5>
                                                    </div>
                                                </div>
                                                <div id="modal-setting-1" class="tabcontent">
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail2" class="col mt-1  fw-bold" style="color: black; ">ระดับ
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="PPLevel${count}" name="PPLevel" value="${row.PLevel}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail2" class="col mt-3  fw-bold" style="color: black; ">ตำแหน่ง
                                                                <span style="color: red;"> *</span></label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="PPo${count}" name="PPo" value="${row.PPo}" required readonly> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputMobile" class="col mt-3  fw-bold" style="color: black;">วันที่เลื่อนตำแหน่ง
                                                                <span style="color: red;"> *</span></label>
                                                                <div class="col">
                                                                    <input type="date" class="form-control" id="PChangeDate${count}" name="PChangeDate" value="${row.PChangeDate}" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputMobile" class="col mt-1  fw-bold" style="color: black;">หน่วยงาน
                                                                <span style="color: red;"> *</span></label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="PAgencies${count}" name="PAgencies" value="${row.PAgencies}" required readonly>
                                                                </div>
                                                             </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputMobile" class="col mt-3  fw-bold" style="color: black;">จังหวัด</label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="PProvince${count}" name="PProvince" value="${row.PProvince}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                    <?php
                                                                            foreach ($getP_at_position as $row) {
                                                                                if (isset($row->P_at_max)) {
                                                                                    $P_at = $row->P_at_max + 1;
                                                                                } else {
                                                                                    $P_at = 1; 
                                                                                }
                                                                        ?>
                                                                        <input type="text" class="form-control" id="P_at_position" name="P_at_position" value="<?= $P_at ?>" style="display:none;">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col mt-2">
                                                    <h6 class="fw-bold ">หมายเหตุ <span style="color: red;">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง </h6>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12 ">
                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_position" onclick="toggleEdit_Position(this)">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdatePosition('${row.IDCard}', '${row.P_at}', ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeletePosition('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Position(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

$('#InsertPosition').submit(function(e) {
    e.preventDefault();
    InsertPosition();
});

function InsertPosition() {
    let IDCard = $('#IDCard').val();
    let PLevel = $('#PPLevel').val();
    let PPo = $('#PPo').val();
    let PChangeDate = $('#PChangeDate').val();
    let PAgencies = $('#PAgencies').val();
    let PProvince = $('#PProvince').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('PLevel', PLevel);
    formData.append('PPo', PPo);
    formData.append('PChangeDate', PChangeDate);
    formData.append('PAgencies', PAgencies);
    formData.append('PProvince', PProvince);
    
    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/insert_PersonnelPosition') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function UpdatePosition(IDCard, P_at, modalCount) {
    let PLevel = $(`#PPLevel${modalCount}`).val();
    let PPo = $(`#PPo${modalCount}`).val();
    let PChangeDate = $(`#PChangeDate${modalCount}`).val();
    let PAgencies = $(`#PAgencies${modalCount}`).val();
    let PProvince = $(`#PProvince${modalCount}`).val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('P_at', P_at);
    formData.append('PLevel', PLevel);
    formData.append('PPo', PPo);
    formData.append('PChangeDate', PChangeDate);
    formData.append('PAgencies', PAgencies);
    formData.append('PProvince', PProvince);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelPosition') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                $(`#editModalPosition${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeletePosition(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
            confirmButton: 'btn-confirm',
            cancelButton: 'btn-cancel'
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelPosition') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).on("click", "#edit_position", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#PPLevel" + count).prop("readonly", false);
    $("#PPo" + count).prop("readonly", false);
    $("#PChangeDate" + count).prop("readonly", false);
    $("#PAgencies" + count).prop("readonly", false);
    $("#PProvince" + count).prop("readonly", false);
});
</script>

<!-- ***************************************** Javascript Teaching ***************************************** -->
<script>
$(document).ready(function() {
    getPersonnelTeaching();
});

function getPersonnelTeaching() {
    let table_body = $('#tbl_PersonnelTeaching tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelTeaching') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="10" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td>${row.EYea}</td>
                            <td>${row.ETerm}</td>
                            <td>${row.GLearn}</td>
                            <td>${row.Titles}</td>
                            <td>${row.GLearn_more}</td>
                            <td>${row.Lev}.${row.Clss}</td>
                            <td>${row.Room}</td>
                            <td>${row.HourPerWeek}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalTeaching${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalTeaching${count}" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog" style="max-width: 1300px;">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">ข้อมูลการสอน </h5>
                                                        </div>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ปีที่เข้าศึกษา<span style="color: red;"> *</span></label>
                                                                    <select class="form-select" name="EYea" id="EYea${count}" required disabled onclick="removeOption_teaching()">
                                                                        <option class="select-fnz" value="${row.EYea}">${row.EYea}</option>
                                                                                                        <?php
                                                                                                            foreach ($loopDate as $row => $value) {
                                                                                                        ?>
                                                                                                            <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                                                        <?php
                                                                                                            }
                                                                                                        ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ภาคเรียนที่<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="ETerm${count}" name="ETerm" value="${row.ETerm}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ระดับชั้นที่สอน<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="LevClss" id="LevClss${count}" required disabled onclick="removeOption_teaching()">
                                                                    <option class="select-fnz" value="${row.Lev}.${row.Clss}">${row.Lev}.${row.Clss} </option>
                                                                    <option value="อ.1" class="select-fnz">อ.1</option>
                                                                    <option value="อ.2" class="select-fnz">อ.2</option>
                                                                    <option value="อ.2" class="select-fnz">อ.3</option>
                                                                    <option value="ป.1" class="select-fnz">ป.1</option>
                                                                    <option value="ป.2" class="select-fnz">ป.2</option>
                                                                    <option value="ป.3" class="select-fnz">ป.3</option>
                                                                    <option value="ป.4" class="select-fnz">ป.4</option>
                                                                    <option value="ป.5" class="select-fnz">ป.5</option>
                                                                    <option value="ป.6" class="select-fnz">ป.6</option>
                                                                    <option value="ม.1" class="select-fnz">ม.1</option>
                                                                    <option value="ม.2" class="select-fnz">ม.2</option>
                                                                    <option value="ม.3" class="select-fnz">ม.3</option>
                                                                    <option value="ม.4" class="select-fnz">ม.4</option>
                                                                    <option value="ม.5" class="select-fnz">ม.5</option>
                                                                    <option value="ม.6" class="select-fnz">ม.6</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ห้อง<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="Room" id="Room${count}" required disabled onclick="removeOption_teaching()">
                                                                    <option class="select-fnz" value="${row.Room}">${row.Room}</option>
                                                                                                                <?php
                                                                                                                        foreach ($loopRoom as $rows => $value) {
                                                                                                                    ?>
                                                                                                                        <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                                                                    <?php
                                                                                                                        }
                                                                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">วิชาที่สอนเพิ่มเติม</label>
                                                                <input type="text" class="form-control" id="GLearn_more${count}" name="GLearn_more" value="${row.GLearn_more}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">กลุ่มสาระการเรียนรู้<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="GLearn_Edit" id="GLearn_Edit${count}" required disabled onclick="removeOption_teaching()" onchange="SubjectCode_Edit(${count})" >
                                                                    <option class="select-fnz" value="${row.GLearn}">${row.GLearn}</option>
                                                                                                        <?php 
                                                                                                        foreach ($get_GroupName as $row) {
                                                                                                        ?>
                                                                                                            <option class="select-fnz" value="<?= $row->GroupName ?>"><?= $row->GroupName ?></option>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                </select>
                                                                <select class="form-select" name="SubjCode_Edit" id="SubjCode_Edit${count}" hidden>
                                                                    <option class="select-fnz" value="${row.SubjCode}">${row.SubjCode}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">วิชาที่สอน<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="Titles_Edit" id="Titles_Edit${count}"  required disabled onchange="SubjectCodeHidden_Edit(${count})">
                                                                    <option class="select-fnz" value="${row.Titles}">${row.Titles}</option>
                                                                                                        
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ชั่วโมงสอน/สัปดาห์<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="HourPerWeek${count}" name="HourPerWeek" value="${row.HourPerWeek}" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สอนตรงตามวิชาเอก</label>
                                                                <select class="form-select" name="TeaMajor" id="TeaMajor${count}" disabled onclick="removeOption_teaching()"> 
                                                                    <option class="select-fnz" value="${row.TeaMajor}">${row.TeaMajor === 'Y' ? 'สอนตรง' : row.TeaMajor === 'N' ? 'สอนไม่ตรง' : ''}</option>
                                                                    <option value="Y" class="select-fnz">สอนตรง</option>
                                                                    <option value="N" class="select-fnz">สอนไม่ตรง</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">สอนตรงตามความถนัด</label>
                                                                <select class="form-select" name="TeaBold" id="TeaBold${count}" disabled onclick="removeOption_teaching()">
                                                                    <option class="select-fnz" value="${row.TeaBold}">${row.TeaBold === 'Y' ? 'สอนถนัด' : row.TeaBold === 'N' ? 'สอนไม่ถนัด' : ''}</option>
                                                                    <option value="Y" class="select-fnz">สอนถนัด</option>
                                                                    <option value="N" class="select-fnz">สอนไม่ถนัด</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">วิชาที่ต้องการเข้ารับการพัฒนา</label>
                                                                <select class="form-select" name="DevelopSub" id="DevelopSub${count}" disabled onclick="removeOption_teaching()">
                                                                    <option class="select-fnz" value="${row.DevelopSub}">${row.DevelopSub === 'Y' ? 'ใช่' : row.DevelopSub === 'N' ? 'ไม่ใช่' : ''}</option>
                                                                    <option value="Y" class="select-fnz">ใช่</option>
                                                                    <option value="N" class="select-fnz">ไม่ใช่</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">

                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="col">
                                                                <h6 class="fw-bold ">หมายเหตุ<span style="color: red;"> (*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12 ">
                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_teaching" onclick="toggleEdit_Teaching(this)">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateTeaching('${row.IDCard}', '${row.Id}', ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" 
                            onclick="FrmDeleteTeaching('${row.IDCard}', '${row.EYea}', '${row.ETerm}', '${row.Lev}', '${row.Clss}', '${row.Room}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Teaching(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

$('#InsertTeaching').submit(function(e) {
    e.preventDefault();
    InsertTeaching();
});

function InsertTeaching() {
    let IDCard = $('#IDCard').val();
    let EYea = $('#EYea').val();
    let ETerm = $('#ETerm').val();
    let LevClss = $('#LevClss').val();
    let Room = $('#Room').val();
    let GLearn_more = $('#GLearn_more').val();
    let GLearn = $('#GLearn').val();
    let SubjCode = $('#SubjCode').val();
    let Titles = $('#Titles').val();
    let HourPerWeek = $('#HourPerWeek').val();
    let TeaMajor = $('#TeaMajor').val();
    let TeaBold = $('#TeaBold').val();
    let DevelopSub = $('#DevelopSub').val();
    let Id = $('#Id_Teaching').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('EYea', EYea);
    formData.append('ETerm', ETerm);
    formData.append('LevClss', LevClss);
    formData.append('Room', Room);
    formData.append('GLearn_more', GLearn_more);
    formData.append('GLearn', GLearn);
    formData.append('SubjCode', SubjCode);
    formData.append('Titles', Titles);
    formData.append('HourPerWeek', HourPerWeek);
    formData.append('TeaMajor', TeaMajor);
    formData.append('TeaBold', TeaBold);
    formData.append('DevelopSub', DevelopSub);
    formData.append('Id', Id);

    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/insert_PersonnelTeaching') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function UpdateTeaching(IDCard, Id, modalCount) {
    let EYea = $(`#EYea${modalCount}`).val();
    let ETerm = $(`#ETerm${modalCount}`).val();
    let LevClss = $(`#LevClss${modalCount}`).val();
    let Room = $(`#Room${modalCount}`).val();
    let GLearn_more = $(`#GLearn_more${modalCount}`).val();
    let GLearn = $(`#GLearn_Edit${modalCount}`).val();
    let SubjCode = $(`#SubjCode_Edit${modalCount}`).val();
    let Titles = $(`#Titles_Edit${modalCount}`).val();
    let HourPerWeek = $(`#HourPerWeek${modalCount}`).val();
    let TeaMajor = $(`#TeaMajor${modalCount}`).val();
    let TeaBold = $(`#TeaBold${modalCount}`).val();
    let DevelopSub = $(`#DevelopSub${modalCount}`).val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('EYea', EYea);
    formData.append('ETerm', ETerm);
    formData.append('LevClss', LevClss);
    formData.append('Room', Room);
    formData.append('GLearn_more', GLearn_more);
    formData.append('GLearn', GLearn);
    formData.append('SubjCode', SubjCode);
    formData.append('Titles', Titles);
    formData.append('HourPerWeek', HourPerWeek);
    formData.append('TeaMajor', TeaMajor);
    formData.append('TeaBold', TeaBold);
    formData.append('DevelopSub', DevelopSub);
    formData.append('Id', Id);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelTeaching') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {console.log(response)
            if (response == 'Success') {
                $(`#editModalPosition${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteTeaching(IDCard, EYea, ETerm, Lev, Clss, Room) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
        confirmButton: 'btn-confirm',
        cancelButton: 'btn-cancel' 
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelTeaching') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    EYea: EYea,
                    ETerm: ETerm,
                    Lev: Lev,
                    Clss: Clss,
                    Room: Room
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$('#GLearn').change(SubjectCode);

function SubjectCode() {
    let selecteddepartment = $('#GLearn option:selected');
    let GLearn = selecteddepartment.text();

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_SubjectCode') ?>",
        method: "POST",
        data: {
            GLearn: GLearn
        },
        success: function(data) {
            $('#Titles').html(data);
        }
    });
}

$('#Titles').change(SubjectCodeHidden);

function SubjectCodeHidden() {
    
    let Titles = $('#Titles').val();

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_SubjectCodeHidden') ?>",
        method: "POST",
        data: {
            Titles: Titles
        },
        success: function(data) {
            $('#SubjCode').html(data);
        }
    });
}

function SubjectCode_Edit(modalCount) {
    let count = modalCount;
    let selecteddepartment = $(`#GLearn_Edit${modalCount} option:selected`);
    let GLearn_Edit = selecteddepartment.text();

    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/fetch_SubjectCode_Edit') ?>",
        method: "POST",
        data: { 
            GLearn_Edit: GLearn_Edit
        },
        success: function(data) { 
            $(`#Titles_Edit${count}`).html(data);
        }
    });
}

function SubjectCodeHidden_Edit(modalCount) {
    let count = modalCount;
    let Titles_Edit = $(`#Titles_Edit${modalCount}`).val();

    $.ajax({
        url: "<?= site_url('PersonnelInformation/fetch_SubjectCodeHidden_Edit') ?>",
        method: "POST",
        data: {
            Titles_Edit: Titles_Edit
        },
        success: function(data) {
            $(`#SubjCode_Edit${count}`).html(data);
        }
    });
}

$(document).on("click", "#edit_teaching", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#EYea" + count).prop("disabled", false);
    $("#ETerm" + count).prop("readonly", false);
    $("#LevClss" + count).prop("disabled", false);
    $("#Room" + count).prop("disabled", false);
    $("#GLearn_more" + count).prop("readonly", false);
    $("#GLearn_Edit" + count).prop("disabled", false);
    $("#Titles_Edit" + count).prop("disabled", false);
    $("#HourPerWeek" + count).prop("readonly", false);
    $("#TeaMajor" + count).prop("disabled", false);
    $("#TeaBold" + count).prop("disabled", false);
    $("#DevelopSub" + count).prop("disabled", false);
    SubjectCode_Edit(count);
});

function removeOption_teaching(modalCount){
    $("select[name='EYea'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='LevClss'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='Room'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='GLearn_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='TeaMajor'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='TeaBold'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='DevelopSub'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>

<!-- ***************************************** Javascript License ***************************************** -->
<script>

$('#InsertLicense').submit(function(e) {
    e.preventDefault();
    InsertLicense();
});

function InsertLicense() {
    let IDCard = $('#IDCard').val();
    let LPNo = $('#LPNo').val();
    let LPName = $('#LPName').val();
    let LPWorkPermit = $('#LPWorkPermit').val();
    let LPLeave = $('#LPLeave').val();
    let LPLeaveDate = $('#LPLeaveDate').val();
    let LPExpireDate = $('#LPExpireDate').val();
    let LPToPermit = $('#LPToPermit').val();
    let LPRevocation = $('#LPRevocation').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('LPNo', LPNo);
    formData.append('LPName', LPName);
    formData.append('LPWorkPermit', LPWorkPermit);
    formData.append('LPLeave', LPLeave);
    formData.append('LPLeaveDate', LPLeaveDate);
    formData.append('LPExpireDate', LPExpireDate);
    formData.append('LPToPermit', LPToPermit);
    formData.append('LPRevocation', LPRevocation);

    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/insert_PersonnelLicense') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

$(document).ready(function() {
    getPersonnelLicense();
});

function getPersonnelLicense() {
    let table_body = $('#tbl_PersonnelLicense tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelLicense') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="8" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td>${row.LPWorkPermit}</td>
                            <td>${row.LPName}</td>
                            <td>${row.LPLeave}</td>
                            <td>${new Date(row.LPLeaveDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${new Date(row.LPExpireDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.LPToPermit === 'Y' ? 'ต่อแล้ว' : row.LPToPermit === 'N' ? 'ยังไม่ได้ต่อ' : ''}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalLicense${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalLicense${count}" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">ข้อมูลใบอนุญาตประกอบวิชาชีพ</h5>
                                                        </div>
                                                    </div>
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="row mt-3">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">เลขที่สมาชิก (เลขบัตรประชาชน)<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="LPNo${count}" name="LPNo" value="${row.LPNo}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">ชื่อใบประกอบวิชาชีพ<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="LPName" id="LPName${count}" required disabled onclick="removeOption_license()">
                                                                    <option class="select-fnz" value="${row.LPName}">${row.LPName}</option>
                                                                    <option value="ใบประกอบวิชาชีพครู" class="select-fnz">ใบประกอบวิชาชีพครู</option>
                                                                    <option value="ผู้บริหารสถานศึกษา" class="select-fnz">ผู้บริหารสถานศึกษา</option>
                                                                    <option value="ผู้บริหารการศึกษา" class="select-fnz">ผู้บริหารการศึกษา</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">เลขที่ใบอนุญาตทำงาน<span style="color: red;"> *</span></label>
                                                                <input type="text" class="form-control" id="LPWorkPermit${count}" name="LPWorkPermit" value="${row.LPWorkPermit}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">หน่วยงานที่ออกให้</label>
                                                                <input type="text" class="form-control" id="LPLeave${count}" name="LPLeave" value="${row.LPLeave}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">วันที่ออก<span style="color: red;"> *</span></label>
                                                                <input type="date" class="form-control" id="LPLeaveDate${count}" name="LPLeaveDate" value="${row.LPLeaveDate}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">วันหมดอายุ<span style="color: red;"> *</span></label>
                                                                <input type="date" class="form-control" id="LPExpireDate${count}" name="LPExpireDate" value="${row.LPExpireDate}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">การต่อใบอนุญาต<span style="color: red;"> *</span></label>
                                                                <select class="form-select" name="LPToPermit" id="LPToPermit${count}" required disabled onclick="removeOption_license()">
                                                                    <option class="select-fnz" value="${row.LPToPermit}">${row.LPToPermit === 'Y' ? 'ต่อแล้ว' : row.LPToPermit === 'N' ? 'ยังไม่ได้ต่อ' : ''}</option>
                                                                    <option value="Y" class="select-fnz">ต่อเเล้ว</option>
                                                                    <option value="N" class="select-fnz">ยังไม่ได้ต่อ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold">การเพิกถอนใบอนุญาต</label>
                                                                <input type="text" class="form-control" id="LPRevocation${count}" name="LPRevocation" value="${row.LPRevocation}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3">
                                                            <h6 class="fw-bold ">หมายเหตุ<span style="color: red;"> (*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12 ">
                                                        <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_license" onclick="toggleEdit_License(this)">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateLicense('${row.IDCard}', '${row.LPWorkPermit}', ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteLicense('${row.IDCard}', '${row.LPWorkPermit}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_License(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

function UpdateLicense(IDCard, LPWorkPermit, modalCount) {
    let LPNo = $(`#LPNo${modalCount}`).val();
    let LPName = $(`#LPName${modalCount}`).val();
    let LPLeave = $(`#LPLeave${modalCount}`).val();
    let LPLeaveDate = $(`#LPLeaveDate${modalCount}`).val();
    let LPExpireDate = $(`#LPExpireDate${modalCount}`).val();
    let LPToPermit = $(`#LPToPermit${modalCount}`).val();
    let LPRevocation = $(`#LPRevocation${modalCount}`).val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('LPNo', LPNo);
    formData.append('LPName', LPName);
    formData.append('LPWorkPermit', LPWorkPermit);
    formData.append('LPLeave', LPLeave);
    formData.append('LPLeaveDate', LPLeaveDate);
    formData.append('LPExpireDate', LPExpireDate);
    formData.append('LPToPermit', LPToPermit);
    formData.append('LPRevocation', LPRevocation);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelLicense') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                $(`#editModalLicense${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteLicense(IDCard, LPWorkPermit) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
        confirmButton: 'btn-confirm',
        cancelButton: 'btn-cancel' 
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelLicense') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    LPWorkPermit: LPWorkPermit
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).on("click", "#edit_license", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#LPName" + count).prop("disabled", false);
    $("#LPLeave" + count).prop("readonly", false);
    $("#LPLeaveDate" + count).prop("readonly", false);
    $("#LPExpireDate" + count).prop("readonly", false);
    $("#LPToPermit" + count).prop("disabled", false);
    $("#LPRevocation" + count).prop("readonly", false);
});

function removeOption_license(modalCount){
    $("select[name='LPName'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='LPToPermit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>

<!-- ***************************************** Javascript Leave ***************************************** -->
<script>
$(document).ready(function() {
    getPersonnelLeave();
});

function getPersonnelLeave() {
    let table_body = $('#tbl_PersonnelLeave tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelLeave') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="11" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td>${row.EYa}</td>
                            <td>${row.VLate}</td>
                            <td>${row.Vsick}</td>
                            <td>${row.Vkit}</td>
                            <td>${row.VAbsence}</td>
                            <td>${row.VServ}</td>
                            <td>${row.VRelax}</td>
                            <td>${row.VSpawn}</td>
                            <td>${row.VOrdinate}</td>
                            <td>${row.VStudy}</td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteLeave('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

$('#InsertLeave').submit(function(e) {
    e.preventDefault();
    InsertLeave();
});

function InsertLeave() {
    let IDCard = $('#IDCard').val();
    let EYa = $('#EYa').val();
    let VLate = $('#VLate').val();
    let Vsick = $('#Vsick').val();
    let Vkit = $('#Vkit').val();
    let VAbsence = $('#VAbsence').val();
    let VServ = $('#VServ').val();
    let VRelax = $('#VRelax').val();
    let VSpawn = $('#VSpawn').val();
    let VOrdinate = $('#VOrdinate').val();
    let VStudy = $('#VStudy').val();
    let P_at = $('#P_at_Leave').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('EYa', EYa);
    formData.append('VLate', VLate);
    formData.append('Vsick', Vsick);
    formData.append('Vkit', Vkit);
    formData.append('VAbsence', VAbsence);
    formData.append('VServ', VServ);
    formData.append('VRelax', VRelax);
    formData.append('VSpawn', VSpawn);
    formData.append('VOrdinate', VOrdinate);
    formData.append('VStudy', VStudy);
    formData.append('P_at', P_at);

    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/insert_PersonnelLeave') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteLeave(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
        confirmButton: 'btn-confirm',
        cancelButton: 'btn-cancel'
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelLeave') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).ready(function() {
    getPersonnelRename();
});

function getPersonnelRename() {
    let table_body = $('#tbl_PersonnelRename tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelRename') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="5" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr> 
                            <td>${row.CPName}</td>
                            <td>${row.CFName}</td>
                            <td>${row.CLName}</td>
                            <td>${new Date(row.CDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteRename('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

$('#InsertRename').submit(function(e) {
    e.preventDefault();
    InsertRename();
});

function InsertRename() {
    let IDCard = $('#IDCard').val();
    let CPName = $('#CPName').val();
    let CFName = $('#CFName').val();
    let CLName = $('#CLName').val();
    let CDate = $('#CDate').val();
    let P_at = $('#P_at_Rename').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('CPName', CPName);
    formData.append('CFName', CFName);
    formData.append('CLName', CLName);
    formData.append('CDate', CDate);
    formData.append('P_at', P_at);

    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/insert_PersonnelRename') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteRename(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
        confirmButton: 'btn-confirm',
        cancelButton: 'btn-cancel'
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelRename') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}
</script>

<!-- ***************************************** Javascript Insignia ***************************************** -->
<script>
$(document).ready(function() {
    getPersonnelInsignia();
});

function getPersonnelInsignia() {
    let table_body = $('#tbl_PersonnelInsignia tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('PersonnelInformation/get_PersonnelInsignia') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="9" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `
                        <tr"> 
                            <td>${row.RRDare}</td>
                            <td>${row.RLevel}</td>
                            <td>${row.RPo}</td>
                            <td>${row.RGVol}</td>
                            <td>${row.RGPart}</td>
                            <td>${row.RGPage}</td>
                            <td>${row.RGNo}</td>
                            <td>${new Date(row.RDate).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td><button type="button" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#editModalInsignia${count}">ดูข้อมูล</button>
                                <div class="modal fade" id="editModalInsignia${count}" aria-labelledby="myModalLabel6" aria-hidden="true">
                                    <div class="modal-dialog modal-lg ">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">ข้อมูลประวัติการรับเครื่องราชอิสริยาภรณ์</h5>
                                                    </div>
                                                </div>
                                                <div id="modal-setting-7" class="tabcontent">
                                                    <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-1 fw-bold" style="color: black;font-size: 25px;">ปีที่ได้รับ
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <select class="form-select" name="RRDare" id="RRDare${count}" required disabled onclick="removeOption_insignia()">
                                                                            <option class="select-fnz" value="${row.RRDare}">${row.RRDare}</option>
                                                                                        <?php
                                                                                            foreach ($loopDate as $row => $value) {
                                                                                        ?>
                                                                                            <option value="<?php print_r($value) ?>" class="select-fnz"><?php print_r($value) ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                        </select>          
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-1 fw-bold" style="color: black;font-size: 25px;">หน่วยงาน</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RDepart${count}" name="RDepart" value="${row.RDepart}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">ชั้นเครื่องราช
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RLevel${count}" name="RLevel" value="${row.RLevel}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">ตำแหน่ง
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RPo${count}" name="RPo" value="${row.RPo}" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">    
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3 fw-bold" style="color: black;font-size: 25px;">ราชกิจเล่มที่</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RGVol${count}" name="RGVol" value="${row.RGVol}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">ราชกิจตอนที่</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RGPart${count}" name="RGPart" value="${row.RGPart}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">ราชกิจหน้าที่</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RGPage${count}" name="RGPage" value="${row.RGPage}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">ราชกิจเลขที่</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" id="RGNo${count}" name="RGNo" value="${row.RGNo}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">วันที่ได้รับ
                                                                    <span style="color: red;"> *</span></label>
                                                                    <div class="col">
                                                                        <input type="date" class="form-control" id="RDate${count}" name="RDate" value="${row.RDate}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputUsername2" class="col mt-3  fw-bold" style="color: black;font-size: 25px;">วันที่ประกาศ</label>
                                                                    <div class="col">
                                                                        <input type="date" class="form-control" id="RDate2${count}" name="RDate2" value="${row.RDate2}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                        <?php
                                                                            foreach ($getP_at_Insignia as $row) {
                                                                                if (isset($row->P_at_max)) {
                                                                                    $P_at = $row->P_at_max + 1;
                                                                                } else {
                                                                                    $P_at = 1; 
                                                                                }
                                                                        ?>
                                                                            <input type="text" class="form-control" id="P_at_Insignia" name="P_at_Insignia" value="<?= $P_at ?>" style="display:none;">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <h6 class="fw-bold ">หมายเหตุ <span style="color: red;">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12 ">
                                                            <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit_insignia" onclick="toggleEdit_Insignia(this)">แก้ไข</button>
                                                <button type="submit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateInsignia('${row.IDCard}', '${row.P_at}', ${count})">บันทึก</button>
                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-danger fw-bold fs-4" onclick="FrmDeleteInsignia('${row.IDCard}', '${row.P_at}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
        }
    });
}

function toggleEdit_Insignia(button) {
    let editButton = button;
    let saveButton = button.nextElementSibling;

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

$('#InsertInsignia').submit(function(e) {
    e.preventDefault();
    InsertInsignia();
});

function InsertInsignia() {
    let IDCard = $('#IDCard').val();
    let RRDare = $('#RRDare').val();
    let RLevel = $('#RLevel').val();
    let RPo = $('#RPo').val();
    let RGVol = $('#RGVol').val();
    let RGPart = $('#RGPart').val();
    let RGPage = $('#RGPage').val();
    let RGNo = $('#RGNo').val();
    let RDate = $('#RDate').val();
    let RDate2 = $('#RDate2').val();
    let RDepart = $('#RDepart').val();
    let P_at = $('#P_at_Insignia').val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('RRDare', RRDare);
    formData.append('RLevel', RLevel);
    formData.append('RPo', RPo);
    formData.append('RGVol', RGVol);
    formData.append('RGPart', RGPart);
    formData.append('RGPage', RGPage);
    formData.append('RGNo', RGNo);
    formData.append('RDate', RDate);
    formData.append('RDate2', RDate2);
    formData.append('RDepart', RDepart);
    formData.append('P_at', P_at);

    $.ajax({ 
        url: "<?= site_url('PersonnelInformation/insert_PersonnelInsignia') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(dataResult) {
            if (dataResult == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function UpdateInsignia(IDCard, P_at, modalCount) {
    let RRDare = $(`#RRDare${modalCount}`).val();
    let RLevel = $(`#RLevel${modalCount}`).val();
    let RPo = $(`#RPo${modalCount}`).val();
    let RGVol = $(`#RGVol${modalCount}`).val();
    let RGPart = $(`#RGPart${modalCount}`).val();
    let RGPage = $(`#RGPage${modalCount}`).val();
    let RGNo = $(`#RGNo${modalCount}`).val();
    let RDate = $(`#RDate${modalCount}`).val();
    let RDate2 = $(`#RDate2${modalCount}`).val();
    let RDepart = $(`#RDepart${modalCount}`).val();

    let formData = new FormData();
    formData.append('IDCard', IDCard);
    formData.append('RRDare', RRDare);
    formData.append('RLevel', RLevel);
    formData.append('RPo', RPo);
    formData.append('RGVol', RGVol);
    formData.append('RGPart', RGPart);
    formData.append('RGPage', RGPage);
    formData.append('RGNo', RGNo);
    formData.append('RDate', RDate);
    formData.append('RDate2', RDate2);
    formData.append('RDepart', RDepart);
    formData.append('P_at', P_at);

    $.ajax({
        url: "<?= site_url('PersonnelInformation/update_PersonnelInsignia') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                console.log(response);
                $(`#editModalInsignia${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อมูลได้',
                    type: "error"
                });
            }
        }
    });
}

function FrmDeleteInsignia(IDCard, P_at) {
    swal.fire({
        title: 'ท่านต้องการลบรายการที่เลือกหรือไม่ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: '<span class="fs-5 fw-bold"> ตกลง </span>',
        cancelButtonText: '<span class="fs-5 fw-bold"> ยกเลิก </span>',
        customClass: {
        confirmButton: 'btn-confirm',
        cancelButton: 'btn-cancel'
        }
    }).then((result) => { 
        if (result.value) {
            $.ajax({
                url: "<?= site_url('PersonnelInformation/delete_PersonnelInsignia') ?>",
                type: 'POST',
                data: {
                    IDCard: IDCard,
                    P_at: P_at
                },
                success: function(dataResult) {
                    if (dataResult == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลขข้อมูลสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อมูลได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

$(document).on("click", "#edit_insignia", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#RRDare" + count).prop("disabled", false);
    $("#RLevel" + count).prop("readonly", false);
    $("#RPo" + count).prop("readonly", false);
    $("#RGVol" + count).prop("readonly", false);
    $("#RGPart" + count).prop("readonly", false);
    $("#RGPage" + count).prop("readonly", false);
    $("#RGNo" + count).prop("readonly", false);
    $("#RDate" + count).prop("readonly", false);
    $("#RDate2" + count).prop("readonly", false);
    $("#RDepart" + count).prop("readonly", false);
});

function removeOption_insignia(modalCount){
    $("select[name='RRDare'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>

