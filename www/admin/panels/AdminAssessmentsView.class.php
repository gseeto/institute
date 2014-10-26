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
        
        public $dtgTenPAssessments;
		public $btnAddTenPAssessment;
		public $pnlAddTenPAssessment;
        
		public $dtgTenFAssessments;
		public $btnAddTenFAssessment;
		public $pnlAddTenFAssessment;
		
		public $dtgIntegrationAssessments;
		public $btnAddIntegrationAssessment;
		public $pnlAddIntegrationAssessment;
		
		public $dtgSeasonalAssessments;
		public $btnAddSeasonalAssessment;
		public $pnlAddSeasonalAssessment;
		
		public $dtgTimeAssessments;
		public $btnAddTimeAssessment;
		public $pnlAddTimeAssessment;
		
		public $dtgLemonAssessments;
		public $btnAddLemonAssessment;
		public $pnlAddLemonAssessment;
		public $strFirstNameLemon;
		public $strLastNameLemon;
		public $strGroupLemon;
		public $strCompanyLemon;
		
		public $dtgGroupAssessments;
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
	        /********************************************/
			$this->strFirstNameLemon = new QTextBox($this);
			$this->strFirstNameLemon->Name = 'First Name';
			$this->strFirstNameLemon->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strFirstNameLemon->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strFirstNameLemon->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strFirstNameLemon->Focus();
			
			$this->strLastNameLemon = new QTextBox($this);
			$this->strLastNameLemon->Name = 'Last Name';
			$this->strLastNameLemon->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strLastNameLemon->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strLastNameLemon->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strLastNameLemon->Focus();
			
			$this->strGroupLemon = new QTextBox($this);
			$this->strGroupLemon->Name = 'Group KeyCode';
			$this->strGroupLemon->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strGroupLemon->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strGroupLemon->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	        
			$this->strCompanyLemon = new QTextBox($this);
			$this->strCompanyLemon->Name = 'Company';
			$this->strCompanyLemon->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strCompanyLemon->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgLemonAssessments_Refresh'));
			$this->strCompanyLemon->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
	        $this->dtgLemonAssessments = new LemonAssessmentDataGrid($this);
            $this->dtgLemonAssessments->Paginator = new QPaginator($this->dtgLemonAssessments);
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUserLinkLemon($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->User->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->User->LastName, false))));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Company->Name), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Company->Name, false))));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Group KeyCode', '<?= $_CONTROL->ParentControl->RenderGroupKeyCode($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Group->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Group->KeyCode, false))));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->ResourceStatusId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->ResourceStatusId, false))));
            
            $this->dtgLemonAssessments->CellPadding = 5;
            $this->dtgLemonAssessments->SortColumnIndex = 1;
			$this->dtgLemonAssessments->ItemsPerPage = 20;
			$this->dtgLemonAssessments->SetDataBinder('dtgLemonAssessments_Bind',$this);
			$this->dtgLemonAssessments->NoDataHtml = 'No Lemon Assessments have been assigned.';
			$this->dtgLemonAssessments->UseAjax = true;
			
			
			$objStyle = $this->dtgLemonAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgLemonAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgLemonAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgLemonAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddLemonAssessment = new QButton($this);
	        $this->btnAddLemonAssessment->Text = 'Add A User';
	        $this->btnAddLemonAssessment->CssClass = 'primary';
	        $this->btnAddLemonAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddLemonAssessment_Click'));
          
	        $this->pnlAddLemonAssessment = new QPanel($this);
	        $this->pnlAddLemonAssessment->Position = QPosition::Relative;
	        $this->pnlAddLemonAssessment->Visible = false;
	        $this->pnlAddLemonAssessment->AutoRenderChildren = true;
	        /*****************************************/
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
	
	        $objStyle = $this->dtgTenFAssessments->AlternateRowStyle;
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
	        
	        $this->strKeycode = new QTextBox($this);
			$this->strKeycode->Name = 'KeyCode';
		//	$this->strKeycode->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));
		//	$this->strKeycode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));
			$this->strKeycode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strKeycode->Focus();
			
			$this->lstSearchAssessmentType = new QListBox($this);
			foreach(Resource::LoadAll() as $objResource) {
				if($objResource->Name != 'Scorecard') {
						$this->lstSearchAssessmentType->AddItem($objResource->Name, $objResource->Id);
				}
			}
			//$this->lstSearchAssessmentType->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));	
			//$this->lstSearchAssessmentType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));		
	        $this->lstSearchAssessmentType->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	        
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QAjaxControlAction($this,'dtgGroupAssessments_Refresh'));
	        $this->btnSearch->PrimaryButton = true;
			
	        $this->dtgGroupAssessments = new GroupAssessmentListDataGrid($this);
            $this->dtgGroupAssessments->Paginator = new QPaginator($this->dtgGroupAssessments);
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_CONTROL->ParentControl->RenderKeyCode($_ITEM) ?>', 'HtmlEntities=false', 'Width=350px',
            	array('OrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode, false))));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_CONTROL->ParentControl->RenderDescription($_ITEM) ?>', 'HtmlEntities=false', 'Width=350px' ));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_CONTROL->ParentControl->RenderTotalKeys($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_CONTROL->ParentControl->RenderKeysLeft($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));   
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Type', '<?= $_CONTROL->ParentControl->RenderAssessmentType($_ITEM) ?>', 'HtmlEntities=false' )); 
            $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Manager', '<?= $_CONTROL->ParentControl->RenderAssessmentManager($_ITEM) ?>', 'HtmlEntities=false' )); 
            $this->dtgGroupAssessments->CellPadding = 5;
			$this->dtgGroupAssessments->SetDataBinder('dtgGroupAssessments_Bind',$this);
			$this->dtgGroupAssessments->NoDataHtml = 'No Group Assessments have been assigned.';
			$this->dtgGroupAssessments->UseAjax = true;
			
			$this->dtgGroupAssessments->SortColumnIndex = 1;
			$this->dtgGroupAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgGroupAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgGroupAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgGroupAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgGroupAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAddGroupAssessment = new QButton($this);
	        $this->btnAddGroupAssessment->Text = 'Add Group Assessment';
	        $this->btnAddGroupAssessment->CssClass = 'primary';
	        $this->btnAddGroupAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddGroupAssessment_Click'));
	        $this->pnlAddGroupAssessment = new QPanel($this);
	        $this->pnlAddGroupAssessment->Position = QPosition::Relative;
	        $this->pnlAddGroupAssessment->Visible = false;
	        $this->pnlAddGroupAssessment->AutoRenderChildren = true;
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
        
    public function RenderKeyCode($objGroupAssessment) {
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $objGroupAssessment->Id);     
        if (!$txtKeyCode) {
        	$txtKeyCode = new QTextBox($this->dtgGroupAssessments,'txtKeyCode' . $objGroupAssessment->Id);
			$txtKeyCode->Name = 'Key Code';
            $txtKeyCode->Text = $objGroupAssessment->KeyCode;
            $txtKeyCode->ActionParameter = $objGroupAssessment->Id;
            $txtKeyCode->Width = 100;
            $txtKeyCode->Display = false;
           
        }
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnKeyCodeSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveKeyCode_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        //$btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnKeyCodeCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancelKeyCode_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
        $lblKeyCode = $this->objForm->GetControl('lblKeyCode' . $objGroupAssessment->Id);     
        if (!$lblKeyCode) {
        	$lblKeyCode = new QLabel($this->dtgGroupAssessments,'lblKeyCode' . $objGroupAssessment->Id);
        	$lblKeyCode->Text = $objGroupAssessment->KeyCode;
        	$lblKeyCode->ActionParameter = $objGroupAssessment->Id;
        	$lblKeyCode->Cursor = 'pointer';
        	$lblKeyCode->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblKeyCode_Clicked'));
        }
        return ($txtKeyCode->Render(false) . $btnSave->Render(false). $btnCancel->Render(false) . $lblKeyCode->Render(false));
	}
	
	public function lblKeyCode_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblKeyCode'.$strParameter); 
        $lblKeyCode->Display = false;
		
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $strParameter); 
        $txtKeyCode->Display = true;
        
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
	public function btnCancelKeyCode_Click($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblKeyCode' . $strParameter); 
        $lblKeyCode->Display = true;
		
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $strParameter); 
        $txtKeyCode->Display = false;
        $txtKeyCode->Text = $lblKeyCode->Text;
        
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveKeyCode_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtKeyCode = $this->objForm->GetControl('txtKeyCode' . $strParameter);
        $objGroupAssessment->KeyCode = $txtKeyCode->Text;
        $objGroupAssessment->Save();
        $txtKeyCode->Display = false;
        
        $btnSave = $this->objForm->GetControl('btnKeyCodeSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnKeyCodeCancel' . $strParameter); 
        $btnCancel->Display = false;
        
        $lblAction = $this->objForm->GetControl('lblKeyCode' .  $strParameter); 
        $lblAction->Text = $txtKeyCode->Text;
        $lblAction->Display = true;
	}
  
    public function RenderDescription($objGroupAssessment) {
        $txtDescription = $this->objForm->GetControl('txtDescription' . $objGroupAssessment->Id);     
        if (!$txtDescription) {
        	$txtDescription = new QTextBox($this->dtgGroupAssessments,'txtDescription' . $objGroupAssessment->Id);
			$txtDescription->Name = 'Description';
            $txtDescription->Text = $objGroupAssessment->Description;
            $txtDescription->ActionParameter = $objGroupAssessment->Id;
            $txtDescription->Width = 200;
            $txtDescription->Display = false;
        }
 
        $btnSave = $this->objForm->GetControl('btnDescriptionSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnDescriptionSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveDescription_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        //$btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->objForm->GetControl('btnDescriptionCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnDescriptionCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction('btnCancelDescription_Click(this)'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }

        $lblDescription = $this->objForm->GetControl('lblDescription' . $objGroupAssessment->Id);     
        if (!$lblDescription) {
        	$lblDescription = new QLabel($this->dtgGroupAssessments,'lblDescription' . $objGroupAssessment->Id);
        	$lblDescription->Text = (strlen($objGroupAssessment->Description) != 0)? $objGroupAssessment->Description : 'Enter a Description';
        	$lblDescription->ActionParameter = $objGroupAssessment->Id;
        	$lblDescription->Cursor = 'pointer';
        	$lblDescription->AddAction(new QClickEvent(), new QJavaScriptAction('lblDescription_Clicked(this)'));
        }
        return ($txtDescription->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblDescription->Render(false));
	}
    public function btnSaveDescription_Click($strFormId, $strControlId, $strParameter) {
		$GroupAssessmentId = $strParameter;	
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtDescription = $this->objForm->GetControl('txtDescription' . $strParameter);
        $objGroupAssessment->Description = $txtDescription->Text;
        $objGroupAssessment->Save();
        $txtDescription->Display = false;
        
        $btnSave = $this->objForm->GetControl('btnDescriptionSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnDescriptionCancel' . $strParameter); 
        $btnCancel->Display = false;

        $lblAction = $this->objForm->GetControl('lblDescription' .  $strParameter); 
        $lblAction->Text = $txtDescription->Text;
        $lblAction->Display = true;
	}
	
     public function RenderTotalKeys($objGroupAssessment) {
        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $objGroupAssessment->Id);     
        if (!$txtTotalKeys) {
        	$txtTotalKeys = new QIntegerTextBox($this->dtgGroupAssessments,'txtTotalKeys' . $objGroupAssessment->Id);
			$txtTotalKeys->Name = 'Total Keys';
            $txtTotalKeys->Text = $objGroupAssessment->TotalKeys;
            $txtTotalKeys->ActionParameter = $objGroupAssessment->Id;
            $txtTotalKeys->Width = 50;
            $txtTotalKeys->Display = false;
        }
 
        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnTotalKeysSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveTotalKeys_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	        //$btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnTotalKeysCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancelTotalKeys_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }

        $lblTtotalKeys = $this->objForm->GetControl('lblTotalKeys' . $objGroupAssessment->Id);     
        if (!$lblTtotalKeys) {
        	$lblTtotalKeys = new QLabel($this->dtgGroupAssessments,'lblTotalKeys' . $objGroupAssessment->Id);
        	$lblTtotalKeys->Text = $objGroupAssessment->TotalKeys;
        	$lblTtotalKeys->ActionParameter = $objGroupAssessment->Id;
			$lblTtotalKeys->Cursor = 'pointer';
        	$lblTtotalKeys->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblTotalKeys_Clicked'));
        }
        return ($txtTotalKeys->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblTtotalKeys->Render(false));
	}
	
    public function lblTotalKeys_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblTotalKeys' . $strParameter); 
        $lblKeyCode->Display = false;

        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $strParameter); 
        $txtTotalKeys->Display = true;

        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = true;
 
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnCancelTotalKeys_Click($strFormId, $strControlId, $strParameter) {
        $lblKeyCode = $this->objForm->GetControl('lblTotalKeys' . $strParameter); 
        $lblKeyCode->Display = true;
		
        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $strParameter); 
        $txtTotalKeys->Display = false;
        $txtTotalKeys->Text = $lblKeyCode->Text;

        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveTotalKeys_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtTotalKeys = $this->objForm->GetControl('txtTotalKeys' . $strParameter);
        $objGroupAssessment->TotalKeys = $txtTotalKeys->Text;
        $objGroupAssessment->Save();
        $txtTotalKeys->Display = false;
        
        $btnSave = $this->objForm->GetControl('btnTotalKeysSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnTotalKeysCancel' . $strParameter); 
        $btnCancel->Display = false;
        
        $lblAction = $this->objForm->GetControl('lblTotalKeys' .  $strParameter); 
        $lblAction->Text = $txtTotalKeys->Text;
        $lblAction->Display = true;
	}
	
    public function RenderKeysLeft($objGroupAssessment) {
        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $objGroupAssessment->Id);     
        if (!$txtKeysLeft) {
        	$txtKeysLeft = new QIntegerTextBox($this->dtgGroupAssessments,'txtKeysLeft' . $objGroupAssessment->Id);
			$txtKeysLeft->Name = 'Keys Left';
            $txtKeysLeft->Text = $objGroupAssessment->KeysLeft;
            $txtKeysLeft->ActionParameter = $objGroupAssessment->Id;
            $txtKeysLeft->Width = 50;
            $txtKeysLeft->Display = false;
        }
        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $objGroupAssessment->Id); 
        if(!$btnSave) {
	        $btnSave = new QButton($this->dtgGroupAssessments,'btnKeysLeftSave' . $objGroupAssessment->Id);
	        $btnSave->Text = 'Save';
	        $btnSave->ActionParameter = $objGroupAssessment->Id;
	        $btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSaveKeysLeft_Click'));
	        $btnSave->PrimaryButton = true;
	        $btnSave->CausesValidation = true;
	       // $btnSave->CssClass = 'ui-button';
	        $btnSave->Display = false;
        }
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $objGroupAssessment->Id); 
        if(!$btnCancel) {
	        $btnCancel = new QButton($this->dtgGroupAssessments,'btnKeysLeftCancel' . $objGroupAssessment->Id);
	        $btnCancel->Text = 'Cancel';
	        $btnCancel->ActionParameter = $objGroupAssessment->Id;
	     	$btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancelKeysLeft_Click'));        
	       	$btnCancel->CausesValidation = false;
	       	//$btnCancel->CssClass = 'ui-button';
	       	$btnCancel->Display = false;
        }
        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' . $objGroupAssessment->Id);     
        if (!$lblKeysLeft) {
        	$lblKeysLeft = new QLabel($this->dtgGroupAssessments,'lblKeysLeft' . $objGroupAssessment->Id);
        	$lblKeysLeft->Text = $objGroupAssessment->KeysLeft;
        	$lblKeysLeft->ActionParameter = $objGroupAssessment->Id;
			$lblKeysLeft->Cursor = 'pointer';
        	$lblKeysLeft->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblKeysLeft_Clicked'));
        }
        return ($txtKeysLeft->Render(false) . $btnSave->Render(false). $btnCancel->Render(false). $lblKeysLeft->Render(false));
	}
	
	public function lblKeysLeft_Clicked($strFormId, $strControlId, $strParameter) {
        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' . $strParameter); 
        $lblKeysLeft->Display = false;

        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $strParameter); 
        $txtKeysLeft->Display = true;
        
        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = true;
        
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = true;
	}
	
    public function btnCancelKeysLeft_Click($strFormId, $strControlId, $strParameter) {
        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' . $strParameter); 
        $lblKeysLeft->Display = true;
		
        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $strParameter); 
        $txtKeysLeft->Display = false;
        $txtKeysLeft->Text = $lblKeysLeft->Text;

        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = false;
        
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = false;
	}
	
    public function btnSaveKeysLeft_Click($strFormId, $strControlId, $strParameter) {
        $objGroupAssessment = GroupAssessmentList::Load($strParameter);
        $txtKeysLeft = $this->objForm->GetControl('txtKeysLeft' . $strParameter);
        $objGroupAssessment->KeysLeft = $txtKeysLeft->Text;
        $objGroupAssessment->Save();
        $txtKeysLeft->Display = false;

        $btnSave = $this->objForm->GetControl('btnKeysLeftSave' . $strParameter); 
        $btnSave->Display = false;
        $btnCancel = $this->objForm->GetControl('btnKeysLeftCancel' . $strParameter); 
        $btnCancel->Display = false;

        $lblKeysLeft = $this->objForm->GetControl('lblKeysLeft' .  $strParameter); 
        $lblKeysLeft->Text = $txtKeysLeft->Text;
        $lblKeysLeft->Display = true;
	}
	

    	public function dtgKingdomBizAssessments_Bind() {
			$this->dtgKingdomBizAssessments->TotalItemCount = KingdomBusinessAssessment::CountAll();
			$objConditions = QQ::All();
			$objClauses = array();
			$KingdomBizArray = KingdomBusinessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgKingdomBizAssessments->DataSource = $KingdomBizArray; 
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
		
    	public function dtgLemonAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
		}
		public function dtgLemonAssessments_Bind() {
			$this->dtgLemonAssessments->TotalItemCount = LemonAssessment::CountAll();
            $objConditions = QQ::All(); 
			if ($strName = trim($this->strFirstNameLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->User->FirstName, $strName . '%')
				);
			}
		
			if ($strName = trim($this->strLastNameLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->User->LastName, $strName . '%')
				);
			}
				
			if ($strName = trim($this->strGroupLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->Group->KeyCode, $strName . '%')
				);
			} 
			if ($strName = trim($this->strCompanyLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->Company->Name, $strName . '%')
				);
			} 
			  
            $objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgLemonAssessments->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgLemonAssessments->OrderByClause) $objClauses[] = $objClause;

			$this->dtgLemonAssessments->DataSource = LemonAssessment::QueryArray($objConditions, $objClauses);
		}
		
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
		public function RenderGroupKeyCode(LemonAssessment $objAssessment) {
			$strControlId = 'lstLemonGroup' . $objAssessment->Id;
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgLemonAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->AddItem('-- No Group KeyCode --', 0,true);
				foreach(GroupAssessmentList::LoadArrayByResourceId(5) as $objGroup) {					
						if($objAssessment->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objAssessment->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstLemonGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
    	public function lstLemonGroup_Change($strFormId, $strControlId, $strParameter) {
			$lstGroupType = $this->objForm->GetControl($strControlId);
			if ($lstGroupType != null){
				$objLemonAssessment = LemonAssessment::Load($strParameter);
				if($lstGroupType->SelectedValue == 0)
					$objLemonAssessment->GroupId = null;
				else
					$objLemonAssessment->GroupId = $lstGroupType->SelectedValue;
				$objLemonAssessment->Save();
			}
			$this->dtgLemonAssessments->Refresh();
		}
		
    	public function RenderUserLinkLemon($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/lemon/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
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
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
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
	    
    	public function btnAddTenPAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddTenPAssessment->Visible = true;
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddSeasonalAssessment->RemoveChildControls(true);
	        $this->pnlAddIntegrationAssessment->RemoveChildControls(true);
	        $this->pnlAddTimeAssessment->RemoveChildControls(true);
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddUpwardAssessment->RemoveChildControls(true);
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
		
		public function btnAddLRAAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddLRAAssessment->Visible = true;
	        $this->pnlAddLRAAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
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
	    public function UpdateLRAAssessmentList($blnUpdatesMade) {
	    	$this->dtgLRAAssessments->PageNumber = 1;
			$this->dtgLRAAssessments->Refresh();
	    }
	    
    	public function UpdateUpwardAssessmentList($blnUpdatesMade) {
	    	$this->dtgUpwardAssessments->PageNumber = 1;
			$this->dtgUpwardAssessments->Refresh();
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
		
	    // Method Call back for the  panels 
	    public function UpdateIntegrationAssessmentList($blnUpdatesMade) {
	    	$this->dtgIntegrationAssessments->PageNumber = 1;
			$this->dtgIntegrationAssessments->Refresh();
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
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $pnlAddTimeView = new AddTimeAssessment($this->pnlAddTimeAssessment,'UpdateTimeAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTimeAssessmentList($blnUpdatesMade) {
	    	$this->dtgTimeAssessments->PageNumber = 1;
			$this->dtgTimeAssessments->Refresh();
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
		
	    // Method Call back for the  panels 
	    public function UpdateLemonAssessmentList($blnUpdatesMade) {
	    	$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
	    }

    	public function btnAddGroupAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Group Assessments
	        $this->pnlAddGroupAssessment->Visible = true;
	        $this->pnlAddGroupAssessment->RemoveChildControls(true);
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
	        $this->pnlAddTenPAssessment->RemoveChildControls(true);
	        $this->pnlAddTenFAssessment->RemoveChildControls(true);
	        $pnlAddGroupView = new AddGroupAssessment($this->pnlAddGroupAssessment,'UpdateGroupAssessmentList',$this);	
		}
		
	    // Method Call back for the  panels 
	    public function UpdateGroupAssessmentList($blnUpdatesMade) {
	    	$this->dtgGroupAssessments->PageNumber = 1;
			$this->dtgGroupAssessments->Refresh();
	    }
	    
    	// For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
    	// Need to initialize the jquery tab here.
		public function GetEndScript() {
			$strToReturn = parent::GetEndScript();
			$strToReturn .= '$( "#tabs" ).tabs();';
			return $strToReturn;
		}
    }