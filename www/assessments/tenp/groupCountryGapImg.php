<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_radar.php');

// Create the basic radar graph
$graph = new RadarGraph(800,533);
//$graph->img->SetAntiAliasing();

// Set background color and shadow
$graph->SetColor("white");
$graph->SetShadow();

// Position the graph
$graph->SetCenter(0.4,0.55);

// Setup the axis formatting 	
$graph->axis->SetFont(FF_FONT1,FS_BOLD);
$graph->SetScale('lin',0,7);

// Setup the grid lines
$graph->grid->SetLineStyle("solid");
$graph->grid->SetColor("navy");
$graph->grid->Show();
$graph->HideTickMarks();
		
// Setup graph titles
$graph->title->Set("10-P Assessment - Gaps By Country");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$categoriesArray = array();
$legendArray = array();
$valueArray = array(); 

// Set Category Titles
foreach(CategoryType::$NameArray as $key=>$value) {
	$categoriesArray[] = $value;
}
$graph->SetTitles($categoriesArray);

// Calculate for each Ttile
foreach(CountryList::LoadAll() as $objCountry) {
	$legendArray[$objCountry->Id] = $objCountry->Name;
	$valueArray[$objCountry->Id] = array();
}
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach(CategoryType::$NameArray as $key=>$value) {
	$count = array();
	$ptotal = array();
	foreach($assessmentArray as $intAssessmentId) {
		$objAssessment = TenPAssessment::Load($intAssessmentId);
		$intCountryId = User::Load($objAssessment->UserId)->CountryId;
		$resultArray = TenPResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
		foreach( $resultArray as $objResult) {
			if(array_key_exists ($intCountryId, $ptotal)) {
				$ptotal[$intCountryId] += $objResult->Performance;
			} else {
				$ptotal[$intCountryId] = $objResult->Performance;
			}
			if(array_key_exists ($intCountryId, $count)) {
				$count[$intCountryId] += 1;
			} else {
				$count[$intCountryId] = 1;
			}
		}
	}
	foreach(CountryList::LoadAll() as $objCountry) {
		if(array_key_exists ($objCountry->Id, $count)) {
			$valueArray[$objCountry->Id][] = ($count[$objCountry->Id])? $ptotal[$objCountry->Id]/$count[$objCountry->Id] : 0;
		} 
	}		
}

// Iteratively add plots.
$i=0;
foreach($legendArray as $key=>$value) {
	if(!empty($valueArray[$key])) {
		$plot = new RadarPlot($valueArray[$key]);
		$plot->SetLegend($value);
		$plot->SetColor(array(rand(0,256),rand(0,256),rand(0,256)));
		$plot->SetFill(false);
		$plot->SetLineWeight(2);
		$i++;
		$graph->Add($plot);
	}
}	

// And output the graph
$graph->Stroke();