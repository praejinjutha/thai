<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-color: #feedd7;
    font-family: 'th_sarabun_newregular', sans-serif;
}

.tbodyScorbar {
    max-height: 750px;
    overflow: auto;
}

.no-save {
    width: 35vh;
    pointer-events: none;
    user-select: none;
    -webkit-touch-callout: none;
    position: absolute;
}

.back {
    width: 10vh;
    height: 10vh;
    transition: transform 0.3s ease-in-out;
}

.back:hover {
    cursor: pointer;
    transform: scale(1.1);
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <img src="<?= $themes ?>assets/img/thai/page1/test-logo.png" alt="" class="no-save">
        </div>
        <div class="col-6 mt-5 d-flex">
            <span class="fw-bold fs-2">ข้อสอบทั้งหมด</span>
        </div>
        <div class="col-3 mt-5 d-flex justify-content-between">
            <input type="text" class="form-control fs-4 w-75" id="Search" placeholder="ค้นหาคำถาม" onkeyup="searchTable()">
            <button class="btn btn-success fw-bold fs-4" data-toggle="modal" data-target="#Question">+ เพิ่มข้อสอบ</button>
        </div>
        <div class="col-1">
            <a href="<?= site_url('Lesson') ?>">
                <img src="<?= $themes ?>assets/img/thai/page1/back.png" alt="" class="back">
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col tbodyScorbar">
            <table class="table table-bordered" id="tbl_question">
                <thead  class="text-center table-warning">
                    <tr>
                        <th width="100px"><span class="fs-4">ลำดับ</span></th>
                        <th><span class="fs-4">คำถาม</span></th>
                        <th width="150px"><span class="fs-4">คำตอบที่ 1</span></th>
                        <th width="150px"><span class="fs-4">คำตอบที่ 2</span></th>
                        <th width="150px"><span class="fs-4">คำตอบที่ 3</span></th>
                        <th width="150px"><span class="fs-4">คำตอบที่ 4</span></th>
                        <th width="100px"><span class="fs-4">ข้อที่ถูกต้อง</span></th>
                        <th width="80px"><span class="fs-4">แก้ไข</span></th>
                        <th width="80px"><span class="fs-4">ลบ</span></th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="Question" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="Insert" role="form">
                <div class="modal-header">
                    <span class="modal-title fw-bold fs-3" id="exampleModalLongTitle">เพิ่มข้อสอบ</span>
                </div>
                <div class="modal-body" style="padding: 30px 50px;">
                    <div class="row">
                        <div class="col">
                            <span class="fw-bold fs-4">โจทย์</span>
                            <textarea class="form-control" id="title" name="title"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="fw-bold fs-4">คำตอบข้อที่ 1</span>
                            <input type="text" class="form-control fs-4" id="choice1" value="">
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-4">คำตอบข้อที่ 2</span>
                            <input type="text" class="form-control fs-4" id="choice2" value="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="fw-bold fs-4">คำตอบข้อที่ 3</span>
                            <input type="text" class="form-control fs-4" id="choice3" value="">
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-4">คำตอบข้อที่ 4</span>
                            <input type="text" class="form-control fs-4" id="choice4" value="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="fw-bold fs-4">คำตอบข้อที่ถูกต้อง</span>
                            <select class="form-select fs-4" id="correct">
                                <option value=""></option>
                                <option class="fnz-select" value="1">1</option>
                                <option class="fnz-select" value="2">2</option>
                                <option class="fnz-select" value="3">3</option>
                                <option class="fnz-select" value="4">4</option>
                            </select>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-4">ระดับชั้นเรียน</span>
                            <select class="form-select fs-4" id="classyear">
                                <option value=""></option>
                                <option class="fnz-select" value="ป.1">ป.1</option>
                                <option class="fnz-select" value="ป.2">ป.2</option>
                                <option class="fnz-select" value="ป.3">ป.3</option>
                                <option class="fnz-select" value="ป.4">ป.4</option>
                                <option class="fnz-select" value="ป.5">ป.5</option>
                                <option class="fnz-select" value="ป.6">ป.6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary fs-4">บันทึก</button>
                    <button type="button" class="btn btn-danger fs-4" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('title', {
        height: 100 
    });
    function CKupdate() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
    }
