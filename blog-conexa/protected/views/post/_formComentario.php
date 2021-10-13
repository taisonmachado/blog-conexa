<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'comentario-form',
	'enableAjaxValidation' => false,
));
?>
	<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
		<?php echo $form->textArea($model, 'texto', array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'texto'); ?>
		</div><!-- row -->
<div class="d-flex justify-content-end">
<?php
echo GxHtml::submitButton('Comentar', array('class' => 'btn btn-secondary btn-sm mt-0'));
echo "</div>";
$this->endWidget();
?>
</div><!-- form -->