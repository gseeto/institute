<?php
    class DlgAssociateGiant extends QDialogBox {
        // PUBLIC Child Controls
        public $lblStrategy;
        public $lstGiants;
        public $lstSelectedGiants;
        public $btnSelect;
        public $btnDeselect;
        public $btnAddGiant;
        public $pnlAddGiant;
        public $btnUpdate;
        public $btnCancel;
        
        // Object Variables
        protected $strCloseCallback;
        protected $strAssociatedGiants;
        protected $strStrategy;
        protected $intStrategyId;
        protected $intCategoryId;
        
        // Default Overrides
        protected $blnMatteClickable = false;
        protected $strTemplate = 'DlgAssociateGiant.tpl.php';
        //protected $strCssClass = 'calculator_widget';

        public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
            
            // Define local child controls
            $this->lblStrategy = new QLabel($this);
            $this->lblStrategy->Width = 400;
            
            $this->lstGiants = new QListBox($this);
            $this->lstGiants->Height = 80;
            $this->lstGiants->SelectionMode = QSelectionMode::Multiple;
        	$this->lstSelectedGiants = new QListBox($this);
        	$this->lstSelectedGiants->Height = 80;
        	$this->lstSelectedGiants->SelectionMode = QSelectionMode::Multiple;
        	
        	$this->btnSelect = new QButton($this);
        	$this->btnSelect->Text = ' >> ';
        	$this->btnSelect->CssClass = 'primary';
        	$this->btnSelect->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSelect_Click'));            
        	
        	$this->btnDeselect = new QButton($this);
        	$this->btnDeselect->Text = ' << ';
        	$this->btnDeselect->CssClass = 'primary';
        	$this->btnDeselect->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDeselect_Click')); 	
        	
        	$this->btnAddGiant = new QButton($this);
        	$this->btnAddGiant->CssClass = 'societalButton';
        	$this->btnAddGiant->Text = 'add to the list';
        	$this->btnAddGiant->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAddGiant_Click'));    
        	
        	$this->pnlAddGiant = new QPanel($this);
        	$this->pnlAddGiant->Visible = false;
        	$this->pnlAddGiant->AutoRenderChildren = true;
        	        	        	
            $this->btnUpdate = new QButton($this);
            $this->btnUpdate->Text = 'Save/Update';
            $this->btnUpdate->CssClass = 'primary';
            $this->btnUpdate->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUpdate_Click'));
            
            $this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Cancel';
            $this->btnCancel->CssClass = 'primary';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
        }
      
        public function btnAddGiant_Click() {
        	$this->pnlAddGiant->Visible = true;
        	$this->pnlAddGiant->RemoveChildControls(true);
        	$pnlAddNewGiant = new AddGiantPanel($this->pnlAddGiant,$this->intStrategyId,'UpdateListbox');		
        }
        
	    // Method Call back for the  panels 
	    public function UpdateListbox($blnUpdatesMade) {
	    	$objStrategy = Strategy::Load($this->intStrategyId);
            $giantsArray = Giants::LoadAll();
            $this->lstSelectedGiants->RemoveAllItems();
            foreach($giantsArray as $objGiant) {
            	if ($objStrategy->IsGiantsAsGiantAssociated($objGiant)) {
            		$this->lstSelectedGiants->AddItem($objGiant->Giant.'('.$objGiant->Country.')',$objGiant->Id);
            	} 
            }
	    }
         
        public function btnSelect_Click() {
        	if($this->lstGiants->SelectedValue) {
        		$objGiant = Giants::Load($this->lstGiants->SelectedValue);
        		$this->lstSelectedGiants->AddItem($objGiant->Giant.'('.$objGiant->Country.')',$objGiant->Id);
        		$this->lstGiants->RemoveItem($this->lstGiants->SelectedIndex);
        	}
        }

    	public function btndeSelect_Click() {
    		if($this->lstSelectedGiants->SelectedValue) {
        		$objGiant = Giants::Load($this->lstSelectedGiants->SelectedValue);
        		$this->lstGiants->AddItem($objGiant->Giant.'('.$objGiant->Country.')',$objGiant->Id);
        		$this->lstSelectedGiants->RemoveItem($this->lstSelectedGiants->SelectedIndex);
        	}
        }
        
        public function btnCancel_Click() {
            $this->HideDialogBox();
        }
        
        public function btnUpdate_Click() {
        	$this->strAssociatedGiants = '';
        	$objStrategy = Strategy::Load($this->intStrategyId);
        	for($i=0; $i< $this->lstSelectedGiants->CountItems(); $i++) {
        		$objGiant = Giants::Load($this->lstSelectedGiants->GetItem($i)->Value);
        		if(!$objStrategy->IsGiantsAsGiantAssociated($objGiant))
        			$objStrategy->AssociateGiantsAsGiant($objGiant);
        	}
        	for($i=0; $i< $this->lstGiants->CountItems(); $i++) {
        		$objGiant = Giants::Load($this->lstGiants->GetItem($i)->Value);
        		if($objStrategy->IsGiantsAsGiantAssociated($objGiant))
        			$objStrategy->UnassociateGiantsAsGiant($objGiant);
        	}
            call_user_func(array($this->objForm, $this->strCloseCallback));
            $this->HideDialogBox();
        }
    
        /*
         * Used to initialize the values as the dialog box opens
         */
        public function ShowDialogBox() {
            parent::ShowDialogBox();
            $objStrategy = Strategy::Load($this->intStrategyId);
            $this->lstSelectedGiants->RemoveAllItems();
            $this->lstGiants->RemoveAllItems();
            $giantsArray = Giants::LoadAll();
            foreach($giantsArray as $objGiant) {
            	if ($objStrategy->IsGiantsAsGiantAssociated($objGiant)) {
            		$this->lstSelectedGiants->AddItem($objGiant->Giant.' ('.$objGiant->Country.')',$objGiant->Id);
            	} else {
            		$this->lstGiants->AddItem($objGiant->Giant.' ('.$objGiant->Country.')',$objGiant->Id);
            	}
            }
        	$this->lblStrategy->Text = $this->strStrategy;
        }

        /*
         * Getters and Setters to allow passing of information back to the parent
         */
        public function __get($strName) {
            switch ($strName) {
                case "AssociatedGiants": return $this->strAssociatedGiants;
                case "Strategy": return $this->strStrategy;
                case "StrategyId": return $this->intStrategyId;
                case "CategoryId": return $this->intCategoryId;
                default:
                    try {
                        return parent::__get($strName);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
            }
        }

        public function __set($strName, $mixValue) {
            $this->blnModified = true;

            switch ($strName) {
                case "AssociatedGiants":
                    // Depending on the format of $mixValue, set $this->strAssociatedGiants appropriately
                    // It will try to cast to Integer if possible, otherwise Float, otherwise just 0
                    $this->strAssociatedGiants = '';
                    try {                    
                        $this->strAssociatedGiants = QType::Cast($mixValue, QType::String);
                        break;
                    } catch (QInvalidCastException $objExc) {}        
                    break;

                case "Strategy":
                	$this->strStrategy = '';
                	try {                    
                        $this->strStrategy = QType::Cast($mixValue, QType::String);
                        break;
                    } catch (QInvalidCastException $objExc) {}        
                    break;
                    
                case "StrategyId":
                	$this->intStrategyId = 0;
                	try {                    
                        $this->intStrategyId = QType::Cast($mixValue, QType::Integer);
                        break;
                    } catch (QInvalidCastException $objExc) {}        
                    break; 

                case "CategoryId":
                	$this->intCategoryId = 0;
                	try {                    
                        $this->intCategoryId = QType::Cast($mixValue, QType::Integer);
                        break;
                    } catch (QInvalidCastException $objExc) {}        
                    break; 
                    
                default:
                    try {
                        parent::__set($strName, $mixValue);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
                    break;
            }
        }
    }
?>