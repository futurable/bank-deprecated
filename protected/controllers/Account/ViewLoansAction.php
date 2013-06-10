<?php
class ViewLoansAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();

        $controller->render('viewLoans',array(
            
        ));
    }
}
?>
