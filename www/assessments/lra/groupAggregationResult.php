<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GroupLRAAggregationResultForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Leadership Readiness Assessment';
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
		$groupArray = LraAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
		foreach($groupArray as $objGroup) {
			$assessmentArray[] = $objGroup->Id;
		}
			
		$this->initializeChart($assessmentArray);
		
		$this->lblDebug = new QLabel($this);
				
		$this->dtgUsers = new UserDataGrid($this);
        $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
        $this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirAssessments."/lra/viewAssessment.php/".$_ITEM->Id ?>','<?= $_FORM->RenderName($_ITEM)?>','Name');
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
		$groupArray = LraAssessment::LoadArrayByGroupId($this->objGroupAssessment->Id);	
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
		$LRAArray = $objUser->GetLraAssessmentArray();
        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $LRAArray[0]->Id;
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
		$fAverageArray = array();  
		$pTenureArray = array();
		$fTenureArray = array();
		$pTitleArray = array();
		$fTitleArray = array();
			
		foreach(LraCategoryType::$NameArray as $key=>$value) {	
			$pHeadTotal = $pHandsTotal = $pHeartTotal = 0;
			$fHeadTotal = $fHandsTotal = $fHeartTotal = 0;
			$totalCount = 0;
			$tenureCount = array();
			$tenureTotal = array();
			$titleCount = array();
			$titleTotal = array();
			foreach($assessmentArray as $assessmentId) {
				$objAssessment = LraAssessment::Load($assessmentId);
				$objUser = User::Load($objAssessment->UserId);
				$intTenureId = $objUser->TenureId;	
				$intTitleId = $objUser->TitleId;			
				$resultArray = LraResults::LoadArrayByAssessmentIdAndCategory($assessmentId,$key);
				foreach( $resultArray as $objResult) {
					if(substr($value,0 ,1)=='F') {
						$fHeadTotal += $objResult->Head;
						$fHandsTotal += $objResult->Hands;
						$fHeartTotal += $objResult->Heart;
					} else {
						$pHeadTotal += $objResult->Head;
						$pHandsTotal += $objResult->Hands;
						$pHeartTotal += $objResult->Heart;
					}
					if(array_key_exists ($intTenureId, $tenureTotal)) {
						$tenureTotal[$intTenureId] += ($objResult->Head + $objResult->Hands + $objResult->Heart)/3;
					} else {
						$tenureTotal[$intTenureId] =($objResult->Head + $objResult->Hands + $objResult->Heart)/3;
					}
					if(array_key_exists ($intTenureId, $tenureCount)) {
						$tenureCount[$intTenureId] += 1;
					} else {
						$tenureCount[$intTenureId] = 1;
					}
					if(array_key_exists ($intTitleId, $titleTotal)) {
						$titleTotal[$intTitleId] += ($objResult->Head + $objResult->Hands + $objResult->Heart)/3;
					} else {
						$titleTotal[$intTitleId] =($objResult->Head + $objResult->Hands + $objResult->Heart)/3;
					}
					if(array_key_exists ($intTitleId, $titleCount)) {
						$titleCount[$intTitleId] += 1;
					} else {
						$titleCount[$intTitleId] = 1;
					}
				}
				$totalCount += count($resultArray);
			}
			if(substr($value,0 ,1)=='F') {
				$objItem = new tenFAverageArray();
				$objItem->F = $value;
				$objItem->head = round(($totalCount)? $fHeadTotal/$totalCount :0 , 2);	
				$objItem->hands = round($totalCount? $fHandsTotal/$totalCount :0 , 2);
				$objItem->heart = round($totalCount? $fHeartTotal/$totalCount :0 ,2);
				$fAverageArray[] = $objItem;
				
				$objTenureItem = new tenFTenureArray();
				$objTenureItem->F = $value;
				$objTenureItem->zeroTothree = round(array_key_exists ("1", $tenureCount)? $tenureTotal["1"]/$tenureCount["1"] :0 , 2);
				$objTenureItem->fourToseven = round(array_key_exists ("2", $tenureCount)? $tenureTotal["2"]/$tenureCount["2"] :0 , 2);
				$objTenureItem->sevenPlus = round(array_key_exists ("3", $tenureCount)? $tenureTotal["3"]/$tenureCount["3"] :0 , 2);
				$fTenureArray[] = $objTenureItem;
				
				$objTitleItem = new tenFTitleArray();
				$objTitleItem->F = $value;
				$objTitleItem->executive = round(array_key_exists ("1", $titleCount)? $titleTotal["1"]/$titleCount["1"] :0 , 2);
				$objTitleItem->manager = round(array_key_exists ("2", $titleCount)? $titleTotal["2"]/$titleCount["2"] :0 , 2);
				$objTitleItem->other = round(array_key_exists ("3", $titleCount)? $titleTotal["3"]/$titleCount["3"] :0 , 2);
				$fTitleArray[] = $objTitleItem;
				
			} else {
				$objItem = new tenPAverageArray();
				$objItem->P = $value;
				$objItem->head = round($totalCount? $pHeadTotal/$totalCount:0 ,2);	
				$objItem->hands = round($totalCount? $pHandsTotal/$totalCount :0 ,2);
				$objItem->heart = round($totalCount? $pHeartTotal/$totalCount :0 ,2);
				$pAverageArray[] = $objItem;
				
				$objTenureItem = new tenPTenureArray();
				$objTenureItem->P = $value;
				$objTenureItem->zeroTothree = round(array_key_exists ("1", $tenureCount)? $tenureTotal["1"]/$tenureCount["1"] :0 , 2);
				$objTenureItem->fourToseven = round(array_key_exists ("2", $tenureCount)? $tenureTotal["2"]/$tenureCount["2"] :0 , 2);
				$objTenureItem->sevenPlus = round(array_key_exists ("3", $tenureCount)? $tenureTotal["3"]/$tenureCount["3"] :0 , 2);
				$pTenureArray[] = $objTenureItem;
				
				$objTitleItem = new tenPTitleArray();
				$objTitleItem->P = $value;
				$objTitleItem->executive = round(array_key_exists ("1", $titleCount)? $titleTotal["1"]/$titleCount["1"] :0 , 2);
				$objTitleItem->manager = round(array_key_exists ("2", $titleCount)? $titleTotal["2"]/$titleCount["2"] :0 , 2);
				$objTitleItem->other = round(array_key_exists ("3", $titleCount)? $titleTotal["3"]/$titleCount["3"] :0 , 2);
				$pTitleArray[] = $objTitleItem;
			}
		}		
		QApplication::ExecuteJavaScript('DisplayPAverageChart('.json_encode($pAverageArray).');');
		QApplication::ExecuteJavaScript('DisplayFAverageChart('.json_encode($fAverageArray).');');	
		QApplication::ExecuteJavaScript('DisplayPTenureChart('.json_encode($pTenureArray).');');
		QApplication::ExecuteJavaScript('DisplayFTenureChart('.json_encode($fTenureArray).');');	
		
		QApplication::ExecuteJavaScript('DisplayPTitleChart('.json_encode($pTitleArray).');');
		QApplication::ExecuteJavaScript('DisplayFTitleChart('.json_encode($fTitleArray).');');
	}
}

GroupLRAAggregationResultForm::Run('GroupLRAAggregationResultForm');
class tenFAverageArray {
			public $F;
			public $head;
			public $hands;
			public $heart;
		}
class tenPAverageArray {
			public $P;
			public $head;
			public $hands;
			public $heart;
		}
class tenFTenureArray {
			public $F;
			public $zeroTothree;
			public $fourToseven;
			public $sevenPlus;
		}
class tenPTenureArray {
			public $P;
			public $zeroTothree;
			public $fourToseven;
			public $sevenPlus;
		}
class tenFTitleArray {
			public $F;
			public $executive;
			public $manager;
			public $other;
		}
class tenPTitleArray {
			public $P;
			public $executive;
			public $manager;
			public $other;
		}
?>