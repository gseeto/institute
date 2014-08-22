<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');

setlocale (LC_ALL, 'et_EE.ISO-8859-1');
$labels = array();

$dataLy=array();
$dataEy=array();
$dataMy=array();
$dataOy=array();
$dataNy=array();

$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
$i=0;
foreach($assessmentArray as $intAssessmentId) {
	$objAssessment = LemonAssessment::Load($intAssessmentId);
	$labels[]  = $objAssessment->User->FirstName . ' '. $objAssessment->User->LastName;
	if($objAssessment->L) {
		$total = $objAssessment->L + $objAssessment->E + $objAssessment->M + $objAssessment->O + $objAssessment->N; 
		$dataLy[$i] = round(($objAssessment->L/$total)*100,3);
		$dataEy[$i] = round(($objAssessment->E/$total)*100,3);
		$dataMy[$i] = round(($objAssessment->M/$total)*100,3);
		$dataOy[$i] = round(($objAssessment->O/$total)*100,3);
		$dataNy[$i] = round(($objAssessment->N/$total)*100,3);
	} else {
		$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
		$lemonValues = array(0,0,0,0,0);
		$total = 0;
		foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
			$total += $objResult->Value;
		}
		if($total != 0) {
			$dataLy[$i] = round(($lemonValues[0]/$total)*100,3);
			$dataEy[$i] = round(($lemonValues[1]/$total)*100,3);
			$dataMy[$i] = round(($lemonValues[2]/$total)*100,3);
			$dataOy[$i] = round(($lemonValues[3]/$total)*100,3);
			$dataNy[$i] = round(($lemonValues[4]/$total)*100,3);
		} else {
			$dataLy[$i] = 0;
			$dataEy[$i] = 0;
			$dataMy[$i] = 0;
			$dataOy[$i] = 0;
			$dataNy[$i] = 0;
		}
	}
	$i++;
}

// Create the graph. These two calls are always required
$height = 250 + count($assessmentArray)*45;
$graph = new Graph($height, $height);	
//$graph = new Graph(710, 710);
$graph->SetScale("textlin");
//$graph->yaxis->scale->ticks->Set(1.0);

$graph->SetShadow();
$graph->img->SetMargin(100,30,40,80);
$graph->SetAngle(90);

// Create the bar plots
// Luminary
$b1plot = new BarPlot($dataLy);
$b1plot->SetShadow();
$b1plot->SetFillColor('#6C98B0');
$b1plot->SetColor('#2C7CBA');

//Entrepreneur
$b2plot = new BarPlot($dataEy);
$b2plot->SetShadow();
$b2plot->SetNoFill();
$b2plot->SetColor('#93C0E2');
$b2plot->SetFillColor('#8AC16E');

//Manager
$b3plot = new BarPlot($dataMy);
$b3plot->SetShadow();
$b3plot->SetNoFill();
$b3plot->SetColor('#93C0E2');
$b3plot->SetFillColor('#FFD43F');

//Organizer
$b4plot = new BarPlot($dataOy);
$b4plot->SetShadow();
$b4plot->SetNoFill();
$b4plot->SetColor('#93C0E2');
$b4plot->SetFillColor('#FCA343');

//Networker
$b5plot = new BarPlot($dataNy);
$b5plot->SetShadow();
$b5plot->SetNoFill();
$b5plot->SetColor('#93C0E2');
$b5plot->SetFillColor('#E66E24');

// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot,$b3plot,$b4plot,$b5plot));

// ...and add it to the graPH
$graph->graph_theme = null;
$graph->Add($gbplot);

$graph->title->Set("Normalized Asssessments");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(40); // 45 degrees angle

$graph->SetUserFont('ttf-dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,16);
$graph->yaxis->title->SetFont(FF_USERFONT,FS_NORMAL);
$graph->xaxis->title->SetFont(FF_USERFONT,FS_NORMAL);

// Display the graph
$graph->Stroke();
?>
