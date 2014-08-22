<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TimeAssessment class.  It uses the code-generated
	 * TimeAssessmentDataGrid control which has meta-methods to help with
	 * easily creating/defining TimeAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both time_assessment_list.php AND
	 * time_assessment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TimeAssessmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list TimeAssessments
		protected $dtgTimeAssessments;

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
			$this->dtgTimeAssessments = new TimeAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTimeAssessments->CssClass = 'datagrid';
			$this->dtgTimeAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTimeAssessments->Paginator = new QPaginator($this->dtgTimeAssessments);
			$this->dtgTimeAssessments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/time_assessment_edit.php';
			$this->dtgTimeAssessments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for time_assessment's properties, or you
			// can traverse down QQN::time_assessment() to display fields that are down the hierarchy)
			$this->dtgTimeAssessments->MetaAddColumn('Id');
			$this->dtgTimeAssessments->MetaAddColumn(QQN::TimeAssessment()->ResourceStatus);
			$this->dtgTimeAssessments->MetaAddColumn(QQN::TimeAssessment()->Resource);
			$this->dtgTimeAssessments->MetaAddColumn(QQN::TimeAssessment()->User);
			$this->dtgTimeAssessments->MetaAddColumn(QQN::TimeAssessment()->Group);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// time_assessment_list.tpl.php as the included HTML template file
	TimeAssessmentListForm::Run('TimeAssessmentListForm');
?>