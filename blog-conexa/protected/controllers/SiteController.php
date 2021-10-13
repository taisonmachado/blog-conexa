<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria(array(
			'order' => 'data DESC',
			'with' => 'comentarios',
		));

		$dataProvider = new CActiveDataProvider('Post', array(
			'pagination' => array(
				'pageSize' => 10),
			'criteria' => $criteria,
			'totalItemCount' => 10,
		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new Usuario('login');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Login']))
		{
			$login = $_POST['Login'];
			$model->email=$login['email'];
			$model->senha=$login['senha'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				if($model->login()){
					$this->redirect(Yii::app()->user->returnUrl);
				} else {
					$model->addError('senha', 'Senha inválida');
				}
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}