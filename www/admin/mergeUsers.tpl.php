<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h2>Merging the following Users:</h2>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">
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
			<div class="radio">
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
			</div>
			<div style="clear:both"></div>
			<br>
			<?php $this->btnMerge->Render(); ?> 
			<?php $this->btnCancel->Render(); ?> 
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>