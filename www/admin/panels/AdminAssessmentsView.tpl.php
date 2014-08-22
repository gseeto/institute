<h1>Assessments</h1>

 <div id="tabs">
 <ul>
    <li><a href="#tabs-1">Kingdom Business</a></li>
    <li><a href="#tabs-2">10-P</a></li>
    <li><a href="#tabs-3">10-F</a></li>
    <li><a href="#tabs-4">Integration</a></li>
    <li><a href="#tabs-5">Seasonal</a></li>
    <li><a href="#tabs-6">Time</a></li>
    <li><a href="#tabs-7">LEMON</a></li>
    <li><a href="#tabs-8">LRA</a></li>
    <li><a href="#tabs-9">Group Assessments</a></li>
  </ul>
  <div id="tabs-1">
    <h3>Kingdom Business Impact Assessments</h3> 
    <?php $_CONTROL->dtgKingdomBizAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddKingdomBizAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddKingdomAssessment->Render(); ?>
  </div>
  <div id="tabs-2">
    <h3>10-P Impact Assessments</h3>
	<?php $_CONTROL->dtgTenPAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTenPAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTenPAssessment->Render(); ?> 
  </div>
  <div id="tabs-3">
    <h3>10-F Impact Assessments</h3>
	<?php $_CONTROL->dtgTenFAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTenFAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTenFAssessment->Render(); ?>
  </div>
  <div id="tabs-4">
    <h3>Integration Assessments</h3>
	<?php $_CONTROL->dtgIntegrationAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddIntegrationAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddIntegrationAssessment->Render(); ?>
  </div>
  <div id="tabs-5">
    <h3>Seasonal Assessments</h3>
	<?php $_CONTROL->dtgSeasonalAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddSeasonalAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddSeasonalAssessment->Render(); ?>
  </div>
  <div id="tabs-6">
  <h3>Where Does The Time Go Assessments</h3>
	<?php $_CONTROL->dtgTimeAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTimeAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTimeAssessment->Render(); ?>
  </div>
  <div id="tabs-7">
    <h3>LEMON Assessments</h3>
    <h4>Search for Assessments by:</h4>
		<div class="filterBy filterByFirst">First Name <?php $_CONTROL->strFirstNameLemon->Render(); ?></div>
		<div class="filterBy">Last Name <?php $_CONTROL->strLastNameLemon->Render(); ?> </div>
		<div class="filterBy">Group Name <?php $_CONTROL->strGroupLemon->Render(); ?></div>
		<div class="filterBy">Company <?php $_CONTROL->strCompanyLemon->Render(); ?></div>
		<div class="cleaner">&nbsp;<br><br></div>
	<?php $_CONTROL->dtgLemonAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddLemonAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddLemonAssessment->Render(); ?> 
	<h3>LEMON Uploads</h3>
    <div class="subsection">
	    <h4>Single Assessment</h4>
	    <p>Upload a single LEMON Assessment. Expects a single excel spreadsheet that we used to use from legacy.</p>
		<?php $_CONTROL->flaSingleUpload->RenderWithError(); ?>
		<?php $_CONTROL->txtGroupKeyCode->RenderWithName(); ?> 
		<?php $_CONTROL->btnUploadSingleAssessment->Render();?>
		<?php  $_CONTROL->lblErrorMessage->Render(); ?>
	</div>
	<div class="subsection">
		<h4>Entire Assessment Database</h4>
		<p>Upload a full database of lemon assessments. Due to the large size, you need to first remove
		all the extraneous sheets, and convert to a CSV file before you attempt to upload.</p>
		<p>Based off the company field, the assessments within the database will be grouped accordingly.</p>
		<p>All users created will have "_generated" appended to their username to indicate that they are legacy users
		who have been uploaded.</p>
		<?php $_CONTROL->flaDBUpload->RenderWithError(); ?>
		<?php $_CONTROL->btnUploadAssessmentDB->Render();?><br><br>
		<?php  $_CONTROL->lblDBErrorMessage->Render(); ?>
		<?php  $_CONTROL->lblDBInfoMessage->Render(); ?>
	</div>
	<div class="subsection">
		<h4>Entire Online Assessment Database</h4>
		<p>To migrate all the information off the old LEMON database the following steps were taken.</p>
		<ul><li>The entire DB was exported to an excel file</li>
		<li>That exported excel file is uploaded here.</li></ul>
		<p>Based off the company field, the assessments within the database will be grouped accordingly.</p>
		<p>All users created will have "_generatedOnline" appended to their username to indicate that they are legacy users
		from the old online database who have been uploaded.</p>
		<?php $_CONTROL->flaOnlineDBUpload->RenderWithError(); ?>
		<?php $_CONTROL->btnUploadOnlineAssessmentDB->Render();?><br><br>
		<?php  $_CONTROL->lblOnlineDBErrorMessage->Render(); ?>
		<?php  $_CONTROL->lblOnlineDBInfoMessage->Render(); ?>
	</div>	
  </div>
  <div id="tabs-8">
    <h3>Leadership Readiness Assessments</h3>
	<?php $_CONTROL->dtgLRAAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddLRAAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddLRAAssessment->Render(); ?>
  </div>
  <div id="tabs-9">
    <h3>Group Assessment</h3>
	<p>Add a group assessment. This allows you to set up a key code (typically for companies) so that a number of people can use the same key code to access an assessment.</p>
	<p>As the individuals take the assessment, separate individual accounts will be created for them that they can use to access their assessments in future.</p>  
	<h4>Search for Assessments by:</h4>
		<div class="filterBy filterByFirst">KeyCode <?php $_CONTROL->strKeycode->Render(); ?></div>
		<div class="filterBy">Assessment Type <?php $_CONTROL->lstSearchAssessmentType->Render(); ?> </div>
        <div class="filterBy"><?php $_CONTROL->btnSearch->Render(); ?> </div>
		
		<div class="cleaner">&nbsp;<br><br></div>
	<?php $_CONTROL->dtgGroupAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddGroupAssessment->Render();  ?> 
	<?php $_CONTROL->pnlAddGroupAssessment->Render(); ?>
  </div> 
 </div>
 
 <script type="text/javascript">
 	function btnCancelKeyCode_Click(objControl) {
		var strControlId = objControl.id;
     	var intIndex = strControlId.substr("btnKeyCodeCancel".length);
		$("#lblKeyCode"+intIndex+"_ctl").show();	
		var oldText = $("#lblKeyCode"+intIndex).text();
		$("#txtKeyCode"+intIndex).text(oldText);
		$("#txtKeyCode"+intIndex+"_ctl").hide();
		$("#btnKeyCodeSave"+intIndex+"_ctl").hide();
		$("#btnKeyCodeCancel"+intIndex+"_ctl").hide();
	}
	function lblKeyCode_Clicked(objControl) {
		var strControlId = objControl.id;
	    var intIndex = strControlId.substr("lblKeyCode".length);
	    $("#lblKeyCode"+intIndex+"_ctl").hide();
		$("#txtKeyCode"+intIndex+"_ctl").show();
		$("#btnKeyCodeSave"+intIndex+"_ctl").show();
		$("#btnKeyCodeCancel"+intIndex+"_ctl").show();
	}

</script>
