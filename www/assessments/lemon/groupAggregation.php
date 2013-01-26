<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GroupAggregationForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $dtgGroupAssessments;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/resources/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect('/resources/index.php');
		}
	}
	
	protected function Form_Create() {
		$this->dtgGroupAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupAssessments->Paginator = new QPaginator($this->dtgGroupAssessments);
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupAssessments->AddColumn(new QDataGridColumn('Assessment Type', '<?= $_FORM->RenderAssessmentType($_ITEM) ?>', 'HtmlEntities=false' )); 
        $this->dtgGroupAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "lemon/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgGroupAssessments->CellPadding = 5;
		$this->dtgGroupAssessments->SetDataBinder('dtgGroupAssessments_Bind',$this);
		$this->dtgGroupAssessments->NoDataHtml = 'No Group Assessments have been assigned.';
		$this->dtgGroupAssessments->UseAjax = true;
		
		$this->dtgGroupAssessments->SortColumnIndex = 1;
		$this->dtgGroupAssessments->ItemsPerPage = 20;
		
		$objStyle = $this->dtgGroupAssessments->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgGroupAssessments->AlternateRowStyle;
        $objStyle->BackColor = '#CCCCCC';

        $objStyle = $this->dtgGroupAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
        
        $objStyle = $this->dtgGroupAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#003366'; 
	}

	public function dtgGroupAssessments_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgGroupAssessments->DataSource = $filteredGroupArray; 
		}
	}
		
	public function RenderAssessmentType($objGroupAssessment) {
		$intResourceId = $objGroupAssessment->ResourceId;
			foreach(Resource::LoadAll() as $objResource) {
				if($objResource->Name != 'Scorecard') {
					if($intResourceId == $objResource->Id)
						$strReturn = $objResource->Name;
				}
			}				
		return $strReturn;
	}
}

GroupAggregationForm::Run('GroupAggregationForm');
?>