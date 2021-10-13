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
				if ($model->save()) {
					if (Yii::app()->getRequest()->getIsAjaxRequest())
						Yii::app()->end();
					else
						$this->redirect('index.php?r=site/login');
				}
			}
		}

		$this->render('create', array( 'model' => $model));
	}
}