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

<h2>Scorecard Tools</h2>
<div class='subsection' style='width:960px;'>
<h3>Unassigned Action Items</h3>
<p>Identify all Action Items that are currently unassigned or do not have a due date assigned.</p>
<p>Unassigned Action Items and those where a completion date is not specified are much more likely 
	to fall through the cracks. It is strongly recommended that you assign accordingly and set appropriate dates.
</p>
<h4>Search For:</h4>
<?php $this->chkUnassignedAction->Render();?>
<?php $this->chkUndatedAction->Render();?>

<?php $this->dtgUnassigned->Render();?>
</div>

<div class='subsection' style='width:960px;'>
<h3>Latest Changes</h3>
<p>View the latest changes to the scorecard by day, week or month. The date modified, and the user who made the change is listed in the table.
</p>
<h4>Display changes in the last:</h4>
<?php $this->lstLatest->Render();?>

<?php $this->dtgLatestStrategy->RenderWithName();?>
<?php $this->dtgLatestAction->RenderWithName();?>
<?php $this->dtgLatestKpi->RenderWithName();?>
</div>

<div class='subsection' style='width:960px;'>
<h3>Search Scorecard By User</h3>
<p>Action Items must be assigned to designated individuals. This function allows you to quickly identify the action items 
assigned to a particular individual.
</p>
<h4>Display all Action Items assigned to:</h4>
<?php $this->lstUser->Render();?>

<?php $this->dtgUserActions->Render();?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>