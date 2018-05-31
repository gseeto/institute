<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
	<?php  $this->btnGeneratePdf->Render('CssClass="btn btn-default"'); ?>
	<div class="center-block">
	<h1>LEMON for Lovers Assessment Report</h1>
	</div>
	<img class="img-responsive" src='<?php _p(__IMAGE_ASSETS__);?>/LemonLoversReportSplashPage.jpg' />
	<br><br>
	<h2>INTRODUCTION</h2>
	<p>Thank you for taking the LEMON for Lovers Assessment.  Your results here may be different from original LEMON Basics Assessment.  
	Why is this? There are several reasons for this, the most significant being that you have adapted how you express affirmation, love and relationship 
	to your spouse or partner. Over time, as one makes conscious choices to serve someone else, this will happen.</p>
	<p>Another possible reason for them being different is the idea that people give and receive love differently.</p>
	<p>In a blogpost, Christin Caliva writes, "Everyone shows their love differently, and everyone feels loved in different ways. 
	This is why I feel there are "ten" love languages. Not only do people receive love differently, but they also show love differently. 
	While quality time is my top love language for receiving, it's lower when I'm showing love and care to people. I don't like bothering people too much, 
	so sweet and simple is my favorite. For my "Giving" Love Languages, my order switches to Giving Gifts, Acts of Service, Quality Time, Physical Touch, 
	and then Words of Affirmation. I really like remaining in the background when it comes to voicing opinions or "publicly" expressing my love for others. 
	Words of Affirmation do nothing for me, simply because I'm a big believer in "actions speak louder than words"."  from <a href="https://www.theodysseyonline.com/10-love-languages">https://www.theodysseyonline.com/10-love-languages</a></p>
	<p>LEMON Leadership is about DNA, wiring... how you are born. LEMON for Lovers is about learning to adapt to your loved ones, giving them what they need, 
	not just that which is your natural inclination.</p>
	
	<h2>YOUR PERSONAL LEMON for LOVERS PROFILE</h2>
	<img class="img-responsive" src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemonlovers/lemonloversAssessmentImg.php/<?php _p($this->objLemonAssessment->Id);?>'>
	<br><br>
	<h2>LEMON FOR Lovers e-book</h2>
	<p>We recommend you read the LEMON for Lovers e-book to get a deeper understanding of this topic. You can purchase it at <a href="http://inst.net/publications">http://inst.net/publications</a></p>
	
	<!--  
	<h3>Your Assessment Answers</h3>
	<?php  $this->dtgAssessmentResults->Render(); ?>
	-->
	</div>
	<div class="col-md-2">&nbsp;</div>
	</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>