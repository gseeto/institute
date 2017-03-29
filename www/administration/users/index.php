<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminUserForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage Users';
	public $dtgUsers;
    public $btnAdd;
    public $strFirstName;
    public $strUsername;
    public $strLastName;
    protected $selectedUserArray;
    public $btnMerge;
    public $btnSearch;
    protected $lblMsg;
	
    protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
    	if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-users').className = 'active';");    	
    }
    
	protected function Form_Create() {	
		$this->lblMsg = new QLabel($this);
		$this->lblMsg->Text = 'You must select users to merge';
		$this->lblMsg->CssClass = 'text-danger';
		$this->lblMsg->Display = false;
				
		$this->selectedUserArray = array();
		$this->dtgUsers = new UserDataGrid($this);
		$this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
		$this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirUser."viewUser.php" ?>','<?=$_FORM->RenderName($_ITEM)?>','Name');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_FORM->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));			
		$this->dtgUsers->MetaAddColumn('Email','Html=<?=$_ITEM->Email; ?>', 'HtmlEntities=False', 'Width=200px');
		$this->dtgUsers->MetaAddColumn('Country', 'Html=<?= $_FORM->RenderCountry($_ITEM); ?>','Width=100px');
		/* $this->dtgUsers->AddColumn(new QDataGridColumn('Company', '<?= $_FORM->RenderCompany($_ITEM->Id) ?>', 'HtmlEntities=false' )); */
		$this->dtgUsers->AddColumn(new QDataGridColumn('Select Users to Merge', '<?= $_FORM->chkSelected_Render($_ITEM, $_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false', 'Width=200px' ));
		$this->dtgUsers->CssClass = 'table table-striped table-hover';
		$this->dtgUsers->CellPadding = 5;
		$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
		$this->dtgUsers->NoDataHtml = 'No Users.';
		$this->dtgUsers->UseAjax = true;
			
		$this->dtgUsers->SortColumnIndex = 1;
		$this->dtgUsers->ItemsPerPage = 20;
					
        $objStyle = $this->dtgUsers->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgUsers->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	        
        $this->btnAdd = new QButton($this);
        $this->btnAdd->Text = 'Add A User';
        $this->btnAdd->CssClass = 'btn btn-primary';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));
	        
        $this->btnMerge = new QButton($this);
        $this->btnMerge->Text = 'Merge The Selected Users';
        $this->btnMerge->CssClass = 'btn btn-primary';
        $this->btnMerge->AddAction(new QClickEvent(), new QAjaxAction('btnMerge_Click'));	     
        
        $this->strFirstName = new QTextBox($this);
		$this->strFirstName->Name = 'First Name';
		$this->strFirstName->CssClass = 'form-control';
		
		$this->strLastName = new QTextBox($this);
		$this->strLastName->Name = 'Last Name';
		$this->strLastName->CssClass = 'form-control';
		
		$this->strUsername = new QTextBox($this);
		$this->strUsername->Name = 'Username';
		$this->strUsername->CssClass = 'form-control';
		
		$this->btnSearch = new QButton($this);
        $this->btnSearch->Text = 'Search';
        $this->btnSearch->CssClass = 'btn btn-default';
        $this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('dtgUsers_Refresh'));	
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
			$this->lblMsg->Display = false;
			$strArgs = implode('/',$this->selectedUserArray);
			if($strArgs != null)
				QApplication::Redirect(__SUBDIRECTORY__.'/admin/mergeUsers.php/'.$strArgs);
			else {
				$this->lblMsg->Display = true;
			}
		}
		public function chkSelected_Render(User $objUser, $intRow) {
	     	$strControlId = 'chkSelected' . $objUser->Id;
	
	        // Let's see if the Checkbox exists already
	        $chkSelected = $this->GetControl($strControlId);     
	        if (!$chkSelected) {
	            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
	            $chkSelected->Text = 'Select';
	            $chkSelected->ActionParameter = $objUser->Id;
	            $chkSelected->CssClass = 'checkbox';
	            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chkSelected_Click'));
	        }
	        return $chkSelected->Render(false);	            
	    }
    	
	    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
			$intUserId = $strParameter;
			$objChkSelected = $this->GetControl($strControlId);
			if($objChkSelected) {
				if ($objChkSelected->Checked) {
					if (!in_array ($intUserId, $this->selectedUserArray))
						$this->selectedUserArray[] = $intUserId;
				} else {
					$key = array_search($intUserId, $this->selectedUserArray);
					unset($this->selectedUserArray[$key]);
				}
			}
    	}
}

AdminUserForm::Run('AdminUserForm');
?>