$(document).on('change','#institution',function(){
    var selectedInstitue = $( "#institution option:selected" ).val();
    $.ajax({
        url: 'common/ajax.function.php',
        method: 'post',
        data:'instituteId='+selectedInstitue,
    }).done(function(data){
        if(data){
          createTestOptions(data);
        }
        return false;
    });
});

function createTestOptions(data){
    var htmlContent = '<option value=""  selected disabled>--SELECT TEST--</option>';
    if(data){
        var testData = JSON.parse(data);
        $.each(testData,function(key,value){
            htmlContent += '<option name="test_id" value='+value.id+'>'+value.test_name+'</option>';
        $(".test").html(htmlContent);
        });
    }
}