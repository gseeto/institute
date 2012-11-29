<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the LemonAssessment class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of LemonAssessment objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this LemonAssessmentListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class LemonAssessmentListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list LemonAssessments
		public $dtgLemonAssessments;

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
			$this->Template = 'LemonAssessmentListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgLemonAssessments = new LemonAssessmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgLemonAssessments->CssClass = 'datagrid';
			$this->dtgLemonAssessments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgLemonAssessments->Paginator = new QPaginator($this->dtgLemonAssessments);
			$this->dtgLemonAssessments->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgLemonAssessments->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for lemon_assessment's properties, or you
			// can traverse down QQN::lemon_assessment() to display fields that are down the hierarchy)
			$this->dtgLemonAssessments->MetaAddColumn('Id');
			$this->dtgLemonAssessments->MetaAddColumn(QQN::LemonAssessment()->User);
			$this->dtgLemonAssessments->MetaAddColumn(QQN::LemonAssessment()->Company);
			$this->dtgLemonAssessments->MetaAddColumn(QQN::LemonAssessment()->Resource);
			$this->dtgLemonAssessments->MetaAddColumn('ResourceStatusId');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('LemonAssessment');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new LemonAssessmentEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new LemonAssessmentEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>