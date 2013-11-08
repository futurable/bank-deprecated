$(document).ready(function(){ 
    $("#AccountTransaction_amount").keyup(function(){
        var amount = $("#AccountTransaction_amount").val();
        var trimmedVal = ReplaceSpaceWithEmpty(amount);
        var fixedVal = ReplaceCommaWithDot(trimmedVal);
        
        $("#AccountTransaction_amount").val(fixedVal);
    });
});