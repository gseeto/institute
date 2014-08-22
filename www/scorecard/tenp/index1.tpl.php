<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<h1>The <?php _p($this->objScorecard->Name);?> Scorecard</h1>
<br>
<div class="scorecardnavbar"><ul class="scorecardnavbar">
<?php 
	// Display the Scorecard Navigation Menu
	$intWidth = floor(550 / count(InstituteForm::$NavScorecardArray));
	foreach (InstituteForm::$NavScorecardArray as $NavScorecardId => $strNavScorecardArray) {
		$strClassInfo = ($NavScorecardId == $this->intNavScorecardId) ? 'class="selected"' : null;
		if ($NavScorecardId == InstituteForm::NavScorecardGlobal) {
			if (QApplication::$Login->IsAdmin())
				printf('<li style="width: %spx;"><a href="%s%s/%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strClassInfo, $strNavScorecardArray[0], $strNavScorecardArray[0]
				);
		} else {
			printf('<li style="width: %spx;"><a href="%s%s/%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strClassInfo, $strNavScorecardArray[0], $strNavScorecardArray[0]
			);
		}
	}
?>
</ul></div>
<?php 
	// Display the P Tabs
	foreach($this->btnCategoryArray as $btnCategory) {
		$btnCategory->Render();		
	}
?>
<div class='pcontent'>
<?php if(($this->intCategoryTypeId == CategoryType::Purpose) ||($this->intCategoryTypeId == CategoryType::Positioning)) {
?>
<h3><?php  _p($this->strCategory);?> Statement</h3>

<?php	 
	 $this->lblStatement->RenderWithName();
	 $this->txtStatement->render();
	 $this->btnSaveStatement->render();
	 $this->btnCancelStatement->render();
 } ?>
<h3><?php _p($this->strCategory);?> Strategy Summary</h3>
<?php 
	// Display the summary Section
	$this->dtgStrategySummary->Render();
	$this->lblDebug->Render();
?>
<br>
<?php 
$this->btnAddStrategy->Render();
for ($i=0; $i< count($this->dtgStrategyArray); $i++) {
?>
<h3><?php _p($this->strCategory);?> Strategy <?php _p($i+1)?> Details</h3>
<?php 	
	// Display the Strategy Details (editable)
	$this->dtgStrategyArray[$i]->RenderWithName();

	// Display the Action Items
	if ($this->dtgActionItems[$i])
		$this->dtgActionItems[$i]->RenderWithName();
	$this->btnAddAction[$i]->Render();
	
	// Display the KPIs
	if ($this->dtgKPIs[$i])
		$this->dtgKPIs[$i]->RenderWithName();
	$this->btnAddKPIs[$i]->Render();
}
?>
</div>

<script type="text/javascript">
	function btnCancelStatement_Click(objControl) {
		$("#lblStatement_ctl").show();	
		var oldText = $("#lblStatement").text();
		$("#txtStatement").text(oldText);
		$("#txtStatement_ctl").hide();
		$("#btnSaveStatement_ctl").hide();
		$("#btnCancelStatement_ctl").hide();
	}

	function lblStatement_Clicked() {
		$("#lblStatement_ctl").hide();
		$("#txtStatement_ctl").show();
		$("#btnSaveStatement_ctl").show();
		$("#btnCancelStatement_ctl").show();
	}
	function btnCancelStrategy_Click(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("btnStrategyCancel".length);
		$("#lblStrategy"+intIndex+"_ctl").show();	
		var oldText = $("#lblStrategy"+intIndex).text();
		$("#txtStrategy"+intIndex).text(oldText);
		$("#txtStrategy"+intIndex+"_ctl").hide();
		$("#btnStrategySave"+intIndex+"_ctl").hide();
		$("#btnStrategyCancel"+intIndex+"_ctl").hide();
	}
	function lblStrategy_Clicked(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("lblStrategy".length);
        $("#lblStrategy"+intIndex+"_ctl").hide();
		$("#txtStrategy"+intIndex+"_ctl").show();
		$("#btnStrategySave"+intIndex+"_ctl").show();
		$("#btnStrategyCancel"+intIndex+"_ctl").show();
	}
	function btnCancelAction_Click(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("btnActionCancel".length);
		$("#lblAction"+intIndex+"_ctl").show();	
		var oldText = $("#lblAction"+intIndex).text();
		$("#txtAction"+intIndex).text(oldText);
		$("#txtAction"+intIndex+"_ctl").hide();
		$("#btnActionSave"+intIndex+"_ctl").hide();
		$("#btnActionCancel"+intIndex+"_ctl").hide();
	}
	function lblAction_Clicked(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("lblAction".length);
        $("#lblAction"+intIndex+"_ctl").hide();
		$("#txtAction"+intIndex+"_ctl").show();
		$("#btnActionSave"+intIndex+"_ctl").show();
		$("#btnActionCancel"+intIndex+"_ctl").show();
	}
	function btnCancelComment_Click(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("btnCommentCancel".length);
		$("#lblComment"+intIndex+"_ctl").show();	
		var oldText = $("#lblComment"+intIndex).text();
		$("#txtComment"+intIndex).text(oldText);
		$("#txtComment"+intIndex+"_ctl").hide();
		$("#btnCommentSave"+intIndex+"_ctl").hide();
		$("#btnCommentCancel"+intIndex+"_ctl").hide();
	}
	function lblComment_Clicked(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("lblComment".length);
        $("#lblComment"+intIndex+"_ctl").hide();
		$("#txtComment"+intIndex+"_ctl").show();
		$("#btnCommentSave"+intIndex+"_ctl").show();
		$("#btnCommentCancel"+intIndex+"_ctl").show();
	}
	function btnCancelKpi_Click(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("btnKpiCancel".length);
		$("#lblKpi"+intIndex+"_ctl").show();	
		var oldText = $("#lblKpi"+intIndex).text();
		$("#txtKpi"+intIndex).text(oldText);
		$("#txtKpi"+intIndex+"_ctl").hide();
		$("#btnKpiSave"+intIndex+"_ctl").hide();
		$("#btnKpiCancel"+intIndex+"_ctl").hide();
	}
	function lblKpi_Clicked(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("lblKpi".length);
        $("#lblKpi"+intIndex+"_ctl").hide();
		$("#txtKpi"+intIndex+"_ctl").show();
		$("#btnKpiSave"+intIndex+"_ctl").show();
		$("#btnKpiCancel"+intIndex+"_ctl").show();
	}
	function btnCancelKpiComment_Click(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("btnKPICommentCancel".length);
		$("#lblKPIComment"+intIndex+"_ctl").show();	
		var oldText = $("#lblKPIComment"+intIndex).text();
		$("#txtKPIComment"+intIndex).text(oldText);
		$("#txtKPIComment"+intIndex+"_ctl").hide();
		$("#btnKPICommentSave"+intIndex+"_ctl").hide();
		$("#btnKPICommentCancel"+intIndex+"_ctl").hide();
	}
	function lblKpiComment_Clicked(objControl) {
		var strControlId = objControl.id;
        var intIndex = strControlId.substr("lblKPIComment".length);
        $("#lblKPIComment"+intIndex+"_ctl").hide();
		$("#txtKPIComment"+intIndex+"_ctl").show();
		$("#btnKPICommentSave"+intIndex+"_ctl").show();
		$("#btnKPICommentCancel"+intIndex+"_ctl").show();
	}
</script>

<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>