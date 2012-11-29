<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the ResourceStatus class.  It uses the code-generated
	 * ResourceStatusDataGrid control which has meta-methods to help with
	 * easily creating/defining ResourceStatus columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both resource_status_list.php AND
	 * resource_status_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class ResourceStatusListForm extends QForm {
		// Local instance of the Meta DataGrid to list ResourceStatuses
		protected $dtgResourceStatuses;

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
			$this->dtgResourceStatuses = new ResourceStatusDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgResourceStatuses->CssClass = 'datagrid';
			$this->dtgResourceStatuses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgResourceStatuses->Paginator = new QPaginator($this->dtgResourceStatuses);
			$this->dtgResourceStatuses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/resource_status_edit.php';
			$this->dtgResourceStatuses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for resource_status's properties, or you
			// can traverse down QQN::resource_status() to display fields that are down the hierarchy)
			$this->dtgResourceStatuses->MetaAddColumn('Id');
			$this->dtgResourceStatuses->MetaAddColumn('Value');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// resource_status_list.tpl.php as the included HTML template file
	ResourceStatusListForm::Run('ResourceStatusListForm');
?>