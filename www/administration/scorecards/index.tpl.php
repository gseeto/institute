<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Scorecards</h1>
		<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#tab1">Scorecard Management</a></li>
			  <li><a data-toggle="tab" href="#tab2">Canned Strategy Management</a></li>	
			  <li><a data-toggle="tab" href="#tab3">Conditional Mapping Rules</a></li>	
			  <li><a data-toggle="tab" href="#tab4">Scorecard Generation</a></li>			  
		</ul>
			<div class="tab-content">
  				<div id="tab1" class="tab-pane fade in active" >	
  					<br><br>
  					<h3>Scorecard Management</h3>				   
					<br>
					<?php $this->btnAddScorecard->Render(); ?><br>
					<?php $this->pnlAddScorecard->Render(); ?>
					<br>
					<?php $this->btnAddUser->Render(); ?> &nbsp;&nbsp;
					<?php $this->pnlAddUser->Render(); ?>
					<?php $this->btnRemoveUser->Render(); ?>
					<?php $this->pnlRemoveUser->Render(); ?>
					<?php $this->dtgScorecards->Render(); ?>
  				</div>
  				<div id="tab2" class="tab-pane fade">	
  					<h3>List Of Canned Strategies</h3>
					<p>The table below allows you to manage (create and edit) Canned Strategies that will be made 
					available for deployment based upon set criteria.</p>
					<?php $this->dtgCannedStrategy->Render(); ?>
					<?php $this->btnAddCannedStrategy->Render(); ?>
					<?php $this->pnlAddCannedStrategy->Render(); ?>  
  				</div>
  				<div id="tab3" class="tab-pane fade">	
  					<h3>Conditional Mapping Rules For Strategy To 10-P Assessment Association</h3>
				    <p>The table below allows you to set conditionals in place that will be used to determine
					if certain Canned Strategies will be suitable for a Scorecard based off 10-P Assessment results.</p>
					<br>
					<?php $this->btnAddRule->Render(); ?>
					<?php $this->pnlAddRule->Render(); ?>
					<br><br>
					<?php $this->dtgRule->Render(); ?>
  				</div>
  				<div id="tab4" class="tab-pane fade">	
  					<h3>Scorecard Generation From 10-P Assessments</h3>
					<p>Specify a 10-P Assessment that you wish to use in order to generate a number of strategies
					that will be pre-populated into the designated Scorecard using the associations specified in the Conditional Mapping Rules.</p>
					<br>
					<?php 
						$this->lblScorecard->Render();
						$this->lstScorecard->Render();
					?>
					<br><br>
					<?php 
						$this->lblTenPAssessment->Render();
						$this->lstTenPAssessment->Render();
					?>
					<br><br>
					<?php $this->btnGenerateScorecard->Render(); ?>
					<?php $this->lblgenerationFeedback->Render(); ?>
  				</div>
  			</div>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>