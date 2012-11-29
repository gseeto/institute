<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h2><?php _p($this->txtName->Text);?></h2>
<div class='section'>
<h3>Company Details</h3>
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
</div>

<div class='section'>
<h3>Company Employees</h3>
	<?php $this->dtgMembers->Render(); ?>
	<?php $this->btnAddMember->Render(); ?>
	<?php $this->pnlAddMember->Render(); ?>
</div>
<?php $this->btnSubmit->Render(); ?> 
<?php $this->btnCancel->Render(); ?> 

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>