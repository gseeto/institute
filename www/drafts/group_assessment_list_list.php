<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the GroupAssessmentList class.  It uses the code-generated
	 * GroupAssessmentListDataGrid control which has meta-methods to help with
	 * easily creating/defining GroupAssessmentList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both group_assessment_list_list.php AND
	 * group_assessment_list_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class GroupAssessmentListListForm extends QForm {
		// Local instance of the Meta DataGrid to list GroupAssessmentLists
		protected $dtgGroupAssessmentLists;

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
			$this->dtgGroupAssessmentLists = new GroupAssessmentListDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGroupAssessmentLists->CssClass = 'datagrid';
			$this->dtgGroupAssessmentLists->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGroupAssessmentLists->Paginator = new QPaginator($this->dtgGroupAssessmentLists);
			$this->dtgGroupAssessmentLists->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/group_assessment_list_edit.php';
			$this->dtgGroupAssessmentLists->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for group_assessment_list's properties, or you
			// can traverse down QQN::group_assessment_list() to display fields that are down the hierarchy)
			$this->dtgGroupAssessmentLists->MetaAddColumn('Id');
			$this->dtgGroupAssessmentLists->MetaAddColumn('TotalKeys');
			$this->dtgGroupAssessmentLists->MetaAddColumn('KeysLeft');
			$this->dtgGroupAssessmentLists->MetaAddColumn(QQN::GroupAssessmentList()->Resource);
			$this->dtgGroupAssessmentLists->MetaAddColumn('KeyCode');
			$this->dtgGroupAssessmentLists->MetaAddColumn('Description');
			$this->dtgGroupAssessmentLists->MetaAddColumn('DateModified');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// group_assessment_list_list.tpl.php as the included HTML template file
	GroupAssessmentListListForm::Run('GroupAssessmentListListForm');
?>