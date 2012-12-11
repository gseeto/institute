<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the CannedActionItem class.  It uses the code-generated
	 * CannedActionItemDataGrid control which has meta-methods to help with
	 * easily creating/defining CannedActionItem columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both canned_action_item_list.php AND
	 * canned_action_item_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class CannedActionItemListForm extends QForm {
		// Local instance of the Meta DataGrid to list CannedActionItems
		protected $dtgCannedActionItems;

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
			$this->dtgCannedActionItems = new CannedActionItemDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCannedActionItems->CssClass = 'datagrid';
			$this->dtgCannedActionItems->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCannedActionItems->Paginator = new QPaginator($this->dtgCannedActionItems);
			$this->dtgCannedActionItems->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/canned_action_item_edit.php';
			$this->dtgCannedActionItems->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for canned_action_item's properties, or you
			// can traverse down QQN::canned_action_item() to display fields that are down the hierarchy)
			$this->dtgCannedActionItems->MetaAddColumn('Id');
			$this->dtgCannedActionItems->MetaAddColumn('Action');
			$this->dtgCannedActionItems->MetaAddColumn(QQN::CannedActionItem()->Strategy);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// canned_action_item_list.tpl.php as the included HTML template file
	CannedActionItemListForm::Run('CannedActionItemListForm');
?>