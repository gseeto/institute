<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<h2>Assessments</h2>
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
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>