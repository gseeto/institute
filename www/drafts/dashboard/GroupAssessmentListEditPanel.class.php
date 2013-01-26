<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the GroupAssessmentList class.  It uses the code-generated
	 * GroupAssessmentListMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a GroupAssessmentList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both group_assessment_list_edit.php AND
	 * group_assessment_list_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class GroupAssessmentListEditPanel extends QPanel {
		// Local instance of the GroupAssessmentListMetaControl
		protected $mctGroupAssessmentList;

		// Controls for GroupAssessmentList's Data Fields
		public $lblId;
		public $txtTotalKeys;
		public $txtKeysLeft;
		public $lstResource;
		public $txtKeyCode;
		public $txtDescription;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstUsersAsAssessmentManager;

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
			$this->strTemplate = 'GroupAssessmentListEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the GroupAssessmentListMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctGroupAssessmentList = GroupAssessmentListMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on GroupAssessmentList's data fields
			$this->lblId = $this->mctGroupAssessmentList->lblId_Create();
			$this->txtTotalKeys = $this->mctGroupAssessmentList->txtTotalKeys_Create();
			$this->txtKeysLeft = $this->mctGroupAssessmentList->txtKeysLeft_Create();
			$this->lstResource = $this->mctGroupAssessmentList->lstResource_Create();
			$this->txtKeyCode = $this->mctGroupAssessmentList->txtKeyCode_Create();
			$this->txtDescription = $this->mctGroupAssessmentList->txtDescription_Create();
			$this->lstUsersAsAssessmentManager = $this->mctGroupAssessmentList->lstUsersAsAssessmentManager_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('GroupAssessmentList') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctGroupAssessmentList->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the GroupAssessmentListMetaControl
			$this->mctGroupAssessmentList->SaveGroupAssessmentList();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the GroupAssessmentListMetaControl
			$this->mctGroupAssessmentList->DeleteGroupAssessmentList();
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