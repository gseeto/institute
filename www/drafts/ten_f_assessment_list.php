<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TenFAssessment class.  It uses the code-generated
	 * TenFAssessmentDataGrid control which has meta-methods to help with
	 * easily creating/defining TenFAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ten_f_assessment_list.php AND
	 * ten_f_assessment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TenFAssessmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list TenFAssessments
		protected $dtgTenFAssessments;

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
			$this->dtgTenFAssessments = new TenFAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTenFAssessments->CssClass = 'datagrid';
			$this->dtgTenFAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTenFAssessments->Paginator = new QPaginator($this->dtgTenFAssessments);
			$this->dtgTenFAssessments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ten_f_assessment_edit.php';
			$this->dtgTenFAssessments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ten_f_assessment's properties, or you
			// can traverse down QQN::ten_f_assessment() to display fields that are down the hierarchy)
			$this->dtgTenFAssessments->MetaAddColumn('Id');
			$this->dtgTenFAssessments->MetaAddColumn(QQN::TenFAssessment()->ResourceStatus);
			$this->dtgTenFAssessments->MetaAddColumn(QQN::TenFAssessment()->Resource);
			$this->dtgTenFAssessments->MetaAddColumn(QQN::TenFAssessment()->User);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// ten_f_assessment_list.tpl.php as the included HTML template file
	TenFAssessmentListForm::Run('TenFAssessmentListForm');
?>