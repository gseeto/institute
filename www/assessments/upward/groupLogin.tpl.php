<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<div class="externSection">
<p>
	The Education 8-P assessment investigates the overall performance in 8 key areas that would result in impact for your organization. 
	After taking this assessment, you will identify your performance in the 8 drivers of impact,
	the potential areas that might need work, and any areas of misalignment.
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>