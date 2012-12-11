<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StrategyQuestionConditional class.  It uses the code-generated
	 * StrategyQuestionConditionalDataGrid control which has meta-methods to help with
	 * easily creating/defining StrategyQuestionConditional columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both strategy_question_conditional_list.php AND
	 * strategy_question_conditional_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class StrategyQuestionConditionalListForm extends QForm {
		// Local instance of the Meta DataGrid to list StrategyQuestionConditionals
		protected $dtgStrategyQuestionConditionals;

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
			$this->dtgStrategyQuestionConditionals = new StrategyQuestionConditionalDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStrategyQuestionConditionals->CssClass = 'datagrid';
			$this->dtgStrategyQuestionConditionals->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStrategyQuestionConditionals->Paginator = new QPaginator($this->dtgStrategyQuestionConditionals);
			$this->dtgStrategyQuestionConditionals->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/strategy_question_conditional_edit.php';
			$this->dtgStrategyQuestionConditionals->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for strategy_question_conditional's properties, or you
			// can traverse down QQN::strategy_question_conditional() to display fields that are down the hierarchy)
			$this->dtgStrategyQuestionConditionals->MetaAddColumn('Id');
			$this->dtgStrategyQuestionConditionals->MetaAddColumn(QQN::StrategyQuestionConditional()->Question);
			$this->dtgStrategyQuestionConditionals->MetaAddColumn(QQN::StrategyQuestionConditional()->Strategy);
			$this->dtgStrategyQuestionConditionals->MetaAddTypeColumn('ConditionalType', 'ConditionalType');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// strategy_question_conditional_list.tpl.php as the included HTML template file
	StrategyQuestionConditionalListForm::Run('StrategyQuestionConditionalListForm');
?>