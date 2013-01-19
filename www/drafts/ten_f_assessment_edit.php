<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
	 * of the TenFAssessment class.  It uses the code-generated
	 * TenFAssessmentMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a TenFAssessment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ten_f_assessment_edit.php AND
	 * ten_f_assessment_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TenFAssessmentEditForm extends QForm {
		// Local instance of the TenFAssessmentMetaControl
		protected $mctTenFAssessment;

		// Controls for TenFAssessment's Data Fields
		protected $lblId;
		protected $lstResourceStatus;
		protected $lstResource;
		protected $lstUser;
		protected $lstGroup;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		protected $btnSave;
		protected $btnDelete;
		protected $btnCancel;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Use the CreateFromPathInfo shortcut (this can also be done manually using the TenFAssessmentMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctTenFAssessment = TenFAssessmentMetaControl::CreateFromPathInfo($this);

			// Call MetaControl's methods to create qcontrols based on TenFAssessment's data fields
			$this->lblId = $this->mctTenFAssessment->lblId_Create();
			$this->lstResourceStatus = $this->mctTenFAssessment->lstResourceStatus_Create();
			$this->lstResource = $this->mctTenFAssessment->lstResource_Create();
			$this->lstUser = $this->mctTenFAssessment->lstUser_Create();
			$this->lstGroup = $this->mctTenFAssessment->lstGroup_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('TenFAssessment') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctTenFAssessment->EditMode;
		}

		/**
		 * This Form_Validate event handler allows you to specify any custom Form Validation rules.
		 * It will also Blink() on all invalid controls, as well as Focus() on the top-most invalid control.
		 */
		protected function Form_Validate() {
			// By default, we report that Custom Validations passed
			$blnToReturn = true;

			// Custom validation rules goes here 
			// Be sure to set $blnToReturn to false if any custom validation fails!

			$blnFocused = false;
			foreach ($this->GetErrorControls() as $objControl) {
				// Set Focus to the top-most invalid control
				if (!$blnFocused) {
					$objControl->Focus();
					$blnFocused = true;
				}

				// Blink on ALL invalid controls
				$objControl->Blink();
			}

			return $blnToReturn;
		}

		// Button Event Handlers

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the TenFAssessmentMetaControl
			$this->mctTenFAssessment->SaveTenFAssessment();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the TenFAssessmentMetaControl
			$this->mctTenFAssessment->DeleteTenFAssessment();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods
		
		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ten_f_assessment_list.php');
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, implicitly using
	// ten_f_assessment_edit.tpl.php as the included HTML template file
	TenFAssessmentEditForm::Run('TenFAssessmentEditForm');
?>