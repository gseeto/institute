<div class='subsection'>
	<h3>Add A Group Assessment</h3>
	<div> <?php $_CONTROL->txtKeyCode->RenderWithName(); ?> </div>
	<div> <?php $_CONTROL->txtDescription->RenderWithName(); ?> </div>
	<div> <?php $_CONTROL->txtTotalKeys->RenderWithName(); ?></div>
	<div> <?php $_CONTROL->txtKeysLeft->RenderWithName(); ?></div>
	<div> <?php $_CONTROL->lstAssessmentType->RenderWithName(); ?></div>
	<div class="cleaner">&nbsp;</div>
<br>
<?php $_CONTROL->btnSubmit->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
</div>