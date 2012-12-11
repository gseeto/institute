<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the CannedStrategy class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of CannedStrategy objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this CannedStrategyListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class CannedStrategyListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list CannedStrategies
		public $dtgCannedStrategies;

		// Other public QControls in this panel
		public $btnCreateNew;
		public $pxyEdit;

		// Callback Method Names
		protected $strSetEditPanelMethod;
		protected $strCloseEditPanelMethod;
		
		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = 'CannedStrategyListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgCannedStrategies = new CannedStrategyDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCannedStrategies->CssClass = 'datagrid';
			$this->dtgCannedStrategies->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCannedStrategies->Paginator = new QPaginator($this->dtgCannedStrategies);
			$this->dtgCannedStrategies->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgCannedStrategies->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for canned_strategy's properties, or you
			// can traverse down QQN::canned_strategy() to display fields that are down the hierarchy)
			$this->dtgCannedStrategies->MetaAddColumn('Id');
			$this->dtgCannedStrategies->MetaAddColumn('Strategy');
			$this->dtgCannedStrategies->MetaAddTypeColumn('CategoryTypeId', 'CategoryType');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('CannedStrategy');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new CannedStrategyEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new CannedStrategyEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>