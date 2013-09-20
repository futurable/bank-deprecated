<?php
# 1. Get loan accounts
# 2. Check if payment is due
# 3. Calculate the remaining loan
# 4. Make a payment
class MakeLoanRepaymentsCommand extends CConsoleCommand
{
    public function run($args)
    {   
        echo( date('Y-m-d H:i:s').": MakeLoanRepayments run started.\n" );
        
        # 1. Get all active loans
        $loans = Loan::model()->findAll(array('condition'=>'status="active"'));
        
        foreach($loans as $loan){
            $loanTransactions = LoanTransaction::model()->findAll(
                    array(
                        'condition'=>"bank_loan_id=:id", 
                        'params'=>array(':id'=>$loan->id),
                        'order'=>'event_date',
                    ));
            
            echo("Using company {$loan->bankUser->profile->company}\n");
            echo("Using account {$loan->bankAccount->iban}\n");
            
            # 2. Check if a payment is due
            echo(count($loanTransactions)." previous loan transactions found\n");
            
            // There are previous payments
            if(!empty($loanTransactions)){
                // Last payment
                $lastPayment = strtotime($loanTransactions[0]->event_date);
                $interval = $this->getInterval($loan->interval);
                
                $interval *= 60*60*24; // interval in seconds
                $difference = time() - $lastPayment;
            }
            if(empty($loanTransactions) OR $difference > $interval ){
                if(empty($loanTransactions)){
                    $difference = time() - strtotime($loan->accept_date);
                }
                
                # 3. Calculate the payment amount
                 $saldo = BankSaldo::getAccountSaldo($loan->bankAccount->iban);
                 $dailyInterest = $loan->interest / 100 / 360; // Get the interest daily part
                 $differenceDays = floor($difference / 24 / 60 / 60); // Difference in whole days;
                 
                 $interestPart = number_format(-$saldo * $dailyInterest * $differenceDays, 2);
                 
                 echo( "Loan type is {$loan->type}\n" );
                 switch($loan->type){
                     case 'fixedRepayment':
                         $repayment = $loan->repayment;
                         $instalment = $repayment - $interestPart;
                         break;
                     case 'fixedInstalment':
                         $instalment = $loan->instalment;
                         $repayment = $instalment + $interestPart;
                         break;
                     case 'annuity':  
                         $term = $loan->term;
                         $interval = $this->getInterval( $loan->term_interval );
                         $days = $term*$interval;
                         $repayment = $saldo / $days;
                         $instalment = $repayment - $interestPart;
                         break;
                 }
                 
                 echo( "Repayment is {$repayment}\n"); 
                 echo( "Instalment is {$instalment}\n" );
                 echo( "Interest is $interestPart\n" );
            }
            
            echo("\n");
        }
        
        echo( date('Y-m-d H:i:s').": MakeLoanRepayments run ended.\n\n" );
    }
    
    private function getInterval($interval){
        if( substr($interval, -1) == 's' ) $interval = substr($interval, 0, -1); // Strip the unnecessary 's' away
        
        // @TODO: these should really be made into constants
        switch($interval){
            case 'day':
                $intervalInDays = 1;
                break;
            case 'week':
                $intervalInDays = 7;
                break;
            case 'month':
                $intervalInDays = 30;
                break;
            case 'year':
                $intervalInDays = 360;
                break;
        }
        
        return $intervalInDays;
    }
}
?>
