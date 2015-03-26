<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>
<h1>Group Assessment Management</</h1>
<h2>LEMON Assessments</h2>
<h4>Search for Assessments by:</h4>
		<div class="filterBy filterByFirst">KeyCode <?php $this->strKeycode->Render(); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php $this->btnLemon->Render(); ?></div>		
		<div class="right"><?php $this->btnViewGlobalLemonResults->Render();?></div>
<div class="cleaner">&nbsp;<br><br></div>
<?php $this->dtgGroupLemonAssessments->Render(); ?>
<?php $this->btnAggregateGroups->Render();?>
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
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
