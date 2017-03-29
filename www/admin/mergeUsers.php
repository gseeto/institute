<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class MergeUsersForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Administration';	
	protected $rbnFirstName;  
	protected $rbnLastName; 
	protected $rbnEmail;
	protected $rbnGender; 
	protected $rbnCountry; 
	protected $rbnLevel; 
	protected $rbnTenure;  
	protected $rbnUserName;  
	protected $rbnPassword; 
	protected $rbnRole; 
	protected $rbnLemonAssessment; 
	protected $rbnTenPAssessment; 
	protected $rbnTenFAssessment; 
	protected $rbnKingdomAssessment;
	protected $intUserCount;
	protected $userArray;
	
 	protected $btnMerge;
 	protected $btnCancel;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
		QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-users').className = 'active';"); 
	}
	
	protected function Form_Create() {
		// Get the UserIds from the pathinfo
		$strArgs = substr(QApplication::$PathInfo, 1 );
		if($strArgs != null) {
			$this->userArray = explode('/',$strArgs);
			$this->intUserCount = count($this->userArray);		 
		
			$this->rbnFirstName = new QRadioButtonList($this);  
			$this->rbnFirstName->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnFirstName->RepeatColumns = $this->intUserCount;			
			$this->rbnFirstName->Name = 'First Name: ';
			$this->rbnFirstName->CssClass = 'radio-inline';
			
			$this->rbnLastName = new QRadioButtonList($this);  
			$this->rbnLastName->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnLastName->RepeatColumns = $this->intUserCount;
			$this->rbnLastName->Name = 'Last Name: ';
			$this->rbnLastName->CssClass = 'radio-inline';
			 
		 	$this->rbnEmail = new QRadioButtonList($this); 
		 	$this->rbnEmail->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnEmail->RepeatColumns = $this->intUserCount;
			$this->rbnEmail->Name = 'Email: ';
			$this->rbnEmail->CssClass = 'radio-inline';
			
		 	$this->rbnGender = new QRadioButtonList($this); 
		 	$this->rbnGender->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnGender->RepeatColumns = $this->intUserCount;
			$this->rbnGender->Name = 'Gender: ';
			$this->rbnGender->CssClass = 'radio-inline';
			
		 	$this->rbnCountry = new QRadioButtonList($this); 
		 	$this->rbnCountry->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnCountry->RepeatColumns = $this->intUserCount;
			$this->rbnCountry->Name = 'Country: ';
			$this->rbnCountry->CssClass = 'radio-inline';
			 
			$this->rbnLevel = new QRadioButtonList($this);  
			$this->rbnLevel->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnLevel->RepeatColumns = $this->intUserCount;
			$this->rbnLevel->Name = 'Level: ';
			$this->rbnLevel->CssClass = 'radio-inline';
			
		 	$this->rbnTenure = new QRadioButtonList($this);  
		 	$this->rbnTenure->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnTenure->RepeatColumns = $this->intUserCount;
			$this->rbnTenure->Name = 'Tenure: ';
			$this->rbnTenure->CssClass = 'radio-inline';
			
		 	$this->rbnUserName = new QRadioButtonList($this);  
		 	$this->rbnUserName->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnUserName->RepeatColumns = $this->intUserCount;
			$this->rbnUserName->Name = 'Username: ';
			$this->rbnUserName->CssClass = 'radio-inline';
			
		 	$this->rbnPassword = new QRadioButtonList($this);  
		 	$this->rbnPassword->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnPassword->RepeatColumns = $this->intUserCount;
			$this->rbnPassword->Name = 'Password: ';
			$this->rbnPassword->CssClass = 'radio-inline';
			
		 	$this->rbnRole = new QRadioButtonList($this); 
		 	$this->rbnRole->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnRole->RepeatColumns = $this->intUserCount;
			$this->rbnRole->Name = 'Role: ';
			$this->rbnRole->CssClass = 'radio-inline';
			 
		 	$this->rbnLemonAssessment = new QRadioButtonList($this); 
		 	$this->rbnLemonAssessment->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnLemonAssessment->RepeatColumns = $this->intUserCount;
			$this->rbnLemonAssessment->Name = 'LEMON Assessment: ';
			$this->rbnLemonAssessment->CssClass = 'radio-inline';
			
		 	$this->rbnTenPAssessment = new QRadioButtonList($this); 
		 	$this->rbnTenPAssessment->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnTenPAssessment->RepeatColumns = $this->intUserCount;
			$this->rbnTenPAssessment->Name = '10-P Assessment: ';
			$this->rbnTenPAssessment->CssClass = 'radio-inline';
			
		 	$this->rbnTenFAssessment  = new QRadioButtonList($this); 
		 	$this->rbnTenFAssessment->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnTenFAssessment->RepeatColumns = $this->intUserCount;
			$this->rbnTenFAssessment->Name = '10-F Assessment: ';
			$this->rbnTenFAssessment->CssClass = 'radio-inline';
			
			$this->rbnKingdomAssessment  = new QRadioButtonList($this); 
		 	$this->rbnKingdomAssessment->RepeatDirection = QRepeatDirection::Horizontal;
			$this->rbnKingdomAssessment->RepeatColumns = $this->intUserCount;
			$this->rbnKingdomAssessment->Name = 'Kingdom Assessment: ';
			$this->rbnKingdomAssessment->CssClass = 'radio-inline';
		 	
		 	for($i=0; $i<$this->intUserCount; $i++) {
		 		$objUser = User::Load($this->userArray[$i]); 
		 		$this->rbnFirstName->AddItem($objUser->FirstName, $objUser->Id,($i==0)?true:false,null,'Width="200px"');	 		
				$this->rbnLastName->AddItem($objUser->LastName, $objUser->Id,($i==0)?true:false,null,'Width="200px"'); 
			 	$strEmail = ($objUser->Email) ? 'Email: '.$objUser->Email : 'Email: Not specified';
			 	$this->rbnEmail->AddItem($strEmail, $objUser->Id,($i==0)?true:false,null,'Width="200px"');
				$strGender = ($objUser->Gender)? 'Gender: Male' : 'Gender: Female';
			 	$this->rbnGender->AddItem($strGender, $objUser->Id,($i==0)?true:false,null,'Width="200px"'); 		 	 
			 	$this->rbnCountry->AddItem($objUser->Country?$objUser->Country->Name:'Not Specified', $objUser->Id,($i==0)?true:false,null,'Width="200px"');			  
				$strTitle = ($objUser->TitleId)? 'Title: '.TitleList::LoadById($objUser->TitleId)->Name : 'Title: Not Specified';
				$this->rbnLevel->AddItem($strTitle, $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	$strTenure = ($objUser->TenureId)? 'Tenure: '.$objUser->Tenure->Range : 'Tenure: Not Specified';
			 	$this->rbnTenure->AddItem($strTenure, $objUser->Id,($i==0)?true:false,null,'Width="200px"');  
			 	$this->rbnUserName->AddItem($objUser->Login->Username, $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	$this->rbnPassword->AddItem($objUser->Login->Password, $objUser->Id,($i==0)?true:false,null,'Width="200px"'); 
			 	$this->rbnRole->AddItem($objUser->Login->Role->Name, $objUser->Id,($i==0)?true:false,null,'Width="200px"'); 
			 	 
			 	if ($objUser->IsResourceAssociated(Resource::LoadById(5))) {
			 		$this->rbnLemonAssessment->AddItem('Available', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	} else {
			 		$this->rbnLemonAssessment->AddItem('None', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	}
	 
			 	if ($objUser->IsResourceAssociated(Resource::LoadById(2))) {
			 		$this->rbnTenPAssessment->AddItem('Available', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	} else {
			 		$this->rbnTenPAssessment->AddItem('None', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	}
			 	
		 		if ($objUser->IsResourceAssociated(Resource::LoadById(3))) {
			 		$this->rbnTenFAssessment->AddItem('Available', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	} else {
			 		$this->rbnTenFAssessment->AddItem('None', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	}
			 	
		 		if ($objUser->IsResourceAssociated(Resource::LoadById(4))) {
			 		$this->rbnKingdomAssessment->AddItem('Available', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	} else {
			 		$this->rbnKingdomAssessment->AddItem('None', $objUser->Id,($i==0)?true:false,null,'Width="200px"');
			 	}
		 	}
	 	     	    
		 	$this->btnMerge = new QButton($this);
		 	$this->btnMerge->Text = 'Merge';
		 	$this->btnMerge->CssClass = 'btn btn-default';
		 	$this->btnMerge->AddAction(new QClickEvent(), new QAjaxAction('btnMerge_Click'));
		 	
		 	$this->btnCancel = new QButton($this);
		 	$this->btnCancel->Text = 'Cancel';
		 	$this->btnCancel->CssClass = 'btn btn-default';
		 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
		}
 	 
	}

	protected function btnMerge_Click() {
		// Assign everything selected to the first UserId.
		// Then delete the others.
		$objMainUser = User::Load($this->userArray[0]);
		if($objMainUser->Id != $this->rbnFirstName->SelectedValue) {
			$objMainUser->FirstName = $this->rbnFirstName->SelectedName;
		} 
		if($objMainUser->Id != $this->rbnLastName->SelectedValue) {
			$objMainUser->LastName = $this->rbnLastName->SelectedName;
		}   
		if($objMainUser->Id != $this->rbnEmail->SelectedValue) {
			$objMainUser->Email = $this->rbnEmail->SelectedName;
		}
		if($objMainUser->Id != $this->rbnGender->SelectedValue) {
			$objMainUser->Gender = ($this->rbnEmail->SelectedName == 'Gender: Male')? 1:0;
		}
		if($objMainUser->Id != $this->rbnCountry->SelectedValue) {
			$objMainUser->CountryId = CountryList::LoadByName($this->rbnCountry->SelectedName)->Id;
		}
		if($objMainUser->Id != $this->rbnLevel->SelectedValue) {
			$objMainUser->TitleId = TitleList::LoadByName($this->rbnLevel->SelectedName)->Id;
		}
		if($objMainUser->Id != $this->rbnTenure->SelectedValue) {
			$objMainUser->TenureId = User::Load($this->rbnTenure->SelectedValue)->Tenure->Id;
		}
		if($objMainUser->Id != $this->rbnUserName->SelectedValue) {
			$objMainUser->Login->Username = User::Load($this->rbnUserName->SelectedValue)->Login->Username;
		}
		if($objMainUser->Id != $this->rbnPassword->SelectedValue) {
			$objMainUser->Login->Password = User::Load($this->rbnPassword->SelectedValue)->Login->Password;
		}
		if($objMainUser->Id != $this->rbnRole->SelectedValue) {
			$objMainUser->Login->Role = User::Load($this->rbnRole->SelectedValue)->Login->Role;
		}
		if ($objMainUser->Id != $this->rbnLemonAssessment->SelectedValue) {
			$objSelectedUser = User::Load($this->rbnLemonAssessment->SelectedValue);
			$objAssessmentArray = $objSelectedUser->GetLemonAssessmentArray();
			foreach($objAssessmentArray as $objAssessment) {
				$objSelectedUser->UnassociateLemonAssessment($objAssessment);
				$objMainUser->AssociateLemonAssessment($objAssessment);
				$objResultArray = LemonAssessmentResults::LoadArrayByAssessmentId($objAssessment->Id);
				if(!$objMainUser->IsResourceAssociated(Resource::Load(5)))
					$objMainUser->AssociateResource(Resource::Load(5));
			}
		}
		if ($objMainUser->Id != $this->rbnTenPAssessment->SelectedValue) {
			$objSelectedUser = User::Load($this->rbnTenPAssessment->SelectedValue);
			$objAssessmentArray = $objSelectedUser->GetTenPAssessmentArray();
			foreach($objAssessmentArray as $objAssessment) {
				$objSelectedUser->UnassociateTenPAssessment($objAssessment);
				$objMainUser->AssociateTenPAssessment($objAssessment);
				if(!$objMainUser->IsResourceAssociated(Resource::Load(2)))
					$objMainUser->AssociateResource(Resource::Load(2));
			}
		}
		if ($objMainUser->Id != $this->rbnTenFAssessment->SelectedValue) {
			$objSelectedUser = User::Load($this->rbnTenFAssessment->SelectedValue);
			$objAssessmentArray = $objSelectedUser->GetTenFAssessmentArray();
			foreach($objAssessmentArray as $objAssessment) {
				$objSelectedUser->UnassociateTenFAssessment($objAssessment);
				$objMainUser->AssociateTenFAssessment($objAssessment);
				if(!$objMainUser->IsResourceAssociated(Resource::Load(3)))
					$objMainUser->AssociateResource(Resource::Load(3));
			}
		}
		if ($objMainUser->Id != $this->rbnKingdomAssessment->SelectedValue) {
			$objSelectedUser = User::Load($this->rbnKingdomAssessment->SelectedValue);
			$objAssessmentArray = $objSelectedUser->GetKingdomBusinessAssessmentArray();
			foreach($objAssessmentArray as $objAssessment) {
				$objSelectedUser->UnassociateKingdomBusinessAssessment($objAssessment);
				$objMainUser->AssociateKingdomBusinessAssessment($objAssessment);
				if(!$objMainUser->IsResourceAssociated(Resource::Load(4)))
					$objMainUser->AssociateResource(Resource::Load(4));
			}
		}
		$objMainUser->Save();
		
		// Now should be safe to delete the login and user objects
		for($i=1; $i<$this->intUserCount; $i++) {
	 		$objUser = User::Load($this->userArray[$i]); 
	 		$objLogin = Login::Load($objUser->LoginId);
	 		$objArray = $objUser->GetLemonAssessmentArray();
	 		foreach($objArray as $objAssessment) {
	 			$objAssessment->Delete();
	 		}
	 		$objUser->UnassociateAllLemonAssessments();
	 		$objUser->UnassociateAllGroupAssessmentListsAsAssessmentManager();
	 		
			$objArray = $objUser->GetTenPAssessmentArray();
	 		foreach($objArray as $objAssessment) {
	 			$objAssessment->Delete();
	 		}
	 		$objUser->UnassociateAllTenPAssessments();
	 		
			$objArray = $objUser->GetTenFAssessmentArray();
	 		foreach($objArray as $objAssessment) {
	 			$objAssessment->Delete();
	 		}
	 		$objUser->UnassociateAllTenFAssessments();
	 		
	 		$objUser->UnassociateAllCompanies();
	 		
			$objArray = $objUser->GetKingdomBusinessAssessmentArray();
	 		foreach($objArray as $objAssessment) {
	 			$objAssessment->Delete();
	 		} 	
	 		$objUser->UnassociateAllKingdomBusinessAssessments();
	 		$objUser->UnassociateAllLemonAssessments();
	 		$objUser->UnassociateAllLraAssessments();
	 		$objUser->UnassociateAllSeasonalAssessments();
	 		$objUser->UnassociateAllTenFAssessments();
	 		$objUser->UnassociateAllTenPAssessments();
	 		$objUser->UnassociateAllIntegrationAssessments();
	 		$objUser->UnassociateAllTimeAssessments();
	 		$objUser->UnassociateAllScorecards();
	 		$objUser->UnassociateAllResources();
	 		$objUser->Delete();
	 		$objLogin->Delete();	 		
		}
	
		QApplication::Redirect(__SUBDIRECTORY__.'/administration/users/');
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/administration/users/');
	}
}

MergeUsersForm::Run('MergeUsersForm');
?>