<?php
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
                 
                 // Get account to use for the payment
                 // @TODO: globalize this function
                $AccountId = Account::model()->find(array(
                    'select'=>'id',
                    'condition'=>'bank_user_id=:bankUser AND bank_account_type_id=1',
                    'params'=>array(':bankUser'=>$loan->bankAccount->bank_user_id),
                ))->id;
                $Account=Account::model()->findByPk($AccountId);
                
                $transaction = Yii::app()->db->beginTransaction();
                
                // Make a new bank transaction
                $accountTransaction = new AccountTransaction;
                
                $accountTransaction->scenario = 'loanInit'; // Setup scenario so the account amount validator doesn't act up
                $accountTransaction->recipient_iban = $loan->bankAccount->iban;
                $accountTransaction->recipient_bic = $loan->bankAccount->bankBic->bic;
                $accountTransaction->recipient_name = "Futural bank"; // @TODO: get this from somewhere
                $accountTransaction->payer_iban = $Account->iban;
                $accountTransaction->payer_bic = $loan->bankAccount->bankBic->bic;
                $accountTransaction->payer_name = $loan->bankAccount->bankUser->profile->company;
                $accountTransaction->event_date = date('d.m.Y');
                $accountTransaction->amount = $repayment;
                $accountTransaction->message = Yii::t('Loan', 'Repayment');
                
                $accountTransactionSuccess = $accountTransaction->save();
                
                // Make a new loan transaction
                $loanTransaction = new LoanTransaction;
                
                $sequenceNumber = empty($loanTransactions) ? 1 : $loanTransactions[0]->sequence_number + 1;
                $loanTransaction->sequence_number = $sequenceNumber;
                $loanTransaction->instalment_amount = $instalment;
                $loanTransaction->interest_amount = $interestPart;
                $loanTransaction->bank_loan_id = $loan->id;
                $loanTransaction->bank_account_transaction_id = $accountTransaction->id;
                 
                $loanTransactionSuccess = $loanTransaction->save();
                
                if($accountTransactionSuccess && $loanTransactionSuccess){
                    $transaction->commit();
                    echo( "Transaction made\n" );
                }
                else{
                    $transaction->rollback();
                    echo( "Transaction failed\n" );
                }
            }
            else echo( "No payments due.\n");
            
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
