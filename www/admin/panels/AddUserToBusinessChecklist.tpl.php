<div class='subsection'>
<h3>Add managers to Business Checklist</h3>
<?php $_CONTROL->lstChecklist->Render(); ?> 
<br>
<h3>Search for Users by:</h3>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strFirstName->Render(); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strLastName->Render(); ?> </div>
		<div class="filterBy">Username <?php $_CONTROL->strUsername->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
<?php $_CONTROL->dtgUsers->Render(); ?> 
<?php $_CONTROL->btnSubmit->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
</div>