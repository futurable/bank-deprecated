<?php
class CreateBankAccountAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        
        $model=new Account;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Account']))
        {
            $model->attributes=$_POST['Account'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $controller->render('create',array(
            'model'=>$model,
        ));
    }
}
?>
