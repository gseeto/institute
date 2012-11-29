<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h3>Add New User</h3>
<?php $this->txtFirstName->RenderWithName(); ?> 
<?php $this->txtLastName->RenderWithName(); ?>
<?php $this->txtEmail->RenderWithName(); ?>  
<?php $this->lstGender->RenderWithName(); ?> 
<?php $this->txtCountry->RenderWithName(); ?> 
<?php $this->txtUserName->RenderWithName(); ?> 
<?php $this->txtPassword->RenderWithName(); ?> 
<?php $this->lstRole->RenderWithName(); ?> 

<?php $this->btnSubmit->Render(); ?> 
<?php $this->btnCancel->Render(); ?> 

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>