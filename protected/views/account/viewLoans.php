<h1><?php echo Yii::t('Account', 'Loans')?></h1>
<?php
foreach($Accounts as $Account){
    echo "<p>$Account->iban</p>";
}
?>
