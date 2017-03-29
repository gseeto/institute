<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Users</h1>
			<?php $this->btnAdd->Render(); ?> <?php $this->btnMerge->Render(); ?>			
			 <br>
			 <?php $this->lblMsg->Render(); ?>
			 <h2>Search for Users by:</h2>
					<div class="filterBy filterByFirst">First Name <?php $this->strFirstName->Render(); ?></div>
					<div class="filterBy">Last Name <?php $this->strLastName->Render(); ?> </div>
					<div class="filterBy">Username <?php $this->strUsername->Render(); ?></div>
					<div class="cleaner">&nbsp;&nbsp;&nbsp;</div>
					<?php $this->btnSearch->Render();?>
			<br>			
			<?php $this->dtgUsers->Render(); ?>
			
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>