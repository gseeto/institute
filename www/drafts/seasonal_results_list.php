<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the SeasonalResults class.  It uses the code-generated
	 * SeasonalResultsDataGrid control which has meta-methods to help with
	 * easily creating/defining SeasonalResults columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both seasonal_results_list.php AND
	 * seasonal_results_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class SeasonalResultsListForm extends QForm {
		// Local instance of the Meta DataGrid to list SeasonalResultses
		protected $dtgSeasonalResultses;

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
			$this->dtgSeasonalResultses = new SeasonalResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSeasonalResultses->CssClass = 'datagrid';
			$this->dtgSeasonalResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSeasonalResultses->Paginator = new QPaginator($this->dtgSeasonalResultses);
			$this->dtgSeasonalResultses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/seasonal_results_edit.php';
			$this->dtgSeasonalResultses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for seasonal_results's properties, or you
			// can traverse down QQN::seasonal_results() to display fields that are down the hierarchy)
			$this->dtgSeasonalResultses->MetaAddColumn('Id');
			$this->dtgSeasonalResultses->MetaAddColumn(QQN::SeasonalResults()->Question);
			$this->dtgSeasonalResultses->MetaAddColumn(QQN::SeasonalResults()->Assessment);
			$this->dtgSeasonalResultses->MetaAddColumn('Result');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// seasonal_results_list.tpl.php as the included HTML template file
	SeasonalResultsListForm::Run('SeasonalResultsListForm');
?>