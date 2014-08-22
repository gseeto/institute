<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<div class="externSection">
<p>
	An exercise to assist you in identifying where your time is being spent, and whether your regular activities are contributing to convergence. 
	This assessment will assist you in more intentionally integrating your time and will help you to identify where you can create more margin.	 
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>