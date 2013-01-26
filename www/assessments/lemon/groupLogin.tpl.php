<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="lemonSection">
<p>
	Find out your LEMON profile by taking the LEMON assessment. 
	After taking this 75-question assessment, you will find out the profile of your primary and secondary LEMON profile. 
	You will know which type of leader you are.
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>