</script>

<script>
$(document).ready(function() {
    get_Question();
});

function get_Question() {
    let table_body = $('#tbl_question tbody');

    $.ajax({
        url: "<?= site_url('PreTest_controller/get_Question') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) {
            table_body.html('');
            if (data.length === 0) {
                let table_row = `
                    <tr>
                        <td colspan="9" valign="middle" style="height:100px;" class="text-center fs-4"> ไม่พบข้อมูลสถิติ </td>
                    </tr>`;
                table_body.append(table_row);
            } else {
                count = 0;
                $.each(data, function(index, row) {
                    count++;
                    let table_row = `<tr class="fs-4">
                            <td>${count}</td>
                            <td class="text-start">${row.title || ''}</td>
                            <td>${row.choice1 || ''}</td>
                            <td>${row.choice2 || ''}</td>
                            <td>${row.choice3 || ''}</td>
                            <td>${row.choice4 || ''}</td>
                            <td>${row.correct || ''}</td>
                            <td>
                                <button class="btn btn-warning fw-bold fs-4" data-bs-toggle="modal" data-bs-target="#modalUpdate${count}">แก้ไข</button>
                                <div class="modal fade" id="modalUpdate${count}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document" style="text-align: left;">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <span class="modal-title fw-bold fs-3" id="exampleModalLongTitle">แก้ไขคำถาม</span>
                                                </div>
                                                <div class="modal-body" style="padding: 30px 50px;">
                                                    <div class="row">
                                                        <div class="col">
                                                            <span class="fw-bold">โจทย์</span>
                                                            <textarea class="form-control" id="title_edit${count}" name="title_edit" onchange="CKupdate()">${row.title}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <span class="fw-bold">คำตอบข้อที่ 1</span>
                                                            <input type="text" class="form-control fs-4" id="choice1_edit${count}" value="${row.choice1}">
                                                        </div>
                                                        <div class="col">
                                                            <span class="fw-bold">คำตอบข้อที่ 2</span>
                                                            <input type="text" class="form-control fs-4" id="choice2_edit${count}" value="${row.choice2}">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <span class="fw-bold">คำตอบข้อที่ 3</span>
                                                            <input type="text" class="form-control fs-4" id="choice3_edit${count}" value="${row.choice3}">
                                                        </div>
                                                        <div class="col">
                                                            <span class="fw-bold">คำตอบข้อที่ 4</span>
                                                            <input type="text" class="form-control fs-4" id="choice4_edit${count}" value="${row.choice4}">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <span class="fw-bold">คำตอบข้อที่ถูกต้อง</span>
                                                            <select class="form-select fs-4" id="correct_edit${count}" name="correct" onclick="removeOption()">
                                                                <option class="fs-4" value="${row.correct}">${row.correct}</option>
                                                                <option class="fs-4" value="1">1</option>
                                                                <option class="fs-4" value="2">2</option>
                                                                <option class="fs-4" value="3">3</option>
                                                                <option class="fs-4" value="4">4</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <span class="fw-bold">ระดับชั้นเรียน</span>
                                                            <select class="form-select fs-4" id="classyear_edit${count}" name="classyear" onclick="removeOption()">
                                                                <option class="fs-4" value="${row.classyear}">${row.classyear}</option>
                                                                <option class="fs-4" value="ป.1">ป.1</option>
                                                                <option class="fs-4" value="ป.2">ป.2</option>
                                                                <option class="fs-4" value="ป.3">ป.3</option>
                                                                <option class="fs-4" value="ป.4">ป.4</option>
                                                                <option class="fs-4" value="ป.5">ป.5</option>
                                                                <option class="fs-4" value="ป.6">ป.6</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary fs-4" onclick="Update(${row.id}, ${count})">บันทึก</button>
                                                    <button type="button" class="btn btn-danger fs-4" onclick="Close()" data-dismiss="modal">ยกเลิก</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><button class="btn btn-danger fw-bold fs-4" onclick="deleteQuestion('${row.id}')">ลบ</button></td>
                        </tr>`;
                    table_body.append(table_row);
                });
            }

            for (let i = 1; i <= count; i++) {
                CKEDITOR.replace(`title_edit${i}`, {
                    height: 100
                });
            }
        }
    });
}

