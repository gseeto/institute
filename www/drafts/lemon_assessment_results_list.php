<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the LemonAssessmentResults class.  It uses the code-generated
	 * LemonAssessmentResultsDataGrid control which has meta-methods to help with
	 * easily creating/defining LemonAssessmentResults columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both lemon_assessment_results_list.php AND
	 * lemon_assessment_results_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class LemonAssessmentResultsListForm extends QForm {
		// Local instance of the Meta DataGrid to list LemonAssessmentResultses
		protected $dtgLemonAssessmentResultses;

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
			$this->dtgLemonAssessmentResultses = new LemonAssessmentResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgLemonAssessmentResultses->CssClass = 'datagrid';
			$this->dtgLemonAssessmentResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgLemonAssessmentResultses->Paginator = new QPaginator($this->dtgLemonAssessmentResultses);
			$this->dtgLemonAssessmentResultses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/lemon_assessment_results_edit.php';
			$this->dtgLemonAssessmentResultses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for lemon_assessment_results's properties, or you
			// can traverse down QQN::lemon_assessment_results() to display fields that are down the hierarchy)
			$this->dtgLemonAssessmentResultses->MetaAddColumn('Id');
			$this->dtgLemonAssessmentResultses->MetaAddColumn(QQN::LemonAssessmentResults()->Question);
			$this->dtgLemonAssessmentResultses->MetaAddColumn(QQN::LemonAssessmentResults()->Assessment);
			$this->dtgLemonAssessmentResultses->MetaAddColumn('Value');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// lemon_assessment_results_list.tpl.php as the included HTML template file
	LemonAssessmentResultsListForm::Run('LemonAssessmentResultsListForm');
?>