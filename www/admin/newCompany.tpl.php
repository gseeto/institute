<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h3>Add New Company</h3>
<?php $this->txtName->RenderWithName(); ?> 
<?php $this->txtAddress->RenderWithName(); ?>
<?php $this->txtCity->RenderWithName(); ?>  
<?php $this->txtState->RenderWithName(); ?> 
<?php $this->txtZipCode->RenderWithName(); ?> 
<?php $this->txtCountry->RenderWithName(); ?> 

<p>Select the Industries the Company is associated with</p>
<?php 
foreach($this->chkIndustryArray as $chkIndustry) {
	$chkIndustry->Render();
}?>

<?php $this->btnSubmit->Render(); ?> 
<?php $this->btnCancel->Render(); ?> 

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>