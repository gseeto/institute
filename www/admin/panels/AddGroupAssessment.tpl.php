<div class='subsection'>
	<h3>Add A Group Assessment</h3>
	<div> Key Code: <?php $_CONTROL->txtKeyCode->Render(); ?> </div>
	<div> Description: <?php $_CONTROL->txtDescription->Render(); ?> </div>
	<div> Total Keys: <?php $_CONTROL->txtTotalKeys->Render(); ?></div>
	<div> Keys Left: <?php $_CONTROL->txtKeysLeft->Render(); ?></div>
	<div> Assessment Type: <?php $_CONTROL->lstAssessmentType->Render(); ?></div>
	<div class="cleaner">&nbsp;</div>
<br>
<?php $_CONTROL->btnSubmit->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
</div>