<?php
	// This is the HTML template include file (.tpl.php) for group_assessment_listEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->txtTotalKeys->RenderWithName(); ?>

		<?php $_CONTROL->txtKeysLeft->RenderWithName(); ?>

		<?php $_CONTROL->lstResource->RenderWithName(); ?>

		<?php $_CONTROL->txtKeyCode->RenderWithName(); ?>

		<?php $_CONTROL->txtDescription->RenderWithName(); ?>

		<?php $_CONTROL->calDateModified->RenderWithName(); ?>

		<?php $_CONTROL->lstUsersAsAssessmentManager->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
