<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class EditViewPReadinessAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Partnering Readiness Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objPReadinessAssessment;
	protected $dtgAssessmentQuestions;
	protected $btnSubmit;
	protected $btnCancel;
	protected $importance;
	protected $willingness;
	protected $bEditing;
	protected $dtgAssessmentQuestionArray;
	protected $purpose;
	protected $product;
	protected $positioning;
	protected $presence;
	protected $partnering;
	protected $process;
	protected $people;
	protected $place;
	protected $planning;
	protected $profit;
	protected $btnPrev;
	protected $btnNext;
	protected $iCounter;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {	
		$this->purpose = new QImageButton($this);
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->purpose->AddAction(new QClickEvent(), new QAjaxAction('displayPurpose'));
		$this->purpose->Cursor = 'pointer';
		
		$this->product = new QImageButton($this);
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->AddAction(new QClickEvent(), new QAjaxAction('displayProduct'));
		$this->product->Cursor = 'pointer';
		
		$this->positioning = new QImageButton($this);
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->AddAction(new QClickEvent(), new QAjaxAction('displayPositioning'));
		$this->positioning->Cursor = 'pointer';
		
		$this->presence = new QImageButton($this);
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->AddAction(new QClickEvent(), new QAjaxAction('displayPresence'));
		$this->presence->Cursor = 'pointer';
		
		$this->partnering = new QImageButton($this);
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->AddAction(new QClickEvent(), new QAjaxAction('displayPartnering'));
		$this->partnering->Cursor = 'pointer';
			
		$this->process = new QImageButton($this);
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->AddAction(new QClickEvent(), new QAjaxAction('displayProcess'));
		$this->process->Cursor = 'pointer';
		
		$this->place = new QImageButton($this);
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->AddAction(new QClickEvent(), new QAjaxAction('displayPlace'));
		$this->place->Cursor = 'pointer';
		
		$this->people = new QImageButton($this);
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->AddAction(new QClickEvent(), new QAjaxAction('displayPeople'));
		$this->people->Cursor = 'pointer';
		
		$this->planning = new QImageButton($this);
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->AddAction(new QClickEvent(), new QAjaxAction('displayPlanning'));
		$this->planning->Cursor = 'pointer';
		
		$this->profit = new QImageButton($this);
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->AddAction(new QClickEvent(), new QAjaxAction('displayProfit'));
		$this->profit->Cursor = 'pointer';
		
		if(QApplication::PathInfo(0) == 'edit') {
			$this->bEditing = true;
		} else {
			$this->bEditing = false;
		}
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intUserId = $userArray[0]->Id;
		
		$assessmentArray = PartneringReadinessAssessment::LoadArrayByUserId($intUserId);
		$this->objPReadinessAssessment = $assessmentArray[0];
		
		$this->importance = array();
	 	$this->willingness = array();
	 	$this->dtgAssessmentQuestionArray = array();
	 	
	 	for($i=0; $i<10;$i++) {
	 		$this->dtgAssessmentQuestionArray[$i] = new PartneringReadinessQuestionsDataGrid($this);
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->Count) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Importance', '<?= $_FORM->lstImportance_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->AddColumn(new QDataGridColumn('Willingness', '<?= $_FORM->lstWillingness_Render($_ITEM) ?>','HtmlEntities=false'));
			$this->dtgAssessmentQuestionArray[$i]->CellPadding = 5;
			$this->dtgAssessmentQuestionArray[$i]->UseAjax = true;
			$this->dtgAssessmentQuestionArray[$i]->CssClass = 'table table-striped table-hover';
	
			$assessmentArray = PartneringReadinessQuestions::LoadArrayByCategoryId($i+1);					
			$this->dtgAssessmentQuestionArray[$i]->DataSource = $assessmentArray; 
				
	        $objStyle = $this->dtgAssessmentQuestionArray[$i]->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        
	        $objStyle = $this->dtgAssessmentQuestionArray[$i]->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	 		
	 	}
		       
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = 'Submit';
	 	$this->btnSubmit->CssClass = 'btn btn-default';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

	 	$this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Cancel';
	 	$this->btnCancel->CssClass = 'btn btn-default';
	 	$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));	
	 	
	 	$this->iCounter = 0;
	 	$this->btnPrev = new QButton($this);
        $this->btnPrev->Text = 'Previous';
	 	$this->btnPrev->CssClass = 'btn btn-default';
	 	$this->btnPrev->AddAction(new QClickEvent(), new QAjaxAction('btnPrev_Click'));
	 	$this->btnPrev->Enabled = false;
	 	
	 	$this->btnNext = new QButton($this);
        $this->btnNext->Text = 'Next';
	 	$this->btnNext->CssClass = 'btn btn-default';
	 	$this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
	 	
	 	// initialize grid chart
	 	QApplication::ExecuteJavaScript('DisplayQuestions("Purpose");');
	 	
	 	$this->updateChart();
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/partnerready/index.php');
	}

	protected function btnPrev_Click() {
		switch($this->iCounter) {
			case 0:
				// Do nothing - should never be here
				break;
			case 1:
				$this->iCounter = 0;
				$this->displayPurpose();
				break;
			case 2:
				$this->iCounter = 1;
				$this->displayProduct();
				break;
			case 3:
				$this->iCounter = 2;
				$this->displayPositioning();
				break;
			case 4:
				$this->iCounter = 3;
				$this->displayPresence();
				break;
			case 5:
				$this->iCounter = 4;
				$this->displayPartnering();
				break;
			case 6:
				$this->iCounter = 5;
				$this->displayProcess();
				break;
			case 7:
				$this->iCounter = 6;
				$this->displayPeople();
				break;
			case 8:
				$this->iCounter = 7;
				$this->displayPlace();
				break;
			case 9:
				$this->iCounter = 8;
				$this->displayPlanning();
				break;			
		}
	}

	protected function btnNext_Click() {
		switch($this->iCounter) {
			case 0:
				$this->iCounter = 1;
				$this->displayProduct();
				break;			
			case 1:
				$this->iCounter = 2;
				$this->displayPositioning();
				break;
			case 2:
				$this->iCounter = 3;
				$this->displayPresence();
				break;
			case 3:
				$this->iCounter = 4;
				$this->displayPartnering();
				break;
			case 4:
				$this->iCounter = 5;
				$this->displayProcess();
				break;
			case 5:
				$this->iCounter = 6;
				$this->displayPeople();
				break;
			case 6:
				$this->iCounter = 7;
				$this->displayPlace();
				break;
			case 7:
				$this->iCounter = 8;
				$this->displayPlanning();
				break;
			case 8:
				$this->iCounter = 9;
				$this->displayProfit();
				break;
			case 9:
				$this->saveResults();
				QApplication::Redirect(__SUBDIRECTORY__.'/assessments/partnerready/viewAssessment.php');
				break;
		}
	}
	
	protected function btnSubmit_Click() {	
        $this->saveResults();
       /* if(!$this->bEditing) {
	        $this->objPReadinessAssessment->ResourceStatusId = 2;
	        $this->objPReadinessAssessment->Save();
        }
        */
		//QApplication::Redirect(__SUBDIRECTORY__.'/assessments/partnerready/viewAssessment.php');
	}
	
	protected function saveResults() {
		for($i=0;$i<count($this->willingness); $i++) {
			$objResults = PartneringReadinessResults::LoadResultByAssessmentIdAndQuestionId($this->objPReadinessAssessment->Id, $this->willingness[$i]->ActionParameter);
			if($objResults == null){
				$objResults = new PartneringReadinessResults();
			}
		/*	if($this->bEditing) {
	        	$objResults = PartneringReadinessResults::LoadResultByAssessmentIdAndQuestionId($this->objPReadinessAssessment->Id, $i+1);
	        } else {
        		$objResults = new PartneringReadinessResults();
	        }
        */		
	        $objResults->AssessmentId = $this->objPReadinessAssessment->Id;  
	        $objResults->Importance =  $this->importance[$i]->SelectedValue;
	        $objResults->Willingness =  $this->willingness[$i]->SelectedValue;
	        $objResults->QuestionId = $this->willingness[$i]->ActionParameter;
	        $objResults->Save(); 
        } 
        $this->objPReadinessAssessment->ResourceStatusId = 2;       
	    $this->objPReadinessAssessment->Save();
	}
	
