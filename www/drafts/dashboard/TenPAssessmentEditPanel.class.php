<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the TenPAssessment class.  It uses the code-generated
	 * TenPAssessmentMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a TenPAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ten_p_assessment_edit.php AND
	 * ten_p_assessment_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TenPAssessmentEditPanel extends QPanel {
		// Local instance of the TenPAssessmentMetaControl
		protected $mctTenPAssessment;

		// Controls for TenPAssessment's Data Fields
		public $lblId;
		public $lstResourceStatus;
		public $lstCompany;
		public $lstResource;
		public $lstUser;
		public $lstGroup;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'TenPAssessmentEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the TenPAssessmentMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctTenPAssessment = TenPAssessmentMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on TenPAssessment's data fields
			$this->lblId = $this->mctTenPAssessment->lblId_Create();
			$this->lstResourceStatus = $this->mctTenPAssessment->lstResourceStatus_Create();
			$this->lstCompany = $this->mctTenPAssessment->lstCompany_Create();
			$this->lstResource = $this->mctTenPAssessment->lstResource_Create();
			$this->lstUser = $this->mctTenPAssessment->lstUser_Create();
			$this->lstGroup = $this->mctTenPAssessment->lstGroup_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('TenPAssessment') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctTenPAssessment->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the TenPAssessmentMetaControl
			$this->mctTenPAssessment->SaveTenPAssessment();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the TenPAssessmentMetaControl
			$this->mctTenPAssessment->DeleteTenPAssessment();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>