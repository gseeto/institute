<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the LraResults class.  It uses the code-generated
	 * LraResultsDataGrid control which has meta-methods to help with
	 * easily creating/defining LraResults columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both lra_results_list.php AND
	 * lra_results_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class LraResultsListForm extends QForm {
		// Local instance of the Meta DataGrid to list LraResultses
		protected $dtgLraResultses;

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
			$this->dtgLraResultses = new LraResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgLraResultses->CssClass = 'datagrid';
			$this->dtgLraResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgLraResultses->Paginator = new QPaginator($this->dtgLraResultses);
			$this->dtgLraResultses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/lra_results_edit.php';
			$this->dtgLraResultses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for lra_results's properties, or you
			// can traverse down QQN::lra_results() to display fields that are down the hierarchy)
			$this->dtgLraResultses->MetaAddColumn('Id');
			$this->dtgLraResultses->MetaAddColumn(QQN::LraResults()->Question);
			$this->dtgLraResultses->MetaAddColumn(QQN::LraResults()->Assessment);
			$this->dtgLraResultses->MetaAddColumn('Head');
			$this->dtgLraResultses->MetaAddColumn('Hands');
			$this->dtgLraResultses->MetaAddColumn('Heart');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// lra_results_list.tpl.php as the included HTML template file
	LraResultsListForm::Run('LraResultsListForm');
?>