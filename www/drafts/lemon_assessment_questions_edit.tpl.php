<?php
	// This is the HTML template include file (.tpl.php) for the lemon_assessment_questions_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('LemonAssessmentQuestions') . ' - ' . $this->mctLemonAssessmentQuestions->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctLemonAssessmentQuestions->TitleVerb); ?></h2>
		<h1><?php _t('LemonAssessmentQuestions')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->txtCount->RenderWithName(); ?>

		<?php $this->txtText->RenderWithName(); ?>

		<?php $this->lstLemonType->RenderWithName(); ?>

		<?php $this->chkInverse->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>