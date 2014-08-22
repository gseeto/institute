<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<div class="externSection">
<p>
	The Leadership Readiness assessment investigates the overall performance in 20 key areas that would result in corporate and personal impact. 
	After taking this 120-question assessment, you will identify your performance in the 10 drivers of corporate impact, the 10 drivers of personal impact, and
	the potential areas that might need work, along with any areas of misalignment.
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>