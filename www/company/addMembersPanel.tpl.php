<div class='bordered-section'>
		<h3>Search for Users by:</h3>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strFirstName->Render('Width=300px'); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strLastName->Render(); ?> </div>
		<div class="filterBy">Username <?php $_CONTROL->strUsername->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>

	<h3>Select Users To Be Added To Company</h3>
	<?php $_CONTROL->dtgUsers->Render(); ?> 
	
	<?php $_CONTROL->btnSubmit->Render(); ?>

</div>