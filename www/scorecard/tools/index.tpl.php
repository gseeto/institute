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

<h2>Scorecard Tools</h2>
<div class='section'>
<h3>Unassigned Action Items</h3>
<p>Identify all Action Items that are currently unassigned or do not have a due date assigned.</p>
<p>Unassigned Action Items and those where a completion date is not specified are much more likely 
	to fall through the cracks. It is strongly recommended that you assign accordingly and set appropriate dates.
</p>
<h4>Search For:</h4>
<?php $this->chkUnassignedAction->Render('CssClass="checkbox"');?>
<?php $this->chkUndatedAction->Render('CssClass="checkbox"');?>
<div class="table-responsive">
<?php $this->dtgUnassigned->Render('CssClass="table table-bordered"');?>
</div>
</div>

<div class='section'>
<h3>Latest Changes</h3>
<p>View the latest changes to the scorecard by day, week or month. The date modified, and the user who made the change is listed in the table.
</p>
<h4>Display changes in the last:</h4>
<?php $this->lstLatest->Render('CssClass="form-control"');?>
<div class="table-responsive">
<?php $this->dtgLatestStrategy->RenderWithName('CssClass="table table-bordered"');?>
<?php $this->dtgLatestAction->RenderWithName('CssClass="table table-bordered"');?>
<?php $this->dtgLatestKpi->RenderWithName('CssClass="table table-bordered"');?>
</div>
</div>

<div class='section'>
<h3>Search Scorecard By User</h3>
<p>Action Items must be assigned to designated individuals. This function allows you to quickly identify the action items 
assigned to a particular individual.
</p>
<h4>Display all Action Items assigned to:</h4>
<?php $this->lstUser->Render('CssClass="form-control"');?>
<div class="table-responsive">
	<?php $this->dtgUserActions->Render('CssClass="table table-bordered"');?>
</div>
</div>
<script type="text/javascript">
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
function btnCancelUserAction_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnUserActionCancel".length);
	$("#lblUserAction"+intIndex+"_ctl").show();	
	var oldText = $("#lblUserAction"+intIndex).text();
	$("#txtUserAction"+intIndex).text(oldText);
	$("#txtUserAction"+intIndex+"_ctl").hide();
	$("#btnUserActionSave"+intIndex+"_ctl").hide();
	$("#btnUserActionCancel"+intIndex+"_ctl").hide();
}
function lblUserAction_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblUserAction".length);
    $("#lblUserAction"+intIndex+"_ctl").hide();
	$("#txtUserAction"+intIndex+"_ctl").show();
	$("#btnUserActionSave"+intIndex+"_ctl").show();
	$("#btnUserActionCancel"+intIndex+"_ctl").show();
}

function btnCancelUserComment_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnUserCommentCancel".length);
	$("#lblUserComment"+intIndex+"_ctl").show();	
	var oldText = $("#lblUserComment"+intIndex).text();
	$("#txtUserComment"+intIndex).text(oldText);
	$("#txtUserComment"+intIndex+"_ctl").hide();
	$("#btnUserCommentSave"+intIndex+"_ctl").hide();
	$("#btnUserCommentCancel"+intIndex+"_ctl").hide();
}
function lblUserComment_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblUserComment".length);
    $("#lblUserComment"+intIndex+"_ctl").hide();
	$("#txtUserComment"+intIndex+"_ctl").show();
	$("#btnUserCommentSave"+intIndex+"_ctl").show();
	$("#btnUserCommentCancel"+intIndex+"_ctl").show();
}

function btnCancelLatestAction_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnLatestActionCancel".length);
	$("#lblLatestAction"+intIndex+"_ctl").show();	
	var oldText = $("#lblLatestAction"+intIndex).text();
	$("#txLatestAction"+intIndex).text(oldText);
	$("#txtLatestAction"+intIndex+"_ctl").hide();
	$("#btnLatestActionSave"+intIndex+"_ctl").hide();
	$("#btnLatestActionCancel"+intIndex+"_ctl").hide();
}
function lblLatestAction_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblLatestAction".length);
    $("#lblLatestAction"+intIndex+"_ctl").hide();
	$("#txtLatestAction"+intIndex+"_ctl").show();
	$("#btnLatestActionSave"+intIndex+"_ctl").show();
	$("#btnLatestActionCancel"+intIndex+"_ctl").show();
}

