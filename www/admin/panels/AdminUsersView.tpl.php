 <h1>Users</h1>
 <?php $_CONTROL->btnAdd->Render(); ?>
 <br>
 <h3>Search for Users by:</h3>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strFirstName->Render(); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strLastName->Render(); ?> </div>
		<div class="filterBy">Username <?php $_CONTROL->strUsername->Render(); ?></div>
		<div class="cleaner">&nbsp;<br><br></div>
		<?php $_CONTROL->btnSearch->Render();?>
<br>
<?php $_CONTROL->dtgUsers->Render(); ?>
<?php $_CONTROL->btnMerge->Render(); ?>

