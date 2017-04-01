<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
			<h1>Partnering</h1>
			<div class='section'>
			<h2> Partnering Awareness Assessments</h2>
			 <?php $this->btnAdd->Render(); ?>
			 <?php $this->pnlAddPartnerAwareAssessment->Render(); ?> 
			 <br>
			 <h3>Search for Partner Awareness Assessments by:</h3>
					<div class="filterBy filterByFirst">First Name <?php $this->strFirstName->Render(); ?></div>
					<div class="filterBy">Last Name <?php $this->strLastName->Render(); ?> </div>
					<div class="filterBy">Username <?php $this->strUsername->Render(); ?></div>
					<div class="cleaner">&nbsp;<br><br></div>
					
			<?php $this->dtgPartnerAware->Render(); ?>
			</div>
			<div class='section'>
			<h2> Partnering Readiness Assessments</h2>
			 <?php $this->btnAddPReady->Render(); ?>
			 <?php $this->pnlAddPartnerReadyAssessment->Render(); ?> 
			 <br>
			 <h3>Search for Partner Readiness Assessments by:</h3>
					<div class="filterBy filterByFirst">First Name <?php $this->strPRFirstName->Render(); ?></div>
					<div class="filterBy">Last Name <?php $this->strPRLastName->Render(); ?> </div>
					<div class="filterBy">Username <?php $this->strPRUsername->Render(); ?></div>
					<div class="cleaner">&nbsp;<br><br></div>
					
			<?php $this->dtgPartnerReady->Render(); ?>
			</div>
		
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>