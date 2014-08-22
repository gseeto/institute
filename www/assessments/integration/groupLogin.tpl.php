<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<div class="externSection">
<p>
	Is there a disconnect between what you think and what you do? <br>
	Are there behaviours in your life that are not based on truth?<br>
	The Integration assessment helps you discover the unconscious dichotomies that might be holding you captive from true purpose and meaning in your life.
	 
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>