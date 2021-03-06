<?php

class UsuarioController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Usuario'),
		));
	}

	public function actionCadastro() {
		$model = new Usuario('cadastro');


		if (isset($_POST['Usuario'])) {
			// $model->setAttributes($_POST['Usuario']);
			$usuario = $_POST['Usuario'];
			$model->email = $usuario['email'];
			$model->senha = $model->hashSenha($usuario['senha']);
			$model->nome = $usuario['nome'];
			$model->data_nascimento = $usuario['data_nascimento'];
			$model->telefone = $usuario['telefone'];
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->usuario_id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Usuario');


		if (isset($_POST['Usuario'])) {
			$model->setAttributes($_POST['Usuario']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->usuario_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Usuario')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Usuario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Usuario('search');
		$model->unsetAttributes();

		if (isset($_GET['Usuario']))
			$model->setAttributes($_GET['Usuario']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
}