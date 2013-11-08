$(document).ready(function(){ 
    $("#AccountTransaction_amount").keyup(function(){
        var amount = $("#AccountTransaction_amount").val();
        var fixedVal = ReplaceCommaWithDot(amount);
        
        $("#AccountTransaction_amount").val(fixedVal);
    });
});