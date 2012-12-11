<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the TenFResults class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of TenFResults objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this TenFResultsListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class TenFResultsListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list TenFResultses
		public $dtgTenFResultses;

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
			$this->Template = 'TenFResultsListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgTenFResultses = new TenFResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTenFResultses->CssClass = 'datagrid';
			$this->dtgTenFResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTenFResultses->Paginator = new QPaginator($this->dtgTenFResultses);
			$this->dtgTenFResultses->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgTenFResultses->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ten_f_results's properties, or you
			// can traverse down QQN::ten_f_results() to display fields that are down the hierarchy)
			$this->dtgTenFResultses->MetaAddColumn('Id');
			$this->dtgTenFResultses->MetaAddColumn(QQN::TenFResults()->Question);
			$this->dtgTenFResultses->MetaAddColumn(QQN::TenFResults()->Assessment);
			$this->dtgTenFResultses->MetaAddColumn('Performance');
			$this->dtgTenFResultses->MetaAddColumn('Importance');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('TenFResults');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new TenFResultsEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new TenFResultsEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>