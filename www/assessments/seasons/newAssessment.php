<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class NewSeasonalAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Seasonal Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objSeasonalAssessment;
	protected $dtgAssessmentQuestion;
	protected $btnSubmit;
	protected $btnCancel;
	protected $arrayAnswer;
	protected $bEditing;


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
		
		$assessmentArray = SeasonalAssessment::LoadArrayByUserId($intUserId);
		$this->objSeasonalAssessment = $assessmentArray[0];
		
		$this->arrayAnswer = array();
		
 		$this->dtgAssessmentQuestion = new SeasonalQuestionsDataGrid($this);
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgAssessmentQuestion->AddColumn(new QDataGridColumn('Answer', '<?= $_FORM->lstAnswer_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestion->CellPadding = 5;
		$this->dtgAssessmentQuestion->UseAjax = true;

		$assessmentArray = SeasonalQuestions::LoadAll(QQ::OrderBy(QQN::SeasonalQuestions()->Count));					
		$this->dtgAssessmentQuestion->DataSource = $assessmentArray; 
		
		$objStyle = $this->dtgAssessmentQuestion->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgAssessmentQuestion->AlternateRowStyle;
        $objStyle->BackColor = '#CCCCCC';

        $objStyle = $this->dtgAssessmentQuestion->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgAssessmentQuestion->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 		

        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'primary';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

	 	$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'primary';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));	
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/seasons/index.php');
	}
	
	protected function btnSubmit_Click() {	
		$totalCount = count($this->arrayAnswer);
        for($i=0;$i<$totalCount; $i++) {
	        if($this->bEditing) {
	        	$objResults = SeasonalResults::LoadResultByAssessmentIdAndQuestionId($this->objSeasonalAssessment->Id,$this->arrayAnswer[$i]->ActionParameter);
	        } else {
        		$objResults = new SeasonalResults();
	        }
	        $objResults->AssessmentId = $this->objSeasonalAssessment->Id;  
	        $objResults->Result =  $this->arrayAnswer[$i]->SelectedValue;
	        $objResults->QuestionId = $this->arrayAnswer[$i]->ActionParameter;
	        $objResults->Save(); 
        }
        if(!$this->bEditing) {
	        $this->objSeasonalAssessment->ResourceStatusId = 2;
	        $this->objSeasonalAssessment->Save();
	        
	        // If not editing, then check if we should be decrementing group seats.
	        if($this->objSeasonalAssessment->GroupId != null) {
		        $objGroupAssessment = GroupAssessmentList::Load($this->objSeasonalAssessment->GroupId);
		        $objGroupAssessment->KeysLeft--;
		        $objGroupAssessment->Save();
	        }
        }
        
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/seasons/viewAssessment.php');
	}

    	
    public function lstAnswer_Render(SeasonalQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'answer' . $objQuestions->Id;
        // Let's see if the Checkbox exists already
        $lstAnswer = $this->GetControl($strControlId);           
        if (!$lstAnswer) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstAnswer = new QListBox($this->dtgAssessmentQuestion, $strControlId);
            $lstAnswer->Width = 100;
 
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = SeasonalResults::GetResultByAssessmentIdAndQuestionId($this->objSeasonalAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstAnswer->AddItem($i,$i,true);
	            	else 
	            		$lstAnswer->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstAnswer->AddItem($i,$i);
	            }
            }           
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstAnswer->ActionParameter = $objQuestions->Id;
            $this->arrayAnswer[] = $lstAnswer;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstAnswer->Render(false);
    }

}

NewSeasonalAssessmentForm::Run('NewSeasonalAssessmentForm');
?>