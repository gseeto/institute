<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class NewCompanyForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Add New Company';
	protected $txtName;
	protected $txtAddress;
	protected $txtCity;
	protected $txtState;
	protected $txtZipCode;
	protected $txtCountry;
	protected $chkIndustryArray;
	
 	protected $btnSubmit;
 	protected $btnCancel;

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
		$this->txtName = new QTextBox($this);
		$this->txtName->Name = 'Company Name : ';
		$this->txtName->CssClass = 'form-control';
		
	 	$this->txtAddress  = new QTextBox($this);
	 	$this->txtAddress->Name = 'Address : ';
	 	$this->txtAddress->CssClass = 'form-control';
	 	
	 	$this->txtCity= new QTextBox($this);
	 	$this->txtCity->Name = 'City : ';
	 	$this->txtCity->CssClass = 'form-control';
	 	
	 	$this->txtState = new QTextBox($this);
	 	$this->txtState->Name = 'State : ';
	 	$this->txtState->CssClass = 'form-control';
	 	
	 	$this->txtZipCode = new QTextBox($this);
	 	$this->txtZipCode->Name = 'ZipCode : ';
	 	$this->txtZipCode->CssClass = 'form-control';
	 	
	 	$this->txtCountry = new QTextBox($this);
	 	$this->txtCountry->Name = 'Country : ';
	 	$this->txtCountry->CssClass = 'form-control';
	 		 	
	 	$industryArray = Industry::LoadAll();
	 	$this->chkIndustryArray = array();
	 	foreach ($industryArray as $objIndustry) {
	 		$chkIndustry = new QCheckBox($this);
	 		$chkIndustry->Name = $objIndustry->Id;
	 		$chkIndustry->Text = $objIndustry->Value;
	 		$chkIndustry->CssClass = 'checkbox';
	 		$this->chkIndustryArray[] = $chkIndustry;
	 	}
 	 
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'btn btn-default';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
	 	
	 	$this->btnCancel = new QButton($this);
	 	$this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'btn btn-default';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
 	 
	}

	protected function btnSubmit_Click() {
		$objAddress = new Address();
		$objAddress->Address1 = $this->txtAddress->Text;
		$objAddress->City = $this->txtCity->Text;
		$objAddress->State = $this->txtState->Text;
		$objAddress->ZipCode = $this->txtZipCode->Text;
		$objAddress->Country = $this->txtCountry->Text;
		$intAddressId = $objAddress->Save();
		
		$objCompany = new Company();
		$objCompany->Name = $this->txtName->Text;
		$objCompany->AddressId = $intAddressId;
		$objCompany->Save();
		
		foreach ($this->chkIndustryArray as $chkIndustry) {
			if ($chkIndustry->Checked) {
				$objIndustry = Industry::Load($chkIndustry->Name);
				$objCompany->AssociateIndustry($objIndustry);
			}
		}
		QApplication::Redirect(__SUBDIRECTORY__.'/administration/companies/');
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/administration/companies/');
	}
}

NewCompanyForm::Run('NewCompanyForm');
?>