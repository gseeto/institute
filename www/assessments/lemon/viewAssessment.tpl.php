<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<?php  $this->btnReturn->Render(); ?>
<img src='/resources/assessments/lemon/lemonAssessmentImg.php/<?php _p($this->objLemonAssessment->Id);?>'>
<br>
<?php  $this->lblLemonDescription->Render(); ?>
<br>
<?php  $this->dtgAssessmentResults->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>