<?php
    class AdminNavView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $btnUsers;
        public $btnCompany;
        public $btnScorecards;
        public $btnAssessments;
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
            $this->btnUsers->CssClass = 'SideNavButton';
            $this->btnUsers->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUsers_Click'));
            
            $this->btnCompany = new QButton($this);
            $this->btnCompany->Name = 'Companies';
            $this->btnCompany->Text = 'Companies';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnCompany->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCompany_Click'));
            
            $this->btnScorecards = new QButton($this);
            $this->btnScorecards->Name = 'Scorecards';
            $this->btnScorecards->Text = 'Scorecards';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnScorecards->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScorecards_Click'));
        
            $this->btnAssessments = new QButton($this);
            $this->btnAssessments->Name = 'Assessments';
            $this->btnAssessments->Text = 'Assessments';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnAssessments->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAssessments_Click'));            
            
            $this->btnGroup = new QButton($this);
            $this->btnGroup->Name = 'Group';
            $this->btnGroup->Text = 'Group';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnGroup->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnGroup_Click'));            
            
            $this->btnVenture = new QButton($this);
            $this->btnVenture->Name = 'Venture ';
            $this->btnVenture->Text = 'Venture';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnVenture->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnVenture_Click'));            
            
            $this->btnPartnering = new QButton($this);
            $this->btnPartnering->Name = 'Partnering ';
            $this->btnPartnering->Text = 'Partnering';
            $this->btnPartnering->CssClass = 'SideNavButton';
            $this->btnPartnering->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnPartnering_Click'));
            
            $this->btnChecklist = new QButton($this);
            $this->btnChecklist->Name = 'Checklist ';
            $this->btnChecklist->Text = 'Checklist';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnChecklist->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnChecklist_Click')); 
            
            // Initialize main content panel
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);

            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            switch ($strDefaultTab) {
            	case 'users':
            		new AdminUsersView($pnlMain);
            		$this->btnUsers->CssClass = 'SideNavButtonSelected';
            		break;
            	case 'companies':
            		new AdminCompanysView($pnlMain);
            		$this->btnCompany->CssClass = 'SideNavButtonSelected';
            		break;
            	case 'assessments':
            		new AdminAssessmentsView($pnlMain);
            		$this->btnAssessments->CssClass = 'SideNavButtonSelected';
            		break;
            	case 'group':
            		new AdminGroupView($pnlMain);
            		$this->btnGroup->CssClass = 'SideNavButtonSelected';
            		break;
            	case 'scorecards':
            		new AdminScorecardsView($pnlMain);
            		$this->btnScorecards->CssClass = 'SideNavButtonSelected';
            		break;
            	case 'venture':
            		new AdminScorecardsView($pnlMain);
            		$this->btnVenture->CssClass = 'SideNavButtonSelected';
            		break;
            	case 'Partnering':
            		new AdminScorecardsView($pnlMain);
            		$this->btnPartnering->CssClass = 'SideNavButtonSelected';
            		break;
            	default:
            		new AdminUsersView($pnlMain);
            		$this->btnUsers->CssClass = 'SideNavButtonSelected';
            		break;          		
            }
            
        }
        
        // Event Handlers Here      
        public function btnUsers_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminUsersView($pnlMain);
            $this->btnUsers->CssClass = 'SideNavButtonSelected';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnPartnering->CssClass = 'SideNavButton';          
        }
        
    	public function btnCompany_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminCompanysView($pnlMain);
            $this->btnUsers->CssClass = 'SideNavButton';
            $this->btnCompany->CssClass = 'SideNavButtonSelected';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnPartnering->CssClass = 'SideNavButton'; 
        }
        
    	public function btnScorecards_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminScorecardsView($pnlMain);
            $this->btnScorecards->CssClass = 'SideNavButtonSelected';
            $this->btnUsers->CssClass = 'SideNavButton';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnPartnering->CssClass = 'SideNavButton'; 
        }
        
    	public function btnAssessments_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it          
            $pnlMain->RemoveChildControls(true);
            new AdminAssessmentsView($pnlMain);
            $this->btnAssessments->CssClass = 'SideNavButtonSelected';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnUsers->CssClass = 'SideNavButton';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnPartnering->CssClass = 'SideNavButton'; 
        }
        
    	public function btnGroup_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it          
            $pnlMain->RemoveChildControls(true);
            new AdminGroupView($pnlMain);
            $this->btnGroup->CssClass = 'SideNavButtonSelected';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnUsers->CssClass = 'SideNavButton';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnPartnering->CssClass = 'SideNavButton'; 
        }
        
    	public function btnVenture_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminVentureView($pnlMain);
            $this->btnVenture->CssClass = 'SideNavButtonSelected';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnUsers->CssClass = 'SideNavButton';
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnPartnering->CssClass = 'SideNavButton'; 
        }
        
    	public function btnChecklist_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminChecklistView($pnlMain);
            $this->btnChecklist->CssClass = 'SideNavButtonSelected';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnUsers->CssClass = 'SideNavButton'; 
            $this->btnPartnering->CssClass = 'SideNavButton';         
        }
        
    	public function btnPartnering_Click($strFormId, $strControlId, $strParameter) {
            $pnlMain = $this->objForm->GetControl($this->strPanelMainControlId);
            // First, remove all children panels from pnlMain. Then populate it
            $pnlMain->RemoveChildControls(true);
            new AdminPartneringView($pnlMain);
            $this->btnChecklist->CssClass = 'SideNavButton';
            $this->btnVenture->CssClass = 'SideNavButton';
            $this->btnCompany->CssClass = 'SideNavButton';
            $this->btnScorecards->CssClass = 'SideNavButton';
            $this->btnAssessments->CssClass = 'SideNavButton';
            $this->btnGroup->CssClass = 'SideNavButton';
            $this->btnUsers->CssClass = 'SideNavButton'; 
            $this->btnPartnering->CssClass = 'SideNavButtonSelected';         
        }
        
    }