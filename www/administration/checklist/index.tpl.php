<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">		
		<h1>Manage Checklists</h1>
			 <?php $this->btnAdd->Render(); ?>
			 <?php $this->btnAssociateUser->Render(); ?>
			 <br>
			 <?php $this->pnlAssociateUser->Render(); ?>
			 <?php $this->pnlAddCompany->Render(); ?> 
			 <br>
			 	
			<?php $this->dtgCompanies->Render(); ?>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>