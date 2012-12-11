<?php	
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
		
		public $dtgLemonAssessments;
		public $btnAddLemonAssessment;
		public $pnlAddLemonAssessment;
		
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
           
            $this->dtgKingdomBizAssessments = new KingdomBusinessAssessmentDataGrid($this);
            $this->dtgKingdomBizAssessments->Paginator = new QPaginator($this->dtgKingdomBizAssessments);
            $this->dtgKingdomBizAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUser($_ITEM->UserId) ?>', 'HtmlEntities=false', 'Width=300px' ));
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
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgKingdomBizAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddKingdomBizAssessment = new QButton($this);
	        $this->btnAddKingdomBizAssessment->Text = 'Add A User';
	        $this->btnAddKingdomBizAssessment->CssClass = 'primary';
	        $this->btnAddKingdomBizAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddKingdomBizAssessment_Click'));
          
	        $this->pnlAddKingdomAssessment = new QPanel($this);
	        $this->pnlAddKingdomAssessment->Position = QPosition::Relative;
	        $this->pnlAddKingdomAssessment->Visible = false;
	        $this->pnlAddKingdomAssessment->AutoRenderChildren = true;
	        /********************************************/
	        $this->dtgLemonAssessments = new LemonAssessmentDataGrid($this);
            $this->dtgLemonAssessments->Paginator = new QPaginator($this->dtgLemonAssessments);
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUser($_ITEM->UserId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_CONTROL->ParentControl->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px' ));
                      
            $this->dtgLemonAssessments->CellPadding = 5;
			$this->dtgLemonAssessments->SetDataBinder('dtgLemonAssessments_Bind',$this);
			$this->dtgLemonAssessments->NoDataHtml = 'No Lemon Assessments have been assigned.';
			$this->dtgLemonAssessments->UseAjax = true;
			
			$this->dtgLemonAssessments->SortColumnIndex = 1;
			$this->dtgLemonAssessments->ItemsPerPage = 20;
			
			$objStyle = $this->dtgLemonAssessments->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgLemonAssessments->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgLemonAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgLemonAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
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
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUser($_ITEM->UserId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            $this->dtgTenPAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));
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
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgTenPAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
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
            $this->dtgTenFAssessments->AddColumn(new QDataGridColumn('User', '<?= $_CONTROL->ParentControl->RenderUser($_ITEM->UserId) ?>', 'HtmlEntities=false', 'Width=300px' ));
            /*$this->dtgTenFAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px' ));*/
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
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgTenFAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddTenFAssessment = new QButton($this);
	        $this->btnAddTenFAssessment->Text = 'Add A User';
	        $this->btnAddTenFAssessment->CssClass = 'primary';
	        $this->btnAddTenFAssessment->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddTenFAssessment_Click'));
          
	        $this->pnlAddTenFAssessment = new QPanel($this);
	        $this->pnlAddTenFAssessment->Position = QPosition::Relative;
	        $this->pnlAddTenFAssessment->Visible = false;
	        $this->pnlAddTenFAssessment->AutoRenderChildren = true;
        }
        
    	public function dtgKingdomBizAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$KingdomBizArray = KingdomBusinessAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgKingdomBizAssessments->DataSource = $KingdomBizArray; 
		}
		
    	public function dtgTenPAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$TenPArray = TenPAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgTenPAssessments->DataSource = $TenPArray; 
		}
	
    	public function dtgTenFAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$TenPArray = TenFAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgTenFAssessments->DataSource = $TenPArray; 
		}
		
		public function dtgLemonAssessments_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$LemonArray = LemonAssessment::QueryArray($objConditions,$objClauses);		
			$this->dtgLemonAssessments->DataSource = $LemonArray; 
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
		
    	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
    	public function btnAddKingdomBizAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to the company
	        $this->pnlAddKingdomAssessment->Visible = true;
	        $this->pnlAddKingdomAssessment->RemoveChildControls(true);
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
	        $pnlAddTenFView = new AddTenFAssessment($this->pnlAddTenFAssessment,'UpdateTenFAssessmentList',$this);
		
		}
		
	    // Method Call back for the  panels 
	    public function UpdateTenFAssessmentList($blnUpdatesMade) {
	    	$this->dtgTenFAssessments->PageNumber = 1;
			$this->dtgTenFAssessments->Refresh();
	    }
	    
    	public function btnAddLemonAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Lemon Assessments
	        $this->pnlAddLemonAssessment->Visible = true;
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $pnlAddLemonView = new AddLemonAssessment($this->pnlAddLemonAssessment,'UpdateLemonAssessmentList',$this);	
		}
		
	    // Method Call back for the  panels 
	    public function UpdateLemonAssessmentList($blnUpdatesMade) {
	    	$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
	    }

    }