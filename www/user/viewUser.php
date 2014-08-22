<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class ViewUserForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Administration';
	protected $intNavSectionId = InstituteForm::NavSectionAdministration;
	
	protected $txtFirstName;
	protected $txtLastName;
	protected $txtEmail;
	protected $lstGender;
	protected $lstCountry;
	protected $txtUserName;
	protected $txtPassword;
	protected $lstRole;
 	protected $btnSubmit;
 	protected $btnCancel;
 	protected $objUser;
 	protected $objLogin;
 	protected $mctUser;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objUser = User::Load(QApplication::PathInfo(0));
		$this->objLogin = Login::Load($this->objUser->LoginId);
		
		$this->mctUser = new UserMetaControl($this,$this->objUser);
		$this->txtFirstName = $this->mctUser->txtFirstName_Create();
		$this->txtFirstName->Name = 'First Name : ';
		$this->txtFirstName->TextMode = QTextMode::SingleLine;
		
	 	$this->txtLastName  = $this->mctUser->txtLastName_Create();
	 	$this->txtLastName->Name = 'Last Name : ';
	 	$this->txtLastName->TextMode = QTextMode::SingleLine;
	 	
	 	$this->txtEmail= $this->mctUser->txtEmail_Create();
	 	$this->txtEmail->Name = 'Email : ';
	 	$this->txtEmail->TextMode = QTextMode::SingleLine;
	 	
	 	$this->lstGender = new QListBox($this);
	 	$this->lstGender->Name = 'Gender : ';
	 	if ($this->objUser->Gender == 1) {
		 	$this->lstGender->AddItem('Male',1,true);
		 	$this->lstGender->AddItem('Female',0);
	 	} else {
	 		$this->lstGender->AddItem('Male',1);
		 	$this->lstGender->AddItem('Female',0,true);
	 	}
	 	
	 	$this->lstCountry = $this->mctUser->lstCountry_Create();
	 	$this->lstCountry->Name = 'Country : ';

	 	
	 	$this->txtUserName = new QTextBox($this);
	 	$this->txtUserName->Name = 'UserName : ';
	 	$this->txtUserName->Text = $this->objLogin->Username;
	 	
	 	$this->txtPassword = new QTextBox($this);
	 	$this->txtPassword->Name = 'Password : ';
	 	$this->txtPassword->TextMode = QTextMode::Password;
	 	$this->txtPassword->Text = $this->objLogin->Password;
	 	
	 	$this->lstRole = new QListBox($this);
	 	$this->lstRole->Name = 'Role';
	 	$roleArray = Role::LoadAll();
	 	foreach ($roleArray as $objRole) {
	 		if ($this->objLogin->RoleId == $objRole->Id) {
	 			$this->lstRole->AddItem($objRole->Name, $objRole->Id,true);
	 		} else {
	 			$this->lstRole->AddItem($objRole->Name, $objRole->Id);
	 		}
	 	}
 	 
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Update';
	 	$this->btnSubmit->CssClass = 'primary';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
	 	
	 	$this->btnCancel = new QButton($this);
	 	$this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'primary';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
 	 
	}

	protected function btnSubmit_Click() {
		$this->objLogin->Username = $this->txtUserName->Text;
		$this->objLogin->Password = $this->txtPassword->Text;
		$this->objLogin->RoleId = $this->lstRole->SelectedValue;
		$this->objLogin->Save();
		
		$this->objUser->Gender = $this->lstGender->SelectedValue;	
		$this->objUser->Save();	
		$this->mctUser->SaveUser();
		
		QApplication::Redirect(__SUBDIRECTORY__.'/admin/index.php/users');
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/admin/index.php/users');
	}
}

ViewUserForm::Run('ViewUserForm');
?>