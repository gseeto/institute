<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class="loginContainer">
	<img class="loginLogo" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/login_logo.png" width="500px"/>
	<div class="loginSection">
		<h3><?php $this->lblMessage->Render(); ?></h3>
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>	
		<?php $this->chkRemember->RenderWithName(); ?>	
		<a style="position:relative; left:20px;" href="<?php _p(__SUBDIRECTORY__)?>/forgot/" title="Forgot Username/Password?">Forgot Username/Password?</a>
		<div class="buttonBar">
			<?php $this->btnLogin->Render('CssClass=primary'); ?>
		</div>
	</div>
</div>
<br>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>