<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="externSection right" style="width: 180px; text-align: left;" >
<p>For greater insights into the application of LEMON Leadership principles, you might also want to purchase the LEMON Leadership book for more information.</p><a href="http://inst.net/publications/lemonLeadership.html?tab=t1" target="_blank"><img src="/resources/assets/images/book-cover-lemon.jpg"></a> 
<br>
<p>If you'd like a group consultation please <a href="mailto:lemon@inst.net">contact us</a></p>
</div>
<div class="externSection" style="width: 700px;">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<img src='/resources/assessments/lemon/lemonAssessmentImg.php/<?php _p($this->objLemonAssessment->Id);?>'>
<br>
<?php  $this->lblLemonDescription->Render(); ?>
<br>
<?php  $this->dtgAssessmentResults->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>