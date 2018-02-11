<?php 
namespace app\controllers;

use Yii;

class PostController extends AppController {

	public $layout = 'basic';

	public function beforeAction($action){
		if( $action->id == 'index' ){
			$this->enableCsrfValidation = false;
		}
		return parent::beforeAction($action);
	}

	public function actionIndex(){
		if( Yii::$app->request->isAjax){
			debug($_POST);
			return 'test';
		}
		return $this->render('test');
	}

	public function actionShow(){
		$this->view->title = 'Одна статья';
		return $this->render('show');
	}
}


 ?>