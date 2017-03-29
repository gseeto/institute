<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<br><br>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
		<h3>New User</h3>
		<p>Please provide us with information before you begin the assessment.</p>
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