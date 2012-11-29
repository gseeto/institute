<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the LemonAssessment class.  It uses the code-generated
	 * LemonAssessmentDataGrid control which has meta-methods to help with
	 * easily creating/defining LemonAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both lemon_assessment_list.php AND
	 * lemon_assessment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class LemonAssessmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list LemonAssessments
		protected $dtgLemonAssessments;

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
			$this->dtgLemonAssessments = new LemonAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgLemonAssessments->CssClass = 'datagrid';
			$this->dtgLemonAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgLemonAssessments->Paginator = new QPaginator($this->dtgLemonAssessments);
			$this->dtgLemonAssessments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/lemon_assessment_edit.php';
			$this->dtgLemonAssessments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for lemon_assessment's properties, or you
			// can traverse down QQN::lemon_assessment() to display fields that are down the hierarchy)
			$this->dtgLemonAssessments->MetaAddColumn('Id');
			$this->dtgLemonAssessments->MetaAddColumn(QQN::LemonAssessment()->User);
			$this->dtgLemonAssessments->MetaAddColumn(QQN::LemonAssessment()->Company);
			$this->dtgLemonAssessments->MetaAddColumn(QQN::LemonAssessment()->Resource);
			$this->dtgLemonAssessments->MetaAddColumn('ResourceStatusId');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// lemon_assessment_list.tpl.php as the included HTML template file
	LemonAssessmentListForm::Run('LemonAssessmentListForm');
?>