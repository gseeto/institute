<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
		<h3>Institute Login</h3>
		<p>If you already have an Institute Account, please login here:</p> 
		<?php $this->txtUser->RenderWithName('CssClass="form-control"'); ?>
		<?php $this->txtPassword->RenderWithName('CssClass="form-control"'); ?>
		&nbsp;&nbsp;
		<?php $this->btnLogin->Render('CssClass="btn btn-default"'); ?>
		<br><br>
		<?php  $this->lblErrorMsg->Render('CssClass="text-danger"') ?>
	</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
		<h3>New User</h3>
		<p>If you are a new user, please provide us with information before you begin the assessment.</p>
		<?php $this->txtFirstName->RenderWithName('CssClass="form-control"'); ?>
		<?php $this->txtLastName->RenderWithName('CssClass="form-control"'); ?>
		<?php $this->txtEmail->RenderWithName('CssClass="form-control"'); ?>
		<?php $this->chkOptIn->Render('CssClass="checkbox"'); ?>
		&nbsp;&nbsp;
		<?php $this->btnSubmit->Render('CssClass="btn btn-default"'); ?>
		<br><br>
		<?php  $this->lblWarningMsg->Render('CssClass="text-danger"') ?>
	</div>
	<div class="col-md-2">&nbsp;</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>