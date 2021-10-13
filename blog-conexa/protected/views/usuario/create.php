<h1 class="text-center mb-3">Cadastre-se:</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>