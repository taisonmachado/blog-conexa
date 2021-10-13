<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="d-flex flex-column justify-content-center align-items-center">
	<?php if($model->hasErrors()) { ?>
	<div class="alert alert-danger" role="alert">
		<ul class="mb-0">
			<?php
			foreach ($model->getErrors() as $errors) {
				foreach ($errors as $erro) {
					echo "<li>$erro</li>";
				}
			}?>
		</ul>
	</div>
	<?php } ?>
	<h1>Login</h1>

	<form action="/index.php?r=site/login" method="post">

		<div class="form-group">
			<input type="text" name="Login[email]" required class="form-control <?php if($model->hasErrors('email')) echo 'is-invalid'?>" placeholder="E-mail" value="<?php if(isset($model->email)) echo $model->email?>">
		</div>
		<div id="validationServer03Feedback" class="invalid-feedback">
        	Please provide a valid city.
      	</div>
		  <div class="valid-feedback">
        Looks good!
      </div>
		<div class="form-group">
			<input type="password" name="Login[senha]" required class="form-control <?php if($model->hasErrors('senha')) echo 'is-invalid'?>" placeholder="Senha">
		</div>
		<button class="btn btn-conexa btn-block mb-3">Entrar</button>
	</form>
	<p>Ainda não tem conta? <a class="text-decoration-none" href="index.php?r=usuario/cadastro">Registre-se</a></p>
</div>