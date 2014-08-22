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
$graph->title->Set("Kingdom Business Impact Assessment");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$performanceArray = array();
$importanceArray = array();	
$categoriesArray = array();
$kingdomArray = array();

// Set Category Titles
foreach(CategoryType::$NameArray as $key=>$value) {
		$categoriesArray[] = $value;
}
$graph->SetTitles($categoriesArray);

// Aggregate calculation
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach(CategoryType::$NameArray as $key=>$value) {
	$count = 0;
	$ptotal = $itotal = $ktotal = 0;
	foreach($assessmentArray as $intAssessmentId) {
		$resultArray = KingdomBusinessResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
		foreach( $resultArray as $objResult) {
			$ptotal += $objResult->Performance;
			$itotal += $objResult->Importance;
			switch ($key) {
				case CategoryType::Purpose:
					if(($objResult->QuestionId == 2) || ($objResult->QuestionId == 4)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Product:
					if(($objResult->QuestionId == 5) || ($objResult->QuestionId == 8)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Positioning:
					if(($objResult->QuestionId == 11) || ($objResult->QuestionId == 12)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Presence:
					if(($objResult->QuestionId == 13) || ($objResult->QuestionId == 14)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Partnering:
					if(($objResult->QuestionId == 17) || ($objResult->QuestionId == 19)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Process:
					if(($objResult->QuestionId == 21) || ($objResult->QuestionId == 22)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::People:
					if(($objResult->QuestionId == 27) || ($objResult->QuestionId == 28)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Place:
					if(($objResult->QuestionId == 29) || ($objResult->QuestionId == 32)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Planning:
					if(($objResult->QuestionId == 33) || ($objResult->QuestionId == 35)) {
						$ktotal += $objResult->Performance;
					}
					break;
				case CategoryType::Profit:
					if(($objResult->QuestionId == 37) || ($objResult->QuestionId == 40)) {
						$ktotal += $objResult->Performance;
					}
					break;
			}
		}
		$count += count($resultArray);
	}
	$performanceArray[] = $ptotal/$count;	
	$importanceArray[] = $itotal/$count;
	$kingdomArray[] = $ktotal/($count/2);
}

// Create the first radar plot		
$plot = new RadarPlot($importanceArray);
$plot->SetLegend("Importance");
$plot->SetColor("red","lightred");
$plot->SetFill(false);
$plot->SetLineWeight(2);

// Create the second radar plot
$plot2 = new RadarPlot($performanceArray);
$plot2->SetLegend("Performance");
$plot2->SetLineWeight(2);
$plot2->SetColor("blue");
$plot2->SetFill(false);

// Create the third radar plot - for Kingdom
$plot3 = new RadarPlot($kingdomArray);
$plot3->SetLegend("Kingdom");
$plot3->SetLineWeight(2);
$plot3->SetColor("green");
$plot3->SetFill(false);

// Add the plots to the graph
$graph->Add($plot3);
$graph->Add($plot2);
$graph->Add($plot);

// And output the graph
$graph->Stroke();

?>
