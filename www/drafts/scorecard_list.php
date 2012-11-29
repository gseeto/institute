<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Scorecard class.  It uses the code-generated
	 * ScorecardDataGrid control which has meta-methods to help with
	 * easily creating/defining Scorecard columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both scorecard_list.php AND
	 * scorecard_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class ScorecardListForm extends QForm {
		// Local instance of the Meta DataGrid to list Scorecards
		protected $dtgScorecards;

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
			$this->dtgScorecards = new ScorecardDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgScorecards->CssClass = 'datagrid';
			$this->dtgScorecards->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgScorecards->Paginator = new QPaginator($this->dtgScorecards);
			$this->dtgScorecards->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/scorecard_edit.php';
			$this->dtgScorecards->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for scorecard's properties, or you
			// can traverse down QQN::scorecard() to display fields that are down the hierarchy)
			$this->dtgScorecards->MetaAddColumn('Id');
			$this->dtgScorecards->MetaAddColumn(QQN::Scorecard()->Company);
			$this->dtgScorecards->MetaAddColumn('Name');
			$this->dtgScorecards->MetaAddColumn(QQN::Scorecard()->Resource);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// scorecard_list.tpl.php as the included HTML template file
	ScorecardListForm::Run('ScorecardListForm');
?>