<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class NewLRAAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Leadership Readiness Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objLRAAssessment;
	protected $dtgAssessmentQuestionArray;
	protected $btnSubmit;
	protected $btnCancel;
	protected $arrayHead;
	protected $arrayHands;
	protected $arrayHeart;
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
		
		$assessmentArray = LraAssessment::LoadArrayByUserId($intUserId);
		$this->objLRAAssessment = $assessmentArray[0];
		
		$this->arrayHead = array();
	 	$this->arrayHands = array();
	 	$this->arrayHeart = array();
		
	 	$this->dtgAssessmentQuestionArray = array();
		for($i=0; $i<20;$i++) {
	 		$this->dtgAssessmentQuestionArray[$i] = new LraQuestionsDataGrid($this);
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->Count) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Head', '<?= $_FORM->lstHead_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Hands', '<?= $_FORM->lstHands_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Heart', '<?= $_FORM->lstHeart_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->CellPadding = 5;
			$this->dtgAssessmentQuestionArray[$i]->UseAjax = true;
	
			$assessmentArray = LraQuestions::LoadArrayByCategoryId($i+1);					
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
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lra/index.php');
	}
	
	protected function btnSubmit_Click() {	
        for($i=0;$i<count($this->arrayHands); $i++) {
	        if($this->bEditing) {
	        	$objResults = LraResults::LoadResultByAssessmentIdAndQuestionId($this->objLRAAssessment->Id, $i+1);
	        } else {
        		$objResults = new LraResults();
	        }
	        $objResults->AssessmentId = $this->objLRAAssessment->Id;  
	        $objResults->Head =  $this->arrayHead[$i]->SelectedValue;
	        $objResults->Hands =  $this->arrayHands[$i]->SelectedValue;
	        $objResults->Heart =  $this->arrayHeart[$i]->SelectedValue;
	        $objResults->QuestionId = $this->arrayHands[$i]->ActionParameter;
	        $objResults->Save(); 
        }
        if(!$this->bEditing) {
	        $this->objLRAAssessment->ResourceStatusId = 2;
	        $this->objLRAAssessment->Save();
        }
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lra/viewAssessment.php');
	}

	public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    }
    	
    public function lstHead_Render(LraQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'head' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
        // Let's see if the Checkbox exists already
        $lstHead = $this->GetControl($strControlId);
            
        if (!$lstHead) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstHead = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstHead->Width = 100;
            $lstHead->ForeColor = '#F90949';
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = LraResults::GetHeadByAssessmentIdAndQuestionId($this->objLRAAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstHead->AddItem($i,$i,true);
	            	else 
	            		$lstHead->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstHead->AddItem($i,$i);
	            }
            }           
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstHead->ActionParameter = $objQuestions->Id;
            $this->arrayHead[] = $lstHead;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstHead->Render(false);
    }
    
	public function lstHands_Render(LraQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'hands' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
		
        // Let's see if the Checkbox exists already
        $lstHands = $this->GetControl($strControlId);
            
        if (!$lstHands) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstHands = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstHands->Width = 100;
            $lstHands->ForeColor = '#131BF9';
            
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = LraResults::GetHandsByAssessmentIdAndQuestionId($this->objLRAAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstHands->AddItem($i,$i,true);
	            	else 
	            		$lstHands->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstHands->AddItem($i,$i);
	            }
            }
                
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstHands->ActionParameter = $objQuestions->Id;
            $this->arrayHands[] = $lstHands;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstHands->Render(false);
    }
    
	public function lstHeart_Render(LraQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'heart' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
		
        // Let's see if the Checkbox exists already
        $lstHeart = $this->GetControl($strControlId);
            
        if (!$lstHeart) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstHeart = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstHeart->Width = 100;
            $lstHeart->ForeColor = 'green';
            
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = LraResults::GetHeartByAssessmentIdAndQuestionId($this->objLRAAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstHeart->AddItem($i,$i,true);
	            	else 
	            		$lstHeart->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstHeart->AddItem($i,$i);
	            }
            }
                
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstHeart->ActionParameter = $objQuestions->Id;
            $this->arrayHeart[] = $lstHeart;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstHeart->Render(false);
    }

}

NewLRAAssessmentForm::Run('NewLRAAssessmentForm');
?>