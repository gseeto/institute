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
$graph->title->Set("Education 8-P Assessment - Gaps By Tenure");
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
foreach(TenureList::LoadAll() as $objTenure) {
	$legendArray[$objTenure->Id] = $objTenure->Range;
	$valueArray[$objTenure->Id] = array();
}
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach(CategoryType::$NameArray as $key=>$value) {
	$count = array();
	$ptotal = array();
	foreach($assessmentArray as $intAssessmentId) {
		$objAssessment = UpwardAssessment::Load($intAssessmentId);
		$intTenureId = User::Load($objAssessment->UserId)->TenureId;
		$resultArray = UpwardResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
		foreach( $resultArray as $objResult) {
			if(array_key_exists ($intTenureId, $ptotal)) {
				$ptotal[$intTenureId] += $objResult->Performance;
			} else {
				$ptotal[$intTenureId] = $objResult->Performance;
			}
			if(array_key_exists ($intTenureId, $count)) {
				$count[$intTenureId] += 1;
			} else {
				$count[$intTenureId] = 1;
			}
		}
	}
	foreach(TenureList::LoadAll() as $objTenure) {
		if(array_key_exists ($objTenure->Id, $count)) {
			$valueArray[$objTenure->Id][] = ($count[$objTenure->Id])? $ptotal[$objTenure->Id]/$count[$objTenure->Id] : 0;
		} else {	
			$valueArray[$objTenure->Id][] = 0;
		}
	}		
}

$colorArray = array("red", "blue", "green");
// Iteratively add plots.
$i=0;
foreach($legendArray as $key=>$value) {
	$plot = new RadarPlot($valueArray[$key]);
	$plot->SetLegend($value);
	$plot->SetColor($colorArray[$i],$colorArray[$i]);
	$plot->SetFill(false);
	$plot->SetLineWeight(2);
	$i++;
	$graph->Add($plot);
}	

// And output the graph
$graph->Stroke();

?>