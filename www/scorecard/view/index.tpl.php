<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<h1>The <?php _p($this->objScorecard->Name);?> Scorecard</h1>
<br>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<?php 
				// Display the Scorecard Navigation Menu
				foreach (InstituteForm::$NavScorecardArray as $NavScorecardId => $strNavScorecardArray) {
					$strClassInfo = ($NavScorecardId == $this->intNavScorecardId) ? 'class="active"' : null;
					if ($NavScorecardId == InstituteForm::NavScorecardGlobal) {
						if (QApplication::$Login->IsAdmin())
							printf('<li %s><a href="%s%s/%s" title="%s">%s</a></li>',
							$strClassInfo, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strNavScorecardArray[0], $strNavScorecardArray[0]
							);
					} else {
						printf('<li %s><a href="%s%s/%s" title="%s">%s</a></li>',
							$strClassInfo, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strNavScorecardArray[0], $strNavScorecardArray[0]
						);
					}
				}
			?>
		</ul>
	</div>
</nav>
<div class='section'>
<h2>My Top Action Items For The Week</h2>
<p>Action items have been ordered based on the priority specified in the associated Strategy.</p>
<p>However, you can override this by explicitly selecting the Action Items you wish to prioritize by clicking on the 'Add an Action Item to my list' button.</p>
<div class="table-responsive">
<?php $this->dtgTopActions->Render();?>
</div>
<?php $this->btnAddAction->Render(); $this->btnRemoveAction->Render(); ?><br><br>
<div class="table-responsive">
<?php $this->dtgAddAction->RenderWithName(); $this->dtgRemoveAction->RenderWithName(); ?>
</div>
<?php $this->btnSubmit->Render();?>
</div>

<div class='section' style='width:960px;'>
<h2>My Recurring Action Items</h2>
<?php $this->dtgRecurringActions->Render();?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>