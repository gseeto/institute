<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage LEMON Assessments</h1>
				<?php $this->btnAddLemonAssessment->Render(); ?> 
				<?php $this->pnlAddLemonAssessment->Render(); ?> 
				<h4>Search for Assessments by:</h4>
				<div class="filterBy filterByFirst">First Name <?php $this->strFirstNameLemon->Render(); ?></div>
				<div class="filterBy">Last Name <?php $this->strLastNameLemon->Render(); ?> </div>
				<div class="filterBy">Group Keycode <?php $this->strGroupLemon->Render(); ?></div>
				<div class="filterBy">Company <?php $this->strCompanyLemon->Render(); ?></div>
				<div class="cleaner">&nbsp;</div>
				<?php $this->btnSearch->Render(); ?>
				<br><br>
				<br>
			<?php $this->dtgLemonAssessments->Render(); ?> 
			<br>			
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>