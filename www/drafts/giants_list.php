<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Giants class.  It uses the code-generated
	 * GiantsDataGrid control which has meta-methods to help with
	 * easily creating/defining Giants columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both giants_list.php AND
	 * giants_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class GiantsListForm extends QForm {
		// Local instance of the Meta DataGrid to list Giantses
		protected $dtgGiantses;

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
			$this->dtgGiantses = new GiantsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGiantses->CssClass = 'datagrid';
			$this->dtgGiantses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGiantses->Paginator = new QPaginator($this->dtgGiantses);
			$this->dtgGiantses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/giants_edit.php';
			$this->dtgGiantses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for giants's properties, or you
			// can traverse down QQN::giants() to display fields that are down the hierarchy)
			$this->dtgGiantses->MetaAddColumn('Id');
			$this->dtgGiantses->MetaAddColumn('Giant');
			$this->dtgGiantses->MetaAddColumn('Country');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// giants_list.tpl.php as the included HTML template file
	GiantsListForm::Run('GiantsListForm');
?>