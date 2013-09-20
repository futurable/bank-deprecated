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
            
            // There are previous payments
            if(!empty($loanTransactions)){
                // Last payment
                $lastPayment = strtotime($loanTransactions[0]->event_date);
                // @TODO: these should really be made into constants
                switch($loan->interval){
                    case 'day':
                        $interval = 1;
                        break;
                    case 'week':
                        $interval = 7;
                        break;
                    case 'month':
                        $interval = 30;
                        break;
                    case 'year':
                        $inteval = 360;
                        break;
                }
                $interval *= 60*60*24; // interval in seconds
                $difference = time() - $lastPayment;
            }
            if(empty($loanTransactions) OR $difference > $interval ){
                # 3. Calculate the remaining loan
            }
            
            echo("\n");
        }
        
        echo( date('Y-m-d H:i:s').": MakeLoanRepayments run ended.\n\n" );
    }
}
?>
