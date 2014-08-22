<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the TimeResults class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of TimeResults objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this TimeResultsListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class TimeResultsListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list TimeResultses
		public $dtgTimeResultses;

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
			$this->Template = 'TimeResultsListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgTimeResultses = new TimeResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTimeResultses->CssClass = 'datagrid';
			$this->dtgTimeResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTimeResultses->Paginator = new QPaginator($this->dtgTimeResultses);
			$this->dtgTimeResultses->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgTimeResultses->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for time_results's properties, or you
			// can traverse down QQN::time_results() to display fields that are down the hierarchy)
			$this->dtgTimeResultses->MetaAddColumn('Id');
			$this->dtgTimeResultses->MetaAddColumn(QQN::TimeResults()->Assessment);
			$this->dtgTimeResultses->MetaAddColumn('Time');
			$this->dtgTimeResultses->MetaAddColumn('Activity');
			$this->dtgTimeResultses->MetaAddColumn('Career');
			$this->dtgTimeResultses->MetaAddColumn('Calling');
			$this->dtgTimeResultses->MetaAddColumn('Community');
			$this->dtgTimeResultses->MetaAddColumn('Creativity');
			$this->dtgTimeResultses->MetaAddColumn('Margin');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('TimeResults');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new TimeResultsEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new TimeResultsEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>