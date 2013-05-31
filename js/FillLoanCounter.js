fillLoanCounter = function( loanAmount, realAmount, prettyLoanTerm ){
    if( $.isNumeric(loanAmount) && $.isNumeric(realAmount) ){ 
        $("#loanAmountTd").text( (parseFloat(loanAmount).toFixed(2)) + " €" );
        $("#interestAmountTd").text( (parseFloat(realAmount-loanAmount).toFixed(2)) + " €" );
        $("#realAmountTd").text( (parseFloat(realAmount).toFixed(2)) + " €" );
        $("#termTd").text( prettyLoanTerm );

        return true;
    }
    else{
        $("#loanAmountTd").text( "--" );
        $("#interestAmountTd").text( "--" );
        $("#realAmountTd").text( "--" );
        $("#termTd").text( "--" );

        return false;
    }
};