<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'comentario-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model, 'texto'); ?>
		<?php echo $form->error($model,'texto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model, 'data'); ?>
		<?php echo $form->error($model,'data'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'usuario_id'); ?>
		<?php echo $form->dropDownList($model, 'usuario_id', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'usuario_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'post_id'); ?>
		<?php echo $form->dropDownList($model, 'post_id', GxHtml::listDataEx(Post::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'post_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cadastrado'); ?>
		<?php echo $form->textField($model, 'cadastrado'); ?>
		<?php echo $form->error($model,'cadastrado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'atualizado'); ?>
		<?php echo $form->textField($model, 'atualizado'); ?>
		<?php echo $form->error($model,'atualizado'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton('Save');
$this->endWidget();
?>
</div><!-- form -->