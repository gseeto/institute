<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class NewKingdomAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Kingdom Business Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objKingdomAssessment;
	protected $dtgAssessmentQuestions;
	protected $btnSubmit;
	protected $btnCancel;
	protected $arrayImportance;
	protected $arrayPerformance;
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
		
		$assessmentArray = KingdomBusinessAssessment::LoadArrayByUserId($intUserId);
		$this->objKingdomAssessment = $assessmentArray[0];
		
		$this->arrayImportance = array();
	 	$this->arrayPerformance = array();
		
		// Check status of Assessment. See if untouched, taken or inactive
		//$this->objKingdomAssessment->ResourceStatusId
		$this->dtgAssessmentQuestions = new KingdomBusinessQuestionsDataGrid($this);
		$this->dtgAssessmentQuestions->MetaAddTypeColumn('CategoryId', 'CategoryType');
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=30px' ));
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Importance', '<?= $_FORM->lstImportance_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestions->AddColumn(new QDataGridColumn('Performance', '<?= $_FORM->lstPerformance_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentQuestions->CellPadding = 5;
		$this->dtgAssessmentQuestions->SetDataBinder('dtgAssessmentQuestions_Bind',$this);
		$this->dtgAssessmentQuestions->UseAjax = true;
		$this->dtgAssessmentQuestions->CssClass = 'table table-striped table-hover';		

        $objStyle = $this->dtgAssessmentQuestions->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgAssessmentQuestions->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

	 	$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));	
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/kingdom/index.php');
	}
	
	protected function btnSubmit_Click() {	
        for($i=0;$i<count($this->arrayPerformance); $i++) {
	        if($this->bEditing) {
	        	$objResults = KingdomBusinessResults::LoadResultByAssessmentIdAndQuestionId($this->objKingdomAssessment->Id, $i+1);
	        } else {
        		$objResults = new KingdomBusinessResults();
	        }
	        $objResults->AssessmentId = $this->objKingdomAssessment->Id;  
	        $objResults->Importance =  $this->arrayImportance[$i]->SelectedValue;
	        $objResults->Performance =  $this->arrayPerformance[$i]->SelectedValue;
	        $objResults->QuestionId = $this->arrayPerformance[$i]->ActionParameter;
	        $objResults->Save(); 
        }
        if(!$this->bEditing) {
	        $this->objKingdomAssessment->ResourceStatusId = 2;
	        $this->objKingdomAssessment->Save();
        }
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/kingdom/viewAssessment.php');
	}
	
	public function dtgAssessmentQuestions_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		$assessmentArray = KingdomBusinessQuestions::QueryArray($objConditions,$objClauses);		
		$this->dtgAssessmentQuestions->DataSource = $assessmentArray; 
	}
	
    public function lstImportance_Render(KingdomBusinessQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'importance' . $objQuestions->Id;

        // Let's see if the Checkbox exists already
        $lstImportance = $this->GetControl($strControlId);
            
        if (!$lstImportance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstImportance = new QListBox($this->dtgAssessmentQuestions, $strControlId);
            $lstImportance->Width = 100;
            $lstImportance->CssClass = 'form-control';
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = KingdomBusinessResults::GetImportanceByAssessmentIdAndQuestionId($this->objKingdomAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstImportance->AddItem($i,$i,true);
	            	else 
	            		$lstImportance->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstImportance->AddItem($i,$i);
	            }
            }           
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstImportance->ActionParameter = $objQuestions->Id;
            $this->arrayImportance[] = $lstImportance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstImportance->Render(false);
    }
    
	public function lstPerformance_Render(KingdomBusinessQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'performance' . $objQuestions->Id;

        // Let's see if the Checkbox exists already
        $lstPerformance = $this->GetControl($strControlId);
            
        if (!$lstPerformance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstPerformance = new QListBox($this->dtgAssessmentQuestions, $strControlId);
            $lstPerformance->Width = 100;
            $lstPerformance->CssClass = 'form-control';
            
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = KingdomBusinessResults::GetPerformanceByAssessmentIdAndQuestionId($this->objKingdomAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstPerformance->AddItem($i,$i,true);
	            	else 
	            		$lstPerformance->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstPerformance->AddItem($i,$i);
	            }
            }
                
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstPerformance->ActionParameter = $objQuestions->Id;
            $this->arrayPerformance[] = $lstPerformance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstPerformance->Render(false);
    }

}

NewKingdomAssessmentForm::Run('NewKingdomAssessmentForm');
?>