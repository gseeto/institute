<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the ConvergenceTime class.  It uses the code-generated
	 * ConvergenceTimeDataGrid control which has meta-methods to help with
	 * easily creating/defining ConvergenceTime columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both convergence_time_list.php AND
	 * convergence_time_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class ConvergenceTimeListForm extends QForm {
		// Local instance of the Meta DataGrid to list ConvergenceTimes
		protected $dtgConvergenceTimes;

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
			$this->dtgConvergenceTimes = new ConvergenceTimeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgConvergenceTimes->CssClass = 'datagrid';
			$this->dtgConvergenceTimes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgConvergenceTimes->Paginator = new QPaginator($this->dtgConvergenceTimes);
			$this->dtgConvergenceTimes->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/convergence_time_edit.php';
			$this->dtgConvergenceTimes->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for convergence_time's properties, or you
			// can traverse down QQN::convergence_time() to display fields that are down the hierarchy)
			$this->dtgConvergenceTimes->MetaAddColumn('Id');
			$this->dtgConvergenceTimes->MetaAddColumn(QQN::ConvergenceTime()->User);
			$this->dtgConvergenceTimes->MetaAddColumn('Time');
			$this->dtgConvergenceTimes->MetaAddColumn('Activity');
			$this->dtgConvergenceTimes->MetaAddColumn('Career');
			$this->dtgConvergenceTimes->MetaAddColumn('Calling');
			$this->dtgConvergenceTimes->MetaAddColumn('Community');
			$this->dtgConvergenceTimes->MetaAddColumn('Creativity');
			$this->dtgConvergenceTimes->MetaAddColumn('Margin');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// convergence_time_list.tpl.php as the included HTML template file
	ConvergenceTimeListForm::Run('ConvergenceTimeListForm');
?>