<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class LoadInfoForm extends InstituteForm {
	protected $strPageTitle = 'LEMON Assessment';
	protected $txtUser;
	protected $txtPassword;
	protected $btnLogin;
	protected $lblErrorMsg;
	
	protected $txtFirstName;
	protected $txtLastName;
	protected $txtEmail;	
	protected $chkOptIn;
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
		
		$this->chkOptIn = new QCheckBox($this);
		$this->chkOptIn->Text = 'The Institute have permission to email me regarding this assessment. (Your email will not be shared with 3rd parties)';
		
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
		
		// auto generate a unique username/password
		$unique = false;
		$username = null;
		$password = null;
		while(!$unique) {
			$random = rand();
			$username = sprintf("load_%s%s%d",trim($this->txtFirstName->Text),trim($this->txtLastName->Text),$random);
			$password = $username;			
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Login()->Username, $username)
			);			
			$objLogin = Login::QuerySingle($objConditions);
			if(!$objLogin) $unique = true;
		}
		
		// Get user role
		$intRoleId = 0;
		$roleArray = Role::LoadAll();
	 	foreach ($roleArray as $objRole) {
	 		if($objRole->Name == 'User') {
	 			$intRoleId = $objRole->Id;
	 			break;
	 		}
	 	}
	 	// Create user and login
		$objLogin = new Login();
		$objLogin->Username = $username;
		$objLogin->Password = $password;
		$objLogin->RoleId = $intRoleId;	
		$intLoginId = $objLogin->Save();
		
		$objUser = new User();
		$objUser->FirstName = trim($this->txtFirstName->Text);
		$objUser->LastName = trim($this->txtLastName->Text);
		$objUser->Email = trim($this->txtEmail->Text);	
		$objUser->OptIn = $this->chkOptIn->Checked;		
		$objUser->LoginId = $intLoginId;
		$objUser->Save();
		
		// Create a new assessment entry associated with the user
     	$objAssessment = new Lemon50Assessment();
     	$objAssessment->UserId = $objUser->Id;
     	$objAssessment->ResourceId = 14; //LemonAssessment - going to have to find a nicer way of doing this
     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
     	$objAssessment->GroupId = $this->intGroupAssessment;  
     	$objAssessment->DateModified = new QDateTime('Now');	
     	$objUser->AssociateResource(Resource::Load(14));
		$objAssessment->Save();
		
		QApplication::Login($objLogin);
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/loadQuestions.php');		
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
		if ($objUser->IsResourceAssociated(Resource::Load(5))) {
			QApplication::Login($objLogin);
			$objAssessment = LemonAssessment::LoadArrayByUserId($objUser->Id);
			$objAssessment[0]->GroupId = $this->intGroupAssessment; 
			$objAssessment[0]->DateModified = new QDateTime('Now');
			$objAssessment[0]->Save();
			
			// Additional check to see if there are results. If not then treat it like a first time login.
			$objResultArray = LemonAssessmentResults::LoadArrayByAssessmentId($objAssessment[0]->Id);
			if(!empty($objResultArray))			
				QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/loadQuestions.php/edit');
			else 
				QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/loadQuestions.php');
		} else {
	     	$objAssessment = new Lemon50Assessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 14; //LemonAssessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $this->intGroupAssessment; 
	     	$objAssessment->DateModified = new QDateTime('Now'); 	
	     	$objUser->AssociateResource(Resource::Load(14));
			$objAssessment->Save();
			QApplication::Login($objLogin);
			QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/loadQuestions.php');
		}
	}
	
}

LoadInfoForm::Run('LoadInfoForm');
?>