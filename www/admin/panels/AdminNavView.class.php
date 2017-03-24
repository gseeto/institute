<?php
    class AdminNavView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $btnUsers;
        public $btnCompany;
        public $btnScorecards;
        public $btnAssessments;
        public $btnTenAssessments;
        public $btnLemon;
        public $btnVenture;
        public $btnChecklist;
        public $btnPartnering;
        public $btnGroup;
        
        // The Reference to the Main Form's "Main Content Panel" so that this panel
        // can make changes to the content panel on the page
        protected $strPanelMainControlId;

        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminNavView.tpl.php';

 
        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strDefaultTab, $strPanelMainControlId, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
           
            $this->strPanelMainControlId = $strPanelMainControlId;
            
            $this->btnUsers = new QButton($this);
            $this->btnUsers->Name = 'Users';
            $this->btnUsers->Text = 'Users';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUsers_Click'));
            
            $this->btnCompany = new QButton($this);
            $this->btnCompany->Name = 'Companies';
            $this->btnCompany->Text = 'Companies';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCompany_Click'));
            
            $this->btnScorecards = new QButton($this);
            $this->btnScorecards->Name = 'Scorecards';
            $this->btnScorecards->Text = 'Scorecards';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScorecards_Click'));
        
            $this->btnAssessments = new QButton($this);
            $this->btnAssessments->Name = 'Assessments';
            $this->btnAssessments->Text = 'Assessments';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAssessments_Click'));  

            $this->btnTenAssessments = new QButton($this);
            $this->btnTenAssessments->Name = '10-P & 10-F';
            $this->btnTenAssessments->Text = '10-P & 10-F';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnTenAssessments_Click'));  
            
            $this->btnLemon = new QButton($this);
            $this->btnLemon->Name = 'Lemon';
            $this->btnLemon->Text = 'Lemon';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnLemon_Click'));  
            
            $this->btnGroup = new QButton($this);
            $this->btnGroup->Name = 'Group';
            $this->btnGroup->Text = 'Group';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnGroup_Click'));            
            
            $this->btnVenture = new QButton($this);
            $this->btnVenture->Name = 'Venture ';
            $this->btnVenture->Text = 'Venture';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnVenture_Click'));            
            
            $this->btnPartnering = new QButton($this);
            $this->btnPartnering->Name = 'Partnering ';
            $this->btnPartnering->Text = 'Partnering';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnPartnering_Click'));
            
            $this->btnChecklist = new QButton($this);
            $this->btnChecklist->Name = 'Checklist ';
            $this->btnChecklist->Text = 'Checklist';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnChecklist_Click')); 
            
            // Initialize main content panel
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);

            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            switch ($strDefaultTab) {
            	case 'users':
            		new AdminUsersView($pnlMain);
            		$this->btnUsers->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'companies':
            		new AdminCompanysView($pnlMain);
            		$this->btnCompany->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'assessments':
            		new AdminAssessmentsView($pnlMain);
            		$this->btnAssessments->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case '10-P & 10-F':
            		new AdminTenAssessmentsView($pnlMain);
            		$this->btnTenAssessments->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'Lemon':
            		new AdminLemonView($pnlMain);
            		$this->btnLemon->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'group':
            		new AdminGroupView($pnlMain);
            		$this->btnGroup->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'scorecards':
            		new AdminScorecardsView($pnlMain);
            		$this->btnScorecards->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'venture':
            		new AdminScorecardsView($pnlMain);
            		$this->btnVenture->CssClass = 'mr-5 btn btn-primary';
            		break;
            	case 'Partnering':
            		new AdminScorecardsView($pnlMain);
            		$this->btnPartnering->CssClass = 'mr-5 btn btn-primary';
            		break;
            	default:
            		new AdminUsersView($pnlMain);
            		$this->btnUsers->CssClass = 'mr-5 btn btn-primary';
            		break;          		
            }
            
        }
        
        // Event Handlers Here      
        public function btnUsers_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminUsersView($pnlMain);
            $this->btnUsers->CssClass = 'mr-5 btn btn-primary';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default';          
        }
        
    	public function btnCompany_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminCompanysView($pnlMain);
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-primary';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
        
    	public function btnScorecards_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminScorecardsView($pnlMain);
            $this->btnScorecards->CssClass = 'mr-5 btn btn-primary';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
        
    	public function btnAssessments_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it          
            $pnlMain->RemoveChildControls(true);
            new AdminAssessmentsView($pnlMain);
            $this->btnAssessments->CssClass = 'mr-5 btn btn-primary';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
        
    	public function btnTenAssessments_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it          
            $pnlMain->RemoveChildControls(true);
            new AdminTenAssessmentsView($pnlMain);
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-primary';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
        
    	public function btnLemon_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it          
            $pnlMain->RemoveChildControls(true);
            new AdminLemonView($pnlMain);
            $this->btnLemon->CssClass = 'mr-5 mr-5 btn btn-primary';
            $this->btnTenAssessments->CssClass = 'mr-5 mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
    	public function btnGroup_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it          
            $pnlMain->RemoveChildControls(true);
            new AdminGroupView($pnlMain);
            $this->btnGroup->CssClass = 'mr-5 btn btn-primary';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
        
    	public function btnVenture_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminVentureView($pnlMain);
            $this->btnVenture->CssClass = 'mr-5 btn btn-primary';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default';
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default'; 
        }
        
    	public function btnChecklist_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminChecklistView($pnlMain);
            $this->btnChecklist->CssClass = 'mr-5 btn btn-primary';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default'; 
            $this->btnPartnering->CssClass = 'mr-5 btn btn-default';         
        }
        
    	public function btnPartnering_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminPartneringView($pnlMain);
            $this->btnChecklist->CssClass = 'mr-5 btn btn-default';
            $this->btnVenture->CssClass = 'mr-5 btn btn-default';
            $this->btnCompany->CssClass = 'mr-5 btn btn-default';
            $this->btnScorecards->CssClass = 'mr-5 btn btn-default';
            $this->btnAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnTenAssessments->CssClass = 'mr-5 btn btn-default';
            $this->btnLemon->CssClass = 'mr-5 btn btn-default';
            $this->btnGroup->CssClass = 'mr-5 btn btn-default';
            $this->btnUsers->CssClass = 'mr-5 btn btn-default'; 
            $this->btnPartnering->CssClass = 'mr-5 btn btn-primary';         
        }
        
    }