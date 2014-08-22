<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TenureList class.  It uses the code-generated
	 * TenureListDataGrid control which has meta-methods to help with
	 * easily creating/defining TenureList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both tenure_list_list.php AND
	 * tenure_list_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TenureListListForm extends QForm {
		// Local instance of the Meta DataGrid to list TenureLists
		protected $dtgTenureLists;

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
			$this->dtgTenureLists = new TenureListDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTenureLists->CssClass = 'datagrid';
			$this->dtgTenureLists->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTenureLists->Paginator = new QPaginator($this->dtgTenureLists);
			$this->dtgTenureLists->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/tenure_list_edit.php';
			$this->dtgTenureLists->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for tenure_list's properties, or you
			// can traverse down QQN::tenure_list() to display fields that are down the hierarchy)
			$this->dtgTenureLists->MetaAddColumn('Id');
			$this->dtgTenureLists->MetaAddColumn('Range');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// tenure_list_list.tpl.php as the included HTML template file
	TenureListListForm::Run('TenureListListForm');
?>