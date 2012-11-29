<?php
    class AddScorecardUser extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $dtgUsers;
        public $lstScorecard;
        public $btnSubmit;
        public $btnCancel;
        protected $selectedUserArray;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AddScorecardUser.tpl.php';

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

            $this->selectedUserArray = array();
            $this->objParent = $objParent;
            $this->strMethodCallBack = $strMethodCallBack;
            
            $this->dtgUsers = new UserDataGrid($this);    
			$this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
			$this->dtgUsers->MetaAddColumn('FirstName','Html=<?=$_ITEM->FirstName; ?>', 'HtmlEntities=False', 'Width=200px');
			$this->dtgUsers->MetaAddColumn('LastName', 'Html=<?=$_ITEM->LastName; ?>','Width=100px', 'Width=200px');
			$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_CONTROL->ParentControl->RenderUsername($_ITEM) ?>', 'HtmlEntities=false' ));          
            $this->dtgUsers->AddColumn(new QDataGridColumn('Select User', '<?= $_CONTROL->ParentControl->chkSelected_Render($_ITEM) ?>', 'HtmlEntities=false' ));
            
			$this->dtgUsers->CellPadding = 5;
			$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
			$this->dtgUsers->NoDataHtml = 'No Users To add';
			$this->dtgUsers->UseAjax = true;
			
			$this->dtgUsers->SortColumnIndex = 1;
			$this->dtgUsers->ItemsPerPage = 20;
			$this->dtgUsers->GridLines = QGridLines::Horizontal;
			
			$objStyle = $this->dtgUsers->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
		
	        $objStyle = $this->dtgUsers->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgUsers->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
			$this->lstScorecard = new QListBox($this);
			$this->lstScorecard->Name = 'Scorecard';
			$objScorecardArray = Scorecard::LoadAll();
			$isFirst = true;
			foreach( $objScorecardArray as $objScorecard) {
				if($isFirst) {
					$isFirst = false;
					$this->lstScorecard->AddItem($objScorecard->Name,$objScorecard->Id,true);
				} else {
					$this->lstScorecard->AddItem($objScorecard->Name,$objScorecard->Id);
				}				
			}
			$this->lstScorecard->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Add Users to Scorecard";
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'primary';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }       

	     public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			//Associate selected Users and hide panel
	     	$intScorecardIndex = $this->lstScorecard->SelectedValue;
			if ($intScorecardIndex) {
				foreach($this->selectedUserArray as $intUserId) {
					$objUser = User::Load($intUserId);
					$objScorecard = Scorecard::Load($intScorecardIndex);
					$objScorecard->AssociateUser($objUser);
				}		
				$this->Visible = false;
				// And call the Form's Method CallBack, passing in "true" to state that we've made an update
		        $strMethodCallBack = $this->strMethodCallBack;
		        $this->objParent->$strMethodCallBack(true);
			} else {
				// give a message indicating a Scorecard must be selected
			}
		}
		
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->Visible = false;
		}
		
	    // This method (declared as public) will help with the checkbox column rendering
	    public function chkSelected_Render(User $objUser) {
	     	$strControlId = 'chkSelected' . $objUser->Id;
	
	        // Let's see if the Checkbox exists already
	        $chkSelected = $this->objForm->GetControl($strControlId);     
	        if (!$chkSelected) {
	            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
	            $chkSelected->Text = 'Select';
	            $chkSelected->ActionParameter = $objUser->Id;
	            $chkSelected->CssClass = 'transparent';
	            $chkSelected->AddAction(new QClickEvent(), new QAjaxControlAction($this,'chkSelected_Click'));
	        }
	        return $chkSelected->Render(false);
	            
	    }
	        
	    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
			$intUserId = $strParameter;
			if ($this->objForm->GetControl($strControlId)->Checked) {
				if (!in_array ($intUserId, $this->selectedUserArray))
					$this->selectedUserArray[] = $intUserId;
			} else {
				$key = array_search($intUserId, $this->selectedUserArray);
				unset($this->selectedUserArray[$key]);
			}
	    }

	    public function dtgUsers_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgUsers->PageNumber = 1;
			$this->dtgUsers->Refresh();
		}
		
		public function dtgUsers_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$userArray = User::QueryArray($objConditions,$objClauses);	
			// Remove all users already associated with selected Scorecard
			$intScorecardIndex = $this->lstScorecard->SelectedValue;
			if ($intScorecardIndex) {
				$availableUserArray = array();
				$objScorecard = Scorecard::Load($intScorecardIndex);
				foreach($userArray as $objUser) {
					if(!$objScorecard->IsUserAssociated($objUser)) {
						$availableUserArray[] = $objUser;
					}	
				}
				$this->dtgUsers->DataSource = $availableUserArray; 
			} else {
				$this->dtgUsers->DataSource = $userArray; 
			}
		}
	
		public function RenderUsername($objUser) {
			$objLogin = Login::Load($objUser->LoginId);
			if($objLogin) {
				return $objLogin->Username;
			} else {
				return 'None';
			}
		}  
        
    }