<h1>Assessments</h1>

 <div id="tabs">
 <ul>
    <li><a href="#tabs-1">Kingdom Business</a></li>
    <li><a href="#tabs-4">Integration</a></li>
    <li><a href="#tabs-5">Seasonal</a></li>
    <li><a href="#tabs-6">Time</a></li>
    <li><a href="#tabs-8">LRA</a></li>
    <li><a href="#tabs-9">Upward</a></li>
  </ul>
  <div id="tabs-1">
    <h3>Kingdom Business Impact Assessments</h3> 
    <?php $_CONTROL->dtgKingdomBizAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddKingdomBizAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddKingdomAssessment->Render(); ?>
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
  <div id="tabs-8">
    <h3>Leadership Readiness Assessments</h3>
	<?php $_CONTROL->dtgLRAAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddLRAAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddLRAAssessment->Render(); ?>
  </div>
   <div id="tabs-9">
    <h3>Education 8-P Assessment</h3>
	<?php $_CONTROL->dtgUpwardAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddUpwardAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddUpwardAssessment->Render(); ?>
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
