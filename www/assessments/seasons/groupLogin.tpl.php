<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<div class="externSection">
<p>
	What seasons have you walked through? What lessons have you learned? This assessment explores the depth to which God has taken us through each of the seasons of life.	 
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>