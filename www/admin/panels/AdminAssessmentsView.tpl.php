<h1>Assessments</h1>
<div class='section'>
<h2>Kingdom Business Impact Assessments</h2>
	<?php $_CONTROL->dtgKingdomBizAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddKingdomBizAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddKingdomAssessment->Render(); ?>
</div>
<div class='section'>
<h2>10-P Impact Assessments</h2>
	<?php $_CONTROL->dtgTenPAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTenPAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTenPAssessment->Render(); ?>
</div>
<div class='section'>
<h2>10-F Impact Assessments</h2>
	<?php $_CONTROL->dtgTenFAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTenFAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTenFAssessment->Render(); ?>
</div>
<div class='section'>
<h2>LEMON Assessments</h2>
	<?php $_CONTROL->dtgLemonAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddLemonAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddLemonAssessment->Render(); ?>
</div>
<div class='section'>
<h2>Group Assessments</h2>
	<p>Add a group assessment. This allows you to set up a key code (typically for companies) so that a number of people can use the same key code to access an assessment.</p>
	<p>As the individuals take the assessment, separate individual accounts will be created for them that they can use to access their assessments in future.</p>  
	<?php $_CONTROL->dtgGroupAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddGroupAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddGroupAssessment->Render(); ?>
</div>