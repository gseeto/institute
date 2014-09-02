<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_table.php');

// We need some data
$lemonValues = array();

$total = 0;
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
$lemonType = $assessmentArray[0];
array_shift($assessmentArray);
foreach($assessmentArray as $intAssessmentId) {
	$objAssessment = LemonAssessment::Load($intAssessmentId);
	$key = $objAssessment->User->FirstName.' '.$objAssessment->User->LastName;
	$total = 0;
	if($objAssessment->L) {
		switch($lemonType){
			case 0:
				$lemonValues[$key] = $objAssessment->L;
				break;
			case 1:
				$lemonValues[$key] = $objAssessment->E;
				break;
			case 2:
				$lemonValues[$key] = $objAssessment->M;
				break;
			case 3:
				$lemonValues[$key] = $objAssessment->O;
				break;
			case 4:
				$lemonValues[$key] = $objAssessment->N;
				break;
		}
		$total+= $objAssessment->L + $objAssessment->E + $objAssessment->M + $objAssessment->O + $objAssessment->N;
	} else {
		$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
		$lemonValues[$key] = 0;
		foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			if($intIndex == $lemonType)
				$lemonValues[$key] += $objResult->Value;
			$total+= $objResult->Value;
		}
	}
	// Normalize the value
	if($total != 0)
		$lemonValues[$key] = ($lemonValues[$key]/$total)*100;
	else 
		$lemonValues[$key] = 0;
}
arsort($lemonValues);
$labelArray = array();
$valueArray = array();
$i=0;
foreach($lemonValues as $key=>$value) {
	$labelArray[] = $key;
	$valueArray[] = $value;
	$i++;
	if($i>=10)
		break;
}
$datay = array($labelArray,$valueArray);
$lemonColor = 0;
switch($lemonType){
	case 0:
		$lemonColor = '#6C98B0';
		break;
	case 1:
		$lemonColor = '#8AC16E';
		break;
	case 2:
		$lemonColor = '#FFD43F';
		break;
	case 3:
		$lemonColor = '#FCA343';
		break;
	case 4:
		$lemonColor = '#E66E24';
		break;
}
// Some basic defines to specify the shape of the bar+table
$nbrbar = 5;
$cellwidth = 110;
$tableypos = 200;
$tablexpos = 60;
$tablewidth = $nbrbar*$cellwidth;
$rightmargin = 30;

// Overall graph size
$height = 300;
$width = $tablexpos+$tablewidth+$rightmargin;

// Create the basic graph. 
$graph = new Graph($width,$height);	
$graph->img->SetMargin($tablexpos,$rightmargin,30,$height-$tableypos);
$graph->SetScale("textlin");
$graph->SetMarginColor('white');

// Setup titles and fonts
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,16);
$graph->title->Set('The Top 10 '.LemonType::ToString($lemonType+1));
$graph->xaxis->SetTickLabels($labelArray);
$graph->xaxis->SetLabelAngle(45); // 45 degrees angle

$bplot = new BarPlot($datay[1]);
$bplot->SetFillColor($lemonColor);
$bplot->SetColor("black");
$graph->graph_theme = null;
$graph->Add($bplot);

$graph->Stroke();

?>