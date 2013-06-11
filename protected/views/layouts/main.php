<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/futural.css" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/img/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryui/futural/jquery-ui.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    
<div class='disclaimer'>
    <p>
            Welcome to <a href='http://futurable.fi/index.php/en/tuotteet-ja-palvelut/oppimisymparistot'>Futural</a> - a virtual learning environment 
            by <a href='http://futurable.fi'>Futurable</a>.
            <a href="mailto:futurality@futurable.fi?subject=Feedback">Give feedback</a> 
    </p>
</div>
    
<div class="container" id="page">

        <div id="logo">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/img/futural_logo_bank.png'); ?>
            <?php //echo CHtml::encode(Yii::app()->name); ?>
            
            <div id="uibox">
                <?php $this->widget('application.components.LangBox'); ?>
                
                <p><?php
                if(isset($this->WebUser)){
                    echo $this->WebUser->profile->firstname." ".$this->WebUser->profile->lastname."<br/>";
                    echo $this->WebUser->profile->company."<br/>";
                    echo CHtml::link(Yii::t('Menu','Logout'),array('user/logout'));
                } ?></p>
            </div>
           
        </div>

	<div id="mainmenu">
		<?php 
                if(Yii::app()->getModule('user')->isAdmin()){
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Accounts', 'url'=>array('/account/'), 'items'=>array(
                                array('label'=>'Create', 'url'=>array('/account/createBankAccount')),
                                array('label'=>'Manage', 'url'=>array('/account/admin')),
                                array('label'=>'Loan Applications', 'url'=>array('/account/manageLoanApplication')),
                                ),  
                            ),
                            array('label'=>'Users', 'url'=>array('/user')),
                            array('label'=>'Rights', 'url'=>array('/rights')),
                        )
                    ));     
                }
                elseif(!Yii::app()->user->isGuest){
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array(
                                'label'=>Yii::t('Menu', 'FrontPage'), 
                                'url'=>array('/site/index'), 
                                'linkOptions'=>array('id'=>'menuFrontPage'),
                            ),
                            array(
                                'label'=>Yii::t('Menu', 'NewTransaction'), 
                                'url'=>array('/accountTransaction/create'), 
                                'linkOptions'=>array('id'=>'menuNewTransaction'),
                            ),
                            array(
                                'label'=>Yii::t('Menu', 'PaymentsForDue'), 
                                'url'=>array('/accountTransaction/listPaymentsForDue'), 
                                'linkOptions'=>array('id'=>'menuPaymentsForDue'),
                            ),
                            array(
                                'label'=>Yii::t('Menu', 'Transactions'), 
                                'url'=>array('/accountTransaction/listTransactions'), 
                                'linkOptions'=>array('id'=>'menuTransactions'),
                            ),
                            array(
                                'label'=>Yii::t('Menu', 'LoanApplications'),
                                'url'=>array('/account/createLoanApplication'),
                                'linkOptions'=>array('id'=>'menuLoanApplications'),
                            ),
                            array(
                                'label'=>Yii::t('Menu', 'Loans'),
                                'url'=>array('/account/viewLoans'),
                                'linkOptions'=>array('id'=>'menuLoans'),
                            ),
                        ),
                    ));
                } 
                ?>
	</div><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        <a href='https://github.com/futurable/bank'>Futural Bank</a><br/>
        By <a href='http://futurable.fi'>Futurable Oy</a><br/>
        <?php echo date('Y'); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
