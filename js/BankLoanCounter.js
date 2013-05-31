$(document).ready(function(){ 
    
    loanCounter = function(){
        // Get variables
        var loanAmount = $("#Loan_amount").val();
		var loanType = $("#Loan_type option:selected").val();
        var loanRepayment = $("#Loan_repayment");
        var loanInstalment = $("#Loan_instalment");
		var loanInterval = $("#Loan_interval").val();
        var loanTerm = $("#Loan_term option:selected").text();
        var loanTermInterval = $("#Loan_term_interval option:selected").val();
        var interestType = $("#Loan_bank_interest_id option:selected").val();
        var loanInterest = $("#Loan_bank_interest_id option:selected").text().match(/[0-9][.][0-9]+/); 
        var realAmount = 0;
        
    }
    
    loanCounter();
	
	$("#createLoanApplicationForm input").keyup(function(){
        loanCounter();	
	});
	$("#createLoanApplicationForm select").change(function(){
        loanCounter();
	});
    
});