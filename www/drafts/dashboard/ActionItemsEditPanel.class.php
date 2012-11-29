<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the ActionItems class.  It uses the code-generated
	 * ActionItemsMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a ActionItems columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both action_items_edit.php AND
	 * action_items_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class ActionItemsEditPanel extends QPanel {
		// Local instance of the ActionItemsMetaControl
		protected $mctActionItems;

		// Controls for ActionItems's Data Fields
		public $lblId;
		public $txtAction;
		public $lstStrategy;
		public $lstScorecard;
		public $lstWhoObject;
		public $calWhen;
		public $lstStatusTypeObject;
		public $txtComments;
		public $lstCategory;
		public $txtCount;
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
			$this->strTemplate = 'ActionItemsEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the ActionItemsMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctActionItems = ActionItemsMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on ActionItems's data fields
			$this->lblId = $this->mctActionItems->lblId_Create();
			$this->txtAction = $this->mctActionItems->txtAction_Create();
			$this->lstStrategy = $this->mctActionItems->lstStrategy_Create();
			$this->lstScorecard = $this->mctActionItems->lstScorecard_Create();
			$this->lstWhoObject = $this->mctActionItems->lstWhoObject_Create();
			$this->calWhen = $this->mctActionItems->calWhen_Create();
			$this->lstStatusTypeObject = $this->mctActionItems->lstStatusTypeObject_Create();
			$this->txtComments = $this->mctActionItems->txtComments_Create();
			$this->lstCategory = $this->mctActionItems->lstCategory_Create();
			$this->txtCount = $this->mctActionItems->txtCount_Create();
			$this->lstModifiedByObject = $this->mctActionItems->lstModifiedByObject_Create();
			$this->lblModified = $this->mctActionItems->lblModified_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('ActionItems') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctActionItems->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the ActionItemsMetaControl
			$this->mctActionItems->SaveActionItems();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the ActionItemsMetaControl
			$this->mctActionItems->DeleteActionItems();
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