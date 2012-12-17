<div class='subsection'>
	<h3>Add A Rule</h3>
	
	<?php $_CONTROL->lstStrategy->RenderWithName(); ?>
	<?php $_CONTROL->lstConditional->RenderWithName(); ?>
	<?php $_CONTROL->lstQuestion->RenderWithName(); ?>
	<br><br>
	<?php $_CONTROL->btnSubmit->Render(); ?>
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>