<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>
       
<?php // $this->lblDebug->Render(); ?>
<div class="loginSection" style="padding:10px; width:850px;">
<h2>Resend Username and Password</h2>
Enter the email address that is associated with the Username/Password that you have forgotten.<br>
We will email you your login credentials.<br>
<?php $this->txtEmail->RenderWithName(); ?>
 
	<div style="position:relative; margin:auto; padding:10px;">
			<?php $this->btnSubmit->Render('CssClass=primary'); ?>
			<?php $this->btnCancel->Render('CssClass=primary'); ?>
	</div>
	<?php $this->lblMsg->Render(); ?><br>
	<?php $this->btnReturn->Render(); ?>
	
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>