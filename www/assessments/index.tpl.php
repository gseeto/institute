<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<h2>Assessments</h2>
<div class="row">
	<div class="col-md-6 section">
		<p>Only the assessments you have requested will be enabled.</p>
		<p>If you wish to purchase additional assessments, please contact info@inst.net.</p>
		<ul style='list-style: none; 
				padding:5px;'>
		<?php 
			foreach($this->btnAssessments as $btnAssessment) {
		?>
			<li style="margin-bottom:10px;">
		<?php 
				$btnAssessment->Render('CssClass="btn btn-primary btn-block"');
		?></li>
		<?php 
			}
		?>
		</ul>
	</div>
	<div class="col-md-6 section">
	    <h3>Group Assessments</h3>
		<p>Assessment Managers may view Group Aggregated results of the groups they are responsible for.</p>
		<p>If this is disabled it is because you are not a manager.</p>
		<?php $this->btnGroupAssessments->Render('CssClass="btn btn-primary btn-block"');?>
		<div style="height:60px;"> </div>
		<h3>Business Checklists</h3>
		<p>Any Company Checklists you're responsible for will be displayed below.</p>
	    <?php $this->btnChecklists->Render('CssClass="btn btn-primary btn-block"');?>
	</div>
 
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>