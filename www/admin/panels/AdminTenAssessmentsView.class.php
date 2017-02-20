<?php
	/** PHPExcel */
	require_once __INCLUDES__.'/Classes/PHPExcel.php';
	require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';
		
    class AdminTenAssessmentsView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
              
        public $dtgTenPAssessments;
		public $btnAddTenPAssessment;
		public $pnlAddTenPAssessment;
        
		public $dtgTenFAssessments;
		public $btnAddTenFAssessment;
		public $pnlAddTenFAssessment;										
		
		public $txtKeyCode;
		public $lblKeyCode;
		public $txtDescription;
		public $lblDescription;
		public $txtTotalKeys;
		public $lblTotalKeys;
		public $txtKeysLeft;
		public $lblKeysLeft;
		public $lstAssessmentType;
		
		public $flaSingleUpload;
		public $btnUploadSingleAssessment;
		public $txtGroupKeyCode;
		public $lblErrorMessage;
		
		public $flaDBUpload;
		public $btnUploadAssessmentDB;
		public $lblDBErrorMessage;
		public $lblDBInfoMessage;
		
		public $flaOnlineDBUpload;
		public $btnUploadOnlineAssessmentDB;
		public $lblOnlineDBErrorMessage;
		public $lblOnlineDBInfoMessage;
		
		
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminTenAssessmentsView.tpl.php';

 
        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            ini_set('memory_limit', '1024M'); 
            $this->lblErrorMessage = new QLabel($this);
            $this->lblErrorMessage->CssClass = 'errorMsg';
            $this->lblDBErrorMessage = new QLabel($this);
            $this->lblDBErrorMessage->CssClass = 'errorMsg';
            $this->lblOnlineDBErrorMessage = new QLabel($this);
            $this->lblOnlineDBErrorMessage->CssClass = 'errorMsg';
            
            $this->lblDBInfoMessage = new QLabel($this);
            $this->lblDBInfoMessage->HtmlEntities = false;
            $this->lblDBInfoMessage->Text = 'This may take some time. Please don\'t click the button more than once or you\'ll risk replicating the data.<br>';
            $this->lblDBInfoMessage->Text .= 'Simply check back later to see if the information has been uploaded.';
            $this->lblDBInfoMessage->Visible = false;
            
            $this->lblOnlineDBInfoMessage = new QLabel($this);
            $this->lblOnlineDBInfoMessage->HtmlEntities = false;
            $this->lblOnlineDBInfoMessage->Text = 'This may take some time. Please don\'t click the button more than once or you\'ll risk replicating the data.<br>';
            $this->lblOnlineDBInfoMessage->Text .= 'Simply check back later to see if the information has been uploaded.';
            $this->lblOnlineDBInfoMessage->Visible = false;
            
            $this->txtGroupKeyCode = new QTextBox($this);
            $this->txtGroupKeyCode->HtmlBefore = 'Enter Group Key Code to associate this assessment with: ';
            $this->btnUploadSingleAssessment = new QButton($this);
            $this->btnUploadSingleAssessment->CssClass = 'primary';
            $this->btnUploadSingleAssessment->Name = "Update Single Assessment to Database";
            $this->btnUploadSingleAssessment->Text = "Update Single Assessment to Database";
            $this->btnUploadSingleAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUploadSingleAssessment_Click'));
            
            $this->btnUploadAssessmentDB = new QButton($this);
            $this->btnUploadAssessmentDB->CssClass = 'primary';
            $this->btnUploadAssessmentDB->Name = "Update the selected Assessment Database to the Online Database";
            $this->btnUploadAssessmentDB->Text = "Update the selected Assessment Database to the Online Database";
            $this->btnUploadAssessmentDB->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUploadAssessmentDB_Click'));
            
            $this->btnUploadOnlineAssessmentDB = new QButton($this);
            $this->btnUploadOnlineAssessmentDB->CssClass = 'primary';
            $this->btnUploadOnlineAssessmentDB->Name = "Update the selected Assessment Database to the Online Database";
            $this->btnUploadOnlineAssessmentDB->Text = "Update the selected Assessment Database to the Online Database";
            $this->btnUploadOnlineAssessmentDB->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUploadOnlineAssessmentDB_Click'));
           
            // Define the sample QFileAssset control -- make it required to show off validation
            $this->flaSingleUpload = new QFileAsset($this);

            // Let's make the File Icon "clickable" -- allowing users to download / view the currently uploaded file
            // We need to do two things -- first, set a temporaryuploadpath that is within the docroot
            // and then we need to set ClickToView to true
            $this->flaSingleUpload->TemporaryUploadPath = __UPLOAD_DIR__;
            $this->flaSingleUpload->ClickToView = true;
    
            $this->flaDBUpload = new QFileAsset($this);
            $this->flaDBUpload->TemporaryUploadPath = __UPLOAD_DIR__;
            $this->flaDBUpload->ClickToView = true;
            
            $this->flaOnlineDBUpload = new QFileAsset($this);
            $this->flaOnlineDBUpload->TemporaryUploadPath = __UPLOAD_DIR__;
            $this->flaOnlineDBUpload->ClickToView = true;
            
            // Add Styling
            //$this->flaSingleUpload->CssClass = 'file_asset';
            //$this->flaSingleUpload->imgFileIcon->CssClass = 'file_asset_icon';
            
	        /********************************************/

	        $this->dtgTenPAssessments = new TenPAssessmentDataGrid($this);
            $this->dtgTenPAssessments->Paginator = new QPaginator($this->dtgTenPAssessments);
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkTenP($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Group', '<?= $_CONTROL->ParentControl->RenderTenPGroup($_ITEM) ?>', 'HtmlEntities=false' ));             
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgTenPAssessments->CellPadding = 5;
			$this->dtgTenPAssessments->SetDataBinder('dtgTenPAssessments_Bind',$this);
			$this->dtgTenPAssessments->NoDataHtml = 'No 10-P Assessments have been assigned.';
			$this->dtgTenPAssessments->UseAjax = true;
			
			$this->dtgTenPAssessments->SortColumnIndex = 1;
			$this->dtgTenPAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgTenPAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgTenPAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgTenPAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgTenPAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddTenPAssessment = new QButton($this);
	        $this->btnAddTenPAssessment->Text = 'Add A User';
	        $this->btnAddTenPAssessment->CssClass = 'primary';
	        $this->btnAddTenPAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddTenPAssessment_Click'));
          
	        $this->pnlAddTenPAssessment = new QPanel($this);
	        $this->pnlAddTenPAssessment->Position = QPosition::Relative;
	        $this->pnlAddTenPAssessment->Visible = false;
	        $this->pnlAddTenPAssessment->AutoRenderChildren = true;
	        /*******************************/
	        $this->dtgTenFAssessments = new TenFAssessmentDataGrid($this);
            $this->dtgTenFAssessments->Paginator = new QPaginator($this->dtgTenFAssessments);
            $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkTenF($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Group', '<?= $_CONTROL->ParentControl->RenderTenFGroup($_ITEM) ?>', 'HtmlEntities=false' ));
            $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgTenFAssessments->CellPadding = 5;
			$this->dtgTenFAssessments->SetDataBinder('dtgTenFAssessments_Bind',$this);
			$this->dtgTenFAssessments->NoDataHtml = 'No 10-F Assessments have been assigned.';
			$this->dtgTenFAssessments->UseAjax = true;
			
			$this->dtgTenFAssessments->SortColumnIndex = 1;
			$this->dtgTenFAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgTenFAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgTenFAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgTenFAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgTenFAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddTenFAssessment = new QButton($this);
	        $this->btnAddTenFAssessment->Text = 'Add A User';
	        $this->btnAddTenFAssessment->CssClass = 'primary';
	        $this->btnAddTenFAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddTenFAssessment_Click'));
          
	        $this->pnlAddTenFAssessment = new QPanel($this);
	        $this->pnlAddTenFAssessment->Position = QPosition::Relative;
	        $this->pnlAddTenFAssessment->Visible = false;
	        $this->pnlAddTenFAssessment->AutoRenderChildren = true;
	        /***************************************************************/	     
	        
        }
        
        public function btnUploadOnlineAssessmentDB_Click() {
        	if ($this->flaOnlineDBUpload->File == null) {
       			$this->lblOnlineDBErrorMessage->Text = 'You must upload a DB file first';
       			return;
       		}
       		$this->lblOnlineDBInfoMessage->Visible = true;
	        $objPHPExcel = PHPExcel_IOFactory::load($this->flaOnlineDBUpload->File);
        	$worksheet = $objPHPExcel->getActiveSheet();
			$bIsData = true;
			$row = 2; // starting point of data
			while($bIsData) {
				$name = $worksheet->getCell("A".$row)->getValue();
				$L = $worksheet->getCell("B".$row)->getValue();
				$E = $worksheet->getCell("C".$row)->getValue();
				$M = $worksheet->getCell("D".$row)->getValue();
				$O = $worksheet->getCell("E".$row)->getValue();
				$N = $worksheet->getCell("F".$row)->getValue();
				$email = $worksheet->getCell("G".$row)->getValue();
				$sex = $worksheet->getCell("H".$row)->getValue();
				$country = $worksheet->getCell("I".$row)->getValue();
				if ($country == "USA")
					$country = 'United States Of America';
				$company = $worksheet->getCell("J".$row)->getValue();
				
				// Upload to the DB
				// 1) Create a user if one does not already exist
				$nameArray = explode(" ",trim($name));
				$objLogin = new Login();
				if(count($nameArray)>1){
					$objLogin->Username = $nameArray[1].'_generatedOnline';
					$objLogin->Password = $nameArray[1].'_generatedOnline';
				} else {
					$objLogin->Username = $nameArray[0].'_generatedOnline';
					$objLogin->Password = $nameArray[0].'_generatedOnline';
				}
				$objLogin->RoleId = Role::LoadByName("User")->Id;
				$intLoginId = $objLogin->Save();
				
				$objUser = new User();
				$objUser->FirstName = $nameArray[0];
				$objUser->LastName = (count($nameArray)>1)? $nameArray[1] : ' ';
				$objUser->Email = $email;
				$objCountry = CountryList::LoadByName($country);
				$objUser->CountryId = ($objCountry)? $objCountry->Id : null;
				
				if($sex == 'M')
					$objUser->Gender = 1;
				else
					$objUser->Gender = 0;
					
				$objUser->LoginId = $intLoginId;
				$intUserId = $objUser->Save();
		
				// 2) Create Company if it doesn't exist
				$objCompanyArray  = Company::LoadArrayByName($company);
				$intCompanyId = 0;
				if(!empty($objCompanyArray)) {
			    	$intCompanyId = $objCompanyArray[0]->Id;
				} else {
					$objCompany = new Company();
					$objCompany->Name = $company;
					$intCompanyId = $objCompany->Save();
				}
				// 2) Create a lemon assessment object, associating with the right user Id
				$objAssessment = new LemonAssessment();
				$objAssessment->UserId = $intUserId;
			    $objAssessment->ResourceId = 5; //LemonAssessment - going to have to find a nicer way of doing this
			    $objAssessment->ResourceStatusId = 2; // set state to touched
			    $objAssessment->CompanyId = $intCompanyId;
			    // Check to see if a group with Company name exists
			    $objGroupArray = GroupAssessmentList::LoadArrayByKeyCode($company);
			    if(!empty($objGroupArray)) {
			    	$bfound = false;
			    	foreach($objGroupArray as $objGroup) {
			    		if($objGroup->ResourceId == 5) {
			    			$objAssessment->GroupId = $objGroup->Id;
			    			$bfound = true;
			    			break;
			    		}
			    	}
			    	if(!$bfound) {
			    		$objGroup = new GroupAssessmentList();
				    	$objGroup->KeyCode = $company;
				    	$objGroup->ResourceId = 5;
				    	$intGroupId = $objGroup->Save();
				    	$objAssessment->GroupId = $intGroupId;
			    	}
			    } else {
			    	$objGroup = new GroupAssessmentList();
			    	$objGroup->KeyCode = $company;
			    	$objGroup->ResourceId = 5;
			    	$intGroupId = $objGroup->Save();
			    	$objAssessment->GroupId = $intGroupId;
			    }
			    $objAssessment->L = round($L);
			    $objAssessment->E = round($E);
			    $objAssessment->M = round($M);
			    $objAssessment->O = round($O);
			    $objAssessment->N = round($N);
			    $objUser = User::Load($intUserId);
			    $objUser->AssociateResource(Resource::Load(5));
				$intAssessmentId = $objAssessment->Save();
			
				$row++;
				if(($worksheet->getCell("B".$row) == NULL) || ($worksheet->getCell("B".$row)->getValue() == null))
					$bIsData = false;		
			}
        }
        
        public function btnUploadAssessmentDB_Click() {
       		if ($this->flaDBUpload->File == null) {
       			$this->lblDBErrorMessage->Text = 'You must upload a DB file first';
       			return;
       		}
       		$this->lblDBInfoMessage->Visible = true;
	        $objPHPExcel = PHPExcel_IOFactory::load($this->flaDBUpload->File);
			$worksheet = $objPHPExcel->getActiveSheet();
			$bIsData = true;
			$row = 18; // starting point of data
			while($bIsData) {
				$name = $worksheet->getCell("B".$row)->getValue();
				$L = $worksheet->getCell("C".$row)->getValue();
				$E = $worksheet->getCell("D".$row)->getValue();
				$M = $worksheet->getCell("E".$row)->getValue();
				$O = $worksheet->getCell("F".$row)->getValue();
				$N = $worksheet->getCell("G".$row)->getValue();
				$email = $worksheet->getCell("R".$row)->getValue();
				$sex = $worksheet->getCell("S".$row)->getValue();
				$country = trim($worksheet->getCell("T".$row)->getValue());
				// Put some conversion checks in here.. specifically for the US.
				if ($country == "USA")
					$country = 'United States Of America';
				$company = $worksheet->getCell("U".$row)->getValue();
				
				// Upload to the DB
				// 1) Create a user if one does not already exist
				$nameArray = explode(" ",trim($name));
				$objLogin = new Login();
				if(count($nameArray)>1){
					$objLogin->Username = $nameArray[1].'_generated';
					$objLogin->Password = $nameArray[1].'_generated';
				} else {
					$objLogin->Username = $nameArray[0].'_generated';
					$objLogin->Password = $nameArray[0].'_generated';
				}
				$objLogin->RoleId = Role::LoadByName("User")->Id;
				$intLoginId = $objLogin->Save();
				
				$objUser = new User();
				$objUser->FirstName = $nameArray[0];
				$objUser->LastName = (count($nameArray)>1)? $nameArray[1] : ' ';
				$objUser->Email = $email;
				$objCountry = CountryList::LoadByName($country);
				$objUser->CountryId = ($objCountry)? $objCountry->Id : null;
				
				if($sex == 'M')
					$objUser->Gender = 1;
				else
					$objUser->Gender = 0;
					
				$objUser->LoginId = $intLoginId;
				$intUserId = $objUser->Save();
		
				// 2) Create Company if it doesn't exist
				$objCompanyArray  = Company::LoadArrayByName($company);
				$intCompanyId = 0;
				if(!empty($objCompanyArray)) {
			    	$intCompanyId = $objCompanyArray[0]->Id;
				} else {
					$objCompany = new Company();
					$objCompany->Name = $company;
					$intCompanyId = $objCompany->Save();
				}
				// 2) Create a lemon assessment object, associating with the right user Id
				$objAssessment = new LemonAssessment();
				$objAssessment->UserId = $intUserId;
			    $objAssessment->ResourceId = 5; //LemonAssessment - going to have to find a nicer way of doing this
			    $objAssessment->ResourceStatusId = 2; // set state to touched
			    $objAssessment->CompanyId = $intCompanyId;
			    // Check to see if a group with Copany name exists
			    $objGroupArray = GroupAssessmentList::LoadArrayByKeyCode($company);
			    if(!empty($objGroupArray)) {
			    	$bfound = false;
			    	foreach($objGroupArray as $objGroup) {
			    		if($objGroup->ResourceId == 5) {
			    			$objAssessment->GroupId = $objGroup->Id;
			    			$bfound = true;
			    			break;
			    		}
			    	}
			    	if(!$bfound) {
			    		$objGroup = new GroupAssessmentList();
				    	$objGroup->KeyCode = $company;
				    	$objGroup->ResourceId = 5;
				    	$intGroupId = $objGroup->Save();
				    	$objAssessment->GroupId = $intGroupId;
			    	}
			    } else {
			    	$objGroup = new GroupAssessmentList();
			    	$objGroup->KeyCode = $company;
			    	$objGroup->ResourceId = 5;
			    	$intGroupId = $objGroup->Save();
			    	$objAssessment->GroupId = $intGroupId;
			    }
			    $objAssessment->L = round($L);
			    $objAssessment->E = round($E);
			    $objAssessment->M = round($M);
			    $objAssessment->O = round($O);
			    $objAssessment->N = round($N);
			    $objUser = User::Load($intUserId);
			    $objUser->AssociateResource(Resource::Load(5));
				$intAssessmentId = $objAssessment->Save();
			
				$row++;
				if(($worksheet->getCell("B".$row) == NULL) || ($worksheet->getCell("B".$row)->getValue() == null))
					$bIsData = false;		
			}
			// zero the flaDBUpload upon completion.
			$this->flaDBUpload = new QFileAsset($this);
        }
        
        public function btnUploadSingleAssessment_Click() {
       		if ($this->flaSingleUpload->File == null) {
       			$this->lblErrorMessage->Text = 'You must upload a file first';
       			return;
       		}
	        $objPHPExcel = PHPExcel_IOFactory::load($this->flaSingleUpload->File);
			$worksheet = $objPHPExcel->getSheetByName("Personal Assessment");
			// Get Name
			$name = $worksheet->getCell("B3")->getValue();
			
			// Get Title
			$title = $worksheet->getCell("B4")->getValue();
			
			// Get Tenure
			$tenure = $worksheet->getCell("I4")->getValue();
			
			// Get Email
			$email = $worksheet->getCell("B6")->getValue();
			
			$L = $worksheet->getCell("P3")->getCalculatedValue();
			$E = $worksheet->getCell("Q3")->getCalculatedValue();
			$M = $worksheet->getCell("R3")->getCalculatedValue();
			$O = $worksheet->getCell("S3")->getCalculatedValue();
			$N = $worksheet->getCell("T3")->getCalculatedValue();
	 
			// The initial starting point to grab all the results of each question
			$col = 13;
			$results = array();
			for($row=14; $row <(14+75); $row++) {
				$results[] = $worksheet->getCell("N".$row)->getCalculatedValue();
			}
		
			// Now to upload to the database.
			// 1) Create a user if one does not already exist
			$nameArray = explode(" ",trim($name));
			$objLogin = new Login();
			$objLogin->Username = $nameArray[1].'_generated';
			$objLogin->Password = $nameArray[1].'_generated';
			$objLogin->RoleId = Role::LoadByName("User")->Id;
			$intLoginId = $objLogin->Save();
			
			$objUser = new User();
			$objUser->FirstName = $nameArray[0];
			$objUser->LastName = $nameArray[1];
			$objUser->Email = $email;
			
			if($tenure > 7)
				$objUser->TenureId = 3;
			else if($tenure > 4)
				$objUser->TenureId = 2;
			else 
				$objUser->TenureId = 1;
		
			$objUser->LoginId = $intLoginId;
			$intUserId = $objUser->Save();
				
			// 2) Create a lemon assessment object, associating with the right user Id
			$objAssessment = new LemonAssessment();
			$objAssessment->UserId = $intUserId;
		    $objAssessment->ResourceId = 5; //LemonAssessment - going to have to find a nicer way of doing this
		    $objAssessment->ResourceStatusId = 2; // set state to touched
		    $objAssessment->L = $L;
		    $objAssessment->E = $E;
		    $objAssessment->M = $M;
		    $objAssessment->O = $O;
		    $objAssessment->N = $N;
		    $objGroupArray = GroupAssessmentList::LoadArrayByKeyCode($this->txtGroupKeyCode->Text);
		    if(!empty($objGroupArray)) {
		    	$bfound = false;
		    	foreach($objGroupArray as $objGroup) {
		    		if($objGroup->ResourceId == 5) {
		    			$objAssessment->GroupId = $objGroup->Id;
		    			$bfound = true;
		    			break;
		    		}
		    	}
		    	if(!$bfound) {
		    		$objGroup = new GroupAssessmentList();
			    	$objGroup->KeyCode = $this->txtGroupKeyCode->Text;
			    	$objGroup->ResourceId = 5;
			    	$intGroupId = $objGroup->Save();
			    	$objAssessment->GroupId = $intGroupId;
		    	}
		    } else {
		    	$objGroup = new GroupAssessmentList();
		    	$objGroup->KeyCode = $this->txtGroupKeyCode->Text;
		    	$objGroup->ResourceId = 5;
		    	$intGroupId = $objGroup->Save();
		    	$objAssessment->GroupId = $intGroupId;
		    }
		    $objUser = User::Load($intUserId);
		    $objUser->AssociateResource(Resource::Load(5));
			$intAssessmentId = $objAssessment->Save();
			
			// 3) Create a LEMON Results object.
			$resultcount = count($results);
			for($i=0;$i<$resultcount; $i++) {	    
			    $objResults = new LemonAssessmentResults();	    
			    $objResults->AssessmentId = $intAssessmentId;  
			    $objResults->Value =  $results[$i];
			    $objResults->QuestionId = $i+1;
			    $objResults->Save(); 
		    }      		
        }
		
    	public function dtgTenPAssessments_Bind() {
			$this->dtgTenPAssessments->TotalItemCount = TenPAssessment::CountAll();
    		$objConditions = QQ::All();
			$objClauses = array();
			$TenPArray = TenPAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgTenPAssessments->DataSource = $TenPArray; 
		}
	
    	public function dtgTenFAssessments_Bind() {
			$this->dtgTenFAssessments->TotalItemCount = TenFAssessment::CountAll();
    		$objConditions = QQ::All();
			$objClauses = array();
			$TenPArray = TenFAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgTenFAssessments->DataSource = $TenPArray; 
		}
							
		public function RenderCompany($intCompanyId) {
			$objCompany = Company::Load($intCompanyId);
			if (null != $objCompany)
				return $objCompany->Name;
			else 
				return 'No Company';
		}
        
    	public function RenderUser($intUserId) {
    		$objUser = User::Load($intUserId);
			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
		}
		
    	public function RenderUserLinkKingdom($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/kingdom/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__, $intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}

    	public function RenderUserLinkTenP($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/tenp/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
    	public function RenderTenFGroup(TenFAssessment $objTenF) {
			$strControlId = 'lstTenFGroup' . $objTenF->Id;
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgTenFAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(3) as $objGroup) {					
						if($objTenF->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objTenF->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstTenFGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstTenFGroup_Change($strFormId, $strControlId, $strParameter) {
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if ($lstGroupType != null){
				$objTenFAssessment = TenFAssessment::Load($strParameter);
				if($lstGroupType->SelectedValue == 0)
					$objTenFAssessment->GroupId = null;
				else
					$objTenFAssessment->GroupId = $lstGroupType->SelectedValue;
				$objTenFAssessment->Save();
			}
			$this->dtgTenFAssessments->Refresh();
		}
		
		public function RenderTenPGroup(TenPAssessment $objTenP) {
			$strControlId = 'lstTenPGroup' . $objTenP->Id;
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgTenPAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- None Selected --', 0);
				foreach(GroupAssessmentList::LoadArrayByResourceId(2) as $objGroup) {					
						if($objTenP->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objTenP->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstTenPGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
		public function lstTenPGroup_Change($strFormId, $strControlId, $strParameter) {
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if ($lstGroupType != null){
				$objTenPAssessment = TenPAssessment::Load($strParameter);
				if($lstGroupType->SelectedValue == 0)
					$objTenPAssessment->GroupId = null;
				else
					$objTenPAssessment->GroupId = $lstGroupType->SelectedValue;
				$objTenPAssessment->Save();
			}
			$this->dtgTenPAssessments->Refresh();
		}
	/*
		public function RenderAssessmentType($objGroupAssessment) {
			$intResourceId = $objGroupAssessment->ResourceId;
			$strControlId = 'lstAssessmentType' . $objGroupAssessment->Id;
			$lstAssessmentType = $this->objForm->GetControl($strControlId);
			if(!$lstAssessmentType) {
				$lstAssessmentType = new QListBox($this->dtgGroupAssessments,$strControlId);
				$lstAssessmentType->Name = 'AssessmentType';
				foreach(Resource::LoadAll() as $objResource) {
					if($objResource->Name != 'Scorecard') {
						if($intResourceId == $objResource->Id)
							$lstAssessmentType->AddItem($objResource->Name, $objResource->Id,true);
						else 
							$lstAssessmentType->AddItem($objResource->Name, $objResource->Id);
					}
				}			
				$lstAssessmentType->ActionParameter = $objGroupAssessment->Id;
				$lstAssessmentType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstAssessmentType_Change'));
			}
			return $lstAssessmentType->Render(false);
		}
		public function lstAssessmentType_Change($strFormId, $strControlId, $strParameter) {
			$lstAssessmentType = $this->objForm->GetControl($strControlId);
			if ($lstAssessmentType != null){
				$objGroupAssessment = GroupAssessmentList::Load($strParameter);
				$objGroupAssessment->ResourceId = $lstAssessmentType->SelectedValue;
				$objGroupAssessment->Save();
			}
			$this->dtgGroupAssessments->Refresh();
		}
		public function RenderAssessmentManager(GroupAssessmentList $objGroupAssessment) {
			$strControlId = 'lstAssessmentManager' . $objGroupAssessment->Id;
			$lstAssessmentManager = $this->objForm->GetControl($strControlId);
			if(!$lstAssessmentManager) {
				$lstAssessmentManager = new QListBox($this->dtgGroupAssessments,$strControlId);
				$lstAssessmentManager->Name = 'AssessmentManager';
				$lstAssessmentManager->AddItem('-Non Selected-', 0);
				$objConditions = QQ::OrCondition(QQ::Equal( QQN::User()->Login->Role->Name, 'Administrator'),
					QQ::Equal( QQN::User()->Login->Role->Name, 'Company Manager'));
				$objConditions = QQ::OrCondition($objConditions,
					QQ::Equal( QQN::User()->Login->Role->Name, 'Manager'));
				foreach(User::QueryArray($objConditions) as $objUser) {
					if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUser)) 
							$lstAssessmentManager->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id,true);
						else 
							$lstAssessmentManager->AddItem($objUser->FirstName.' '.$objUser->LastName, $objUser->Id);	
				}			
				$lstAssessmentManager->ActionParameter = $objGroupAssessment->Id;
				$lstAssessmentManager->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstAssessmentManager_Change'));
			}
			return $lstAssessmentManager->Render(false);
		}
    	public function lstAssessmentManager_Change($strFormId, $strControlId, $strParameter) {
			$lstAssessmentManager = $this->objForm->GetControl($strControlId);
			if ($lstAssessmentManager != null){
				if ($lstAssessmentManager->SelectedValue != 0) {
					$objGroupAssessment = GroupAssessmentList::Load($strParameter);
					$objUser = User::Load($lstAssessmentManager->SelectedValue);
					$objGroupAssessment->AssociateUserAsAssessmentManager($objUser);
					$objGroupAssessment->Save();
				}
			}
			$this->dtgGroupAssessments->Refresh();
		}
	*/	
    	public function RenderUserLinkTenF($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/tenf/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
		public function RenderUserLinkLRA($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/lra/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderUserLinkUpward($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/upward/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderUserLinkIntegration($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/integration/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		
    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
	  
    	public function btnAddTenPAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTenPAssessment->Visible = true;
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);	       
	        $pnlAddTenPView = new AddTenPAssessment($this->pnlAddTenPAssessment,'UpdateTenPAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTenPAssessmentList($blnUpdatesMade) {
	    	$this->dtgTenPAssessments->PageNumber = 1;
			$this->dtgTenPAssessments->Refresh();
	    }
	    
    	public function btnAddTenFAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTenFAssessment->Visible = true;
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddUpwardAssessment->RemoveChildControls(true);
	        $pnlAddTenFView = new AddTenFAssessment($this->pnlAddTenFAssessment,'UpdateTenFAssessmentList',$this);		
		}
				
    	public function btnAddUpwardAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddUpwardAssessment->Visible = true;
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $this->pnlAddUpwardAssessment->RemoveChildControls(true);
	        $pnlAddUpwardView = new AddUpwardAssessment($this->pnlAddUpwardAssessment,'UpdateUpwardAssessmentList',$this);
		
		}
			    
	    
	    // Method Call back for the  panels 
	    public function UpdateTenFAssessmentList($blnUpdatesMade) {
	    	$this->dtgTenFAssessments->PageNumber = 1;
			$this->dtgTenFAssessments->Refresh();
	    }
	    
    	public function btnAddIntegrationAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddIntegrationAssessment->Visible = true;
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $pnlAddIntegrationView = new AddIntegrationAssessment($this->pnlAddIntegrationAssessment,'UpdateIntegrationAssessmentList',$this);
		
		}
			    
    	public function btnAddSeasonalAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddSeasonalAssessment->Visible = true;
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $pnlAddSeasonalView = new AddSeasonalAssessment($this->pnlAddSeasonalAssessment,'UpdateSeasonalAssessmentList',$this);
		
		}
			    
    	public function btnAddTimeAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTimeAssessment->Visible = true;
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $pnlAddTimeView = new AddTimeAssessment($this->pnlAddTimeAssessment,'UpdateTimeAssessmentList',$this);
		
		}
		
    	public function btnAddLemonAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Lemon Assessments
	        $this->pnlAddLemonAssessment->Visible = true;
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $pnlAddLemonView = new AddLemonAssessment($this->pnlAddLemonAssessment,'UpdateLemonAssessmentList',$this);	
		}
				

    	// For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
    	// Need to initialize the jquery tab here.
		public function GetEndScript() {
			$strToReturn = parent::GetEndScript();
			$strToReturn .= '$( "#tabs" ).tabs();';
			return $strToReturn;
		}
    }