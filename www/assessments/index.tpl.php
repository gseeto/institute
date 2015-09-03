<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<h2>Assessments</h2>
<div class="section right" style="width:400px; margin-right:40px;">
    <h3>Group Assessments</h3>
	<p>Assessment Managers may view Group Aggregated results of the groups they are responsible for.</p>
	<p>If this is disabled it is because you are not a manager.</p>
	<?php $this->btnGroupAssessments->Render();?>
	<div style="height:60px; width:300px;"> </div>
	<h3>Business Checklists</h3>
<p>Any Company Checklists you're responsible for will be displayed below.</p>
    <?php $this->btnChecklists->Render();?>
</div>
<div class="section" style="width:400px; height:800px;">
	<p>Only the assessments you have requested will be enabled.</p>
	<p>If you wish to purchase additional assessments, please contact info@inst.net.</p>
	<ul style='list-style: none; 
			width:100px;
			padding:5px;'>
	<?php 
		foreach($this->btnAssessments as $btnAssessment) {
	?>
		<li>
	<?php 
			$btnAssessment->Render();
	?></li>
	<?php 
		}
	?>
	</ul>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>