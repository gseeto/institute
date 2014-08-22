<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TitleList class.  It uses the code-generated
	 * TitleListDataGrid control which has meta-methods to help with
	 * easily creating/defining TitleList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both title_list_list.php AND
	 * title_list_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TitleListListForm extends QForm {
		// Local instance of the Meta DataGrid to list TitleLists
		protected $dtgTitleLists;

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
			$this->dtgTitleLists = new TitleListDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTitleLists->CssClass = 'datagrid';
			$this->dtgTitleLists->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTitleLists->Paginator = new QPaginator($this->dtgTitleLists);
			$this->dtgTitleLists->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/title_list_edit.php';
			$this->dtgTitleLists->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for title_list's properties, or you
			// can traverse down QQN::title_list() to display fields that are down the hierarchy)
			$this->dtgTitleLists->MetaAddColumn('Id');
			$this->dtgTitleLists->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// title_list_list.tpl.php as the included HTML template file
	TitleListListForm::Run('TitleListListForm');
?>