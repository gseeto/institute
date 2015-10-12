<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="externSection">
	<h3>Institute Login</h3>
	<p>Si vous avez déjà un compte Institut, s'il vous plaît connectez-vous ici:</p> 
	<?php $this->txtUser->RenderWithName(); ?>
	<?php $this->txtPassword->RenderWithName(); ?>
	&nbsp;&nbsp;
	<?php $this->btnLogin->Render(); ?>
	<br><br>
	<?php  $this->lblErrorMsg->Render() ?>
</div>

<div class="externSection">
	<h3>nouvel utilisateur</h3>
	<p>Si vous êtes un nouvel utilisateur, s'il vous plaît nous fournir des informations afin que nous puissions créer votre compte avant de commencer l'évaluation.</p>
	<p>NOTE: L'utilisateur et mot de passe que vous spécifiez peut être utilisé à l'avenir pour accéder et revoir vos résultats de l'évaluation au <a href='../../index.php'>The Institute Portal</a></p> 
	<?php $this->txtFirstName->RenderWithName(); ?>
	<?php $this->txtLastName->RenderWithName(); ?>
	<?php $this->txtEmail->RenderWithName(); ?>
	<?php $this->txtNewUser->RenderWithName(); ?>
	<?php $this->txtNewPassword->RenderWithName(); ?>
	<?php $this->lstCountry->RenderWithName(); ?>
	<?php $this->lstLevel->RenderWithName(); ?> 
	<?php $this->lstTenure->RenderWithName(); ?> 
	<?php $this->lstGender->RenderWithName(); ?> 
	&nbsp;&nbsp;
	<?php $this->btnSubmit->Render(); ?>
	<br><br>
	<?php  $this->lblWarningMsg->Render() ?>
</div>

<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>