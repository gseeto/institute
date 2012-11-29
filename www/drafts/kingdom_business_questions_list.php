<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the KingdomBusinessQuestions class.  It uses the code-generated
	 * KingdomBusinessQuestionsDataGrid control which has meta-methods to help with
	 * easily creating/defining KingdomBusinessQuestions columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both kingdom_business_questions_list.php AND
	 * kingdom_business_questions_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class KingdomBusinessQuestionsListForm extends QForm {
		// Local instance of the Meta DataGrid to list KingdomBusinessQuestionses
		protected $dtgKingdomBusinessQuestionses;

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
			$this->dtgKingdomBusinessQuestionses = new KingdomBusinessQuestionsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgKingdomBusinessQuestionses->CssClass = 'datagrid';
			$this->dtgKingdomBusinessQuestionses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgKingdomBusinessQuestionses->Paginator = new QPaginator($this->dtgKingdomBusinessQuestionses);
			$this->dtgKingdomBusinessQuestionses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/kingdom_business_questions_edit.php';
			$this->dtgKingdomBusinessQuestionses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for kingdom_business_questions's properties, or you
			// can traverse down QQN::kingdom_business_questions() to display fields that are down the hierarchy)
			$this->dtgKingdomBusinessQuestionses->MetaAddColumn('Id');
			$this->dtgKingdomBusinessQuestionses->MetaAddColumn('Count');
			$this->dtgKingdomBusinessQuestionses->MetaAddColumn('Text');
			$this->dtgKingdomBusinessQuestionses->MetaAddTypeColumn('CategoryId', 'CategoryType');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// kingdom_business_questions_list.tpl.php as the included HTML template file
	KingdomBusinessQuestionsListForm::Run('KingdomBusinessQuestionsListForm');
?>