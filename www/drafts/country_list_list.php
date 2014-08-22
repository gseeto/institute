<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the CountryList class.  It uses the code-generated
	 * CountryListDataGrid control which has meta-methods to help with
	 * easily creating/defining CountryList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both country_list_list.php AND
	 * country_list_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class CountryListListForm extends QForm {
		// Local instance of the Meta DataGrid to list CountryLists
		protected $dtgCountryLists;

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
			$this->dtgCountryLists = new CountryListDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCountryLists->CssClass = 'datagrid';
			$this->dtgCountryLists->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCountryLists->Paginator = new QPaginator($this->dtgCountryLists);
			$this->dtgCountryLists->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/country_list_edit.php';
			$this->dtgCountryLists->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for country_list's properties, or you
			// can traverse down QQN::country_list() to display fields that are down the hierarchy)
			$this->dtgCountryLists->MetaAddColumn('Id');
			$this->dtgCountryLists->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// country_list_list.tpl.php as the included HTML template file
	CountryListListForm::Run('CountryListListForm');
?>