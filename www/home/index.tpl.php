<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">
            function DisplayWheel(whichWheel, chartData) {
            	var chart;
                // PIE CHART
                chart = new AmCharts.AmPieChart();

                chart.dataProvider = chartData;
                chart.titleField = "key";
                chart.valueField = "value";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "80%";
                chart.startDuration = 2;
                chart.labelsEnabled = false;
                chart.colors = ["#448F30","#801F15"];
                chart.radius = 90;

                // the following two lines makes the chart 3D
               // chart.depth3D = 10;
               // chart.angle = 15;

                // WRITE  
                if(whichWheel == 'front')                               
                	chart.write("frontWheel");
                else
                	chart.write("backWheel");
            	
            }
            
        </script>       
<?php // $this->lblDebug->Render(); ?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">My Assessments and Scorecards</a></li>
		<li><a href="#tabs-2">My Details</a></li>
		<li><a href="#tabs-3">My Login Details</a></li>
		<li><a href="#tabs-4">My Associated Companies</a></li>
	</ul>

<div id="tabs-1" style="height:900px;">
	<div style="position:relative; float:right; width:600px; margin-left:20px;">
		<img src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/frame.png" style="z-index:2000; width:350px; height:300px; position:absolute; left:140px; top:15px;" />
		<div style="height:100px;"></div>
		<div id="frontWheel" style="position:relative; width:250px; height:250px; float:right;"></div>
		<div id="backWheel" style="position:relative; width:250px; height:250px; float:right; left:-70px;"></div>
		<div style="width:240px; float:left; margin-left:60px;">
		<span style="font:14px; font-weight:bold;">Competence</span><br>
		<span style="color:green;">
		<ul>
		<?php 
			foreach($this->backWheelArray as $lblBackWheel) {
				$lblBackWheel->Render();
			}
		?>
		</span>
		<span style="color:red;">
		<?php 
			foreach($this->missingBackWheelArray as $lblBackWheel) {
				$lblBackWheel->Render();
			}
		?>
		</ul>
		</span>
		</div>
		<div style="width:200px; float:left; margin-left:90px;">
		<span style="font:14px; font-weight:bold;">Character</span><br>
		<ul>
		<span style="color:green;">
		<?php 
			foreach($this->frontWheelArray as $lblFrontWheel) {
				$lblFrontWheel->Render();
			}
		?>
		</span>
		<span style="color:red;">
		<?php 
			foreach($this->missingFrontWheelArray as $lblBackWheel) {
				$lblBackWheel->Render();
			}
		?>
		</span>
		</ul>
		</div>
		<div style=""> 
		<?php $this->lblAd_LemonBook->Render(); ?>
		<?php $this->lblAd_ConvergenceBook->Render(); ?>
		<?php $this->lblAd_LemonAssessment->Render(); ?>
		<?php $this->lblAd_ConvergenceAssessment->Render(); ?>
		
		</div>
		
	</div>
	<div style="both:clear"></div>
	<p>List of Assessments I am associated with</p>
	<?php 
		if(empty($this->lblAssessments)) 
			print("<p>No associated Assessments</p>");
	?>
	<ul class='mylists'>
	<?php 
		foreach($this->lblAssessments as $lblAssessment) {
			$lblAssessment->Render();
		}
	?>
	</ul>
	<p>List of Scorecards I am associated with</p>
	<?php 	
		if(empty($this->lblScorecards)) 
			print("<p>No associated Scorecards</p>");
	?>
	<ul class='mylists'>
	<?php 
		foreach($this->lblScorecards as $lblScorecard) {
			$lblScorecard->Render();
		}
	?>
	</ul>
</div>

<div id="tabs-2">
	<?php 
		$this->txtFirstName->RenderWithName();
		$this->lblFirstName->RenderWithName();
		$this->txtLastName->RenderWithName();
		$this->lblLastName->RenderWithName();
		$this->txtEmail->RenderWithName();
		$this->lblEmail->RenderWithName();
		$this->lstCountry->RenderWithName();
		$this->lblCountry->RenderWithName();
		$this->chkGenderDisplay->RenderWithName();
		$this->lblGender->RenderWithName();
		$this->txtDepartment->RenderWithName();
		$this->lblDepartment->RenderWithName();
		$this->lstTitle->RenderWithName();
		$this->lblTitle->RenderWithName();
		$this->lstTenure->RenderWithName();
		$this->lblTenure->RenderWithName();
		$this->txtCareerLength->RenderWithName();
		$this->lblCareerLength->RenderWithName();
	?> 
	<br>
	<?php 
		$this->btnUpdate->Render();
		$this->btnCancel->Render();
	?>
</div>
<div id="tabs-3">
	<?php 
		$this->lblUsername->RenderWithName();
		$this->txtUsername->RenderWithName();
		$this->lblRole->RenderWithName();
		$this->txtPassword->RenderWithName();
		
		$this->btnLoginUpdate->Render();
		$this->btnLoginCancel->Render();
	?>
</div>

<div id="tabs-4">
	<p>These are the companies I am currently associated with</p>
	<?php 
		for($i=0; $i<count($this->lblCompanyName); $i++) {
			$this->lblCompanyName[$i]->RenderWithName();
			$this->lblCompanyAddress[$i]->RenderWithName();
		}
	?>
</div>

</div>

<script type="text/javascript">
<!--
	$( "#tabs" ).tabs();
//-->
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>