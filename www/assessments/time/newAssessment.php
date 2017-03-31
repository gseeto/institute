<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class NewTimeAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Seasonal Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objTimeAssessment;
	protected $dtgAssessmentQuestion;
	protected $btnSubmit;
	protected $btnCancel;
	protected $btnAddActivity;
	protected $arrayAnswer;
	protected $bEditing;
	protected $lblHours;
	protected $hourCount;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {		
		if(QApplication::PathInfo(0) == 'edit') {
			$this->bEditing = true;
		} else {
			$this->bEditing = false;
		}
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$assessmentArray = TimeAssessment::LoadArrayByUserId($intUserId);
		$this->objTimeAssessment = $assessmentArray[0];
				
 		$this->dtgAssessmentQuestion = new TimeResultsDataGrid($this);
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Activity', '<?= $_FORM->Activity_Render($_ITEM) ?>', 'HtmlEntities=false', 'Width=410px' ));
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Time (hrs)', '<?= $_FORM->Time_Render($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));			
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Career', '<?= $_FORM->chkCareer_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Community', '<?= $_FORM->chkCommunity_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Creativity', '<?= $_FORM->chkCreativity_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Calling', '<?= $_FORM->chkCalling_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Margin', '<?= $_FORM->chkMargin_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestion->CellPadding = 5;
		$this->dtgAssessmentQuestion->UseAjax = true;
		$this->dtgAssessmentQuestion->CssClass = 'table table-striped table-hover';

		$this->dtgAssessmentQuestion->SetDataBinder('dtgAssessmentQuestions_Bind',$this);
				
		$this->lblHours = new QLabel($this);

        $objStyle = $this->dtgAssessmentQuestion->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgAssessmentQuestion->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 		

        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'btn btn-default';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

	 	$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'btn btn-default';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

	 	$this->btnAddActivity = new QButton($this);
        $this->btnAddActivity->Text = 'Add Additional Activities';
	 	$this->btnAddActivity->CssClass = 'btn btn-default';
	 	$this->btnAddActivity->AddAction(new QClickEvent(), new QAjaxAction('btnAddActivity_Click'));
	}
	
	public function dtgAssessmentQuestions_Bind() {		
		$activityList = TimeResults::LoadArrayByAssessmentId($this->objTimeAssessment->Id);
		$this->dtgAssessmentQuestion->DataSource = $activityList; 
		$this->hourCount = 168;
		foreach($activityList as $activity) {
			$this->hourCount = $this->hourCount - $activity->Time;
		}
		$this->lblHours->Text = $this->hourCount;
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/seasons/index.php');
	}
	
	protected function btnAddActivity_Click() {
		$objResult = new TimeResults();
		$objResult->AssessmentId = $this->objTimeAssessment->Id;
		$objResult->Time = 0;
		$objResult->Activity = '';
		$objResult->Calling = 0;
		$objResult->Career = 0;
		$objResult->Community = 0;
		$objResult->Creativity = 0;
		$objResult->Margin = 0;
		$objResult->Save();
		$this->dtgAssessmentQuestion_Refresh();
	}
	
	public function dtgAssessmentQuestion_Refresh() {
		$this->dtgAssessmentQuestion->Refresh();
	}
	
	public function txtActivity_Change($strFormId, $strControlId, $strParameter) {
        $txtActivity = $this->GetControl($strControlId);           
        if ($txtActivity) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Activity = $txtActivity->Text;
        		$objResult->Save();
        	}
        }
	}
	
	public function txtTime_Change($strFormId, $strControlId, $strParameter) {
        $txtTime = $this->GetControl($strControlId);           
        if ($txtTime) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Time = (int)$txtTime->Text;
        		$objResult->Save();
        		$activityList = TimeResults::LoadArrayByAssessmentId($this->objTimeAssessment->Id);
				// Update the hour count
        		$this->hourCount = 168;
				foreach($activityList as $activity) {
					$this->hourCount = $this->hourCount - $activity->Time;
				}
				$this->lblHours->Text = $this->hourCount;
        	}
        }
	}
	
	public function chkCalling_Change($strFormId, $strControlId, $strParameter) {
        $chkCalling = $this->GetControl($strControlId);           
        if ($chkCalling) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Calling = $chkCalling->Checked;
        		$objResult->Save();
        	}
        }
	}
	
	public function chkCareer_Change($strFormId, $strControlId, $strParameter) {
        $chkCareer = $this->GetControl($strControlId);           
        if ($chkCareer) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Career = $chkCareer->Checked;
        		$objResult->Save();
        	}
        }
	}
	
	public function chkCommunity_Change($strFormId, $strControlId, $strParameter) {
        $chkCommunity = $this->GetControl($strControlId);           
        if ($chkCommunity) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Community = $chkCommunity->Checked;
        		$objResult->Save();
        	}
        }
	}
	
	public function chkCreativity_Change($strFormId, $strControlId, $strParameter) {
        $chkCreativity = $this->GetControl($strControlId);           
        if ($chkCreativity) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Creativity = $chkCreativity->Checked;
        		$objResult->Save();
        	}
        }
	}

	public function chkMargin_Change($strFormId, $strControlId, $strParameter) {
        $chkMargin = $this->GetControl($strControlId);           
        if ($chkMargin) {
        	$objResult = TimeResults::Load($strParameter);
        	if($objResult) {
        		$objResult->Margin = $chkMargin->Checked;
        		$objResult->Save();
        	}
        }
	}
	
	protected function btnSubmit_Click() {	
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		$this->objTimeAssessment->ResourceStatusId = 2;
	    $this->objTimeAssessment->Save();
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/time/viewAssessment.php/'.$intUserId);
	}

    	
    public function chkCareer_Render(TimeResults $objResult) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'career' . $objResult->Id;
        // Let's see if the Checkbox exists already
        $chkCareer = $this->GetControl($strControlId);           
        if (!$chkCareer) {
            // Define the CheckBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $chkCareer = new QCheckBox($this->dtgAssessmentQuestion, $strControlId);
            $chkCareer->Width = 60; 
            $chkCareer->CssClass = 'checkbox';
            $chkCareer->Checked = $objResult->Career;	               
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $chkCareer->ActionParameter = $objResult->Id;
            $chkCareer->AddAction(new QChangeEvent(), new QAjaxAction('chkCareer_Change'));
        }

        // Render the checkbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $chkCareer->Render(false);
    }
    
	public function chkCommunity_Render(TimeResults $objResult) {
        $strControlId = 'community' . $objResult->Id;
        $chkCommunity = $this->GetControl($strControlId);           
        if (!$chkCommunity) {
            $chkCommunity = new QCheckBox($this->dtgAssessmentQuestion, $strControlId);
            $chkCommunity->Width = 60;
            $chkCommunity->CssClass = 'checkbox';
            $chkCommunity->Checked = $objResult->Community;	                    
            $chkCommunity->ActionParameter = $objResult->Id;
            $chkCommunity->AddAction(new QChangeEvent(), new QAjaxAction('chkCommunity_Change'));
        }
        return $chkCommunity->Render(false);
    }
    
	public function chkCreativity_Render(TimeResults $objResult) {
        $strControlId = 'creativity' . $objResult->Id;
        $chkCreativity = $this->GetControl($strControlId);           
        if (!$chkCreativity) {
            $chkCreativity = new QCheckBox($this->dtgAssessmentQuestion, $strControlId);
            $chkCreativity->Width = 60;
            $chkCreativity->CssClass = 'checkbox';
            $chkCreativity->Checked = $objResult->Creativity;	                  
            $chkCreativity->ActionParameter = $objResult->Id;
            $chkCreativity->AddAction(new QChangeEvent(), new QAjaxAction('chkCreativity_Change'));
        }
        return $chkCreativity->Render(false);
    }
    
    public function Activity_Render(TimeResults $objResult) {
    	$strControlId = 'activity' . $objResult->Id;
        $txtActivity = $this->GetControl($strControlId);           
        if (!$txtActivity) {
            $txtActivity = new QTextBox($this->dtgAssessmentQuestion, $strControlId);
            $txtActivity->CssClass = 'form-control';
            $txtActivity->Text = $objResult->Activity;	                    
            $txtActivity->ActionParameter = $objResult->Id;
            $txtActivity->AddAction(new QChangeEvent(5000), new QAjaxAction('txtActivity_Change'));
        }
        return $txtActivity->Render(false);	
    }
 
    public function Time_Render(TimeResults $objResult) {
    	$strControlId = 'time' . $objResult->Id;
        $txtTime = $this->GetControl($strControlId);           
        if (!$txtTime) {
            $txtTime = new QTextBox($this->dtgAssessmentQuestion, $strControlId);
            $txtTime->Width = 60;
            $txtTime->CssClass = 'form-control';
            $txtTime->Text = $objResult->Time;	                    
            $txtTime->ActionParameter = $objResult->Id;
            $txtTime->AddAction(new QChangeEvent(5000), new QAjaxAction('txtTime_Change'));
        }
        return $txtTime->Render(false);	
    }
    
	public function chkCalling_Render(TimeResults $objResult) {
        $strControlId = 'calling' . $objResult->Id;
        $chkCalling = $this->GetControl($strControlId);           
        if (!$chkCalling) {
            $chkCalling = new QCheckBox($this->dtgAssessmentQuestion, $strControlId);
            $chkCalling->Width = 60;
            $chkCalling->CssClass = 'checkbox';
            $chkCalling->Checked = $objResult->Calling;	                    
            $chkCalling->ActionParameter = $objResult->Id;
            $chkCalling->AddAction(new QChangeEvent(), new QAjaxAction('chkCalling_Change'));
        }
        return $chkCalling->Render(false);
    }
    
	public function chkMargin_Render(TimeResults $objResult) {
        $strControlId = 'margin' . $objResult->Id;
        $chkMargin = $this->GetControl($strControlId);           
        if (!$chkMargin) {
            $chkMargin = new QCheckBox($this->dtgAssessmentQuestion, $strControlId);
            $chkMargin->Width = 60;
            $chkMargin->CssClass = 'checkbox';
            $chkMargin->Checked = $objResult->Margin;	                   
            $chkMargin->ActionParameter = $objResult->Id;
            $chkMargin->AddAction(new QChangeEvent(), new QAjaxAction('chkMargin_Change'));
        }
        return $chkMargin->Render(false);
    }

}

NewTimeAssessmentForm::Run('NewTimeAssessmentForm');
?>