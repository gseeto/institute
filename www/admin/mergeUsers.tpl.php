<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h3>Merging the following Users:</h3>
<h4>
	<?php 
	for($i=0; $i< $this->intUserCount; $i++) {
		$objUser = User::Load($this->userArray[$i]);
	?>
	 <?php _p($objUser->FirstName.' '.$objUser->LastName)?>, 
	<?php 
	}
?>
</h4>
<?php 
		$this->rbnFirstName->RenderWithName();  
		$this->rbnLastName->RenderWithName(); 
		$this->rbnEmail->RenderWithName();
		$this->rbnGender->RenderWithName(); 
		$this->rbnCountry->RenderWithName(); 
		$this->rbnLevel->RenderWithName(); 
		$this->rbnTenure->RenderWithName();  
		$this->rbnUserName->RenderWithName();  
		$this->rbnPassword->RenderWithName(); 
		$this->rbnRole->RenderWithName(); 
		$this->rbnLemonAssessment->RenderWithName(); 
		$this->rbnTenPAssessment->RenderWithName(); 
		$this->rbnTenFAssessment->RenderWithName(); 
		$this->rbnKingdomAssessment->RenderWithName();
?>

<div style="clear:both"></div>
<br>
<?php $this->btnMerge->Render(); ?> 
<?php $this->btnCancel->Render(); ?> 

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>