<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
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
	class SeasonalQuestionsEditForm extends QForm {
		// Local instance of the SeasonalQuestionsMetaControl
		protected $mctSeasonalQuestions;

		// Controls for SeasonalQuestions's Data Fields
		protected $lblId;
		protected $txtCount;
		protected $txtText;
		protected $lstCategory;
		protected $chkInvert;

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
			// Use the CreateFromPathInfo shortcut (this can also be done manually using the SeasonalQuestionsMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctSeasonalQuestions = SeasonalQuestionsMetaControl::CreateFromPathInfo($this);

			// Call MetaControl's methods to create qcontrols based on SeasonalQuestions's data fields
			$this->lblId = $this->mctSeasonalQuestions->lblId_Create();
			$this->txtCount = $this->mctSeasonalQuestions->txtCount_Create();
			$this->txtText = $this->mctSeasonalQuestions->txtText_Create();
			$this->lstCategory = $this->mctSeasonalQuestions->lstCategory_Create();
			$this->chkInvert = $this->mctSeasonalQuestions->chkInvert_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('SeasonalQuestions') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctSeasonalQuestions->EditMode;
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
			// Delegate "Save" processing to the SeasonalQuestionsMetaControl
			$this->mctSeasonalQuestions->SaveSeasonalQuestions();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the SeasonalQuestionsMetaControl
			$this->mctSeasonalQuestions->DeleteSeasonalQuestions();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods
		
		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/seasonal_questions_list.php');
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, implicitly using
	// seasonal_questions_edit.tpl.php as the included HTML template file
	SeasonalQuestionsEditForm::Run('SeasonalQuestionsEditForm');
?>