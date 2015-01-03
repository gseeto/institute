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
<div class='section' style='width:960px;'>
<h2>My Top Action Items For The Week</h2>
<p>Action items have been ordered based on the priority specified in the associated Strategy.</p>
<p>However, you can override this by explicitly selecting the Action Items you wish to prioritize by clicking on the 'Add an Action Item to my list' button.</p>
<?php $this->dtgTopActions->Render();?>
<?php $this->btnAddAction->Render(); $this->btnRemoveAction->Render(); ?><br><br>
<?php $this->dtgAddAction->Render(); $this->dtgRemoveAction->Render(); ?>
<?php $this->btnSubmit->Render();?>
</div>

<div class='section' style='width:960px;'>
<h2>My Recurring Action Items</h2>
<?php $this->dtgRecurringActions->Render();?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>