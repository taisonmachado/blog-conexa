<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'comentario_id'); ?>
		<?php echo $form->textField($model, 'comentario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'texto'); ?>
		<?php echo $form->textArea($model, 'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data'); ?>
		<?php echo $form->textField($model, 'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'usuario_id'); ?>
		<?php echo $form->dropDownList($model, 'usuario_id', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true)), array('prompt' => 'All')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'post_id'); ?>
		<?php echo $form->dropDownList($model, 'post_id', GxHtml::listDataEx(Post::model()->findAllAttributes(null, true)), array('prompt' => 'All')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cadastrado'); ?>
		<?php echo $form->textField($model, 'cadastrado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'atualizado'); ?>
		<?php echo $form->textField($model, 'atualizado'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
