<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('usuario_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->usuario_id), array('view', 'id' => $data->usuario_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('senha')); ?>:
	<?php echo GxHtml::encode($data->senha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('telefone')); ?>:
	<?php echo GxHtml::encode($data->telefone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_nascimento')); ?>:
	<?php echo GxHtml::encode($data->data_nascimento); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cadastrado')); ?>:
	<?php echo GxHtml::encode($data->cadastrado); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('atualizado')); ?>:
	<?php echo GxHtml::encode($data->atualizado); ?>
	<br />
	*/ ?>

</div>