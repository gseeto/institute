<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the LraQuestions class.  It uses the code-generated
	 * LraQuestionsDataGrid control which has meta-methods to help with
	 * easily creating/defining LraQuestions columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both lra_questions_list.php AND
	 * lra_questions_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class LraQuestionsListForm extends QForm {
		// Local instance of the Meta DataGrid to list LraQuestionses
		protected $dtgLraQuestionses;

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
			$this->dtgLraQuestionses = new LraQuestionsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgLraQuestionses->CssClass = 'datagrid';
			$this->dtgLraQuestionses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgLraQuestionses->Paginator = new QPaginator($this->dtgLraQuestionses);
			$this->dtgLraQuestionses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/lra_questions_edit.php';
			$this->dtgLraQuestionses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for lra_questions's properties, or you
			// can traverse down QQN::lra_questions() to display fields that are down the hierarchy)
			$this->dtgLraQuestionses->MetaAddColumn('Id');
			$this->dtgLraQuestionses->MetaAddColumn('Count');
			$this->dtgLraQuestionses->MetaAddColumn('Text');
			$this->dtgLraQuestionses->MetaAddTypeColumn('CategoryId', 'LraCategoryType');
			$this->dtgLraQuestionses->MetaAddColumn('Invert');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// lra_questions_list.tpl.php as the included HTML template file
	LraQuestionsListForm::Run('LraQuestionsListForm');
?>