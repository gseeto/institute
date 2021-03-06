<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class IntegrationGroupInfoForm extends InstituteForm {
	protected $strPageTitle = 'Integration Assessment';
	protected $txtUser;
	protected $txtPassword;
	protected $btnLogin;
	protected $lblErrorMsg;
	
	protected $txtFirstName;
	protected $txtLastName;
	protected $txtEmail;
	protected $lstCountry;
	protected $lstLevel;
	protected $lstTenure;
	protected $lstGender;
	protected $txtNewUser;
	protected $txtNewPassword;
	protected $btnSubmit;
	protected $lblWarningMsg;
	
	protected $intGroupAssessment;
	
	protected function Form_Run() {
	}
	
	protected function Form_Create() {	
		$this->intGroupAssessment = QApplication::PathInfo(0);	
		$this->txtUser = new QTextBox($this);
		$this->txtUser->Name = "User: ";
		$this->txtUser->Width = 200;
		$this->txtUser->CausesValidation = true;
		
		$this->txtPassword = new QTextBox($this);
		$this->txtPassword->Name = "Password: ";
		$this->txtPassword->TextMode = QTextMode::Password;
		$this->txtPassword->CausesValidation = true;
		$this->txtPassword->Width = 200;
		
		$this->btnLogin = new QButton($this);
		$this->btnLogin->Text = "Login";
		$this->btnLogin->CssClass = "externButton";
		$this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnLogin_Click'));
		
		$this->lblErrorMsg = new QLabel($this);
		$this->lblErrorMsg->Visible = false;
		$this->lblErrorMsg->CssClass = "errorMsg";
		
		$this->txtFirstName = new QTextBox($this);
		$this->txtFirstName->Name = "First Name: ";
		$this->txtFirstName->Width = 200;
		$this->txtFirstName->CausesValidation = true;
		
		$this->txtLastName = new QTextBox($this);
		$this->txtLastName->Name = "Last Name: ";
		$this->txtLastName->Width = 200;
		$this->txtLastName->CausesValidation = true;
		
		$this->txtEmail = new QTextBox($this);
		$this->txtEmail->Name = "Email: ";
		$this->txtEmail->Width = 200;
		
		$this->lstCountry = new QListBox($this);
		$this->lstCountry->Name = "Country: ";
		$this->lstCountry->Width = 200;
		// Temporary until I can change database and pick up from there.
		// Can Grab list from here: http://www.state.gov/misc/list/index.htm
		foreach(CountryList::LoadAll() as $objCountry) {
			$this->lstCountry->AddItem($objCountry->Name,$objCountry->Id);
		}

		$this->lstLevel = new QListBox($this);
		$this->lstLevel->Name = "Level: ";
		$this->lstLevel->Width = 200;
		foreach(TitleList::LoadAll() as $objLevel) {
			$this->lstLevel->AddItem($objLevel->Name,$objLevel->Id);	
		}	
		
		$this->lstTenure = new QListBox($this);
		$this->lstTenure->Name = "Level: ";
		$this->lstTenure->Width = 200;
		foreach(TenureList::LoadAll() as $objTenure) {
			$this->lstTenure->AddItem($objTenure->Range,$objTenure->Id);
		}
		
		$this->lstGender = new QListBox($this);
	 	$this->lstGender->Name = 'Gender : ';
	 	$this->lstGender->AddItem('Male',1);
	 	$this->lstGender->AddItem('Female',0);
	 	
		$this->txtNewUser = new QTextBox($this);
		$this->txtNewUser->Name = "User: ";
		$this->txtNewUser->Width = 200;
		
		$this->txtNewPassword = new QTextBox($this);
		$this->txtNewPassword->Name = "Password: ";
		$this->txtNewPassword->TextMode = QTextMode::Password;
		$this->txtNewPassword->Width = 200;

		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Text = "Submit";
		$this->btnSubmit->CssClass = "externButton";
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
		
		$this->lblWarningMsg = new QLabel($this);
		$this->lblWarningMsg->Visible = false;
		$this->lblWarningMsg->CssClass = "warningMsg";
		
	}
	
	protected function btnSubmit_Click() {
		$objConditions = QQ::All();
		$objClauses = array();

		if ($strName = trim($this->txtNewUser->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Login()->Username, $strName)
			);
		}
		$objLogin = Login::QuerySingle($objConditions);
		if ($objLogin) {
			$this->lblWarningMsg->Text = 'This user name is already in use. Please select another one.';
			$this->lblWarningMsg->Visible = true;
			return;
		} else {
			$intRoleId = 0;
			$roleArray = Role::LoadAll();
		 	foreach ($roleArray as $objRole) {
		 		if($objRole->Name == 'User') {
		 			$intRoleId = $objRole->Id;
		 			break;
		 		}
		 	}
			$objLogin = new Login();
			$objLogin->Username = $this->txtNewUser->Text;
			$objLogin->Password = $this->txtNewPassword->Text;
			$objLogin->RoleId = $intRoleId;
			$intLoginId = $objLogin->Save();
			
			$objUser = new User();
			$objUser->FirstName = trim($this->txtFirstName->Text);
			$objUser->LastName = trim($this->txtLastName->Text);
			$objUser->Email = trim($this->txtEmail->Text);
			$objUser->CountryId = trim($this->lstCountry->SelectedValue);
			$objUser->TenureId = $this->lstTenure->SelectedValue;
			$objUser->TitleId = $this->lstLevel->SelectedValue;
			$objUser->Gender = $this->lstGender->SelectedValue;
			$objUser->LoginId = $intLoginId;
			$objUser->Save();
			
			// Create a new assessment entry associated with the user
	     	$objAssessment = new IntegrationAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 6; //Integration Assessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $this->intGroupAssessment;  	
	     	$objUser->AssociateResource(Resource::Load(6));
			$objAssessment->Save();
			
			QApplication::Login($objLogin);
			QApplication::Redirect(__SUBDIRECTORY__.'/assessments/integration/newAssessment');
		}
	}
	
	protected function btnLogin_Click() {
		$objLogin = Login::LoadByUsernamePassword(trim(strtolower($this->txtUser->Text)), $this->txtPassword->Text);
		if (!$objLogin) {
			$this->lblErrorMsg->Text = 'Invalid username or password.';
			$this->lblErrorMsg->Visible = true;
			$this->txtUser->Blink();
			$this->txtPassword->Blink();
			$this->txtUser->Focus();
			return;
		} 	
		$objUserArray = User::LoadArrayByLoginId($objLogin->Id);
		$objUser = $objUserArray[0];
		// Create a new assessment entry associated with the user if not already associated
		if ($objUser->IsResourceAssociated(Resource::Load(6))) {
			QApplication::Login($objLogin);
			$objAssessmentArray = IntegrationAssessment::LoadArrayByUserId($objLogin->Id);
			$objAssessment = $objAssessmentArray[0];
			$objAssessment->GroupId = $this->intGroupAssessment; 
			$objAssessment->Save();
			QApplication::Redirect(__SUBDIRECTORY__.'/assessments/integration/newAssessment/edit');
		} else {
	     	$objAssessment = new IntegrationAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 6; //LemonAssessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $this->intGroupAssessment;  	
	     	$objUser->AssociateResource(Resource::Load(6));
			$objAssessment->Save();
			QApplication::Login($objLogin);
			QApplication::Redirect(__SUBDIRECTORY__.'/assessments/integration/newAssessment.php');
		}
	}
	
}

IntegrationGroupInfoForm::Run('IntegrationGroupInfoForm');
?>