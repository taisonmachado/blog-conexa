<?php

class ComentarioController extends GxController {

	public function actionExcluir($id) {
		$comentario = $this->loadModel($id, 'Comentario');
		$post_id = $comentario->post_id;
		if (!Yii::app()->user->isGuest && ($comentario->usuario_id == Yii::app()->user->id || $comentario->post->usuario_id == Yii::app()->user->id)) {
			$comentario->delete();

			$this->redirect(array('post/view', 'id' => $post_id));
		} else
			throw new CHttpException(400, Yii::t('app', 'Sem permissão.'));
	}

}