function btnCancelLatestComment_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnLatestCommentCancel".length);
	$("#lblLatestComment"+intIndex+"_ctl").show();	
	var oldText = $("#lblLatestComment"+intIndex).text();
	$("#txtLatestComment"+intIndex).text(oldText);
	$("#txtLatestComment"+intIndex+"_ctl").hide();
	$("#btnLatestCommentSave"+intIndex+"_ctl").hide();
	$("#btnLatestCommentCancel"+intIndex+"_ctl").hide();
}
function lblLatestComment_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblLatestComment".length);
    $("#lblLatestComment"+intIndex+"_ctl").hide();
	$("#txtLatestComment"+intIndex+"_ctl").show();
	$("#btnLatestCommentSave"+intIndex+"_ctl").show();
	$("#btnLatestCommentCancel"+intIndex+"_ctl").show();
}

function btnCancelLatestStrategy_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnLatestStrategyCancel".length);
	$("#lblLatestStrategy"+intIndex+"_ctl").show();	
	var oldText = $("#lblLatestStrategy"+intIndex).text();
	$("#txLatestStrategy"+intIndex).text(oldText);
	$("#txtLatestStrategy"+intIndex+"_ctl").hide();
	$("#btnLatestStrategySave"+intIndex+"_ctl").hide();
	$("#btnLatestStrategyCancel"+intIndex+"_ctl").hide();
}
function lblLatestStrategy_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblLatestStrategy".length);
    $("#lblLatestStrategy"+intIndex+"_ctl").hide();
	$("#txtLatestStrategy"+intIndex+"_ctl").show();
	$("#btnLatestStrategySave"+intIndex+"_ctl").show();
	$("#btnLatestStrategyCancel"+intIndex+"_ctl").show();
}

function btnCancelLatestKpi_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnLatestKpiCancel".length);
	$("#lblLatestKpi"+intIndex+"_ctl").show();	
	var oldText = $("#lblLatestKpi"+intIndex).text();
	$("#txLatestKpi"+intIndex).text(oldText);
	$("#txtLatestKpi"+intIndex+"_ctl").hide();
	$("#btnLatestKpiSave"+intIndex+"_ctl").hide();
	$("#btnLatestKpiCancel"+intIndex+"_ctl").hide();
}
function lblLatestKpi_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblLatestKpi".length);
    $("#lblLatestKpi"+intIndex+"_ctl").hide();
	$("#txtLatestKpi"+intIndex+"_ctl").show();
	$("#btnLatestKpiSave"+intIndex+"_ctl").show();
	$("#btnLatestKpiCancel"+intIndex+"_ctl").show();
}

function btnCancelLatestKpiComment_Click(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("btnLatestKpiCommentCancel".length);
	$("#lblLatestKpiComment"+intIndex+"_ctl").show();	
	var oldText = $("#lblLatestKpiComment"+intIndex).text();
	$("#txLatestKpiComment"+intIndex).text(oldText);
	$("#txtLatestKpiComment"+intIndex+"_ctl").hide();
	$("#btnLatestKpiCommentSave"+intIndex+"_ctl").hide();
	$("#btnLatestKpiCommentCancel"+intIndex+"_ctl").hide();
}
function lblLatestKpiComment_Clicked(objControl) {
	var strControlId = objControl.id;
    var intIndex = strControlId.substr("lblLatestKpiComment".length);
    $("#lblLatestKpiComment"+intIndex+"_ctl").hide();
	$("#txtLatestKpiComment"+intIndex+"_ctl").show();
	$("#btnLatestKpiCommentSave"+intIndex+"_ctl").show();
	$("#btnLatestKpiCommentCancel"+intIndex+"_ctl").show();
}
</script>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>