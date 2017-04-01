<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
			<h1>Manage Post Venture Surveys</h1>
			 <?php $this->btnAdd->Render(); ?>
			 <?php $this->pnlAddVentureAssessment->Render(); ?> 
			 <br>
			 <h3>Search for Venture Assessments by:</h3>
					<div class="filterBy filterByFirst">First Name <?php $this->strFirstName->Render(); ?></div>
					<div class="filterBy">Last Name <?php $this->strLastName->Render(); ?> </div>
					<div class="filterBy">Username <?php $this->strUsername->Render(); ?></div>
					<div class="cleaner">&nbsp;<br><br></div>
					
			<?php $this->dtgVentures->Render(); ?>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>