<?php /*$_CONTROL->dtgScorecards->Render(); */?> 
<h1>Scorecards</h1>
<div class='section'>
<h2>Scorecard Management</h2>
<?php $_CONTROL->dtgScorecards->Render(); ?>
<br>
<?php $_CONTROL->lblDebug->Render(); ?>
<?php $_CONTROL->btnAddScorecard->Render(); ?>
<?php $_CONTROL->pnlAddScorecard->Render(); ?>
<br>
<?php $_CONTROL->btnAddUser->Render(); ?>
<?php $_CONTROL->pnlAddUser->Render(); ?>
</div>
<div class='section'>
<h2>Canned Strategy Management</h2>
<h3>List Of Canned Strategies</h3>
<p>The table below allows you to manage (create and edit) Canned Strategies that will be made 
available for deployment based upon set criteria.</p>
<?php $_CONTROL->dtgCannedStrategy->Render(); ?>
<?php $_CONTROL->btnAddCannedStrategy->Render(); ?>
<?php $_CONTROL->pnlAddCannedStrategy->Render(); ?>

<h3>Conditional Rules For Strategy To 10-P Assessment Association</h3>
<p>The table below allows you to set conditionals in place that will be used to determine
if certain Canned Strategies will be suitable for a Scorecard based off 10-P Assessment results.</p>

</div>
<div class='section'>
<h2>Scorecard Generation From 10-P Assessments</h2>
<p>Specify a 10-P Assessment that you wish to use in order to generate a number of strategies
that will be pre-populated into the designated Scorecard using the associations specified above.</p>
</div>