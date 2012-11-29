<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the ActionItems class.  It uses the code-generated
	 * ActionItemsDataGrid control which has meta-methods to help with
	 * easily creating/defining ActionItems columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both action_items_list.php AND
	 * action_items_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class ActionItemsListForm extends QForm {
		// Local instance of the Meta DataGrid to list ActionItemses
		protected $dtgActionItemses;

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
			$this->dtgActionItemses = new ActionItemsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgActionItemses->CssClass = 'datagrid';
			$this->dtgActionItemses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgActionItemses->Paginator = new QPaginator($this->dtgActionItemses);
			$this->dtgActionItemses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/action_items_edit.php';
			$this->dtgActionItemses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for action_items's properties, or you
			// can traverse down QQN::action_items() to display fields that are down the hierarchy)
			$this->dtgActionItemses->MetaAddColumn('Id');
			$this->dtgActionItemses->MetaAddColumn('Action');
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->Strategy);
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->Scorecard);
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->WhoObject);
			$this->dtgActionItemses->MetaAddColumn('When');
			$this->dtgActionItemses->MetaAddTypeColumn('StatusType', 'StatusType');
			$this->dtgActionItemses->MetaAddColumn('Comments');
			$this->dtgActionItemses->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgActionItemses->MetaAddColumn('Count');
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->ModifiedByObject);
			$this->dtgActionItemses->MetaAddColumn('Modified');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// action_items_list.tpl.php as the included HTML template file
	ActionItemsListForm::Run('ActionItemsListForm');
?>