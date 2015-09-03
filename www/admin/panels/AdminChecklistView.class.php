<?php
    class AdminChecklistView extends QPanel {     
        public $dtgCompanies;
        public $btnAdd;
        public $btnAssociateUser;
		public $pnlAddCompany;
		public $pnlAssociateUser;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminChecklistView.tpl.php';

 
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

            $this->dtgCompanies = new BusinessChecklistDataGrid($this);
            $this->dtgCompanies->Paginator = new QPaginator($this->dtgCompanies);
            $this->dtgCompanies->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM) ?>', 'HtmlEntities=false', 'Width=400px' ));
             $this->dtgCompanies->AddColumn(new QDataGridColumn('Managers', '<?= $_CONTROL->ParentControl->RenderManagers($_ITEM) ?>', 'HtmlEntities=false', 'Width=450px'  ));             
                                  
			$this->dtgCompanies->CellPadding = 5;
			$this->dtgCompanies->SetDataBinder('dtgCompanies_Bind',$this);
			$this->dtgCompanies->NoDataHtml = 'No Companies in the Business Checklist';
			$this->dtgCompanies->UseAjax = true;
			
			$this->dtgCompanies->SortColumnIndex = 1;
			$this->dtgCompanies->ItemsPerPage = 20;
		
			$this->dtgCompanies->GridLines = QGridLines::Both;
		
			$objStyle = $this->dtgCompanies->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgCompanies->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgCompanies->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAdd = new QButton($this);
	        $this->btnAdd->Text = 'Add a Company';
	        $this->btnAdd->CssClass = 'primary';
	        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAdd_Click'));	        	    
	        
	        $this->btnAssociateUser = new QButton($this);
	        $this->btnAssociateUser->Text = 'Associate a Manager with a company';
	        $this->btnAssociateUser->CssClass = 'primary';
	        $this->btnAssociateUser->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAssociateUser_Click'));
	                  
			$this->pnlAddCompany = new QPanel($this);
	        $this->pnlAddCompany->Position = QPosition::Relative;
	        $this->pnlAddCompany->Visible = false;
	        $this->pnlAddCompany->AutoRenderChildren = true;
	        
	        $this->pnlAssociateUser = new QPanel($this);
	        $this->pnlAssociateUser->Position = QPosition::Relative;
	        $this->pnlAssociateUser->Visible = false;
	        $this->pnlAssociateUser->AutoRenderChildren = true;
	        
        }
        
	    public function dtgCompanies_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgCompanies->PageNumber = 1;
			$this->dtgCompanies->Refresh();
		}
		
    	public function dtgCompanies_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$objClauses = QQ::Clause($this->dtgCompanies->OrderByClause,$this->dtgCompanies->LimitClause);
		    				
			$checklistArray = BusinessChecklist::QueryArray($objConditions,$objClauses);		
			$this->dtgCompanies->TotalItemCount = BusinessChecklist::CountAll();
			$this->dtgCompanies->DataSource = $checklistArray; 
		}
	
    	public function RenderCompany(BusinessChecklist $objChecklist) {
    		$intCompanyId = $objChecklist->CompanyId;
    		$objCompany = Company::Load($intCompanyId);
			return sprintf("<a href='%s/checklist/i4center/viewChecklist.php/%s' target='_blank' >%s</a>", __SUBDIRECTORY__,$objChecklist->Id, $objCompany->Name);   		
		}
		
    	public function RenderManagers(BusinessChecklist $objChecklist) {
    		$strReturn  = '';
			$objArray = $objChecklist->GetUserAsManagerArray();
			foreach($objArray as $objUser) {				
				$strReturn .= $objUser->Login->Username .', ';
			}
			return $strReturn;
		}
		
		
	    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
	    	$this->pnlAddCompany->Visible = true;
	        $this->pnlAddCompany->RemoveChildControls(true);
	    	$pnlAddCompanyView = new AddBusinesschecklist($this->pnlAddCompany,'UpdateCheckList',$this);
		}
		
		public function btnAssociateUser_Click($strFormId, $strControlId, $strParameter) {
			$this->pnlAssociateUser->Visible = true;
	        $this->pnlAssociateUser->RemoveChildControls(true);
	    	$pnlAddCompanyView = new AddUserToBusinessChecklist($this->pnlAssociateUser,'UpdateCheckList',$this);
		}
		
    // Method Call back for the  panels 
	    public function UpdateCheckList($blnUpdatesMade) {
	    	$this->dtgCompanies->PageNumber = 1;
			$this->dtgCompanies->Refresh();
	    }
    
    }