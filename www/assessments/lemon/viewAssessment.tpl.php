<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
Thank you for taking the LEMON Assessment.
Your results are provided below.
</p>
<?php  $this->btnReturn->Render(); ?>
<img src='lemonAssessmentImg.php/<?php _p($this->objLemonAssessment->Id);?>'>
<br>
<?php  $this->lblLemonDescription->Render(); ?>
<br>
<?php  $this->dtgAssessmentResults->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>