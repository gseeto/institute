<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the SeasonalAssessment class.  It uses the code-generated
	 * SeasonalAssessmentDataGrid control which has meta-methods to help with
	 * easily creating/defining SeasonalAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both seasonal_assessment_list.php AND
	 * seasonal_assessment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class SeasonalAssessmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list SeasonalAssessments
		protected $dtgSeasonalAssessments;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgSeasonalAssessments = new SeasonalAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSeasonalAssessments->CssClass = 'datagrid';
			$this->dtgSeasonalAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSeasonalAssessments->Paginator = new QPaginator($this->dtgSeasonalAssessments);
			$this->dtgSeasonalAssessments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/seasonal_assessment_edit.php';
			$this->dtgSeasonalAssessments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for seasonal_assessment's properties, or you
			// can traverse down QQN::seasonal_assessment() to display fields that are down the hierarchy)
			$this->dtgSeasonalAssessments->MetaAddColumn('Id');
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->ResourceStatus);
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->Resource);
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->User);
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->Group);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// seasonal_assessment_list.tpl.php as the included HTML template file
	SeasonalAssessmentListForm::Run('SeasonalAssessmentListForm');
?>