function Close() {
    $('.modal').modal('hide');
}


$('#Insert').submit(function(e) {
    e.preventDefault();
    Insert();
});

function Insert() {
    let title = CKEDITOR.instances['title'].getData();
    let choice1 = $('#choice1').val();
    let choice2 = $('#choice2').val();
    let choice3 = $('#choice3').val();
    let choice4 = $('#choice4').val();
    let correct = $('#correct').val();
    let classyear = $('#classyear').val();

    let formData = new FormData();
    formData.append('title', title);
    formData.append('choice1', choice1);
    formData.append('choice2', choice2);
    formData.append('choice3', choice3);
    formData.append('choice4', choice4);
    formData.append('correct', correct);
    formData.append('classyear', classyear);

    $.ajax({
        url: "<?= site_url('PreTest_controller/Insert_Question') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(results) { 
            if (results == 'Success') {
                swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อสอบสำเร็จ',
                    type: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถเพิ่มข้อสอบได้',
                    type: "error"
                });
            }
        }
    });
}

function Update(id, modalCount) {
    CKupdate();

    let title = $(`#title_edit${modalCount}`).val();
    let choice1 = $(`#choice1_edit${modalCount}`).val();
    let choice2 = $(`#choice2_edit${modalCount}`).val();
    let choice3 = $(`#choice3_edit${modalCount}`).val();
    let choice4 = $(`#choice4_edit${modalCount}`).val();
    let correct = $(`#correct_edit${modalCount}`).val();
    let classyear = $(`#classyear_edit${modalCount}`).val();

    let formData = new FormData();
    formData.append('id', id);
    formData.append('title', title);
    formData.append('choice1', choice1);
    formData.append('choice2', choice2);
    formData.append('choice3', choice3);
    formData.append('choice4', choice4);
    formData.append('correct', correct);
    formData.append('classyear', classyear);

    $.ajax({
        url: "<?= site_url('PreTest_controller/Update_Question') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'Success') {
                $(`#myModal${modalCount}`).modal('hide');
                swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อสอบสำเร็จ',
                    type: "success"
                }).then(function() {
                    window.location.reload();
                });
            } else if (response == 'error') {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถแก้ไขข้อสอบได้',
                    type: "error"
                });
            }
        }
    });
}

function deleteQuestion(id) {
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
                url: "<?= site_url('PreTest_controller/Delete_Question') ?>",
                type: 'POST',
                data: {
                    id: id
                },
                success: function(results) {
                    if (results == 'Success') {
                        swal.fire({
                            icon: 'success',
                            title: 'ลบข้อสอบสำเร็จ',
                            type: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    } else if (dataResult == 'error') {
                        swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบข้อสอบได้',
                            type: "error"
                        });
                    }
                }
            });
        }
    })
}

function searchTable() {
    let input = document.getElementById('Search');
    let filter = input.value.toLowerCase();
    let table = document.getElementById('tbl_question');
    let trs = table.getElementsByTagName('tr');

    for (let i = 1; i < trs.length; i++) {
        let td = trs[i].getElementsByTagName('td')[1];
        if (td) {
            let txtValue = td.textContent || td.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                trs[i].style.display = "";
            } else {
                trs[i].style.display = "none";
            }
        }       
    }
}

function removeOption(modalCount) {
    $("select[name='correct'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
    $("select[name='classyear'] > option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
}
</script>