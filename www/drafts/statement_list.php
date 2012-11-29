<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Statement class.  It uses the code-generated
	 * StatementDataGrid control which has meta-methods to help with
	 * easily creating/defining Statement columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both statement_list.php AND
	 * statement_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class StatementListForm extends QForm {
		// Local instance of the Meta DataGrid to list Statements
		protected $dtgStatements;

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
			$this->dtgStatements = new StatementDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStatements->CssClass = 'datagrid';
			$this->dtgStatements->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStatements->Paginator = new QPaginator($this->dtgStatements);
			$this->dtgStatements->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/statement_edit.php';
			$this->dtgStatements->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for statement's properties, or you
			// can traverse down QQN::statement() to display fields that are down the hierarchy)
			$this->dtgStatements->MetaAddColumn('Id');
			$this->dtgStatements->MetaAddColumn('Value');
			$this->dtgStatements->MetaAddColumn(QQN::Statement()->Scorecard);
			$this->dtgStatements->MetaAddColumn('IsPurpose');
			$this->dtgStatements->MetaAddColumn(QQN::Statement()->ModifiedByObject);
			$this->dtgStatements->MetaAddColumn('Modified');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// statement_list.tpl.php as the included HTML template file
	StatementListForm::Run('StatementListForm');
?>