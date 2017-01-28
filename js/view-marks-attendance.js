
$(document).ready(function () {
     $("#institute").autocomplete({
        source: 'common/autocomplete.php',
        select: function(event, ui) { 
            $("#instituteName").val(ui.item.label);
        }
    });
   
    

    
});

$(document).on('focusout','#institute',function(){
    var institute = $('#instituteName').val();
    $.ajax({
        url: 'common/ajax.function.php',
        method: 'post',
        data:'institute='+institute,
    }).done(function(data){
        if(data){
          createTestOptions(data);
        }
        return false;
    });
});

function createTestOptions(data){

    $("#testName").autocomplete({   
        autoFocus:true,
        source: function( request, response ) {        
            $.ajax({       
            url: 'common/ajax.function.php',
            data:'institute=' + $('#instituteName').val() + "&testTerm=" + request.term,
            method: 'post',
            dataType:'json',
            success: function( data ) {  
                var populateValue = $.parseJSON(data);
                console.log(populateValue);
            }
           });   
        },    
        minLength: 0,
        select: function(event, ui) { 
            $("#testsName").val(ui.item.label);
        }
    });
}

