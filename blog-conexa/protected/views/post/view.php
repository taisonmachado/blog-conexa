<div class="d-flex justify-content-between align-items-center">
	<h6 class="categoria-post"><?php echo GxHtml::encode(GxHtml::valueEx($model->categoria)); ?></h6>
	<?php if(!Yii::app()->user->isGuest && Yii::app()->user->id == $model->usuario->usuario_id) { ?>
	<div>
		<a href="/index.php?r=post/update&id=<?php echo $model->post_id ?>" title="Editar Post" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
		<button onclick="excluirPostagem('<?php echo $model->post_id ?>')" title="Excluir Post" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
	</div>
	<?php } ?>
</div>

<h2><?php echo GxHtml::encode($model->titulo);?></h2>
<small>Publicado em: <?php echo Util::dataHora($model->data);?></small>
<br>
<p class="font-weight-bold text-dark">Autor(a): <?php echo GxHtml::encode($model->usuario->nome); ?></p>
<p class="mt-3"><?php echo GxHtml::encode($model->texto);?></p>


<h4>Comentários</h4>
<div>
<?php
	if(!Yii::app()->user->isGuest){
		$this->renderPartial('_formComentario', array(
			'model' => $comentario,
			'buttons' => 'create',
		));
	} else {
		echo GxHtml::openTag('h6');
		echo "Faça login para comentar*";
		echo GxHtml::closeTag('h6');
	}
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
</div>

<script>
	function excluirComentario(comentarioId) {
		let url = "index.php?r=comentario/delete&id=" + comentarioId;
		$('#modalExcluirTitulo').html('Excluir comentário?');
		$('#modalExcluir').modal('show');
		$('#modalBtnExcluir').attr('href', url);
	}

	function excluirPostagem(postagemId) {
		let url = "index.php?r=post/delete&id=" + postagemId;
		$('#modalExcluirTitulo').html('Tem certeza que deseja excluir esse post?');
		$('#modalExcluir').modal('show');
		$('#modalBtnExcluir').attr('href', url);
	}
</script>