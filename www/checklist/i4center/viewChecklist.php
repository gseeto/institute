<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewChecklistForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'i4 Center Business Checklist';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $objChecklist;
	protected $dtgAssessmentQuestions;
	protected $btnSubmit;
	protected $btnCancel;
	protected $arrayRating;
	protected $arrayDri;
	protected $bEditing;
	protected $dtgChecklistQuestionArray;
	protected $one;
	protected $two;
	protected $three;
	protected $four;
	protected $five;
	protected $six;
	protected $seven;
	protected $eight;
	protected $nine;
	protected $ten;
	protected $eleven;
	protected $twelve;
	protected $thirteen;
	protected $fourteen;
	protected $fifteen;
	protected $sixteen;
	protected $seventeen;
	protected $eighteen;
	protected $nineteen;
	protected $twenty;
	protected $twentyone;
	protected $btnPrev;
	protected $btnNext;
	protected $iCounter;
	protected $iSaveCategory;
	protected $intQuestionCount;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {	
		$this->one = new QImageButton($this);
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->one->AddAction(new QClickEvent(), new QAjaxAction('displayone'));
		$this->one->Cursor = 'pointer';
		
		$this->two = new QImageButton($this);
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->AddAction(new QClickEvent(), new QAjaxAction('displaytwo'));
		$this->two->Cursor = 'pointer';
		
		$this->three = new QImageButton($this);
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->AddAction(new QClickEvent(), new QAjaxAction('displaythree'));
		$this->three->Cursor = 'pointer';
		
		$this->four = new QImageButton($this);
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->AddAction(new QClickEvent(), new QAjaxAction('displayfour'));
		$this->four->Cursor = 'pointer';
		
		$this->five = new QImageButton($this);
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->AddAction(new QClickEvent(), new QAjaxAction('displayfive'));
		$this->five->Cursor = 'pointer';
			
		$this->six = new QImageButton($this);
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->AddAction(new QClickEvent(), new QAjaxAction('displaysix'));
		$this->six->Cursor = 'pointer';
		
		$this->eight = new QImageButton($this);
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->AddAction(new QClickEvent(), new QAjaxAction('displayeight'));
		$this->eight->Cursor = 'pointer';
		
		$this->seven = new QImageButton($this);
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->AddAction(new QClickEvent(), new QAjaxAction('displayseven'));
		$this->seven->Cursor = 'pointer';
		
		$this->nine = new QImageButton($this);
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->AddAction(new QClickEvent(), new QAjaxAction('displaynine'));
		$this->nine->Cursor = 'pointer';
		
		$this->ten = new QImageButton($this);
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->AddAction(new QClickEvent(), new QAjaxAction('displayten'));
		$this->ten->Cursor = 'pointer';
		
		$this->eleven = new QImageButton($this);
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->AddAction(new QClickEvent(), new QAjaxAction('displayeleven'));
		$this->eleven->Cursor = 'pointer';
		
		$this->twelve = new QImageButton($this);
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->AddAction(new QClickEvent(), new QAjaxAction('displaytwelve'));
		$this->twelve->Cursor = 'pointer';
		
		$this->thirteen = new QImageButton($this);
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->AddAction(new QClickEvent(), new QAjaxAction('displaythirteen'));
		$this->thirteen->Cursor = 'pointer';
		
		$this->fourteen = new QImageButton($this);
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->AddAction(new QClickEvent(), new QAjaxAction('displayfourteen'));
		$this->fourteen->Cursor = 'pointer';
		
		$this->fifteen = new QImageButton($this);
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->AddAction(new QClickEvent(), new QAjaxAction('displayfifteen'));
		$this->fifteen->Cursor = 'pointer';
		
		$this->sixteen = new QImageButton($this);
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->AddAction(new QClickEvent(), new QAjaxAction('displaysixteen'));
		$this->sixteen->Cursor = 'pointer';
	
		$this->seventeen = new QImageButton($this);
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->AddAction(new QClickEvent(), new QAjaxAction('displayseventeen'));
		$this->seventeen->Cursor = 'pointer';
		
		$this->eighteen = new QImageButton($this);
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->AddAction(new QClickEvent(), new QAjaxAction('displayeighteen'));
		$this->eighteen->Cursor = 'pointer';
		
		$this->nineteen = new QImageButton($this);
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->AddAction(new QClickEvent(), new QAjaxAction('displaynineteen'));
		$this->nineteen->Cursor = 'pointer';
		
		$this->twenty = new QImageButton($this);
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->AddAction(new QClickEvent(), new QAjaxAction('displaytwenty'));
		$this->twenty->Cursor = 'pointer';
		
		$this->twentyone = new QImageButton($this);
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->AddAction(new QClickEvent(), new QAjaxAction('displaytwentyone'));
		$this->twentyone->Cursor = 'pointer';
		
		if(QApplication::PathInfo(1) == 'edit') {
			$this->bEditing = true;
		} else {
			$this->bEditing = false;
		}
		$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
		$intChecklistId = QApplication::PathInfo(0);		
		$this->objChecklist = BusinessChecklist::Load($intChecklistId);
		
		$this->arrayRating = array();
		$this->arrayDri = array();
	 	$this->dtgChecklistQuestionArray = array();
	 	$this->intQuestionCount = ChecklistCategories::CountAll();
	 	for($i=0; $i<$this->intQuestionCount;$i++) {
	 		$this->dtgChecklistQuestionArray[$i] = new BusinessChecklistDataGrid($this);
			$this->dtgChecklistQuestionArray[$i]->AddColumn(new QDataGridColumn('', '<?= $_FORM->RenderQuestionId($_ITEM->Count) ?>', 'HtmlEntities=false', 'Width=30px' ));
			$this->dtgChecklistQuestionArray[$i]->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->Text ?>', 'HtmlEntities=false', 'Width=450px' ));			
			$this->dtgChecklistQuestionArray[$i]->AddColumn(new QDataGridColumn('Rating', '<?= $_FORM->lstRating_Render($_ITEM) ?>','HtmlEntities=false', 'Width=150px'));
			$this->dtgChecklistQuestionArray[$i]->AddColumn(new QDataGridColumn('Person Responsible', '<?= $_FORM->lstDRI_Render($_ITEM) ?>','HtmlEntities=false', 'Width=200px'));
			$this->dtgChecklistQuestionArray[$i]->CellPadding = 5;
			$this->dtgChecklistQuestionArray[$i]->UseAjax = true;
	
			$checklistArray = BusinessChecklistQuestions::LoadArrayByCategoryId($i+1);					
			$this->dtgChecklistQuestionArray[$i]->DataSource = $checklistArray; 
			
			$this->dtgChecklistQuestionArray[$i]->NoDataHtml = 'No Checklist Questions under this P.';
			
			$objStyle = $this->dtgChecklistQuestionArray[$i]->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgChecklistQuestionArray[$i]->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgChecklistQuestionArray[$i]->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 
	        
	        $objStyle = $this->dtgChecklistQuestionArray[$i]->HeaderLinkStyle;
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
	 	
	 	$this->iCounter = 0;
	 	$this->iSaveCategory = 1;
	 	$this->btnPrev = new QButton($this);
        $this->btnPrev->Text = 'Previous';
	 	$this->btnPrev->CssClass = 'primary';
	 	$this->btnPrev->AddAction(new QClickEvent(), new QAjaxAction('btnPrev_Click'));
	 	$this->btnPrev->Enabled = false;
	 	
	 	$this->btnNext = new QButton($this);
        $this->btnNext->Text = 'Next';
	 	$this->btnNext->CssClass = 'primary';
	 	$this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
	 	
	 	// initialize grid chart
	 	QApplication::ExecuteJavaScript('DisplayQuestions("1");');
	 	
	 	$this->updateChart();
	 	$this->lblDebug = new QLabel($this);
	 	$this->lblDebug->HtmlEntities = false;
	 	$this->lblDebug->Text = 'Debug:';
	}
	
	protected function btnCancel_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/checklist/i4center/index.php');
	}

	protected function btnPrev_Click() {
		$this->iSaveCategory = $this->iCounter+1;
		switch($this->iCounter) {
			case 0:
				// Do nothing - should never be here
				break;
			case 1:
				$this->displayone();
				break;
			case 2:
				$this->displaytwo();
				break;
			case 3:
				$this->displaythree();
				break;
			case 4:
				$this->displayfour();
				break;
			case 5:
				$this->displayfive();
				break;
			case 6:
				$this->displaysix();
				break;
			case 7:
				$this->displayseven();
				break;
			case 8:
				$this->displayeight();
				break;
			case 9:
				$this->displaynine();
				break;			
			case 10:
				$this->displayten();
				break;
			case 11:
				$this->displayeleven();
				break;
			case 12:
				$this->displaytwelve();
				break;
			case 13:
				$this->displaythirteen();
				break;
			case 14:
				$this->displayfourteen();
				break;
			case 15:
				$this->displayfifteen();
				break;
			case 16:
				$this->displaysixteen();
				break;
			case 17:
				$this->displayseventeen();
				break;
			case 18:
				$this->displayeighteen();
				break;
			case 19:
				$this->displaynineteen();
				break;
			case 20:
				$this->displaytwenty();
				break;
			case 21:
				$this->displaytwentyone();
				break;
		}
	}

	protected function btnNext_Click() {
		$this->iSaveCategory = $this->iCounter+1;
		switch($this->iCounter) {
			case 0:
				$this->displaytwo();
				break;			
			case 1:
				$this->displaythree();
				break;
			case 2:
				$this->displayfour();
				break;
			case 3:
				$this->displayfive();
				break;
			case 4:
				$this->displaysix();
				break;
			case 5:
				$this->displayseven();
				break;
			case 6:
				$this->displayeight();
				break;
			case 7:
				$this->displaynine();
				break;
			case 8:
				$this->displayten();
				break;
			case 9:
				$this->displayeleven();
				break;
			case 10:
				$this->displaytwelve();
				break;
			case 11:
				$this->displaythirteen();
				break;
			case 12:
				$this->displayfourteen();
				break;
			case 13:
				$this->displayfifteen();
				break;
			case 14:
				$this->displaysixteen();
				break;
			case 15:
				$this->displayseventeen();
				break;
			case 16:
				$this->displayeighteen();
				break;
			case 17:
				$this->displaynineteen();
				break;
			case 18:
				$this->displaytwenty();
				break;
			case 19:
				$this->displaytwentyone();
				break;
			default:
				QApplication::Redirect(__SUBDIRECTORY__.'/checklist/i4center/viewAssessment.php');
				break;
		}
	}
	
	protected function btnSubmit_Click() {	
		$this->saveResults();   
		QApplication::Redirect(__SUBDIRECTORY__.'/checklist/i4center/viewAssessment.php');
	}
	
	protected function saveResults() {
		$objQuestions = BusinessChecklistQuestions::LoadArrayByCategoryId($this->iSaveCategory);
		foreach($objQuestions as $objQuestion) {
			$objResults = null;
			$objResults = BusinessChecklistResults::LoadResultByChecklistIdAndQuestionId($this->objChecklist->Id, $objQuestion->Id);
			if($objResults == null){
				$objResults = new BusinessChecklistResults();
			}
			$objResults->ChecklistId = $this->objChecklist->Id;  
	        $objResults->Value =  $this->arrayRating[$objQuestion->Count]->SelectedValue;
	        $objResults->QuestionId = $this->arrayRating[$objQuestion->Count]->ActionParameter;
	        if($this->arrayDri[$objQuestion->Count]->SelectedValue != 0)
	        	$objResults->UserId = $this->arrayDri[$objQuestion->Count]->SelectedValue;
	        	
	        $objResults->Save(); 
		}
	}

