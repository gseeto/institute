<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Kpis class.  It uses the code-generated
	 * KpisMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Kpis columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both kpis_edit.php AND
	 * kpis_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class KpisEditPanel extends QPanel {
		// Local instance of the KpisMetaControl
		protected $mctKpis;

		// Controls for Kpis's Data Fields
		public $lblId;
		public $lstStrategy;
		public $lstScorecard;
		public $txtRating;
		public $txtKpi;
		public $txtCount;
		public $txtComments;
		public $lstModifiedByObject;
		public $lblModified;

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
			$this->strTemplate = 'KpisEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the KpisMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctKpis = KpisMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Kpis's data fields
			$this->lblId = $this->mctKpis->lblId_Create();
			$this->lstStrategy = $this->mctKpis->lstStrategy_Create();
			$this->lstScorecard = $this->mctKpis->lstScorecard_Create();
			$this->txtRating = $this->mctKpis->txtRating_Create();
			$this->txtKpi = $this->mctKpis->txtKpi_Create();
			$this->txtCount = $this->mctKpis->txtCount_Create();
			$this->txtComments = $this->mctKpis->txtComments_Create();
			$this->lstModifiedByObject = $this->mctKpis->lstModifiedByObject_Create();
			$this->lblModified = $this->mctKpis->lblModified_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Kpis') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctKpis->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the KpisMetaControl
			$this->mctKpis->SaveKpis();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the KpisMetaControl
			$this->mctKpis->DeleteKpis();
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