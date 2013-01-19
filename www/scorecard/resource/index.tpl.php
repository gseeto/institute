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
<img src='/resources/scorecard/resource/resourceImg.php/<?php _p($this->objScorecard->Id);?>' style='margin:20px;'>
<div class="section">
<h2>Individual Information</h2>
<?php  $this->lstIndividuals->RenderWithName();?>
<?php 
	$this->lblTitle->Render();
	$this->lblStatistics->Render();
	$this->lblStrategies->Render();
	$this->dtgStrategies->Render();
	
	$this->lblTotalActionItems->Render();
	
	$this->lblZeroPct->Render();
	$this->dtgZeroPct->Render();
	$this->lblTwentyFivePct->Render();
	$this->dtgTwentyFivePct->Render();
	$this->lblFiftyPct->Render();
	$this->dtgFiftyPct->Render();
	$this->lblSeventyFivePct->Render();
	$this->dtgSeventyFivePct->Render();
	$this->lblHundredPct->Render();
	$this->dtgHundredPct->Render();
	$this->lblRecurringPct->Render();
	$this->dtgRecurringPct->Render();
	
	$this->lblOverdue->Render();
	$this->dtgOverdue->Render();
	
	$this->lblPriorityHigh->Render();
	$this->dtgPriorityHigh->Render();
	$this->lblPriorityMedium->Render();
	$this->dtgPriorityMedium->Render();
	$this->lblPriorityLow->Render();
	$this->dtgPriorityLow->Render();
	$this->lblPriorityNone->Render();
	$this->dtgPriorityNone->Render();
	
	$this->lblForecast->Render();
	$this->lblForecastTenDay->Render();
	$this->dtgForecastTenDay->Render();
	$this->lblForecastThirtyDay->Render();
	$this->dtgForecastThirtyDay->Render();
	
	$this->imgResourceAllocation->Render();
	$this->lblDebug->Render();
?>
<br>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>