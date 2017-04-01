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
		<span style="color:#F90949;">IMPORTANCE: Please evaluate how important this statement is to the overall purpose and impact of your life.</span>
		<br>
		<span style="color:#131BF9;">PERFORMANCE: Please evaluate how you feel you are currently performing relative to the importance you assigned.</span>
		</p>
		<?php  
		 
		for($i=0; $i<10;$i++) {
		?>
			<br>
			<h3><?php _p(CategoryType::$NameArray[$i+1]);?></h3>
		<?php 
			$this->dtgAssessmentQuestionArray[$i]->Render();
		}
		?>
		<br>
		<?php  $this->btnSubmit->Render(); ?>
		<?php  $this->btnCancel->Render(); ?>
	</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>