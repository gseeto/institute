<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<?php  $this->btnReturn->Render(); ?>
<img src='/resources/assessments/tenp/tenpAssessmentImg.php/<?php _p($this->objTenPAssessment->Id);?>'>
<br>
<br>
<?php   
	for($i=0; $i<10;$i++) {
?>
		<br>
		<h3><?php _p(CategoryType::$NameArray[$i+1]);?></h3>
	<?php 
		$this->dtgAssessmentResultsArray[$i]->Render();
	}
	?>
<br>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>