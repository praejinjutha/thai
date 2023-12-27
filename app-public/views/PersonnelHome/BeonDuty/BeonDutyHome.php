<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('PersonnelHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">การจัดเวรปฏิบัติหน้าที่</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card m-3 mt-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="link-1" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col mt-3">
                                                            <h3 class="fw-bold text-center">
                                                                ตารางเวรปฏิบัติหน้าที่ประจำปีการศึกษา <span id="ShowYear"></span>
                                                            </h3>
                                                            <form method="post" action="<?= site_url('BeonDuty/exportExcel') ?>">
                                                                <div class="row mt-4">
                                                                    <div class="col-md-2 d-flex align-items-center">
                                                                        <h4 class="fw-bold text-center"
                                                                            style="font-size: 26px; width: 200px">
                                                                            ปีการศึกษา</h4>
                                                                        <select class="form-select" id="Year" name="Year" style="display: inline;">
                                                                            <?php
                                                                                foreach ($loopYear as $row => $Year) {
                                                                            ?>
                                                                            <option value="<?= $Year ?>" class="select-fnz">
                                                                                <?= $Year ?></option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 d-flex align-items-center">
                                                                        <h4 class="fw-bold text-center" style="font-size: 26px; width: 200px">
                                                                            ภาคเรียน
                                                                        </h4>
                                                                        <select class="form-select" id="Terms" name="Terms"  style="display: inline;">
                                                                            <option value="1" class="select-fnz">1</option>
                                                                            <option value="2" class="select-fnz">2</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-8">
                                                                        <div class="float-end mt-2">
                                                                            <button type="submit" class="btn btn-primary fw-bold fs-4">ส่งออก</button>
                                                            </form>
                                                                            <a href="#" class="btn btn-success fw-bold fs-4"
                                                                                style="width: 210px" data-bs-toggle="modal"
                                                                                data-bs-target="#myModal">ตั้งค่าพื้นที่รับผิดชอบ</a>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="myModal">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                    <form action="" method="POST" id="InsertPerformanceAppraisal" role="form">
                                                                                        <div class="modal-body">
                                                                                            <div class="tab">
                                                                                                <h5 class="card-title fw-bold"
                                                                                                    style="color: #18409e;font-size: 32px;">
                                                                                                    ตั้งค่าพื้นที่รับผิดชอบ
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div id="modal-setting-7"
                                                                                                class="tabcontent">
                                                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                                                <div class="container">
                                                                                                    <?php
                                                                                                        $id = isset($this->data['AllPositions']['id'][0]) ? $this->data['AllPositions']['id'][0] : NULL;
                                                                                                    ?>
                                                                                                    <input type="text" class="form-control" id="id" name="id" value="<?= $id !== NULL ? $id : '' ?>" hidden>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                1</label>
                                                                                                                <?php
                                                                                                                    $position1 = isset($this->data['AllPositions']['position'][0]) ? $this->data['AllPositions']['position'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position" name="position" value="<?= $position1 !== NULL ? $position1 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                2</label>
                                                                                                                <?php
                                                                                                                    $position2 = isset($this->data['AllPositions']['position2'][0]) ? $this->data['AllPositions']['position2'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position2" name="position2" value="<?= $position2 !== NULL ? $position2 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                3</label>
                                                                                                                <?php
                                                                                                                    $position3 = isset($this->data['AllPositions']['position3'][0]) ? $this->data['AllPositions']['position3'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position3" name="position3" value="<?= $position3 !== NULL ? $position3 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                4</label>
                                                                                                                <?php
                                                                                                                    $position4 = isset($this->data['AllPositions']['position4'][0]) ? $this->data['AllPositions']['position4'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position4" name="position4" value="<?= $position4 !== NULL ? $position4 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                5</label>
                                                                                                                <?php
                                                                                                                    $position5 = isset($this->data['AllPositions']['position5'][0]) ? $this->data['AllPositions']['position5'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position5" name="position5" value="<?= $position5 !== NULL ? $position5 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                6</label>
                                                                                                                <?php
                                                                                                                    $position6 = isset($this->data['AllPositions']['position6'][0]) ? $this->data['AllPositions']['position6'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position6" name="position6" value="<?= $position6 !== NULL ? $position6 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                7</label>
                                                                                                                <?php
                                                                                                                    $position7 = isset($this->data['AllPositions']['position7'][0]) ? $this->data['AllPositions']['position7'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position7" name="position7" value="<?= $position7 !== NULL ? $position7 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold mt-2"
                                                                                                                style="color: black;font-size: 25px;">พื้นที่รับผิดชอบจุดที่
                                                                                                                8</label>
                                                                                                                <?php
                                                                                                                    $position8 = isset($this->data['AllPositions']['position8'][0]) ? $this->data['AllPositions']['position8'][0] : NULL;
                                                                                                                ?>
                                                                                                            <input type="text" class="form-control" id="position8" name="position8" value="<?= $position8 !== NULL ? $position8 : '' ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer mt-3">
                                                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Modal -->

                                                                            <a href="#" class="btn btn-success fw-bold fs-4"
                                                                                style="width: 220px" data-bs-toggle="modal"
                                                                                data-bs-target="#myModal2">กำหนดการจัดเวร</a>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="myModal2">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                    <form action="" method="POST" id="InsertDutySchedule" role="form">
                                                                                        <div class="modal-body">
                                                                                            <div class="tab">
                                                                                                <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> จัดเวรประจำวัน </h5>
                                                                                            </div>
                                                                                            <div id="modal-setting-7" class="tabcontent">
                                                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                                                <div class="container">
                                                                                                    <div class="row ">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold"
                                                                                                                style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                                                <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="Acyear" name="Acyear" required>
                                                                                                                <option class="select-fnz" value=""> </option>
                                                                                                                <?php
                                                                                                                    foreach ($loopYear as $row => $Year) {
                                                                                                                ?>
                                                                                                                <option value="<?= $Year ?>" class="select-fnz">
                                                                                                                    <?= $Year ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold"
                                                                                                                style="font-size: 25px;">ภาคเรียน</label>
                                                                                                                <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="Term" name="Term" required>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <option value="1" class="select-fnz"> 1 </option>
                                                                                                                <option value="2" class="select-fnz"> 2 </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col fw-bold" style="font-size: 25px;">ประจำวัน</label>
                                                                                                            <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="Day" name="Day" required>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <option value="จันทร์" class="select-fnz"> จันทร์ </option>
                                                                                                                <option value="อังคาร" class="select-fnz"> อังคาร </option>
                                                                                                                <option value="พุธ" class="select-fnz"> พุธ </option>
                                                                                                                <option value="พฤหัสบดี" class="select-fnz"> พฤหัสบดี </option>
                                                                                                                <option value="ศุกร์" class="select-fnz"> ศุกร์ </option>
                                                                                                                <option value="เสาร์" class="select-fnz"> เสาร์ </option>
                                                                                                                <option value="อาทิตย์" class="select-fnz"> อาทิตย์ </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">ช่วงเวลา</label>
                                                                                                            <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="Time" name="Time" required>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <option value="เช้า" class="select-fnz"> เช้า </option>
                                                                                                                <option value="กลางวัน" class="select-fnz"> กลางวัน </option>
                                                                                                                <option value="เย็น" class="select-fnz"> เย็น </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position'][0] ?></label>
                                                                                                            <select class="form-select"  id="Pos1" name="Pos1">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position2'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos2" name="Pos2"> 
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position3'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos3" name="Pos3">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position4'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos4" name="Pos4">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position5'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos5" name="Pos5">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position6'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos6" name="Pos6">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position7'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos7" name="Pos7">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position8'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos8" name="Pos8">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">เวลากลางคืน (ครูเวร)</label>
                                                                                                            <select class="form-select" id="Pos9" name="Pos9">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">เวลากลางคืน (นักการ)</label>
                                                                                                            <select class="form-select" id="Pos10" name="Pos10">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">ผู้ตรวจเวร</label>
                                                                                                            <select class="form-select" id="Inspector" name="Inspector">
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <label class="fw-bold mt-2">หมายเหตุ <span class="text-danger fw-bold">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer mt-3">
                                                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Modal -->

                                                                            <a href="#" class="btn btn-warning fw-bold fs-4"
                                                                                style="width: 200px" data-bs-toggle="modal"
                                                                                data-bs-target="#myModal3">แก้ไขตารางเวร</a>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="myModal3">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                    <form action="" method="POST" id="UpdateDutySchedule" role="form">
                                                                                        <div class="modal-body">
                                                                                            <div class="tab">
                                                                                                <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;"> แก้ไขตารางเวร </h5>
                                                                                            </div>
                                                                                            <div id="modal-setting-7" class="tabcontent">
                                                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                                                <div class="container">
                                                                                                    <div class="row ">
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold"
                                                                                                                style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                                                <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="AcyearEdit" name="AcyearEdit" required>
                                                                                                                <option class="select-fnz" value=""> </option>
                                                                                                                <?php
                                                                                                                    foreach ($loopYear as $row => $Year) {
                                                                                                                ?>
                                                                                                                <option value="<?= $Year ?>" class="select-fnz">
                                                                                                                    <?= $Year ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label
                                                                                                                for="exampleInputUsername2"
                                                                                                                class="col  fw-bold"
                                                                                                                style="font-size: 25px;">ภาคเรียน</label>
                                                                                                                <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="TermEdit" name="TermEdit" required>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <option value="1" class="select-fnz"> 1 </option>
                                                                                                                <option value="2" class="select-fnz"> 2 </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col fw-bold" style="font-size: 25px;">ประจำวัน</label>
                                                                                                            <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="DayEdit" name="DayEdit" required>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <option value="จันทร์" class="select-fnz"> จันทร์ </option>
                                                                                                                <option value="อังคาร" class="select-fnz"> อังคาร </option>
                                                                                                                <option value="พุธ" class="select-fnz"> พุธ </option>
                                                                                                                <option value="พฤหัสบดี" class="select-fnz"> พฤหัสบดี </option>
                                                                                                                <option value="ศุกร์" class="select-fnz"> ศุกร์ </option>
                                                                                                                <option value="เสาร์" class="select-fnz"> เสาร์ </option>
                                                                                                                <option value="อาทิตย์" class="select-fnz"> อาทิตย์ </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">ช่วงเวลา</label>
                                                                                                            <span class="text-danger fw-bold"> *</span>
                                                                                                            <select class="form-select" id="TimeEdit" name="TimeEdit" required>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <option value="เช้า" class="select-fnz"> เช้า </option>
                                                                                                                <option value="กลางวัน" class="select-fnz"> กลางวัน </option>
                                                                                                                <option value="เย็น" class="select-fnz"> เย็น </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position'][0] ?></label>
                                                                                                            <select class="form-select"  id="Pos1Edit" name="Pos1Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position2'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos2Edit" name="Pos2Edit" disabled> 
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position3'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos3Edit" name="Pos3Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position4'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos4Edit" name="Pos4Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position5'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos5Edit" name="Pos5Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position6'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos6Edit" name="Pos6Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position7'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos7Edit" name="Pos7Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;"><?= $this->data['AllPositions']['position8'][0] ?></label>
                                                                                                            <select class="form-select" id="Pos8Edit" name="Pos8Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">เวลากลางคืน (ครูเวร)</label>
                                                                                                            <select class="form-select" id="Pos9Edit" name="Pos9Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">เวลากลางคืน (นักการ)</label>
                                                                                                            <select class="form-select" id="Pos10Edit" name="Pos10Edit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mt-2">
                                                                                                        <div class="col">
                                                                                                            <label for="exampleInputUsername2" class="col  fw-bold" style="font-size: 25px;">ผู้ตรวจเวร</label>
                                                                                                            <select class="form-select" id="InspectorEdit" name="InspectorEdit" disabled>
                                                                                                                <option class="select-fnz"> </option>
                                                                                                                <?php 
                                                                                                                    foreach ($FullName as $row) {
                                                                                                                ?>
                                                                                                                    <option class="select-fnz" value="<?= $row->FullName ?>"><?= $row->FullName ?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <label class="fw-bold mt-2">หมายเหตุ <span class="text-danger fw-bold">(*)</span> เป็นข้อมูลที่จำเป็นต้องกรอกทุกช่อง</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer mt-3">
                                                                                                <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit(this)">แก้ไข</button>
                                                                                                <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;">บันทึก</button>
                                                                                                <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Modal -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="row mt-4">
                                                                <div class="col">
                                                                    <table class="table table-striped table-bordered"
                                                                        style="border-color: #000;" id="tbl_BeonDuty">
                                                                        <thead>
                                                                            <tr style="background-color: #d3d8e6; text-align:center; vertical-align: middle;">
                                                                                <th width="150px">
                                                                                    <h3 class="fw-bold">พื้นที่รับผิดชอบ
                                                                                    </h3>
                                                                                </th>
                                                                                <th rowspan="2" width="100px">
                                                                                    <h3 class="fw-bold">ช่วงเวลา</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 1</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 2</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 3</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 4
                                                                                    </h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 5</h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 6
                                                                                    </h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 7
                                                                                    </h3>
                                                                                </th>
                                                                                <th style="background-color: #f2daae; width: 150px;">
                                                                                    <h3 class="fw-bold">
                                                                                        พื้นที่รับผิดชอบ<br>จุดที่ 8
                                                                                    </h3>
                                                                                </th>
                                                                                <th colspan="2">
                                                                                    <h3 class="fw-bold">เวรกลางคืน</h3>
                                                                                </th>
                                                                                <th rowspan="2" width="150px">
                                                                                    <h3 class="fw-bold">ผู้ตรวจเวร</h3>
                                                                                </th>
                                                                            </tr>
                                                                            <tr class="text-center">
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold">ประจำวัน</h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position2'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position3'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position4'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position5'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position6'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position7'][0] ?></h3>
                                                                                </th>
                                                                                <th style="background-color: #fff">
                                                                                    <h3 class="fw-bold"><?= $this->data['AllPositions']['position8'][0] ?></h3>
                                                                                </th>
                                                                                <th width="150px" style="background-color: #fff">
                                                                                    <h3 class="fw-bold">ครูเวร</h3>
                                                                                </th>
                                                                                <th width="150px" style="background-color: #fff">
                                                                                    <h3 class="fw-bold ">นักการ</h3>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody> 
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    get_BeonDuty();
});

$('#Year').change(get_BeonDuty);
$('#Terms').change(get_BeonDuty);

function get_BeonDuty() {
    let Year = $('#Year').val();
    let Term = $('#Terms').val();
    let table_body = $('#tbl_BeonDuty tbody');

    $.ajax({
        url: "<?= site_url('BeonDuty/fech_BeonDuty') ?>",
        method: "POST",
        data: {
            Year: Year,
            Term: Term
        },
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            let table_row = `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">จันทร์</td>
                                <td>เช้า</td>`;
            if (data.Monday_Morning && data.Monday_Morning.length > 0) {
                $.each(data.Monday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else { 
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Monday_Afternoon && data.Monday_Afternoon.length > 0) {
                $.each(data.Monday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Monday_Night && data.Monday_Night.length > 0) {
                $.each(data.Monday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">อังคาร</td>
                                <td>เช้า</td>`;
            if (data.Tuesday_Morning && data.Tuesday_Morning.length > 0) {
                $.each(data.Tuesday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Tuesday_Afternoon && data.Tuesday_Afternoon.length > 0) {
                $.each(data.Tuesday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Tuesday_Night && data.Tuesday_Night.length > 0) {
                $.each(data.Tuesday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">พุธ</td>
                                <td>เช้า</td>`;
            if (data.Wednesday_Morning && data.Wednesday_Morning.length > 0) {
                $.each(data.Wednesday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Wednesday_Afternoon && data.Wednesday_Afternoon.length > 0) {
                $.each(data.Wednesday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Wednesday_Night && data.Wednesday_Night.length > 0) {
                $.each(data.Wednesday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">พฤหัสบดี</td>
                                <td>เช้า</td>`;
            if (data.Thursday_Morning && data.Thursday_Morning.length > 0) {
                $.each(data.Thursday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Thursday_Afternoon && data.Thursday_Afternoon.length > 0) {
                $.each(data.Thursday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Thursday_Night && data.Thursday_Night.length > 0) {
                $.each(data.Thursday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">ศุกร์</td>
                                <td>เช้า</td>`;
            if (data.Friday_Morning && data.Friday_Morning.length > 0) {
                $.each(data.Friday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Friday_Afternoon && data.Friday_Afternoon.length > 0) {
                $.each(data.Friday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Friday_Night && data.Friday_Night.length > 0) {
                $.each(data.Friday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr><tr><td colspan="13"><h3 class="text-center fw-bold">เวรวันหยุด / นักขัตฤกษ์</h3></td></tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">เสาร์</td>
                                <td>เช้า</td>`;
            if (data.Saturday_Morning && data.Saturday_Morning.length > 0) {
                $.each(data.Saturday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Saturday_Afternoon && data.Saturday_Afternoon.length > 0) {
                $.each(data.Saturday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Saturday_Night && data.Saturday_Night.length > 0) {
                $.each(data.Saturday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td rowspan="3">อาทิตย์</td>
                                <td>เช้า</td>`;
            if (data.Sunday_Morning && data.Sunday_Morning.length > 0) {
                $.each(data.Sunday_Morning, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>กลางวัน</td>`;
            if (data.Sunday_Afternoon && data.Sunday_Afternoon.length > 0) {
                $.each(data.Sunday_Afternoon, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_row += `<tr style=" text-align:center; vertical-align: middle;">
                                <td>เย็น</td>`;
            if (data.Sunday_Night && data.Sunday_Night.length > 0) {
                $.each(data.Sunday_Night, function(index, row) {
                    table_row += `<td>${row.Position1 || ''}</td>
                                  <td>${row.Position2 || ''}</td>
                                  <td>${row.Position3 || ''}</td>
                                  <td>${row.Position4 || ''}</td>
                                  <td>${row.Position5 || ''}</td>
                                  <td>${row.Position6 || ''}</td>
                                  <td>${row.Position7 || ''}</td>
                                  <td>${row.Position8 || ''}</td>
                                  <td>${row.Position9 || ''}</td>
                                  <td>${row.Position10 || ''}</td>
                                  <td class="text-center">${row.Inspector || ''}</td>`;
                });
            } else {
                for (let i = 0; i < 11; i++) {
                    table_row += `<td></td>`;
                }
            }
            table_row += `</tr>`;
            table_body.append(table_row);
            $('#ShowYear').text(Year);
        }
    });
}


$('#InsertPerformanceAppraisal').submit(function(e) {
    e.preventDefault();
    InsertPerformanceAppraisal();
});

function InsertPerformanceAppraisal() {
    let id = $('#id').val();
    let position = $('#position').val();
    let position2 = $('#position2').val();
    let position3 = $('#position3').val();
    let position4 = $('#position4').val();
    let position5 = $('#position5').val();
    let position6 = $('#position6').val();
    let position7 = $('#position7').val();
    let position8 = $('#position8').val();

    let formData = new FormData();
    formData.append('id', id);
    formData.append('position', position);
    formData.append('position2', position2);
    formData.append('position3', position3);
    formData.append('position4', position4);
    formData.append('position5', position5);
    formData.append('position6', position6);
    formData.append('position7', position7);
    formData.append('position8', position8);

    $.ajax({
        url: "<?= site_url('BeonDuty/Insert_Position') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) {
            if (results == 'Success') {
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

$('#InsertDutySchedule').submit(function(e) {
    e.preventDefault();
    InsertDutySchedule();
});

function InsertDutySchedule() {
    let Acyear = $('#Acyear').val();
    let Term = $('#Term').val();
    let Day = $('#Day').val();
    let Time = $('#Time').val();
    let Pos1 = $('#Pos1').val();
    let Pos2 = $('#Pos2').val();
    let Pos3 = $('#Pos3').val();
    let Pos4 = $('#Pos4').val();
    let Pos5 = $('#Pos5').val();
    let Pos6 = $('#Pos6').val();
    let Pos7 = $('#Pos7').val();
    let Pos8 = $('#Pos8').val();
    let Pos9 = $('#Pos9').val();
    let Pos10 = $('#Pos10').val();
    let Inspector = $('#Inspector').val();

    let formData = new FormData();
    formData.append('Acyear', Acyear);
    formData.append('Term', Term);
    formData.append('Day', Day);
    formData.append('Time', Time);
    formData.append('Pos1', Pos1);
    formData.append('Pos2', Pos2);
    formData.append('Pos3', Pos3);
    formData.append('Pos4', Pos4);
    formData.append('Pos5', Pos5);
    formData.append('Pos6', Pos6);
    formData.append('Pos7', Pos7);
    formData.append('Pos8', Pos8);
    formData.append('Pos9', Pos9);
    formData.append('Pos10', Pos10);
    formData.append('Inspector', Inspector);

    $.ajax({
        url: "<?= site_url('BeonDuty/Insert_DutySchedule') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) {
            if (results == 'Success') {
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

$('#UpdateDutySchedule').submit(function(e) {
    e.preventDefault();
    UpdateDutySchedule();
});

function UpdateDutySchedule() {
    let Acyear = $('#AcyearEdit').val();
    let Term = $('#TermEdit').val();
    let Day = $('#DayEdit').val();
    let Time = $('#TimeEdit').val();
    let Pos1 = $('#Pos1Edit').val();
    let Pos2 = $('#Pos2Edit').val();
    let Pos3 = $('#Pos3Edit').val();
    let Pos4 = $('#Pos4Edit').val();
    let Pos5 = $('#Pos5Edit').val();
    let Pos6 = $('#Pos6Edit').val();
    let Pos7 = $('#Pos7Edit').val();
    let Pos8 = $('#Pos8Edit').val();
    let Pos9 = $('#Pos9Edit').val();
    let Pos10 = $('#Pos10Edit').val();
    let Inspector = $('#InspectorEdit').val();

    let formData = new FormData();
    formData.append('Acyear', Acyear);
    formData.append('Term', Term);
    formData.append('Day', Day);
    formData.append('Time', Time);
    formData.append('Pos1', Pos1);
    formData.append('Pos2', Pos2);
    formData.append('Pos3', Pos3);
    formData.append('Pos4', Pos4);
    formData.append('Pos5', Pos5);
    formData.append('Pos6', Pos6);
    formData.append('Pos7', Pos7);
    formData.append('Pos8', Pos8);
    formData.append('Pos9', Pos9);
    formData.append('Pos10', Pos10);
    formData.append('Inspector', Inspector);

    $.ajax({
        url: "<?= site_url('BeonDuty/Insert_DutySchedule') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) {
            if (results == 'Success') {
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
}

$('#AcyearEdit').change(fetch_Data);
$('#TermEdit').change(fetch_Data);
$('#DayEdit').change(fetch_Data);
$('#TimeEdit').change(fetch_Data);

function fetch_Data() {
    let Acyear = $('#AcyearEdit').val();
    let Term = $('#TermEdit').val();
    let Day = $('#DayEdit').val();
    let Time = $('#TimeEdit').val();

    $.ajax({
        url: "<?= site_url('BeonDuty/fetch_Data') ?>",
        method: "POST",
        data: {
            Acyear: Acyear,
            Term: Term,
            Day: Day,
            Time: Time
        },
        dataType: 'json',
        success: function(data) {
            if (data === null) {
                $('#Pos1Edit').val('');
                $('#Pos2Edit').val('');
                $('#Pos3Edit').val('');
                $('#Pos4Edit').val('');
                $('#Pos5Edit').val('');
                $('#Pos6Edit').val('');
                $('#Pos7Edit').val('');
                $('#Pos8Edit').val('');
                $('#Pos9Edit').val('');
                $('#Pos10Edit').val('');
                $('#InspectorEdit').val('');
            } else {
                $('#Pos1Edit').val(data.Position1);
                $('#Pos2Edit').val(data.Position2);
                $('#Pos3Edit').val(data.Position3);
                $('#Pos4Edit').val(data.Position4);
                $('#Pos5Edit').val(data.Position5);
                $('#Pos6Edit').val(data.Position6);
                $('#Pos7Edit').val(data.Position7);
                $('#Pos8Edit').val(data.Position8);
                $('#Pos9Edit').val(data.Position9);
                $('#Pos10Edit').val(data.Position10);
                $('#InspectorEdit').val(data.Inspector);
            }
        }
    });
}

function toggleEdit(button) {
    let editButton = button;
    let saveButton = editButton.nextElementSibling;

    editButton.style.display = "block";
    saveButton.style.display = "none";

    editButton.style.display = "none";
    saveButton.style.display = "block";
}

$(document).on("click", "#edit", function() {
    $("#Pos1Edit").prop("disabled", false);
    $("#Pos2Edit").prop("disabled", false);
    $("#Pos3Edit").prop("disabled", false);
    $("#Pos4Edit").prop("disabled", false);
    $("#Pos5Edit").prop("disabled", false);
    $("#Pos6Edit").prop("disabled", false);
    $("#Pos7Edit").prop("disabled", false);
    $("#Pos8Edit").prop("disabled", false);
    $("#Pos9Edit").prop("disabled", false);
    $("#Pos10Edit").prop("disabled", false);
    $("#InspectorEdit").prop("disabled", false);
});
</script>