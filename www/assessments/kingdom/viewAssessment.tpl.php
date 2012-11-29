<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
Thank you for taking the Kingdom Business Assessment.
Your results are provided below.
</p>
<?php  $this->btnReturn->Render(); ?>
<img src='kingdomAssessmentImg.php/<?php _p($this->objKingdomAssessment->Id);?>'>
<br>
<br>
<?php  $this->dtgAssessmentResults->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>