<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Statement class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Statement objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this StatementListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class StatementListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Statements
		public $dtgStatements;

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
			$this->Template = 'StatementListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgStatements = new StatementDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStatements->CssClass = 'datagrid';
			$this->dtgStatements->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStatements->Paginator = new QPaginator($this->dtgStatements);
			$this->dtgStatements->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgStatements->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for statement's properties, or you
			// can traverse down QQN::statement() to display fields that are down the hierarchy)
			$this->dtgStatements->MetaAddColumn('Id');
			$this->dtgStatements->MetaAddColumn('Value');
			$this->dtgStatements->MetaAddColumn(QQN::Statement()->Scorecard);
			$this->dtgStatements->MetaAddColumn('IsPurpose');
			$this->dtgStatements->MetaAddColumn(QQN::Statement()->ModifiedByObject);
			$this->dtgStatements->MetaAddColumn('Modified');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Statement');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new StatementEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new StatementEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>