<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class GlobalForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardGlobal;
	protected $objScorecard;
	protected $totalScorecardCount;
	protected $countryNotSpecified;
	protected $countryArray;
	protected $industryArray;
	protected $countryKPIArray;
	protected $industryKPIArray;
	protected $averageKPI;
	protected $dtgByCountry;
	protected $dtgByIndustry;
	protected $dtgKPIByCountry;
	protected $dtgKPIByIndustry;
	protected $lstSphereSelect;
	protected $btnSelectSphere;
	protected $btnCancelQuery;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}
	
	protected function Form_Create() {
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$this->countryArray = array();
		$this->industryArray = array();
		$this->countryKPIArray = array();
		$this->industryKPIArray  = array();
		$this->totalScorecardCount = Scorecard::CountAll();
		$this->countryNotSpecified = 0;
		$countryList = array();
		$industryList = array();
		$objScorecardCursor = Scorecard::QueryCursor(QQ::All());
 		while ($objScorecard = Scorecard::InstantiateCursor($objScorecardCursor)) {
 			if($objScorecard->Company->Address->Country){
	 			if(array_key_exists($objScorecard->Company->Address->Country, $this->countryArray))
	 				$this->countryArray[$objScorecard->Company->Address->Country] +=1;
	 			else {
	 				$this->countryArray[$objScorecard->Company->Address->Country] = 1;
	 				$countryList[] = $objScorecard->Company->Address->Country;
	 			}
	 			if($objScorecard->CountKpises() >0){
	 				$intKPITotal = 0;
 					$intKPICount = 0;
 					$kpiArray = $objScorecard->GetKpisArray();
		 			foreach($kpiArray as $objKPI){
		 				$intKPITotal += $objKPI->Rating;
		 				$intKPICount++;
		 			}
		 			if($intKPICount != 0) {
		 				if(array_key_exists($objScorecard->Company->Address->Country, $this->countryKPIArray))
		 					$this->countryKPIArray[$objScorecard->Company->Address->Country] += $intKPITotal/$intKPICount;
		 				else 
		 					$this->countryKPIArray[$objScorecard->Company->Address->Country] = $intKPITotal/$intKPICount;
		 			}
	 			}
 			}else {
 				$this->countryNotSpecified++;
 			}
 			foreach(Industry::LoadAll() as $objIndustry) {
 				if($objScorecard->Company->IsIndustryAssociated($objIndustry)) {
 					if(array_key_exists($objIndustry->Value, $this->industryArray))
		 				$this->industryArray[$objIndustry->Value] +=1;
		 			else {
		 				$this->industryArray[$objIndustry->Value] = 1;
		 				$industryList[] = $objIndustry->Value;
		 			}
	 				if($objScorecard->CountKpises() >0){
		 				$intKPITotal = 0;
	 					$intKPICount = 0;
	 					$kpiArray = $objScorecard->GetKpisArray();
			 			foreach($kpiArray as $objKPI){
			 				$intKPITotal += $objKPI->Rating;
			 				$intKPICount++;
			 			}
			 			if($intKPICount != 0){
			 				if(array_key_exists($objIndustry->Value, $this->industryKPIArray))
			 					$this->industryKPIArray[$objIndustry->Value] += $intKPITotal/$intKPICount;
			 				else 
			 					$this->industryKPIArray[$objIndustry->Value] = $intKPITotal/$intKPICount;
			 			}
		 			}
 				}
 			}
 			$kpiArray = $objScorecard->GetKpisArray();
 			$intKPITotal = 0;
 			$intKPICount = 0;
 			foreach($kpiArray as $objKPI){
 				$intKPITotal += $objKPI->Rating;
 				$intKPICount++;
 			}
 			if($intKPICount != 0)
 				$this->averageKPI += $intKPITotal/$intKPICount;
 		}
 		// after looping, calculate actual averages.
 		$this->averageKPI = round($this->averageKPI/$this->totalScorecardCount, 2);
 		foreach($this->industryKPIArray as $key => $value) {
 			$this->industryKPIArray[$key] = round($value/$this->industryArray[$key], 2);
 		}
		foreach($this->countryKPIArray as $key => $value) {
 			$this->countryKPIArray[$key] = round($value/$this->countryArray[$key],2);
 		}
 		
 		// Now generate tables
 		$this->dtgByCountry = new QDataGrid($this);
 		$this->dtgByCountry->AddColumn(new QDataGridColumn('Country', '<?= $_ITEM->mykey ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgByCountry->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->myvalue ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgByCountry->SetDataBinder('dtgByCountry_Bind');	
        $this->dtgByCountry->CellPadding = 4;
		$this->dtgByCountry->NoDataHtml = '';
		$this->dtgByCountry->UseAjax = true;
		$this->dtgByCountry->CssClass = 'table table-bordered';
		
		$this->dtgByIndustry = new QDataGrid($this);
 		$this->dtgByIndustry->AddColumn(new QDataGridColumn('Industry', '<?= $_ITEM->mykey ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgByIndustry->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->myvalue ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgByIndustry->SetDataBinder('dtgByIndustry_Bind');	
        $this->dtgByIndustry->CellPadding = 4;
		$this->dtgByIndustry->NoDataHtml = '';
		$this->dtgByIndustry->UseAjax = true;
		$this->dtgByIndustry->CssClass = 'table table-bordered';
		
		$this->dtgKPIByCountry = new QDataGrid($this);
 		$this->dtgKPIByCountry->AddColumn(new QDataGridColumn('Country', '<?= $_ITEM->mykey ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgKPIByCountry->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->myvalue ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgKPIByCountry->SetDataBinder('dtgKPIByCountry_Bind');	
        $this->dtgKPIByCountry->CellPadding = 4;
		$this->dtgKPIByCountry->NoDataHtml = '';
		$this->dtgKPIByCountry->UseAjax = true;
		$this->dtgKPIByCountry->CssClass = 'table table-bordered';
		
		$this->dtgKPIByIndustry = new QDataGrid($this);
 		$this->dtgKPIByIndustry->AddColumn(new QDataGridColumn('Industry', '<?= $_ITEM->mykey ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgKPIByIndustry->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->myvalue ?>', 'HtmlEntities=false', 'Width=100px' ));
        $this->dtgKPIByIndustry->SetDataBinder('dtgKPIByIndustry_Bind');	
        $this->dtgKPIByIndustry->CellPadding = 4;
		$this->dtgKPIByIndustry->NoDataHtml = '';
		$this->dtgKPIByIndustry->UseAjax = true;
		$this->dtgKPIByIndustry->CssClass = 'table table-bordered';
		
		$this->lstSphereSelect = new QListBox($this);
		$this->lstSphereSelect->Name = "View Spheres of Society: ";
		$this->lstSphereSelect->Width = 200;
		$this->lstSphereSelect->CssClass = 'form-control';
		$this->lstSphereSelect->AddItem("Globally","Globally");
		foreach($countryList as $strCountry) {
			$this->lstSphereSelect->AddItem($strCountry,$strCountry);
		}
			
		$this->btnSelectSphere = new QButton($this);
		$this->btnSelectSphere->Name = "Submit";
		$this->btnSelectSphere->Text = "Submit";
		$this->btnSelectSphere->CssClass = "btn btn-default";
		$this->btnSelectSphere->AddAction(new QClickEvent(), new QAjaxAction('btnSphere_Click'));
		
		$this->btnCancelQuery = new QButton($this);
		$this->btnCancelQuery->Name = "Cancel Query";
		$this->btnCancelQuery->Text = "Cancel Query";
		$this->btnCancelQuery->CssClass = "btn btn-default";
		$this->btnCancelQuery->AddAction(new QClickEvent(), new QAjaxAction('btnCancelQuery_Click'));
	}

	protected function btnSphere_Click() {
		$this->initializeCharts($this->lstSphereSelect->SelectedName);
	}
	
	protected function btnCancelQuery_Click() {
		QApplication::ExecuteJavaScript('CancelQuery();');
	}
	protected function dtgByCountry_Bind() {
		$dtgCountryArray = array();
		foreach($this->countryArray as $key => $value) {
			$objItem = new valueArray();
			$objItem->mykey = $key;
			$objItem->myvalue = $value;
			$dtgCountryArray[] = $objItem;
		}
		$objItem = new valueArray();
		$objItem->mykey = "Country Not Specified";
		$objItem->myvalue = $this->countryNotSpecified;
		$dtgCountryArray[] = $objItem;
		$this->dtgByCountry->DataSource = $dtgCountryArray;
	}
	
	protected function dtgByIndustry_Bind() {
		$dtgIndustryArray = array();
		foreach($this->industryArray as $key => $value) {
			$objItem = new valueArray();
			$objItem->mykey = $key;
			$objItem->myvalue = $value;
			$dtgIndustryArray[] = $objItem;
		}
		$this->dtgByIndustry->DataSource = $dtgIndustryArray;
	}
	
	protected function dtgKPIByCountry_Bind() {
		$dtgKpiCountryArray = array();
		foreach($this->countryKPIArray as $key => $value) {
			$objItem = new valueArray();
			$objItem->mykey = $key;
			$objItem->myvalue = $value;
			$dtgKpiCountryArray[] = $objItem;
		}
		$this->dtgKPIByCountry->DataSource = $dtgKpiCountryArray;
	}
	
	protected function dtgKPIByIndustry_Bind() {
		$dtgKPIIndustryArray = array();
		foreach($this->industryKPIArray as $key => $value) {
			$objItem = new valueArray();
			$objItem->mykey = $key;
			$objItem->myvalue = $value;
			$dtgKPIIndustryArray[] = $objItem;
		}
		$this->dtgKPIByIndustry->DataSource = $dtgKPIIndustryArray;
	}
	
	/************************/
	protected function initializeCharts($type) {
		$associatedArray = array(); 
		$sphereCount = array(0,0,0,0,0,0,0,0,0,0);
		$sphereKpi = array(0,0,0,0,0,0,0,0,0,0);
		$KPIcolorArray = array('#2C7CBA','#7938C4','#E84833','#EFBB0E','#E0E80D','#71D127','#13A31D','#20C0D6','#989B9B','#E53487');
		$StrategycolorArray = array('#93C0E2','#AA84D6','#EF9083','#EDD589','#E8EAA4','#B5E590','#76E87D','#93E0EA','#CFD5D6','#ED90BB');
		$intAssociatedSphereCount = 0;
		$intAssociatedGiantCount = 0;
		$giantCount = array();
		$giantKpi = array();
		$objStrategyArray = null;
		if($type == "Globally")
			$objStrategyArray = Strategy::LoadAll();
		else {
			$objCondition = QQ::Equal(QQN::Strategy()->Scorecard->Company->Address->Country, $type);
			$objStrategyArray = Strategy::QueryArray($objCondition);
		}
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
			if($i>=10) $i=0; //rotate around if we exceed 10
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
}

GlobalForm::Run('GlobalForm');
class valueArray {
	public $mykey;
	public $myvalue;
}	
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