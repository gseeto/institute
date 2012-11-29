<?php
    class AdminScorecardsView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $dtgScorecards;
        public $btnAddScorecard;
        public $pnlAddScorecard;
        public $btnAddUser;
        public $pnlAddUser;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminScorecardsView.tpl.php';

 
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
           
            $this->dtgScorecards = new ScorecardDataGrid($this);
            $this->dtgScorecards->Paginator = new QPaginator($this->dtgScorecards);
			$this->dtgScorecards->AddColumn(new QDataGridColumn('Scorecard Name', '<?= $_ITEM->Name ?>', 'HtmlEntities=false', 'Width=100px' ));
			$this->dtgScorecards->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=400px' ));
            $this->dtgScorecards->AddColumn(new QDataGridColumn('Users', '<?= $_CONTROL->ParentControl->RenderUsers($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
			
            
			$this->dtgScorecards->CellPadding = 5;
			$this->dtgScorecards->SetDataBinder('dtgScorecards_Bind',$this);
			$this->dtgScorecards->NoDataHtml = 'No Scorecards.';
			$this->dtgScorecards->UseAjax = true;
			
			$this->dtgScorecards->SortColumnIndex = 1;
			$this->dtgScorecards->ItemsPerPage = 20;
		
			$objStyle = $this->dtgScorecards->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgScorecards->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgScorecards->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgScorecards->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddScorecard = new QButton($this);
	        $this->btnAddScorecard->Text = 'Add A Scorecard';
	        $this->btnAddScorecard->CssClass = 'primary';
	        $this->btnAddScorecard->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddScorecard_Click'));
	        
	        $this->pnlAddScorecard = new QPanel($this);
	        $this->pnlAddScorecard->Position = QPosition::Relative;
	        $this->pnlAddScorecard->Visible = false;
	        $this->pnlAddScorecard->AutoRenderChildren = true;
	        
	        $this->btnAddUser = new QButton($this);
	        $this->btnAddUser->Text = 'Add Users to A Scorecard';
	        $this->btnAddUser->CssClass = 'primary';
	        $this->btnAddUser->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddUser_Click'));
	        
	        $this->pnlAddUser = new QPanel($this);
	        $this->pnlAddUser->Position = QPosition::Relative;
	        $this->pnlAddUser->Visible = false;
	        $this->pnlAddUser->AutoRenderChildren = true;
          
        }
        
        // Event Handlers Here
    	public function dtgScorecards_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$scorecardArray = Scorecard::QueryArray($objConditions,$objClauses);		
			$this->dtgScorecards->DataSource = $scorecardArray; 
		}
		
        public function RenderCompany($intCompanyId) {
        	$objCompany = Company::Load($intCompanyId);
        	return $objCompany->Name;
        }
        
        public function RenderUsers($objScorecard) {
        	$strUsers = '';
        	$userArray = $objScorecard->GetUserArray();
        	foreach($userArray as $objUser) {
        		$strUsers .= Login::Load($objUser->LoginId)->Username .',';
        	}
        	$strUsers = rtrim($strUsers,',');
        	return $strUsers;
        }
        
    	public function btnAddScorecard_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of scorecards
	        $this->pnlAddScorecard->Visible = true;
	        $this->pnlAddScorecard->RemoveChildControls(true);
	        $pnlAddScorecardView = new AddScorecard($this->pnlAddScorecard,'UpdateScorecardList',$this);  		
		}
		
    	public function btnAddUser_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of users to a scorecard
	        $this->pnlAddUser->Visible = true;
	        $this->pnlAddUser->RemoveChildControls(true);
	        $pnlAddUserView = new AddScorecardUser($this->pnlAddUser,'UpdateScorecardList',$this);  		
		}
		
    	// Method Call back for the  panels 
	    public function UpdateScorecardList($blnUpdatesMade) {
	    	$this->dtgScorecards->PageNumber = 1;
			$this->dtgScorecards->Refresh();
	    }
    }