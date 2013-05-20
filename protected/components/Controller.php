<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        public $WebUser;
        
        function init()
        {
            if(isset(Yii::app()->user->id)){
                $this->WebUser= User::model()->findbyPk( Yii::app()->user->id );
            }
                
            parent::init();
            $app = Yii::app();
            if (isset($_POST['_lang']))
            {
                $app->language = $_POST['_lang'];
                $app->session['_lang'] = $app->language;
            }
            else if (isset($app->session['_lang']))
            {
                $app->language = $app->session['_lang'];
            }
        }
        
        public function filters()
        {
            return array( 'accessControl' ); // perform access control for CRUD operations
        }

        public function accessRules()
        {
            return array(
                array('allow',
                    'actions'=>array('login', 'registration','recovery'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated users to access all actions
                    'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('admin','delete'),
                        'users'=>array('admin'),
                ),
                array('deny'),
            );
        }
        
        public function filterAccessControl($filterChain)
        {   
            $rules = $this->accessRules();

            // default deny
            $rules[] = array('deny');

            $filter = new CAccessControlFilter;
            $filter->setRules( $rules );
            $filter->filter($filterChain);
        }
}