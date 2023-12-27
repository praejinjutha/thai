<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>
<style>
.tbodyDiv {
    max-height: clamp(5em, 110vh, 750px);
    margin-top: 10px;
    overflow: auto;
}
</style>
<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('IDplan') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">การประเมินผลการพัฒนางานตามข้อตกลง PA</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 flex-column d-flex stretch-card">
            <div class="row flex-grow">
                <div class="col-sm-12">
                    <div class="card m-3 mt-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 mt-4">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="fw-bold">ปีการศึกษา</h3>
                                            <select class="form-select" id="Year">
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
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <form action="" method="POST" id="InsertPA1" role="form">
                                                <button type="button" class="btn btn-success fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalPA1">+ เพิ่มข้อมูลแบบประเมิน PA 1</button>
                                                <div class="modal fade" id="ModalPA1" aria-labelledby="myModalLabel6"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="" method="POST" id="InsertIDplan" role="form">
                                                                    <div class="tab">
                                                                        <h5 class="card-title fw-bold"
                                                                            style="color: #18409e;font-size: 32px;">
                                                                            เพิ่มแบบประเมินผลการพัฒนางานตามข้อตกลง PA 1
                                                                        </h5>
                                                                    </div>
                                                                    <div id="modal-setting-7" class="tabcontent">
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                        <select class="form-select"
                                                                                            id="EdYear" name="EdYear">
                                                                                            <?php
                                                                                                foreach ($loopYear as $row => $Year) {
                                                                                            ?>
                                                                                            <option value="<?= $Year ?>"
                                                                                                class="select-fnz">
                                                                                                <?= $Year ?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date"
                                                                                            name="Date"
                                                                                            value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="IDCard" name="IDCard"
                                                                                    value="<?= $this->data['IDCard'] ?>"
                                                                                    hidden>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                            <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                                            <input type="text"class="form-control" id="Topic"name="Topic" value="แบบประเมินผลการพัฒนางานตามข้อตกลง PA 1" readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="font-size: 25px;">รายละเอียด</label>
                                                                                        <input type="text"
                                                                                            class="form-control" id="Detail"
                                                                                            name="Detail" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1 fw-bold"
                                                                                            style="color: black;font-size: 25px;">แนบไฟล์ประเมิน</label>
                                                                                        <input class="form-control"
                                                                                            type="file" id="FileName"
                                                                                            name="FileName" value="">
                                                                                    </div>
                                                                                    <input type="text" class="form-control" id="Status" name="Status" value="รอประเมิน" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-3">
                                                                            <button type="sudmit"
                                                                                class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary fw-bold fs-4"
                                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="" method="POST" id="InsertPA2" role="form">
                                                <button type="button" class="btn btn-success fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalPA2">+ เพิ่มข้อมูลแบบประเมิน PA 2</button>
                                                <div class="modal fade" id="ModalPA2" aria-labelledby="myModalLabel6"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="" method="POST" id="InsertIDplan" role="form">
                                                                    <div class="tab">
                                                                        <h5 class="card-title fw-bold"
                                                                            style="color: #18409e;font-size: 32px;">
                                                                            เพิ่มแบบประเมินผลการพัฒนางานตามข้อตกลง PA 2
                                                                        </h5>
                                                                    </div>
                                                                    <div id="modal-setting-7" class="tabcontent">
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                        <select class="form-select"
                                                                                            id="EdYear2" name="EdYear2">
                                                                                            <?php
                                                                                                foreach ($loopYear as $row => $Year) {
                                                                                            ?>
                                                                                            <option value="<?= $Year ?>"
                                                                                                class="select-fnz">
                                                                                                <?= $Year ?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date2"
                                                                                            name="Date2"
                                                                                            value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="IDCard2" name="IDCard2"
                                                                                    value="<?= $this->data['IDCard'] ?>"
                                                                                    hidden>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                            <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                                            <input type="text"class="form-control" id="Topic2"name="Topic2" value="แบบประเมินผลการพัฒนางานตามข้อตกลง PA 2" readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="font-size: 25px;">รายละเอียด</label>
                                                                                        <input type="text"
                                                                                            class="form-control" id="Detail2"
                                                                                            name="Detail2" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1 fw-bold"
                                                                                            style="color: black;font-size: 25px;">แนบไฟล์ประเมิน</label>
                                                                                        <input class="form-control"
                                                                                            type="file" id="FileName2"
                                                                                            name="FileName2" value="">
                                                                                    </div>
                                                                                    <input type="text" class="form-control" id="Status2" name="Status2" value="รอประเมิน" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-3">
                                                                            <button type="sudmit"
                                                                                class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary fw-bold fs-4"
                                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="" method="POST" id="InsertPA3" role="form">
                                                <button type="button" class="btn btn-success fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalPA3">+ เพิ่มข้อมูลแบบประเมิน PA 3</button>
                                                <div class="modal fade" id="ModalPA3" aria-labelledby="myModalLabel6"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="" method="POST" id="InsertIDplan" role="form">
                                                                    <div class="tab">
                                                                        <h5 class="card-title fw-bold"
                                                                            style="color: #18409e;font-size: 32px;">
                                                                            เพิ่มแบบสรุปผลการประเมินการพัฒนางาน PA 3
                                                                        </h5>
                                                                    </div>
                                                                    <div id="modal-setting-7" class="tabcontent">
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                        <select class="form-select"
                                                                                            id="EdYear3" name="EdYear3">
                                                                                            <?php
                                                                                                foreach ($loopYear as $row => $Year) {
                                                                                            ?>
                                                                                            <option value="<?= $Year ?>"
                                                                                                class="select-fnz">
                                                                                                <?= $Year ?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date3"
                                                                                            name="Date3"
                                                                                            value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="IDCard3" name="IDCard3"
                                                                                    value="<?= $this->data['IDCard'] ?>"
                                                                                    hidden>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                            <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                                            <input type="text"class="form-control" id="Topic3" name="Topic3" value="แบบสรุปผลการประเมินการพัฒนางาน PA 3" readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="font-size: 25px;">รายละเอียด</label>
                                                                                        <input type="text"
                                                                                            class="form-control" id="Detail3"
                                                                                            name="Detail3" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1 fw-bold"
                                                                                            style="color: black;font-size: 25px;">แนบไฟล์ประเมิน</label>
                                                                                        <input class="form-control"
                                                                                            type="file" id="FileName3"
                                                                                            name="FileName3" value="">
                                                                                    </div>
                                                                                    <input type="text" class="form-control" id="Status3" name="Status3" value="รอประเมิน" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-3">
                                                                            <button type="sudmit"
                                                                                class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary fw-bold fs-4"
                                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="" method="POST" id="InsertPA4" role="form">
                                                <button type="button" class="btn btn-success fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalPA4">+ เพิ่มข้อมูลแบบประเมิน PA 4</button>
                                                <div class="modal fade" id="ModalPA4" aria-labelledby="myModalLabel6"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="" method="POST" id="InsertIDplan" role="form">
                                                                    <div class="tab">
                                                                        <h5 class="card-title fw-bold"
                                                                            style="color: #18409e;font-size: 32px;">
                                                                            เพิ่มแบบประเมินตำแหน่งและวิทยฐานะ PA 4
                                                                        </h5>
                                                                    </div>
                                                                    <div id="modal-setting-7" class="tabcontent">
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                        <select class="form-select"
                                                                                            id="EdYear4" name="EdYear4">
                                                                                            <?php
                                                                                                foreach ($loopYear as $row => $Year) {
                                                                                            ?>
                                                                                            <option value="<?= $Year ?>"
                                                                                                class="select-fnz">
                                                                                                <?= $Year ?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date4" name="Date4"
                                                                                            value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="IDCard4" name="IDCard4"
                                                                                    value="<?= $this->data['IDCard'] ?>"
                                                                                    hidden>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                            <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                                            <input type="text"class="form-control" id="Topic4" name="Topic4" value="แบบประเมินตำแหน่งและวิทยฐานะ PA 4" readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="font-size: 25px;">รายละเอียด</label>
                                                                                        <input type="text"
                                                                                            class="form-control" id="Detail4"
                                                                                            name="Detail4" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1 fw-bold"
                                                                                            style="color: black;font-size: 25px;">แนบไฟล์ประเมิน</label>
                                                                                        <input class="form-control"
                                                                                            type="file" id="FileName4"
                                                                                            name="FileName4" value="">
                                                                                    </div>
                                                                                    <input type="text" class="form-control" id="Status4" name="Status4" value="รอประเมิน" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-3">
                                                                            <button type="sudmit"
                                                                                class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary fw-bold fs-4"
                                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="" method="POST" id="InsertPA5" role="form">
                                                <button type="button" class="btn btn-success fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalPA5">+ เพิ่มข้อมูลแบบประเมิน PA 5</button>
                                                <div class="modal fade" id="ModalPA5" aria-labelledby="myModalLabel6"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="" method="POST" id="InsertIDplan" role="form">
                                                                    <div class="tab">
                                                                        <h5 class="card-title fw-bold"
                                                                            style="color: #18409e;font-size: 32px;">
                                                                            เพิ่มแบบประเมินด้านผลงานทางวิชาการ PA 5
                                                                        </h5>
                                                                    </div>
                                                                    <div id="modal-setting-7" class="tabcontent">
                                                                        <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                        <div class="container">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                                        <select class="form-select"
                                                                                            id="EdYear5" name="EdYear5">
                                                                                            <?php
                                                                                                foreach ($loopYear as $row => $Year) {
                                                                                            ?>
                                                                                            <option value="<?= $Year ?>"
                                                                                                class="select-fnz">
                                                                                                <?= $Year ?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                                        <input type="date"
                                                                                            class="form-control" id="Date5"
                                                                                            name="Date5"
                                                                                            value="<?= date("Y-m-d", strtotime("+0 year", strtotime(date('Y-m-d')))) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="IDCard5" name="IDCard5"
                                                                                    value="<?= $this->data['IDCard'] ?>"
                                                                                    hidden>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                            <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                                            <input type="text"class="form-control" id="Topic5" name="Topic5" value="แบบประเมินด้านผลงานทางวิชาการ PA 5" readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1  fw-bold"
                                                                                            style="font-size: 25px;">รายละเอียด</label>
                                                                                        <input type="text"
                                                                                            class="form-control" id="Detail5"
                                                                                            name="Detail5" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="exampleInputUsername2"
                                                                                            class="col mt-1 fw-bold"
                                                                                            style="color: black;font-size: 25px;">แนบไฟล์ประเมิน</label>
                                                                                        <input class="form-control"
                                                                                            type="file" id="FileName5"
                                                                                            name="FileName5" value="">
                                                                                    </div>
                                                                                    <input type="text" class="form-control" id="Status5" name="Status5" value="รอประเมิน" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-3">
                                                                            <button type="sudmit"
                                                                                class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary fw-bold fs-4"
                                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <button type="button" class="btn btn-blankform fw-bold fs-4 mt-3 w-100" data-bs-toggle="modal" data-bs-target="#ModalTeacher">การประเมินผลการปฏิบัติงาน<br>ครูและบุคลากรทางการศึกษา</button>
                                            <div class="modal fade" id="ModalTeacher">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="tab">
                                                                <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">
                                                                    แบบข้อตกลงในการพัฒนางาน (PA1 - PA5) สำหรับข้าราชการครูและบุคลากรทางการศึกษา
                                                                </h5>
                                                            </div>
                                                            <div id="modal-setting-7" class="tabcontent">
                                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="row mt-4">
                                                                                <div class="col">
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู ไม่มีวิทยฐานะ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู ไม่มีวิทยฐานะ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู ชำนาญการ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู ชำนาญการพิเศษ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู เชี่ยวชาญ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA1 Personnel/PA 1 ครู เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 1 ครู เชี่ยวชาญพิเศษ</a>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู ไม่มีวิทยฐานะ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู ไม่มีวิทยฐานะ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู ชำนาญการ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู ชำนาญการพิเศษ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู เชี่ยวชาญ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA2 Personnel/PA 2 ครู เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 2 ครู เชี่ยวชาญพิเศษ</a>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <a href="<?= $themes ?>assets/file/PA3 Personnel/PA 3 แบบสรุปผลการประเมินการพัฒนางาน.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 3 แบบสรุปผลการประเมินการพัฒนางาน</a><br>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-4">
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู ชำนาญการ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู ชำนาญการ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู ชำนาญการพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู ชำนาญการพิเศษ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู เชี่ยวชาญ</a><br>
                                                                                    <a href="<?= $themes ?>assets/file/PA4 Personnel/PA 4 ครู เชี่ยวชาญพิเศษ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 4 ครู เชี่ยวชาญพิเศษ</a><br>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="float-start">
                                                                                    <a href="<?= $themes ?>assets/file/PA5 Personnel/แบบประเมินด้านผลงานทางวิชาการ ครู เชี่ยวชาญ.docx" class="fw-bold" style="text-decoration: none;">
                                                                                    <i class="fa-solid fa-download" style=" color: #18409e;"></i>&nbsp;&nbsp;&nbsp;PA 5 แบบประเมินด้านผลงานทางวิชาการ ครู เชี่ยวชาญ</a><br>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-2"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="button"
                                                                        class="btn btn-secondary fw-bold fs-4"
                                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-2">
                                    <div class="row">
                                        <div class="col tbodyDiv">
                                            <table class="table table-striped table-bordered" id="tbl_IDPlanShow">
                                                <thead class="text-center ">
                                                    <tr>
                                                        <th width="50px">
                                                            <h3 class="fw-bold">ลำดับ</h3>
                                                        </th>
                                                        <th width="150px">
                                                            <h3 class="fw-bold">วันที่</h3>
                                                        </th>
                                                        <th width="330px">
                                                            <h3 class="fw-bold">หัวข้อแบบประเมิน</h3>
                                                        </th>
                                                        <th width="300px">
                                                            <h3 class="fw-bold">ไฟล์</h3>
                                                        </th>
                                                        <th>
                                                            <h3 class="fw-bold">รายละเอียด</h3>
                                                        </th>
                                                        <th width="180px">
                                                            <h3 class="fw-bold">สถานะการประเมิน</h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">สถานะ</h3>
                                                        </th>
                                                        <th width="100px">
                                                            <h3 class="fw-bold">แก้ไข</h3>
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
    get_PerformanceAgreement();
});

$('#Year').change(get_PerformanceAgreement);

function get_PerformanceAgreement() {
    let IDCard = $('#IDCard').val();
    let Year = $('#Year').val();
    let table_body = $('#tbl_IDPlanShow tbody');
    let count = 0;

    $.ajax({
        url: "<?= site_url('IDplan/fech_PerformanceAgreement') ?>",
        method: "POST",
        data: {
            IDCard: IDCard,
            Year: Year
        },
        dataType: 'json',
        success: function(data) { console.log(data);
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="9" valign="middle" style="height:100px;" class="text-center"> ไม่พบข้อมูล </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr>
                            <td>${count}</td>
                            <td>${new Date(row.dateup).toLocaleDateString('th-TH', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/[/]/g, '-')}</td>
                            <td>${row.Topic || ''}</td>
                            <td><a href="<?= site_url('IDplan/export/') ?>${row.id}">${row.FileName || ''}</a></td>
                            <td>${row.note || ''}</td>
                            <td>${row.Status || ''}</td>
                            <td><a href="#" class="btn btn-primary fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#ModalStatus${count}">สถานะ</a>
                                <div class="modal fade" id="ModalStatus${count}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left">
                                                <div class="tab">
                                                    <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">แก้ไขสถานะการประเมิน</h5>
                                                </div>
                                                <div id="modal-setting-7" class="tabcontent">
                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                                                    style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                <select class="form-select" id="EdYear_Status${count}" name="EdYear_Status" disabled>
                                                                    <option class="select-fnz" value="${row.EdYear}">${row.EdYear}</option>
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
                                                                <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                                                    style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                <input type="date" class="form-control" id="Date_Status${count}" name="Date_Status" value="${row.dateup}" readonly>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="IDCard_Status${count}" name="IDCard_Status" value="${row.IDCard}" hidden>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                <input type="text"class="form-control" id="Topic${count}" name="Topic" value="${row.Topic}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                                                    style="color: black;font-size: 25px;">รายละเอียด</label>
                                                                <input type="text" class="form-control" id="Detail_Status${count}" name="Detail_Status" value="${row.note}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mt-2">
                                                                    <label for="" class="fw-bold" style="color: black;font-size: 25px;">แนบไฟล์ผลสรุป</label>
                                                                    <a href="<?= site_url('IDplan/export/') ?>${row.id}"><input class="form-control" type="text" id="FileNameEdit${count}" name="FileNameEdit" value="${row.FileName !== null ? row.FileName : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <label for="" class="fw-bold mt-2">สถานะ</label>
                                                                <select class="form-select" id="StatusEdit${count}" name="StatusEdit" onclick="removeOption_IDPlan()">
                                                                    <option class="select-fnz" value="${row.Status}">${row.Status}</option>
                                                                    <option value="รอประเมิน" class="select-fnz">รอประเมิน</option>
                                                                    <option value="ผ่าน" class="select-fnz">ผ่าน</option>
                                                                    <option value="ไม่ผ่าน" class="select-fnz">ไม่ผ่าน</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12 ">
                                                                <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer mt-3">
                                                        <button type="sudmit" class="btn btn-primary fw-bold fs-4" onclick="UpdateStatus(${row.id}, ${count})">บันทึก</button>
                                                        <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#EditModal${count}">แก้ไข</a>
                                <div class="modal fade" id="EditModal${count}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: left">
                                                <div class="tab">
                                                    <h5 class="card-title fw-bold" style="color: #18409e;font-size: 32px;">แก้ไขแบบประเมินผลการพัฒนางานตามข้อตกลง PA</h5>
                                                </div>
                                                <div id="modal-setting-7" class="tabcontent">
                                                <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                                                    style="color: black;font-size: 25px;">ปีการศึกษา</label>
                                                                <select class="form-select" id="EdYear_Edit${count}" name="EdYear_Edit" onclick="removeOption_IDPlan()" disabled>
                                                                    <option class="select-fnz" value="${row.EdYear}">${row.EdYear}</option>
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
                                                                <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                                                    style="color: black;font-size: 25px;">วันที่แนบไฟล์</label>
                                                                <input type="date" class="form-control" id="Date_Edit${count}" name="Date_Edit" value="${row.dateup}" readonly>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="IDCard_Edit${count}" name="IDCard_Edit" value="${row.IDCard}" hidden>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col mt-1  fw-bold" style="font-size: 25px;">หัวข้อแบบประเมิน</label>
                                                                <input type="text"class="form-control" id="Topic${count}" name="Topic" value="${row.Topic}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <label for="exampleInputUsername2" class="col mt-1  fw-bold"
                                                                    style="color: black;font-size: 25px;">รายละเอียด</label>
                                                                <input type="text" class="form-control" id="Detail_Edit${count}" name="Detail_Edit" value="${row.note}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mt-2" id="FileNameDownload${count}">
                                                                    <label for="" class="fw-bold" style="color: black;font-size: 25px;">แนบไฟล์ผลสรุป</label>
                                                                    <a href="<?= site_url('IDplan/export/') ?>${row.id}"><input class="form-control" type="text" id="FileNameEdit${count}" name="FileNameEdit" value="${row.FileName !== null ? row.FileName : ''}" style="cursor: pointer; color: blue;" readonly></a>
                                                                </div>
                                                                <div class="form-group mt-2" id="FileNameInput${count}" style="display: none;">
                                                                    <label for="" class="fw-bold" style="color: black;font-size: 25px;">แนบไฟล์ผลสรุป</label>
                                                                        <input class="form-control" type="file" id="FileName_Edit${count}" name="FileName_Edit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12 ">
                                                                <h4 class="fs-4 float-end" style="color: #18409e;">อัพเดทข้อมูลล่าสุดวันที่ ${row.UpdatedAt} </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer mt-3">
                                                        <button type="button" class="btn btn-warning fw-bold fs-4" id="edit" onclick="toggleEdit_IDplan(${count}, this)">แก้ไข</button>
                                                        <button type="sudmit" class="btn btn-primary fw-bold fs-4" style="display: none;" onclick="UpdateIDplan(${row.id}, ${count})">บันทึก</button>
                                                        <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="btn btn-danger fw-bold fs-4" onclick="Delete_IDplan('${row.id}')">ลบ</a></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }
            $('#tbcount').text(`จำนวนบุคลากรทั้งหมด ${count} คน`);
        }
    });
}

$('#InsertPA1').submit(function(e) {
    e.preventDefault();
    InsertPA1();
});

function InsertPA1() {
    let EdYear = $('#EdYear').val();
    let IDCard = $('#IDCard').val();
    let dateup = $('#Date').val();
    let Topic = $('#Topic').val();
    let note = $('#Detail').val();
    let Status = $('#Status').val();
    let FileName = $('#FileName')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('IDCard', IDCard);
    formData.append('dateup', dateup);
    formData.append('Topic', Topic);
    formData.append('note', note);
    formData.append('Status', Status);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('IDplan/Insert_PerformanceAgreement') ?>",
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

$('#InsertPA2').submit(function(e) {
    e.preventDefault();
    InsertPA2();
});

function InsertPA2() {
    let EdYear = $('#EdYear2').val();
    let IDCard = $('#IDCard2').val();
    let dateup = $('#Date2').val();
    let Topic = $('#Topic2').val();
    let note = $('#Detail2').val();
    let Status = $('#Status2').val();
    let FileName = $('#FileName2')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('IDCard', IDCard);
    formData.append('dateup', dateup);
    formData.append('Topic', Topic);
    formData.append('note', note);
    formData.append('Status', Status);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('IDplan/Insert_PerformanceAgreement') ?>",
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

$('#InsertPA3').submit(function(e) {
    e.preventDefault();
    InsertPA3();
});

function InsertPA3() {
    let EdYear = $('#EdYear3').val();
    let IDCard = $('#IDCard3').val();
    let dateup = $('#Date3').val();
    let Topic = $('#Topic3').val();
    let note = $('#Detail3').val();
    let Status = $('#Status3').val();
    let FileName = $('#FileName3')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('IDCard', IDCard);
    formData.append('dateup', dateup);
    formData.append('Topic', Topic);
    formData.append('note', note);
    formData.append('Status', Status);
    formData.append('FileName', FileName);
    
    $.ajax({
        url: "<?= site_url('IDplan/Insert_PerformanceAgreement') ?>",
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

$('#InsertPA4').submit(function(e) {
    e.preventDefault();
    InsertPA4();
});

function InsertPA4() {
    let EdYear = $('#EdYear4').val();
    let IDCard = $('#IDCard4').val();
    let dateup = $('#Date4').val();
    let Topic = $('#Topic4').val();
    let note = $('#Detail4').val();
    let Status = $('#Status4').val();
    let FileName = $('#FileName4')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('IDCard', IDCard);
    formData.append('dateup', dateup);
    formData.append('Topic', Topic);
    formData.append('note', note);
    formData.append('Status', Status);
    formData.append('FileName', FileName);
    
    $.ajax({
        url: "<?= site_url('IDplan/Insert_PerformanceAgreement') ?>",
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

$('#InsertPA5').submit(function(e) {
    e.preventDefault();
    InsertPA5();
});

function InsertPA5() {
    let EdYear = $('#EdYear5').val();
    let IDCard = $('#IDCard5').val();
    let dateup = $('#Date5').val();
    let Topic = $('#Topic5').val();
    let note = $('#Detail5').val();
    let Status = $('#Status5').val();
    let FileName = $('#FileName5')[0].files[0];

    let formData = new FormData();
    formData.append('EdYear', EdYear);
    formData.append('IDCard', IDCard);
    formData.append('dateup', dateup);
    formData.append('Topic', Topic);
    formData.append('note', note);
    formData.append('Status', Status);
    formData.append('FileName', FileName);
    
    $.ajax({
        url: "<?= site_url('IDplan/Insert_PerformanceAgreement') ?>",
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

function UpdateIDplan(id, modalCount) {
    let EdYear = $(`#EdYear_Edit${modalCount}`).val();
    let IDCard = $(`#IDCard_Edit${modalCount}`).val();
    let dateup = $(`#Date_Edit${modalCount}`).val();
    let note = $(`#Detail_Edit${modalCount}`).val();
    let FileName = $(`#FileName_Edit${modalCount}`)[0].files[0];

    let formData = new FormData();
    formData.append('id', id);
    formData.append('EdYear', EdYear);
    formData.append('IDCard', IDCard);
    formData.append('dateup', dateup);
    formData.append('note', note);
    formData.append('FileName', FileName);

    $.ajax({
        url: "<?= site_url('IDplan/update_IDplan') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#EditModal${modalCount}`).modal('hide');
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

function UpdateStatus(id, modalCount) {
    let Status = $(`#StatusEdit${modalCount}`).val();

    let formData = new FormData();
    formData.append('id', id);
    formData.append('Status', Status);

    $.ajax({
        url: "<?= site_url('IDplan/update_Status') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#ModalStatus${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขสถานะสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขสถานะได้',
                    type: "error"
                });
            }
        }
    });
}

function Delete_IDplan(id) {
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
                url: "<?= site_url('IDplan/delete_IDplan') ?>",
                type: 'POST',
                data: {
                    id: id
                },
                success: function(results) {
                    if (results == 'Success') {
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

function toggleEdit_IDplan(count, button) {
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

$(document).on("click", "#edit", function() {
    let count = $(this).closest("tr").index() + 1;
    $("#EdYear_Edit" + count).prop("disabled", false);
    $("#Date_Edit" + count).prop("readonly", false);
    $("#Detail_Edit" + count).prop("readonly", false);
});

function removeOption_IDPlan() {
    $("select[name='EdYear_Edit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='StatusEdit'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>