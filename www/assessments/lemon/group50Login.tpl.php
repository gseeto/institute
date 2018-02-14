<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
		<img class="img-responsive" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/sidelemon.png"/>
		<p>
			What type of leader are you?
LEMON Leadership will help you to identify which type of leader you are and show you how 
to apply your specific characteristics within your organization. 
Understanding these leadership types uncover keys to dealing with yourself and others in 
situations calling for different types of leaders. 
This 50-question assessment will determine your LEMON profile and will start a journey 
towards better understanding yourself and others.
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
<div class="small">
<p>Individual assessments: you received your KeyCode via email. 
Please email us if you have any problems info@lemonleadership.com</p>
<p>Group assessments: you received your KeyCode from your group facilitator. 
Please direct any problems you may experience to your group facilitator.</p>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>