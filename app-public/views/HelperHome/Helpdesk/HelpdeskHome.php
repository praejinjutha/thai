<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<style>
@keyframes floatIcon {
    0% {
        transform: translateX(-5px);
    }

    100% {
        transform: translateX(0px); 
    }
}

#floatIconElement {
    animation: floatIcon 1s infinite alternate;
}
</style>

<div class="container-fild ">
    <div class="header-menu-font" style="background-color: #eac178; padding: 15px; ">
        <div class="row m-lg-1">
            <div class="col-md-2">
                <a class="float-start" href="<?= site_url('HelperHome') ?>"><i
                        class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i></a>
            </div>
            <div class="col-md-8 text-center">
                <label class="mt-1">HELP DESK</label>
            </div>
            <div class="col-md-2">
                <a class="float-end" href="<?= site_url('dashboard') ?>"><i
                        class="fa fa-home icon-home icon-home-header coloricon"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card m-3 mt-0" style="background-color: #f0f3f6;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-9 mx-auto">
                                    <input type="text" class="form-control" id="Search" name="Search"> 
                                </div>
                                <div class="col-md-1">
                                    <div class="float-end">
                                    <a href="#"><i class="fa fa-plus-circle"
                                            style="color: #17b085; font-size: 50px;"
                                            data-bs-toggle="modal" data-bs-target="#myModal2"></i></a>

                                    <!-- **** Modal **** -->
                                    <div class="modal fade" id="myModal2">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <form action="" method="POST" id="InsertHelpdesk" role="form">
                                                    <div class="modal-body">
                                                        <div class="tab">
                                                            <h5 class="card-title fw-bold"
                                                                style="color: #18409e;font-size: 32px;">
                                                                เพิ่มข้อมูลในการช่วยเหลือการทำงาน</h5>
                                                        </div>
                                                        <div id="modal-setting-7" class="tabcontent">
                                                            <hr style="color: #eac178;height: 3px;opacity: 1;">
                                                            <div class="container">
                                                                <?php
                                                                    foreach ($get_No as $row) {
                                                                        if (isset($row->No_max)) {
                                                                            $No = $row->No_max + 1;
                                                                        } else {
                                                                            $No = 1; 
                                                                    }
                                                                ?>
                                                                    <input type="text" class="form-control" id="No" name="No" value="<?= $No ?>" hidden>
                                                                <?php
                                                                    }
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-2 fw-bold"
                                                                            style="font-size: 25px;">ชื่อหัวข้อ</label>
                                                                        <input type="text" class="form-control" id="Subject"
                                                                            name="Subject" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col mt-2 fw-bold"
                                                                            style="font-size: 26px;">ระบุข้อมูลในการช่วยเหลือผู้ใช้งาน</label>
                                                                        <textarea class="form-control" id="Detail" name="Detail"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-3">
                                                            <button type="submit" class="btn btn-primary fw-bold fs-4">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary fw-bold fs-4" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- **** End Modal **** -->
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row" id="tbl_Helpdesk">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('Detail');
    function CKupdate() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
    }
</script>

<script>
$(document).ready(function() {
    get_Helpdesk();

    $('#Search').on('input', function() {
        let Search = $(this).val();
        Search_Helpdesk(Search);
    });
});   

function get_Helpdesk() {
    let table_body = $('#tbl_Helpdesk');

    $.ajax({
        url: "<?= site_url('Helpdesk/fetch_Helpdesk') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) { 
            table_body.empty(); 

            $.each(data, function(index, row) {
                let table_row = `<div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="box-style mt-3">
                                        <div class="col p-4">
                                            <span class="fw-bold fs-3">${row.Subject}</span>
                                            <div class="float-end">
                                                <i id="floatIconElement" style='font-size:22px; cursor: pointer;' class='fas mt-2' onclick="toggleData(this)">&#xf101;</i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="hidden-data" style="display: none; padding: 0 0 10px 50px;">${row.Detail}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 mt-5">
                                    <i class="fa-solid fa-trash text-danger" style="cursor: pointer; text-shadow: 2px 2px 5px grey;" onclick="DeleteHelpdesk('${row.ID}')"></i>
                                </div>`;
                table_body.append(table_row);
            });
        }
    });
}


$('#InsertHelpdesk').submit(function(e) {
    e.preventDefault();
    InsertHelpdesk();
});

function InsertHelpdesk() {
    let No = $('#No').val();
    let Subject = $('#Subject').val();
    let Detail = CKEDITOR.instances['Detail'].getData();

    let formData = new FormData();
    formData.append('No', No);
    formData.append('Subject', Subject);
    formData.append('Detail', Detail);

    $.ajax({
        url: "<?= site_url('Helpdesk/Insert_Helpdesk') ?>",
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

function DeleteHelpdesk(ID) {
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
                url: "<?= site_url('Helpdesk/delete_Helpdesk') ?>",
                type: 'POST',
                data: {
                    ID: ID
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

function Search_Helpdesk(Search) {
    let table_body = $('#tbl_Helpdesk');

    $.ajax({
        url: "<?= site_url('Helpdesk/Search_Helpdesk') ?>",
        method: "POST",
        data: { Search: Search },
        dataType: 'json',
        success: function(data) {
            table_body.empty();

            $.each(data, function(index, row) {
                let table_row = `<div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="box-style mt-3">
                                        <div class="col p-4">
                                            <span class="fw-bold fs-3">${row.Subject}</span>
                                            <div class="float-end">
                                                <i id="floatIconElement" style='font-size:22px; cursor: pointer;' class='fas mt-2' onclick="toggleData(this)">&#xf101;</i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="hidden-data" style="display: none; padding: 0 0 10px 50px;">${row.Detail}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 mt-5">
                                    <i class="fa-solid fa-trash text-danger" style="cursor: pointer; text-shadow: 2px 2px 5px grey;" onclick="DeleteHelpdesk('${row.ID}')"></i>
                                </div>`;
                table_body.append(table_row);
            });
        }
    });
}

</script>

<!-- เปลี่ยน icon -->
<script>
function toggleData(iconElement) {
    var icon = $(iconElement);
    var hiddenData = icon.closest('.box-style').find('.hidden-data');
    if (hiddenData.css('display') === 'none') {
        hiddenData.show();
        icon.html('<i style="font-size: 24px" class="fas">&#xf103;</i>');
    } else {
        hiddenData.hide();
        icon.html('<i style="font-size: 24px" class="fas">&#xf101;</i>');
    }
}
</script>