<div class='bordered-section'>
	<h3>Add Scorecard</h3>
	<div>Scorecard Name <?php $_CONTROL->strName->Render(); ?></div>
	<p>NOTE: Company must first be created before you can associate a scorecard with it.</p>	
	<br>
	<div>Company: <?php $_CONTROL->lstCompany->Render(); ?></div>
	<br><br>
	<?php $_CONTROL->btnSubmit->Render(); ?>
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>