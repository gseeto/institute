<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
		<img class="img-responsive" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/sidelemon.png"/>
		<p>
			Find out your LEMON profile by taking the LEMON assessment. 
			After taking this 75-question assessment, you will find out the profile of your primary and secondary LEMON profile. 
			You will know which type of leader you are.
		</p>
		<div class="form-group">
		<?php $this->txtKeyCode->RenderWithName(); ?>
		&nbsp;&nbsp;<br><br>
		<?php $this->btnSubmit->Render(); ?>
		<br><br>
		<?php  $this->lblErrorMsg->Render() ?>
		</div>
	</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>