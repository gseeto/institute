<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Leadership Readiness Assessments</h1>  								
		<br>
			<?php $this->btnAddLRAAssessment->Render(); ?> 
			<?php $this->pnlAddLRAAssessment->Render(); ?>
			<br>
			<?php $this->dtgLRAAssessments->Render(); ?> 
  		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>