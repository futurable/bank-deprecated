<?php
class ListAction extends CAction{
    public function run(){
        $controller=$this->getController();
        
        $account = new Account();
        $ibanDropdown = $controller->getIbanDropdown();
        $action = 'list';
        
        $controller->render('list',array(
            'account'=>$account,
            'action'=>$action,
            'ibanDropdown'=>$ibanDropdown,
        ));
    }   
}

?>
