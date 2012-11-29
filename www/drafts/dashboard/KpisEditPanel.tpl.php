<?php
	// This is the HTML template include file (.tpl.php) for kpisEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstStrategy->RenderWithName(); ?>

		<?php $_CONTROL->lstScorecard->RenderWithName(); ?>

		<?php $_CONTROL->txtRating->RenderWithName(); ?>

		<?php $_CONTROL->txtKpi->RenderWithName(); ?>

		<?php $_CONTROL->txtCount->RenderWithName(); ?>

		<?php $_CONTROL->txtComments->RenderWithName(); ?>

		<?php $_CONTROL->lstModifiedByObject->RenderWithName(); ?>

		<?php $_CONTROL->lblModified->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
