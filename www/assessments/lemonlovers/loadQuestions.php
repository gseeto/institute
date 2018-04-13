<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class LemonLoversLoadQuestionsForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'LEMON Lovers Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLemonAssessment;
	protected $dtgAssessmentQuestions;
	protected $btnSubmit;
	protected $btnCancel;
	protected $arrayValue;
	protected $bEditing;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemonlovers/loadLogin.php');
		
		// Log if debug is set
		if (defined('__DEBUG_LOG__') && __DEBUG_LOG__ && defined('DEBUG_LOG_FLAG') && DEBUG_LOG_FLAG) {
				InstituteForm::$time_start = microtime(true);
				InstituteForm::$strDebugLog = sprintf("loadQuestions Start time: %s\n", InstituteForm::$time_start);
		}
	}
	
	protected function Form_Exit() {
		// Log if debug is set
		if (defined('__DEBUG_LOG__') && __DEBUG_LOG__ && defined('DEBUG_LOG_FLAG') && DEBUG_LOG_FLAG) {
				InstituteForm::$time_end = microtime(true);
				InstituteForm::$strDebugLog .= sprintf("loadQuestions End time: %s\n", InstituteForm::$time_start);
				InstituteForm::$strDebugLog .= sprintf("loadQuestions Execution Time: %s\n\n", InstituteForm::$time_end - InstituteForm::$time_start);
				QApplication::MakeDirectory(__DEBUG_LOG__, 0777);
				$strFileName = sprintf('%s/loadQuestions.log', __DEBUG_LOG__);
				file_put_contents($strFileName, InstituteForm::$strDebugLog,FILE_APPEND|LOCK_EX);
				@chmod($strFileName, 0666);
		}
	}
	
	protected function Form_Create() {		
		if(QApplication::PathInfo(0) == 'edit') {
			$this->bEditing = true;
		} else {
			$this->bEditing = false;
		}
			
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$assessmentArray = LemonloversAssessment::LoadArrayByUserId($intUserId);
		$this->objLemonAssessment = $assessmentArray[0];
		
		$this->arrayValue = array();
		
		// Check status of Assessment. See if untouched, taken or inactive
		//$this->objLemonAssessment->ResourceStatusId
		$this->dtgAssessmentQuestions = new LemonloversAssessmentDataGrid($this);
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Answer', '<?= $_FORM->lstAnswer_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestions->CellPadding = 5;
		$this->dtgAssessmentQuestions->SetDataBinder('dtgAssessmentQuestions_Bind',$this);
		$this->dtgAssessmentQuestions->UseAjax = true;
		$this->dtgAssessmentQuestions->CssClass = 'table table-striped';
		
        
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'submit btn btn-default';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

	 	$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'btn btn-default';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));	
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemonlovers/loadLogin.php');
	}
	
	protected function btnSubmit_Click() {			
		QApplication::ExecuteJavaScript("document.getElementsByClassName('submit btn btn-default')[0].setAttribute('disabled', 'true');");
        for($i=0;$i<count($this->arrayValue); $i++) {
        	if($this->bEditing && ($this->objLemonAssessment->ResourceStatusId == 15)) {
	        	$objResults = LemonloversAssessmentResults::LoadResultByAssessmentIdAndQuestionId($this->objLemonAssessment->Id, $i+1);
	        } else {
        		$objResults = new LemonloversAssessmentResults();
	        }
	        $objResults->AssessmentId = $this->objLemonAssessment->Id;  
	        $objResults->Value =  $this->arrayValue[$i]->SelectedValue;
	        $objResults->QuestionId = $this->arrayValue[$i]->ActionParameter;
	        $objResults->Save(); 
        }
		if(!$this->bEditing) {
	        $this->objLemonAssessment->ResourceStatusId = 2;
	        $this->objLemonAssessment->DateModified = new QDateTime('Now');
	        $this->objLemonAssessment->Save();
        }
        
        // Save the values if they haven't already been saved.
        $resultArray = LemonloversAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);
		$lemonValues = array(0,0,0,0,0);
        foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
		}
		$this->objLemonAssessment->L = $lemonValues[0];
		$this->objLemonAssessment->E = $lemonValues[1];
		$this->objLemonAssessment->M = $lemonValues[2];
		$this->objLemonAssessment->O = $lemonValues[3];
		$this->objLemonAssessment->N = $lemonValues[4];
		$this->objLemonAssessment->DateModified = new QDateTime('Now');
		$this->objLemonAssessment->Save();	

        QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemonlovers/loadResults.php');
	}
	
	public function dtgAssessmentQuestions_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		$assessmentArray = LemonloversAssessmentQuestions::QueryArray($objConditions,$objClauses);		
		$this->dtgAssessmentQuestions->DataSource = $assessmentArray; 
	}
	
    public function lstAnswer_Render(LemonloversAssessmentQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'value' . $objQuestions->Id;

        // Let's see if the Checkbox exists already
        $lstValue = $this->GetControl($strControlId);
            
        if (!$lstValue) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstValue = new QListBox($this->dtgAssessmentQuestions, $strControlId);
            $lstValue->CssClass = 'form-control';
            if($this->bEditing && ($this->objLemonAssessment->ResourceStatusId == 15) ) {
            	$value = LemonloversAssessmentResults::GetValueByAssessmentIdAndQuestionId($this->objLemonAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstValue->AddItem($i,$i,true);
	            	else 
	            		$lstValue->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstValue->AddItem($i,$i);
	            }
            }                 
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstValue->ActionParameter = $objQuestions->Id;
            $this->arrayValue[] = $lstValue;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstValue->Render(false);
    }

}

LemonLoversLoadQuestionsForm::Run('LemonLoversLoadQuestionsForm');