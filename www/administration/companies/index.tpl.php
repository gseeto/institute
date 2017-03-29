<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Companies</h1>
		<?php $this->btnAdd->Render(); ?>
		<br>
		<h4>Search for Companies by:</h4>
				<div class="filterBy filterByFirst">Name <?php $this->strName->Render(); ?></div>				
		        <div class="cleaner">&nbsp;&nbsp;&nbsp;</div><?php $this->btnSearch->Render(); ?>
		        <br><br>
		<?php $this->dtgCompanys->Render(); ?>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>