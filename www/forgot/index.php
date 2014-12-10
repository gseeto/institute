<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class ForgotForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Forgot Username/Password';
	protected $intNavSectionId = InstituteForm::NavSectionHome;
	protected $lblDebug;

	protected $txtEmail;
	
	protected $btnCancel;
	protected $btnSubmit;
	protected $objLogin;
	protected $btnReturn;
	protected $lblMsg;

	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		$this->txtEmail = new QTextBox($this);
		$this->txtEmail->Name = 'Email';	
		$this->txtEmail->Required = true;
		
		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Text = 'Submit';
		$this->btnSubmit->CssClass = 'primary';
		$this->btnSubmit->CausesValidation = true;
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Clicked'));
		
		$this->btnCancel =  new QButton($this);
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->CssClass = 'primary';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Clicked'));
		
		$this->lblMsg = new QLabel($this);
		$this->lblMsg->Visible = false;
		
		$this->btnReturn =  new QButton($this);
		$this->btnReturn->Text = 'Return to Login';
		$this->btnReturn->CssClass = 'link';
		$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Clicked'));
		$this->btnReturn->Visible = false;
	}
	
	public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();

			// Check for empty string
			if(strlen($this->txtEmail->Text)==0) {
				$this->txtEmail->Warning = 'You must enter an email';
				$blnToReturn = false;
				return $blnToReturn;
			}
			// Check syntax
			if(! filter_var($this->txtEmail->Text, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $this->txtEmail->Text)) {
				$this->txtEmail->Warning = 'email was in an incorrect format';
				$blnToReturn = false;
				return $blnToReturn;
			}
			
			// Check if login is found.
			$objConditions = QQ::All();
			$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::Login()->User->Email, $this->txtEmail->Text)
				);
			$this->objLogin = Login::QuerySingle($objConditions);
			if(!$this->objLogin){
				$this->txtEmail->Warning = 'The email was not found in the database. Please try again.';
				$blnToReturn = false;
				return $blnToReturn;
			}	
			
			return $blnToReturn;
	}
	
	public function btnSubmit_Clicked($strFormId, $strControlId, $strParameter) {
		// Check email. If found, send details to it.
		// If not found, notify them.
		
		$objMessage = new QEmailMessage();
		QEmailServer::$TestMode = true;
		QEmailServer::$TestModeDirectory = '/tmp/';
		QEmailServer::$SmtpServer = MAIL_SERVER;
		QEmailServer::$AuthLogin = false;
		//QEmailServer::$SmtpPassword = 'lASgZ357lk';
		//QEmailServer::$SmtpPort = 2525;
		//QEmailServer::$SmtpUsername = 'scorecard@inst.net';
		
    	$objMessage->From = 'Portal Administrator <info@inst.net>';
	    $objMessage->To = $this->txtEmail->Text;
	    $objMessage->Subject = 'Institute Portal Password Reminder';
	    $objMessage->HtmlBody = sprintf("<br>Your Username is:%s <br>Your password is: %s<br><br>Regards,<br>The Portal Administrator.",
	    	$this->objLogin->Username,$this->objLogin->Password);
	    $objMessage->Body = sprintf("\n\rYour Username is:%s \n\rYour password is: %s\n\r\n\rRegards,\n\rThe Portal Administrator.",
	    	$this->objLogin->Username,$this->objLogin->Password);
	    if (QEmailServer::IsEmailValid($this->txtEmail->Text)) {
	    	QEmailServer::Send($objMessage);
	    	// Display message
	    	$this->lblMsg->Text = "Your password information has been sent to your email address. Please check your inbox for the information.";
	    	$this->lblMsg->Visible = true;
	    	$this->btnReturn->Visible = true;
	    }
	}
	
	public function btnCancel_Clicked($strFormId, $strControlId, $strParameter) {
		// Return to login page.
		QApplication::Redirect("../");
	}

}

ForgotForm::Run('ForgotForm');
?>