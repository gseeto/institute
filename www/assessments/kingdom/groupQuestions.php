<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class KingdomGroupQuestions extends InstituteForm {
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
	protected $dtgAssessmentQuestionArray;


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
	 	$this->dtgAssessmentQuestionArray = array();
	 	
	 	for($i=0; $i<10;$i++) { 
	 		$this->dtgAssessmentQuestionArray[$i] = new KingdomBusinessQuestionsDataGrid($this);
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->Count) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Importance', '<?= $_FORM->lstImportance_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Performance', '<?= $_FORM->lstPerformance_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->CellPadding = 5;
			$this->dtgAssessmentQuestionArray[$i]->UseAjax = true;
	
			$assessmentArray = KingdomBusinessQuestions::LoadArrayByCategoryId($i+1);					
			$this->dtgAssessmentQuestionArray[$i]->DataSource = $assessmentArray; 
			
			$objStyle = $this->dtgAssessmentQuestionArray[$i]->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgAssessmentQuestionArray[$i]->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgAssessmentQuestionArray[$i]->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgAssessmentQuestionArray[$i]->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	 		
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
        $objGroupAssessment = GroupAssessmentList::Load($this->objKingdomAssessment->GroupId);
        $objGroupAssessment->KeysLeft--;
        $objGroupAssessment->Save();
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/kingdom/groupResults.php');
	}
	
    public function lstImportance_Render(KingdomBusinessQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'importance' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
        // Let's see if the Checkbox exists already
        $lstImportance = $this->GetControl($strControlId);
            
        if (!$lstImportance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstImportance = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstImportance->Width = 100;
            $lstImportance->ForeColor = '#F90949';
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
		$index = $objQuestions->CategoryId - 1;
		
        // Let's see if the Checkbox exists already
        $lstPerformance = $this->GetControl($strControlId);
            
        if (!$lstPerformance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstPerformance = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstPerformance->Width = 100;
            $lstPerformance->ForeColor = '#131BF9';
            
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

	public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    }
}

KingdomGroupQuestions::Run('KingdomGroupQuestions');
?>