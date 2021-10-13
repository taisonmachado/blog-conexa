<?php

$this->breadcrumbs = array(
	Comentario::label(2),
	'Index',
);

$this->menu = array(
	array('label'=>'Create' . ' ' . Comentario::label(), 'url' => array('create')),
	array('label'=>'Manage' . ' ' . Comentario::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Comentario::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 