public function lstDRI_Render(BusinessChecklistQuestions $objQuestions) {
	// In order to keep track we will use explicitly defined control ids.
        $strControlId = 'dri' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
        // Let's see if the Checkbox exists already
        $lstDri = $this->GetControl($strControlId);
            
        if (!$lstDri) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstDri = new QListBox($this->dtgChecklistQuestionArray[$index], $strControlId);
            $lstDri->Width = 150;
            //$lstDri->ForeColor = '#F90949';
        	// Initialize values from previous assessment
            $iUserId = BusinessChecklistResults::GetDriByChecklistIdAndQuestionId($this->objChecklist->Id, $objQuestions->Id);
            $objUsers = $this->objChecklist->GetUserAsManagerArray();
            $lstDri->AddItem('-- Select User --',0,true);
            foreach($objUsers as $objUser) {
            	if ($iUserId == $objUser->Id) 
            		$lstDri->AddItem($objUser->FirstName.' '. $objUser->LastName,$objUser->Id,true);
            	else 
            		$lstDri->AddItem($objUser->FirstName.' '. $objUser->LastName,$objUser->Id);
            }
                  
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstDri->ActionParameter = $objQuestions->Id;
            $this->arrayDri[$objQuestions->Count] = $lstDri;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstDri->Render(false);
}

