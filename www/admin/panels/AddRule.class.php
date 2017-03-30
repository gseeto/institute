<?php
    class AddRule extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $lstStrategy;
		public $lstConditional;
		public $lstQuestion;
		public $objRule;

		public $btnSubmit;
        public $btnCancel;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = '../../admin/panels/AddRule.tpl.php';

        // Customize the Look/Feel
        protected $strPadding = '10px';
 
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
                      	
			$this->lstStrategy = new QListBox($this);
			$this->lstStrategy->Name = 'Strategy';
			$this->lstStrategy->CssClass = 'form-control';
			foreach( CannedStrategy::LoadAll() as $objCannedStrategy) {
        		$this->lstStrategy->AddItem($objCannedStrategy->Strategy,$objCannedStrategy->Id);
        	}
        	
			$this->lstConditional= new QListBox($this);
			$this->lstConditional->Name = 'Conditional';
			$this->lstConditional->CssClass = 'form-control';
        	foreach( ConditionalType::$NameArray as $key=>$value) {
        		$this->lstConditional->AddItem($value,$key);	
        	}
        	//$this->lstConditional->Width = 200;
 		
        	$this->lstQuestion = new QListBox($this);
			$this->lstQuestion->Name = 'Question';
			$this->lstQuestion->CssClass = 'form-control';
	        foreach(TenPQuestions::LoadAll() as $objQuestion) {
        		$this->lstQuestion->AddItem($objQuestion->Text,$objQuestion->Id);	
        	}
        	//$this->lstQuestion->Width = 600;
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Submit";
			$this->btnSubmit->CssClass = 'btn btn-default';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'btn btn-default';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }       
        
        public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			//Create a Rule and hide panel
			$objRule = new StrategyQuestionConditional();
			$objRule->StrategyId = $this->lstStrategy->SelectedValue;
			$objRule->ConditionalType = $this->lstConditional->SelectedValue;
			$objRule->QuestionId = $this->lstQuestion->SelectedValue;
			$objRule->Save();		
			
			$this->Visible = false;
			// And call the Form's Method CallBack, passing in "true" to state that we've made an update
	        $strMethodCallBack = $this->strMethodCallBack;
	        $this->objParent->$strMethodCallBack(true);
		}
		
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->Visible = false;
		}
   
 		
    }