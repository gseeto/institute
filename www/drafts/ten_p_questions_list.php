<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TenPQuestions class.  It uses the code-generated
	 * TenPQuestionsDataGrid control which has meta-methods to help with
	 * easily creating/defining TenPQuestions columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ten_p_questions_list.php AND
	 * ten_p_questions_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TenPQuestionsListForm extends QForm {
		// Local instance of the Meta DataGrid to list TenPQuestionses
		protected $dtgTenPQuestionses;

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
			$this->dtgTenPQuestionses = new TenPQuestionsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTenPQuestionses->CssClass = 'datagrid';
			$this->dtgTenPQuestionses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTenPQuestionses->Paginator = new QPaginator($this->dtgTenPQuestionses);
			$this->dtgTenPQuestionses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ten_p_questions_edit.php';
			$this->dtgTenPQuestionses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ten_p_questions's properties, or you
			// can traverse down QQN::ten_p_questions() to display fields that are down the hierarchy)
			$this->dtgTenPQuestionses->MetaAddColumn('Id');
			$this->dtgTenPQuestionses->MetaAddColumn('Count');
			$this->dtgTenPQuestionses->MetaAddColumn('Text');
			$this->dtgTenPQuestionses->MetaAddTypeColumn('CategoryId', 'CategoryType');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// ten_p_questions_list.tpl.php as the included HTML template file
	TenPQuestionsListForm::Run('TenPQuestionsListForm');
?>