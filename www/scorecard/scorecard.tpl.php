<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

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
	foreach($this->btnCategoryArray as $btnCategory) {
		$btnCategory->Render();		
	}
?>
<div class='pcontent'>
<img src='/inst/scorecard/summaryImg.php/<?php _p($this->objScorecard->Id);?>' style='margin:20px;'>
<?php 
	foreach($this->dtgPArray as $dtgP) {
		$dtgP->Render();
	}
?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>