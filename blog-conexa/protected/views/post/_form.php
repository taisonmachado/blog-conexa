<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'post-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		Campos obrigatórios <span class="required">*</span>.
	</p>

	<div class="row">
	<?php echo $form->labelEx($model,'titulo'); ?>
	<?php echo $form->textField($model, 'titulo', array('maxlength' => 255, 'class' => 'form-control')); ?>
	<?php echo $form->error($model,'titulo'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'texto'); ?>
	<?php echo $form->textArea($model, 'texto', array('class' => 'form-control', 'rows' => '10')); ?>
	<?php echo $form->error($model,'texto'); ?>
	</div><!-- row -->
	<div class="row">
		<div class="col-md-6 pl-0">
			<?php echo $form->labelEx($model,'categoria_id'); ?>
			<?php echo $form->dropDownList($model, 'categoria_id', GxHtml::listDataEx(Categoria::model()->findAllAttributes(null, true)), array('class' => 'form-control')); ?>
			<?php echo $form->error($model,'categoria_id'); ?>
		</div>
	</div>
<?php
echo GxHtml::submitButton('Salvar', array('class' => 'btn btn-conexa'));
$this->endWidget();
?>
</div><!-- form -->