<?php
    class AdminUsersView extends QPanel {     
        public $dtgUsers;
        public $btnAdd;
        public $strFirstName;
		public $strUsername;
		public $strLastName;
		protected $selectedUserArray;
		public $btnMerge;
		public $btnSearch;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminUsersView.tpl.php';

 
        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            $this->selectedUserArray = array();
            $this->dtgUsers = new UserDataGrid($this);
            $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
			$this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirUser."viewUser.php" ?>','<?=$_CONTROL->ParentControl->RenderName($_ITEM)?>','Name');
			$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_CONTROL->ParentControl->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));
			
			$this->dtgUsers->MetaAddColumn('Email','Html=<?=$_ITEM->Email; ?>', 'HtmlEntities=False', 'Width=200px');
			$this->dtgUsers->MetaAddColumn('Country', 'Html=<?= $_CONTROL->ParentControl->RenderCountry($_ITEM); ?>','Width=100px');
			$this->dtgUsers->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->Id) ?>', 'HtmlEntities=false' ));
			$this->dtgUsers->AddColumn(new QDataGridColumn('Select Users to Merge', '<?= $_CONTROL->ParentControl->chkSelected_Render($_ITEM, $_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false', 'Width=200px' ));
			
			$this->dtgUsers->CellPadding = 5;
			$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
			$this->dtgUsers->NoDataHtml = 'No Users.';
			$this->dtgUsers->UseAjax = true;
			
			$this->dtgUsers->SortColumnIndex = 1;
			$this->dtgUsers->ItemsPerPage = 20;
		
			$this->dtgUsers->GridLines = QGridLines::Both;
		
			$objStyle = $this->dtgUsers->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgUsers->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgUsers->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $this->btnAdd = new QButton($this);
	        $this->btnAdd->Text = 'Add A User';
	        $this->btnAdd->CssClass = 'primary';
	        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAdd_Click'));
	        
	        $this->btnMerge = new QButton($this);
	        $this->btnMerge->Text = 'Merge The Selected Users';
	        $this->btnMerge->CssClass = 'primary';
	        $this->btnMerge->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnMerge_Click'));	     
	        
	        $this->strFirstName = new QTextBox($this);
			$this->strFirstName->Name = 'First Name';
			//$this->strFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			//$this->strFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			//$this->strFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			//$this->strFirstName->Focus();
			
			$this->strLastName = new QTextBox($this);
			$this->strLastName->Name = 'Last Name';
			//$this->strLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			//$this->strLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			//$this->strLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			//$this->strLastName->Focus();
			
			$this->strUsername = new QTextBox($this);
			$this->strUsername->Name = 'Username';
			//$this->strUsername->Width = 50;
			//$this->strUsername->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			//$this->strUsername->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			//$this->strUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
			$this->btnSearch = new QButton($this);
	        $this->btnSearch->Text = 'Search';
	        $this->btnSearch->CssClass = 'primary';
	        $this->btnSearch->AddAction(new QClickEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
          
        }
        
	    public function dtgUsers_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgUsers->PageNumber = 1;
			$this->dtgUsers->Refresh();
		}
		
    	public function dtgUsers_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$objClauses = QQ::Clause($this->dtgUsers->OrderByClause,$this->dtgUsers->LimitClause);
	
	    	if ($strName = trim($this->strFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::User()->FirstName, $strName . '%')
				);
			}
	
			if ($strName = trim($this->strLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::User()->LastName, $strName . '%')
				);
			}
			
			if ($strName = trim($this->strUsername->Text)) {
				$objLoginCondition = QQ::All();
				$objLoginCondition = QQ::AndCondition($objLoginCondition,
					QQ::Like( QQN::Login()->Username, $strName . '%')
				);
				$objLogin = Login::QuerySingle($objLoginCondition);
				if (null != $objLogin) {
					$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::User()->LoginId, (int)$objLogin->Id)
				);
				} 
			}
			
			$userArray = User::QueryArray($objConditions,$objClauses);		
			$this->dtgUsers->TotalItemCount = User::CountAll();
			$this->dtgUsers->DataSource = $userArray; 
		}
	
		public function RenderName($objUser) {
			return $objUser->FirstName . ' ' . $objUser->LastName;
		}
		
    	public function RenderUserName($intLoginId) {
    		$objLogin = Login::Load($intLoginId);
			return $objLogin->Username;
		}
        
   		public function RenderCompany($intUserId) {
    		$objCompanyArray = Company::LoadArrayByUser($intUserId);
    		if (null != $objCompanyArray) {
    			$strCompanys = '';
    			foreach($objCompanyArray as $objCompany) {
    				$strCompanys .= $objCompany->Name . ', ';
    			}
    			rtrim($strCompanys,', ');
				return $strCompanys;
    		} else {
    			return 'No Associated Company';
    		}
		}
		
    	public function RenderCountry(User $objUser) {
    		if($objUser->CountryId) {
    			return CountryList::Load($objUser->CountryId)->Name;
    		} else return ' ';
		}
	    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect(__SUBDIRECTORY__.'/admin/newUser.php');
		}
    
		public function btnMerge_Click ($strFormId, $strControlId, $strParameter) {
			$strArgs = implode('/',$this->selectedUserArray);
			QApplication::Redirect(__SUBDIRECTORY__.'/admin/mergeUsers.php/'.$strArgs);
		}
		public function chkSelected_Render(User $objUser, $intRow) {
	     	$strControlId = 'chkSelected' . $objUser->Id;
	
	        // Let's see if the Checkbox exists already
	        $chkSelected = $this->objForm->GetControl($strControlId);     
	        if (!$chkSelected) {
	            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
	            $chkSelected->Text = 'Select';
	            $chkSelected->ActionParameter = $objUser->Id;
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
    }