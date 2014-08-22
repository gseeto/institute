<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
	 * of the User class.  It uses the code-generated
	 * UserMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a User columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both user_edit.php AND
	 * user_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class UserEditForm extends QForm {
		// Local instance of the UserMetaControl
		protected $mctUser;

		// Controls for User's Data Fields
		protected $lblId;
		protected $lstLogin;
		protected $txtFirstName;
		protected $txtLastName;
		protected $txtEmail;
		protected $chkGender;
		protected $lstCountry;
		protected $txtDepartment;
		protected $lstTitle;
		protected $lstTenure;
		protected $txtCareerLength;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstGroupAssessmentListsAsAssessmentManager;
		protected $lstCompanies;
		protected $lstResources;
		protected $lstScorecards;

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
			// Use the CreateFromPathInfo shortcut (this can also be done manually using the UserMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctUser = UserMetaControl::CreateFromPathInfo($this);

			// Call MetaControl's methods to create qcontrols based on User's data fields
			$this->lblId = $this->mctUser->lblId_Create();
			$this->lstLogin = $this->mctUser->lstLogin_Create();
			$this->txtFirstName = $this->mctUser->txtFirstName_Create();
			$this->txtLastName = $this->mctUser->txtLastName_Create();
			$this->txtEmail = $this->mctUser->txtEmail_Create();
			$this->chkGender = $this->mctUser->chkGender_Create();
			$this->lstCountry = $this->mctUser->lstCountry_Create();
			$this->txtDepartment = $this->mctUser->txtDepartment_Create();
			$this->lstTitle = $this->mctUser->lstTitle_Create();
			$this->lstTenure = $this->mctUser->lstTenure_Create();
			$this->txtCareerLength = $this->mctUser->txtCareerLength_Create();
			$this->lstGroupAssessmentListsAsAssessmentManager = $this->mctUser->lstGroupAssessmentListsAsAssessmentManager_Create();
			$this->lstCompanies = $this->mctUser->lstCompanies_Create();
			$this->lstResources = $this->mctUser->lstResources_Create();
			$this->lstScorecards = $this->mctUser->lstScorecards_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('User') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctUser->EditMode;
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
			// Delegate "Save" processing to the UserMetaControl
			$this->mctUser->SaveUser();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the UserMetaControl
			$this->mctUser->DeleteUser();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods
		
		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/user_list.php');
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, implicitly using
	// user_edit.tpl.php as the included HTML template file
	UserEditForm::Run('UserEditForm');
?>