<h1>Assessments</h1>

 <div id="tabs">
 <ul>
    <li><a href="#tabs-1">10-P</a></li>
    <li><a href="#tabs-2">10-F</a></li>
  </ul>

  <div id="tabs-1">
    <h3>10-P Impact Assessments</h3>
	<?php $_CONTROL->dtgTenPAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTenPAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTenPAssessment->Render(); ?> 
  </div>
  <div id="tabs-2">
    <h3>10-F Impact Assessments</h3>
	<?php $_CONTROL->dtgTenFAssessments->Render(); ?> 
	<br>
	<?php $_CONTROL->btnAddTenFAssessment->Render(); ?> 
	<?php $_CONTROL->pnlAddTenFAssessment->Render(); ?>
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
