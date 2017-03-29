<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GroupPAwareAggregationResultForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Partnering Awareness Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $dtgUsers;
	protected $objGroupAssessment;
	protected $selectedUserArray;
	protected $btnSubmit;
	
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
	}
	
	protected function Form_Create() {
		$this->objGroupAssessment = GroupAssessmentList::Load(QApplication::PathInfo(0));
		$this->selectedUserArray = array();
		
		$assessmentArray = array();
		$groupArray = PartneringAwarenessAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$assessmentArray[] = $objGroup->Id;
		}
			
		$this->initializeChart($assessmentArray);
		
		$this->lblDebug = new QLabel($this);
				
		$this->dtgUsers = new UserDataGrid($this);
        $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
        $this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirAssessments."/partnerready/viewAssessment.php/".$_ITEM->Id ?>','<?= $_FORM->RenderName($_ITEM)?>','Name');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_FORM->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgUsers->MetaAddColumn('Country', 'Html=<?= $_FORM->RenderCountry($_ITEM); ?>','Width=100px');
        $this->dtgUsers->MetaAddColumn('Title', 'Html=<?= $_FORM->RenderTitle($_ITEM); ?>','Width=100px');
        $this->dtgUsers->MetaAddColumn('Tenure', 'Html=<?= $_FORM->RenderTenure($_ITEM); ?>','Width=100px');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Select User for Group Analysis', '<?= $_FORM->chkSelected_Render($_ITEM, $_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false','Width=200px' ));
            			
        $this->dtgUsers->CellPadding = 5;
		$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
		$this->dtgUsers->NoDataHtml = 'No Users have taken the Assessment.';
		$this->dtgUsers->UseAjax = true;
		$this->dtgUsers->Width = 700;
		
		$this->dtgUsers->SortColumnIndex = 1;
		$this->dtgUsers->ItemsPerPage = 20;
		$this->dtgUsers->GridLines = QGridLines::Both;
		
		$objStyle = $this->dtgUsers->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgUsers->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $objStyle = $this->dtgUsers->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#0098c3'; 
        
        $this->btnSubmit = new QButton($this);
        $this->btnSubmit->Text = "Apply Group Analysis to selected Users";
		$this->btnSubmit->CssClass = 'primary';
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
        
	}

	public function dtgUsers_Bind() {
		$userArray = array();
		$groupArray = PartneringAwarenessAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$userArray[] = User::Load($objGroup->UserId);
		}	
		$this->dtgUsers->DataSource = $userArray; 
	}
		
	public function RenderName($objUser) {
		return $objUser->FirstName . ' ' . $objUser->LastName;
	}
	
    public function RenderUserName($intLoginId) {
    	$objLogin = Login::Load($intLoginId);
		return $objLogin->Username;
	}
	
	public function RenderCountry(User $objUser) {
    	if($objUser->CountryId) {
    		return CountryList::Load($objUser->CountryId)->Name;
    	} else return ' ';
	}

	public function RenderTitle(User $objUser) {
    	if($objUser->TitleId) {
    		return TitleList::Load($objUser->TitleId)->Name;
    	} else return ' ';
	}

	public function RenderTenure(User $objUser) {
    	if($objUser->TenureId) {
    		return TenureList::Load($objUser->TenureId)->Range;
    	} else return ' ';
	}
	
	public function chkSelected_Render(User $objUser, $intRow) {
     	$strControlId = 'chkSelected' . $objUser->Id;
		$partneringAwarenessArray = $objUser->GetPartneringAwarenessAssessmentArray();
        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $partneringAwarenessArray[0]->Id;
            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chkSelected_Click'));
        }
        return $chkSelected->Render(false);
            
    }
        
    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
		$intUserId = $strParameter;
		if ($this->GetControl($strControlId)->Checked) {
			if (!in_array ($intUserId, $this->selectedUserArray))
				$this->selectedUserArray[] = $intUserId;
		} else {
			$key = array_search($intUserId, $this->selectedUserArray);
			unset($this->selectedUserArray[$key]);
		}
    }
 
	public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
		$this->initializeChart($this->selectedUserArray);
	}
	
	protected function initializeChart($assessmentArray) {
		$pAverageArray = array();
		$importanceArray = array();
		$performanceArray = array();
			
		foreach(CategoryType::$NameArray as $key=>$value) {	
			$pImportanceTotal = $pPerformanceTotal = 0;
			$totalCount = 0;
			$importanceCount = array();
			$importanceTotal = array();
			$PerformanceCount = array();
			$PerformanceTotal = array();
			foreach($assessmentArray as $assessmentId) {
				$objAssessment = PartneringAwarenessAssessment::Load($assessmentId);
				$objUser = User::Load($objAssessment->UserId);
				$intTenureId = $objUser->TenureId;	
				$intTitleId = $objUser->TitleId;			
				$resultArray = PartneringAwarenessResults::LoadArrayByAssessmentIdAndCategory($assessmentId,$key);
				foreach( $resultArray as $objResult) {
					$pImportanceTotal += $objResult->Importance;
					$pPerformanceTotal += $objResult->Performance;
					
					if(array_key_exists ($assessmentId, $importanceTotal)) {
						$importanceTotal[$assessmentId] += $objResult->Importance;
					} else {
						$importanceTotal[$assessmentId] = $objResult->Importance;
					}
					if(array_key_exists ($assessmentId, $importanceCount)) {
						$importanceCount[$assessmentId] += 1;
					} else {
						$importanceCount[$assessmentId] = 1;
					}
					
					if(array_key_exists ($assessmentId, $PerformanceTotal)) {
						$PerformanceTotal[$assessmentId] += $objResult->Performance;
					} else {
						$PerformanceTotal[$assessmentId] =$objResult->Performance;
					}
					if(array_key_exists ($assessmentId, $PerformanceCount)) {
						$PerformanceCount[$assessmentId] += 1;
					} else {
						$PerformanceCount[$assessmentId] = 1;
					}
				}
				$totalCount += count($resultArray);
			}
					
				$objItem = new aggregateArray();
				$objItem->P = $value;
				$objItem->importance = round($totalCount? $pImportanceTotal/$totalCount:0 ,2);	
				$objItem->performance = round($totalCount? $pPerformanceTotal/$totalCount :0 ,2);
				$pAverageArray[] = $objItem;
				
				$objImportanceItem = new importanceArray();
				$objImportanceItem->P = $value;
				$objPerformanceItem = new performanceArray();
				$objPerformanceItem->P = $value;
				for($i=0; $i<count($importanceCount); $i++) {
					$assessmentId = $assessmentArray[$i];
					switch ($i) {
						case 0:
							$objImportanceItem->userName1 = PartneringAwarenessAssessment::Load($assessmentId)->User->FirstName . ' ' . PartneringAwarenessAssessment::Load($assessmentId)->User->LastName;
							$objImportanceItem->user1 = round($importanceCount[$assessmentId]? $importanceTotal[$assessmentId]/$importanceCount[$assessmentId] :0 , 2);
							$objPerformanceItem->userName1 = PartneringAwarenessAssessment::Load($assessmentId)->User->FirstName . ' ' . PartneringAwarenessAssessment::Load($assessmentId)->User->LastName;
							$objPerformanceItem->user1 = round($PerformanceCount[$assessmentId]? $PerformanceTotal[$assessmentId]/$PerformanceCount[$assessmentId] :0 , 2);
						break;
						case 1:
							$objImportanceItem->userName2 = PartneringAwarenessAssessment::Load($assessmentId)->User->FirstName . ' ' . PartneringAwarenessAssessment::Load($assessmentId)->User->LastName;
							$objImportanceItem->user2 = round($importanceCount[$assessmentId]? $importanceTotal[$assessmentId]/$importanceCount[$assessmentId] :0 , 2);
							$objPerformanceItem->userName2 = PartneringAwarenessAssessment::Load($assessmentId)->User->FirstName . ' ' . PartneringAwarenessAssessment::Load($assessmentId)->User->LastName;
							$objPerformanceItem->user2 = round($PerformanceCount[$assessmentId]? $PerformanceTotal[$assessmentId]/$PerformanceCount[$assessmentId] :0 , 2);
							
						break;
						default:
							;
						break;
					}	
				}
				$importanceArray[] = $objImportanceItem;
				$performanceArray[] = $objPerformanceItem;
		}		
		QApplication::ExecuteJavaScript('DisplayAggregateChart('.json_encode($pAverageArray).');');
		QApplication::ExecuteJavaScript('DisplayImportanceChart('.json_encode($importanceArray).');');		
		QApplication::ExecuteJavaScript('DisplayPerformanceChart('.json_encode($performanceArray).');');
	}
}

GroupPAwareAggregationResultForm::Run('GroupPAwareAggregationResultForm');
class aggregateArray {
			public $P;
			public $importance;
			public $performance;
		}
class importanceArray {
			public $P;
			public $userName1;
			public $userName2;
			public $user1;
			public $user2;			
		}
class performanceArray {
			public $P;
			public $userName1;
			public $userName2;
			public $user1;
			public $user2;	
		}
?>