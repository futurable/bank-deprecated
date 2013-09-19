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
        
        # 1. Get all loan accounts
        $loans = Loan::model()->findAll(array('condition'=>'bank_user_id=103'));
        
        foreach($loans as $loan){
            
            echo("Using company {$loan->bankUser->profile->company}\n");
            echo("Using account {$loan->bankAccount->iban}\n");
            
            echo("\n");
        }
        
        echo( date('Y-m-d H:i:s').": MakeLoanRepayments run ended.\n\n" );
    }
}
?>
