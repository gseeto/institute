<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the SeasonalQuestions class.  It uses the code-generated
	 * SeasonalQuestionsMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a SeasonalQuestions columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both seasonal_questions_edit.php AND
	 * seasonal_questions_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class SeasonalQuestionsEditPanel extends QPanel {
		// Local instance of the SeasonalQuestionsMetaControl
		protected $mctSeasonalQuestions;

		// Controls for SeasonalQuestions's Data Fields
		public $lblId;
		public $txtCount;
		public $txtText;
		public $lstCategory;
		public $chkInvert;

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
			$this->strTemplate = 'SeasonalQuestionsEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the SeasonalQuestionsMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctSeasonalQuestions = SeasonalQuestionsMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on SeasonalQuestions's data fields
			$this->lblId = $this->mctSeasonalQuestions->lblId_Create();
			$this->txtCount = $this->mctSeasonalQuestions->txtCount_Create();
			$this->txtText = $this->mctSeasonalQuestions->txtText_Create();
			$this->lstCategory = $this->mctSeasonalQuestions->lstCategory_Create();
			$this->chkInvert = $this->mctSeasonalQuestions->chkInvert_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('SeasonalQuestions') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctSeasonalQuestions->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the SeasonalQuestionsMetaControl
			$this->mctSeasonalQuestions->SaveSeasonalQuestions();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the SeasonalQuestionsMetaControl
			$this->mctSeasonalQuestions->DeleteSeasonalQuestions();
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