public function lstRating_Render(BusinessChecklistQuestions $objQuestions) {
        // In order to keep track we will use explicitly defined control ids.
        $strControlId = 'rating' . $objQuestions->Id;
		$index = $objQuestions->CategoryId - 1;
        // Let's see if the Checkbox exists already
        $lstRating = $this->GetControl($strControlId);
            
        if (!$lstRating) {
            // Define the ListBox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the listbox.  Also, we must
            // explicitly specify the control ID
            $lstRating = new QListBox($this->dtgChecklistQuestionArray[$index], $strControlId);
            $lstRating->Width = 50;
            //$lstRating->ForeColor = '#F90949';
        	// Initialize values from previous assessment
            $value = BusinessChecklistResults::GetValueByChecklistIdAndQuestionId($this->objChecklist->Id, $objQuestions->Id);
            for ($i=1; $i<8; $i++) {
            	if ($value == $i) 
            		$lstRating->AddItem($i,$i,true);
            	else 
            		$lstRating->AddItem($i,$i);
            }
                  
           
            // We'll use Control Parameters to help us identify the Question ID being copied
            $lstRating->ActionParameter = $objQuestions->Id;
            $this->arrayRating[$objQuestions->Count] = $lstRating;
        }

        // Render the listbox.  We want to *return* the contents of the rendered listbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $lstRating->Render(false);
    }
    
	public function RenderQuestionId($intQuestionId) {
    	$txtReturn = sprintf('<div style="color:#888888">%s</div>',$intQuestionId);
    	return $txtReturn;
    }
    
	public function displayone() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("1");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 0;
		$this->btnPrev->Enabled = false;
		$this->btnNext->Enabled = true;
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displaytwo() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("2");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 1;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;		
		$this->saveResults();
		$this->updateChart();
	}

	public function displaythree() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("3");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 2;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayfour() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("4");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 3;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayfive() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("5");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 4;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}

	public function displaysix() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("6");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 5;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayseven() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("7");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 6;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}

	public function displayeight() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("8");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 7;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->saveResults();
		$this->updateChart();
	}

	public function displaynine() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("9");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 8;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displayten() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("10");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 9;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	
