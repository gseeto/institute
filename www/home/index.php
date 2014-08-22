<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class HomeForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionHome;
	protected $lblDebug;
	
	protected $mcUser;
	protected $txtFirstName;
	protected $lblFirstName;
	protected $txtLastName;
	protected $lblLastName;
	protected $txtEmail;
	protected $lblEmail;
	protected $lstCountry;
	protected $lblCountry;
	protected $chkGender;
	protected $chkGenderDisplay;
	protected $lblGender;
	protected $txtDepartment;
	protected $lblDepartment;
	protected $lstTitle;
	protected $lblTitle;
	protected $lstTenure;
	protected $lblTenure;
	protected $txtCareerLength;
	protected $lblCareerLength;
	
	protected $lblCompanyName;
	protected $lblCompanyAddress;
	
	protected $btnUpdate;
	protected $btnCancel;
	protected $bIsEdit;

	protected $mcLogin;
	protected $bIsEditLogin;
	protected $lblUsername;
	protected $txtUsername;
	protected $lblRole;
	protected $txtPassword;
	protected $btnLoginUpdate;
	protected $btnLoginCancel;
	
	protected $lblAssessments;
	protected $lblScorecards;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
			
		$objUserArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$objUser = $objUserArray[0];
		$this->mcUser = new UserMetaControl($this,$objUser);
		$this->txtFirstName = $this->mcUser->txtFirstName_Create();
		$this->txtFirstName->Height = 20;
		$this->txtFirstName->Visible = false;
		$this-> lblFirstName = $this->mcUser->lblFirstName_Create();
		$this->txtLastName = $this->mcUser->txtLastName_Create();
		$this->txtLastName->Height = 20;
		$this->txtLastName->Visible = false;
		$this->lblLastName = $this->mcUser->lblLastName_Create();
		$this->txtEmail = $this->mcUser->txtEmail_Create();
		$this->txtEmail->Height = 20;
		$this->txtEmail->Visible = false;
		$this->lblEmail = $this->mcUser->lblEmail_Create();
		$this->lstCountry = $this->mcUser->lstCountry_Create();
		$this->lstCountry->Height = 20;
		$this->lstCountry->Visible = false;
		$this->lblCountry = $this->mcUser->lblCountryId_Create();
		$this->chkGender = $this->mcUser->chkGender_Create();
		$this->chkGender->Visible = false;
		$this->chkGenderDisplay = new QRadioButtonList($this);
		$this->chkGenderDisplay->Visible = false;
		$this->chkGenderDisplay->AddItem('Male',1,$this->chkGender->Checked? true:false);
		$this->chkGenderDisplay->AddItem('Female',0,$this->chkGender->Checked? false:true);
		$this->lblGender = $this->mcUser->lblGender_Create();
		$this->txtDepartment = $this->mcUser->txtDepartment_Create();
		$this->txtDepartment->Height = 20;
		$this->txtDepartment->Visible = false;
		$this->lblDepartment = $this->mcUser->lblDepartment_Create();
		$this->lstTitle = $this->mcUser->lstTitle_Create();
		$this->lstTitle->Height = 20;
		$this->lstTitle->Visible = false;
		$this->lblTitle = $this->mcUser->lblTitleId_Create();
		$this->lstTenure = $this->mcUser->lstTenure_Create();
		$this->lstTenure->Height = 20;	
		$this->lstTenure->Width = 100;
		$this->lstTenure->Visible = false;
		$this->lblTenure = $this->mcUser->lblTenureId_Create();
		$this->txtCareerLength = $this->mcUser->txtCareerLength_Create();
		$this->txtCareerLength->Visible = false;
		$this->txtCareerLength->Height = 20;
		$this->txtCareerLength->Width = 30;
		$this->txtCareerLength->HtmlAfter = ' Years';
		$this->lblCareerLength = $this->mcUser->lblCareerLength_Create();
		$this->lblCareerLength->HtmlAfter = ' Years';
		
		$this->bIsEdit = true;
		$this->btnUpdate = new QButton($this);
		$this->btnUpdate->Text = 'Update Details';
		$this->btnUpdate->CssClass = 'primary';
		$this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Clicked'));
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->CssClass = 'primary';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Clicked'));
		$this->btnCancel->Visible = false;
		
		$this->bIsEditLogin = true;
		$this->mcLogin = new LoginMetaControl($this,QApplication::$Login);
		$this->lblUsername = $this->mcLogin->lblUsername_Create();
		$this->txtUsername = $this->mcLogin->txtUsername_Create();
		$this->txtUsername->Height = 20;
		$this->txtUsername->Visible = false;
		$this->lblRole = $this->mcLogin->lblRoleId_Create();
		$this->txtPassword = $this->mcLogin->txtPassword_Create();
		$this->txtPassword->Visible = false;
		$this->txtPassword->Height = 20;
		
		$this->btnLoginUpdate = new QButton($this);
		$this->btnLoginUpdate->Text = 'Reset Password Or Change User Name';
		$this->btnLoginUpdate->CssClass = 'primary';
		$this->btnLoginUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnLoginUpdate_Clicked'));
		
		$this->btnLoginCancel =  new QButton($this);
		$this->btnLoginCancel->Text = 'Cancel';
		$this->btnLoginCancel->CssClass = 'primary';
		$this->btnLoginCancel->AddAction(new QClickEvent(), new QAjaxAction('btnLoginCancel_Clicked'));
		$this->btnLoginCancel->Visible = false;
		
		$objCompanyArray = $objUser->GetCompanyArray();
		$this->lblCompanyName = array();
	 	$this->lblCompanyAddress = array();
		foreach($objCompanyArray as $objCompany) {
			$txtName = new QLabel($this);
			$txtName->HtmlEntities = false;
			$txtName->Text = '<b>'.$objCompany->Name .'</b>';
			$txtName->DisplayStyle = QDisplayStyle::Block;
			$this->lblCompanyName[] = $txtName;
			$objAddress = Address::Load($objCompany->AddressId);
			$txtAddress = new QLabel($this);
			$txtAddress->Text = sprintf('%s, %s, %s, %s, %s',
				$objAddress->Address1, $objAddress->City, $objAddress->State, $objAddress->ZipCode, $objAddress->Country);
			$txtAddress->DisplayStyle = QDisplayStyle::Block;
			$txtAddress->HtmlAfter = '<br><br>';
			$this->lblCompanyAddress[] = $txtAddress;	
		}
		
		$this->lblAssessments = array();
		$objResourceArray = Resource::LoadAll();
		foreach($objResourceArray as $objResource) {
			if ($objResource->Name != 'Scorecard') {
				$lblAssessmentLink = new QLabel($this);
				$lblAssessmentLink->Name = $objResource->Id;
				$lblAssessmentLink->Text = $objResource->Name;
				$lblAssessmentLink->HtmlEntities = false;
				
				if($objUser->IsResourceAssociated($objResource)) {
					switch ($objResource->Name) {
						case 'Kingdom Business Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/kingdom/\'>Kingdom Business Assessment</a></li>';	
							break;
						case '10-P Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/tenp/\'>10-P Assessment</a></li>';	
							break;
						case '10-F Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/tenf/\'>10-F Assessment</a></li>';	
							break;
						case 'LEMON Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/lemon/\'>LEMON Assessment</a></li>';	
							break;
						case 'Integration Assessment':
								$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/integration/\'>Integration Assessment</a></li>';
								break;
						case 'Seasonal Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/seasonal/\'>Seasonal Assessment</a></li>';	
							break;
						case 'Where Does The Time Go Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/time/\'>Where Does The Time Go Assessment</a></li>';
							break;
						case 'Leadership Readiness Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/lra/\'>Leadership Readiness Assessment</a></li>';
							break;
					}
					$this->lblAssessments[] = $lblAssessmentLink;						
				} 
			} 
		}

		$this->lblScorecards = array();
		$objScorecardArray = $objUser->GetScorecardArray();
		foreach($objScorecardArray as $objScorecard) {
			$lblScorecardLink = new QLabel($this);
			$lblScorecardLink->Name = $objScorecard->Id;
			$lblScorecardLink->HtmlEntities = false;
			$lblScorecardLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$objScorecard->Id. '\'>'.$objScorecard->Name.'</a></li>';
			$this->lblScorecards[] = $lblScorecardLink;
		}
	}
	
	public function btnLoginUpdate_Clicked($strFormId, $strControlId, $strParameter) {
		if($this->bIsEditLogin) {
			$this->bIsEditLogin = false;
			$this->txtUsername->Visible = true;
			$this->txtPassword->Visible = true;
			$this->btnLoginCancel->Visible = true;			
			$this->lblUsername->Visible = false;
			$this->lblRole->Visible = false;
		} else {
			
			$this->mcLogin->SaveLogin();
			$this->mcLogin->Refresh(true);
			$this->btnLoginCancel->Visible = false;
			$this->bIsEditLogin = true;
			$this->txtUsername->Visible = false;
			$this->txtPassword->Visible = false;
			$this->btnLoginCancel->Visible = false;			
			$this->lblUsername->Visible = true;
			$this->lblRole->Visible = true;			
		}
	}
	
	public function btnLoginCancel_Clicked($strFormId, $strControlId, $strParameter) {
		$this->btnLoginCancel->Visible = false;
		$this->bIsEditLogin = true;
		$this->txtUsername->Visible = false;
		$this->txtPassword->Visible = false;
		$this->btnLoginCancel->Visible = false;			
		$this->lblUsername->Visible = true;
		$this->lblRole->Visible = true;		
	}
	
	public function btnUpdate_Clicked($strFormId, $strControlId, $strParameter) {
		if($this->bIsEdit) {
			$this->bIsEdit = false;
			$this->txtFirstName->Visible = true;
			$this-> lblFirstName->Visible = false;
			$this->txtLastName->Visible = true;
			$this->lblLastName->Visible = false;
			$this->txtEmail->Visible = true;
			$this->lblEmail->Visible = false;
			$this->lstCountry->Visible = true;
			$this->lblCountry->Visible = false;
			$this->chkGender->Visible = true;
			$this->chkGenderDisplay->Visible= true;
			$this->lblGender->Visible = false;
			$this->txtDepartment->Visible = true;
			$this->lblDepartment->Visible = false;
			$this->lstTitle->Visible = true;
			$this->lblTitle->Visible = false;
			$this->lstTenure->Visible = true;
			$this->lblTenure->Visible = false;	
			$this->txtCareerLength->Visible = true;
			$this->lblCareerLength->Visible = false;
			$this->btnCancel->Visible = true;
		} else {
			if($this->chkGenderDisplay->SelectedValue == 1)
				$this->chkGender->Checked = true;
			else 
				$this->chkGender->Checked = false;
			$this->mcUser->SaveUser();
			$this->mcUser->Refresh(true);
			$this->btnCancel->Visible = false;
			$this->bIsEdit = true;
			$this->txtFirstName->Visible = false;
			$this-> lblFirstName->Visible = true;
			$this->txtLastName->Visible = false;
			$this->lblLastName->Visible = true;
			$this->txtEmail->Visible = false;
			$this->lblEmail->Visible = true;
			$this->lstCountry->Visible = false;
			$this->lblCountry->Visible = true;
			$this->chkGender->Visible = false;
			$this->chkGenderDisplay->Visible = false;
			$this->lblGender->Visible = true;
			$this->txtDepartment->Visible = false;
			$this->lblDepartment->Visible = true;
			$this->lstTitle->Visible = false;
			$this->lblTitle->Visible = true;
			$this->lstTenure->Visible = false;
			$this->lblTenure->Visible = true;	
			$this->txtCareerLength->Visible = false;
			$this->lblCareerLength->Visible = true;	
		}
	}
	
	public function btnCancel_Clicked($strFormId, $strControlId, $strParameter) {
		$this->bIsEdit = true;
			$this->txtFirstName->Visible = false;
			$this-> lblFirstName->Visible = true;
			$this->txtLastName->Visible = false;
			$this->lblLastName->Visible = true;
			$this->txtEmail->Visible = false;
			$this->lblEmail->Visible = true;
			$this->lstCountry->Visible = false;
			$this->lblCountry->Visible = true;
			$this->chkGender->Visible = false;
			$this->chkGenderDisplay->Visible = false;
			$this->lblGender->Visible = true;
			$this->txtDepartment->Visible = false;
			$this->lblDepartment->Visible = true;
			$this->lstTitle->Visible = false;
			$this->lblTitle->Visible = true;
			$this->lstTenure->Visible = false;
			$this->lblTenure->Visible = true;	
			$this->txtCareerLength->Visible = false;
			$this->lblCareerLength->Visible = true;			
			$this->btnCancel->Visible = false;
	}

}

HomeForm::Run('HomeForm');
?>