<h1>Scorecards</h1>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Scorecard Management</a></li>
    <li><a href="#tabs-2">Canned Strategy Management</a></li>
    <li><a href="#tabs-3">Conditional Mapping Rules</a></li>
    <li><a href="#tabs-4">Scorecard Generation</a></li>
  </ul>
  <div id="tabs-1">
    <h3>Scorecard Management</h3>
    <?php $_CONTROL->dtgScorecards->Render(); ?>
	<br>
	<?php $_CONTROL->lblDebug->Render(); ?>
	<?php $_CONTROL->btnAddScorecard->Render(); ?>
	<?php $_CONTROL->pnlAddScorecard->Render(); ?>
	<br>
	<?php $_CONTROL->btnAddUser->Render(); ?>
	<?php $_CONTROL->pnlAddUser->Render(); ?>
	<?php $_CONTROL->btnRemoveUser->Render(); ?>
	<?php $_CONTROL->pnlRemoveUser->Render(); ?>
  </div>
  <div id="tabs-2">
    <h3>List Of Canned Strategies</h3>
	<p>The table below allows you to manage (create and edit) Canned Strategies that will be made 
	available for deployment based upon set criteria.</p>
	<?php $_CONTROL->dtgCannedStrategy->Render(); ?>
	<?php $_CONTROL->btnAddCannedStrategy->Render(); ?>
	<?php $_CONTROL->pnlAddCannedStrategy->Render(); ?>  
  </div>
  <div id="tabs-3">
  	<h3>Conditional Mapping Rules For Strategy To 10-P Assessment Association</h3>
    <p>The table below allows you to set conditionals in place that will be used to determine
	if certain Canned Strategies will be suitable for a Scorecard based off 10-P Assessment results.</p>
	<?php $_CONTROL->dtgRule->Render(); ?>
	<?php $_CONTROL->btnAddRule->Render(); ?>
	<?php $_CONTROL->pnlAddRule->Render(); ?>
  </div>
  <div id="tabs-4">
    <h3>Scorecard Generation From 10-P Assessments</h3>
	<p>Specify a 10-P Assessment that you wish to use in order to generate a number of strategies
	that will be pre-populated into the designated Scorecard using the associations specified above.</p>
	<?php 
		$_CONTROL->lblScorecard->Render();
		$_CONTROL->lstScorecard->Render();
	?>
	<br>
	<?php 
		$_CONTROL->lblTenPAssessment->Render();
		$_CONTROL->lstTenPAssessment->Render();
	?>
	<br><br>
	<?php $_CONTROL->btnGenerateScorecard->Render(); ?>
	<?php $_CONTROL->lblgenerationFeedback->Render(); ?>
  </div>
</div>
