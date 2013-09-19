<?php
# 1. Get loan accounts
# 2. Check if payment is due
# 3. Calculate the remaining loan
# 4. Make a payment
class MakeLoanRepaymentsCommand extends CConsoleCommand
{
    public function run($args)
    {   
        # 1. Get all loan accounts
        $loanAccounts = Loan::model()->findAll();
    }
?>
