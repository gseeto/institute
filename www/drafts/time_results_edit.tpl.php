<?php
	// This is the HTML template include file (.tpl.php) for the time_results_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('TimeResults') . ' - ' . $this->mctTimeResults->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctTimeResults->TitleVerb); ?></h2>
		<h1><?php _t('TimeResults')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstAssessment->RenderWithName(); ?>

		<?php $this->txtTime->RenderWithName(); ?>

		<?php $this->txtActivity->RenderWithName(); ?>

		<?php $this->chkCareer->RenderWithName(); ?>

		<?php $this->chkCalling->RenderWithName(); ?>

		<?php $this->chkCommunity->RenderWithName(); ?>

		<?php $this->chkCreativity->RenderWithName(); ?>

		<?php $this->chkMargin->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>