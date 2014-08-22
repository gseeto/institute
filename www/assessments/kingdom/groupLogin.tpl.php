<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<div class="externSection">
<p>
	The Kingdom Business Assessment (KBA) measures 10 drivers of Impact that comprise the operating model of organizations. Based on Foundational Principles (eternal business principles in
Scripture) that we have developed and tested for over 15 years, we have fashioned probing statements that get to the
core of how well a business is aligned with God's way of doing things.
</p>
If you have a code, please enter it here: 
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>