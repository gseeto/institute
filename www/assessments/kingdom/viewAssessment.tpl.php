<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<?php  $this->btnReturn->Render(); ?>
<img src='/resources/assessments/kingdom/kingdomAssessmentImg.php/<?php _p($this->objKingdomAssessment->Id);?>'>
<br>
<br>
<?php  $this->dtgAssessmentResults->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>