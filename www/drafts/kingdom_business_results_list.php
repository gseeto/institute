<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the KingdomBusinessResults class.  It uses the code-generated
	 * KingdomBusinessResultsDataGrid control which has meta-methods to help with
	 * easily creating/defining KingdomBusinessResults columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both kingdom_business_results_list.php AND
	 * kingdom_business_results_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class KingdomBusinessResultsListForm extends QForm {
		// Local instance of the Meta DataGrid to list KingdomBusinessResultses
		protected $dtgKingdomBusinessResultses;

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
			$this->dtgKingdomBusinessResultses = new KingdomBusinessResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgKingdomBusinessResultses->CssClass = 'datagrid';
			$this->dtgKingdomBusinessResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgKingdomBusinessResultses->Paginator = new QPaginator($this->dtgKingdomBusinessResultses);
			$this->dtgKingdomBusinessResultses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/kingdom_business_results_edit.php';
			$this->dtgKingdomBusinessResultses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for kingdom_business_results's properties, or you
			// can traverse down QQN::kingdom_business_results() to display fields that are down the hierarchy)
			$this->dtgKingdomBusinessResultses->MetaAddColumn('Id');
			$this->dtgKingdomBusinessResultses->MetaAddColumn(QQN::KingdomBusinessResults()->Question);
			$this->dtgKingdomBusinessResultses->MetaAddColumn(QQN::KingdomBusinessResults()->Assessment);
			$this->dtgKingdomBusinessResultses->MetaAddColumn('Performance');
			$this->dtgKingdomBusinessResultses->MetaAddColumn('Importance');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// kingdom_business_results_list.tpl.php as the included HTML template file
	KingdomBusinessResultsListForm::Run('KingdomBusinessResultsListForm');
?>