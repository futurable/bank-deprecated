$(document).ready(function(){ 
    
    var toggleFields = function(){
        // Show repayment
        if($("#Loan_type").val() == "fixedRepayment"){
          $(".loanRepayment").fadeIn("slow");
            if($(".loanInstalment").is(":visible")){ $(".loanInstalment").hide(); }
            if($(".loanTerm").is(":visible")){ $(".loanTerm").hide(); }
        }
        // Show instalment
        if($("#Loan_type").val() == "fixedInstalment"){
            if($(".loanRepayment").is(":visible")){ $(".loanRepayment").hide(); }
            $(".loanInstalment").fadeIn("slow");
            if($(".loanTerm").is(":visible")){ $(".loanTerm").hide(); }
        }
        // Show term
        if($("#Loan_type").val() == "annuity"){
            if($(".loanRepayment").is(":visible")){ $(".loanRepayment").hide(); }
            if($(".loanInstalment").is(":visible")){ $(".loanInstalment").hide(); }
            $(".loanTerm").fadeIn("slow");
        }
    };
    
    toggleFields();

    $("#Loan_type").change(function(){
        toggleFields();
    });

});