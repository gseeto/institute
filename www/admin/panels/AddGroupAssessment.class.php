<?php
    class AddGroupAssessment extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $txtKeyCode;
        public $txtDescription;
		public $txtTotalKeys;
		public $txtKeysLeft;
		public $lstAssessmentType;
		public $btnSubmit;
		public $btnCancel;
		
        protected $selectedUserArray;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AddGroupAssessment.tpl.php';

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
            $this->selectedUserArray = array();
            
            // Let's set up some other local child control
            
	
			$this->txtKeyCode = new QTextBox($this);
			$this->txtKeyCode->Name = 'Key Code';
			$this->txtKeyCode->Focus();

			$this->txtDescription = new QTextBox($this);
			$this->txtDescription->Name = 'Description';
			
			$this->txtTotalKeys = new QIntegerTextBox($this);
			$this->txtTotalKeys->Name = 'Total Keys';
			$this->txtTotalKeys->Width = 50;

			$this->txtKeysLeft = new QIntegerTextBox($this);
			$this->txtKeysLeft->Name = 'Keys Left';
			$this->txtKeysLeft->Width = 50;
			$this->lstAssessmentType = new QListBox($this);
			$this->lstAssessmentType->Name = 'AssessmentType';
			foreach(Resource::LoadAll() as $objResource) {
				if($objResource->Name != 'Scorecard')
					$this->lstAssessmentType->AddItem($objResource->Name, $objResource->Id);
			}
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Add Group Assessment";
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'primary';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }
        
    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->Visible = false;
	}
	
     public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
     	if(GroupAssessmentList::LoadByKeyCode($this->txtKeyCode->Text)) {
     		$this->txtKeyCode->HtmlAfter = '<br><span style="color:red;">Duplicate Keycode. Please select another.</span>';
     	} else {
     		$this->txtKeyCode->HtmlAfter = '';
			$objAssessment = new GroupAssessmentList();
			$objAssessment->KeyCode = $this->txtKeyCode->Text;
			$objAssessment->Description = $this->txtDescription->Text;
			$objAssessment->TotalKeys = ($this->txtTotalKeys->Text!= null)? $this->txtTotalKeys->Text : 1;
			$objAssessment->KeysLeft = ($this->txtKeysLeft->Text != null) ?$this->txtKeysLeft->Text : 1;
			$objAssessment->ResourceId = $this->lstAssessmentType->SelectedValue;
			$objAssessment->Save();
			$this->Visible = false;
			// And call the Form's Method CallBack, passing in "true" to state that we've made an update
	        $strMethodCallBack = $this->strMethodCallBack;
	        $this->objParent->$strMethodCallBack(true);
     	}
	}
	

    }