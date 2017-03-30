<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class="row">
	<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8">	
			<div class='section'>
				<h3>Edit Canned strategy</h3>
				<div class="form-group">
				<?php $this->strStrategy->RenderWithName(); ?>
				<?php $this->lstCategory->RenderWithName(); ?>
				<br>
				<?php $this->dtgActions->Render(); ?>
				<?php $this->btnActionAdd->Render(); ?>
				<br><br>
				<?php $this->dtgKpis->Render(); ?>
				<?php $this->btnKpiAdd->Render(); ?>
				<br><br>
				<?php $this->btnSubmit->Render(); ?>
				</div>
			</div>
		</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>