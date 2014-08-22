<?php
	// This is the HTML template include file (.tpl.php) for the lemon_assessment_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('LemonAssessment') . ' - ' . $this->mctLemonAssessment->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctLemonAssessment->TitleVerb); ?></h2>
		<h1><?php _t('LemonAssessment')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstUser->RenderWithName(); ?>

		<?php $this->lstCompany->RenderWithName(); ?>

		<?php $this->lstResource->RenderWithName(); ?>

		<?php $this->txtResourceStatusId->RenderWithName(); ?>

		<?php $this->lstGroup->RenderWithName(); ?>

		<?php $this->txtL->RenderWithName(); ?>

		<?php $this->txtE->RenderWithName(); ?>

		<?php $this->txtM->RenderWithName(); ?>

		<?php $this->txtO->RenderWithName(); ?>

		<?php $this->txtN->RenderWithName(); ?>

		<?php $this->calDateModified->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>