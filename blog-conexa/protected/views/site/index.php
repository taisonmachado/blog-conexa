<div class="d-flex justify-content-between mb-3 align-items-center">
    <h2>Últimas Postagens:</h1>
    <a href="index.php?r=post/cadastro" class="btn btn-secondary">Adicionar Postagem</a>
</div>

<form action="" method="post">

</form>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'../post/_view',
    'template'=>"{items}\n{pager}",
)); ?>