<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<div class="section">
<h2>LEMON Lovers Assessment</h2>
<?php $this->lblMsg->Render();?>
<div class="row">
	<div class="col-md-6">
	<?php $this->btnEdit->Render('CssClass="btn btn-default center-block"');?>
	</div>
	<div class="col-md-6">
	<?php $this->btnView->Render('CssClass="btn btn-default center-block"');?>
	</div>
</div>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>