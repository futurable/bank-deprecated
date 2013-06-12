<div class="span-19">
<?php
/* @var $this SiteController */

    $this->pageTitle=Yii::app()->name;

    echo "<h1>";
    echo Yii::t("FrontPage", "WelcomeText");
    echo "</h1>";
    
    echo Yii::t("FrontPage", "DescriptionText");
?>
</div>
