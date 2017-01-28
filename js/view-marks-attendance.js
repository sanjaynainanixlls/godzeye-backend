
$(document).ready(function () {
     $("#institute").autocomplete({
        source: 'common/autocomplete.php',
        select: function(event, ui) { console.log(ui);
            $("#instituteName").val(ui.item.id);
        }
    });
   
    

    
});

$(document).on('click','#testName',function(){
    var institute = $('#institute').text();alert();
    console.log(institute);
});

