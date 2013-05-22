<?php
class CreateBankAccountAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        $Account=new Account;

        if(isset($_POST['Account']))
        {
            $Account->attributes=$_POST['Account'];
            //if($Account->save())
                //$this->redirect(array('view','id'=>$Account->id));
        }

        $controller->render('createBankAccount',array(
            'Account'=>$Account,
        ));
    }
}
?>
