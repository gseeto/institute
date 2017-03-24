<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 section">
		<p>
		Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
		<div style="padding-left:20px; margin-bottom:10px;">
		1 - No, I do not agree, definitely not (even if the statement is negative)<br>
		4 - Neutral, I neither agree nor disagree, maybe<br>
		7 - Yes, I strongly agree, definitely<br>
		</div>
		<span class="text-danger">IMPORTANCE: Please evaluate how important this statement is to the overall purpose and impact of your life.</span>
		<br>
		<span class="text-primary">PERFORMANCE: Please evaluate how you feel you are currently performing relative to the importance you assigned.</span>
		</p>
		<div class="table-responsive">
		<?php  $this->dtgAssessmentQuestions->Render(); ?>
		</div>
		<?php  $this->btnSubmit->Render('CssClass="btn btn-default"'); ?>
		<?php  $this->btnCancel->Render('CssClass="btn btn-default"'); ?>
	</div>
	<div class="col-md-2">&nbsp;</div>
	</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>