public function lstImportance_Render(PartneringReadinessQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'importance' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
        // Let's see if the Checkbox exists already
        $lstimportance = $this->GetControl($strControlId);
            
        if (!$lstimportance) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstimportance = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstimportance->Width = 100;
            $lstimportance->CssClass = 'form-control';
            $lstimportance->ForeColor = '#F90949';
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = PartneringReadinessResults::GetImportanceByAssessmentIdAndQuestionId($this->objPReadinessAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstimportance->AddItem($i,$i,true);
	            	else 
	            		$lstimportance->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstimportance->AddItem($i,$i);
	            }
            }           
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstimportance->ActionParameter = $objQuestions->Id;
            $this->importance[] = $lstimportance;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstimportance->Render(false);
    }
    
public function lstWillingness_Render(PartneringReadinessQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'willingness' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
		
        // Let's see if the Checkbox exists already
        $lstWilingness = $this->GetControl($strControlId);
            
        if (!$lstWilingness) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstWilingness = new QListBox($this->dtgAssessmentQuestionArray[$index], $strControlId);
            $lstWilingness->Width = 100;
            $lstWilingness->CssClass = 'form-control';
            $lstWilingness->ForeColor = '#131BF9';
            
        	// Initialize values from previous assessment
            if($this->bEditing) {
            	$value = PartneringReadinessResults::GetWillingnessByAssessmentIdAndQuestionId($this->objPReadinessAssessment->Id, $objQuestions->Id);
	            for ($i=1; $i<8; $i++) {
	            	if ($value == $i) 
	            		$lstWilingness->AddItem($i,$i,true);
	            	else 
	            		$lstWilingness->AddItem($i,$i);
	            }
            } else {
            	for ($i=1; $i<8; $i++) {
	            	$lstWilingness->AddItem($i,$i);
	            }
            }
                
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstWilingness->ActionParameter = $objQuestions->Id;
            $this->willingness[] = $lstWilingness;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstWilingness->Render(false);
    }

	public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    }
    
	public function displayPurpose() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Purpose");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 0;
		$this->btnPrev->Enabled = false;
		$this->btnNext->Enabled = true;
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayProduct() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Product");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 1;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;		
		$this->saveResults();
		$this->updateChart();
	}

	public function displayPositioning() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Positioning");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 2;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayPresence() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Presence");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 3;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayPartnering() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Partnering");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 4;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}

	public function displayProcess() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Process");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 5;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayPeople() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("People");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 6;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}

	public function displayPlace() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Place");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 7;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}

	public function displayPlanning() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Planning");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->iCounter = 8;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayProfit() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("Profit");');
		$this->purpose->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->product->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->positioning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->presence->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->partnering->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->process->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->people->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->place->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->planning->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/step.png';
		$this->profit->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/stepselected.png';
		$this->iCounter = 9;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Finish';
		$this->saveResults();
		$this->updateChart();
	}
	
	protected function updateChart() {
		$associatedArray = array(); 
		foreach(CategoryType::$NameArray as $key=>$value) {			
			$resultArray = PartneringReadinessResults::LoadArrayByAssessmentIdAndCategory($this->objPReadinessAssessment->Id,$key);
			$wtotal = $itotal = 0;
			foreach( $resultArray as $objResult) {
				$wtotal += $objResult->Willingness;
				$itotal += $objResult->Importance;
			}
			$objItem = new tenPArray();
			$objItem->P = $value;
			$objItem->willingness = (count($resultArray))? $wtotal/count($resultArray) : 0;	
			$objItem->importance = (count($resultArray)) ? $itotal/count($resultArray) :0;
			$associatedArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
}

EditViewPReadinessAssessmentForm::Run('EditViewPReadinessAssessmentForm');

class tenPArray {
			public $P;
			public $importance;
			public $willingness;
		}
?>