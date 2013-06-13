<?php
class IndexLoanApplicationsAction extends CAction{
    public function run()
    {
        $controller=$this->getController();
        
        $controller->render('indexLoanApplications');
    }
}

?>
