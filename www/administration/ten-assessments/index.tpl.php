<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage 10-P and 10-F Assessments</h1>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#tab1">10-P Assessments</a></li>
			  <li><a data-toggle="tab" href="#tab2">10-F Assessments</a></li>			  
			</ul>
			<div class="tab-content">
  				<div id="tab1" class="tab-pane fade in active">	
  					<br><br>
  					<h2>10-P Assessments</h2>				
					<?php $this->btnAddTenPAssessment->Render(); ?> 
					<?php $this->pnlAddTenPAssessment->Render(); ?> 
					<br>
					<?php $this->dtgTenPAssessments->Render(); ?> 
					<br>
  				</div>
  				<div id="tab2" class="tab-pane fade"> 					
					<br><br>
					<h2>10-F Assessments</h2>
					<?php $this->btnAddTenFAssessment->Render(); ?> 
					<?php $this->pnlAddTenFAssessment->Render(); ?>
					<br>
					<?php $this->dtgTenFAssessments->Render(); ?> 
  				</div>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>