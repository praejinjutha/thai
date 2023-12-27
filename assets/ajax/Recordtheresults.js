$('#AcYear').change(onChangeAcYear);
$('#Classroom').change(onChangeClassroom);
$('#Act').change(onChangeAct);

function onChangeAcYear() {
    let AcYear = $('#AcYear').val();
    if (AcYear != '') {
        $.ajax({
            url: "Recordtheresults/Fetch_AcYear",
            method: "POST",
            data: { 
                AcYear: AcYear
            },
            success: function (data) {
                $('#Classroom').html(data);
            }
        });
    }
}

function onChangeClassroom() {
    let AcYear = $('#AcYear').val();
    let Classroom = $('#Classroom').val();
    if (Classroom != '') {
        $.ajax({
            url: "Recordtheresults/Fetch_Classroom",
            method: "POST",
            data: { 
                AcYear: AcYear,
                Classroom: Classroom
            },
            success: function (data) {
                $('#Act').html(data);
            }
        });
    }
}

function onChangeAct() {
    let Act = $('#Act').val();
    if (Act != '') {
        getHeader_Purpose_T1_Count(Act, function(data){
            getActivityDataTerm1(data);
        });
        getHeader_Purpose_T2_Count(Act, function(data){
            getActivityDataTerm2(data);
        });
    }
    getTBLActivityDataTerm1(Act);
    getTBLActivityDataTerm2(Act);
    getActivityDataFinalTerm();
}

function generateTableHeader(data) {
    let table_row = `
        <tr>
        <th class="text-center"><h4 class="fw-bold">ชั้น</h4></th>
        <th class="text-center"><h4 class="fw-bold">เลขที่</h4></th>
        <th class="text-center"><h4 class="fw-bold">เลขประจำตัว</h4></th>
        <th class="text-center"><h4 class="fw-bold">ชื่อ-นามสกุล</h4></th>
    `;

    data.forEach(({ ObjNo }) => {
        table_row += `
        <th class="text-center" width="8%">
            <h4 class="fw-bold">จป. ${ObjNo}</h4>
        </th>
        `;
    });

    table_row += `
        <th class="text-center" width="8%"><h4 class="fw-bold">ผลการประเมิน</h4></th>
        <th class="text-center"><h4 class="fw-bold">สถานะนักเรียน</h4></th>
        <th class="text-center"><h4 class="fw-bold">รหัสลงทะเบียน</h4></th>
        </tr>
    `;
    return table_row;
}

function getHeader_Purpose_T1_Count(Act, callback) {
    $.ajax({
        url: "Recordtheresults/getHeader_Purpose_T1_Count",
        method: "POST",
        data: { 
            Act: Act
        },
        success: function (data) {
            callback(data);
        }
    });
}

function getHeader_Purpose_T2_Count(Act, callback) {
    $.ajax({
        url: "Recordtheresults/getHeader_Purpose_T2_Count",
        method: "POST",
        data: { 
            Act: Act
        },
        success: function (data) {
            callback(data);
        }
    });
}

function getTBLActivityDataTerm1(Act) {
    const table_body = $('#my_table thead');
    if (Act != '') {
        $.ajax({
        url: "Recordtheresults/getHeader_Purpose_T1",
        method: "POST",
        data: {
            Act: Act
        },
        dataType: 'json',
        success: function (data) {
            table_body.html(generateTableHeader(data));
        }
        });
    }
}

function getTBLActivityDataTerm2(Act) {
    const table_body = $('#my_table_2 thead');
    if (Act != '') {
        $.ajax({
        url: "Recordtheresults/getHeader_Purpose_T2",
        method: "POST",
        data: {
            Act: Act
        },
        dataType: 'json',
        success: function (data) {
            table_body.html(generateTableHeader(data));
        }
        });
    }
}

