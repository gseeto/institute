<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
			<h2>Add/Modify  User</h2>
			<?php $this->txtFirstName->RenderWithName(); ?> 
			<?php $this->txtLastName->RenderWithName(); ?>
			<?php $this->txtEmail->RenderWithName(); ?>  
			<?php $this->lstGender->RenderWithName(); ?> 
			<?php $this->lstCountry->RenderWithName(); ?> 
			<?php $this->txtUserName->RenderWithName(); ?> 
			<?php $this->txtPassword->RenderWithName(); ?> 
			<?php $this->lstRole->RenderWithName(); ?> 
			
			<?php $this->btnSubmit->Render(); ?> 
			<?php $this->btnCancel->Render(); ?> 
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>