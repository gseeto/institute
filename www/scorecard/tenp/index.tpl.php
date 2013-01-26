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
	 $this->lblStatement->render();
	 $this->imgStatement->render();
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
	$this->dtgStrategyArray[$i]->Render();

	// Display the Action Items
	if ($this->dtgActionItems[$i])
		$this->dtgActionItems[$i]->Render();
	$this->btnAddAction[$i]->Render();
	
	// Display the KPIs
	if ($this->dtgKPIs[$i])
		$this->dtgKPIs[$i]->Render();
	$this->btnAddKPIs[$i]->Render();
}
?>
</div>

<script type="text/javascript">
$( ".ui-theme-button" ).button();

</script>

<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>