function getActivityDataTerm1(tbl) {
    let Act = $('#Act').val();
    let table_body = $('#my_table tbody');
    let count = 0;

    if (Act !== '') {
        $.ajax({
        url: "Recordtheresults/getActivityDataTerm1",
        method: "POST",
        data: {
            Act: Act
        },
        dataType: 'json',
        success: function (data) {
            table_body.html('');
            count = 0;
            $.each(data, function (index, row) {
                let Score1
                if(row.ObjChain1 != undefined){
                    Score1 = row.ObjChain1.split(/[\s]*[,][\s]*/);
                }else{
                    Score1 = 0;
                }
                count++;
                let table_row = `
                    <tr>
                    <td class="text-center">
                        <input class="text-center" type="hidden" id="ID" name="IDTerm1[]" value="${count}">
                        <h4>${row.StudentRoom === null ? '' : row.StudentRoom}</h4>
                    </td>
                    <td class="text-center"><h4>${row.No === null ? '' : row.No}</h4></td>
                    <td class="text-center"><h4>${row.StudentNo === null ? '' : row.StudentNo}</h4></td>
                    <td class="text-left"><h4>${row.StudentName === null ? '' : row.StudentName}</h4></td>
                `;

                let dataCount = tbl;
                for (let i = 0; i <= dataCount; i++){
                    if (Score1[i] !== undefined) {
                    table_row += `
                        <td class="text-center">
                            <input type="text" class="text-center form-control" name="ScoreTerm1[${count}][${i}]" id="ScoreTerm1" value="${Score1[i]}" style="color:${Score1[i] === 'มผ' ? 'red' : 'inherit'};">
                        </td>
                    `;
                    } else {
                    table_row += `
                        <td class="text-center">
                            <input type="text" class="text-center form-control" name="ScoreTerm1[${count}][${i}]" id="ScoreTerm1">
                        </td>
                    `;
                    }
                }

                table_row += `
                    <td class="text-center">
                        <input class="text-center form-control" type="text" id="ResultTerm1" name="ResultTerm1[]" value="${row.Result === null ? '' : row.Result}" style="color:${row.Result === 'มผ' ? 'red' : 'inherit'};">
                    </td>
                    <td class="text-center"><h4>${row.EducationalStatus === null ? '' : row.EducationalStatus}</h4></td>
                    <td class="text-center"><h4>${row.RegisterActID} <input type="hidden" id="RegisterActID" name="RegisterActIDTerm1[]" value="${row.RegisterActID}"></h4></td>
                    </tr>
                `;
                table_body.append(table_row);
                });

                $('#tbcount').text(`จำนวนข้อมูลทั้งหมด ${count} ชุด`);
            }
        });
    }
}

jQuery('#SuccessAllTerm1').click(function() {
    jQuery('input[id="ResultTerm1"]').val('ผ');
    jQuery('input[id="ScoreTerm1"]').val('ผ');
});

function UpdateDataTerm1() {
    let idArray = $('input[name="IDTerm1[]"]').map(function () {
        return $(this).val();
    }).get();

    let tempData = [];
    $('input[name^="ScoreTerm1"]').map(function() {
        let row = parseInt($(this).attr('name').match(/\[(.*?)\]/g)[0].replace(/\D/g,''));
        let col = parseInt($(this).attr('name').match(/\[(.*?)\]/g)[1].replace(/\D/g,''));
        if (!tempData[row]) {
            tempData[row] = [];
            tempData[row][0] = null;
        }
        tempData[row][col] = $(this).val(); 
    });

    let resultTerm1Array = $('input[name="ResultTerm1[]"]').map(function () {
        return $(this).val();
    }).get();

    let registerActIDArray = $('input[name="RegisterActIDTerm1[]"]').map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        url: "Recordtheresults/RecordTheResultsTerm1_Insert",
        type: 'POST',
        data: {
            idArray: idArray,
            score1Array: tempData,
            resultTerm1Array: resultTerm1Array,
            registerActIDArray: registerActIDArray
        },
        success: function (response) {
            console.log(response)
            if (response == 1) {
                swal.fire({
                    icon: 'success',
                    title: 'บันทึกผลการประเมินกิจกรรมภาคเรียนที่ 1 สำเร็จแล้ว',
                    type: "success"
                });
            } else if (response == 2) {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถบันทึกผลการประเมินกิจกรรมภาคเรียนที่ 1 ได้',
                    type: "error"
                });
            }
            onChangeAct();
        }
    });
}