public function displayeleven() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("11");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 10;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	
	public function displaytwelve() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("12");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 11;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displaythirteen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("13");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 12;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displayfourteen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("14");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 13;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displayfifteen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("15");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 14;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displaysixteen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("16");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 15;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displayseventeen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("17");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 16;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displayeighteen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("18");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 17;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displaynineteen() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("19");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 18;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displaytwenty() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("20");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 19;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Next';
		$this->saveResults();
		$this->updateChart();
	}
	public function displaytwentyone() {	
		QApplication::ExecuteJavaScript('DisplayQuestions("21");');
		$this->one->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->two->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->three->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->four->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->five->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->six->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eight->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nine->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->ten->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eleven->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twelve->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->thirteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fourteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->fifteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->sixteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->seventeen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->eighteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->nineteen->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twenty->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-step.jpg';
		$this->twentyone->ImageUrl = __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__.'/min-stepselected.jpg';
		$this->iSaveCategory = $this->iCounter+1;
		$this->iCounter = 20;
		$this->btnPrev->Enabled = true;
		$this->btnNext->Enabled = true;	
		$this->btnNext->Text = 'Finish';
		$this->saveResults();
		$this->updateChart();
	}
	protected function updateChart() {
		$associatedArray = array();
		$colorArray = array('#801F15','#550800','#D4746A','#552600','#804415','#D4996A','#554800','#807015','#D4C56A','#375000','#597814','#A8C764','#061339','#162656','#50608F','#240339','#3B1255','#744B8E','#430029','#641143','#A75486'); 
		$checklistCategories = ChecklistCategories::LoadAll();
		for($i=0; $i<count($checklistCategories); $i++) {			
			$resultArray = BusinessChecklistResults::LoadArrayByChecklistIdAndCategory($this->objChecklist->Id,$i+1);
			$total = 0;
			foreach( $resultArray as $objResult) {
				$total += $objResult->Value;
			}
			$objItem = new chklstArray();
			$objItem->section = $checklistCategories[$i]->Value;
			$objItem->value = (count($resultArray))? round($total/count($resultArray), 2) : 0;	
			$objItem->color = $colorArray[$i];			
			$associatedArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
	}
}

ViewChecklistForm::Run('ViewChecklistForm');

class chklstArray {
			public $section;
			public $value;
			public $color;
		}
?>