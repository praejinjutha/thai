$('#AcYear').change(onChangeAcYear);
$('#Term').change(onChangeTerm);
$('#ClassYear').change(onChangeClassYear);

function onChangeAcYear() {
    let AcYear = $('#AcYear').val();
    if (AcYear != '') {
        $.ajax({
            url: "fetch_Term",
            method: "POST",
            data: { AcYear: AcYear },
            success: function (data) {
                $('#Term').html(data);
            }
        });
    }
}

function onChangeTerm() {
    let AcYear = $('#AcYear').val();
    let Term = $('#Term').val();
    if (Term != '') {
        $.ajax({
            url: "fetch_Room",
            method: "POST",
            data: {
                Term: Term,
                AcYear: AcYear
            },
            success: function (data) {
                $('#ClassYear').html(data);
            }
        });
    }
}

function onChangeClassYear() {
    let acyear = $('select[name="AcYear"]').val();
    let term = $('select[name="Term"]').val();
    let classyear = $('#ClassYear').val();
    let table_body = $('#my_table tbody');
    let count = 0;

    $.ajax({
        url: "getCourseSubject",
        method: "POST",
        data: {
            acyear: acyear,
            term: term,
            classyear: classyear
        },
        dataType: 'json',
        success: function (data) {
            table_body.html('');
            count = 0;

            $.each(data, function (index, row) {
                count++;
                let table_row = '<tr>' +
                    '<td class="text-center border-top-0">' + count + '</td>' +
                    '<td class="text-center">' + row.AcYear + '</td>' +
                    '<td class="text-center">' + row.ClassYear + '</td>' +
                    '<td class="text-center">' + row.SubjectType + '</td>' +
                    '<td class="text-center">' + row.SubjectCode + '</td>' +
                    '<td class="text-left">' + row.SubjectName + '</td>' +
                    '<td class="text-center">' + row.Hour + '</td>' +
                    '<td class="text-center">' + row.Sequence + '</td>' +
                    '<td class="text-center"><a href="editForm/' + row.ID + '" class="button-yellow text-black fw-bold">แก้ไข</a></td>' +
                    '<td class="text-center"><button class="button-red text-light fw-bold" onclick="onClickDelete(' + row.ID + ')">ลบ</button></td>'
                '</tr>';
                table_body.append(table_row);
            });
            $('#tbcount').text('จำนวนข้อมูลทั้งหมด ' + count + ' ชุด');
        }
    });
}

$(document).ready(function () {
    showClassYearOptions();
});

function showClassYearOptions() {
    $('select[name="ClassYear"] option[value^="ม."]').hide();
    $('select[name="Term"]').on('click', function () {
        if ($(this).val() == 0) {
            $('select[name="ClassYear"] option[value^="อ."], select[name="ClassYear"] option[value^="ป."]').show();
            $('select[name="ClassYear"] option[value^="ม."]').hide();
        } else {
            $('select[name="ClassYear"] option[value^="อ."], select[name="ClassYear"] option[value^="ป."]').hide();
            $('select[name="ClassYear"] option[value^="ม."]').show();
        }
    });
}

$('#FrmInsertCourse').submit(function () {
    return false;
});

$(document).ready(function () {
    $("#FrmInsertCourse").submit(function (e) {
        e.preventDefault();
        FrmInsertCourse();
    });
});

function FrmInsertCourse() {
    let AcYear = $('select[name="AcYear"]').val();
    let Term = $('select[name="Term"]').val();
    let ClassYear = $('select[name="ClassYear"]').val();
    let subjectGroup = $('#subjectGroup').val();
    let subjectCode = $('#subjectCode').val();
    let subjectName = $('#subjectName').val();
    let subjectType = $('input[name="subjectType"]:checked').val();
    let hour = $('#hour').val();

    $.ajax({
        url: "insert",
        type: "POST",
        data: {
            AcYear: AcYear,
            Term: Term,
            ClassYear: ClassYear,
            subjectGroup: subjectGroup,
            subjectCode: subjectCode,
            subjectName: subjectName,
            subjectType: subjectType,
            hour: hour
        },
        cache: false, 
        success: function(dataResult){
            swal.fire({
                icon: dataResult,
                title: dataResult,
                type: "success"
            });
            onChangeClassYearUp();
            $('#subjectGroup').val('');
            $('#subjectCode').val('');
            $('#subjectName').val('');
            $('#hour').hide();
        }
    });
}

function onClickDelete(id) {
    swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1c67bd',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "deleteCourse",
                type: 'POST',
                data: { id: id }
            })
            .done(function (response) {
                swal.fire({
                    icon: "success",
                    title: "Deleted!",
                    type: "success"
                });
            })
            .fail(function () {
                swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            })
            .then(function () {
                onChangeClassYear();
            });
        }
    })
}

$("select[name='AcYear'] > option").each(function () {
    $(this).siblings('[value="' + this.value + '"]').remove();
});

$("select[name='Term'] > option").each(function () {
    $(this).siblings('[value="' + this.value + '"]').remove();
});
