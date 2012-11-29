<?php
    class DlgAssociateSphere extends QDialogBox {
        // PUBLIC Child Controls
        public $lblStrategy;
        public $chkSpheres;

        public $btnUpdate;
        public $btnCancel;
        
        // Object Variables
        protected $strCloseCallback;
        protected $strAssociatedSpheres;
        protected $strStrategy;
        protected $intStrategyId;
        protected $intCategoryId;
        
        // Default Overrides
        protected $blnMatteClickable = false;
        protected $strTemplate = 'DlgAssociateSphere.tpl.php';
        //protected $strCssClass = 'calculator_widget';

        public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
            
            // Define local child controls
            $this->lblStrategy = new QLabel($this);
            $this->lblStrategy->Width = 400;
            $this->chkSpheres = array();
            foreach(Spheres::LoadAll() as $objSpheres) {
           		$chkSphere = new QCheckBox($this);
           		$chkSphere->Name = $objSpheres->Id;	
           		$chkSphere->Text = $objSpheres->Sphere;
           		$this->chkSpheres[] = $chkSphere;
           }
            $this->btnUpdate = new QButton($this);
            $this->btnUpdate->Text = 'Save/Update';
            $this->btnUpdate->CssClass = 'primary';
            $this->btnUpdate->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUpdate_Click'));
            
            $this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Cancel';
            $this->btnCancel->CssClass = 'primary';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
        }
      

        public function btnCancel_Click() {
            $this->HideDialogBox();
        }
        
        public function btnUpdate_Click() {
        	$this->strAssociatedSpheres = '';
        	$objStrategy = Strategy::Load($this->intStrategyId);     	   	
        	foreach($this->chkSpheres as $chkSphere) {
        		$objSphere = Spheres::Load($chkSphere->Name);
        		if($chkSphere->Checked) {
        			$this->strAssociatedSpheres .= $chkSphere->Text . ',';  
        			if (!$objStrategy->IsSpheresAsSphereAssociated($objSphere))    			
        				$objStrategy->AssociateSpheresAsSphere($objSphere);
        		} else {
        			$objStrategy->UnassociateSpheresAsSphere($objSphere);
        		}
        	}  
        	trim($this->strAssociatedSpheres,',');
            call_user_func(array($this->objForm, $this->strCloseCallback));
            $this->HideDialogBox();
        }

        /*
         * Used to initialize the values as the dialog box opens
         */
        public function ShowDialogBox() {
            parent::ShowDialogBox();
            $associatedArray = explode(',',$this->strAssociatedSpheres);
            foreach($this->chkSpheres as $chkSphere) {
        		if(in_array($chkSphere->Text,$associatedArray))
        			$chkSphere->Checked = true;
        		else 
        			$chkSphere->Checked = false;
        	}  
        	$this->lblStrategy->Text = $this->strStrategy;
        }

        /*
         * Getters and Setters to allow passing of information back to the parent
         */
        public function __get($strName) {
            switch ($strName) {
                case "AssociatedSpheres": return $this->strAssociatedSpheres;
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
                case "AssociatedSpheres":
                    // Depending on the format of $mixValue, set $this->strAssociatedSpheres appropriately
                    // It will try to cast to Integer if possible, otherwise Float, otherwise just 0
                    $this->strAssociatedSpheres = '';
                    try {                    
                        $this->strAssociatedSpheres = QType::Cast($mixValue, QType::String);
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