function getActivityDataTerm2(tbl) {
    let Act = $('#Act').val();
    let table_body = $('#my_table_2 tbody');
    let count = 0;

    if (Act !== '') {
        $.ajax({
        url: "Recordtheresults/getActivityDataTerm2",
        method: "POST",
        data: {
            Act: Act
        },
        dataType: 'json',
        success: function (data) {
            table_body.html('');
            count = 0;
            $.each(data, function (index, row) {
                let Score1
                if(row.ObjChain2 != undefined){
                    Score1 = row.ObjChain2.split(/[\s]*[,][\s]*/);
                }else{
                    Score1 = 0;
                }
                count++;
                let table_row = `
                    <tr>
                    <td class="text-center">
                        <input class="text-center" type="hidden" id="ID" name="IDTerm2[]" value="${count}">
                        <h4>${row.StudentRoom === null ? '' : row.StudentRoom}</h4>
                    </td>
                    <td class="text-center"><h4>${row.No === null ? '' : row.No}</h4></td>
                    <td class="text-center"><h4>${row.StudentNo === null ? '' : row.StudentNo}</h4></td>
                    <td class="text-left"><h4>${row.StudentName === null ? '' : row.StudentName}</h4></td>
                `;

                let dataCount = tbl;
                for (let i = 0; i <= dataCount; i++){
                    if (Score1[i] !== undefined) {
                    table_row += `
                        <td class="text-center">
                            <input type="text" class="text-center form-control" name="ScoreTerm2[${count}][${i}]" id="ScoreTerm2" value="${Score1[i]}" style="color:${Score1[i] === 'มผ' ? 'red' : 'inherit'};">
                        </td>
                    `;
                    } else {
                    table_row += `
                        <td class="text-center">
                            <input type="text" class="text-center form-control" name="ScoreTerm2[${count}][${i}]" id="ScoreTerm2">
                        </td>
                    `;
                    }
                }

                table_row += `
                    <td class="text-center">
                        <input class="text-center form-control" type="text" id="ResultTerm2" name="ResultTerm2[]" value="${row.Result === null ? '' : row.Result}" style="color:${row.Result === 'มผ' ? 'red' : 'inherit'};">
                    </td>
                    <td class="text-center"><h4>${row.EducationalStatus === null ? '' : row.EducationalStatus}</h4></td>
                    <td class="text-center"><h4>${row.RegisterActID} <input type="hidden" id="RegisterActID" name="RegisterActIDTerm2[]" value="${row.RegisterActID}"></h4></td>
                    </tr>
                `;
                table_body.append(table_row);
                });

                $('#tbcount_2').text(`จำนวนข้อมูลทั้งหมด ${count} ชุด`);
            }
        });
    }
}

jQuery('#SuccessAllTerm2').click(function() {
    jQuery('input[id="ResultTerm2"]').val('ผ');
    jQuery('input[id="ScoreTerm2"]').val('ผ');
});

function UpdateDataTerm2() {
    let idArray = $('input[name="IDTerm2[]"]').map(function () {
        return $(this).val();
    }).get();

    let tempData = [];
    $('input[name^="ScoreTerm2"]').map(function() {
        let row = parseInt($(this).attr('name').match(/\[(.*?)\]/g)[0].replace(/\D/g,''));
        let col = parseInt($(this).attr('name').match(/\[(.*?)\]/g)[1].replace(/\D/g,''));
        if (!tempData[row]) {
            tempData[row] = [];
            tempData[row][0] = null;
        }
        tempData[row][col] = $(this).val(); 
    });

    let resultTerm2Array = $('input[name="ResultTerm2[]"]').map(function () {
        return $(this).val();
    }).get();

    let registerActIDArray = $('input[name="RegisterActIDTerm2[]"]').map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        url: "Recordtheresults/RecordTheResultsTerm2_Insert",
        type: 'POST',
        data: {
            idArray: idArray,
            score1Array: tempData,
            resultTerm2Array: resultTerm2Array,
            registerActIDArray: registerActIDArray
        },
        success: function (response) {
            if (response == 1) {
                swal.fire({
                    icon: 'success',
                    title: 'บันทึกผลการประเมินกิจกรรมภาคเรียนที่ 2 สำเร็จแล้ว',
                    type: "success"
                });
            } else if (response == 2) {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถบันทึกผลการประเมินกิจกรรมภาคเรียนที่ 2 ได้',
                    type: "error"
                });
            }
            onChangeAct();
        }
    });
}

