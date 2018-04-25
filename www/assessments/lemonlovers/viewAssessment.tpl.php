<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 lemonSection">
	<?php  $this->btnReturn->Render('CssClass="btn btn-default"'); ?>
	<?php  $this->btnGeneratePdf->Render('CssClass="btn btn-default"'); ?>
	<div class="center-block">
	<h1>LEMON Lovers Leadership Assessment Report</h1>
	</div>
	<img class="img-responsive" src='<?php _p(__IMAGE_ASSETS__);?>/LemonReportSplashPage.PNG' class='centerImg'/>
	<div class="center-block"> <?php $this->lblIntroduction->Render();?> </div>
	
	<p><!-- pagebreak --> </p>
	<div class="center-block">
	
	<h2>Your Personal Profile and Report</h2>
	<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/lemonlovers/lemonloversAssessmentImg.php/<?php _p($this->objLemonAssessment->Id);?>'>

	<p><!-- pagebreak --> </p>
	<h3>Contact Information</h3>
	<h4>In USA</h4>
	<p>Email - <a href="mailto:contact@inst.net">contact@inst.net</a>, <a href="mailto:lemon@inst.net">lemon@inst.net</a></p>
	<p>Phone - +1.650.306.4100 </p>
	<br>
	<h4>In India</h4>
	<p>Email - <a href="mailto:thomass@inst.net">thomass@inst.net</a>, <a href="mailto:lemon@inst.net">lemon@inst.net</a></p>
	<p>Phone - +91 9840108887</p>
	<br>
	<h4>In South Africa</h4>
	<p>Email - <a href="mailto:assess@lemonleadership.co.za">assess@lemonleadership.co.za</a></p>
	<p>Phone - +27 11 027 2072</p>
	<br>
	<br>
	
			
	<p>Wishing you very best in your Leadership Journey!</p>
	
	<!-- 
	<h3>Your Assessment Answers</h3>
	<?php  //$this->dtgAssessmentResults->Render(); ?>
	-->
	</div>
	<div class="col-md-2">&nbsp;</div>
	</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>