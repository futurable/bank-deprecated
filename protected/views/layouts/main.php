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

        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/futural.css" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/img/favicon.ico" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    
<div class='disclaimer'>
    <p>
            Welcome to <a href='http://futurable.fi/index.php/en/tuotteet-ja-palvelut/oppimisymparistot'>Futural</a> - a virtual learning environment 
            by <a href='http://futurable.fi'>Futurable</a>.
            <a href='#'>Give feedback</a>.
    </p>
</div>
    
<div class="container" id="page">

        <div id="logo">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/img/futural_logo_bank.png'); ?>
            <?php //echo CHtml::encode(Yii::app()->name); ?>
        </div>

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                    array('label'=>'Front page', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'New transaction', 'url'=>array('/accountTransaction/create'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Payments for due', 'url'=>array('/accountTransaction/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Transactions', 'url'=>array('/account/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Loan applications', 'url'=>array('/account/create'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Loans', 'url'=>array('/account/view'), 'visible'=>!Yii::app()->user->isGuest),
                   
                    array('label'=>'Users', 'url'=>array('/user'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                    array('label'=>'Rights', 'url'=>array('/rights'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                    array('label'=>'Profile', 'url'=>array('/user/login'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                    array('label'=>'Logout', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
		)); ?>
	</div><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Futurable Oy<br/>
		All Rights Reserved<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
