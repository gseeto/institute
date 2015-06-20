<h1>Venture</h1>
 <?php $_CONTROL->btnAdd->Render(); ?>
 <?php $_CONTROL->pnlAddVentureAssessment->Render(); ?> 
 <br>
 <h3>Search for Venture Assessments by:</h3>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strFirstName->Render(); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strLastName->Render(); ?> </div>
		<div class="filterBy">Username <?php $_CONTROL->strUsername->Render(); ?></div>
		<div class="cleaner">&nbsp;<br><br></div>
		
<?php $_CONTROL->dtgVentures->Render(); ?>


