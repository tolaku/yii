<?php 
namespace app\controllers;

use Yii;

use app\models\TestForm;

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
			debug(Yii::$app->request->post());
			return 'test';
		}

		$this->view->title = 'Все статьи';
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики .....']);
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'Описание статьи .....']);

		// создаем объект модели TestForm
		$model = new TestForm();

		// проверяем, есть ли данные
		if( $model->load(Yii::$app->request->post()) ){
			// если данные по валидированные
			if( $model->validate() ){
				Yii::$app->session->setFlash('success', 'Данные приняты');
				return $this->refresh();
			}else{
				Yii::$app->session->setFlash('error', 'Ошибка');
			}
		}

		return $this->render('test', compact('model'));
	}

	public function actionShow(){
		$this->view->title = 'Одна статья';
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики .....']);
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'Описание статьи .....']);
		return $this->render('show');
	}
}


 ?>