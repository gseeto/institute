<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class NewLemonAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'LEMON Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLemonAssessment;
	protected $dtgAssessmentQuestions;
	protected $btnSubmit;
	protected $btnCancel;
	protected $arrayValue;
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
		
		$assessmentArray = LemonAssessment::LoadArrayByUserId($intUserId);
		if($assessmentArray)
			$this->objLemonAssessment = $assessmentArray[0];
		else {
			$this->objLemonAssessment = new LemonAssessment();
			$this->objLemonAssessment->ResourceStatusId = 1;
			$this->objLemonAssessment->ResourceId = 5;
			$this->objLemonAssessment->UserId = $intUserId;
		}
		
		$this->arrayValue = array();
		
		// Check status of Assessment. See if untouched, taken or inactive
		//$this->objLemonAssessment->ResourceStatusId
		$this->dtgAssessmentQuestions = new LemonAssessmentDataGrid($this);
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false' ));			
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Answer', '<?= $_FORM->lstAnswer_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestions->CellPadding = 5;
		$this->dtgAssessmentQuestions->SetDataBinder('dtgAssessmentQuestions_Bind',$this);
		$this->dtgAssessmentQuestions->UseAjax = true;
		$this->dtgAssessmentQuestions->CssClass = 'table table-striped table-hover';
		        
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'btn btn-primary';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

	 	$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'btn btn-primary';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));	
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/index.php');
	}
	
	protected function btnSubmit_Click() {	
		QApplication::ExecuteJavaScript("document.getElementsByClassName('primary submit')[0].setAttribute('disabled', 'true');");
        for($i=0;$i<count($this->arrayValue); $i++) {
	        if($this->bEditing) {
	        	$objResults = LemonAssessmentResults::LoadResultByAssessmentIdAndQuestionId($this->objLemonAssessment->Id, $i+1);
	        } else {
        		$objResults = new LemonAssessmentResults();
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
        } else {
        	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($this->objLemonAssessment->Id);
			$lemonValues = array(0,0,0,0,0);
        	foreach($resultArray as $objResult) {
				$intIndex = $objResult->Question->LemonTypeId - 1;
				$lemonValues[$intIndex] += $objResult->Value;
			}
			// Save the values if they haven't already been saved.
			$this->objLemonAssessment->L = $lemonValues[0];
			$this->objLemonAssessment->E = $lemonValues[1];
			$this->objLemonAssessment->M = $lemonValues[2];
			$this->objLemonAssessment->O = $lemonValues[3];
			$this->objLemonAssessment->N = $lemonValues[4];
			$this->objLemonAssessment->DateModified = new QDateTime('Now');
			$this->objLemonAssessment->Save();	
        }
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/viewAssessment.php');
	}
	
	public function dtgAssessmentQuestions_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		$assessmentArray = LemonAssessmentQuestions::QueryArray($objConditions,$objClauses);		
		$this->dtgAssessmentQuestions->DataSource = $assessmentArray; 
	}
	
    public function lstAnswer_Render(LemonAssessmentQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'value' . $objQuestions->Id;

        // Let's see if the Checkbox exists already
        $lstValue = $this->GetControl($strControlId);
            
        if (!$lstValue) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstValue = new QListBox($this->dtgAssessmentQuestions, $strControlId);
            $lstValue->Width = 100;
            $lstValue->CssClass = 'form-control center-block';
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = LemonAssessmentResults::GetValueByAssessmentIdAndQuestionId($this->objLemonAssessment->Id, $objQuestions->Id);
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

NewLemonAssessmentForm::Run('NewLemonAssessmentForm');
?>