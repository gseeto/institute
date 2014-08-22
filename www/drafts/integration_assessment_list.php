<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the IntegrationAssessment class.  It uses the code-generated
	 * IntegrationAssessmentDataGrid control which has meta-methods to help with
	 * easily creating/defining IntegrationAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both integration_assessment_list.php AND
	 * integration_assessment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class IntegrationAssessmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list IntegrationAssessments
		protected $dtgIntegrationAssessments;

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
			$this->dtgIntegrationAssessments = new IntegrationAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgIntegrationAssessments->CssClass = 'datagrid';
			$this->dtgIntegrationAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgIntegrationAssessments->Paginator = new QPaginator($this->dtgIntegrationAssessments);
			$this->dtgIntegrationAssessments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/integration_assessment_edit.php';
			$this->dtgIntegrationAssessments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for integration_assessment's properties, or you
			// can traverse down QQN::integration_assessment() to display fields that are down the hierarchy)
			$this->dtgIntegrationAssessments->MetaAddColumn('Id');
			$this->dtgIntegrationAssessments->MetaAddColumn(QQN::IntegrationAssessment()->ResourceStatus);
			$this->dtgIntegrationAssessments->MetaAddColumn(QQN::IntegrationAssessment()->Resource);
			$this->dtgIntegrationAssessments->MetaAddColumn(QQN::IntegrationAssessment()->User);
			$this->dtgIntegrationAssessments->MetaAddColumn(QQN::IntegrationAssessment()->Group);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// integration_assessment_list.tpl.php as the included HTML template file
	IntegrationAssessmentListForm::Run('IntegrationAssessmentListForm');
?>