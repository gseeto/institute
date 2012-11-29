<?php
	// This is the HTML template include file (.tpl.php) for the strategy_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Strategy') . ' - ' . $this->mctStrategy->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctStrategy->TitleVerb); ?></h2>
		<h1><?php _t('Strategy')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->txtStrategy->RenderWithName(); ?>

		<?php $this->txtPriority->RenderWithName(); ?>

		<?php $this->txtCount->RenderWithName(); ?>

		<?php $this->lstScorecard->RenderWithName(); ?>

		<?php $this->lstCategoryType->RenderWithName(); ?>

		<?php $this->lstModifiedByObject->RenderWithName(); ?>

		<?php $this->lblModified->RenderWithName(); ?>

		<?php $this->lstGiantsesAsGiant->RenderWithName(true, "Rows=7"); ?>

		<?php $this->lstSpheresesAsSphere->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>