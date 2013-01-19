<?php
	// This is the HTML template include file (.tpl.php) for ten_p_assessmentEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstResourceStatus->RenderWithName(); ?>

		<?php $_CONTROL->lstCompany->RenderWithName(); ?>

		<?php $_CONTROL->lstResource->RenderWithName(); ?>

		<?php $_CONTROL->lstUser->RenderWithName(); ?>

		<?php $_CONTROL->lstGroup->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
