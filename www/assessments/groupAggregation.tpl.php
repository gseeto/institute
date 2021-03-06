<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 section">
		<h1>Group Assessment Management</</h1>
		<h2>LEMON Assessments</h2>
		<h4>Search for Assessments by:</h4>
				<div class="filterBy filterByFirst">KeyCode <?php $this->strKeycode->Render(); ?><br><br><?php $this->btnLemon->Render(); ?></div>		
				<div class="right"><?php $this->btnViewGlobalLemonResults->Render();?></div>
		<div class="cleaner">&nbsp;<br><br></div>
		<div class="table-responsive">
		<?php $this->dtgGroupLemonAssessments->Render(); ?>
		<?php $this->btnAggregateGroups->Render();?>
		<br>
		
		<h2>50 Question LEMON Assessments</h2>
		<h4>Search for Assessments by:</h4>
				<div class="filterBy filterByFirst">KeyCode <?php $this->str50Keycode->Render(); ?><br><br><?php $this->btn50Lemon->Render(); ?></div>		
		<div class="cleaner">&nbsp;<br><br></div>
		<div class="table-responsive">
		<?php $this->dtg50GroupLemonAssessments->Render(); ?>
		<?php $this->btn50AggregateGroups->Render();?>
		<br>
		
		<h2>LEMON for Lovers Assessments</h2>
		<h4>Search for Assessments by:</h4>
				<div class="filterBy filterByFirst">KeyCode <?php $this->strloversKeycode->Render(); ?><br><br><?php $this->btnLemonlovers->Render(); ?></div>		
		<div class="cleaner">&nbsp;<br><br></div>
		<div class="table-responsive">
		<?php $this->dtgGroupLemonloversAssessments->Render(); ?>
		<?php $this->btnAggregateloversGroups->Render();?>
		<br>
		
		<h2>10-P Assessments</h2>
		<?php $this->dtgGroupTenPAssessments->Render(); ?>
		
		<h2>10-F Assessments</h2>
		<?php $this->dtgGroupTenFAssessments->Render(); ?>
		
		<h2>Integration Assessments</h2>
		<?php $this->dtgGroupIntegrationAssessments->Render(); ?>
		
		<h2>Kingdom Business Impact Assessments</h2>
		<?php $this->dtgGroupKingdomAssessments->Render(); ?>
		
		<h2>Leadership Readiness Assessments</h2>
		<?php $this->dtgGroupLRAAssessments->Render(); ?>
		
		<h2>Post Venture Assessments</h2>
		<?php $this->dtgPostVentureAssessments->Render(); ?>
		
		<h2>Partnering Awareness Assessments</h2>
		<?php $this->dtgPartneringAwarenessAssessments->Render(); ?>
		
		<h2>Partnering Readiness Assessments</h2>
		<?php $this->dtgPartneringReadinessAssessments->Render(); ?>
		</div>
	</div>
	<div class="col-md-2">&nbsp;</div>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
