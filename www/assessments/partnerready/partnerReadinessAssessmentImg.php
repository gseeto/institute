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
$graph->title->Set("Partnering Readiness Assessment");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$importanceArray = array();
$willingnessArray = array();	
$categoriesArray = array();
$intAssessmentId = QApplication::PathInfo(0);
foreach(CategoryType::$NameArray as $key=>$value) {
	$categoriesArray[] = $value;
	$resultArray = PartneringReadinessResults::LoadArrayByAssessmentIdAndCategory($intAssessmentId,$key);
	$itotal = $wtotal = 0;
	foreach( $resultArray as $objResult) {
		$itotal += $objResult->Importance;
		$wtotal += $objResult->Willingness;
	}
	$importanceArray[] = $itotal/count($resultArray);	
	$willingnessArray[] = $wtotal/count($resultArray);
}
$importanceArray = array_reverse($importanceArray);
$temp = array_pop($importanceArray);
array_unshift($importanceArray,$temp);

//array_pop($importanceArray, array_shift($importanceArray));
$willingnessArray = array_reverse($willingnessArray);
$temp = array_pop($willingnessArray);
array_unshift($willingnessArray,$temp);
//array_pop($willingnessArray, array_shift($willingnessArray));
$categoriesArray = array_reverse($categoriesArray);
$temp = array_pop($categoriesArray);
array_unshift($categoriesArray,$temp);
//array_pop($categoriesArray, array_shift($categoriesArray));
$graph->SetTitles($categoriesArray);

// Create the first radar plot		
$plot = new RadarPlot($willingnessArray);
$plot->SetLegend("Importance");
$plot->SetColor("red","lightred");
$plot->SetFill(false);
$plot->SetLineWeight(2);

// Create the second radar plot
$plot2 = new RadarPlot($importanceArray);
$plot2->SetLegend("Performance");
$plot2->SetLineWeight(2);
$plot2->SetColor("blue");
$plot2->SetFill(false);

// Add the plots to the graph
$graph->Add($plot2);
$graph->Add($plot);

// And output the graph
//$graph->Stroke();

// Get the handler to prevent the library from sending the
// image to the browser
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);

// Stroke image to a file

// Default is PNG so use ".png" as suffix
$fileName =  __UPLOAD_DIR__.'/partnerready' . $intAssessmentId. '.png';
$graph->img->Stream($fileName);


?>
