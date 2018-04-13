<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8">	
		<h2>LEMON Group Aggregation Results for <?php $this->title->Render();?></h2>
		<h3>List of Users within this LEMON for Lovers Group:</h3>
		<?php $this->dtgUsers->Render(); ?>
		<br>
		<?php $this->btnSubmit->Render();?>
		<br><br><br>
		<?php $this->lblDebug->Render();?>
		
		<?php $this->accordionCharts->Render();?>
	</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
