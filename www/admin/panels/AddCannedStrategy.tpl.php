<div class='subsection'>
	<h3>Add A Canned strategy</h3>
	
	<?php $_CONTROL->strStrategy->RenderWithName(); ?>
	<?php $_CONTROL->lstCategory->RenderWithName(); ?>
	<?php $_CONTROL->dtgActions->Render(); ?>
	<?php $_CONTROL->btnActionAdd->Render(); ?>
	<?php $_CONTROL->dtgKpis->Render(); ?>
	<?php $_CONTROL->btnKpiAdd->Render(); ?>
	<br><br>
	<?php $_CONTROL->btnSubmit->Render(); ?>
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>