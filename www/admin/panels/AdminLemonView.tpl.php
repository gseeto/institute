<h1>LEMON Assessments</h1>

 <div id="tabs">
 <ul>
    <li><a href="#tabs-7">LEMON</a></li>
  </ul>
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
