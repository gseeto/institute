<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the ActionItems class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of ActionItems objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this ActionItemsListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class ActionItemsListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list ActionItemses
		public $dtgActionItemses;

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
			$this->Template = 'ActionItemsListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgActionItemses = new ActionItemsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgActionItemses->CssClass = 'datagrid';
			$this->dtgActionItemses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgActionItemses->Paginator = new QPaginator($this->dtgActionItemses);
			$this->dtgActionItemses->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgActionItemses->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for action_items's properties, or you
			// can traverse down QQN::action_items() to display fields that are down the hierarchy)
			$this->dtgActionItemses->MetaAddColumn('Id');
			$this->dtgActionItemses->MetaAddColumn('Action');
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->Strategy);
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->Scorecard);
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->WhoObject);
			$this->dtgActionItemses->MetaAddColumn('When');
			$this->dtgActionItemses->MetaAddTypeColumn('StatusType', 'StatusType');
			$this->dtgActionItemses->MetaAddColumn('Comments');
			$this->dtgActionItemses->MetaAddTypeColumn('CategoryId', 'CategoryType');
			$this->dtgActionItemses->MetaAddColumn('Count');
			$this->dtgActionItemses->MetaAddColumn(QQN::ActionItems()->ModifiedByObject);
			$this->dtgActionItemses->MetaAddColumn('Modified');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('ActionItems');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new ActionItemsEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new ActionItemsEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>