<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Company class.  It uses the code-generated
	 * CompanyDataGrid control which has meta-methods to help with
	 * easily creating/defining Company columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both company_list.php AND
	 * company_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class CompanyListForm extends QForm {
		// Local instance of the Meta DataGrid to list Companies
		protected $dtgCompanies;

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
			$this->dtgCompanies = new CompanyDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCompanies->CssClass = 'datagrid';
			$this->dtgCompanies->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCompanies->Paginator = new QPaginator($this->dtgCompanies);
			$this->dtgCompanies->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/company_edit.php';
			$this->dtgCompanies->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for company's properties, or you
			// can traverse down QQN::company() to display fields that are down the hierarchy)
			$this->dtgCompanies->MetaAddColumn('Id');
			$this->dtgCompanies->MetaAddColumn('Name');
			$this->dtgCompanies->MetaAddColumn(QQN::Company()->Address);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// company_list.tpl.php as the included HTML template file
	CompanyListForm::Run('CompanyListForm');
?>