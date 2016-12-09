<h1>Group Assessments</h1>

 <div id="tabs">
 <ul>
    <li><a href="#tabs-10">Group Assessments</a></li>
  </ul>
  <div id="tabs-10">
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