function getActivityDataFinalTerm() {
    let Act = $('#Act').val();
    let table_body = $('#my_table_3 tbody');
    let count = 0;

    if (Act !== '') {
        $.ajax({
        url: "Recordtheresults/getActivityDataFinalTerm",
        method: "POST",
        data: {
            Act: Act
        },
        dataType: 'json',
        success: function (data) {
            table_body.html('');
            count = 0;
            $.each(data, function (index, row) {
                count++;
                let table_row = `
                    <tr>
                    <td class="text-center">
                        <input class="text-center" type="hidden" id="ID" name="IDTerm2[]" value="${count}">
                        <h4>${row.StudentRoom === null ? '' : row.StudentRoom}</h4>
                    </td>
                    <td class="text-center"><h4>${row.No === null ? '' : row.No}</h4></td>
                    <td class="text-center"><h4>${row.StudentNo === null ? '' : row.StudentNo}</h4></td>
                    <td class="text-left"><h4>${row.StudentName === null ? '' : row.StudentName}</h4></td>
                    <td class="text-center">
                        <input type="text" class="text-center form-control" name="FinalResultTerm1[]" id="FinalResult" value="${row.ResultTerm1}" style="color:${row.ResultTerm1 === 'มผ' ? 'red' : 'inherit'};">
                    </td>
                    <td class="text-center">
                        <input type="text" class="text-center form-control" name="FinalResultTerm2[]" id="FinalResult" value="${row.ResultTerm2}" style="color:${row.ResultTerm2 === 'มผ' ? 'red' : 'inherit'};">
                    </td>
                    <td class="text-center">
                        <input type="text" class="text-center form-control" name="FinalResult[]" id="FinalResult" value="${row.Result}" style="color:${row.Result === 'มผ' ? 'red' : 'inherit'};">
                    </td>
                    <td class="text-center"><h4>${row.EducationalStatus === null ? '' : row.EducationalStatus}</h4></td>
                    <td class="text-center"><h4>${row.RegisterActID} <input type="hidden" id="RegisterActID" name="RegisterActID[]" value="${row.RegisterActID}"></h4></td>
                `;
                table_body.append(table_row);
                });

                $('#tbcount_3').text(`จำนวนข้อมูลทั้งหมด ${count} ชุด`);
            }
        });
    }
}


jQuery('#SuccessAllTermFinal').click(function() {
    jQuery('input[id="FinalResult"]').val('ผ');
});


function UpdateDataTermFinal(){
    let FinalResultTerm1 = $('input[name="FinalResultTerm1[]"]').map(function () {
        return $(this).val();
    }).get();

    let FinalResultTerm2 = $('input[name="FinalResultTerm2[]"]').map(function () {
        return $(this).val();
    }).get();

    let FinalResult = $('input[name="FinalResult[]"]').map(function () {
        return $(this).val();
    }).get();

    let RegisterActID = $('input[name="RegisterActID[]"]').map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        url: "Recordtheresults/RecordTheResultsSummary_Insert",
        type: 'POST',
        data: {
            FinalResultTerm1: FinalResultTerm1,
            FinalResultTerm2: FinalResultTerm2,
            FinalResult: FinalResult,
            RegisterActID: RegisterActID
        },
        success: function (response) {
            if (response == 1) {
                swal.fire({
                    icon: 'success',
                    title: 'บันทึกสรุปผลการประเมินกิจกรรมสำเร็จแล้ว',
                    type: "success"
                });
            } else if (response == 2) {
                swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถบันทึกสรุปผลการประเมินกิจกรรมได้',
                    type: "error"
                });
            }
            onChangeAct();
        }
    });
}

function ExportExcel(){
    let AcYear = $('#AcYear').val();
    let Classroom = $('#Classroom').val();
    let Act = $('#Act').val();

    $.ajax({
        url: "Recordtheresults/spreadsheet_export",
        type: 'POST',
        data: {
            AcYear: AcYear,
            Classroom: Classroom,
            Act: Act
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function (response) {
            const a = document.createElement("a");
            a.href = URL.createObjectURL(response);
            a.download = "ผลการประเมินกิจกรรมพัฒนาผู้เรียน.xlsx";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }        
    });
}