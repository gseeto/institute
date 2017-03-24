<?php require(__INCLUDES__ . '/header.inc.php'); ?>


	<div class="row">
	<div class="col-md-4">&nbsp;</div>
		<div class="col-md-4 loginSection">
		<img class="img-responsive" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/login_logo.png"/>
		<h3><?php $this->lblMessage->Render(); ?></h3>
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>	
		<?php $this->chkRemember->RenderWithName(); ?>	
		<a href="<?php _p(__SUBDIRECTORY__)?>/forgot/" title="Forgot Username/Password?">Forgot Username/Password?</a>
		<br><br>
		<?php $this->btnLogin->Render('CssClass="btn btn-default"'); ?>
		
		</div>
		<div class="col-md-4">&nbsp;</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>