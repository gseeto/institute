<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
Thank you for taking the 10-P Assessment.
Your results are provided below.
</p>
<?php  $this->btnReturn->Render(); ?>
<img src='tenpAssessmentImg.php/<?php _p($this->objTenPAssessment->Id);?>'>
<br>
<br>
<?php  $this->dtgAssessmentResults->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>