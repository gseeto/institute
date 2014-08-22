<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class NewUserForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Administration';
	protected $intNavSectionId = InstituteForm::NavSectionAdministration;
	
	protected $txtFirstName;
	protected $txtLastName;
	protected $txtEmail;
	protected $lstGender;
	protected $lstCountry;
	protected $txtUserName;
	protected $txtPassword;
	protected $lstRole;
	protected $lstLevel;
	protected $lstTenure;
 	protected $btnSubmit;
 	protected $btnCancel;
 	
 	protected $chkLemon;
 	protected $chkTenP;
 	protected $chkTenF;
 	protected $chkKingdom;
 	protected $chkIntegration;
 	protected $chkSeasonal;
 	protected $chkTime;
 	protected $chkLRA;
 	
 	protected $txtLemonKeycode;
 	protected $txtTenPKeycode;
 	protected $txtTenFKeycode;
 	protected $txtKingdomKeycode;
 	protected $txtIntegrationKeycode;
 	protected $txtSeasonalKeycode;
 	protected $txtTimeKeycode;
 	protected $txtLRAKeycode;
 	

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
	}
	
	protected function Form_Create() {
		$this->txtFirstName = new QTextBox($this);
		$this->txtFirstName->Name = 'First Name : ';
		
	 	$this->txtLastName  = new QTextBox($this);
	 	$this->txtLastName->Name = 'Last Name : ';
	 	
	 	$this->txtEmail= new QTextBox($this);
	 	$this->txtEmail->Name = 'Email : ';
	 	
	 	$this->lstGender = new QListBox($this);
	 	$this->lstGender->Name = 'Gender : ';
	 	$this->lstGender->AddItem('Male',1);
	 	$this->lstGender->AddItem('Female',0);
	 	
		$this->lstCountry = new QListBox($this);
		$this->lstCountry->Name = "Country: ";
		$this->lstCountry->Width = 200;
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
		$this->lstTenure->Name = "Tenure: ";
		$this->lstTenure->Width = 200;
		foreach(TenureList::LoadAll() as $objTenure) {
			$this->lstTenure->AddItem($objTenure->Range,$objTenure->Id);
		}
		
	 	$this->txtUserName = new QTextBox($this);
	 	$this->txtUserName->Name = 'UserName : ';
	 	
	 	$this->txtPassword = new QTextBox($this);
	 	$this->txtPassword->Name = 'Password : ';
	 	$this->txtPassword->TextMode = QTextMode::Password;
	 	
	 	$this->lstRole = new QListBox($this);
	 	$this->lstRole->Name = 'Role';
	 	$roleArray = Role::LoadAll();
	 	foreach ($roleArray as $objRole) {
	 		$this->lstRole->AddItem($objRole->Name, $objRole->Id);
	 	}
 	 
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'primary';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
	 	
	 	$this->btnCancel = new QButton($this);
	 	$this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'primary';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
	 	
	 	$this->chkLemon = new QCheckBox($this);
	 	$this->chkLemon->Text = 'Add access to LEMON Assessment';
	 	$this->chkLemon->AddAction(new QClickEvent(), new QAjaxAction('chkLemon_Click'));
	 	
 		$this->chkTenP = new QCheckBox($this);
 		$this->chkTenP->Text = 'Add access to 10-P Assessment';
 		$this->chkTenP->AddAction(new QClickEvent(), new QAjaxAction('chkTenP_Click'));
 		
 		$this->chkTenF = new QCheckBox($this);
 		$this->chkTenF->Text  = 'Add access to 10-F Assessment';
 		$this->chkTenF->AddAction(new QClickEvent(), new QAjaxAction('chkTenF_Click'));
 		
 		$this->chkKingdom = new QCheckBox($this);
 		$this->chkKingdom->Text  = 'Add access to Kingdom Business Assessment';
 		$this->chkKingdom->AddAction(new QClickEvent(), new QAjaxAction('chkKingdom_Click'));
 		
 		$this->chkIntegration = new QCheckBox($this);
 		$this->chkIntegration->Text = 'Add access to Integration Assessment';
 		$this->chkIntegration->AddAction(new QClickEvent(), new QAjaxAction('chkIntegration_Click'));
 		
 		$this->chkSeasonal = new QCheckBox($this);
 		$this->chkSeasonal->Text = 'Add access to Seasonal Assessment';
 		$this->chkSeasonal->AddAction(new QClickEvent(), new QAjaxAction('chkSeasonal_Click'));
 		
 		$this->chkTime  = new QCheckBox($this);
 		$this->chkTime->Text = 'Add access to Time Assessment';
 		$this->chkTime->AddAction(new QClickEvent(), new QAjaxAction('chkTime_Click'));
 	
 		$this->chkLRA = new QCheckBox($this);
 		$this->chkLRA->Text = 'Add access to Leadership Readiness Assessment';
 		$this->chkLRA->AddAction(new QClickEvent(), new QAjaxAction('chkLRA_Click'));
 		
 		$this->txtLemonKeycode = new QTextBox($this);
 		$this->txtLemonKeycode->Name = 'LEMON Keycode:';
 		$this->txtLemonKeycode->Enabled = false;
 		
 		$this->txtTenPKeycode = new QTextBox($this);
 		$this->txtTenPKeycode->Name = '10-P Keycode:';
 		$this->txtTenPKeycode->Enabled = false;
 		
 		$this->txtTenFKeycode  = new QTextBox($this);
 		$this->txtTenFKeycode->Name = '10-F Keycode:';
 		$this->txtTenFKeycode->Enabled = false;
 		
 		$this->txtKingdomKeycode = new QTextBox($this);
 		$this->txtKingdomKeycode->Name = 'Kingdom Assessment Keycode:';
 		$this->txtKingdomKeycode->Enabled = false;
 		
 		$this->txtIntegrationKeycode = new QTextBox($this);
 		$this->txtIntegrationKeycode->Name = 'Integration Keycode:';
 		$this->txtIntegrationKeycode->Enabled = false;
 		
 		$this->txtSeasonalKeycode = new QTextBox($this);
 		$this->txtSeasonalKeycode->Name = 'Seasonal Keycode:';
 		$this->txtSeasonalKeycode->Enabled = false;
 		
 		$this->txtTimeKeycode  = new QTextBox($this);
 		$this->txtTimeKeycode->Name = 'Time Keycode: ';
 		$this->txtTimeKeycode->Enabled = false;
 		
 		$this->txtLRAKeycode = new QTextBox($this);
 		$this->txtLRAKeycode->Name = 'Leadership Readiness Assessment Keycode:';
 		$this->txtLRAKeycode->Enabled = false;	 
	}

	public function chkLemon_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkLemon->Checked) {
			$this->txtLemonKeycode->Enabled = true;
		} else {
			$this->txtLemonKeycode->Enabled = false;	
		}
	}
	
	public function chkTenP_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkTenP->Checked) {
			$this->txtTenPKeycode->Enabled = true;
		} else {
			$this->txtTenPKeycode->Enabled = false;	
		}
	}
	
	public function chkTenF_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkTenF->Checked) {
			$this->txtTenFKeycode->Enabled = true;
		} else {
			$this->txtTenFKeycode->Enabled = false;	
		}
	}
	
	public function chkKingdom_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkKingdom->Checked) {
			$this->txtKingdomKeycode->Enabled = true;
		} else {
			$this->txtKingdomKeycode->Enabled = false;	
		}
	}
	
	public function chkIntegration_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkIntegration->Checked) {
			$this->txtIntegrationKeycode->Enabled = true;
		} else {
			$this->txtIntegrationKeycode->Enabled = false;	
		}
	}
	
	public function chkSeasonal_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkSeasonal->Checked) {
			$this->txtSeasonalKeycode->Enabled = true;
		} else {
			$this->txtSeasonalKeycode->Enabled = false;	
		}
	}
	
	public function chkTime_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkTime->Checked) {
			$this->txtTimeKeycode->Enabled = true;
		} else {
			$this->txtTimeKeycode->Enabled = false;	
		}
	}
	
	public function chkLRA_Click($strFormId, $strControlId, $strParameter) {
		if ($this->chkLRA->Checked) {
			$this->txtLRAKeycode->Enabled = true;
		} else {
			$this->txtLRAKeycode->Enabled = false;	
		}
	}
	
	protected function btnSubmit_Click() {
		$objLogin = new Login();
		$objLogin->Username = $this->txtUserName->Text;
		$objLogin->Password = $this->txtPassword->Text;
		$objLogin->RoleId = $this->lstRole->SelectedValue;
		$intLoginId = $objLogin->Save();
		
		$objUser = new User();
		$objUser->FirstName = $this->txtFirstName->Text;
		$objUser->LastName = $this->txtLastName->Text;
		$objUser->Email = $this->txtEmail->Text;
		$objUser->CountryId = trim($this->lstCountry->SelectedValue);
		$objUser->TenureId = $this->lstTenure->SelectedValue;
		$objUser->TitleId = $this->lstLevel->SelectedValue;
		$objUser->Gender = $this->lstGender->SelectedValue;
		$objUser->LoginId = $intLoginId;
		$intUserId = $objUser->Save();
		
		if ($this->chkLemon->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtLemonKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtLemonKeycode->Text;
				$objGroup->ResourceId = 5;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
	     	$objAssessment = new LemonAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 5; //LemonAssessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->DateModified = new QDateTime('Now');	
	     	$objAssessment->GroupId = $intGroupId; 
	     	$objUser->AssociateResource(Resource::Load(5));
	     	$objUser->Save();
			$objAssessment->Save();
		}
		
		if ($this->chkTenP->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtTenPKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtTenPKeycode->Text;
				$objGroup->ResourceId = 2;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objAssessment = new TenPAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 2; //10-PAssessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $intGroupId; 
	     	$objUser->AssociateResource(Resource::Load(2));
			$objAssessment->Save();
		}
		if ($this->chkTenF->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtTenFKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtTenFKeycode->Text;
				$objGroup->ResourceId = 3;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objAssessment = new TenFAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 3; //10-FAssessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $intGroupId; 
	     	$objUser->AssociateResource(Resource::Load(3));
			$objAssessment->Save();
		}
		if ($this->chkKingdom->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtKingdomKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtKingdomKeycode->Text;
				$objGroup->ResourceId = 4;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objKingdomAssessment = new KingdomBusinessAssessment();
	     	$objKingdomAssessment->UserId = $intUserId;
	     	$objKingdomAssessment->ResourceId = 4; //KingdomAssessment - going to have to find a nicer way of doing this
	     	$objKingdomAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objKingdomAssessment->GroupId = $intGroupId;     	
	     	$objUser->AssociateResource(Resource::Load(4));
			$objKingdomAssessment->Save();
		}
		if ($this->chkIntegration->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtIntegrationKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtIntegrationKeycode->Text;
				$objGroup->ResourceId = 6;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objAssessment = new IntegrationAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 6; //Integration Assessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $intGroupId;  
	     	$objUser->AssociateResource(Resource::Load(6));
			$objAssessment->Save();
		}
		if ($this->chkSeasonal->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtSeasonalKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtSeasonalKeycode->Text;
				$objGroup->ResourceId = 7;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objAssessment = new SeasonalAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 7; //Seasonal Assessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $intGroupId; 
	     	$objUser->AssociateResource(Resource::Load(7));
			$objAssessment->Save();
		}
		if ($this->chkTime->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtTimeKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtTimeKeycode->Text;
				$objGroup->ResourceId = 8;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objAssessment = new TimeAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 8; //Time Assessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $intGroupId;
	     	$objUser->AssociateResource(Resource::Load(8));
			$objAssessment->Save();
		}
		if ($this->chkLRA->Checked) {
			$groupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtLRAKeycode->Text);
			if($groupArray == null) {
				$objGroup = new GroupAssessmentList();
				$objGroup->KeyCode = $this->txtLRAKeycode->Text;
				$objGroup->ResourceId = 9;
				$objGroup->KeysLeft = 1;
				$objGroup->TotalKeys = 1;
				$intGroupId = $objGroup->Save();
			} else {
				$intGroupId = $groupArray[0]->Id;
			}
			$objAssessment = new LraAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 9; //Leadership Readiness Assessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objAssessment->GroupId = $intGroupId;
	     	$objUser->AssociateResource(Resource::Load(9));
			$objAssessment->Save();
		}
		QApplication::Redirect(__SUBDIRECTORY__.'/admin/index.php/users');
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/admin/index.php/users');
	}
}

NewUserForm::Run('NewUserForm');
?>