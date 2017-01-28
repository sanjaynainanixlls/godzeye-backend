
$(document).ready(function () {
    //alert('aa');
     $("#institute").autocomplete({
        source: 'common/autocomplete.php',
        select: function(event, ui) { 
            //var val = JSON.stringify(ui);
            //console.log(ui.item.label);
            $("#instituteName").val(ui.item.label);
        }
    });
   
    

    
});

$(document).on('click','#testName',function(){
    var institute = $('#institute').text();alert();
    console.log(institute);
});

