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
	protected $frontWheelArray;
	protected $backWheelArray;
	protected $missingFrontWheelArray;
	protected $missingBackWheelArray;
	
	protected $lblAd_LemonBook;
	protected $lblAd_ConvergenceBook;
	protected $lblAd_LemonAssessment;
	protected $lblAd_ConvergenceAssessment;
	
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
		$this->txtFirstName->Visible = false;
		$this->txtFirstName->CssClass = 'form-control';
		$this->lblFirstName = $this->mcUser->lblFirstName_Create();
		$this->txtLastName = $this->mcUser->txtLastName_Create();
		$this->txtLastName->Visible = false;
		$this->txtLastName->CssClass = 'form-control';
		$this->lblLastName = $this->mcUser->lblLastName_Create();
		$this->txtEmail = $this->mcUser->txtEmail_Create();
		$this->txtEmail->Visible = false;
		$this->txtEmail->CssClass = 'form-control';
		$this->lblEmail = $this->mcUser->lblEmail_Create();
		$this->lstCountry = $this->mcUser->lstCountry_Create();
		$this->lstCountry->Visible = false;
		$this->lstCountry->CssClass = 'form-control';
		$this->lblCountry = $this->mcUser->lblCountryId_Create();
		$this->chkGender = $this->mcUser->chkGender_Create();
		$this->chkGender->Visible = false;
		$this->chkGender->CssClass = 'checkbox';
		$this->chkGenderDisplay = new QRadioButtonList($this);
		$this->chkGenderDisplay->Visible = false;
		$this->chkGenderDisplay->CssClass = 'checkbox';
		$this->chkGenderDisplay->AddItem('Male',1,$this->chkGender->Checked? true:false);
		$this->chkGenderDisplay->AddItem('Female',0,$this->chkGender->Checked? false:true);
		$this->lblGender = $this->mcUser->lblGender_Create();
		$this->txtDepartment = $this->mcUser->txtDepartment_Create();
		$this->txtDepartment->Visible = false;
		$this->txtDepartment->CssClass = 'form-control';
		$this->lblDepartment = $this->mcUser->lblDepartment_Create();
		$this->lstTitle = $this->mcUser->lstTitle_Create();
		$this->lstTitle->Visible = false;
		$this->lstTitle->CssClass = 'form-control';
		$this->lblTitle = $this->mcUser->lblTitleId_Create();
		$this->lstTenure = $this->mcUser->lstTenure_Create();	
		$this->lstTenure->Visible = false;
		$this->lstTenure->CssClass = 'form-control';
		$this->lblTenure = $this->mcUser->lblTenureId_Create();
		$this->txtCareerLength = $this->mcUser->txtCareerLength_Create();
		$this->txtCareerLength->Visible = false;
		$this->txtCareerLength->CssClass = 'form-control';
		$this->txtCareerLength->HtmlAfter = ' Years';
		$this->lblCareerLength = $this->mcUser->lblCareerLength_Create();
		$this->lblCareerLength->HtmlAfter = ' Years';
		
		$this->bIsEdit = true;
		$this->btnUpdate = new QButton($this);
		$this->btnUpdate->Text = 'Update Details';
		$this->btnUpdate->CssClass = 'btn btn-default';
		$this->btnUpdate->HtmlAfter = '&nbsp;&nbsp;  ';
		$this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Clicked'));
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->CssClass = 'btn btn-default';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Clicked'));
		$this->btnCancel->Visible = false;
		
		$this->bIsEditLogin = true;
		$this->mcLogin = new LoginMetaControl($this,QApplication::$Login);
		$this->lblUsername = $this->mcLogin->lblUsername_Create();
		$this->txtUsername = $this->mcLogin->txtUsername_Create();
		$this->txtUsername->Visible = false;
		$this->txtUsername->CssClass = 'form-control';
		$this->lblRole = $this->mcLogin->lblRoleId_Create();
		$this->txtPassword = $this->mcLogin->txtPassword_Create();
		$this->txtPassword->Visible = false;
		$this->txtPassword->CssClass = 'form-control';
		
		$this->btnLoginUpdate = new QButton($this);
		$this->btnLoginUpdate->Text = 'Reset Password Or Change User Name';
		$this->btnLoginUpdate->CssClass = 'btn btn-default';
		$this->btnLoginUpdate->HtmlAfter = '&nbsp;&nbsp;&nbsp;  ';
		$this->btnLoginUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnLoginUpdate_Clicked'));
		
		$this->btnLoginCancel =  new QButton($this);
		$this->btnLoginCancel->Text = 'Cancel';
		$this->btnLoginCancel->CssClass = 'btn btn-default';
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
		
		// Initialize Advertisements to display
		$this->lblAd_LemonBook = new QLabel($this);
		$this->lblAd_LemonBook->HtmlEntities = false;
		$this->lblAd_LemonBook->Text = '';
		$this->lblAd_ConvergenceBook = new QLabel($this);
		$this->lblAd_ConvergenceBook->HtmlEntities = false;
		$this->lblAd_ConvergenceBook->Text = '';
		$this->lblAd_LemonAssessment = new QLabel($this);
		$this->lblAd_LemonAssessment->HtmlEntities = false;
		$this->lblAd_LemonAssessment->Text = '';
		$this->lblAd_ConvergenceAssessment = new QLabel($this);
		$this->lblAd_ConvergenceAssessment->HtmlEntities = false;
		$this->lblAd_ConvergenceAssessment->Text = '';
		
		$this->frontWheelArray = array();
		$this->backWheelArray = array();
		$this->missingFrontWheelArray = array();
		$this->missingBackWheelArray = array();
		$this->lblAssessments = array();
		$bKBA = $bTenP = $bTenF = $bLemon = $bIntegration = $bSeasonal = $bTime = $bScorecard = false;
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
							$tmpLabel = new QLabel($this);
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>Kingdom Business Assessment</li>';
							$this->backWheelArray[] = $tmpLabel;
							$bKBA = true;
							break;
						case '10-P Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/tenp/\'>10-P Assessment</a></li>';
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>10-P Assessment</li>';
							$this->backWheelArray[] = $tmpLabel;
							$bTenP = true;
							break;
						case '10-F Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/tenf/\'>10-F Assessment</a></li>';
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>10-F Assessment</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_ConvergenceBook->Text = '<a href="http://inst.net/product/convergence-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/convergencebook.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bTenF = true;	
							break;
						case 'LEMON Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/lemon/\'>LEMON Assessment</a></li>';	
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>LEMON Assessment</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_LemonBook->Text = '<a href="http://inst.net/product/lemon-leadership-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/lemonbook1.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bLemon = true;
							break;
						case 'LEMON Assessment (50 Questions)':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/lemon/50index.php\'>LEMON Assessment (50 Questions)</a></li>';	
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>LEMON Assessment (50 Questions)</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_LemonBook->Text = '<a href="http://inst.net/product/lemon-leadership-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/lemonbook1.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bLemon = true;
							break;
						case 'LEMON for Lovers Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/lemonlovers/\'>LEMON for Lovers Assessment</a></li>';	
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>LEMON for Lovers Assessment</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_LemonBook->Text = '<a href="http://inst.net/product/lemon-leadership-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/lemonbook1.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bLemon = true;
							break;
						case 'Integration Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/integration/\'>Integration Assessment</a></li>';
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>Integration Assessment</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_ConvergenceBook->Text = '<a href="http://inst.net/product/convergence-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/convergencebook.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bIntegration = true;
							break;
						case 'Seasonal Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/seasons/\'>Seasonal Assessment</a></li>';	
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>Seasonal Assessment</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_ConvergenceBook->Text = '<a href="http://inst.net/product/convergence-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/convergencebook.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bSeasonal = true;
							break;
						case 'Where Does The Time Go Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/time/\'>Where Does The Time Go Assessment</a></li>';
							$tmpLabel = new QLabel($this);	
							$tmpLabel->HtmlEntities = false;
							$tmpLabel->Text = '<li>Where Does The Time Go Assessment</li>';
							$this->frontWheelArray[] = $tmpLabel;
							$this->lblAd_ConvergenceBook->Text = '<a href="http://inst.net/product/convergence-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/convergencebook.jpg" style="width:290px; height:180px; margin:8px; float:left;" /></a>';
							$bTime = true;
							break;
						case 'Leadership Readiness Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/lra/\'>Leadership Readiness Assessment</a></li>';
							break;
						case 'Education 8-P Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/upward/\'>Education 8-P Assessment</a></li>';
							break;
						case 'Post Venture Assessment':
							$lblAssessmentLink->Text = '<li><a href=\''.__SUBDIRECTORY__.'/assessments/postventure/\'>Post Venture Assessment</a></li>';
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
		if(count($this->lblScorecards)>0) {
			$tmpLabel = new QLabel($this);	
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li>Scorecard</li>';
			$this->backWheelArray[] = $tmpLabel;
			$bScorecard = true;
		}
		
		// Construct missing assessment lists
		if(!$bKBA) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li>Kingdom Business Assessment</li>';
			$this->missingBackWheelArray[] = $tmpLabel;
		}
		if(!$bTenP) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li>10-P Assessment</li>';
			$this->missingBackWheelArray[] = $tmpLabel;
		}
		if(!$bTenF) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li><a style="color:red; text-decoration:none;" href="http://inst.net/product/convergence-electronic/" target="_blank">10-F Assessment</a></li>';
			$this->missingFrontWheelArray[] = $tmpLabel;
		}
		if(!$bLemon) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li><a style="color:red; text-decoration:none;" href="http://inst.net/product/lemon-leadership-assessment/" target="_blank">LEMON Assessment</a></li>';
			$this->missingFrontWheelArray[] = $tmpLabel;
			$this->lblAd_LemonAssessment->Text = '<a href="http://inst.net/product/lemon-leadership-assessment/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/lemonassessment.jpg" style="width:290px; height:180px; margin:5px; float:left;" /></a>';
		}
		if(!$bIntegration) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li><a style="color:red; text-decoration:none;" href="http://inst.net/product/convergence-electronic/" target="_blank">Integration Assessment</a></li>';
			$this->missingFrontWheelArray[] = $tmpLabel;
		}
		if(!$bSeasonal) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li><a style="color:red; text-decoration:none;" href="http://inst.net/product/convergence-electronic/" target="_blank">Seasonal Assessment</a></li>';
			$this->missingFrontWheelArray[] = $tmpLabel;
		}
		if(!$bTime) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li><a style="color:red; text-decoration:none;" href="http://inst.net/product/convergence-electronic/" target="_blank">Where Does The Time Go Assessment</a></li>';
			$this->missingFrontWheelArray[] = $tmpLabel;
		}
		if(!$bScorecard) {
			$tmpLabel = new QLabel($this);
			$tmpLabel->HtmlEntities = false;
			$tmpLabel->Text = '<li>Scorecard</li>';
			$this->missingBackWheelArray[] = $tmpLabel;
		}
		if((!$bTime)&&(!$bSeasonal) && (!$bIntegration)&&(!$bTenF)){
			$this->lblAd_ConvergenceAssessment->Text = '<a href="http://inst.net/product/convergence-electronic/" target="_blank"><img class="shadowed" src="'.__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/convergenceassessments.jpg" style="width:290px; height:180px; margin:5px; float:left;" /></a>';
		}
		
		// Generate data for image
		$this->initializeCharts();
	}
	
	protected function initializeCharts() {
		$wheelArray = array();
		$objItem = new involvementArray();
		$objItem->key = 'Assessments Completed';
		$objItem->value = count($this->frontWheelArray);			
		$wheelArray[] = $objItem;
			
		$objItem = new involvementArray();
		$objItem->key = 'Assessments Uncompleted';
		$objItem->value = 5 - count($this->frontWheelArray); // number of items on front wheel = 5
		$wheelArray[] = $objItem;
		
		QApplication::ExecuteJavaScript('DisplayWheel("front",'.json_encode($wheelArray).');');
		
		$backwheelArray = array();
		$objItem = new involvementArray();
		$objItem->key = 'Assessments Completed';
		$objItem->value = count($this->backWheelArray);			
		$backwheelArray[] = $objItem;
			
		$objItem = new involvementArray();
		$objItem->key = 'Assessments Uncompleted';
		$objItem->value = 3 - count($this->backWheelArray); //Number of items on back wheel = 3
		$backwheelArray[] = $objItem;
		
		QApplication::ExecuteJavaScript('DisplayWheel("back",'.json_encode($backwheelArray).');');
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

class involvementArray {
	public $key;
	public $value;
} 
?>