<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class NewUserForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Administration';
	protected $intNavSectionId = InstituteForm::NavSectionAdministration;
	
	protected $txtFirstName;
	protected $txtLastName;
	protected $txtEmail;
	protected $lstGender;
	protected $txtCountry;
	protected $txtUserName;
	protected $txtPassword;
	protected $lstRole;
 	protected $btnSubmit;
 	protected $btnCancel;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/inst/index.php');
	}
	
	protected function Form_Create() {
		$this->txtFirstName = new QTextBox($this);
		$this->txtFirstName->Name = 'First Name : ';
		
	 	$this->txtLastName  = new QTextBox($this);
	 	$this->txtLastName->Name = 'Last Name : ';
	 	
	 	$this->txtEmail= new QTextBox($this);
	 	$this->txtEmail->Name = 'Email : ';
	 	
	 	$this->lstGender = new QListBox($this);
	 	$this->lstGender->Name = 'Gender : ';
	 	$this->lstGender->AddItem('Male',1);
	 	$this->lstGender->AddItem('Female',0);
	 	
	 	$this->txtCountry = new QTextBox($this);
	 	$this->txtCountry->Name = 'Country : ';
	 	
	 	$this->txtUserName = new QTextBox($this);
	 	$this->txtUserName->Name = 'UserName : ';
	 	
	 	$this->txtPassword = new QTextBox($this);
	 	$this->txtPassword->Name = 'Password : ';
	 	$this->txtPassword->TextMode = QTextMode::Password;
	 	
	 	$this->lstRole = new QListBox($this);
	 	$this->lstRole->Name = 'Role';
	 	$roleArray = Role::LoadAll();
	 	foreach ($roleArray as $objRole) {
	 		$this->lstRole->AddItem($objRole->Name, $objRole->Id);
	 	}
 	 
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'primary';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
	 	
	 	$this->btnCancel = new QButton($this);
	 	$this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'primary';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
 	 
	}

	protected function btnSubmit_Click() {
		$objLogin = new Login();
		$objLogin->Username = $this->txtUserName->Text;
		$objLogin->Password = $this->txtPassword->Text;
		$objLogin->RoleId = $this->lstRole->SelectedValue;
		$intLoginId = $objLogin->Save();
		
		$objUser = new User();
		$objUser->FirstName = $this->txtFirstName->Text;
		$objUser->LastName = $this->txtLastName->Text;
		$objUser->Email = $this->txtEmail->Text;
		$objUser->Country = $this->txtCountry->Text;
		$objUser->Gender = $this->lstGender->SelectedValue;
		$objUser->LoginId = $intLoginId;
		$objUser->Save();
		
		QApplication::Redirect('/inst/admin/index.php/users');
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect('/inst/admin/index.php/users');
	}
}

NewUserForm::Run('NewUserForm');
?>