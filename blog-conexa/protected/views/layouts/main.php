<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!-- [if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif] -->
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<!-- <a class="navbar-brand" href="/"><?php echo Yii::app()->name ?></a> -->
		<a class="navbar-brand" href="/"><img width="150" src="<?php echo Yii::app()->request->baseUrl; ?>/images/conexa.png" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/index.php?r=post">Posts</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdownCategorias" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categorias
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownCategorias">
						<?php $this->widget('zii.widgets.MenuItemCategoria'); ?>
						<!-- blog-conexa\protected\widgets\MenuItemCategoria.php -->
					</div>
				</li>
			</ul>
			<div class="row">
				<form class="form-inline my-2 my-lg-0" action="/index.php?r=post/search" method="POST">
					<input id="inputSearch" class="form-control mr-sm-2" type="search" placeholder="Procurar" name="q">
					<button disabled id="btnSearch" class="btn btn-outline-conexa my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
				</form>
				<ul class="navbar-nav align-items-center ml-5 mr-5">
					<li class="nav-item dropdown">
						<?php if (Yii::app()->user->isGuest) { ?>
							<a class="nav-link" href="/index.php?r=site/login"><i class="fas fa-sign-in-alt"></i> Login</a>
						<?php } else { ?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<i class="fas fa-user"></i> <?php echo Yii::app()->user->name ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownUser">
								<a class="dropdown-item" href="/index.php?r=post/cadastro"><i class="fas fa-fw fa-file-medical"></i> Adicionar Post</a>
								<a class="dropdown-item" href="/index.php?r=post/meusPosts"><i class="fas fa-fw fa-file-alt"></i> Meus Posts</a>
								<a class="dropdown-item" href="/index.php?r=usuario/editar"><i class="fas fa-fw fa-user-edit"></i> Meus Dados</a>
								<a class="dropdown-item" href="/index.php?r=site/logout"><i class="fas fa-fw fa-sign-out-alt"></i> Sair</a>
							</div>
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" id="page">

		<?php echo $content; ?>

		<div class="clear"></div>

	</div><!-- page -->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Conexa Blog - Nós crescemos juntos.<br />
		Todos os diretos reservados.<br />
	</div><!-- footer -->

	<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluir" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalExcluirTitulo"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<a id="modalBtnExcluir" type="button" class="btn btn-danger">Excluir</a>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>
</body>

</html>