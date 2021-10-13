<h1>Meus dados</h1>

<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
		'id' => 'usuario-form-edit',
		'enableAjaxValidation' => false,
	));
	?>

	<p class="note">
		Campos Obrigatórios<span class="required">*</span>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'nome'); ?>
				<?php echo $form->textField($model, 'nome', array('maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'nome'); ?>
			</div><!-- form-group -->
		</div>
		<div class="col-md">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'email'); ?>
				<?php echo $form->textField($model, 'email', array('maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'email'); ?>
			</div><!-- form-group -->
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'telefone'); ?>
				<?php echo $form->textField($model, 'telefone', array('maxlength' => 20, 'class' => 'form-control phone')); ?>
				<?php echo $form->error($model, 'telefone'); ?>
			</div>
		</div>
		<div class="col-md">
		<div class="form-group">
				<?php echo $form->labelEx($model, 'data_nascimento'); ?>
				<?php echo $form->dateField($model, 'data_nascimento', array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'data_nascimento'); ?>
			</div>
		</div>
	</div>

	<?php
	echo GxHtml::submitButton('Salvar', array('class' => 'btn btn-conexa'));
	$this->endWidget();
	?>
</div><!-- form -->