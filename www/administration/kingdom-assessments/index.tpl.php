<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Kingdom Business Assessments</h1>  								
		<br>
		<?php $this->btnAddKingdomBizAssessment->Render(); ?> 
		<?php $this->pnlAddKingdomAssessment->Render(); ?>
		<?php $this->dtgKingdomBizAssessments->Render(); ?> 
			<br>
  		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>