<div class='subsection'>
	<h3>Add Users to A Scorecard</h3>
	<div class="filterBy filterByFirst">Scorecard<?php $_CONTROL->lstScorecard->Render(); ?></div>
	
	<div>Select Users: <?php $_CONTROL->dtgUsers->Render(); ?></div>
	<br><br>
	<?php $_CONTROL->btnSubmit->Render(); ?>
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>