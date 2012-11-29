<?php
	// This is the HTML template include file (.tpl.php) for the kingdom_business_assessment_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('KingdomBusinessAssessment') . ' - ' . $this->mctKingdomBusinessAssessment->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctKingdomBusinessAssessment->TitleVerb); ?></h2>
		<h1><?php _t('KingdomBusinessAssessment')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstCompany->RenderWithName(); ?>

		<?php $this->lstResource->RenderWithName(); ?>

		<?php $this->lstUser->RenderWithName(); ?>

		<?php $this->lstResourceStatus->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>