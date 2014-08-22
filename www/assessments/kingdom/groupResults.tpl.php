<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>

<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/kingdom/kingdomAssessmentImg.php/<?php _p($this->objKingdomAssessment->Id);?>'>
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