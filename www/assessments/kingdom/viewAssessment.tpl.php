<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 section">
	<p>
	<?php $this->lblIntroduction->Render();?>
	</p>
	<?php  $this->btnReturn->Render('CssClass="btn btn-default"'); ?>
	<br><br>
	<img class="img-responsive" src='<?php _p(__SUBDIRECTORY__);?>/assessments/kingdom/kingdomAssessmentImg.php/<?php _p($this->objKingdomAssessment->Id);?>'>
	<br>
	<br>
	<div class="table-responsive">
	<?php   
		for($i=0; $i<10;$i++) {
	?>
			<br>
			<h3><?php _p(CategoryType::$NameArray[$i+1]);?></h3>
		<?php 
			$this->dtgAssessmentResultsArray[$i]->Render();
		}
		?>
	</div>
	<br>
	</div>
	<div class="col-md-2">&nbsp;</div>
	</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>