<h1><?php echo Yii::t('AccountTransaction', 'Transactions'); ?></h1>

<div class='well'>
    <?php echo $this->renderPartial('_listAccounts', array('Account'=>$Account, 'ibanDropdown'=>$ibanDropdown)); ?>
    <?php if(is_array($AccountTransactions)){
        echo $this->renderPartial('_listTransactionsSummary', array('Account'=>$Account)); 
        echo $this->renderPartial('_listTransactions', array('AccountTransactions'=>$AccountTransactions, 'Account'=>$Account));
    }
    ?>
</div>