<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
require('addMembersPanel.php');

class ViewCompanyForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Manage Companies';
	protected $txtName;
	protected $txtAddress;
	protected $txtCity;
	protected $txtState;
	protected $txtZipCode;
	protected $txtCountry;
	protected $chkIndustryArray;
	
	protected $dtgMembers;
	protected $btnAddMember;
	protected $pnlAddMember;
	
 	protected $btnSubmit;
 	protected $btnCancel;

 	protected $objCompany;
 	protected $objAddress;
 	protected $mctAddress;
 	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
		QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-companies').className = 'active';"); 
	}
	
	protected function Form_Create() {
		$this->objCompany = Company::Load(QApplication::PathInfo(0));
		$this->objAddress = Address::Load($this->objCompany->AddressId);
		
		$this->txtName = new QTextBox($this);
		$this->txtName->Name = 'Company Name : ';
		$this->txtName->Text = $this->objCompany->Name;
		$this->txtName->CssClass = 'form-control';
		
		$this->mctAddress = new AddressMetaControl($this,$this->objAddress);

		$this->txtAddress  = $this->mctAddress->txtAddress1_Create(); 
	 	$this->txtAddress->Name = 'Address';
	 	$this->txtAddress->CssClass = 'form-control';
	 	
	 	$this->txtCity= $this->mctAddress->txtCity_Create();
	 	$this->txtCity->Name = 'City : ';
	 	$this->txtCity->TextMode = 'SingleLine';
	 	$this->txtCity->CssClass = 'form-control';
	 	
	 	$this->txtState = $this->mctAddress->txtState_Create(); 
	 	$this->txtState->Name = 'State : ';
	 	$this->txtState->TextMode = 'SingleLine';
	 	$this->txtState->CssClass = 'form-control';
	 	
	 	$this->txtZipCode = $this->mctAddress->txtZipCode_Create(); 
	 	$this->txtZipCode->Name = 'ZipCode : ';
	 	$this->txtZipCode->TextMode = 'SingleLine';
	 	$this->txtZipCode->CssClass = 'form-control';
	 	
	 	$this->txtCountry = $this->mctAddress->txtCountry_Create();
	 	$this->txtCountry->Name = 'Country : ';
	 	$this->txtCountry->TextMode = 'SingleLine';
	 	$this->txtCountry->CssClass = 'form-control';
	 	
	 	$industryArray = Industry::LoadAll();
	 	$this->chkIndustryArray = array();
	 	foreach ($industryArray as $objIndustry) {
	 		$chkIndustry = new QCheckBox($this);
	 		$chkIndustry->Name = $objIndustry->Id;
	 		$chkIndustry->Text = $objIndustry->Value;
	 		$chkIndustry->CssClass = 'checkbox';
	 		if ($this->objCompany->IsIndustryAssociated($objIndustry))
	 			$chkIndustry->Checked = true;
	 		$this->chkIndustryArray[] = $chkIndustry;
	 	}
 	 
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Update';
	 	$this->btnSubmit->CssClass = 'btn btn-default';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
	 	
	 	$this->btnCancel = new QButton($this);
	 	$this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'btn btn-default';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
	 	
	 	$this->btnAddMember = new QButton($this);
	 	$this->btnAddMember->Text = 'Add a Member To  Company';
	 	$this->btnAddMember->CssClass = 'btn btn-default';
	 	$this->btnAddMember->AddAction(new QClickEvent(), new QAjaxAction('btnAddMember_Click'));
	 	
	 	$this->dtgMembers = new UserDataGrid($this);
	 	$this->dtgMembers->Paginator = new QPaginator($this->dtgMembers);
		$this->dtgMembers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirUser."viewUser.php" ?>','<?=$_FORM->RenderName($_ITEM)?>','Name'); 
		$this->dtgMembers->AddColumn(new QDataGridColumn('Username', '<?= $_FORM->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));		
		$this->dtgMembers->MetaAddColumn('Email','Html=<?=$_ITEM->Email; ?>', 'HtmlEntities=False', 'Width=200px');
            
		$this->dtgMembers->CellPadding = 5;
		$this->dtgMembers->SetDataBinder('dtgMembers_Bind',$this);
		$this->dtgMembers->NoDataHtml = 'No Users.';
		$this->dtgMembers->UseAjax = true;
		$this->dtgMembers->CssClass = 'table table-hover table-striped';
		
		$this->dtgMembers->SortColumnIndex = 1;
		$this->dtgMembers->ItemsPerPage = 20;	
		
        $objStyle = $this->dtgMembers->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgMembers->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
 	 
        $this->pnlAddMember = new QPanel($this);
        $this->pnlAddMember->Position = QPosition::Relative;
        $this->pnlAddMember->Visible = false;
        $this->pnlAddMember->AutoRenderChildren = true;
	}

	public function dtgMembers_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$userArray = User::QueryArray($objConditions,$objClauses);
			$memberArray = array();		
			foreach ($userArray as $objUser) {
				if ($objUser->IsCompanyAssociated($this->objCompany))
					$memberArray[] = $objUser;
			}
			$this->dtgMembers->DataSource = $memberArray; 
		}
	
	public function RenderName(User $objUser) {
		return $objUser->FirstName . ' ' . $objUser->LastName;
	}
	
    public function RenderUserName($intLoginId) {
    	$objLogin = Login::Load($intLoginId);
    	if(null != $objLogin)
			return $objLogin->Username;
		else 
			return 'None';
	}
		
	protected function btnAddMember_Click() {
		// Open up the panel and allow the adding of members to the company
        $this->pnlAddMember->Visible = true;
        $this->pnlAddMember->RemoveChildControls(true);
        $pnlAddmemberView = new AddMembersPanel($this->pnlAddMember,$this->objCompany,'UpdateMemberList');		
	}
	
 	// Method Call back for the  panels 
    public function UpdateMemberList($blnUpdatesMade) {
    	$this->dtgMembers->PageNumber = 1;
		$this->dtgMembers->Refresh();
    }
    
	protected function btnSubmit_Click() {
		$this->mctAddress->SaveAddress();
		$this->objCompany->Name = $this->txtName->Text;
		$this->objCompany->Save();
		
		foreach ($this->chkIndustryArray as $chkIndustry) {
			if ($chkIndustry->Checked) {
				$objIndustry = Industry::Load($chkIndustry->Name);
				$this->objCompany->AssociateIndustry($objIndustry);
			}
		}

		QApplication::Redirect(__SUBDIRECTORY__.'/administration/companies/');
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/administration/companies/');
	}
}

ViewCompanyForm::Run('ViewCompanyForm');
?>