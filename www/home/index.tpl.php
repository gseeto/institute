<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>
       
<?php // $this->lblDebug->Render(); ?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">My Assessments and Scorecards</a></li>
		<li><a href="#tabs-2">My Details</a></li>
		<li><a href="#tabs-3">My Login Details</a></li>
		<li><a href="#tabs-4">My Associated Companies</a></li>
	</ul>

<div id="tabs-1">
	<p>List of Assessments I am associated with</p>
	<?php 
		if(empty($this->lblAssessments)) 
			print("<p>No associated Assessments</p>");
	?>
	<ul class='mylists'>
	<?php 
		foreach($this->lblAssessments as $lblAssessment) {
			$lblAssessment->Render();
		}
	?>
	</ul>
	<p>List of Scorecards I am associated with</p>
	<?php 	
		if(empty($this->lblScorecards)) 
			print("<p>No associated Scorecards</p>");
	?>
	<ul class='mylists'>
	<?php 
		foreach($this->lblScorecards as $lblScorecard) {
			$lblScorecard->Render();
		}
	?>
	</ul>
</div>

<div id="tabs-2">
	<?php 
		$this->txtFirstName->RenderWithName();
		$this->lblFirstName->RenderWithName();
		$this->txtLastName->RenderWithName();
		$this->lblLastName->RenderWithName();
		$this->txtEmail->RenderWithName();
		$this->lblEmail->RenderWithName();
		$this->lstCountry->RenderWithName();
		$this->lblCountry->RenderWithName();
		$this->chkGenderDisplay->RenderWithName();
		$this->lblGender->RenderWithName();
		$this->txtDepartment->RenderWithName();
		$this->lblDepartment->RenderWithName();
		$this->lstTitle->RenderWithName();
		$this->lblTitle->RenderWithName();
		$this->lstTenure->RenderWithName();
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
<div id="tabs-3">
	<?php 
		$this->lblUsername->RenderWithName();
		$this->txtUsername->RenderWithName();
		$this->lblRole->RenderWithName();
		$this->txtPassword->RenderWithName();
		
		$this->btnLoginUpdate->Render();
		$this->btnLoginCancel->Render();
	?>
</div>

<div id="tabs-4">
	<p>These are the companies I am currently associated with</p>
	<?php 
		for($i=0; $i<count($this->lblCompanyName); $i++) {
			$this->lblCompanyName[$i]->RenderWithName();
			$this->lblCompanyAddress[$i]->RenderWithName();
		}
	?>
</div>

</div>

<script type="text/javascript">
<!--
	$( "#tabs" ).tabs();
//-->
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>