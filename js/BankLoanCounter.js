$(document).ready(function(){ 
    
    getIntervalInDays = function(loanInterval){
        var loanIntervalInDays;

        if(loanInterval == "day"){ loanIntervalInDays = 1; }
        else if(loanInterval == "week"){ loanIntervalInDays = 7; }
        else if(loanInterval == "month"){ loanIntervalInDays = 30; }
        else if(loanInterval == "year"){ loanIntervalInDays = 365; }
        else { loanIntervalInDays = 0; }

        return loanIntervalInDays;
    }
    
    getLoanInterestPart = function(interest, loanIntervalInDays){    
        var interestDaily = interest / 360;
        var interestPart = interestDaily * loanIntervalInDays;
        
        return interestPart;
    }
    
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
        var loanInterest = $("#Loan_bank_interest_id option:selected").text().match(/[0-9][.][0-9]+/) / 100; 
        
        var loanIntervalInDays = getIntervalInDays(loanInterval);
        var loanInterestPart = getLoanInterestPart(loanInterest, loanIntervalInDays); alert (loanInterestPart);
        
        //var realAmount = fillPaymentPlan(loanAmount, loanInterestPart);
        //fillLoanCounter(loanAmount, realAmount);
    }
    
    loanCounter();
	
	$("#createLoanApplicationForm input").keyup(function(){
        loanCounter();	
	});
	$("#createLoanApplicationForm select").change(function(){
        loanCounter();
	});
});