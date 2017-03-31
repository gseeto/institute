<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class ViewTimeAssessmentForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Where Does The Time Go Assessment';
	protected $objTimeAssessment;
	protected $btnReturn;
	protected $lblIntroduction;
	protected $dtgAssessmentResults;
	protected $txtCRecommendation;
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		QApplication::ExecuteJavaScript("document.getElementById('admin-ten').className = 'active';"); 
	}
	
	protected function Form_Create() {	
		$this->lblIntroduction = new QLabel($this);	
		$this->lblIntroduction->HtmlEntities = false;
		$this->txtCRecommendation = new QLabel($this);
	 	$this->txtCRecommendation->HtmlEntities = false;
	 		
		$intUserId = QApplication::PathInfo(0);
		if($intUserId) { //show the assessment specified
			$assessmentArray = TimeAssessment::LoadArrayByUserId($intUserId);
			$this->objTimeAssessment = $assessmentArray[0];					
		} else { // show the user's assessment				
			$userArray = User::LoadArrayByLoginId(QApplication::$LoginId);
			$intUserId = $userArray[0]->Id;
			
			$assessmentArray = TimeAssessment::LoadArrayByUserId($intUserId);
			$this->objTimeAssessment = $assessmentArray[0];
		}
		$objUser = User::Load($intUserId);
		$this->lblIntroduction->Text = '<h1>Where Does The Time Go Assessment for '.$objUser->FirstName. ' '.$objUser->LastName.'</h1>';
		$this->initializeChart();		
		$this->dtgAssessmentResults = new TimeResultsDataGrid($this);
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Activity', '<?= $_ITEM->Activity ?>', 'HtmlEntities=false', 'Width=410px' ));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Time (hrs)', '<?= $_ITEM->Time ?>', 'HtmlEntities=false', 'Width=50px' ));			
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Career', '<?= $_FORM->chkCareer_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Community', '<?= $_FORM->chkCommunity_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Creativity', '<?= $_FORM->chkCreativity_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Calling', '<?= $_FORM->chkCalling_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->AddColumn(new QDataGridColumn('Margin', '<?= $_FORM->chkMargin_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgAssessmentResults->CellPadding = 5;

		$assessmentArray = TimeResults::LoadArrayByAssessmentId($this->objTimeAssessment->Id);					
		$this->dtgAssessmentResults->DataSource = $assessmentArray; 
		
		$this->dtgAssessmentResults->UseAjax = true;
		$this->dtgAssessmentResults->CssClass = 'table table-striped table-hover';
		
        $objStyle = $this->dtgAssessmentResults->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgAssessmentResults->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7';  		
	 	
        $this->btnReturn = new QButton($this);
        $this->btnReturn->Text = 'Return';
	 	$this->btnReturn->CssClass = 'btn btn-default';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
		if(QApplication::PathInfo(0)) {
	 		$this->btnReturn->Visible = false;
	 	}
	}
	
	protected function btnReturn_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/time/index.php');
	}
	

	public function chkCalling_Render(TimeResults $objResult) {
        $strControlId = 'calling' . $objResult->Id;
        $chkCalling = $this->GetControl($strControlId);           
        if (!$chkCalling) {
            $chkCalling = new QCheckBox($this->dtgAssessmentResults, $strControlId);
            $chkCalling->Width = 60;
            $chkCalling->CssClass = 'checkbox';
            $chkCalling->Checked = $objResult->Calling;	                    
            $chkCalling->Enabled = false;
        }
        return $chkCalling->Render(false);
    }
    
	public function chkCareer_Render(TimeResults $objResult) {
        $strControlId = 'career' . $objResult->Id;
        $chkCareer = $this->GetControl($strControlId);           
        if (!$chkCareer) {
            $chkCareer = new QCheckBox($this->dtgAssessmentResults, $strControlId);
            $chkCareer->Width = 60;
            $chkCareer->CssClass = 'checkbox';
            $chkCareer->Checked = $objResult->Career;	                    
            $chkCareer->Enabled = false;
        }
        return $chkCareer->Render(false);
    }

    public function chkCommunity_Render(TimeResults $objResult) {
        $strControlId = 'community' . $objResult->Id;
        $chkCommunity = $this->GetControl($strControlId);           
        if (!$chkCommunity) {
            $chkCommunity = new QCheckBox($this->dtgAssessmentResults, $strControlId);
            $chkCommunity->Width = 60;
            $chkCommunity->CssClass = 'checkbox';
            $chkCommunity->Checked = $objResult->Community;	                    
            $chkCommunity->Enabled = false;
        }
        return $chkCommunity->Render(false);
    }
    
	public function chkCreativity_Render(TimeResults $objResult) {
        $strControlId = 'creativity' . $objResult->Id;
        $chkCreativity = $this->GetControl($strControlId);           
        if (!$chkCreativity) {
            $chkCreativity = new QCheckBox($this->dtgAssessmentResults, $strControlId);
            $chkCreativity->Width = 60;
            $chkCreativity->CssClass = 'checkbox';
            $chkCreativity->Checked = $objResult->Community;	                    
            $chkCreativity->Enabled = false;
        }
        return $chkCreativity->Render(false);
    }
    
	public function chkMargin_Render(TimeResults $objResult) {
        $strControlId = 'margin' . $objResult->Id;
        $chkMargin = $this->GetControl($strControlId);           
        if (!$chkMargin) {
            $chkMargin = new QCheckBox($this->dtgAssessmentResults, $strControlId);
            $chkMargin->Width = 60;
            $chkMargin->CssClass = 'checkbox';
            $chkMargin->Checked = $objResult->Margin;	                   
            $chkMargin->Enabled = false;
        }
        return $chkMargin->Render(false);
    }
     
	protected function initializeChart() {
		$associatedArray = array(); 
		$colorArray = array('#1E375C','#605032','#B69D70','#2F578F','#888888','#000000','#1E375C');
		$categoryArray = array("Career"=>0, "Community"=>0,"Creativity"=>0,"Calling"=>0, "Margin"=>0);
		$intersectArray = array("Career-Calling"=>0, "Career-Community"=>0,"Career-Creativity"=>0,"Calling-Community"=>0, "Calling-Creativity"=>0,"Community-Creativity"=>0);
				
		$resultArray = TimeResults::LoadArrayByAssessmentId($this->objTimeAssessment->Id); 
		$total = 0;
		foreach($resultArray as $objResult) {
			$total += $objResult->Time;
			if($objResult->Career)
				$categoryArray["Career"] += $objResult->Time;
			if($objResult->Community)
				$categoryArray["Community"] += $objResult->Time;
			if($objResult->Creativity)
				$categoryArray["Creativity"] += $objResult->Time;
			if($objResult->Calling)
				$categoryArray["Calling"] += $objResult->Time;
			if($objResult->Margin)
				$categoryArray["Margin"] += $objResult->Time;
				
			if(($objResult->Career) && ($objResult->Calling))
				$intersectArray["Career-Calling"] += $objResult->Time;
			if(($objResult->Career) && ($objResult->Community))
				$intersectArray["Career-Community"] += $objResult->Time;
			if(($objResult->Career) && ($objResult->Creativity))
				$intersectArray["Career-Creativity"] += $objResult->Time;
			if(($objResult->Calling) && ($objResult->Community))
				$intersectArray["Calling-Community"] += $objResult->Time;
			if(($objResult->Calling) && ($objResult->Creativity))
				$intersectArray["Calling-Creativity"] += $objResult->Time;				
			if(($objResult->Community) && ($objResult->Creativity))
				$intersectArray["Community-Creativity"] += $objResult->Time;
		}

		$i=0;
		$minimum = 0;
		foreach($categoryArray as $key => $value) {
			$objItem = new TimeArray();
			$objItem->category = $key;
			$objItem->result = $value;	
			$objItem->color = $colorArray[$i];
			$associatedArray[] = $objItem;
			$i++;
			if ($minimum == 0) {
				$minimum = $value;
				$lowestKey = $key;
			}
			if(($value< $minimum)&&($key!="Margin")) {
				$minimum = $value;
				$lowestKey = $key;
			}
		}
		
		switch($lowestKey) {
			case "Career":
				$this->txtCRecommendation->Text = "<p>Your CAREER aggregate score is the lowest of the 4-C's. Consider the following:</p>
			    <ul>
			        <li>How well do you understand the new career trends and radical shifts taking place on the job front?</li>
			        <li>How effectively are you responding to the challenge of an information-based economy?</li>
			        <li>How deeply have you grasped the implications of the Internet?</li>
			        <li>How well have you adapted to the increasing competition that has accompanied globalization where people from around the world can compete for your job for less money? </li>
			        <li>How willing are you to manage your own education and career instead of remaining in your current situation, which represents a trade off of low risk in exchange for low Impact?</li>
			    </ul>";
				break;
			case "Community":
				$this->txtCRecommendation->Text = "<p>Your COMMUNITY aggregate is the lowest of the 4-C's. Consider the following:</p>
			    <ul>
			        <li>How have you responded to the difference between stated policies and unspoken values by an organization that has purportedly introduced family friendly policies?</li>
			        <li>How have you worked through the implications of organizations who need to attempt to create a home like atmosphere for work to make work seem more like a community?</li>
			        <li>Does your organization have a holistic approach to family and work?</li>
			        <li>Are you suffering isolation because Community takes second place to a love affair with activity, performance and achieving?</li>
			        <li>Have you confused the pursuit of happiness with independence and independence with leaving your social and family structure?</li>
			        <li>Have you found your Call in serving others?</li>
			        <li>Has speed and superficiality replaced longevity and depth in your life?</li>
			        <li>Do you understand and appreciate your roots?</li>
			    </ul>";
				break;
			case "Creativity":
				$this->txtCRecommendation->Text = "<p>Your CREATIVITY scores are the lowest of the 4-C's. Consider the following: </p>
			    <ul>
			        <li>Do you take enough time to rest?</li>
			        <li>Are things and activities that build you up incorporated into the fabric of your work life and family life?</li>
			        <li>Does your job embrace your creativity?</li>
			        <li>How much attention do you pay to the creative side of your life?</li>
			        <li>When last did you develop a hobby or skill like painting for the sheer pleasure of it rather than for financial rewards or other external gains?</li>
			        <li>How much do you play without any thought of winning?</li>
			    </ul>";
				break;
			case "Calling":
				$this->txtCRecommendation->Text = "<p>Your CALL scores are the lowest of the 4-C's. Consider the following: </p>
			    <ul>
			        <li>Has your career success outstripped your character development?</li>
			        <li>Have you sacrificed meaning for the visible trappings of success and is that a sustainable situation for you?</li>
			        <li>Has your work become your primary point of significance?</li>
			        <li>Are you making choices that harmonize with your sense of purpose?</li>
			        <li>Do you have a split view of \"ministry\" and work?; between sacred activity and secular pursuits?</li>
			        <li>Are you working for a higher purpose? How much Call is there in your Career?</li>
			        <li>Is your identity to wrapped up with your work? What other important sources of identity are there?</li>
			        <li>How much of what you do is consistent with how you are wired?</li>
			        <li>Have you chosen what you do based on who you are?</li>
			    </ul>";
				break;
		}
		
		$i=0;
		$intersectCArray = array();
		foreach($intersectArray as $key => $value) {
			$objItem = new TimeArray();
			$objItem->category = $key;
			$objItem->result = $value;	
			$objItem->color = $colorArray[$i];
			$intersectCArray[] = $objItem;
			$i++;
		}
		
		$doubleDataArray = array();
		$i = 0;
		$total = array_sum($intersectArray);
		$total = array_sum($categoryArray)- $categoryArray["Margin"];
		
		foreach($categoryArray as $key => $value) {
			if($key != "Margin") {
				if($key=="Career") {
					$careerIntegrate = round(($intersectArray["Career-Calling"] + $intersectArray["Career-Community"] + $intersectArray["Career-Creativity"])/$total *100, 2);
					// Generate Pie information
					$involvementArray = array();
					$objAssociated = new pieArray();
					$objAssociated->key  = "Integration";
					$objAssociated->value = $careerIntegrate;
					$involvementArray[] = $objAssociated;
					
					$objUnassociated = new pieArray();
					$objUnassociated->key  = "Disintegration";
					$objUnassociated->value = 100 - $careerIntegrate;
					$involvementArray[] = $objUnassociated;
					
					$size = ($categoryArray["Career"]/168) * 140;
					QApplication::ExecuteJavaScript('DisplayPieChart('.json_encode($involvementArray).',"Career Integration","Careerchartdiv",'.$size.');');
				}
				if($key=="Calling") {
					$callingIntegrate = round(($intersectArray["Career-Calling"] + $intersectArray["Calling-Community"] + $intersectArray["Calling-Creativity"])/$total *100, 2);
					// Generate Pie information
					$involvementArray = array();
					$objAssociated = new pieArray();
					$objAssociated->key  = "Integration";
					$objAssociated->value = $callingIntegrate;
					$involvementArray[] = $objAssociated;
					
					$objUnassociated = new pieArray();
					$objUnassociated->key  = "Disintegration";
					$objUnassociated->value = 100 - $callingIntegrate;
					$involvementArray[] = $objUnassociated;
					
					$size = ($categoryArray["Calling"]/168) * 140;
					QApplication::ExecuteJavaScript('DisplayPieChart('.json_encode($involvementArray).',"Calling Integration","Callingchartdiv",'.$size.');');
				}
				if($key=="Community") {
					$communityIntegrate = round(($intersectArray["Career-Community"] + $intersectArray["Calling-Community"] + $intersectArray["Community-Creativity"])/$total * 100, 2);
					// Generate Pie information
					$involvementArray = array();
					$objAssociated = new pieArray();
					$objAssociated->key  = "Integration";
					$objAssociated->value = $communityIntegrate;
					$involvementArray[] = $objAssociated;
					
					$objUnassociated = new pieArray();
					$objUnassociated->key  = "Disintegration";
					$objUnassociated->value = 100 - $communityIntegrate;
					$involvementArray[] = $objUnassociated;
					
					$size = ($categoryArray["Community"]/168) * 140;
					QApplication::ExecuteJavaScript('DisplayPieChart('.json_encode($involvementArray).',"Community Integration","Communitychartdiv",'.$size.');');
				}	
				if($key=="Creativity") {
					$creativityIntegrate = round(($intersectArray["Career-Creativity"] + $intersectArray["Calling-Creativity"] + $intersectArray["Community-Creativity"])/$total * 100,2);
					// Generate Pie information
					$involvementArray = array();
					$objAssociated = new pieArray();
					$objAssociated->key  = "Integration";
					$objAssociated->value = $creativityIntegrate;
					$involvementArray[] = $objAssociated;
					
					$objUnassociated = new pieArray();
					$objUnassociated->key  = "Disintegration";
					$objUnassociated->value = 100 - $creativityIntegrate;
					$involvementArray[] = $objUnassociated;
					
					$size = ($categoryArray["Creativity"]/168) * 140;
					QApplication::ExecuteJavaScript('DisplayPieChart('.json_encode($involvementArray).',"Creativity Integration","Creativitychartdiv",'.$size.');');
				}	

				$i++;
			}
		}
			
		QApplication::ExecuteJavaScript('DisplayChart('.json_encode($associatedArray).');');	
		QApplication::ExecuteJavaScript('DisplayIntersectChart('.json_encode($intersectCArray).');');	
	}
}

ViewTimeAssessmentForm::Run('ViewTimeAssessmentForm');
class TimeArray {
			public $category;
			public $result;
			public $color;
		}

class pieArray {
	public $key;
	public $value;
} 
class DoubleArray {
			public $category;
			public $time;
			public $integration;
			public $color;
		}
?>