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
                <a class="float-start" href="<?= site_url($this->session->userdata('Role') == 'admin' ? 'PersonnelInformation' : 'User_Controller/HelperHome') ?>">
                    <i class="fa-solid fa-arrow-left icon-home icon-home-header coloricon"></i>
                </a>
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
                                <div class="col-md-10 mx-auto">
                                    <input type="text" class="form-control" id="Search" name="Search" placeholder="ค้นหา..."> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row ">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-10" id="tbl_Helpdesk">

                                </div>
                                <div class="col-md-1">

                                </div>
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
        url: "<?= site_url('User_Controller/Helpdesk/fetch_Helpdesk') ?>",
        method: "POST",
        dataType: 'json',
        success: function(data) { 
            table_body.empty(); 

            $.each(data, function(index, row) {
                let table_row = `<div class="box-style mt-3">
                                    <div class="col p-4">
                                        <span class="fw-bold fs-3">${row.Subject}</span>
                                        <i id="floatIconElement" style='font-size:22px; cursor: pointer;' class='fas float-end mt-2' onclick="toggleData(this)">&#xf101;</i>
                                    </div>
                                    <div class="hidden-data" style="display: none; padding: 0 0 10px 50px">${row.Detail}</div>
                                </div>`;
                table_body.append(table_row);
            });
        }
    });
}

function Search_Helpdesk(Search) {
    let table_body = $('#tbl_Helpdesk');

    $.ajax({
        url: "<?= site_url('User_Controller/Helpdesk/Search_Helpdesk') ?>",
        method: "POST",
        data: { Search: Search },
        dataType: 'json',
        success: function(data) {
            table_body.empty();

            $.each(data, function(index, row) {
                let table_row = `<div class="box-style mt-2">
                                    <div class="col p-4">
                                        <span class="fw-bold fs-3">${row.Subject}</span>
                                        <i id="floatIconElement" style='font-size:22px; cursor: pointer;' class='fas float-end mt-2' onclick="toggleData(this)">&#xf101;</i>
                                    </div>
                                    <div class="hidden-data" style="display: none; padding: 0 0 10px 50px">${row.Detail}</div>
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