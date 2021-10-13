<div class="card mb-3">
  <div class="card-body">
	<div class="d-flex justify-content-between align-items-center">
		<h6 class="categoria-post"><?php echo GxHtml::encode(GxHtml::valueEx($data->categoria)); ?></h6>
		<?php if(!Yii::app()->user->isGuest && Yii::app()->user->id == $data->usuario->usuario_id) { ?>
		<div>
			<a href="/index.php?r=post/update&id=<?php echo $data->post_id ?>" title="Editar Post" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
			<button onclick="excluirPostagem('<?php echo $data->post_id ?>')" title="Excluir Post" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
		</div>
		<?php } ?>
	</div>
    <h5 class="titulo-post"><?php echo GxHtml::encode($data->titulo); ?></h5>
	<small>Publicado em: <?php echo Util::dataHora($data->data); ?></small>
	<p class="font-weight-bold text-dark">Autor(a): <?php echo GxHtml::encode($data->usuario->nome); ?></p>
    <p class="card-text mt-3">
		<?php echo Util::truncate($data->texto, 650); ?>
	</p>
	<div class="row pl-3">
		<?php echo GxHtml::link('Acessar', array('post/view', 'id' => $data->post_id), array('class' => 'btn btn-conexa')); ?>
		<?php //echo GxHtml::link('Comentar', "/index.php?r=post/view&id={$data->post_id}", array('class' => 'btn btn-secondary ml-3')); ?>
	</div>
  </div>
</div>

<?php /*
<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('post_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->post_id), array('view', 'id' => $data->post_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('titulo')); ?>:
	<?php echo GxHtml::encode($data->titulo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('texto')); ?>:
	<?php echo GxHtml::encode($data->texto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data')); ?>:
	<?php echo GxHtml::encode($data->data); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('visualizacoes')); ?>:
	<?php echo GxHtml::encode($data->visualizacoes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('categoria')); ?>:
	<?php echo GxHtml::encode(GxHtml::valueEx($data->categoria)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('Autor')); ?>:
	<?php echo GxHtml::encode(GxHtml::valueEx($data->usuario)); ?>
	<br />
	?>

</div>*/
?>



<script>
	function excluirPostagem(postagemId) {
		let url = "index.php?r=post/delete&id=" + postagemId;
		$('#modalExcluirTitulo').html('Tem certeza que deseja excluir esse post?');
		$('#modalExcluir').modal('show');
		$('#modalBtnExcluir').attr('href', url);
	}
</script>