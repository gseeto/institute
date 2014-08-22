<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GroupAggregationResultForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $dtgUsers;
	//protected $objGroupAssessment;
	protected $selectedUserArray;
	protected $btnSubmit;
	protected $accordionCharts;
	protected $groupArray;
	protected $bIsAggregatedGroup;
	protected $title;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
	}
	
	protected function Form_Create() {
		$this->groupArray = explode('&',QApplication::PathInfo(0));
		if(count($this->groupArray)>1) {
			$this->bIsAggregatedGroup = true;
		} else {
			$this->bIsAggregatedGroup = false;
			//$title = GroupAssessmentList::Load(QApplication::PathInfo(0))->KeyCode;
			//$this->objGroupAssessment = GroupAssessmentList::Load(QApplication::PathInfo(0));
		}
		$this->selectedUserArray = array();
		
		$summary = '';
		$assessmentArray = array();
		$this->title = new QLabel($this);
		foreach($this->groupArray as $objGroupAssessmentId) {
			$objGroupAssessment = GroupAssessmentList::Load($objGroupAssessmentId);
			$this->title->Text .= $objGroupAssessment->KeyCode . ', ';
			$groupArray = LemonAssessment::LoadArrayByGroupId($objGroupAssessment->Id);	
			foreach($groupArray as $objGroup) {
				$assessmentArray[] = $objGroup->Id;
				// If the sums have not been done, calculate them and update
				if(!$objGroup->L) {
					$lemonValues = array(0,0,0,0,0);
					$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($objGroup->Id);
					foreach($resultArray as $objResult) {
						$intIndex = $objResult->Question->LemonTypeId - 1;
						$lemonValues[$intIndex] += $objResult->Value;
					}
					$objGroup->L = $lemonValues[0];
					$objGroup->E = $lemonValues[1];
					$objGroup->M = $lemonValues[2];
					$objGroup->O = $lemonValues[3];
					$objGroup->N = $lemonValues[4];
				}
				$lemonValues = array('L'=>$objGroup->L, 'E'=>$objGroup->E,'M'=>$objGroup->M,'O'=>$objGroup->O,'N'=>$objGroup->N);
				arsort($lemonValues);
				$i=1;
				$type = '';
				foreach($lemonValues as $key=>$value) {
					$type .= $key;
					$i++;
					if ($i>2)
						break;
				}
				$summary .= sprintf("<tr><td>%s %s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
					$objGroup->User->FirstName, $objGroup->User->LastName, $objGroup->L,$objGroup->E,$objGroup->M,$objGroup->O,$objGroup->N,$type);
			}	
		}
		$this->title->Text = substr($this->title->Text,0,strlen($this->title->Text)-2);
		$strArgs = implode('/',$assessmentArray);
		
		$this->lblDebug = new QLabel($this);
		$this->lblDebug->HtmlEntities = false;
		
		// Add commentary to assist managers in determining what to do with the different graphs and information generated.
		$strResultsSummary = '<p>The table provides a summary of results for each person in the group. </p>'.
							 '<p>You can export this data to an excel spreadsheet if you wish to manipulate in a way that may not be catered for in the charts provided below.</p>'.
							'<p>If you require the LEMON Results for each group member, simply click on the "View Individual Results" link below.</p>'.
							'<a target="_blank" href="'.__SUBDIRECTORY__.'/assessments/lemon/groupIndividualImg.php/'.$strArgs.'"/>View Individual Results</a>';
		$strAggregateBar = '<p>The Group Aggregate Bar chart provides a normalized breakdown of the LEMON assessments as a group.</p>'.
							'The sum of all the LEMON values should equal 100, and the chart shows the ratio of each LEMON type relative to each other.</p>'.
							'<p>It may be interesting to compare the group aggregate with the global aggregates to see how they compare, so the global aggregate is also provided.</p>'.
							'<p>Generally, aggregating the data tends to even things out somewhat and there shouldn\'t be drastic fluctuations between each LEMON type.</p>';
		$strAggregateRadar = '<p>The Group Aggregate Radar chart shows each individuals assessment results relative to each other.</p>'.
							 '<p>You can easily identify from this graph the individuals who are most different in certain LEMON types. From this it is possible to identify potential '.
							 'difficulties in communication between specific individuals, in certain areas or situations.</p>'.
							 '<p>For example, if Bill scored as a high Manager, and Diana was unusually low, you\'d be able to deduce that potential conflict might arise between the two '.
							 'if they\'re on the same team and need to develop a project plan together.</p>' ;
		$strFirstSecond = '<p>The First and Second Slice chart shows the primary and secondary makeup of the group.</p>'.
						  '<p>You can use this chart to identify where there might be potential deficiencies in particular LEMON slices.</p>'.
						  '<p>You can also suggest where some individuals might shore up the teams deficiencies by "turning up" their secondary slice.</p>'.
						 '<p>"On a good day you display the strengths of your primary slice. On a bad day you exhibit the weaknesses of your secondary slice.</p>'.
						  '<p>This chart might also be used to hypothesize how the team might perform on a good day, and how they might behave on a bad day....</p>';
		$strGroupAveragePie = '<p>The Group Average Pie Chart simply gives you another way of viewing the same information that was provided with the Aggregate Bar Chart</p>';
		$strNormalized = '<p>The Group Normalized Chart shows the LEMON mix of each individual side by side.</p>'.
						  '<p>The reason for normalizing is to cater for the fact that certain LEMON types have a more optimistic view of themselves and so might '.
						  'score themselves higher than a compatriot who has a more pragmatic outlook. Normalizing serves to equalize this effect.<p>';
		$strFirstPie = '<p>Showing the Primary Slices of each team member provides a much more pronounced effect than the averages.</p>'.
						'<p>Comparing group results with the global Primary Slices is much more interesting since it\'s easier to identify the differences.'.
						'<p>The Global Primary Slices of male and female populations is also provided.</p><p>It\'s interesting to note the typically larger proportion of '.
						'Networkers and Organizers in the female population, and to recognize the fact that these are also the two most neglected leadership types.</p>';
		$strTenureRadar = '<p>Group Radar by Tenure breaks the group information up based on length of employment.</p>'.
						  '<p>If there are pronounced differences it may be interesting to ask if there were situations or hiring policies in place that might have '.
						  'caused such abherrations.</p>';
		$strRadarTitle = '<p>Group Radar by Title breaks the group information up based on Position in the company</p>'.
						 '<p>Any large difference here might speak to the need for clear communication between the ranks, as the potential for miscommunication is greater.</p>'.
						 '<p>Another question to ask might be if the job roles themselves are a factor in skewing the LEMON slice a certain way.</p>';
		$strGroupByLemonType = '<p>The group results were normalized, and then the top ten individuals who scored the highest in each LEMON slice were identified.</p>'.
							   '<p>These charts taken together as a whole can help identify where the groups strengths lie when particular LEMON characteristics or strengths are required in specific circumstances.</p>';
		
		$accordion = array('LEMON Results Summary','Group Aggregate Bar Chart', 'Group Aggregate Radar', 'Group First And Second Slices','Group Average Pie Chart','Group Normalized Chart',
						   'Group First Slice Pie Chart','Group Radar By Tenure', 'Group Radar By Title','Group By LEMON Type');
		$table = '<table class="lemonSummary">' .
					'<tr>'.
					'<th> Name </th><th> Luminary </th><th> Entrepreneur </th><th> Manager </th><th> Organizer </th><th> Networker </th><th> Primary Secondary Slices</th>'.
					'</tr>'.$summary.
					'</table>'.
					'<a target="_blank" href="'.__SUBDIRECTORY__.'/assessments/lemon/exportToExcel.php/'.$strArgs.'"/>Export to Excel</a>';
		$content = array($table. $strResultsSummary,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupBarImg.php/'.$strArgs.'\' /> <br><br>'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalAverageImg.php\' width="50%" height="50%" />'.$strAggregateBar,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupRadarImg.php/'.$strArgs.'\' />'.$strAggregateRadar,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupFirstSecondImg.php/'.$strArgs.'\' />'.$strFirstSecond,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupPieImg.php/'.$strArgs.'\' />'.$strGroupAveragePie,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupNormalizedImg.php/'.$strArgs.'\' />'.$strNormalized,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupFirstSlicePieImg.php/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalFirstImg.php/global \'>'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalFirstImg.php/gender/0 \'>'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalFirstImg.php/gender/1 \'>'.$strFirstPie,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupRadarByTenureImg.php/'.$strArgs.'\' />'.$strTenureRadar,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupRadarByTitleImg.php/'.$strArgs.'\' />'.$strRadarTitle,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/0/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/1/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/2/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/3/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/4/'.$strArgs.'\' />'.$strGroupByLemonType);
		
		$this->accordionCharts = new QAccordion($this,$accordion, $content);	
			
		$this->dtgUsers = new UserDataGrid($this);
        $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
        $this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirAssessments."/lemon/viewAssessment.php/".$_ITEM->Id ?>','<?= $_FORM->RenderName($_ITEM)?>','Name');
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_FORM->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));
		$this->dtgUsers->AddColumn(new QDataGridColumn('Title', '<?= $_FORM->RenderTitle($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
		$this->dtgUsers->AddColumn(new QDataGridColumn('Tenure', '<?= $_FORM->RenderTenure($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
		
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
		foreach($this->groupArray as $objGroupAssessmentId) {
			$objGroupAssessment = GroupAssessmentList::Load($objGroupAssessmentId);
			$groupArray = LemonAssessment::LoadArrayByGroupId($objGroupAssessment->Id);	
			foreach($groupArray as $objGroup) {
				$userArray[] = User::Load($objGroup->UserId);
			}	
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
	public function RenderTitle(User $objUser) {
		if($objUser->Title) {
			return $objUser->Title->Name;
		} else {
			return 'Not Specified';
		}
	}
	public function RenderTenure(User $objUser) {
		if($objUser->Tenure) {
			return $objUser->Tenure->Range;
		} else {
			return 'Not Specified';
		}
	}
	public function chkSelected_Render(User $objUser, $intRow) {
     	$strControlId = 'chkSelected' . $objUser->Id;
		$lemonArray = $objUser->GetLemonAssessmentArray();
        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $lemonArray[0]->Id;
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
		$summary ='';
		$strArgs = implode('/',$this->selectedUserArray);
		foreach($this->selectedUserArray as $intAssessmentId) {
			$objAssessment = LemonAssessment::Load($intAssessmentId);
			$lemonValues = array('L'=>$objAssessment->L, 'E'=>$objAssessment->E,'M'=>$objAssessment->M,'O'=>$objAssessment->O,'N'=>$objAssessment->N);
			arsort($lemonValues);
			$i=1;
			$type = '';
			foreach($lemonValues as $key=>$value) {
				$type .= $key;
				$i++;
				if ($i>2)
					break;
			}
			$summary .= sprintf("<tr><td>%s %s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
				$objAssessment->User->FirstName, $objAssessment->User->LastName, $objAssessment->L,$objAssessment->E,$objAssessment->M,$objAssessment->O,$objAssessment->N,$type);
		}
		$table = '<table class="lemonSummary">' .
					'<tr>'.
					'<th> Name </th><th> Luminary </th><th> Entrepreneur </th><th> Manager </th><th> Organizer </th><th> Networker </th><th> Primary Secondary Slices</th>'.
					'</tr>'.$summary.
					'</table>'.
					'<a target="_blank" href="'.__SUBDIRECTORY__.'/assessments/lemon/exportToExcel.php/'.$strArgs.'"/>Export to Excel</a>';
		
		// Add commentary to assist managers in determining what to do with the different graphs and information generated.
		$strResultsSummary = '<p>The table provides a summary of results for each person in the group. </p>'.
							 '<p>You can export this data to an excel spreadsheet if you wish to manipulate in a way that may not be catered for in the charts provided below.</p>'.
							 '<p>If you require the LEMON Results for each group member, simply click on the "View Individual Results" link below.</p>'.
							 '<a target="_blank" href="'.__SUBDIRECTORY__.'/assessments/lemon/groupIndividualImg.php/'.$strArgs.'"/>View Individual Results</a>';
		$strAggregateBar = '<p>The Group Aggregate Bar chart provides a normalized breakdown of the LEMON assessments as a group.</p>'.
							'The sum of all the LEMON values should equal 100, and the chart shows the ratio of each LEMON type relative to each other.</p>'.
							'<p>It may be interesting to compare the group aggregate with the global aggregates to see how they compare, so the global aggregate is also provided.</p>'.
							'<p>Generally, aggregating the data tends to even things out somewhat and there shouldn\'t be drastic fluctuations between each LEMON type.</p>';
		$strAggregateRadar = '<p>The Group Aggregate Radar chart shows each individuals assessment results relative to each other.</p>'.
							 '<p>You can easily identify from this graph the individuals who are most different in certain LEMON types. From this it is possible to identify potential '.
							 'difficulties in communication between specific individuals, in certain areas or situations.</p>'.
							 '<p>For example, if Bill scored as a high Manager, and Diana was unusually low, you\'d be able to deduce that potential conflict might arise between the two '.
							 'if they\'re on the same team and need to develop a project plan together.</p>' ;
		$strFirstSecond = '<p>The First and Second Slice chart shows the primary and secondary makeup of the group.</p>'.
						  '<p>You can use this chart to identify where there might be potential deficiencies in particular LEMON slices.</p>'.
						  '<p>You can also suggest where some individuals might shore up the teams deficiencies by "turning up" their secondary slice.</p>'.
						 '<p>"On a good day you display the strengths of your primary slice. On a bad day you exhibit the weaknesses of your secondary slice.</p>'.
						  '<p>This chart might also be used to hypothesize how the team might perform on a good day, and how they might behave on a bad day....</p>';
		$strGroupAveragePie = '<p>The Group Average Pie Chart simply gives you another way of viewing the same information that was provided with the Aggregate Bar Chart</p>';
		$strNormalized = '<p>The Group Normalized Chart shows the LEMON mix of each individual side by side.</p>'.
						  '<p>The reason for normalizing is to cater for the fact that certain LEMON types have a more optimistic view of themselves and so might '.
						  'score themselves higher than a compatriot who has a more pragmatic outlook. Normalizing serves to equalize this effect.<p>';
		$strFirstPie = '<p>Showing the Primary Slices of each team member provides a much more pronounced effect than the averages.</p>'.
						'<p>Comparing group results with the global Primary Slices is much more interesting since it\'s easier to identify the differences.'.
						'<p>The Global Primary Slices of male and female populations is also provided.</p><p>It\'s interesting to note the typically larger proportion of '.
						'Networkers and Organizers in the female population, and to recognize the fact that these are also the two most neglected leadership types.</p>';
		$strTenureRadar = '<p>Group Radar by Tenure breaks the group information up based on length of employment.</p>'.
						  '<p>If there are pronounced differences it may be interesting to ask if there were situations or hiring policies in place that might have '.
						  'caused such abherrations.</p>';
		$strRadarTitle = '<p>Group Radar by Title breaks the group information up based on Position in the company</p>'.
						 '<p>Any large difference here might speak to the need for clear communication between the ranks, as the potential for miscommunication is greater.</p>'.
						 '<p>Another question to ask might be if the job roles themselves are a factor in skewing the LEMON slice a certain way.</p>';
		$strGroupByLemonType = '<p>The group results were normalized, and then the top ten individuals who scored the highest in each LEMON slice were identified.</p>'.
							   '<p>These charts taken together as a whole can help identify where the groups strengths lie when particular LEMON characteristics or strengths are required in specific circumstances.</p>';
		
		$content = array($table. $strResultsSummary,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupBarImg.php/'.$strArgs.'\' /> <br><br>'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalAverageImg.php\' width="50%" height="50%" />'.$strAggregateBar,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupRadarImg.php/'.$strArgs.'\' />'.$strAggregateRadar,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupFirstSecondImg.php/'.$strArgs.'\' />'.$strFirstSecond,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupPieImg.php/'.$strArgs.'\' />'.$strGroupAveragePie,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupNormalizedImg.php/'.$strArgs.'\' />'.$strNormalized,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupFirstSlicePieImg.php/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalFirstImg.php/global \'>'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalFirstImg.php/gender/0 \'>'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/globalFirstImg.php/gender/1 \'>'.$strFirstPie,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupRadarByTenureImg.php/'.$strArgs.'\' />'.$strTenureRadar,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupRadarByTitleImg.php/'.$strArgs.'\' />'.$strRadarTitle,
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/0/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/1/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/2/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/3/'.$strArgs.'\' />'.
						  '<img src=\''.__SUBDIRECTORY__.'/assessments/lemon/groupByLemonType.php/4/'.$strArgs.'\' />'.$strGroupByLemonType);
		
		$this->accordionCharts->Content = $content;
		$this->accordionCharts->Refresh();
	}
}

GroupAggregationResultForm::Run('GroupAggregationResultForm');
?>