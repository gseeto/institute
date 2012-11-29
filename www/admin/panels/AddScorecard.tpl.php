<div class='subsection'>
	<h3>Add Scorecard</h3>
	<div class="filterBy filterByFirst">Scorecard Name <?php $_CONTROL->strName->Render('Width=300px'); ?></div>
	<p>NOTE: Company must first be created before you can associate a scorecard with it.</p>	
	<div>Company: <?php $_CONTROL->lstCompany->Render(); ?></div>
	<br><br>
	<?php $_CONTROL->btnSubmit->Render(); ?>
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>