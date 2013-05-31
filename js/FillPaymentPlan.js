getTermInDays = function( term ){
    var termInDays;

    if(term == "days"){ termInDays = 1; }
    else if(term == "weeks"){ termInDays = 7; }
    else if(term == "months"){ termInDays = 30; }
    else if(term == "years"){ termInDays = 360; }
    else{ termInDays = 0; }

    return termInDays;
};

fillPaymentPlan = function( loanAmount, loanInterestPart, loanIntervalInDays){
	if( $.isNumeric(loanAmount) && $.isNumeric(loanInterestPart) && $.isNumeric(loanIntervalInDays) ){
		var repaymentNumber = 0;
		var instalmentAmount;
		var interestAmount;
		var repaymentAmount;
		loanAmount = Number(loanAmount);
        loanInterest = Number(loanInterestPart);
        var realAmount = loanAmount;

		var loanType = $("#Loan_type").val();
		
		// Loan types
		if( loanType == 'fixedRepayment' ){
			repaymentAmount = Number($("#Loan_repayment").val());
		}
		else if( loanType == 'fixedInstalment' ){
			instalmentAmount = Number($("#Loan_instalment").val());
		}
        else if( loanType == 'annuity' ){
			loanTerm =  Number($("#Loan_term").val());
			var termMultiplier = getTermInDays();
			
			loanDays = loanTerm * termMultiplier;
			payments = loanDays / loanIntervalInDays;
			
			nominator = loanAmount * interest;
			denominator = 1 - ( Math.pow( 1 + interest, -payments ) );
			repaymentAmount = nominator / denominator;
		}
		
		var loanCounterContent = "<tr class='paymentPlanTr'>" + $('#paymentPlanTable tr:first').html() + "</tr>";
		
		while(loanAmount > 0.01){ // We don't use 0 here as the JS rounding functions are funky
			repaymentNumber++;
			
			interestAmount = loanAmount*loanInterest;
			var loanWithInterest = parseFloat(loanAmount+interestAmount);
            realAmount += interestAmount;
			
			if( loanType == 'fixedInstalment' ){
				repaymentAmount = instalmentAmount + interestAmount;
			}
			
			if(instalmentAmount <= 0){ break; }; // Don't count if instalment is zero or negative
			
			if(repaymentAmount >= loanWithInterest){ repaymentAmount = loanAmount+interestAmount; };
			instalmentAmount = repaymentAmount - interestAmount;
            if(instalmentAmount < 0) instalmentAmount = 0;
			
			loanAmount = loanAmount + interestAmount;
			loanAmount -= repaymentAmount;
			loanAmount = Math.round(loanAmount*1000) / 1000;
			
			loanCounterContent +=
			'<tr class=\'paymentPlanTr\'>'
				+ '<td>' + repaymentNumber + '.</td>'
				+ '<td>' + (parseFloat(instalmentAmount).toFixed(2)) + ' &euro;</td>'
				+ '<td>' + (parseFloat(interestAmount).toFixed(2)) + ' &euro;</td>'
				+ '<td>' + (parseFloat(repaymentAmount).toFixed(2)) + ' &euro;</td>'
				+ '<td>' + (parseFloat(loanAmount).toFixed(2)) + ' &euro;</td>'
			+ '</tr>';
			
			if(repaymentNumber >= 300){ // Break if loan longer than 25*12 (25 years with monthly repayment)
				loanCounterContent += '<tr class=\'paymentPlanTr\'><td colspan="5">...</td>';
				break;
			}
		}
		
		$('#paymentPlanTable').html( loanCounterContent );
        return realAmount;
	}
	else{
		var loanCounterContent = "<tr class='paymentPlanTr'>" + $('#paymentPlanTable tr:first').html() + "</tr>";
		$('#paymentPlanTable').html( loanCounterContent );
	}
};