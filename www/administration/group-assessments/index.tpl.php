<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
			<h1>Manage Group Assessments</h1>
			<p>Add a group assessment. This allows you to set up a key code (typically for companies) so that a number of people can use the same key code to access an assessment.</p>
			<p>As the individuals take the assessment, separate individual accounts will be created for them that they can use to access their assessments in future.</p>  
			<?php $this->btnAddGroupAssessment->Render();  ?> 
			<?php $this->pnlAddGroupAssessment->Render(); ?>
			<h4>Search for Assessments by:</h4>
				<div class="filterBy filterByFirst">KeyCode <?php $this->strKeycode->Render(); ?></div>
				<div class="filterBy">Assessment Type <?php $this->lstSearchAssessmentType->Render(); ?> </div>
		        <div class="cleaner">&nbsp;&nbsp;&nbsp;</div><?php $this->btnSearch->Render(); ?>
				
				<div class="cleaner">&nbsp;<br><br></div>
			<?php $this->dtgGroupAssessments->Render(); ?> 
			<br>			
			
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>