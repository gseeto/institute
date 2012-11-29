<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the LemonAssessmentResults class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of LemonAssessmentResults objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this LemonAssessmentResultsListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class LemonAssessmentResultsListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list LemonAssessmentResultses
		public $dtgLemonAssessmentResultses;

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
			$this->Template = 'LemonAssessmentResultsListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgLemonAssessmentResultses = new LemonAssessmentResultsDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgLemonAssessmentResultses->CssClass = 'datagrid';
			$this->dtgLemonAssessmentResultses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgLemonAssessmentResultses->Paginator = new QPaginator($this->dtgLemonAssessmentResultses);
			$this->dtgLemonAssessmentResultses->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgLemonAssessmentResultses->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for lemon_assessment_results's properties, or you
			// can traverse down QQN::lemon_assessment_results() to display fields that are down the hierarchy)
			$this->dtgLemonAssessmentResultses->MetaAddColumn('Id');
			$this->dtgLemonAssessmentResultses->MetaAddColumn(QQN::LemonAssessmentResults()->Question);
			$this->dtgLemonAssessmentResultses->MetaAddColumn(QQN::LemonAssessmentResults()->Assessment);
			$this->dtgLemonAssessmentResultses->MetaAddColumn('Value');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('LemonAssessmentResults');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new LemonAssessmentResultsEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new LemonAssessmentResultsEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>