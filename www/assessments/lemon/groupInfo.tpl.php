<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="externSection">
	<h3>Institute Login</h3>
	<p>If you already have an Institute Account, please login here:</p> 
	<?php $this->txtUser->RenderWithName(); ?>
	<?php $this->txtPassword->RenderWithName(); ?>
	&nbsp;&nbsp;
	<?php $this->btnLogin->Render(); ?>
	<br><br>
	<?php  $this->lblErrorMsg->Render() ?>
</div>

<div class="externSection">
	<h3>New User</h3>
	<p>If you are a new user, please provide us with information so that we can create your account before you begin the assessment.</p>
	<p>NOTE: The User and Password you specify may be used in future to access and review your assessment results at <a href='../../index.php'>The Institute Portal</a></p> 
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