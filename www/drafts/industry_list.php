<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Industry class.  It uses the code-generated
	 * IndustryDataGrid control which has meta-methods to help with
	 * easily creating/defining Industry columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both industry_list.php AND
	 * industry_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class IndustryListForm extends QForm {
		// Local instance of the Meta DataGrid to list Industries
		protected $dtgIndustries;

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
			$this->dtgIndustries = new IndustryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgIndustries->CssClass = 'datagrid';
			$this->dtgIndustries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgIndustries->Paginator = new QPaginator($this->dtgIndustries);
			$this->dtgIndustries->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/industry_edit.php';
			$this->dtgIndustries->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for industry's properties, or you
			// can traverse down QQN::industry() to display fields that are down the hierarchy)
			$this->dtgIndustries->MetaAddColumn('Id');
			$this->dtgIndustries->MetaAddColumn('Value');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// industry_list.tpl.php as the included HTML template file
	IndustryListForm::Run('IndustryListForm');
?>