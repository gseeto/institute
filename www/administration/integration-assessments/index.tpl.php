<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Integration Assessments</h1>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#tab1">Integration Assessments</a></li>
			  <li><a data-toggle="tab" href="#tab2">Seasonal Assessments</a></li>			  
			  <li><a data-toggle="tab" href="#tab3">Time</a></li>
			</ul>
			<div class="tab-content">
  				<div id="tab1" class="tab-pane fade in active">	
  					<br><br>
  					<h2>Integration Assessments</h2>				
					<?php $this->dtgIntegrationAssessments->Render(); ?> 
					<br>
					<?php $this->btnAddIntegrationAssessment->Render(); ?> 
					<?php $this->pnlAddIntegrationAssessment->Render(); ?>
					<br>
  				</div>
  				<div id="tab2" class="tab-pane fade"> 					
					<br><br>
					<h2>Seasonal Assessments</h2>
					<?php $this->dtgSeasonalAssessments->Render(); ?> 
					<br>
					<?php $this->btnAddSeasonalAssessment->Render(); ?> 
					<?php $this->pnlAddSeasonalAssessment->Render(); ?>
					<br>
  				</div>
  				<div id="tab3" class="tab-pane fade"> 					
					<br><br>
					<h2>Where Does The Time Go Assessments</h2>
					<?php $this->dtgTimeAssessments->Render(); ?> 
					<br>
					<?php $this->btnAddTimeAssessment->Render(); ?> 
					<?php $this->pnlAddTimeAssessment->Render(); ?>
  				</div>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>