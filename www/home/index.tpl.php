<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<div class="section">
<h2>My Assessments</h2>
<ul class='mylists'>
<?php 
	foreach($this->lblAssessments as $lblAssessment) {
		$lblAssessment->Render();
	}
?>
</ul>

<h2>My Scorecards</h2>
<ul class='mylists'>
<?php 
	foreach($this->lblScorecards as $lblScorecard) {
		$lblScorecard->Render();
	}
?>
</ul>
</div>
<div class="section">
<h2>Personal Details</h2>
<?php 
	$this->txtFirstName->RenderWithName();
	$this->lblFirstName->RenderWithName();
	$this->txtLastName->RenderWithName();
	$this->lblLastName->RenderWithName();
	$this->txtEmail->RenderWithName();
	$this->lblEmail->RenderWithName();
	$this->txtCountry->RenderWithName();
	$this->lblCountry->RenderWithName();
	$this->chkGenderDisplay->RenderWithName();
	$this->lblGender->RenderWithName();
	$this->txtDepartment->RenderWithName();
	$this->lblDepartment->RenderWithName();
	$this->txtTitle->RenderWithName();
	$this->lblTitle->RenderWithName();
	$this->intTenure->RenderWithName();
	$this->lblTenure->RenderWithName();
	$this->txtCareerLength->RenderWithName();
	$this->lblCareerLength->RenderWithName();
?> 
<br>
<?php 
	$this->btnUpdate->Render();
	$this->btnCancel->Render();
?>
</div>
<div class="section">
<h2>Login Details</h2>
<?php 
	$this->lblUsername->RenderWithName();
	$this->txtUsername->RenderWithName();
	$this->lblRole->RenderWithName();
	$this->txtPassword->RenderWithName();
	
	$this->btnLoginUpdate->Render();
	$this->btnLoginCancel->Render();
?>
</div>
<div class="section">
<h2>Associated Companies</h2>
<?php 
	for($i=0; $i<count($this->lblCompanyName); $i++) {
		$this->lblCompanyName[$i]->RenderWithName();
		$this->lblCompanyAddress[$i]->RenderWithName();
	}
?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>