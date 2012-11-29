<?php
	// This is the HTML template include file (.tpl.php) for the user_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('User') . ' - ' . $this->mctUser->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctUser->TitleVerb); ?></h2>
		<h1><?php _t('User')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstLogin->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>

		<?php $this->txtLastName->RenderWithName(); ?>

		<?php $this->txtEmail->RenderWithName(); ?>

		<?php $this->chkGender->RenderWithName(); ?>

		<?php $this->txtCountry->RenderWithName(); ?>

		<?php $this->txtDepartment->RenderWithName(); ?>

		<?php $this->txtTitle->RenderWithName(); ?>

		<?php $this->txtTenure->RenderWithName(); ?>

		<?php $this->txtCareerLength->RenderWithName(); ?>

		<?php $this->lstCompanies->RenderWithName(true, "Rows=7"); ?>

		<?php $this->lstResources->RenderWithName(true, "Rows=7"); ?>

		<?php $this->lstScorecards->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>