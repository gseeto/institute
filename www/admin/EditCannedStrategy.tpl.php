<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class='subsection'>
	<h3>Edit Canned strategy</h3>
	
	<?php $this->strStrategy->RenderWithName(); ?>
	<?php $this->lstCategory->RenderWithName(); ?>
	<?php $this->dtgActions->Render(); ?>
	<?php $this->btnActionAdd->Render(); ?>
	<?php $this->dtgKpis->Render(); ?>
	<?php $this->btnKpiAdd->Render(); ?>
	<br><br>
	<?php $this->btnSubmit->Render(); ?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>