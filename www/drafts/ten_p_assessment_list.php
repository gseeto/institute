<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the TenPAssessment class.  It uses the code-generated
	 * TenPAssessmentDataGrid control which has meta-methods to help with
	 * easily creating/defining TenPAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ten_p_assessment_list.php AND
	 * ten_p_assessment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TenPAssessmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list TenPAssessments
		protected $dtgTenPAssessments;

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
			$this->dtgTenPAssessments = new TenPAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTenPAssessments->CssClass = 'datagrid';
			$this->dtgTenPAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTenPAssessments->Paginator = new QPaginator($this->dtgTenPAssessments);
			$this->dtgTenPAssessments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ten_p_assessment_edit.php';
			$this->dtgTenPAssessments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ten_p_assessment's properties, or you
			// can traverse down QQN::ten_p_assessment() to display fields that are down the hierarchy)
			$this->dtgTenPAssessments->MetaAddColumn('Id');
			$this->dtgTenPAssessments->MetaAddColumn(QQN::TenPAssessment()->ResourceStatus);
			$this->dtgTenPAssessments->MetaAddColumn(QQN::TenPAssessment()->Company);
			$this->dtgTenPAssessments->MetaAddColumn(QQN::TenPAssessment()->Resource);
			$this->dtgTenPAssessments->MetaAddColumn(QQN::TenPAssessment()->User);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// ten_p_assessment_list.tpl.php as the included HTML template file
	TenPAssessmentListForm::Run('TenPAssessmentListForm');
?>