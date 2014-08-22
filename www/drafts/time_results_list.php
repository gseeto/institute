<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TimeResults class.  It uses the code-generated
	 * TimeResultsDataGrid control which has meta-methods to help with
	 * easily creating/defining TimeResults columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both time_results_list.php AND
	 * time_results_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TimeResultsListForm extends QForm {
		// Local instance of the Meta DataGrid to list TimeResultses
		protected $dtgTimeResultses;

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
			$this->dtgTimeResultses = new TimeResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTimeResultses->CssClass = 'datagrid';
			$this->dtgTimeResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTimeResultses->Paginator = new QPaginator($this->dtgTimeResultses);
			$this->dtgTimeResultses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/time_results_edit.php';
			$this->dtgTimeResultses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for time_results's properties, or you
			// can traverse down QQN::time_results() to display fields that are down the hierarchy)
			$this->dtgTimeResultses->MetaAddColumn('Id');
			$this->dtgTimeResultses->MetaAddColumn(QQN::TimeResults()->Assessment);
			$this->dtgTimeResultses->MetaAddColumn('Time');
			$this->dtgTimeResultses->MetaAddColumn('Activity');
			$this->dtgTimeResultses->MetaAddColumn('Career');
			$this->dtgTimeResultses->MetaAddColumn('Calling');
			$this->dtgTimeResultses->MetaAddColumn('Community');
			$this->dtgTimeResultses->MetaAddColumn('Creativity');
			$this->dtgTimeResultses->MetaAddColumn('Margin');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// time_results_list.tpl.php as the included HTML template file
	TimeResultsListForm::Run('TimeResultsListForm');
?>