<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 ">
		<h2>Integration Assessment</h2>
		<p>
		Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
		<div style="padding-left:20px; margin-bottom:10px;">
		1 - No, I do not agree, definitely not (even if the statement is negative)<br>
		4 - Neutral, I neither agree nor disagree, maybe<br>
		7 - Yes, I strongly agree, definitely<br>
		</div>
		</p>
		<?php 
			$this->dtgAssessmentQuestion->Render();
		?>
		
		<?php  $this->btnSubmit->Render(); ?>
		<?php  $this->btnCancel->Render(); ?>
	</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>