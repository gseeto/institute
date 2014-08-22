<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the SeasonalAssessment class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of SeasonalAssessment objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this SeasonalAssessmentListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class SeasonalAssessmentListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list SeasonalAssessments
		public $dtgSeasonalAssessments;

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
			$this->Template = 'SeasonalAssessmentListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgSeasonalAssessments = new SeasonalAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSeasonalAssessments->CssClass = 'datagrid';
			$this->dtgSeasonalAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSeasonalAssessments->Paginator = new QPaginator($this->dtgSeasonalAssessments);
			$this->dtgSeasonalAssessments->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgSeasonalAssessments->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for seasonal_assessment's properties, or you
			// can traverse down QQN::seasonal_assessment() to display fields that are down the hierarchy)
			$this->dtgSeasonalAssessments->MetaAddColumn('Id');
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->ResourceStatus);
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->Resource);
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->User);
			$this->dtgSeasonalAssessments->MetaAddColumn(QQN::SeasonalAssessment()->Group);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('SeasonalAssessment');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new SeasonalAssessmentEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new SeasonalAssessmentEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>