<?php
echo GxHtml::openTag('div', array('class' => 'mt-4'));
echo '<hr>';
foreach($model->comentarios as $relatedModel) {
	echo GxHtml::openTag('div', array('class' => 'd-flex justify-content-between align-items-center'));
	echo GxHtml::openTag('h6');
	echo GxHtml::encode($relatedModel->usuario->nome);
	echo " - ";
	echo GxHtml::openTag('small');
	echo Util::dataHora($relatedModel->data);
	echo GxHtml::closeTag('small');
	//echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('comentario/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
	echo GxHtml::closeTag('h6');
	if(!Yii::app()->user->isGuest && ($relatedModel->usuario_id == Yii::app()->user->id || $model->usuario_id == Yii::app()->user->id)){
		echo GxHtml::openTag('button', array(
			'class' => 'btn btn-danger btn-sm',
			'title' => 'Excluir Comentário',
			'onclick' => "excluirComentario('{$relatedModel->comentario_id}')",
		));
		echo '<i class="fas fa-trash-alt"></i>';
		echo GxHtml::closeTag('button');
	}
	echo GxHtml::closeTag('div');
	
	echo GxHtml::openTag('p');
	echo GxHtml::encode(GxHtml::valueEx($relatedModel));
	echo GxHtml::closeTag('p');
	echo GxHtml::openTag('hr');
}
echo GxHtml::closeTag('div');
?>