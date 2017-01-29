
$(document).ready(function () {
    $("#institute").autocomplete({
        source: 'common/autocomplete.php',
        select: function(event, ui) { 
            $("#instituteName").val(ui.item.label);
        }
    });
    $("#institute1").autocomplete({
        source: 'common/autocomplete.php',
        select: function(event, ui) { 
            $("#instituteName1").val(ui.item.label);
        }
    });
    
});
$(document).on('click','#testName',function(){
    if($("#instituteName").val() != ''){
        createTestOptions();
    }else{
        alert('Select Institution First');
    }
});

$(document).on('click','#viewDetailsLabel',function(){
    $('#attendanceTable').hide();
    var selectedInst = $('#instituteName').val();
    var selectedTest = $('#testsName').val();
    var selectedMonth = $('#mothId').val();
    var requestedRegNo = $('#regNumber').val();
        if(selectedInst == ''){
            alert('Select Institute');
        }
        if(selectedTest == ''){
            alert('Select Test');
        }
        if(requestedRegNo == ''){
            alert('Please Enter Registration Number');
        }
        if(selectedInst !='' && selectedTest != '' && requestedRegNo != ''){
            $.ajax({
                url:'common/ajax.function.php',
                data:'selectedInst='+selectedInst+'&selectedTest='+selectedTest+'&regNo='+requestedRegNo,
                method:'post',
                dataType:'json'
            }).done(function(data){
                if(data == false){
                    var reshtml = 'Sorry... No records found!!!';
                    $('#noResult').html(reshtml);
                    $('#noResult').show();
                }
                if(data != false){
                    $('#noResult').hide();
                    var reshtml = '<thead><tr class="text-center" style="text-align:center">';
                        reshtml += '<th style="padding:10px;border:1px solid black">Test Name</th>';
                        reshtml += '<th style="padding:10px;border:1px solid black">Registration Number</th>';
                        reshtml += '<th style="padding:10px;border:1px solid black">Maximum Marks</th>';
                        reshtml += '<th style="padding:10px;border:1px solid black">Marks Obtained</th>';
                        reshtml += '</tr> </thead>';
                        reshtml += '<tbody><tr class="text-center" style="text-align:center">';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resTestName">'+data[0].test_name+'</td>';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resRegNo">'+data[0].student_reg_no+'</td>';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resMaxMarks">'+data[0].max_marks+'</td>';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resMarksObtained">'+data[0].marks_obtained+'</td>';
                        reshtml += '</tr></tbody></table>';
                    $('#resultTable').html(reshtml);
                    $('#resultTable').show();
                }
            });
        }
});
$(document).on('click','#viewDetailsLabel1',function(){
    $('#resultTable').hide();
    var selectedInst = $('#instituteName1').val();
    var selectedMonth = $('#mothId').val();
    var requestedRegNo = $('#regNumber1').val();
        if(selectedInst == ''){
            alert('Select Institute');
        }
        if(selectedMonth == ''){
            alert('Enter Month');
        }
        if(requestedRegNo == ''){
            alert('Please Enter Registration Number');
        }
        if(selectedInst !='' && selectedMonth != '' && requestedRegNo != ''){ 
            $.ajax({
                url:'common/ajax.function.php',
                data:'selectedInst='+selectedInst+'&selectedMonth='+selectedMonth+'&regNo='+requestedRegNo,
                method:'post',
                dataType:'json'
            }).done(function(data){
                if(data == false){
                    var reshtml = 'Sorry... No records found!!!';
                    $('#noResult').html(reshtml);
                    $('#noResult').show();
                }
                if(data != false){
                    $('#noResult').hide();
                    var reshtml = '<thead><tr class="text-center" style="text-align:center">';
                        reshtml += '<th style="padding:10px;border:1px solid black">Registration Number</th>';
                        reshtml += '<th style="padding:10px;border:1px solid black">Month</th>';
                        reshtml += '<th style="padding:10px;border:1px solid black">Present Days</th>';
                        reshtml += '<th style="padding:10px;border:1px solid black">Absent Days</th>';
                        reshtml += '</tr> </thead>';
                        reshtml += '<tbody><tr class="text-center" style="text-align:center">';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resRegNo1">'+data[0].student_reg_no+'</td>';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resMonth">'+data[0].month+'</td>';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resPresent">'+data[0].present+'</td>';
                        reshtml += '<td style="padding:10px;border:1px solid black" id="resAbsent">'+data[0].absent+'</td>';
                        reshtml += '</tr></tbody></table>';
                    $('#attendanceTable').html(reshtml);
                    $('#attendanceTable').show();
                }
            });
        }
});


function createTestOptions(){
    $("#testName").autocomplete({
        source: function( request, response ) {        
            $.ajax({       
            url: 'common/ajax.function.php',
            data:'institute=' + $('#instituteName').val() + "&testTerm=" + request.term,
            method: 'post',
            dataType:'json',
            }).done(function(data){
                response(data);
            });   
        },
        select: function(event, ui) {
            $("#testsName").val(ui.item.label);
        }    
        
    });
}

