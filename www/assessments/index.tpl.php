<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<h2>Assessments</h2>
<div class="section right" style="width:400px; margin-right:40px;">
	<p>Assessment Managers may view Group Aggregated results of the groups they are responsible for.</p>
	<p>If this is disabled it is because you are not a manager.</p>
	<?php $this->btnGroupAssessments->Render();?>
</div>
<div class="section" style="width:400px; height:400px;">
	<p>Only the assessments you have requested will be enabled.</p>
	<p>If you wish to purchase additional assessments, please contact info@inst.net.</p>
	<p>Sooner or later I'll automate it too though, and include a payment system.</p>
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