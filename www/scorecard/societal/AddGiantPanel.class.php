<?php
    class AddGiantPanel extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $txtGiant;
        public $txtCountry;
     	public $btnAddNewGiant;
     	public $btnCancelGiant;
        protected $strMethodCallBack;
        protected $intStrategyId;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'AddGiantPanel.tpl.php';

        // Customize the Look/Feel
        protected $strPadding = '10px';

        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $intStrategyId, $strMethodCallBack, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            
            $this->strMethodCallBack = $strMethodCallBack;
            $this->intStrategyId = $intStrategyId;
            $this->pnlTitle = 'Add a Societal Ill to the list';
                        
            // Let's set up some other local child control
            $this->txtGiant = new QTextBox($this);
            $this->txtGiant->Name = 'Add a Societal Ill:';
        	$this->txtCountry = new QTextBox($this);
        	$this->txtCountry->Name = 'Specify the Country where this issue is being addressed:';
     		$this->btnAddNewGiant = new QButton($this);
     		$this->btnAddNewGiant->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAddNewGiant_Click')); 
     		$this->btnAddNewGiant->Text = 'Add Societal Ill';  
     		$this->btnAddNewGiant->CssClass = 'primary';  		
     		$this->btnCancelGiant = new QButton($this);
     		$this->btnCancelGiant->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancelGiant_Click'));
     		$this->btnCancelGiant->Text = 'Cancel';
     		$this->btnCancelGiant->CssClass = 'primary';
        }
        
        public function btnAddNewGiant_Click() {
        	$objGiant = new Giants();
        	$objGiant->Giant = $this->txtGiant->Text;
        	$objGiant->Country = $this->txtCountry->Text;
        	$intGiantId = $objGiant->Save();
        	$this->Visible = false;
        	// Associate the giant with the strategy
        	$objStrategy = Strategy::Load($this->intStrategyId);
        	$objStrategy->AssociateGiantsAsGiant($objGiant);
			// And call the Form's Method CallBack, passing in "true" to state that we've made an update
	        $strMethodCallBack = $this->strMethodCallBack;
	        $this->objForm->dlgAssociateGiant->$strMethodCallBack(true);
        }
        
        public function btnCancelGiant_Click() {
        	$this->Visible = false;
        }
        
    }