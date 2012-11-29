<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Strategy class.  It uses the code-generated
	 * StrategyDataGrid control which has meta-methods to help with
	 * easily creating/defining Strategy columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both strategy_list.php AND
	 * strategy_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class StrategyListForm extends QForm {
		// Local instance of the Meta DataGrid to list Strategies
		protected $dtgStrategies;

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
			$this->dtgStrategies = new StrategyDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStrategies->CssClass = 'datagrid';
			$this->dtgStrategies->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStrategies->Paginator = new QPaginator($this->dtgStrategies);
			$this->dtgStrategies->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/strategy_edit.php';
			$this->dtgStrategies->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for strategy's properties, or you
			// can traverse down QQN::strategy() to display fields that are down the hierarchy)
			$this->dtgStrategies->MetaAddColumn('Id');
			$this->dtgStrategies->MetaAddColumn('Strategy');
			$this->dtgStrategies->MetaAddColumn('Priority');
			$this->dtgStrategies->MetaAddColumn('Count');
			$this->dtgStrategies->MetaAddColumn(QQN::Strategy()->Scorecard);
			$this->dtgStrategies->MetaAddTypeColumn('CategoryTypeId', 'CategoryType');
			$this->dtgStrategies->MetaAddColumn(QQN::Strategy()->ModifiedByObject);
			$this->dtgStrategies->MetaAddColumn('Modified');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// strategy_list.tpl.php as the included HTML template file
	StrategyListForm::Run('StrategyListForm');
?>