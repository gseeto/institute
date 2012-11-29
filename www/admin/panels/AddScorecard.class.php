<?php
    class AddScorecard extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $strName;
        public $lstCompany;
        public $btnSubmit;
        public $btnCancel;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AddScorecard.tpl.php';

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
                      	
			$this->strName = new QTextBox($this);
			$this->strName->Name = 'Scorecard Name';
			$this->strName->Focus();

			$this->lstCompany = new QListBox($this);
			$this->lstCompany->Name = 'Company';
			$this->lstCompany->AddItem('None');
			$objCompanyArray = Company::LoadAll();
			foreach( $objCompanyArray as $objCompany) {
				$this->lstCompany->AddItem($objCompany->Name,$objCompany->Id);				
			}
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Add Scorecard";
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'primary';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }       

	     public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			//Associate selected Users and hide panel
			$objScorecard = new Scorecard();
			$objScorecard->Name = $this->strName->Text;
			$objScorecard->ResourceId = 1; // Scorecard Identifier
			$objScorecard->CompanyId = $this->lstCompany->SelectedValue;
			$objScorecard->Save();			
			$this->Visible = false;
			// And call the Form's Method CallBack, passing in "true" to state that we've made an update
	        $strMethodCallBack = $this->strMethodCallBack;
	        $this->objParent->$strMethodCallBack(true);
		}
		
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->Visible = false;
		}
   
        
    }