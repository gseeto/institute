<?php
    class AddBusinesschecklist extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;      
		public $btnSubmit;
		public $btnCancel;
		public $lstCompanys;
        protected $selectedUserArray;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = '../../admin/panels/AddBusinesschecklist.tpl.php';

        // Customize the Look/Feel
        protected $strPadding = '10px';
      //  protected $strBackColor = '#fefece';

        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strMethodCallBack, $objParent, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            $this->objParent = $objParent;
            $this->strMethodCallBack = $strMethodCallBack;                     

            $this->lstCompanys = new QListBox($this);
	        $this->lstCompanys->HtmlBefore = 'Select from existing Companies: ';
	        $this->lstCompanys->CssClass = 'form-control';
			$companyArray = Company::LoadAll();
			$this->lstCompanys->AddItem('-None Selected-',0);
			foreach($companyArray as $objCompany) {
				$this->lstCompanys->AddItem($objCompany->Name, $objCompany->Id);
			}
            
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Add Company to Business Checklist";
			$this->btnSubmit->CssClass = 'btn btn-default';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'btn btn-default';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }          

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->Visible = false;
	}
	
     public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
		//Associate Company and hide panel
		$intCompanyId = $this->lstCompanys->SelectedValue;		
		if(BusinessChecklist::LoadArrayByCompanyId($intCompanyId)== null) {
			$objChecklist = new BusinessChecklist();
			$objChecklist->CompanyId = $intCompanyId;
			$objChecklist->Save();
		}
		
		$this->Visible = false;
		// And call the Form's Method CallBack, passing in "true" to state that we've made an update
        $strMethodCallBack = $this->strMethodCallBack;
        $this->objParent->$strMethodCallBack(true);
	}
	
	public function txtGroup_Render(User $objUser) {
     	$strControlId = 'txtGroup' . $objUser->Id;

        // Let's see if the text box exists already
        $txtGroup = $this->objForm->GetControl($strControlId);     
        if (!$txtGroup) {
            $txtGroup = new QTextBox($this->dtgUsers, $strControlId);           
            $txtGroup->Name = "Group:";
			$txtGroup->Width = 100;
        }
        return $txtGroup->Render(false);            
    }
 
    }