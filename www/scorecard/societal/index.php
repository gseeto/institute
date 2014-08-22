<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class SocietalForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardSocietal;
	protected $objScorecard;
	protected $dtgPArray;
	protected $dlgAssociateSphere;
	public    $dlgAssociateGiant;
	protected $imgSpheres;
	protected $imgSpheresInvolvement;
	protected $imgGiants;
	protected $imgGiantsInvolvement;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$this->dtgPArray = array();

		$this->initializeCharts();
		
		// Generate a summary of the P Strategys
		foreach(CategoryType::$NameArray as $key=>$value) {
			$dtgP = new StrategyDataGrid($this);
			$dtgP->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgP->AddColumn(new QDataGridColumn($value.' Strategy Summary', '<?= $_ITEM->Strategy ?>', 'HtmlEntities=false', 'Width=540px' ));
			$dtgP->AddColumn(new QDataGridColumn('Average KPI', '<?= $_FORM->RenderKPI($_ITEM->Id) ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgP->AddColumn(new QDataGridColumn('Societal Ills Being Addressed', '<?= $_FORM->RenderGiants($_ITEM, $_CONTROL) ?>', 'HtmlEntities=false', 'Width=100px' ));
			$dtgP->AddColumn(new QDataGridColumn('Spheres Or Sectors', '<?= $_FORM->RenderSpheres($_ITEM, $_CONTROL) ?>', 'HtmlEntities=false', 'Width=100px' ));
			$dtgP->CellPadding = 5;
			$dtgP->GridLines = QGridLines::Both;

			$objConditions = QQ::All();
			$objClauses = array();					
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->CategoryTypeId, $key));
		
			$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
			$dtgP->DataSource = $strategyArray; 
			
			$dtgP->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$value.' Strategy Summary</b></p>' .'No Strategies.<br></div>';
			$dtgP->UseAjax = true;
			$objStyle = $dtgP->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 	        
	        $objStyle = $dtgP->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#0098c3'; 	      
			
			$this->dtgPArray[] = $dtgP;
		}
		
		// Define the AssociateSphere Dialog. passing in the Method Callback for whenever the dialog is Closed
        $this->dlgAssociateSphere = new DlgAssociateSphere('btnAssociateSphere_Close', $this);
        $this->dlgAssociateSphere->Visible = false;
        
        // Define the AssociateSphere Dialog. passing in the Method Callback for whenever the dialog is Closed
        $this->dlgAssociateGiant = new DlgAssociateGiant('btnAssociateGiant_Close', $this);
        $this->dlgAssociateGiant->Visible = false;
        $this->dlgAssociateGiant->Width = 500;		              
	}

	protected function initializeCharts() {
		$associatedArray = array(); 
		$sphereCount = array(0,0,0,0,0,0,0,0,0,0);
		$sphereKpi = array(0,0,0,0,0,0,0,0,0,0);
		$KPIcolorArray = array('#2C7CBA','#7938C4','#E84833','#EFBB0E','#E0E80D','#71D127','#13A31D','#20C0D6','#989B9B','#E53487');
		$StrategycolorArray = array('#93C0E2','#AA84D6','#EF9083','#EDD589','#E8EAA4','#B5E590','#76E87D','#93E0EA','#CFD5D6','#ED90BB');
		$intAssociatedSphereCount = 0;
		$intAssociatedGiantCount = 0;
		$giantCount = array();
		$giantKpi = array();
		
		$objStrategyArray = Strategy::LoadArrayByScorecardId($this->objScorecard->Id);
		// Get the associations and calculate
		foreach($objStrategyArray as $objStrategy) {
			$sphereArray = $objStrategy->GetSpheresAsSphereArray();
			foreach($sphereArray as $objSphere) {
				$sphereCount[$objSphere->Id-1]++;
				$sphereKpi[$objSphere->Id-1] += $objStrategy->GetAverageKpiRating();
			}
			if ($objStrategy->CountSpheresesAsSphere() != 0) {
				$intAssociatedSphereCount++;
			}
			$giantArray = $objStrategy->GetGiantsAsGiantArray();
			foreach($giantArray as $objGiant) {
				if (array_key_exists($objGiant->Giant, $giantCount)) {
					$giantCount[$objGiant->Giant]++;
					$giantKpi[$objGiant->Giant] += $objStrategy->GetAverageKpiRating();
				} else {
					$giantCount[$objGiant->Giant] = 1;
					$giantKpi[$objGiant->Giant] = $objStrategy->GetAverageKpiRating();
				}	
			}
			if ($objStrategy->CountGiantsesAsGiant() != 0) {
				$intAssociatedGiantCount++;
			}
		}
		
		// Get the labels
		$labels = array();
		foreach(Spheres::LoadAll() as $objSphere) {
			$labels[] = $objSphere->Sphere;
		}
		
		for($i=0; $i<10;$i++) {
			$objItem = new sphereArray();
			$objItem->sphere = $labels[$i];
			$objItem->StrategyCount = $sphereCount[$i];
			$objItem->KPIAverage = ($sphereCount[$i] != 0)? round(($sphereKpi[$i]/$sphereCount[$i]),2) : 0;
			$objItem->kpicolor = $KPIcolorArray[$i];
			$objItem->strategycolor = $StrategycolorArray[$i];
			$associatedArray[] = $objItem;
		}		
		QApplication::ExecuteJavaScript('DisplaySpheres('.json_encode($associatedArray).');');

		$involvementArray = array();
		$objAssociated = new sphereInvolvementArray();
		$objAssociated->key  = "Associated";
		$objAssociated->value = $intAssociatedSphereCount;
		$involvementArray[] = $objAssociated;
		
		$objUnassociated = new sphereInvolvementArray();
		$objUnassociated->key  = "Unassociated";
		$objUnassociated->value = count($objStrategyArray)-$intAssociatedSphereCount;
		$involvementArray[] = $objUnassociated;
		
		QApplication::ExecuteJavaScript('DisplaySphereInvolvement('.json_encode($involvementArray).');');
		
		$i = 0;
		$associatedArray = array();
		foreach($giantCount as $key=>$value) {
			$data1y[$i] = ($value != 0)? (($giantKpi[$key]/$value)/5) * $value : 0;
			$data2y[$i] = ($value != 0)? $value - $data1y[$i] : 0;
			$labels[$i] = $key;
			$i++;
			
			$objItem = new giantArray();
			$objItem->giant = $key;
			$objItem->StrategyCount = $value;
			$objItem->KPIAverage = ($value != 0)? round(($giantKpi[$key]/$value),2) : 0;
			$objItem->kpicolor = $KPIcolorArray[$i];
			$objItem->strategycolor = $StrategycolorArray[$i];
			$associatedArray[] = $objItem;
			$i++;
		}
		QApplication::ExecuteJavaScript('DisplayGiants('.json_encode($associatedArray).');');
		
		$involvementArray = array();
		$objAssociated = new sphereInvolvementArray();
		$objAssociated->key  = "Associated";
		$objAssociated->value = $intAssociatedGiantCount;
		$involvementArray[] = $objAssociated;
		
		$objUnassociated = new sphereInvolvementArray();
		$objUnassociated->key  = "Unassociated";
		$objUnassociated->value = count($objStrategyArray)-$intAssociatedGiantCount;
		$involvementArray[] = $objUnassociated;
		
		QApplication::ExecuteJavaScript('DisplayGiantInvolvement('.json_encode($involvementArray).');');
	}
	
	public function btnCategory_Clicked($strFormId, $strControlId, $strParameter) {
		if ($strParameter == 'Summary') {
			QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$this->objScorecard->Id);
		} else { 
			$intCategoryId = $strParameter;
			QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$intCategoryId );
		}
    }
    
    public function RenderKPI($intStrategyId) {
    	$kpiArray = Kpis::LoadArrayByStrategyId($intStrategyId);
    	$total = 0;
    	foreach($kpiArray as $objKPI) {
    		$total += $objKPI->Rating;
    	}
    	if(count($kpiArray) == 0) {
    		return 0;
    	} else {
    		return round($total/count($kpiArray),2);
    	}
    }
    
 	public function btnSubmit_Click() {
		// redirect to appropriate scorecard
		QApplication::Redirect(__SUBDIRECTORY__.'/scorecard/scorecard.php/'.$this->rbnScorecards->SelectedValue);
	}
	
 	public function RenderGiants(Strategy $objStrategy, StrategyDataGrid $dtgP) {
    	$strGiants = '';
 		if ($objStrategy->CountGiantsesAsGiant() == 0) {
    		$strGiants = '';
    	} else {
    		$objGiantArray = $objStrategy->GetGiantsAsGiantArray();
    		foreach($objGiantArray as $objGiant) {
    			$strGiants .= $objGiant->Giant .'<br>';
    		}
    	}
    	rtrim($strGiants,'<br>');
    	$lblAssociatedGiants = new QLabel($dtgP);
    	$lblAssociatedGiants->HtmlEntities = false;
    	$lblAssociatedGiants->Text = $strGiants;
    	$btnAssociateGiant = new QButton($dtgP);
    	$btnAssociateGiant->Text = 'Edit';
    	$btnAssociateGiant->CssClass = 'societalButton';
    	$btnAssociateGiant->ActionParameter = $objStrategy->Id.",".$strGiants;
    	$btnAssociateGiant->AddAction(new QClickEvent(), new QAjaxAction('btnAssociateGiant_Clicked'));
    	return $lblAssociatedGiants->Render(false).'<br>'.$btnAssociateGiant->Render(false);
    }
    
	public function btnAssociateGiant_Clicked($strFormId, $strControlId, $strParameter) {
    	// Setup the necessary Values
    	$parameterArray = explode(',',$strParameter);
    	$objStrategy = Strategy::Load($parameterArray[0]);
    	$strDebug = trim($objStrategy->Strategy);
    	$this->lblDebug->Text = $strDebug;
        $this->dlgAssociateGiant->Strategy = trim(Strategy::Load($strParameter)->Strategy);
        $btnAssociatedGiant = $this->GetControl($strControlId);
        $this->dlgAssociateGiant->AssociatedGiants = $parameterArray[1];
        $this->dlgAssociateGiant->StrategyId = $objStrategy->Id;
        foreach(CategoryType::$NameArray as $key=>$value) {
        	if ($objStrategy->CategoryTypeId == $key) 
        		$this->dlgAssociateGiant->CategoryId = $key;
        }

        // And Show dialog box
        $this->dlgAssociateGiant->ShowDialogBox();
    }
    
 	// Setup the "Callback" function for when the dialog closes
    // This needs to be a public method
    public function btnAssociateGiant_Close() {
    	$categoryId = $this->dlgAssociateGiant->CategoryId;
        $objConditions = QQ::All();
		$objClauses = array();					
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->CategoryTypeId, $categoryId));
	
		$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
		$this->dtgPArray[$categoryId-1]->DataSource = $strategyArray;
		$this->dtgPArray[$categoryId-1]->Refresh();

		$this->initializeCharts();
    }
    
 	public function RenderSpheres($objStrategy, StrategyDataGrid $dtgP) {
    	$strSpheres = '';
 		if ($objStrategy->CountSpheresesAsSphere() == 0) {
    		$strSpheres = '';
    	} else {
    		$objSphereArray = $objStrategy->GetSpheresAsSphereArray();
    		foreach($objSphereArray as $objSpheres) {
    			$strSpheres .= $objSpheres->Sphere .'<br>';
    		}
    	}
    	rtrim($strSpheres,"<br>");
    	$lblSpheres = new QLabel($dtgP);
    	$lblSpheres->HtmlEntities = false;
    	$lblSpheres->Text = $strSpheres;
    	$btnAssociateSphere = new QButton($dtgP);
    	$btnAssociateSphere->Text = 'Edit';
    	$btnAssociateSphere->CssClass = 'societalButton';
    	$btnAssociateSphere->ActionParameter = $objStrategy->Id.",".$strSpheres;
    	$btnAssociateSphere->AddAction(new QClickEvent(), new QAjaxAction('btnAssociateSphere_Clicked'));
    	return $lblSpheres->Render(false).'<br>' . $btnAssociateSphere->Render(false);
    }
    
	public function btnAssociateSphere_Clicked($strFormId, $strControlId, $strParameter) {
    	// Setup the necessary Values
    	$parameterArray = explode(',',$strParameter);
    	$objStrategy = Strategy::Load($parameterArray[0]);
        $this->dlgAssociateSphere->Strategy = trim(Strategy::Load($strParameter)->Strategy);
        $btnAssociatedSphere = $this->GetControl($strControlId);
        $this->dlgAssociateSphere->AssociatedSpheres = $parameterArray[1]; 
        $this->dlgAssociateSphere->StrategyId = $objStrategy->Id;
        foreach(CategoryType::$NameArray as $key=>$value) {
        	if ($objStrategy->CategoryTypeId == $key) 
        		$this->dlgAssociateSphere->CategoryId = $key;
        }

        // And Show dialog box
        $this->dlgAssociateSphere->ShowDialogBox();
    }
    
 	// Setup the "Callback" function for when the calculator closes
    // This needs to be a public method
    public function btnAssociateSphere_Close() {
    	$categoryId = $this->dlgAssociateSphere->CategoryId;
        $objConditions = QQ::All();
		$objClauses = array();					
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->CategoryTypeId, $categoryId));
	
		$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
		$this->dtgPArray[$categoryId-1]->DataSource = $strategyArray;
		$this->dtgPArray[$categoryId-1]->Refresh();
		
		$this->initializeCharts();
    }
        
}

SocietalForm::Run('SocietalForm');
class sphereArray {
			public $sphere;
			public $StrategyCount;
			public $KPIAverage;
			public $strategycolor;
			public $kpicolor;
		}	
class sphereInvolvementArray {
	public $key;
	public $value;
} 
class giantArray {
			public $giant;
			public $StrategyCount;
			public $KPIAverage;
			public $strategycolor;
			public $kpicolor;
		}	   
?>