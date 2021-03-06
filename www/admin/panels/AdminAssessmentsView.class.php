<?php
	/** PHPExcel */
	require_once __INCLUDES__.'/Classes/PHPExcel.php';
	require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';
		
    class AdminAssessmentsView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $dtgKingdomBizAssessments;
        public $btnAddKingdomBizAssessment;
        public $pnlAddKingdomAssessment;
              		
		public $dtgIntegrationAssessments;
		public $btnAddIntegrationAssessment;
		public $pnlAddIntegrationAssessment;
		
		public $dtgSeasonalAssessments;
		public $btnAddSeasonalAssessment;
		public $pnlAddSeasonalAssessment;
		
		public $dtgTimeAssessments;
		public $btnAddTimeAssessment;
		public $pnlAddTimeAssessment;
		
		public $btnAddGroupAssessment;
		public $pnlAddGroupAssessment;
		public $strKeycode;
		public $lstSearchAssessmentType;
		public $btnSearch;
		
		public $dtgLRAAssessments;
		public $btnAddLRAAssessment;
		public $pnlAddLRAAssessment;
		
		public $dtgUpwardAssessments;
		public $btnAddUpwardAssessment;
		public $pnlAddUpwardAssessment;
		
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
        protected $strTemplate = 'panels/AdminAssessmentsView.tpl.php';

 
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
            
            $this->dtgKingdomBizAssessments = new KingdomBusinessAssessmentDataGrid($this);
            $this->dtgKingdomBizAssessments->Paginator = new QPaginator($this->dtgKingdomBizAssessments);
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkKingdom($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgKingdomBizAssessments->CellPadding = 5;
			$this->dtgKingdomBizAssessments->SetDataBinder('dtgKingdomBizAssessments_Bind',$this);
			$this->dtgKingdomBizAssessments->NoDataHtml = 'No Kingdom Business Assessments have been assigned.';
			$this->dtgKingdomBizAssessments->UseAjax = true;
			
			$this->dtgKingdomBizAssessments->SortColumnIndex = 1;
			$this->dtgKingdomBizAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgKingdomBizAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgKingdomBizAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgKingdomBizAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgKingdomBizAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddKingdomBizAssessment = new QButton($this);
	        $this->btnAddKingdomBizAssessment->Text = 'Add A User';
	        $this->btnAddKingdomBizAssessment->CssClass = 'primary';
	        $this->btnAddKingdomBizAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddKingdomBizAssessment_Click'));
          
	        $this->pnlAddKingdomAssessment = new QPanel($this);
	        $this->pnlAddKingdomAssessment->Position = QPosition::Relative;
	        $this->pnlAddKingdomAssessment->Visible = false;
	        $this->pnlAddKingdomAssessment->AutoRenderChildren = true;
      		/***************************************************************/
	     
	        $this->dtgIntegrationAssessments = new IntegrationAssessmentDataGrid($this);
            $this->dtgIntegrationAssessments->Paginator = new QPaginator($this->dtgIntegrationAssessments);
            $this->dtgIntegrationAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkIntegration($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgIntegrationAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgIntegrationAssessments->CellPadding = 5;
			$this->dtgIntegrationAssessments->SetDataBinder('dtgIntegrationAssessments_Bind',$this);
			$this->dtgIntegrationAssessments->NoDataHtml = 'No Integration Assessments have been assigned.';
			$this->dtgIntegrationAssessments->UseAjax = true;
			
			$this->dtgIntegrationAssessments->SortColumnIndex = 1;
			$this->dtgIntegrationAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgIntegrationAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgIntegrationAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgIntegrationAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgIntegrationAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddIntegrationAssessment = new QButton($this);
	        $this->btnAddIntegrationAssessment->Text = 'Add A User';
	        $this->btnAddIntegrationAssessment->CssClass = 'primary';
	        $this->btnAddIntegrationAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddIntegrationAssessment_Click'));
          
	        $this->pnlAddIntegrationAssessment = new QPanel($this);
	        $this->pnlAddIntegrationAssessment->Position = QPosition::Relative;
	        $this->pnlAddIntegrationAssessment->Visible = false;
	        $this->pnlAddIntegrationAssessment->AutoRenderChildren = true;
	        
	        /***************************************************************/
	     
	        $this->dtgSeasonalAssessments = new SeasonalAssessmentDataGrid($this);
            $this->dtgSeasonalAssessments->Paginator = new QPaginator($this->dtgSeasonalAssessments);
            $this->dtgSeasonalAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkIntegration($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgSeasonalAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgSeasonalAssessments->CellPadding = 5;
			$this->dtgSeasonalAssessments->SetDataBinder('dtgSeasonalAssessments_Bind',$this);
			$this->dtgSeasonalAssessments->NoDataHtml = 'No Seasonal Assessments have been assigned.';
			$this->dtgSeasonalAssessments->UseAjax = true;
			
			$this->dtgSeasonalAssessments->SortColumnIndex = 1;
			$this->dtgSeasonalAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgSeasonalAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgSeasonalAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgSeasonalAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgSeasonalAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddSeasonalAssessment = new QButton($this);
	        $this->btnAddSeasonalAssessment->Text = 'Add A User';
	        $this->btnAddSeasonalAssessment->CssClass = 'primary';
	        $this->btnAddSeasonalAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddSeasonalAssessment_Click'));
          
	        $this->pnlAddSeasonalAssessment = new QPanel($this);
	        $this->pnlAddSeasonalAssessment->Position = QPosition::Relative;
	        $this->pnlAddSeasonalAssessment->Visible = false;
	        $this->pnlAddSeasonalAssessment->AutoRenderChildren = true;
	        
	         /***************************************************************/
	     
	        $this->dtgTimeAssessments = new TimeAssessmentDataGrid($this);
            $this->dtgTimeAssessments->Paginator = new QPaginator($this->dtgTimeAssessments);
            $this->dtgTimeAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkIntegration($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTimeAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgTimeAssessments->CellPadding = 5;
			$this->dtgTimeAssessments->SetDataBinder('dtgTimeAssessments_Bind',$this);
			$this->dtgTimeAssessments->NoDataHtml = 'No Where Does The Time Go Assessments have been assigned.';
			$this->dtgTimeAssessments->UseAjax = true;
			
			$this->dtgTimeAssessments->SortColumnIndex = 1;
			$this->dtgTimeAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgTimeAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgTimeAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgTimeAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgTimeAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddTimeAssessment = new QButton($this);
	        $this->btnAddTimeAssessment->Text = 'Add A User';
	        $this->btnAddTimeAssessment->CssClass = 'primary';
	        $this->btnAddTimeAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddTimeAssessment_Click'));
          
	        $this->pnlAddTimeAssessment = new QPanel($this);
	        $this->pnlAddTimeAssessment->Position = QPosition::Relative;
	        $this->pnlAddTimeAssessment->Visible = false;
	        $this->pnlAddTimeAssessment->AutoRenderChildren = true;
	        
	        /***************************************************************/
	        $this->dtgLRAAssessments = new LRAAssessmentDataGrid($this);
            $this->dtgLRAAssessments->Paginator = new QPaginator($this->dtgLRAAssessments);
            $this->dtgLRAAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkLRA($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgLRAAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgLRAAssessments->CellPadding = 5;
			$this->dtgLRAAssessments->SetDataBinder('dtgLRAAssessments_Bind',$this);
			$this->dtgLRAAssessments->NoDataHtml = 'No Leadership Readiness Assessments have been assigned.';
			$this->dtgLRAAssessments->UseAjax = true;
			
			$this->dtgLRAAssessments->SortColumnIndex = 1;
			$this->dtgLRAAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgLRAAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgLRAAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgLRAAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgLRAAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddLRAAssessment = new QButton($this);
	        $this->btnAddLRAAssessment->Text = 'Add A User';
	        $this->btnAddLRAAssessment->CssClass = 'primary';
	        $this->btnAddLRAAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddLRAAssessment_Click'));
          
	        $this->pnlAddLRAAssessment = new QPanel($this);
	        $this->pnlAddLRAAssessment->Position = QPosition::Relative;
	        $this->pnlAddLRAAssessment->Visible = false;
	        $this->pnlAddLRAAssessment->AutoRenderChildren = true;
	        
	        /***************************************************************/
	        $this->dtgUpwardAssessments = new UpwardAssessmentDataGrid($this);
            $this->dtgUpwardAssessments->Paginator = new QPaginator($this->dtgUpwardAssessments);
            $this->dtgUpwardAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkUpward($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgUpwardAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgUpwardAssessments->CellPadding = 5;
			$this->dtgUpwardAssessments->SetDataBinder('dtgUpwardAssessments_Bind',$this);
			$this->dtgUpwardAssessments->NoDataHtml = 'No Education 8-P Assessments have been assigned.';
			$this->dtgUpwardAssessments->UseAjax = true;
			
			$this->dtgUpwardAssessments->SortColumnIndex = 1;
			$this->dtgUpwardAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgUpwardAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgUpwardAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgUpwardAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgUpwardAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddUpwardAssessment = new QButton($this);
	        $this->btnAddUpwardAssessment->Text = 'Add A User';
	        $this->btnAddUpwardAssessment->CssClass = 'primary';
	        $this->btnAddUpwardAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddUpwardAssessment_Click'));
          
	        $this->pnlAddUpwardAssessment = new QPanel($this);
	        $this->pnlAddUpwardAssessment->Position = QPosition::Relative;
	        $this->pnlAddUpwardAssessment->Visible = false;
	        $this->pnlAddUpwardAssessment->AutoRenderChildren = true;
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

    	public function dtgKingdomBizAssessments_Bind() {
			$this->dtgKingdomBizAssessments->TotalItemCount = KingdomBusinessAssessment::CountAll();
			$objConditions = QQ::All();
			$objClauses = array();
			$KingdomBizArray = KingdomBusinessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgKingdomBizAssessments->DataSource = $KingdomBizArray; 
		}
		
		public function dtgLRAAssessments_Bind() {
			$this->dtgLRAAssessments->TotalItemCount = LraAssessment::CountAll();
    		$objConditions = QQ::All();
			$objClauses = array();
			$lraArray = LraAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgLRAAssessments->DataSource = $lraArray; 
		}
		
    	public function dtgUpwardAssessments_Bind() {
			$this->dtgUpwardAssessments->TotalItemCount = UpwardAssessment::CountAll();
    		$objConditions = QQ::All();
			$objClauses = array();
			$UpwardArray = UpwardAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgUpwardAssessments->DataSource = $UpwardArray; 
		}
		
    	public function dtgIntegrationAssessments_Bind() {
			$this->dtgIntegrationAssessments->TotalItemCount = IntegrationAssessment::CountAll();
    		$objConditions = QQ::All();	
			$this->dtgIntegrationAssessments->DataSource = IntegrationAssessment::QueryArray($objConditions); 
		}
		
		public function dtgSeasonalAssessments_Bind() {
			$this->dtgSeasonalAssessments->TotalItemCount = SeasonalAssessment::CountAll();
    		$objConditions = QQ::All();	
			$this->dtgSeasonalAssessments->DataSource = SeasonalAssessment::QueryArray($objConditions); 
		}
		
    	public function dtgTimeAssessments_Bind() {
			$this->dtgTimeAssessments->TotalItemCount = TimeAssessment::CountAll();
    		$objConditions = QQ::All();	
			$this->dtgTimeAssessments->DataSource = TimeAssessment::QueryArray($objConditions); 
		}
		
/*		
    	public function dtgGroupAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgGroupAssessments->PageNumber = 1;
			$this->dtgGroupAssessments->Refresh();
		}
		public function dtgGroupAssessments_Bind() {
			$this->dtgGroupAssessments->TotalItemCount = GroupAssessmentList::CountAll();
			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgGroupAssessments->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgGroupAssessments->OrderByClause) $objClauses[] = $objClause;
			
		    $objConditions = QQ::All(); 
			if ($strName = trim($this->strKeycode->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::GroupAssessmentList()->KeyCode, $strName . '%')
				);
			}
			if ($this->lstSearchAssessmentType->SelectedValue) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::GroupAssessmentList()->ResourceId, $this->lstSearchAssessmentType->SelectedValue)
				);
			}
			$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);		
			$this->dtgGroupAssessments->DataSource = $groupArray; 
		}
*/	
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
		
    	public function btnAddKingdomBizAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddKingdomAssessment->Visible = true;
	        $this->pnlAddGroupAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddUpwardAssessment->RemoveChildControls(true);
	        $pnlAddKingdomView = new AddKingdomAssessment($this->pnlAddKingdomAssessment,'UpdateAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateAssessmentList($blnUpdatesMade) {
	    	$this->dtgKingdomBizAssessments->PageNumber = 1;
			$this->dtgKingdomBizAssessments->Refresh();
	    }
	      	
		public function btnAddLRAAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddLRAAssessment->Visible = true;
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $this->pnlAddUpwardAssessment->RemoveChildControls(true);
	        $pnlAddLRAView = new AddLRAAssessment($this->pnlAddLRAAssessment,'UpdateLRAAssessmentList',$this);
		
		}
		
    	public function btnAddUpwardAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddUpwardAssessment->Visible = true;
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $this->pnlAddUpwardAssessment->RemoveChildControls(true);
	        $pnlAddUpwardView = new AddUpwardAssessment($this->pnlAddUpwardAssessment,'UpdateUpwardAssessmentList',$this);
		
		}
   	 // Method Call back for the  panels 
	    public function UpdateLRAAssessmentList($blnUpdatesMade) {
	    	$this->dtgLRAAssessments->PageNumber = 1;
			$this->dtgLRAAssessments->Refresh();
	    }
	    
    	public function UpdateUpwardAssessmentList($blnUpdatesMade) {
	    	$this->dtgUpwardAssessments->PageNumber = 1;
			$this->dtgUpwardAssessments->Refresh();
	    }
	        
    	public function btnAddIntegrationAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddIntegrationAssessment->Visible = true;
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $pnlAddIntegrationView = new AddIntegrationAssessment($this->pnlAddIntegrationAssessment,'UpdateIntegrationAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateIntegrationAssessmentList($blnUpdatesMade) {
	    	$this->dtgIntegrationAssessments->PageNumber = 1;
			$this->dtgIntegrationAssessments->Refresh();
	    }
	    
    	public function btnAddSeasonalAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddSeasonalAssessment->Visible = true;
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $pnlAddSeasonalView = new AddSeasonalAssessment($this->pnlAddSeasonalAssessment,'UpdateSeasonalAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateSeasonalAssessmentList($blnUpdatesMade) {
	    	$this->dtgSeasonalAssessments->PageNumber = 1;
			$this->dtgSeasonalAssessments->Refresh();
	    }
	    
    	public function btnAddTimeAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTimeAssessment->Visible = true;
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $pnlAddTimeView = new AddTimeAssessment($this->pnlAddTimeAssessment,'UpdateTimeAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTimeAssessmentList($blnUpdatesMade) {
	    	$this->dtgTimeAssessments->PageNumber = 1;
			$this->dtgTimeAssessments->Refresh();
	    }
		
    	public function btnAddGroupAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Group Assessments
	        $this->pnlAddGroupAssessment->Visible = true;
	        $this->pnlAddGroupAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $pnlAddGroupView = new AddGroupAssessment($this->pnlAddGroupAssessment,'UpdateGroupAssessmentList',$this);	
		}
		

    	// For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
    	// Need to initialize the jquery tab here.
		public function GetEndScript() {
			$strToReturn = parent::GetEndScript();
			$strToReturn .= '$( "#tabs" ).tabs();';
			return $strToReturn;
		}
    }