<h1>Partnering</h1>
<div class='section'>
<h2> Partnering Awareness Assessments</h2>
 <?php $_CONTROL->btnAdd->Render(); ?>
 <?php $_CONTROL->pnlAddPartnerAwareAssessment->Render(); ?> 
 <br>
 <h3>Search for Partner Awareness Assessments by:</h3>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strFirstName->Render(); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strLastName->Render(); ?> </div>
		<div class="filterBy">Username <?php $_CONTROL->strUsername->Render(); ?></div>
		<div class="cleaner">&nbsp;<br><br></div>
		
<?php $_CONTROL->dtgPartnerAware->Render(); ?>
</div>
<div class='section'>
<h2> Partnering Readiness Assessments</h2>
 <?php $_CONTROL->btnAddPReady->Render(); ?>
 <?php $_CONTROL->pnlAddPartnerReadyAssessment->Render(); ?> 
 <br>
 <h3>Search for Partner Readiness Assessments by:</h3>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strPRFirstName->Render(); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strPRLastName->Render(); ?> </div>
		<div class="filterBy">Username <?php $_CONTROL->strPRUsername->Render(); ?></div>
		<div class="cleaner">&nbsp;<br><br></div>
		
<?php $_CONTROL->dtgPartnerReady->Render(); ?>
</div>

