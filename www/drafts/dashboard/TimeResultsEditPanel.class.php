<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the TimeResults class.  It uses the code-generated
	 * TimeResultsMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a TimeResults columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both time_results_edit.php AND
	 * time_results_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TimeResultsEditPanel extends QPanel {
		// Local instance of the TimeResultsMetaControl
		protected $mctTimeResults;

		// Controls for TimeResults's Data Fields
		public $lblId;
		public $lstAssessment;
		public $txtTime;
		public $txtActivity;
		public $chkCareer;
		public $chkCalling;
		public $chkCommunity;
		public $chkCreativity;
		public $chkMargin;

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
			$this->strTemplate = 'TimeResultsEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the TimeResultsMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctTimeResults = TimeResultsMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on TimeResults's data fields
			$this->lblId = $this->mctTimeResults->lblId_Create();
			$this->lstAssessment = $this->mctTimeResults->lstAssessment_Create();
			$this->txtTime = $this->mctTimeResults->txtTime_Create();
			$this->txtActivity = $this->mctTimeResults->txtActivity_Create();
			$this->chkCareer = $this->mctTimeResults->chkCareer_Create();
			$this->chkCalling = $this->mctTimeResults->chkCalling_Create();
			$this->chkCommunity = $this->mctTimeResults->chkCommunity_Create();
			$this->chkCreativity = $this->mctTimeResults->chkCreativity_Create();
			$this->chkMargin = $this->mctTimeResults->chkMargin_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('TimeResults') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctTimeResults->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the TimeResultsMetaControl
			$this->mctTimeResults->SaveTimeResults();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the TimeResultsMetaControl
			$this->mctTimeResults->DeleteTimeResults();
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