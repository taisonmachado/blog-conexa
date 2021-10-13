<?php

$this->breadcrumbs = array(
	Usuario::label(2),
	'Index',
);

$this->menu = array(
	array('label'=>'Create' . ' ' . Usuario::label(), 'url' => array('create')),
	array('label'=>'Manage' . ' ' . Usuario::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Usuario::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 