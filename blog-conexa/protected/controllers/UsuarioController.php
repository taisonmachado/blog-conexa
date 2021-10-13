<?php

class UsuarioController extends GxController {

	public function actionCadastro() {
		$model = new Usuario('cadastro');


		if (isset($_POST['Usuario'])) {
			// $model->setAttributes($_POST['Usuario']);
			$usuario = $_POST['Usuario'];
			$model->email = $usuario['email'];
			$model->senha = $usuario['senha'];
			$model->nome = $usuario['nome'];
			$model->data_nascimento = $usuario['data_nascimento'];
			$model->telefone = $usuario['telefone'];
			if($model->validate()){
				$model->senha = $model->hashSenha($usuario['senha']);
				$model->cadastrado=new CDbExpression('NOW()');
				$model->atualizado=new CDbExpression('NOW()');
				if ($model->save()) {
					$model->senha = $usuario['senha'];
					if($model->login())
						$this->redirect(array('editar'));
				}
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionEditar() {
		$model = $this->loadModel(Yii::app()->user->id, 'Usuario');


		if (isset($_POST['Usuario'])) {
			$usuario = $_POST['Usuario'];
			$model->email = $usuario['email'];
			$model->nome = $usuario['nome'];
			$model->data_nascimento = $usuario['data_nascimento'];
			$model->telefone = $usuario['telefone'];
			$model->atualizado=new CDbExpression('NOW()');
			if ($model->save()) {
				$this->redirect(array('editar'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function filters()
    {
        return array(
            'accessControl',
        );
    }

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('cadastro'),
					'users'=>array('*'),
					),
				array('allow', 
					'users'=>array('@'),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}
}